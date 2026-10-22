<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Keaslian Dokumen - TVRI Kalimantan Selatan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl overflow-hidden border border-slate-200">
        
        {{-- Header --}}
        <div class="bg-[#003A8F] p-6 text-white text-center">
            <h1 class="text-xl font-bold tracking-wide">TVRI KALIMANTAN SELATAN</h1>
            <p class="text-xs text-blue-100 mt-1">Sistem Informasi Pengelolaan Anggaran (Lanjung)</p>
        </div>

        {{-- Badge Status --}}
        <div class="p-6 text-center border-b border-slate-100">
            <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-3 shadow-inner">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h2 class="text-lg font-bold text-slate-800">DOKUMEN ASLI & TERVERIFIKASI</h2>
            <p class="text-xs text-slate-500 mt-1">Surat Perintah Membayar (SPM) ini resmi disahkan oleh PPSPM</p>
        </div>

        {{-- Detail Dokumen --}}
        <div class="p-6 space-y-4 text-sm text-slate-700 bg-slate-50/50">
            <div class="flex justify-between border-b border-slate-200/60 pb-2">
                <span class="text-slate-500 text-xs">Nama Pengajuan</span>
                <span class="font-semibold text-slate-800 text-right">{{ $doc->budget_submission_name }}</span>
            </div>
            <div class="flex justify-between border-b border-slate-200/60 pb-2">
                <span class="text-slate-500 text-xs">Unit Pengaju</span>
                <span class="font-medium text-slate-800">{{ $doc->user->role }} ({{ $doc->user->name }})</span>
            </div>
            <div class="flex justify-between border-b border-slate-200/60 pb-2">
                <span class="text-slate-500 text-xs">Nominal Anggaran</span>
                <span class="font-bold text-emerald-600">Rp {{ number_format($doc->nominal ?? 0, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between border-b border-slate-200/60 pb-2">
                <span class="text-slate-500 text-xs">Status Verifikasi</span>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-[#003A8F]">Disahkan PPSPM</span>
            </div>
            <div class="flex justify-between pt-1">
                <span class="text-slate-500 text-xs">Waktu Pengesahan</span>
                <span class="font-medium text-slate-700 text-xs">{{ $doc->updated_at->translatedFormat('d F Y, H:i') }} WITA</span>
            </div>
        </div>

        {{-- Footer --}}
        <div class="p-4 bg-slate-100 text-center text-xs text-slate-400">
            Dokumen ini telah ditandatangani secara digital. Keaslian informasi dijamin oleh database TVRI Kalimantan Selatan.
        </div>
    </div>
</body>
</html>