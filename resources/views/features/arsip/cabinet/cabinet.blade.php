
<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3 animate-header-slide">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#003A8F] to-[#0056C7] flex items-center justify-center shadow-lg shadow-blue-900/20">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7a2 2 0 012-2h3l2 2h9a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-xl text-gray-800 leading-tight">{{ __('Input Arsip') }}</h2>
                <p class="text-xs text-gray-500 mt-0.5">Kelola kabinet penyimpanan arsip</p>
            </div>
        </div>
    </x-slot>

    <style>
        @keyframes slideInFromTop {
            from { opacity: 0; transform: translateY(-15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInFromBottom {
            from { opacity: 0; transform: translateY(25px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-header-slide {
            animation: slideInFromTop .5s cubic-bezier(.16, 1, .3, 1) forwards;
        }

        .animate-hero-enter {
            animation: slideInFromBottom .6s cubic-bezier(.16, 1, .3, 1) forwards;
        }

        .animate-cabinet-header,
        .animate-cabinet-list {
            opacity: 0;
            animation: slideInFromBottom .6s cubic-bezier(.16, 1, .3, 1) .3s forwards;
        }

        .animate-cabinet-list {
            animation-delay: .45s;
        }

        .cabinet-page {
            background:
                radial-gradient(circle at 10% 0%, rgba(0, 58, 143, .07), transparent 35%),
                radial-gradient(circle at 90% 15%, rgba(0, 86, 199, .06), transparent 30%),
                #f8fafc;
        }

        .cabinet-hero {
            background:
                radial-gradient(circle at 95% 15%, rgba(255, 255, 255, .20), transparent 28%),
                radial-gradient(circle at 5% 95%, rgba(245, 158, 11, .15), transparent 30%),
                linear-gradient(135deg, #002766 0%, #003A8F 45%, #0056C7 100%);
            box-shadow: 0 20px 40px -15px rgba(0, 39, 102, .35);
            position: relative;
        }

        .cabinet-hero .tvri-badge {
            color: #fff !important;
            background: rgba(255, 255, 255, .14);
            border: 1px solid rgba(255, 255, 255, .55);
            text-shadow: 0 1px 2px rgba(0, 0, 0, .25);
        }

        /* Lampu indikator hijau berkedip */
        .tvri-online-light {
            display: inline-block;
            width: 9px;
            height: 9px;
            flex-shrink: 0;
            border-radius: 50%;
            background: #22ff91;
            box-shadow: 0 0 6px #22ff91, 0 0 12px rgba(34, 255, 145, .8);
            animation: onlineBlink 1.2s ease-in-out infinite;
        }

        @keyframes onlineBlink {
            0%, 100% {
                opacity: 1;
                box-shadow: 0 0 6px #22ff91, 0 0 12px rgba(34, 255, 145, .8);
            }
            50% {
                opacity: .3;
                box-shadow: 0 0 2px #22ff91;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .tvri-online-light {
                animation: none;
            }
        }

        /* Statistik hero: tiga kotak dengan ukuran proporsional */
        .cabinet-stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: .75rem;
            width: 100%;
            min-width: 0;
        }

        .cabinet-stat-card {
            min-width: 0;
            padding: .875rem 1rem;
            border-radius: 1rem;
            background: rgba(255, 255, 255, .10);
            border: 1px solid rgba(255, 255, 255, .22);
            backdrop-filter: blur(12px);
        }

        .cabinet-stat-label {
            color: #dbeafe;
            font-size: 12px;
            font-weight: 600;
            line-height: 1.4;
        }

        .cabinet-stat-value {
            color: #fff;
            font-size: 14px;
            font-weight: 800;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .cabinet-3d-card {
            background: #fff;
            border: 1px solid rgba(203, 213, 225, .9);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, .06),
                        0 12px 28px -5px rgba(0, 58, 143, .10);
            transition: all .35s cubic-bezier(.16, 1, .3, 1);
            position: relative;
        }

        .cabinet-3d-card:hover {
            transform: translateY(-6px);
            border-color: rgba(0, 86, 199, .5);
            box-shadow: 0 20px 40px -10px rgba(0, 58, 143, .22),
                        inset 0 2px 0 #0056C7;
        }

        .cabinet-number-cube {
            background: linear-gradient(145deg, #002766 0%, #003A8F 50%, #0056C7 100%);
            box-shadow: 0 8px 18px rgba(0, 58, 143, .35),
                        inset 0 1px 1px rgba(255, 255, 255, .4);
        }

        .glow-pulse {
            animation: pulse-ring 2s cubic-bezier(.4, 0, .6, 1) infinite;
        }

        @keyframes pulse-ring {
            0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, .6); }
            70% { box-shadow: 0 0 0 8px rgba(16, 185, 129, 0); }
            100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }

        .add-button {
            background: linear-gradient(135deg, #059669 0%, #10b981 100%);
            box-shadow: 0 10px 22px rgba(5, 150, 105, .28);
            transition: all .25s ease;
        }

        .add-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(5, 150, 105, .38);
        }

        /* Search dan tombol tambah */
        .cabinet-toolbar-actions {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: .75rem;
            flex-wrap: nowrap;
            width: 100%;
            min-width: 0;
        }

        .cabinet-search-wrap {
            position: relative;
            width: 100%;
            max-width: 21rem;
            min-width: 0;
            flex: 1 1 auto;
        }

        .cabinet-search-input {
            display: block;
            width: 100%;
            height: 2.75rem;
            box-sizing: border-box;
            padding: .625rem .75rem .625rem 2.5rem;
            font-size: 13px;
            line-height: 1.25rem;
        }

        .cabinet-search-icon {
            position: absolute;
            left: .875rem;
            top: 50%;
            transform: translateY(-50%);
            width: 1rem;
            height: 1rem;
            pointer-events: none;
        }

        .cabinet-add-button {
            min-height: 2.75rem;
            white-space: nowrap;
            flex-shrink: 0;
        }

        @media (max-width: 1023px) {
            .cabinet-hero-content {
                flex-direction: column;
            }

            .cabinet-stats {
                max-width: 100%;
            }
        }

        @media (max-width: 767px) {
            .cabinet-stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .cabinet-stat-card:last-child {
                grid-column: 1 / -1;
            }

            .cabinet-toolbar-actions {
                flex-wrap: wrap;
            }

            .cabinet-search-wrap {
                max-width: none;
                flex: 1 1 100%;
            }

            .cabinet-add-button {
                width: 100%;
            }
        }
    </style>

    <div class="cabinet-page min-h-screen py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- HERO --}}
            <div class="cabinet-hero rounded-3xl overflow-hidden mb-6 relative animate-hero-enter">
                <div class="absolute -top-20 -right-20 w-80 h-80 rounded-full bg-blue-400/20 blur-3xl pointer-events-none"></div>
                <div class="absolute -bottom-24 -left-20 w-80 h-80 rounded-full bg-amber-400/15 blur-3xl pointer-events-none"></div>

                <div class="relative px-6 py-8 md:px-6 md:py-9">
                    <div class="cabinet-hero-content flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                        {{-- JUDUL HERO --}}
                        <div class="flex items-start gap-4 min-w-0 lg:flex-1">
                            <div class="w-16 h-16 rounded-2xl bg-white/15 backdrop-blur-md border border-white/25 flex items-center justify-center shadow-2xl shrink-0">
                                <svg class="w-8 h-8 text-amber-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7a2 2 0 012-2h3l2 2h9a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />
                                </svg>
                            </div>

                            <div class="min-w-0">
                                <div class="flex items-center gap-2 mb-2 flex-wrap">
                                    <span class="tvri-badge px-3 py-1 rounded-full text-xs font-black tracking-wider uppercase inline-flex items-center gap-2">
                                        <span class="tvri-online-light" role="img" aria-label="Status online"></span>
                                        TVRI KALIMANTAN SELATAN
                                    </span>

                                    <span class="px-2.5 py-0.5 rounded-full bg-white/15 text-white text-xs font-semibold">
                                        Pusat Penyimpanan Dokumen
                                    </span>
                                </div>

                                <h1 class="text-2xl md:text-3xl font-extrabold text-white tracking-tight">
                                    Daftar Kabinet &amp; Brankas Arsip
                                </h1>

                                <p class="text-blue-100 text-sm mt-1.5 max-w-2xl leading-relaxed">
                                    Kelola lemari penyimpanan arsip digital &amp; fisik, pemetaan rak kategori, serta proteksi dokumen operasional TVRI Kalsel.
                                </p>
                            </div>
                        </div>

                        {{-- STATISTIK: UKURAN KOTAK LEBIH SEIMBANG --}}
                        <div class="cabinet-stats lg:max-w-[690px] lg:flex-1">

                            <div class="cabinet-stat-card">
                                <p class="cabinet-stat-label">Total Kabinet</p>
                                <div class="flex items-baseline gap-1 mt-1">
                                    <span class="text-white text-2xl font-black">{{ $cabinets->count() }}</span>
                                    <span class="text-blue-100 text-xs">Unit</span>
                                </div>
                            </div>

                            <div class="cabinet-stat-card">
                                <p class="cabinet-stat-label">Kondisi</p>
                                <div class="flex items-center gap-2 mt-2 min-w-0">
                                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-400 glow-pulse shrink-0"></span>
                                    <span class="cabinet-stat-value whitespace-nowrap">Terorganisir</span>
                                </div>
                            </div>

                            <div class="cabinet-stat-card">
                                <p class="cabinet-stat-label">Tipe Akses</p>
                                <p class="cabinet-stat-value mt-1">Fisik &amp; Digital</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{-- HEADER KOLEKSI + SEARCH --}}
            <div class="bg-white/95 backdrop-blur-md rounded-2xl border border-slate-200/90 shadow-[0_8px_25px_-5px_rgba(0,58,143,0.06)] p-5 mb-6 animate-cabinet-header">
                <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-4">

                    <div class="flex items-center gap-3 min-w-0">
                        <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-[#003A8F] to-[#0056C7] flex items-center justify-center text-white shadow-md shadow-blue-900/20 shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>

                        <div class="min-w-0">
                            <h3 class="text-lg font-black text-slate-800">Koleksi Lemari Arsip</h3>
                            <p class="text-xs text-slate-500 font-medium">
                                Menampilkan
                                <span class="font-extrabold text-[#003A8F]" id="cabinetCounter">{{ $cabinets->count() }}</span>
                                kabinet yang siap digunakan
                            </p>
                        </div>
                    </div>

                    <div class="cabinet-toolbar-actions">
                        <div class="cabinet-search-wrap">
                            <input
                                type="text"
                                id="cabinetSearchInput"
                                oninput="filterCabinets()"
                                placeholder="Cari nama atau kode kabinet..."
                                aria-label="Cari nama atau kode kabinet"
                                class="cabinet-search-input rounded-xl border border-slate-200 bg-slate-50/70 text-slate-800 placeholder-slate-400 focus:bg-white focus:border-[#0056C7] focus:ring-4 focus:ring-blue-500/10 transition-all outline-none">

                            <svg class="cabinet-search-icon text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>

                        @if(Auth::user()->role !== 'Kepala Kantor TVRI')
                            <a href="{{ route('cabinet.create') }}"
                                class="add-button cabinet-add-button inline-flex items-center justify-center gap-2 text-white text-sm font-extrabold px-5 rounded-xl">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M12 5v14M5 12h14" />
                                </svg>
                                <span>Tambah Kabinet</span>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            {{-- DAFTAR KABINET --}}
            @if ($cabinets->count() > 0)

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 animate-cabinet-list"
                    id="cabinetGridContainer">

                    @php $no = 1; @endphp

                    @foreach ($cabinets as $cabinet)
                        <div class="cabinet-3d-card group rounded-3xl p-6 flex flex-col justify-between overflow-hidden cabinet-card-item"
                            data-name="{{ strtolower($cabinet->cabinet_name) }}"
                            data-code="{{ strtolower($cabinet->cabinet_code ?? '') }}">

                            <div class="absolute top-0 left-0 right-0 h-1.5 bg-gradient-to-r from-[#002766] via-[#0056C7] to-amber-400 group-hover:h-2 transition-all"></div>

                            <div>
                                <div class="flex items-start justify-between gap-3 mb-4">
                                    <div class="cabinet-number-cube w-12 h-12 flex items-center justify-center rounded-2xl text-white font-black text-lg group-hover:scale-105 transition-transform shrink-0">
                                        {{ $no++ }}
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 border border-emerald-200/80 text-emerald-700 text-xs font-black">
                                            <span class="w-2 h-2 rounded-full bg-emerald-500 glow-pulse"></span>
                                            Aktif
                                        </span>

                                        @if(Auth::user()->role !== 'Kepala Kantor TVRI')
                                            <div class="flex items-center gap-1.5 ml-1">
                                                <a href="{{ route('cabinet.edit', $cabinet->id) }}"
                                                    class="w-8 h-8 rounded-xl bg-amber-50 hover:bg-amber-500 text-amber-600 hover:text-white border border-amber-200/70 flex items-center justify-center transition-all"
                                                    title="Edit Kabinet">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                    </svg>
                                                </a>

                                                <form action="{{ route('cabinet.destroy', $cabinet->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus kabinet ini?')">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                        class="w-8 h-8 rounded-xl bg-rose-50 hover:bg-rose-500 text-rose-600 hover:text-white border border-rose-200/70 flex items-center justify-center transition-all"
                                                        title="Hapus Kabinet">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-7 0h10" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <a href="{{ route('cabinet.show', $cabinet->id) }}" class="block">
                                    <h4 class="text-slate-900 font-black text-xl tracking-tight leading-snug group-hover:text-[#003A8F] transition-colors line-clamp-1">
                                        {{ $cabinet->cabinet_name }}
                                    </h4>
                                </a>

                                <div class="mt-2.5 flex items-center gap-2 flex-wrap">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-xl bg-blue-50 border border-blue-200 text-xs font-extrabold text-[#003A8F]">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                        {{ $cabinet->cabinet_code ?? 'Tanpa Kode' }}
                                    </span>

                                    <span class="text-xs text-slate-400 font-medium">Kabinet TVRI</span>
                                </div>

                                <p class="text-xs text-slate-500 mt-3 line-clamp-2 leading-relaxed">
                                    {{ $cabinet->description ?? 'Lemari penyimpanan arsip dan dokumen fisik/digital resmi TVRI Kalimantan Selatan.' }}
                                </p>
                            </div>

                            <div class="mt-5 pt-4 border-t border-slate-100">
                                <a href="{{ route('cabinet.show', $cabinet->id) }}"
                                    class="w-full flex items-center justify-between px-4 py-3 rounded-2xl bg-gradient-to-r from-[#003A8F] to-[#0056C7] hover:from-[#002766] hover:to-[#003A8F] text-white font-extrabold text-xs md:text-sm transition-all duration-300 shadow-md shadow-blue-900/20">

                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 19a2 2 0 01-2-2V7a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5a2 2 0 01-2 2z" />
                                        </svg>
                                        Buka Isi Kabinet
                                    </span>

                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- HASIL PENCARIAN KOSONG --}}
                <div id="noSearchResults"
                    class="hidden bg-white rounded-3xl p-10 text-center border border-slate-200 shadow-sm mt-4">
                    <div class="w-16 h-16 rounded-2xl bg-blue-50 text-[#003A8F] flex items-center justify-center mx-auto mb-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <h4 class="font-bold text-slate-800 text-lg">Kabinet Tidak Ditemukan</h4>
                    <p class="text-xs text-slate-500 mt-1">
                        Tidak ada kabinet yang sesuai dengan kata kunci pencarian Anda.
                    </p>
                </div>

                @if(method_exists($cabinets, 'links'))
                    <div class="mt-6">
                        {{ $cabinets->links() }}
                    </div>
                @endif

            @else

                {{-- EMPTY STATE --}}
                <div class="rounded-3xl p-10 md:p-16 text-center bg-white border border-slate-200 shadow-sm animate-cabinet-list">
                    <div class="w-24 h-24 rounded-3xl bg-gradient-to-br from-blue-50 to-indigo-100 border border-blue-100 flex items-center justify-center mx-auto mb-6 shadow-sm">
                        <svg class="w-12 h-12 text-[#003A8F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.7"
                                d="M3 7a2 2 0 012-2h3l2 2h9a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />
                        </svg>
                    </div>

                    <h3 class="text-2xl font-extrabold text-gray-800 mb-3">Belum Ada Kabinet</h3>
                    <p class="text-gray-500 mb-8 max-w-md mx-auto leading-relaxed">
                        Belum ada kabinet arsip yang tersedia. Tambahkan kabinet baru untuk mulai mengatur penyimpanan dokumen.
                    </p>

                    @if(Auth::user()->role !== 'Kepala Kantor TVRI')
                        <a href="{{ route('cabinet.create') }}"
                            class="add-button inline-flex items-center gap-2 px-6 py-3 text-white font-bold rounded-xl">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 5v14M5 12h14" />
                            </svg>
                            Tambah Kabinet
                        </a>
                    @endif
                </div>

            @endif
        </div>
    </div>

    {{-- PENCARIAN KABINET --}}
    <script>
        function filterCabinets() {
            const input = document.getElementById('cabinetSearchInput');

            if (!input) return;

            const query = input.value.toLowerCase().trim();
            const cards = document.querySelectorAll('.cabinet-card-item');
            let visibleCount = 0;

            cards.forEach(card => {
                const name = (card.getAttribute('data-name') || '').toLowerCase();
                const code = (card.getAttribute('data-code') || '').toLowerCase();
                const isMatch = name.includes(query) || code.includes(query);

                card.style.display = isMatch ? 'flex' : 'none';

                if (isMatch) visibleCount++;
            });

            const counter = document.getElementById('cabinetCounter');
            if (counter) counter.innerText = visibleCount;

            const noResults = document.getElementById('noSearchResults');
            if (noResults) {
                noResults.classList.toggle('hidden', visibleCount !== 0);
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            filterCabinets();
        });
    </script>

</x-app-layout>
