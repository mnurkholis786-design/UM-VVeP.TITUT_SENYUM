<?php

namespace App\Http\Controllers\PPSPM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BudgetSubmission;

class PPSPMController extends Controller
{
    public function index()
    {
        $totalMasuk = BudgetSubmission::count();
        $selesai = BudgetSubmission::where('verification_status', 'selesai')->count();
        
        // Membatasi 10 data per halaman dengan pagination
        $recentSubmissions = BudgetSubmission::latest()->paginate(10);
        
        return view('ppspm.dashboard', compact('totalMasuk', 'selesai', 'recentSubmissions'));
    }
}