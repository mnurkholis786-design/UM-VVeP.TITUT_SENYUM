<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\BudgetSubmission;
use App\Models\DigitalArchive;
use App\Models\Pengajuan;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Mpdf\Mpdf;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class KeuanganController extends Controller
{
    public function index(Request $request)
    {
        // ================= QUERY DASAR =================
        $query = BudgetSubmission::with('user');

        // ================= FILTER SEARCH =================
        if ($request->filled('search')) {
            $query->where(
                'budget_submission_name',
                'like',
                '%' . $request->search . '%'
            );
        }

        // ================= FILTER DIVISI =================
        if ($request->filled('divisi')) {
            $divisi = $request->divisi;

            $query->whereHas('user', function ($subQ) use ($divisi) {
                $subQ->where('role', $divisi);
            });
        }

        // ================= FILTER STATUS =================
        if ($request->filled('status')) {
            switch ($request->status) {

                case 'belum_diperiksa':
                    $query->where(
                        'requirements_status',
                        'Belum Diperiksa'
                    );
                    break;

                case 'belum_lengkap':
                    $query->where(
                        'requirements_status',
                        'Belum Lengkap'
                    );
                    break;

                case 'lengkap':
                    $query->where(
                        'requirements_status',
                        'Lengkap'
                    );
                    break;

                case 'belum_diverifikasi':
                    $query->where(
                        'verification_status',
                        0
                    );
                    break;

                case 'diverifikasi':
                    $query->where(
                        'verification_status',
                        1
                    );
                    break;

                case 'diarsipkan':
                    $query->where(
                        'is_archive',
                        1
                    );
                    break;
            }
        }

        // ================= TAB DASHBOARD =================
        $tab = $request->get('tab', 'all');

        if ($tab == 'perlu_diperiksa') {

            $query->whereIn(
                'requirements_status',
                [
                    'Belum Lengkap',
                    'Belum Diperiksa'
                ]
            );

        } elseif ($tab == 'sudah_diverifikasi') {

            $query->where(
                'verification_status',
                1
            );
        }

        $pengajuans = $query
            ->latest()
            ->paginate(10);

        // ================= STATISTIK =================
        $total_pengajuan = BudgetSubmission::count();

        $perlu_diperiksa = BudgetSubmission::whereIn(
            'requirements_status',
            [
                'Belum Lengkap',
                'Belum Diperiksa'
            ]
        )->count();

        $belum_diverifikasi = BudgetSubmission::where(
            'verification_status',
            0
        )->count();

        $sudah_diverifikasi = BudgetSubmission::where(
            'verification_status',
            1
        )->count();

        return view(
            'keuangan.dashboard',
            compact(
                'pengajuans',
                'total_pengajuan',
                'perlu_diperiksa',
                'belum_diverifikasi',
                'sudah_diverifikasi',
                'tab'
            )
        );
    }

    /**
     * =========================================================
     * ARSIP DIGITAL KEUANGAN
     * =========================================================
     */
    public function input_arsip(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Ambil 4 kategori arsip digital
        |--------------------------------------------------------------------------
        | Kategori diambil dari tabel categories.
        | Jika database mempunyai lebih dari 4 kategori,
        | yang ditampilkan di halaman ini adalah 4 kategori pertama.
        */

        $categories = Category::query()
            ->orderBy('id')
            ->take(4)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Ambil jumlah arsip untuk masing-masing kategori
        |--------------------------------------------------------------------------
        */

        $categories->each(function ($category) {

            $category->archive_count = DigitalArchive::where(
                'category_id',
                $category->id
            )->count();

        });

        /*
        |--------------------------------------------------------------------------
        | Kirim ke halaman Keuangan
        |--------------------------------------------------------------------------
        */

        return view(
            'keuangan.digital_arsip.digital_archive',
            compact('categories')
        );
    }

    /**
     * =========================================================
     * MENAMPILKAN ARSIP BERDASARKAN KATEGORI
     * =========================================================
     */
    public function show_category($id)
    {
        $category = Category::findOrFail($id);

        $allArchive = DigitalArchive::where(
            'category_id',
            $category->id
        )
            ->latest()
            ->get();

        return view(
            'keuangan.digital_arsip.all-digital-archive',
            compact(
                'allArchive',
                'category',
                'id'
            )
        );
    }

    /**
     * =========================================================
     * DETAIL ARSIP DIGITAL
     * =========================================================
     */
    public function show_archive($id)
    {
        $archive = DigitalArchive::findOrFail($id);

        return view(
            'keuangan.digital_arsip.show-digital-archive',
            compact('archive')
        );
    }

    public function all_submit(Request $request)
    {
        $query = BudgetSubmission::with('user');

        if ($request->filled('search')) {
            $query->where(
                'budget_submission_name',
                'like',
                '%' . $request->search . '%'
            );
        }

        // Filter Berdasarkan Divisi
        if ($request->filled('divisi')) {

            $divisi = $request->divisi;

            $query->whereHas('user', function ($subQ) use ($divisi) {
                $subQ->where('role', $divisi);
            });
        }

        if (
            $request->filled('start_date') &&
            $request->filled('end_date')
        ) {

            $query->whereBetween(
                'updated_at',
                [
                    $request->start_date,
                    $request->end_date
                ]
            );
        }

        $all_submit = (clone $query)
            ->latest()
            ->paginate(
                10,
                ['*'],
                'all_submit'
            );

        $not_check_submit = (clone $query)
            ->where(
                'requirements_status',
                'Belum Diperiksa'
            )
            ->latest()
            ->paginate(
                10,
                ['*'],
                'not_check'
            );

        $my_proses = (clone $query)
            ->where(
                'requirements_status',
                'Belum Lengkap'
            )
            ->where(
                'verification_status',
                0
            )
            ->where(
                'finance_officers_id',
                Auth::id()
            )
            ->latest()
            ->paginate(
                5,
                ['*'],
                'my_proses'
            );

        return view(
            'keuangan.pengajuan',
            compact(
                'all_submit',
                'not_check_submit',
                'my_proses'
            )
        );
    }

    public function check_pengajuan($id)
    {
        $pengajuan = BudgetSubmission::with('user')
            ->findOrFail($id);

        if (
            Storage::disk('private')->exists(
                $pengajuan->path_file_requirements_status
            )
        ) {

            $filePathMetadata = Storage::disk('private')
                ->path(
                    $pengajuan->path_file_requirements_status
                );

            $spreadsheet = IOFactory::load(
                $filePathMetadata
            );

            $worksheet = $spreadsheet->getActiveSheet();
        }

        $namaKegiatan = $worksheet
            ->getCell('B3')
            ->getValue();

        $nokuitansi = $worksheet
            ->getCell('B4')
            ->getValue();

        $kuitansi = trim(
            preg_replace(
                '/^Nomor\s*:\s*/i',
                '',
                $nokuitansi
            )
        );

        $startCell = 7;
        $currentRow = $startCell;
        $maxRows = 100;

        $syaratDoc = [];
        $ada = [];
        $tidakada = [];
        $tidakperlu = [];
        $lengkap = [];
        $belum = [];
        $keterangan = [];

        while (
            count($syaratDoc) < 30 &&
            $currentRow < $maxRows
        ) {

            $datasyarat = $worksheet
                ->getCell("C{$currentRow}")
                ->getValue();

            if (
                $datasyarat !== null &&
                trim($datasyarat) !== ''
            ) {

                $syaratDoc[] = $datasyarat;

                $worksheet->setCellValue(
                    "D{$currentRow}",
                    'Y'
                );

                $worksheet->setCellValue(
                    "G{$currentRow}",
                    'Y'
                );

                $ada[] = $worksheet
                    ->getCell("D{$currentRow}")
                    ->getValue();

                $tidakada[] = $worksheet
                    ->getCell("E{$currentRow}")
                    ->getValue();

                $tidakperlu[] = $worksheet
                    ->getCell("F{$currentRow}")
                    ->getValue();

                $lengkap[] = $worksheet
                    ->getCell("G{$currentRow}")
                    ->getValue();

                $belum[] = $worksheet
                    ->getCell("H{$currentRow}")
                    ->getValue();

                $keterangan[] = $worksheet
                    ->getCell("I{$currentRow}")
                    ->getValue();
            }

            $currentRow++;
        }

        $catatan = $worksheet
            ->getCell('B40')
            ->getValue();

        $writer = new Xlsx($spreadsheet);

        $writer->save(
            $filePathMetadata
        );

        return view(
            'keuangan.check-pengajuan',
            compact(
                'pengajuan',
                'namaKegiatan',
                'kuitansi',
                'syaratDoc',
                'ada',
                'tidakada',
                'tidakperlu',
                'lengkap',
                'belum',
                'keterangan',
                'catatan'
            )
        );
    }

    public function search_pengajuan(Request $request)
    {
        $query = BudgetSubmission::with('user');

        if ($request->filled('search')) {

            $query->where(
                'budget_submission_name',
                'LIKE',
                '%' . $request->search . '%'
            );
        }

        if ($request->filled('divisi')) {

            $divisi = $request->divisi;

            $query->whereHas('user', function ($subQ) use ($divisi) {
                $subQ->where('role', $divisi);
            });
        }

        if (
            $request->filled('start_date') &&
            $request->filled('end_date')
        ) {

            $query->whereBetween(
                'updated_at',
                [
                    $request->start_date,
                    $request->end_date
                ]
            );
        }

        $submit = $query
            ->latest()
            ->get();

        return view(
            'keuangan.search.search_result',
            compact('submit')
        );
    }

    public function report(Request $request)
    {
        if (
            isset($request->from_date) &&
            isset($request->target_date)
        ) {

            $submission = BudgetSubmission::with('user')
                ->whereBetween(
                    'updated_at',
                    [
                        $request->from_date,
                        $request->target_date
                    ]
                )
                ->paginate(
                    10,
                    ['*'],
                    'submit_result_filter'
                );

            return view(
                'keuangan.report.report',
                compact('submission')
            );
        }

        $submission = BudgetSubmission::with('user')
            ->paginate(
                10,
                ['*'],
                'result_no_filter'
            );

        return view(
            'keuangan.report.report',
            compact('submission')
        );
    }

    public function report_all_submission(Request $request)
    {
        $pengajuan = BudgetSubmission::with('user')
            ->whereBetween(
                'updated_at',
                [
                    $request->from_date,
                    $request->target_date
                ]
            )
            ->get();

        $data = [
            'title' => 'Laporan Semua Pengajuan',
            'pengajuan' => $pengajuan,
            'tanggal_awal' => $request->from_date,
            'tanggal_akhir' => $request->target_date,
            'watermark' => storage_path(
                'app/public/images/watermark.png'
            ),
        ];

        $html = view(
            'keuangan.report.all_submission_report',
            $data
        )->render();

        $mpdf = new Mpdf();

        $mpdf->WriteHTML($html);

        return response(
            $mpdf->Output(
                'Laporan Semua Pengajuan.pdf',
                'S'
            )
        )->header(
            'Content-Type',
            'application/pdf'
        );
    }

    public function report_verification_submission(Request $request)
    {
        $pengajuan = BudgetSubmission::with('user')
            ->with('finance_officer')
            ->where(
                'verification_status',
                1
            )
            ->whereBetween(
                'updated_at',
                [
                    $request->from_date,
                    $request->target_date
                ]
            )
            ->get();

        $data = [
            'title' => 'Laporan Pengajuan diverifikasi',
            'pengajuan' => $pengajuan,
            'tanggal_awal' => $request->from_date,
            'tanggal_akhir' => $request->target_date,
            'watermark' => storage_path(
                'app/public/images/watermark.png'
            ),
        ];

        $html = view(
            'keuangan.report.verify_submission',
            $data
        )->render();

        $mpdf = new Mpdf();

        $mpdf->WriteHTML($html);

        return response(
            $mpdf->Output(
                'Laporan Pengajuan Diverifikasi.pdf',
                'S'
            )
        )->header(
            'Content-Type',
            'application/pdf'
        );
    }
}