<?php

namespace App\Http\Controllers\Kepala;

use App\Http\Controllers\Controller;
use App\Models\BudgetSubmission;
use App\Models\DigitalArchive;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class KepalaController extends Controller
{
    public function index()
    {
        $total_arsip = DigitalArchive::all()->count();
        $arsip_lengkap = DigitalArchive::where('kode_klasifikasi', '!=', null)->count();
        $arsip_belum_lengkap = DigitalArchive::where('kode_klasifikasi', null)->count();
        $arsip = DigitalArchive::paginate(5, ['*'], 'all_arsip');
        return view('kepala_kantor.dashboard', compact('total_arsip', 'arsip_belum_lengkap', 'arsip_lengkap', 'arsip'));
    }

    public function report(Request $request)
    {
        if (isset($request->from_date) && isset($request->target_date)) {
            $arsip = DigitalArchive::whereBetween('updated_at', [$request->from_date, $request->target_date])->paginate(10, ['*'], 'submit_result_filter');
            return view('kepala_kantor.report.report', compact('arsip'));
        }
        $arsip = DigitalArchive::paginate(10, ['*'], 'result_no_filter');
        return view('kepala_kantor.report.report', compact('arsip'));
    }

    public function report_aktif(Request $request)
    {
        $query = DigitalArchive::where(function ($q) {
            $q->where('status', 'Aktif')
              ->orWhereNull('status');
        });

        if ($request->filled('from_date') && $request->filled('target_date')) {
            $query->whereBetween('created_at', [
                $request->from_date . ' 00:00:00',
                $request->target_date . ' 23:59:59'
            ]);
        }

        $arsip = $query->get();

        $data = [
            'title' => 'Laporan Arsip Aktif',
            'pengajuan' => $arsip,
            'tanggal_awal' => $request->from_date,
            'tanggal_akhir' => $request->target_date,
            'watermark' => storage_path('app/public/images/watermark.png'),
        ];

        $html = view('kepala_kantor.report.report_arsip_aktif', $data)->render();

        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);

        return response($mpdf->Output('Laporan Semua Arsip Aktif.pdf', 'S'))->header('Content-Type', 'application/pdf');
    }

    public function report_approved(Request $request)
    {
        $arsip = DigitalArchive::where('kode_klasifikasi', '!=', null)
            ->whereBetween('updated_at', [$request->from_date, $request->target_date])
            ->get();

        $data = [
            'title' => 'Laporan Arsip',
            'pengajuan' => $arsip,
            'tanggal_awal' => $request->from_date,
            'tanggal_akhir' => $request->target_date,
            'watermark' => storage_path('app/public/images/watermark.png'),
        ];

        $html = view('kepala_kantor.report.report_approved', $data)->render();

        $mpdf = new Mpdf();
        $mpdf->WriteHTML($html);

        return response($mpdf->Output('Laporan Semua Arsip disetujui sah.pdf', 'S'))->header('Content-Type', 'application/pdf');
    }
}
