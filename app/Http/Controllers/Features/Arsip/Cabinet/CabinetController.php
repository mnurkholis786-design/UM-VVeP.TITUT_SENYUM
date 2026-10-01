<?php

namespace App\Http\Controllers\Features\Arsip\Cabinet;

use App\Http\Controllers\Controller;
use App\Models\ArchiveFile;
use App\Models\Cabinet;
use App\Models\Category;
use App\Models\DocumentFolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class CabinetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cabinets = Cabinet::all();

        return view(
            'features.arsip.cabinet.cabinet',
            compact('cabinets')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'features.arsip.cabinet.cabinet_create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        Cabinet::create([
            'cabinet_name' => $request->name,
            'cabinet_code' => $request->code,
            'total_racks' => 0,
            'description' => $request->deskripsi,
        ]);

        return redirect()
            ->route('cabinet.index')
            ->with(
                'success',
                'Berhasil Menambahkan Cabinet'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // =========================================================
        // AMBIL CABINET
        // =========================================================
        $cabinet = Cabinet::findOrFail($id);

        // =========================================================
        // USER YANG SEDANG LOGIN
        // =========================================================
        $user = Auth::user();

        // =========================================================
        // QUERY AWAL
        // HANYA KATEGORI DARI CABINET INI
        // =========================================================
        $query = Category::where(
            'cabinet_id',
            $cabinet->id
        );

        // =========================================================
        // AMBIL ROLE USER
        // =========================================================
        $role = strtolower(
            trim($user->role ?? '')
        );

        // =========================================================
        // BENDAHARA
        //
        // Kategori ditentukan melalui tabel category_user.
        //
        // Bendahara 1 (user ID 17)
        // → UP Bendahara
        //
        // Bendahara 2 (user ID 18)
        // → LS SPM
        // =========================================================
        if ($role === 'bendahara') {

            $query->whereExists(function ($subQuery) use ($user) {

                $subQuery
                    ->select(DB::raw(1))
                    ->from('category_user')
                    ->whereColumn(
                        'category_user.category_id',
                        'categories.id'
                    )
                    ->where(
                        'category_user.user_id',
                        $user->id
                    );
            });
        }

        // =========================================================
        // KEUANGAN
        //
        // User Keuangan tetap dapat melihat semua kategori.
        // =========================================================
        elseif (
            str_contains($role, 'keuangan') ||
            $user->is_privileged
        ) {
            // Tidak diberikan filter.
        }

        // =========================================================
        // ROLE LAIN
        // =========================================================
        else {

            $query->where(function ($q) use ($user) {

                $q->where(
                    'sub_role',
                    $user->sub_role
                )
                ->orWhereNull(
                    'sub_role'
                );

            });
        }

        // =========================================================
        // AMBIL HASIL
        // =========================================================
        $result = $query->get();

        // =========================================================
        // HILANGKAN KATEGORI DUPLIKAT BERDASARKAN NAMA
        // =========================================================
        $categories = collect();

        $temp = [];

        foreach ($result as $category) {

            if (
                in_array(
                    $category->category_name,
                    $temp
                )
            ) {
                continue;
            }

            $temp[] = $category->category_name;

            $categories->push(
                $category
            );
        }

        // =========================================================
        // KIRIM KE VIEW
        // =========================================================
        return view(
            'features.arsip.category.category',
            compact(
                'cabinet',
                'categories'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cabinet = Cabinet::findOrFail($id);

        return view(
            'features.arsip.cabinet.cabinet_edit',
            compact('cabinet')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        string $id
    ) {
        $request->validate([
            'name' => 'required|string',
            'code' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $cabinet = Cabinet::findOrFail($id);

        $cabinet->update([
            'cabinet_name' => $request->name,
            'cabinet_code' => $request->code,
            'description' => $request->deskripsi,
        ]);

        return redirect()
            ->route('cabinet.index')
            ->with(
                'success',
                'Berhasil Mengupdate Cabinet'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // =========================================================
        // AMBIL CABINET
        // =========================================================
        $cabinet = Cabinet::findOrFail($id);

        // =========================================================
        // AMBIL CATEGORY DALAM CABINET
        // =========================================================
        $categoryIds = Category::where(
            'cabinet_id',
            $cabinet->id
        )->pluck('id');

        if ($categoryIds->isNotEmpty()) {

            // =====================================================
            // HAPUS RELASI CATEGORY_USER
            // =====================================================
            DB::table('category_user')
                ->whereIn(
                    'category_id',
                    $categoryIds
                )
                ->delete();

            // =====================================================
            // AMBIL FOLDER
            // =====================================================
            $folderIds = DocumentFolder::whereIn(
                'category_id',
                $categoryIds
            )->pluck('id');

            if ($folderIds->isNotEmpty()) {

                // =================================================
                // AMBIL FILE
                // =================================================
                $files = ArchiveFile::whereIn(
                    'folder_id',
                    $folderIds
                )->get();

                // =================================================
                // HAPUS FILE FISIK
                // =================================================
                foreach ($files as $file) {

                    if (
                        Storage::disk('private')
                            ->exists($file->file_path)
                    ) {
                        Storage::disk('private')
                            ->delete($file->file_path);
                    }
                }

                // =================================================
                // HAPUS RECORD FILE
                // =================================================
                ArchiveFile::whereIn(
                    'folder_id',
                    $folderIds
                )->delete();

                // =================================================
                // HAPUS FOLDER
                // =================================================
                DocumentFolder::whereIn(
                    'category_id',
                    $categoryIds
                )->delete();
            }

            // =====================================================
            // HAPUS CATEGORY
            // =====================================================
            Category::where(
                'cabinet_id',
                $cabinet->id
            )->delete();
        }

        // =========================================================
        // HAPUS CABINET
        // =========================================================
        $cabinet->delete();

        return redirect()
            ->route('cabinet.index')
            ->with(
                'success',
                'Berhasil menghapus Cabinet beserta seluruh isinya'
            );
    }
}