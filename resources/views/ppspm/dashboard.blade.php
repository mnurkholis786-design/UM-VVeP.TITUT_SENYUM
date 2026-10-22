<x-app-layout>
    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <x-slot name="header">
        <div class="w-full flex items-center justify-between gap-6" style="width: 100%;">
            {{-- Bagian Kiri: Title & Subtitle --}}
            <div class="flex items-center gap-3 min-w-0">
                <div class="w-10 h-10 flex-shrink-0 rounded-xl bg-gradient-to-br from-[#003A8F] to-[#0066CC] flex items-center justify-center shadow-lg shadow-blue-900/25">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m5.5-5.5A9 9 0 1112 3a9 9 0 018.5 5.5z" />
                    </svg>
                </div>
                <div class="min-w-0">
                    <h2 class="font-bold text-xl text-gray-900 leading-tight truncate">
                        Dashboard PPSPM
                    </h2>
                    <p class="text-xs text-gray-500 mt-0.5 truncate">
                        Pejabat Penandatangan Surat Perintah Membayar (PPSPM) TVRI Kalsel
                    </p>
                </div>
            </div>

            {{-- Bagian Kanan: Tombol Aksi diberi margin-left auto agar tidak mepet ke judul --}}
            <div class="hidden md:flex items-center ml-auto pl-4">
                <a href="{{ route('validation.index') }}" 
                   class="inline-flex items-center gap-2 px-4 py-2 bg-gradient-to-r from-[#003A8F] to-[#0066CC] hover:from-[#002f73] hover:to-[#005bb8] text-white text-xs font-semibold rounded-xl shadow-md shadow-blue-900/20 transition-all transform hover:-translate-y-0.5 whitespace-nowrap">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Buka Daftar Pengajuan
                </a>
            </div>
        </div>
    </x-slot>

    {{-- STYLING 3D DAN INTERAKTIF --}}
    <style>
        .ppspm-page-bg {
            background:
                radial-gradient(circle at 10% 10%, rgba(0, 58, 143, .08), transparent 35%),
                radial-gradient(circle at 90% 20%, rgba(0, 102, 204, .07), transparent 30%),
                linear-gradient(180deg, #f8fbff 0%, #f1f5f9 100%);
        }

        /* 3D Container Perspective */
        .card-3d-wrap {
            perspective: 1000px;
        }

        .card-3d {
            transition: transform 0.15s ease-out, box-shadow 0.2s ease-out, border-color 0.2s ease;
            transform-style: preserve-3d;
            will-change: transform;
            position: relative;
        }

        .card-3d-content {
            transform: translateZ(25px);
        }

        .card-3d-icon {
            transform: translateZ(40px);
            transition: transform 0.2s ease;
        }

        .card-3d:hover .card-3d-icon {
            transform: translateZ(50px) scale(1.08);
        }

        /* Hero 3D Spatial */
        .hero-spatial {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #002b6b 0%, #003A8F 45%, #0066CC 100%);
            box-shadow: 
                0 25px 50px -12px rgba(0, 58, 143, 0.35),
                inset 0 1px 1px rgba(255, 255, 255, 0.3);
        }

        .floating-orb-1 {
            position: absolute;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0) 70%);
            top: -120px;
            right: -60px;
            animation: floatSlow 8s ease-in-out infinite alternate;
        }

        .floating-orb-2 {
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0, 200, 255, 0.2) 0%, rgba(0, 200, 255, 0) 70%);
            bottom: -80px;
            left: 20%;
            animation: floatSlow 6s ease-in-out infinite alternate-reverse;
        }

        @keyframes floatSlow {
            0% { transform: translateY(0px) rotate(0deg); }
            100% { transform: translateY(-20px) rotate(15deg); }
        }

        .glass-badge {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        /* Glare effect on 3D Card */
        .glare {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            border-radius: inherit;
            background: radial-gradient(circle at 50% 50%, rgba(255,255,255,0.4) 0%, transparent 60%);
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.25s ease;
        }

        .card-3d:hover .glare {
            opacity: 1;
        }
    </style>
        
    <div class="ppspm-page-bg py-8 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- =====================================================
                HERO BANNER 3D
            ====================================================== --}}
            <div class="hero-spatial rounded-3xl p-8 md:p-10 text-white">
                <div class="floating-orb-1"></div>
                <div class="floating-orb-2"></div>

                <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                    <div>
                        <div class="inline-flex items-center gap-2 glass-badge rounded-full px-3.5 py-1.5 mb-4 shadow-sm">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 animate-ping"></span>
                            <span class="text-xs font-bold tracking-wider uppercase text-blue-100">
                                Portal Validasi SPM
                            </span>
                        </div>

                        <h1 class="text-3xl md:text-4xl font-black tracking-tight leading-snug">
                            Selamat Datang, {{ Auth::user()->name }}
                        </h1>

                        <p class="text-blue-100/90 text-sm md:text-base mt-2.5 max-w-2xl leading-relaxed font-normal">
                            Portal pengesahan Surat Perintah Membayar (SPM) TVRI Kalimantan Selatan. Lakukan penandatanganan dan validasi berkas belanja langsung (LS).
                        </p>

                        <div class="flex items-center gap-3 mt-6">
                            <a href="{{ route('validation.index') }}?tab=1" 
                               class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-white text-[#003A8F] hover:bg-blue-50 font-bold text-xs shadow-lg transition-all transform hover:scale-105">
                                <svg class="w-4 h-4 text-[#003A8F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Periksa Pengajuan Menunggu ({{ $menunggu ?? 0 }})
                            </a>
                        </div>
                    </div>

                    <div class="hidden lg:block">
                        <div class="glass-badge rounded-2xl p-5 text-left max-w-xs transform hover:scale-105 transition-transform">
                            <div class="flex items-center gap-2.5 mb-2">
                                <div class="w-7 h-7 rounded-lg bg-blue-500/30 flex items-center justify-center">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <span class="text-xs font-bold uppercase tracking-wider text-blue-200">Alur Sistem</span>
                            </div>
                            <p class="text-xs text-white/90 leading-relaxed">
                                PPSPM hanya menandatangani <strong>LS SPM</strong>. Berkas <strong>UP Bendahara</strong> otomatis langsung diteruskan ke Bendahara.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- =====================================================
                KARTU STATISTIK 3D INTERAKTIF
            ====================================================== --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                {{-- 1. Total Dokumen Masuk --}}
                <div class="card-3d-wrap">
                    <div class="card-3d js-tilt-card bg-white rounded-3xl p-6 border border-gray-200/90 shadow-xl shadow-gray-200/50 flex items-center justify-between overflow-hidden">
                        <div class="glare"></div>
                        <div class="card-3d-content">
                            <p class="text-xs font-extrabold uppercase tracking-wider text-gray-400 mb-1">Total Dokumen Masuk</p>
                            <h4 class="text-4xl font-black text-gray-800 tracking-tight">{{ $totalMasuk ?? 0 }}</h4>
                            <p class="text-xs text-gray-500 mt-2 flex items-center gap-1.5 font-medium">
                                <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                Semua berkas terdaftar
                            </p>
                        </div>
                        <div class="card-3d-icon w-16 h-16 rounded-2xl flex items-center justify-center text-white shadow-lg"
                             style="background: linear-gradient(135deg, #003A8F, #0066CC);">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- 2. Menunggu Validasi (Highlight Interaktif) --}}
                <div class="card-3d-wrap">
                    <a href="{{ route('validation.index') }}?tab=1" 
                       class="card-3d js-tilt-card bg-gradient-to-br from-amber-500/10 via-white to-amber-500/5 rounded-3xl p-6 border-2 border-amber-300 shadow-xl shadow-amber-900/10 flex items-center justify-between block overflow-hidden group">
                        <div class="glare"></div>
                        <div class="card-3d-content">
                            <p class="text-xs font-extrabold uppercase tracking-wider text-amber-700 mb-1">Menunggu Validasi</p>
                            <h4 class="text-4xl font-black text-amber-600 tracking-tight">{{ $menunggu ?? 0 }}</h4>
                            <p class="text-xs text-amber-800 mt-2 flex items-center gap-1.5 font-semibold">
                                <span class="w-2 h-2 rounded-full bg-amber-500 animate-ping"></span>
                                Klik untuk verifikasi berkas
                            </p>
                        </div>
                        <div class="card-3d-icon w-16 h-16 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-amber-600/30"
                             style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </a>
                </div>

                {{-- 3. Telah Disahkan --}}
                <div class="card-3d-wrap">
                    <div class="card-3d js-tilt-card bg-white rounded-3xl p-6 border border-gray-200/90 shadow-xl shadow-gray-200/50 flex items-center justify-between overflow-hidden">
                        <div class="glare"></div>
                        <div class="card-3d-content">
                            <p class="text-xs font-extrabold uppercase tracking-wider text-gray-400 mb-1">Telah Disahkan SPM</p>
                            <h4 class="text-4xl font-black text-emerald-600 tracking-tight">{{ $selesai ?? 0 }}</h4>
                            <p class="text-xs text-gray-500 mt-2 flex items-center gap-1.5 font-medium">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                Diteruskan ke Bendahara
                            </p>
                        </div>
                        <div class="card-3d-icon w-16 h-16 rounded-2xl flex items-center justify-center text-white shadow-lg"
                             style="background: linear-gradient(135deg, #10b981, #059669);">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>

            </div>
            
            {{-- =====================================================
                TABEL PENGAJUAN TERBARU MODERN
            ====================================================== --}}
            <div class="bg-white rounded-3xl shadow-xl shadow-gray-200/60 border border-gray-200/90 overflow-hidden">
                <div class="px-7 py-5 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 bg-gradient-to-r from-gray-50/80 to-white">
                    <div>
                        <h4 class="font-black text-gray-900 text-lg">
                            Pengajuan Anggaran Terbaru
                        </h4>
                        <p class="text-xs text-gray-500 mt-0.5">Daftar dokumen pengajuan terkini dalam alur perbendaharaan</p>
                    </div>

                    <a href="{{ route('validation.index') }}" 
                       class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-gray-100 hover:bg-[#003A8F] hover:text-white text-xs font-bold text-gray-700 transition-all">
                        Lihat Seluruh Dokumen
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-400 text-[11px] font-black uppercase tracking-wider border-b border-gray-100">
                                <th class="py-4 px-6 text-center w-16">No</th>
                                <th class="py-4 px-6">Nama Pengajuan</th>
                                <th class="py-4 px-6">Tipe Metode</th>
                                <th class="py-4 px-6">Nominal</th>
                                <th class="py-4 px-6 text-center">Status Alur</th>
                                <th class="py-4 px-6 text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-sm">
                            @forelse ($recentSubmissions as $index => $item)
                                @php
                                    $isLS = $item->payment_method && str_contains(strtoupper($item->payment_method->payment_method_name), 'LS');
                                @endphp
                                <tr class="hover:bg-blue-50/30 transition-all group">
                                    {{-- Kolom Nomor Berwarna Tegas --}}
                                    <td class="py-4 px-6 text-center">
                                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg font-black text-xs text-white shadow-sm"
                                              style="background: linear-gradient(135deg, #003A8F, #0066CC);">
                                            {{ ($recentSubmissions->currentPage() - 1) * $recentSubmissions->perPage() + $index + 1 }}
                                        </span>
                                    </td>

                                    {{-- Judul & Submitter --}}
                                    <td class="py-4 px-6">
                                        <a href="{{ route('validation.show', $item->id) }}" 
                                           class="font-bold text-gray-900 group-hover:text-[#003A8F] transition-colors block text-base leading-snug">
                                            {{ $item->budget_submission_name ?? '-' }}
                                        </a>
                                        <div class="flex items-center gap-2 mt-1 text-xs text-gray-500">
                                            <span>Diajukan oleh: <strong class="text-gray-700">{{ $item->user->name ?? '-' }}</strong></span>
                                            <span>•</span>
                                            <span>{{ $item->created_at ? $item->created_at->diffForHumans() : '-' }}</span>
                                        </div>
                                    </td>

                                    {{-- Metode Badge 3D Look --}}
                                    <td class="py-4 px-6">
                                        @if ($isLS)
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-800 border border-blue-200 shadow-sm">
                                                <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                                                LS SPM
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800 border border-emerald-200 shadow-sm">
                                                <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                                                UP Bendahara
                                            </span>
                                        @endif
                                    </td>
                                    
                                    {{-- Nominal --}}
                                    <td class="py-4 px-6 font-extrabold text-gray-900">
                                        @if($item->nominal)
                                            Rp {{ number_format($item->nominal, 0, ',', '.') }}
                                        @else
                                            <span class="text-gray-400 font-normal">-</span>
                                        @endif
                                    </td>

                                    {{-- Status Alur --}}
                                    <td class="py-4 px-6 text-center">
                                        @php
                                            if ($item->is_archive == 1) {
                                                $statusText = 'Selesai & Diarsipkan';
                                                $badgeClass = 'bg-emerald-100 text-emerald-800 border-emerald-200';
                                            } elseif ($item->verification_status == 1) {
                                                if ($isLS) {
                                                    $statusText = 'Disahkan PPSPM';
                                                    $badgeClass = 'bg-blue-100 text-[#003A8F] border-blue-200';
                                                } else {
                                                    $statusText = 'Bypass PPSPM (UP)';
                                                    $badgeClass = 'bg-emerald-50 text-emerald-700 border-emerald-200';
                                                }
                                            } elseif ($item->requirements_status === 'Lengkap' && $item->verification_status == 0) {
                                                $statusText = 'Menunggu Validasi PPSPM';
                                                $badgeClass = 'bg-amber-100 text-amber-800 border-amber-300 animate-pulse';
                                            } else {
                                                $statusText = 'Pemeriksaan Keuangan';
                                                $badgeClass = 'bg-gray-100 text-gray-600 border-gray-200';
                                            }
                                        @endphp
                                        <span class="inline-block px-3 py-1 rounded-full text-xs font-bold border {{ $badgeClass }}">
                                            {{ $statusText }}
                                        </span>
                                    </td>

                                    {{-- Aksi --}}
                                    <td class="py-4 px-6 text-right">
                                        <a href="{{ route('validation.show', $item->id) }}" 
                                           class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-gray-100 text-gray-600 hover:bg-[#003A8F] hover:text-white shadow-sm transition-all transform hover:scale-110">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-14 text-gray-400">
                                        Belum ada dokumen pengajuan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if ($recentSubmissions->hasPages())
                <div class="px-7 py-4 border-t border-gray-100 bg-gray-50/60">
                    {{ $recentSubmissions->links() }}
                </div>
                @endif
            </div>

        </div>
    </div>

    {{-- SCRIPT INTERAKTIF 3D TILT TERSINKRONISASI MOUSE --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.js-tilt-card');
            
            cards.forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;
                    
                    const rotateX = ((y - centerY) / centerY) * -12;
                    const rotateY = ((x - centerX) / centerX) * 12;
                    
                    card.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.03)`;
                    
                    const glare = card.querySelector('.glare');
                    if (glare) {
                        glare.style.background = `radial-gradient(circle at ${x}px ${y}px, rgba(255,255,255,0.45) 0%, transparent 60%)`;
                    }
                });
                
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'rotateX(0deg) rotateY(0deg) scale(1)';
                });
            });
        });
    </script>
</x-app-layout>