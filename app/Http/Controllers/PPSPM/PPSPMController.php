<?php

namespace App\Http\Controllers\PPSPM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BudgetSubmission;

class PPSPMController extends Controller
{
public function index()
{
    // 1. Total seluruh pengajuan masuk
    $totalMasuk = BudgetSubmission::count();
    
    // 2. Dokumen yang siap divalidasi PPSPM (HANYA jenis LS SPM)
    $menunggu = BudgetSubmission::where('requirements_status', 'Lengkap')
        ->where('verification_status', 0)
        ->whereHas('payment_method', function ($q) {
            $q->where('payment_method_name', 'LIKE', '%LS%');
        })
        ->count();

    // 3. Dokumen yang telah selesai disahkan PPSPM (HANYA jenis LS SPM)
    $selesai = BudgetSubmission::where('verification_status', 1)
        ->whereHas('payment_method', function ($q) {
            $q->where('payment_method_name', 'LIKE', '%LS%');
        })
        ->count();
    
 // 4. Daftar 10 pengajuan terbaru dengan paginasi
 $recentSubmissions = BudgetSubmission::with('payment_method')->latest()->paginate(10);
    
    return view('ppspm.dashboard', compact('totalMasuk', 'menunggu', 'selesai', 'recentSubmissions'));
}
}