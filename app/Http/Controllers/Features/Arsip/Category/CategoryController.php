<?php

namespace App\Http\Controllers\Features\Arsip\Category;

use App\Http\Controllers\Controller;
use App\Models\ArchiveFile;
use App\Models\Cabinet;
use App\Models\Category;
use App\Models\DocumentFolder;
use App\Models\FundingSource;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = $request->id_cabinet ?? $request->cabinet_id;
        $cabinet = Cabinet::findOrFail($id);
        $result = Category::where('cabinet_id', $cabinet->id)->get();

        $categories = collect();
        $temp = [];

        foreach ($result as $category) {
            if (in_array($category->category_name, $temp)) {
                continue;
            }

            $temp[] = $category->category_name;
            $categories->push($category);
        }

        return view('features.arsip.category.category_list', compact('categories', 'cabinet'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $cabinet = Cabinet::findOrFail($request->cabinet_id);
        $payment = PaymentMethod::all();
        $funding = FundingSource::all();

        return view('features.arsip.category.category-create', compact('cabinet', 'payment', 'funding'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cabinet_id' => 'required|exists:cabinets,id',
            'name'       => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'category_name')->where(function ($query) use ($request) {
                    return $query->where('cabinet_id', $request->cabinet_id);
                }),
            ],
            'deskripsi'  => 'nullable|string',
            'url'        => 'nullable|string',
        ], [
            'name.unique' => 'Nama kategori sudah digunakan di dalam kabinet ini.',
        ]);

        Category::create([

            'cabinet_id'        => $request->cabinet_id,
            'category_name'     => $request->name,
            'description'       => $request->deskripsi,
            'payment_method_id' => $request->payment_method,
            'funding_source_id' => $request->funding_source,
            'url_icon'          => $request->url,
        ]);

        return redirect()->route('category.index', ['id_cabinet' => $request->cabinet_id])->with('success', 'Berhasil Membuat Category');
    }

    /**
     * Display the specified resource.
     */
public function show(string $id)
{
    $category = Category::findOrFail($id);

    // ================= CEK OTORISASI BENDAHARA =================
    $user = Auth::user();
    if ($user && strtolower(trim($user->role ?? '')) === 'bendahara') {
        $hasAccess = DB::table('category_user')
            ->join('categories', 'category_user.category_id', '=', 'categories.id')
            ->where('category_user.user_id', $user->id)
            ->where('categories.category_name', $category->category_name)
            ->exists();

        if (!$hasAccess) {
            abort(403, 'Anda tidak memiliki hak akses ke kategori arsip ini.');
        }
    }
    // ===========================================================

    $file2024 = null;
        $file2025 = null;

        $files2024 = Storage::disk('private')->files('arsip_fisik/2024');
        foreach ($files2024 as $f) {
            if (str_contains($f, 'arsip_fisik_2024_category_' . $id . '_')) {
                $file2024 = basename($f);
                break;
            }
        }

        $files2025 = Storage::disk('private')->files('arsip_fisik/2025');
        foreach ($files2025 as $f) {
            if (str_contains($f, 'arsip_fisik_2025_category_' . $id . '_')) {
                $file2025 = basename($f);
                break;
            }
        }

        if (isset($category->sub_category)) {
            $result = Category::where('category_name', $category->category_name)->get();

            $subcategories = collect();
            $temp = [];

            foreach ($result as $cat) {
                if (in_array($cat->sub_category, $temp)) {
                    continue;
                }

                $temp[] = $cat->sub_category;
                $subcategories->push($cat);
            }

            return view('features.arsip.sub_category.sub_category', compact('subcategories', 'category', 'file2024', 'file2025'));
        } else {
            $years = Category::where('category_name', $category->category_name)->get();
            return view('features.arsip.year.year', compact('years', 'category'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $cabinet = Cabinet::findOrFail($category->cabinet_id);
        $payment = PaymentMethod::all();
        $funding = FundingSource::all();

        return view('features.arsip.category.category-edit', compact(
            'category',
            'cabinet',
            'payment',
            'funding'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $cabinetId = $category->cabinet_id;
        $oldCategoryName = $category->category_name;

        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'category_name')
                    ->where(function ($query) use ($cabinetId) {
                        return $query->where('cabinet_id', $cabinetId);
                    })
                    ->where(function ($query) use ($oldCategoryName) {
                        return $query->where('category_name', '!=', $oldCategoryName);
                    }),
            ],
            'payment_method' => 'nullable',
            'funding_source' => 'nullable',
        ], [
            'name.unique' => 'Nama kategori sudah digunakan di dalam kabinet ini.',
        ]);

        $newCategoryName = $request->name;

        Category::where('cabinet_id', $category->cabinet_id)
            ->where('category_name', $oldCategoryName)
            ->update([
                'category_name'     => $newCategoryName,
                'payment_method_id' => $request->payment_method,
                'funding_source_id' => $request->funding_source,
            ]);

        return redirect()->route('category.index', ['id_cabinet' => $cabinetId])
            ->with('success', 'Berhasil edit Category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $cabinetId = $category->cabinet_id;

        $categories = Category::where('cabinet_id', $category->cabinet_id)
            ->where('category_name', $category->category_name)
            ->get();

        $this->deleteRelatedFiles($categories->pluck('id')->toArray());

        Category::where('cabinet_id', $category->cabinet_id)
            ->where('category_name', $category->category_name)
            ->delete();

        return redirect()->route('cabinet.show', ['cabinet' => $cabinetId])
            ->with('success', 'Berhasil menghapus Category');
    }

    /**
     * Tampilkan Halaman Tersendiri Manajemen Arsip Fisik (CRUD).
     */
    public function manageArsipFisik($id)
    {
        $category = Category::findOrFail($id);

        $directories = Storage::disk('private')->directories('arsip_fisik');
        $arsipList = [];

        foreach ($directories as $dir) {
            $tahun = basename($dir);
            $fileName = null;

            $files = Storage::disk('private')->files($dir);
            foreach ($files as $f) {
                if (str_contains($f, 'arsip_fisik_' . $tahun . '_category_' . $id . '_')) {
                    $fileName = basename($f);
                    break;
                }
            }

              // HANYA tampilkan kartu jika kategori ini memang memiliki berkas excel di tahun tersebut
            if ($fileName) {
                $arsipList[$tahun] = $fileName;
            }
        }

        ksort($arsipList);

        ksort($arsipList);

        return view('features.arsip.category.manage_arsip_fisik', compact('category', 'arsipList'));
    }

    /**
     * Upload / Replace Arsip Fisik Excel & Otomatis Import ke Database.
     */
    public function uploadArsipFisik(Request $request, $id)
    {
        $request->validate([
            'tahun'      => 'required|string|max:10',
            'file_excel' => 'required|mimes:xlsx,xls|max:20480',
        ]);

        $category = Category::findOrFail($id);

        if ($request->hasFile('file_excel')) {
            $tahun = trim($request->tahun);
            $file = $request->file('file_excel');

            if (!Storage::disk('private')->exists('arsip_fisik/' . $tahun)) {
                Storage::disk('private')->makeDirectory('arsip_fisik/' . $tahun);
            }

            // Hapus file lama jika ada
            $existingFiles = Storage::disk('private')->files('arsip_fisik/' . $tahun);
            foreach ($existingFiles as $ef) {
                if (str_contains($ef, 'arsip_fisik_' . $tahun . '_category_' . $id . '_')) {
                    Storage::disk('private')->delete($ef);
                }
            }

            $fileName = 'arsip_fisik_' . $tahun . '_category_' . $id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('arsip_fisik/' . $tahun, $fileName, 'private');
                 $fullPath = Storage::disk('private')->path('arsip_fisik/' . $tahun . '/' . $fileName);

            // Bersihkan data lama di database untuk tahun ini sebelum import baru
            $relatedCategoryIds = Category::where('category_name', $category->category_name)
                ->where('year', $tahun)
                ->pluck('id')
                ->push($category->id)
                ->unique();

            $folderIds = DocumentFolder::whereIn('category_id', $relatedCategoryIds)->pluck('id');
            ArchiveFile::whereIn('folder_id', $folderIds)->delete();

            // JALANKAN IMPORT OTOMATIS KE DATABASE
            $importService = new \App\Services\ArsipImportService();
            $totalImported = $importService->importFromExcel($fullPath, $category, $tahun);

            return redirect()->back()->with('success', "Berhasil menyimpan Excel dan mengimpor {$totalImported} berkas arsip ke database!");
        }

        return redirect()->back()->with('error', 'Gagal mengunggah file.');
    }

    /**
     * Menampilkan daftar berkas arsip hasil import dari Excel untuk tahun tertentu.
     */
    public function arsipFisikFiles(Request $request, $id, $tahun)
    {
        $category = Category::findOrFail($id);
        $search = $request->input('search');

        // Ambil semua category terkait (termasuk sub kategori yang dibuat otomatis untuk tahun ini)
        $relatedCategoryIds = Category::where('category_name', $category->category_name)
            ->where('year', $tahun)
            ->pluck('id')
            ->push($category->id)
            ->unique();

        $folderIds = \App\Models\DocumentFolder::whereIn('category_id', $relatedCategoryIds)->pluck('id');

        $query = ArchiveFile::whereIn('folder_id', $folderIds);

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('file_name', 'like', "%{$search}%")
                  ->orWhere('uraian', 'like', "%{$search}%")
                  ->orWhere('no_sp2d', 'like', "%{$search}%")
                  ->orWhere('no_item', 'like', "%{$search}%")
                  ->orWhere('kode_klasifikasi', 'like', "%{$search}%");
            });
        }

        $archives = $query->latest()->paginate(15)->appends($request->query());

        return view('features.arsip.category.arsip_fisik_files', compact('category', 'tahun', 'archives', 'search'));
    }

    /**
     * Update / Ganti Nama Tahun Arsip.
     */
    public function updateTahunArsip(Request $request, $id, $tahunLama)
    {
        $request->validate([
            'tahun_baru' => 'required|string|max:10',
        ]);

        $tahunBaru = trim($request->tahun_baru);

        if ($tahunLama === $tahunBaru) {
            return redirect()->back()->with('success', 'Tidak ada perubahan tahun.');
        }

        // Cek apakah tahun tujuan sudah memiliki berkas arsip untuk kategori ini
        if (Storage::disk('private')->exists('arsip_fisik/' . $tahunBaru)) {
            $existingNewYearFiles = Storage::disk('private')->files('arsip_fisik/' . $tahunBaru);
            foreach ($existingNewYearFiles as $existingFile) {
                if (str_contains($existingFile, 'arsip_fisik_' . $tahunBaru . '_category_' . $id . '_')) {
                    return redirect()->back()->with('error', "Gagal! Arsip Fisik untuk Tahun $tahunBaru sudah ada pada kategori ini.");
                }
            }
        }

        if (!Storage::disk('private')->exists('arsip_fisik/' . $tahunBaru)) {
            Storage::disk('private')->makeDirectory('arsip_fisik/' . $tahunBaru);
        }

        $files = Storage::disk('private')->files('arsip_fisik/' . $tahunLama);
        foreach ($files as $file) {
            if (str_contains($file, 'arsip_fisik_' . $tahunLama . '_category_' . $id . '_')) {
                $fileNameOld = basename($file);
                $fileNameNew = str_replace('arsip_fisik_' . $tahunLama, 'arsip_fisik_' . $tahunBaru, $fileNameOld);

                Storage::disk('private')->move($file, 'arsip_fisik/' . $tahunBaru . '/' . $fileNameNew);
            }
        }

        // Cek jika folder lama kosong, hapus foldernya
        $remainingFiles = Storage::disk('private')->files('arsip_fisik/' . $tahunLama);
        if (empty($remainingFiles)) {
            Storage::disk('private')->deleteDirectory('arsip_fisik/' . $tahunLama);
        }

        return redirect()->back()->with('success', "Berhasil mengubah Tahun Arsip dari $tahunLama menjadi $tahunBaru!");
    }

    /**
     * Preview File Arsip Fisik Excel.
     */
    public function previewArsipFisik($id, $tahun)
    {
        $category = Category::findOrFail($id);
        $fileName = null;

        $files = Storage::disk('private')->files('arsip_fisik/' . $tahun);
        foreach ($files as $file) {
            if (str_contains($file, 'arsip_fisik_' . $tahun . '_category_' . $id . '_')) {
                $fileName = basename($file);
                break;
            }
        }

        if (!$fileName) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        return view('features.arsip.category.preview_arsip_fisik', compact('category', 'tahun', 'fileName'));
    }

    /**
     * Stream Raw File khusus untuk dibaca oleh SheetJS di browser.
     */
    public function streamArsipFisik($id, $tahun)
    {
        $files = Storage::disk('private')->files('arsip_fisik/' . $tahun);

        foreach ($files as $file) {
            if (str_contains($file, 'arsip_fisik_' . $tahun . '_category_' . $id . '_')) {
                return response()->file(Storage::disk('private')->path($file));
            }
        }

        abort(404);
    }

    /**
     * Unduh / Download File Arsip Fisik Excel.
     */
    public function downloadArsipFisik($id, $tahun)
    {
        $files = Storage::disk('private')->files('arsip_fisik/' . $tahun);

        foreach ($files as $file) {
            if (str_contains($file, 'arsip_fisik_' . $tahun . '_category_' . $id . '_')) {
                return Storage::disk('private')->download($file);
            }
        }

        return redirect()->back()->with('error', 'File tidak ditemukan.');
    }

    /**
     * Hapus Folder dan Berkas Arsip Fisik (Menghapus Kartu Tahun).
     */
    public function deleteArsipFisik($id, $tahun)
    {
        $category = Category::findOrFail($id);
        $directoryPath = 'arsip_fisik/' . $tahun;

        if (Storage::disk('private')->exists($directoryPath)) {
            $files = Storage::disk('private')->files($directoryPath);
            foreach ($files as $file) {
                if (str_contains($file, 'arsip_fisik_' . $tahun . '_category_' . $id . '_')) {
                    Storage::disk('private')->delete($file);
                }
            }

               $remainingFiles = Storage::disk('private')->files($directoryPath);
            if (empty($remainingFiles)) {
                Storage::disk('private')->deleteDirectory($directoryPath);
            }
        }

        // Hapus juga data arsip kuitansi di database yang terkait kategori & tahun ini
        $relatedCategoryIds = Category::where('category_name', $category->category_name)
            ->where('year', $tahun)
            ->pluck('id')
            ->push($category->id)
            ->unique();

        $folderIds = \App\Models\DocumentFolder::whereIn('category_id', $relatedCategoryIds)->pluck('id');
        \App\Models\ArchiveFile::whereIn('folder_id', $folderIds)->delete();

        return redirect()->back()->with('success', "Berhasil menghapus kartu dan berkas Arsip Fisik Tahun $tahun!");
    }

    private function deleteRelatedFiles($categoryIds)
    {
        $folders = DocumentFolder::whereIn('category_id', $categoryIds)->pluck('id');

        if ($folders->isEmpty()) {
            return;
        }

        $files = ArchiveFile::whereIn('folder_id', $folders)->get();

        foreach ($files as $file) {
            if (Storage::disk('private')->exists($file->file_path)) {
                Storage::disk('private')->delete($file->file_path);
            }
        }
    }
}