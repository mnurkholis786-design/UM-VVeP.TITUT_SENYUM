<x-app-layout>

    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-cyan-600 to-blue-700 flex items-center justify-center shadow-lg shadow-cyan-900/20">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                </svg>
            </div>

            <div>
                <h2 class="font-bold text-xl text-gray-800 leading-tight">
                    {{ __('Direktori Arsip Digital') }}
                </h2>
                <p class="text-xs text-gray-500 mt-0.5">
                    Rekapitulasi dan klasifikasi berkas arsip digital
                </p>
            </div>
        </div>
    </x-slot>

    {{-- =========================================================
        CUSTOM STYLE
    ========================================================== --}}
    <style>
        .digital-page {
            background:
                radial-gradient(circle at 5% 5%, rgba(6, 182, 212, 0.08), transparent 25%),
                radial-gradient(circle at 95% 15%, rgba(37, 99, 235, 0.07), transparent 25%),
                #f8fafc;
        }

        .digital-hero {
            background:
                radial-gradient(circle at 88% 15%, rgba(56, 189, 248, 0.25), transparent 25%),
                linear-gradient(135deg, #003A8F 0%, #0284c7 60%, #0369a1 100%);
            box-shadow: 0 18px 40px rgba(2, 132, 199, 0.22);
        }

        .category-card {
            transition: all 0.25s ease;
        }

        .category-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 15px 30px rgba(15, 23, 42, 0.10);
        }
    </style>

    {{-- =========================================================
        MAIN CONTENT
    ========================================================== --}}
    <div class="digital-page min-h-screen py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-7">

            {{-- HERO BANNER --}}
            <div class="digital-hero rounded-2xl p-7 sm:p-9 text-white">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                    <div>
                        <div class="inline-flex items-center gap-2 px-3 py-1.5 mb-3 rounded-full bg-white/10 border border-white/20 backdrop-blur-sm">
                            <span class="w-2 h-2 rounded-full bg-cyan-400"></span>
                            <span class="text-xs font-medium text-cyan-100">Digital Archive Repository</span>
                        </div>
                        <h1 class="text-2xl sm:text-3xl font-bold mb-2">
                            Pusat Data Arsip Digital
                        </h1>
                        <p class="text-cyan-100 text-sm max-w-xl leading-relaxed">
                            Klasifikasi dan rekapitulasi dokumen digital berdasarkan standar kode klasifikasi penyiaran dan administrasi perkantoran.
                        </p>
                    </div>

                    {{-- STAT SHORTCUT --}}
                    <div class="flex items-center gap-3">
                        <div class="px-5 py-4 rounded-xl bg-white/15 border border-white/20 backdrop-blur-md text-center">
                            <p class="text-xs text-cyan-200 uppercase font-semibold">Total Dokumen</p>
                            <p class="text-2xl font-bold mt-0.5">
                                {{ array_sum($counts->toArray()) }}
                            </p>
                        </div>
                        <div class="px-5 py-4 rounded-xl bg-white/15 border border-white/20 backdrop-blur-md text-center">
                            <p class="text-xs text-cyan-200 uppercase font-semibold">Kategori</p>
                            <p class="text-2xl font-bold mt-0.5">
                                {{ count($kategoriList) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- =========================================================
                TABEL DOKUMEN (MUNCUL JIKA KATEGORI DIPILIH)
            ========================================================== --}}
            @if($selectedKategori && $archives)
                @php
                    $labelAktif = \App\Models\DigitalArchive::KATEGORI_LABEL[$selectedKategori] ?? $selectedKategori;
                @endphp
                <div id="daftar-dokumen" class="bg-white rounded-2xl border-2 border-cyan-500 shadow-md p-6 space-y-5">
                    
                    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-4 border-b border-gray-100">
                        <div>
                            <div class="inline-flex items-center gap-2 px-2.5 py-1 rounded-md text-xs font-bold bg-cyan-100 text-cyan-800 mb-2">
                                Kategori Terpilih: {{ $selectedKategori }}
                            </div>
                            <h3 class="text-lg font-bold text-gray-800">
                                {{ $labelAktif }}
                            </h3>
                            <p class="text-xs text-gray-500 mt-0.5">
                                Menampilkan total {{ $archives->total() }} berkas dokumen arsip digital
                            </p>
                        </div>

                        <div class="flex items-center gap-2 shrink-0">
                            {{-- FORM SEARCH DALAM KATEGORI --}}
                            <form method="GET" action="{{ route('digital.index') }}" class="flex items-center gap-1.5">
                                <input type="hidden" name="kategori" value="{{ $selectedKategori }}">
                                <input type="text" name="search" value="{{ request('search') }}" 
                                    placeholder="Cari nama arsip..." 
                                    class="text-xs rounded-xl border-gray-200 focus:ring-cyan-500 focus:border-cyan-500 py-2 px-3">
                                <button type="submit" class="px-3 py-2 bg-cyan-600 text-white rounded-xl text-xs font-semibold hover:bg-cyan-700 transition">
                                    Cari
                                </button>
                            </form>

                            {{-- TOMBOL TUTUP / SEMUA --}}
                            <a href="{{ route('digital.index') }}" 
                                class="px-3 py-2 rounded-xl bg-gray-100 text-gray-600 hover:bg-gray-200 text-xs font-semibold transition">
                                ✕ Tutup
                            </a>
                        </div>
                    </div>

                    {{-- TABEL ARSIP --}}
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-600">
                            <thead class="bg-slate-50 text-xs uppercase text-gray-500 font-semibold border-y border-gray-100">
                                <tr>
                                    <th class="px-4 py-3">No</th>
                                    <th class="px-4 py-3">Nama Berkas Arsip</th>
                                    <th class="px-4 py-3">Pengirim / Divisi</th>
                                    <th class="px-4 py-3">Nominal</th>
                                    <th class="px-4 py-3">Tanggal</th>
                                    <th class="px-4 py-3 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($archives as $index => $item)
                                    <tr class="hover:bg-cyan-50/40 transition">
                                        <td class="px-4 py-3 text-xs">{{ $archives->firstItem() + $index }}</td>
                                        <td class="px-4 py-3">
                                            <p class="font-semibold text-gray-800 text-sm">{{ $item->archive_name }}</p>
                                            @if($item->archive_code)
                                                <span class="text-[11px] text-gray-400">Kode: {{ $item->archive_code }}</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-xs text-gray-600">
                                            {{ $item->submiter_name ?: ($item->from_division ?: '-') }}
                                        </td>
                                        <td class="px-4 py-3 text-xs font-medium text-gray-700">
                                            {{ $item->nominal > 0 ? 'Rp ' . number_format($item->nominal, 0, ',', '.') : '-' }}
                                        </td>
                                        <td class="px-4 py-3 text-xs text-gray-500">
                                            {{ $item->created_at ? $item->created_at->format('d/m/Y') : '-' }}
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            <a href="{{ route('digital.show', $item->id) }}" 
                                                class="px-3 py-1.5 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-100 text-xs font-semibold transition inline-flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                Detail
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-8 text-center text-gray-400 text-xs">
                                            Tidak ada dokumen arsip pada kategori ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- PAGINATION --}}
                    @if($archives->hasPages())
                        <div class="pt-3 border-t border-gray-100">
                            {{ $archives->links() }}
                        </div>
                    @endif

                </div>
            @endif

            {{-- HEADER LIST KATEGORI --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2">
                <div>
                    <h3 class="font-bold text-gray-800 text-lg">Pilih Klasifikasi Kategori</h3>
                    <p class="text-xs text-gray-500">Klik salah satu kartu kategori di bawah untuk langsung membuka daftar dokumennya</p>
                </div>

                <div class="flex items-center gap-3">
                    <a href="{{ route('cabinet.index') }}" 
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-blue-600 text-white text-xs font-semibold hover:bg-blue-700 shadow-sm transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 7a2 2 0 012-2h3l2 2h9a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />
                        </svg>
                        Buka Lemari Kabinet
                    </a>

                    <a href="{{ route('bendahara.dashboard') }}" 
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white border border-gray-200 text-gray-700 text-xs font-semibold hover:bg-gray-50 transition">
                        Dashboard Bendahara
                    </a>
                </div>
            </div>

            {{-- GRID KARTU KATEGORI --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach($kategoriList as $kategori)
                    @php
                        $jumlah = $counts[$kategori] ?? 0;
                        $label = \App\Models\DigitalArchive::KATEGORI_LABEL[$kategori] ?? $kategori;
                        $isActive = ($selectedKategori === $kategori);
                    @endphp
                    <a href="{{ route('digital.index', ['kategori' => $kategori]) }}#daftar-dokumen"
                        class="category-card block rounded-2xl border p-5 shadow-sm transition {{ $isActive ? 'bg-cyan-50/70 border-cyan-500 ring-2 ring-cyan-400' : 'bg-white border-gray-200 hover:border-cyan-300' }}">
                        <div class="flex flex-col h-full justify-between">
                            <div>
                                <div class="flex items-start justify-between gap-3 mb-3">
                                    <span class="px-3 py-1 rounded-lg text-xs font-bold {{ $isActive ? 'bg-cyan-600 text-white' : 'bg-cyan-50 text-cyan-700 border border-cyan-200' }}">
                                        {{ $kategori }}
                                    </span>

                                    <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $jumlah > 0 ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500' }}">
                                        {{ $jumlah }} Dokumen
                                    </span>
                                </div>

                                <h4 class="font-semibold text-gray-800 text-sm leading-snug">
                                    {{ $label }}
                                </h4>
                            </div>

                            <div class="pt-4 mt-4 border-t border-gray-100 flex items-center justify-between">
                                <span class="text-xs text-gray-400">Kode Klasifikasi</span>
                                <span class="text-xs font-semibold text-cyan-600 inline-flex items-center gap-1">
                                    {{ $isActive ? 'Sedang Dibuka' : 'Lihat Dokumen' }}
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </div>

</x-app-layout>