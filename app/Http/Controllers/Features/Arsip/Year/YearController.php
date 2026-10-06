<?php

namespace App\Http\Controllers\Features\Arsip\Year;

use App\Http\Controllers\Controller;
use App\Models\ArchiveFile;
use App\Models\Category;
use App\Models\DigitalArchive;
use App\Models\DocumentFolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $category = Category::findOrFail($request->category_id);

        return view('features.arsip.year.year_create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = Category::findOrFail($request->category_id);

        $request->validate([
            'year' => 'required|string',
        ]);

        /*
        |--------------------------------------------------------------------------
        | JIKA CATEGORY SUDAH MEMILIKI YEAR
        |--------------------------------------------------------------------------
        |
        | Buat category baru dengan data category yang sama tetapi year berbeda.
        |
        */
        if (isset($category->year)) {
            Category::create([
                'cabinet_id'    => $category->cabinet_id,
                'category_name' => $category->category_name,
                'sub_category'  => $category->sub_category,
                'category_code' => $category->category_code,
                'year'          => $request->year,
            ]);
        } else {
            /*
            |--------------------------------------------------------------------------
            | JIKA BELUM MEMILIKI YEAR
            |--------------------------------------------------------------------------
            */
            $category->update([
                'year' => $request->year,
            ]);
        }

        return redirect()
            ->route('subcategory.show', ['subcategory' => $category->id])
            ->with('success', 'Berhasil Menambahkan Tahun');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        /*
        |--------------------------------------------------------------------------
        | CATEGORY / YEAR
        |--------------------------------------------------------------------------
        */
        $category = Category::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | INPUT FILTER
        |--------------------------------------------------------------------------
        */
        $searchFisik = $request->input('search_fisik');
        $searchDigital = $request->input('search_digital');
        $selectedCategory = $request->input('category');
        $selectedSubCategory = $request->input('sub_category');
        $selectedDivisi = $request->input('divisi');
        
        // Menangkap request tanggal baik menggunakan parameter tanggal_mulai/selesai maupun mulai_tanggal/sampai_tanggal
        $tanggalMulai = $request->input('tanggal_mulai') ?? $request->input('mulai_tanggal');
        $tanggalSelesai = $request->input('tanggal_selesai') ?? $request->input('sampai_tanggal');

        /*
        |--------------------------------------------------------------------------
        | QUERY ARSIP FISIK / RAK
        |--------------------------------------------------------------------------
        */
        $rackQuery = DocumentFolder::with('category')
            ->where('category_id', $category->id);

        /*
        |--------------------------------------------------------------------------
        | SEARCH ARSIP FISIK
        |--------------------------------------------------------------------------
        */
        if (!empty($searchFisik)) {
            $rackQuery->where('rack_name', 'like', '%' . $searchFisik . '%');
        }

        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA RAK
        |--------------------------------------------------------------------------
        */
        $result = $rackQuery->get();

        /*
        |--------------------------------------------------------------------------
        | HINDARI RAK DUPLIKAT
        |--------------------------------------------------------------------------
        */
        $racks = collect();
        $temp = [];

        foreach ($result as $rak) {
            if (in_array($rak->rack_name, $temp)) {
                continue;
            }

            $temp[] = $rak->rack_name;
            $racks->push($rak);
        }

        /*
        |--------------------------------------------------------------------------
        | QUERY ARSIP DIGITAL
        |--------------------------------------------------------------------------
        */
        $digitalQuery = DigitalArchive::where('category_id', $category->id);

        /*
        |--------------------------------------------------------------------------
        | SEARCH ARSIP DIGITAL
        |--------------------------------------------------------------------------
        */
        if (!empty($searchDigital)) {
            $digitalQuery->where('archive_name', 'like', '%' . $searchDigital . '%');
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER KATEGORI / SUBKATEGORI
        |--------------------------------------------------------------------------
        */
        $categoryChildren = [
            'AEC' => ['AEC.001'],
            'BAH' => ['BAH.001', 'BAH.002', 'BAH.003'],
            'CBR' => ['CBR.001'],
            'CBT' => ['CBT.002'],
            'CDS OP' => ['CDS.001', 'CDS.002', 'CDS.003'],
            'EBA' => ['EBA.994'],
            'WA' => ['WA.4376'],
        ];

        /*
        |--------------------------------------------------------------------------
        | FILTER SUBKATEGORI LANGSUNG
        |--------------------------------------------------------------------------
        */
        if (!empty($selectedSubCategory)) {
            $digitalQuery->where('kategori', $selectedSubCategory);
        } elseif (!empty($selectedCategory)) {
            if (isset($categoryChildren[$selectedCategory])) {
                $digitalQuery->whereIn('kategori', $categoryChildren[$selectedCategory]);
            } else {
                $digitalQuery->where('kategori', $selectedCategory);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER DIVISI
        |--------------------------------------------------------------------------
        */
        if (!empty($selectedDivisi)) {
            $digitalQuery->where('submiter_name', 'like', '%' . $selectedDivisi . '%');
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER PERIODE PENGAJUAN
        |--------------------------------------------------------------------------
        */
        if (!empty($tanggalMulai)) {
            $digitalQuery->whereDate('created_at', '>=', $tanggalMulai);
        }

        if (!empty($tanggalSelesai)) {
            $digitalQuery->whereDate('created_at', '<=', $tanggalSelesai);
        }

        /*
        |--------------------------------------------------------------------------
        | PAGINATION ARSIP DIGITAL
        |--------------------------------------------------------------------------
        */
        $digitalarchive = $digitalQuery
            ->latest()
            ->paginate(10, ['*'], 'digital_arsip')
            ->appends($request->query());

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */
        return view(
            'features.arsip.rack.archive-rack',
            compact('racks', 'category', 'digitalarchive')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $year = Category::findOrFail($id);

        return view('features.arsip.year.year_edit', compact('year'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI YEAR
        |--------------------------------------------------------------------------
        */
        $request->validate([
            'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y') + 10)
        ]);

        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA YEAR
        |--------------------------------------------------------------------------
        */
        $year = Category::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | CEK DUPLIKAT YEAR
        |--------------------------------------------------------------------------
        */
        $exists = Category::where('cabinet_id', $year->cabinet_id)
            ->where('category_name', $year->category_name)
            ->where('sub_category', $year->sub_category)
            ->where('year', $request->year)
            ->where('id', '!=', $id)
            ->exists();

        if ($exists) {
            return redirect()
                ->route('subcategory.show', ['subcategory' => $year->id])
                ->with('error', 'Year dengan kombinasi ini sudah ada');
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE YEAR
        |--------------------------------------------------------------------------
        */
        $year->update([
            'year' => $request->year
        ]);

        return redirect()
            ->route('subcategory.show', ['subcategory' => $year->id])
            ->with('success', 'Berhasil edit tahun');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return DB::transaction(function () use ($id) {
            /*
            |--------------------------------------------------------------------------
            | AMBIL YEAR
            |--------------------------------------------------------------------------
            */
            $year = Category::findOrFail($id);
            $cabinetId = $year->cabinet_id;

            /*
            |--------------------------------------------------------------------------
            | HITUNG JUMLAH YEAR DENGAN SUBCATEGORY YANG SAMA
            |--------------------------------------------------------------------------
            */
            $countSameSubCategory = Category::where('cabinet_id', $year->cabinet_id)
                ->where('sub_category', $year->sub_category)
                ->where('category_name', $year->category_name)
                ->count();

            /*
            |--------------------------------------------------------------------------
            | HAPUS BERKAS TERKAIT & RECORD DATABASE
            |--------------------------------------------------------------------------
            */
            $this->deleteRelatedFiles([$year->id]);

            /*
            |--------------------------------------------------------------------------
            | HAPUS / SET NULL CATEGORY YEAR
            |--------------------------------------------------------------------------
            */
            if ($countSameSubCategory == 1) {
                $year->update(['year' => null]);
                $message = 'Berhasil menghapus Year (diset null)';
            } else {
                $year->delete();
                $message = 'Berhasil menghapus Year';
            }

            return redirect()
                ->route('cabinet.show', ['cabinet' => $cabinetId])
                ->with('success', $message);
        });
    }

    /**
     * Delete related physical archive files & database records.
     */
    private function deleteRelatedFiles($categoryIds)
    {
        $categoryIds = (array) $categoryIds;

        /*
        |--------------------------------------------------------------------------
        | 1. AMBIL FOLDER BERDASARKAN CATEGORY_ID
        |--------------------------------------------------------------------------
        */
        $folders = DocumentFolder::whereIn('category_id', $categoryIds)->pluck('id');

        if ($folders->isNotEmpty()) {
            /*
            |--------------------------------------------------------------------------
            | 2. AMBIL FILE FISIK DENGAN FILE_PATH VALID (TIDAK NULL / KOSONG)
            |--------------------------------------------------------------------------
            */
            $files = ArchiveFile::whereIn('folder_id', $folders)
                ->whereNotNull('file_path')
                ->where('file_path', '!=', '')
                ->get();

            /*
            |--------------------------------------------------------------------------
            | 3. HAPUS FILE FOTO/DOKUMEN DARI STORAGE PRIVATE
            |--------------------------------------------------------------------------
            */
            foreach ($files as $file) {
                if (!empty($file->file_path) && Storage::disk('private')->exists($file->file_path)) {
                    Storage::disk('private')->delete($file->file_path);
                }
            }

            /*
            |--------------------------------------------------------------------------
            | 4. HAPUS RECORD ARCHIVE_FILES & DOCUMENT_FOLDERS DARI DATABASE
            |--------------------------------------------------------------------------
            */
            ArchiveFile::whereIn('folder_id', $folders)->delete();
            DocumentFolder::whereIn('id', $folders)->delete();
        }

        /*
        |--------------------------------------------------------------------------
        | 5. HAPUS ARSIP DIGITAL TERKAIT CATEGORY
        |--------------------------------------------------------------------------
        */
        DigitalArchive::whereIn('category_id', $categoryIds)->delete();
    }
}