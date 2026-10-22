<x-app-layout>
    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <x-slot name="header">
        <div class="flex items-center justify-between w-full" style="width: 100%;">
            <div class="flex items-center gap-3">
                <a href="{{ route('validation.index') }}"
                   class="w-10 h-10 rounded-xl bg-white border border-gray-200 flex items-center justify-center text-gray-600 hover:text-[#003A8F] hover:border-[#003A8F] hover:shadow-md transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <div>
                    <h2 class="font-bold text-xl text-gray-900 leading-tight">
                        Lembar Pengesahan SPM (PPSPM)
                    </h2>
                    <p class="text-xs text-gray-500 mt-0.5">
                        Verifikasi keabsahan administrasi dan validasi penerbitan SPM
                    </p>
                </div>
            </div>

            <div class="hidden sm:flex items-center ml-auto">
                <a href="{{ route('validation.index') }}"
                   class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-semibold rounded-xl transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                    Daftar Pengajuan
                </a>
            </div>
        </div>
    </x-slot>

    {{-- KONTEN UTAMA --}}
    <div class="py-8 bg-slate-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- =====================================================
                HERO BANNER
            ====================================================== --}}
            <div class="rounded-3xl p-7 md:p-9 text-white shadow-xl relative overflow-hidden"
                 style="background: linear-gradient(135deg, #002b6b 0%, #003A8F 55%, #0066CC 100%);">
                
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 relative z-10">
                    <div class="space-y-3">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/15 border border-white/20 text-white">
                                ID: #{{ $doc->id }}
                            </span>

                            @php
                                $docIsLS = $doc->payment_method && str_contains(strtoupper($doc->payment_method->payment_method_name), 'LS');
                            @endphp

                            @if ($docIsLS)
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-[#003A8F]">
                                    📄 Metode LS SPM
                                </span>
                            @else
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800">
                                    💵 Metode UP Bendahara
                                </span>
                            @endif

                            @if ($doc->verification_status == 1)
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-500/20 text-emerald-200 border border-emerald-400/30">
                                    ✓ Disahkan PPSPM
                                </span>
                            @else
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-amber-500/20 text-amber-200 border border-amber-400/30 animate-pulse">
                                    ⏳ Menunggu Pengesahan
                                </span>
                            @endif
                        </div>

                        <h1 class="text-2xl md:text-3xl font-black text-white tracking-tight">
                            {{ $doc->budget_submission_name }}
                        </h1>

                        <p class="text-blue-100 text-xs md:text-sm">
                            Diajukan oleh <strong class="text-white">{{ $doc->user->name }}</strong> (Divisi {{ $doc->user->role }}) • 
                            Nominal: <strong class="text-white text-base">{{ $doc->nominal ? 'Rp ' . number_format($doc->nominal, 0, ',', '.') : 'Belum ditentukan' }}</strong>
                        </p>
                    </div>

                    <div class="flex-shrink-0">
                        <div class="px-5 py-3 rounded-2xl bg-white/10 border border-white/20 text-center">
                            <span class="text-[11px] uppercase tracking-wider text-blue-200 block font-semibold">Status Persyaratan</span>
                            <span class="text-lg font-black text-white block mt-0.5">{{ $doc->requirements_status ?? 'Belum Diperiksa' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- =====================================================
                SECTION 1: BERKAS LAMPIRAN & DATA VERIFIKASI (2 KOLOM)
            ====================================================== --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- KARTU 1: BERKAS DOKUMEN --}}
                <div class="bg-white rounded-3xl p-6 border border-gray-200 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-3 pb-4 border-b border-gray-100 mb-4">
                            <div class="w-10 h-10 rounded-xl bg-blue-50 text-[#003A8F] flex items-center justify-center font-bold">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 text-base">Berkas Lampiran Pengajuan</h3>
                                <p class="text-xs text-gray-500">File dokumen rincian belanja anggaran</p>
                            </div>
                        </div>

                        <div class="p-4 rounded-2xl bg-gray-50 border border-gray-200 flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 flex-shrink-0 rounded-xl bg-rose-500 text-white font-bold text-xs flex items-center justify-center">
                                PDF
                            </div>
                            <div class="min-w-0 flex-1">
                                <p class="text-[11px] font-semibold text-gray-400 uppercase">Nama File</p>
                                <p class="text-sm font-bold text-gray-800 truncate">
                                    {{ basename($doc->path_file_submission) ?? 'Tidak ada berkas' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 pt-2">
                        <a href="{{ route('file.stream', $doc->id) }}" target="_blank"
                           class="flex-1 inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl bg-[#003A8F] hover:bg-[#002f73] text-white text-xs font-bold shadow-md transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            Lihat Dokumen
                        </a>
                        <a href="{{ route('file.download', $doc->id) }}"
                           class="flex-1 inline-flex items-center justify-center gap-1.5 px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold shadow-md transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                            Download
                        </a>
                    </div>
                </div>

                {{-- KARTU 2: IDENTITAS PEMOHON & PEMERIKSA --}}
                <div class="bg-white rounded-3xl p-6 border border-gray-200 shadow-sm space-y-4">
                    <div class="flex items-center gap-3 pb-4 border-b border-gray-100">
                        <div class="w-10 h-10 rounded-xl bg-purple-50 text-purple-700 flex items-center justify-center font-bold">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-base">Identitas Verifikasi</h3>
                            <p class="text-xs text-gray-500">Pihak pengaju dan pemeriksa keuangan</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div class="p-3.5 rounded-2xl bg-gray-50 border border-gray-100">
                            <p class="text-[11px] font-bold text-gray-400 uppercase">Pemohon (Unit Kerja)</p>
                            <p class="text-sm font-bold text-gray-900 mt-0.5">{{ $doc->user->name }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ $doc->user->email }}</p>
                            <span class="inline-block mt-1 px-2 py-0.5 rounded text-[10px] font-semibold bg-gray-200 text-gray-700">Divisi {{ $doc->user->role }}</span>
                        </div>

                        <div class="p-3.5 rounded-2xl bg-gray-50 border border-gray-100">
                            <p class="text-[11px] font-bold text-gray-400 uppercase">Diverifikasi (Keuangan)</p>
                            <p class="text-sm font-bold text-gray-900 mt-0.5">{{ $doc->finance_officer->name ?? '-' }}</p>
                            <p class="text-xs text-gray-500 truncate">{{ $doc->finance_officer->email ?? 'Belum diverifikasi' }}</p>
                            <span class="inline-block mt-1 px-2 py-0.5 rounded text-[10px] font-semibold bg-blue-100 text-blue-700">Verifikator</span>
                        </div>
                    </div>
                </div>

            </div>

            {{-- =====================================================
                SECTION 2: FORM PENGESAHAN (KHUSUS LS SPM)
            ====================================================== --}}
            @if ($doc->is_archive == 0 && $docIsLS)
                <div class="bg-white rounded-3xl p-7 md:p-8 border border-gray-200 shadow-sm">
                    <div class="flex items-center gap-3 pb-5 border-b border-gray-100 mb-6">
                        <div class="w-12 h-12 rounded-2xl flex items-center justify-center text-white shadow-md shadow-blue-900/20"
                             style="background: linear-gradient(135deg, #003A8F, #0066CC);">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.5-5.5A9 9 0 1112 3a9 9 0 018.5 5.5z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-black text-gray-900 text-lg">
                                Pengesahan Surat Perintah Membayar (LS SPM)
                            </h3>
                            <p class="text-xs text-gray-500">
                                Terbitkan SPM untuk disahkan dan diteruskan ke meja Bendahara
                            </p>
                        </div>
                    </div>

                    <form action="{{ route('validation.update', $doc->id) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            {{-- 1. Nominal Pengajuan (Bisa diedit angkanya) --}}
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-2">
                                    Nominal Pengajuan (Rp) <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-500 font-bold text-xs">
                                        Rp
                                    </div>
                                    <input type="number" name="biaya" required
                                           value="{{ old('biaya', $doc->nominal) }}"
                                           placeholder="Masukkan nominal angka..."
                                           class="w-full pl-10 pr-4 py-3 bg-white border border-gray-300 rounded-xl text-gray-900 font-bold text-sm focus:ring-2 focus:ring-[#003A8F] focus:border-[#003A8F] transition">
                                </div>
                                <p class="text-[11px] text-gray-500 mt-1">Dapat disesuaikan jika ada revisi nominal</p>
                            </div>

                            {{-- 2. Dropdown Metode Pembayaran (Bisa dipilih) --}}
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-2">
                                    Metode Pembayaran <span class="text-rose-500">*</span>
                                </label>
                                <select name="payment_method" required
                                        class="w-full px-4 py-3 bg-white border border-gray-300 rounded-xl text-gray-900 font-semibold text-sm focus:ring-2 focus:ring-[#003A8F] focus:border-[#003A8F] transition">
                                    <option value="" disabled>-- Pilih Metode Pembayaran --</option>
                                    @foreach ($payment_method as $pm)
                                        @if(str_contains(strtoupper($pm->payment_method_name), 'LS'))
                                            <option value="{{ $pm->id }}" {{ old('payment_method', $doc->assigned_payment_method) == $pm->id ? 'selected' : '' }}>
                                                {{ $pm->payment_method_name }} - {{ $pm->sub_category }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                <p class="text-[11px] text-blue-600 font-semibold mt-1">✓ Khusus pilihan jenis LS SPM</p>
                            </div>

                            {{-- 3. Dropdown Sumber Dana (Bisa dipilih) --}}
                            <div>
                                <label class="block text-xs font-bold uppercase tracking-wider text-gray-700 mb-2">
                                    Sumber Dana <span class="text-rose-500">*</span>
                                </label>
                                <select name="funding_source" required
                                        class="w-full px-4 py-3 bg-white border border-gray-300 rounded-xl text-gray-900 font-semibold text-sm focus:ring-2 focus:ring-[#003A8F] focus:border-[#003A8F] transition">
                                    <option value="" disabled>-- Pilih Sumber Dana --</option>
                                    @foreach ($funding_source as $fs)
                                        <option value="{{ $fs->id }}" {{ old('funding_source', $doc->assigned_funding_source) == $fs->id ? 'selected' : '' }}>
                                            {{ $fs->funding_source_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <p class="text-[11px] text-gray-500 mt-1">Pilih pagu sumber anggaran yang sesuai</p>
                            </div>
                        </div>

                        {{-- TOMBOL AKSI --}}
                        <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mt-8 pt-6 border-t border-gray-100">
                            <button type="button" 
                                    onclick="document.getElementById('modal-return').classList.remove('hidden')"
                                    class="w-full sm:w-auto px-5 py-3 rounded-xl bg-amber-50 hover:bg-amber-100 text-amber-800 border border-amber-300 font-bold text-xs transition">
                                ⚠️ Kembalikan Dokumen (Revisi)
                            </button>

                            <button type="submit"
                                    class="w-full sm:w-auto px-7 py-3 rounded-xl text-white font-extrabold text-sm shadow-lg transition transform hover:scale-105"
                                    style="background: {{ $doc->verification_status == 1 ? 'linear-gradient(135deg, #003A8F, #0066CC)' : 'linear-gradient(135deg, #059669, #10b981)' }};">
                                {{ $doc->verification_status == 1 ? 'Perbarui Pengesahan SPM' : '✓ Sahkan & Terbitkan SPM' }}
                            </button>
                        </div>
                    </form>
                </div>

            @elseif (!$docIsLS)
                {{-- Berkas UP Bendahara (Bypass PPSPM) --}}
                <div class="bg-emerald-50 rounded-3xl p-8 border border-emerald-200 text-center">
                    <div class="w-14 h-14 mx-auto mb-3 bg-emerald-100 text-emerald-700 rounded-2xl flex items-center justify-center">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-black text-emerald-900">Pengajuan UP Bendahara (Bypass PPSPM)</h3>
                    <p class="text-xs md:text-sm text-emerald-800 max-w-xl mx-auto mt-1 leading-relaxed">
                        Dokumen ini menggunakan metode pembayaran <strong>Uang Persediaan (UP)</strong> sehingga <strong>tidak memerlukan tanda tangan PPSPM</strong>. Dokumen telah langsung diteruskan ke meja Bendahara untuk pencairan dana.
                    </p>
                </div>
            @else
                {{-- Sudah Diarsipkan --}}
                <div class="bg-gray-100 rounded-3xl p-8 text-center border border-gray-200">
                    <h3 class="text-base font-bold text-gray-800">Dokumen Telah Selesai & Diarsipkan</h3>
                    <p class="text-xs text-gray-500 mt-1">Berkas ini telah dicairkan dan disimpan ke arsip resmi.</p>
                </div>
            @endif

        </div>
    </div>

    {{-- MODAL REVISI --}}
    <div id="modal-return" class="hidden fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl shadow-2xl max-w-md w-full p-6 space-y-4">
            <h3 class="text-lg font-black text-gray-900">Alasan Pengembalian Dokumen</h3>
            <p class="text-xs text-gray-500">Berikan catatan revisi kepada Unit Pengaju.</p>
            
            <form action="{{ route('validation.return', $doc->id) }}" method="POST" class="space-y-4">
                @method('PUT')
                @csrf
                <div>
                    <textarea name="catatan" rows="4" required 
                              placeholder="Tuliskan catatan perbaikan berkas..."
                              class="w-full border border-gray-200 rounded-xl p-3 text-sm focus:ring-2 focus:ring-amber-500 focus:outline-none bg-gray-50"></textarea>
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" 
                            onclick="document.getElementById('modal-return').classList.add('hidden')"
                            class="px-4 py-2 rounded-xl border border-gray-200 text-gray-600 text-xs font-bold">
                        Batal
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 rounded-xl bg-amber-600 hover:bg-amber-700 text-white font-bold text-xs">
                        Kirim Revisi
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>