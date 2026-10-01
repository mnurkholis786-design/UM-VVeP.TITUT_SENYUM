<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Daftar Rak Arsip') }}
        </h2>
    </x-slot>

    {{-- TOMBOL KEMBALI --}}
    <div class="#">
        <div class="#">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
                <a href="{{ route('cabinet.show', $category->cabinet_id) }}"
                    class="inline-flex items-center gap-2 bg-gray-100 text-gray-700 px-2 py-2 rounded-full border border-gray-200
                    shadow-lg transition-all duration-200 ease-in-out hover:bg-gray-400 hover:shadow-md active:bg-gray-300 active:scale-95">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
            </div>
        </div>

        <div class="py-8 bg-gray-50 min-h-screen">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">

                {{-- ===================================================== --}}
                {{-- SECTION ARSIP FISIK --}}
                {{-- ===================================================== --}}

                <div class="bg-white shadow-md sm:rounded-xl p-6 border border-gray-200">

                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-gray-700">
                            Arsip Fisik
                        </h3>

                        {{-- Tombol Tambah Rak --}}
                        <a href="{{ route('rack.create', ['category_id' => $category->id]) }}"
                            class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700
                            text-white font-medium rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 whitespace-nowrap">

                            <img src="https://img.icons8.com/?size=24&id=48427&format=png&color=ffffff"
                                class="w-5" />

                            Tambah Rak Arsip
                        </a>
                    </div>


                    {{-- ================================================= --}}
                    {{-- SEARCH ARSIP FISIK --}}
                    {{-- ================================================= --}}

                    <form method="GET"
                        action="{{ url()->current() }}"
                        class="mb-6 bg-gray-50 p-4 rounded-xl border border-gray-200">

                        <div class="mb-3">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Cari Rak Arsip
                            </label>

                            <input type="text"
                                name="search_fisik"
                                value="{{ request('search_fisik') }}"
                                placeholder="Cari nama rak..."
                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                        </div>

                        <div class="flex items-center gap-2">

                            <button type="submit"
                                class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow transition">
                                Cari
                            </button>

                            <a href="{{ url()->current() }}"
                                class="px-5 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-medium rounded-lg transition text-center">
                                Reset
                            </a>

                        </div>
                    </form>


                    {{-- ================================================= --}}
                    {{-- DAFTAR RAK --}}
                    {{-- ================================================= --}}

                    @php
                        $no = 1;
                    @endphp

                    @if ($racks->count() > 0)

                        <div class="mt-4 space-y-4 rounded-lg">

                            @foreach ($racks as $rak)

                                <div
                                    class="flex items-center justify-between p-4 bg-white border border-gray-400 rounded-lg shadow-sm hover:shadow-md hover:bg-gray-300 transition group">

                                    {{-- Bagian Klik Utama --}}
                                    <a href="{{ route('rack.show', $rak->id) }}"
                                        class="flex items-center gap-4 flex-1 group-hover:text-indigo-600">

                                        <div
                                            class="w-8 h-8 flex items-center justify-center rounded-full bg-gradient-to-b from-[#003A8F] to-[#002766] text-white font-semibold">
                                            {{ $no++ }}
                                        </div>

                                        <div class="space-y-1">

                                            {{-- Nama Rak --}}
                                            <p class="text-gray-900 font-semibold text-base leading-tight">
                                                {{ $rak->rack_name }}
                                            </p>

                                            {{-- Informasi Detail --}}
                                            <div class="flex items-center gap-4 text-sm text-gray-600">

                                                <span
                                                    class="flex items-center gap-1 bg-indigo-100 px-2 py-0.5 rounded-lg text-indigo-700">

                                                    {{ $rak->category->category_name ?? '-' }}

                                                </span>

                                            </div>

                                        </div>

                                    </a>


                                    {{-- Tombol Aksi --}}
                                    <div class="flex items-center gap-2 ml-4">

                                        {{-- Edit --}}
                                        <a href="{{ route('rack.edit', $rak->id) }}"
                                            class="flex items-center justify-center bg-amber-500 hover:bg-orange-600 rounded-md p-2 transition"
                                            title="Edit">

                                            <img src="https://img.icons8.com/?size=24&id=88584&format=png&color=ffffff"
                                                alt="edit">

                                        </a>


                                        {{-- Hapus --}}
                                        <form action="{{ route('rack.delete', $rak->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus rak ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="flex items-center justify-center bg-red-500 hover:bg-red-600 rounded-md p-2 transition"
                                                title="Hapus">

                                                <img src="https://img.icons8.com/?size=24&id=43949&format=png&color=ffffff"
                                                    alt="delete">

                                            </button>

                                        </form>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @else

                        {{-- Empty State --}}
                        <div class="mt-6 text-center bg-white rounded-2xl shadow-md border border-gray-200 py-10">

                            <div
                                class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full mb-6 shadow-inner">

                                <svg class="w-8 h-8 text-gray-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />

                                </svg>

                            </div>

                            <p class="text-xl font-semibold text-gray-700 mb-3">
                                Belum Ada Rak Arsip
                            </p>

                            <p class="text-gray-500 mb-8 max-w-md mx-auto">
                                Tidak ada rak arsip yang tersedia. Silakan tambahkan rak pertama untuk mulai menyimpan dokumen Anda.
                            </p>

                        </div>

                    @endif

                </div>


                {{-- ===================================================== --}}
                {{-- SECTION ARSIP DIGITAL --}}
                {{-- ===================================================== --}}

                <div class="bg-white shadow-md sm:rounded-xl p-6 border border-gray-200">

                    <div class="flex justify-between items-center mb-6">

                        <h3 class="text-lg font-semibold text-gray-700">
                            Arsip Digital
                        </h3>

                        {{-- Tombol Tambah Arsip Digital --}}
                        <a href="{{ route('digital.create', ['category_id' => $category->id]) }}"
                            class="inline-flex items-center justify-center gap-2 px-4 py-2 bg-gradient-to-r from-emerald-500 to-teal-600 hover:from-emerald-600 hover:to-teal-700
                            text-white font-medium rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 whitespace-nowrap">

                            <img src="https://img.icons8.com/?size=24&id=48427&format=png&color=ffffff"
                                class="w-5" />

                            Tambah Arsip Digital

                        </a>

                    </div>


                    {{-- ================================================= --}}
                    {{-- SEARCH ARSIP DIGITAL --}}
                    {{-- ================================================= --}}

                    <form method="GET"
                        action="{{ url()->current() }}"
                        class="mb-4 bg-gray-50 p-4 rounded-xl border border-gray-200">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-3">
                            {{-- Input Pencarian Nama Arsip / Pengaju --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Cari Arsip Digital
                                </label>

                                <input type="text"
                                    name="search_digital"
                                    value="{{ request('search_digital') }}"
                                    placeholder="Cari nama arsip atau pengaju..."
                                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                            </div>

                            {{-- Dropdown Filter Divisi --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">
                                    Filter Divisi
                                </label>

                                <select name="divisi"
                                    class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white">
                                    <option value="">Semua Divisi</option>
                                    <option value="Berita" {{ request('divisi') == 'Berita' ? 'selected' : '' }}>Berita</option>
                                    <option value="Umum" {{ request('divisi') == 'Umum' ? 'selected' : '' }}>Umum</option>
                                    <option value="Program" {{ request('divisi') == 'Program' ? 'selected' : '' }}>Program</option>
                                    <option value="KMB" {{ request('divisi') == 'KMB' ? 'selected' : '' }}>KMB</option>
                                    <option value="Keuangan" {{ request('divisi') == 'Keuangan' ? 'selected' : '' }}>Keuangan</option>
                                    <option value="Bendahara" {{ request('divisi') == 'Bendahara' ? 'selected' : '' }}>Bendahara</option>
                                    <option value="Teknik" {{ request('divisi') == 'Teknik' ? 'selected' : '' }}>Teknik</option>
                                    <option value="Pengembangan usaha" {{ request('divisi') == 'Pengembangan usaha' ? 'selected' : '' }}>Pengembangan usaha</option>
                                    <option value="PPSPM" {{ request('divisi') == 'PPSPM' ? 'selected' : '' }}>PPSPM</option>
                                    <option value="Admin" {{ request('divisi') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">

                            <button type="submit"
                                class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow transition">

                                Cari

                            </button>

                            <a href="{{ url()->current() }}"
                                class="px-5 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 text-sm font-medium rounded-lg transition text-center">

                                Reset

                            </a>

                        </div>

                    </form>


                    {{-- ================================================= --}}
                    {{-- TAB 4 KATEGORI (PINDAH KE SINI: DI BAWAH SEARCH) --}}
                    {{-- ================================================= --}}

                    <div class="mb-6 overflow-x-auto">

                        <div class="flex gap-2 border-b border-gray-200 pb-2 min-w-max">

                            {{-- PERJALANAN DINAS --}}
                            <a href="{{ url()->current() }}?category=perjalanan-dinas"
                                class="px-4 py-2.5 rounded-lg text-sm font-medium whitespace-nowrap transition
                                {{ request('category') == 'perjalanan-dinas'
                                    ? 'bg-blue-600 text-white shadow'
                                    : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">

                                PERJALANAN DINAS

                            </a>


                            {{-- PRODUKSI --}}
                            <a href="{{ url()->current() }}?category=produksi"
                                class="px-4 py-2.5 rounded-lg text-sm font-medium whitespace-nowrap transition
                                {{ request('category') == 'produksi'
                                    ? 'bg-blue-600 text-white shadow'
                                    : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">

                                PRODUKSI

                            </a>


                            {{-- PENGADAAN BARANG DAN JASA --}}
                            <a href="{{ url()->current() }}?category=pengadaan-barang-jasa"
                                class="px-4 py-2.5 rounded-lg text-sm font-medium whitespace-nowrap transition
                                {{ request('category') == 'pengadaan-barang-jasa'
                                    ? 'bg-blue-600 text-white shadow'
                                    : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">

                                PENGADAAN BARANG DAN JASA

                            </a>


                            {{-- BELANJA PEGAWAI --}}
                            <a href="{{ url()->current() }}?category=belanja-pegawai"
                                class="px-4 py-2.5 rounded-lg text-sm font-medium whitespace-nowrap transition
                                {{ request('category') == 'belanja-pegawai'
                                    ? 'bg-blue-600 text-white shadow'
                                    : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">

                                BELANJA PEGAWAI

                            </a>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- DAFTAR ARSIP DIGITAL --}}
                    {{-- ================================================= --}}

                    @php
                        $noDigital = 1;
                    @endphp


                    @if ($digitalarchive->count() > 0)

                        <div class="divide-y divide-gray-200 rounded-lg border border-gray-100 space-y-4">

                            @foreach ($digitalarchive as $archive)

                                <div
                                    class="flex items-center justify-between p-4 bg-white border border-gray-400 rounded-lg shadow-sm hover:shadow-md hover:bg-gray-300 transition group">

                                    {{-- Bagian Klik Utama --}}
                                    <a href="{{ route('digital.show', $archive->id) }}"
                                        class="flex items-center gap-4 flex-1 group-hover:text-indigo-600">

                                        <div
                                            class="w-8 h-8 flex items-center justify-center rounded-full bg-gradient-to-b from-[#003A8F] to-[#002766] text-white font-semibold">

                                            {{ $noDigital++ }}

                                        </div>


                                        <div class="space-y-2 flex-1">

                                            {{-- Nama Arsip --}}
                                            <p class="text-gray-900 font-semibold text-base leading-tight">

                                                {{ $archive->archive_name }}

                                            </p>


                                            {{-- Informasi Detail --}}
                                            <div class="flex flex-wrap items-center gap-3 text-sm text-gray-600">

                                                <span class="flex items-center gap-1.5">

                                                    <img src="https://img.icons8.com/?size=16&id=23264&format=png&color=4b5563"
                                                        class="w-4 opacity-70">

                                                    <span class="text-gray-500">
                                                        Diajukan:
                                                    </span>

                                                    <span class="font-medium text-gray-700">
                                                        {{ $archive->submiter_name }}
                                                    </span>

                                                </span>


                                                <span class="text-gray-300">
                                                    •
                                                </span>


                                                <span class="flex items-center gap-1.5">

                                                    <span class="text-gray-500">
                                                        Ditandatangani:
                                                    </span>

                                                    <span class="font-medium text-gray-700">
                                                        {{ $archive->revenue_officer_name }}
                                                    </span>

                                                </span>

                                            </div>

                                        </div>

                                    </a>


                                    {{-- ================================================= --}}
                                    {{-- TOMBOL AKSI --}}
                                    {{-- ================================================= --}}

                                    <div class="flex items-center gap-2 ml-4">

                                        {{-- Lihat Detail --}}
                                        <a href="{{ route('digital.show', $archive->id) }}"
                                            class="flex items-center justify-center bg-emerald-500 hover:bg-emerald-600 rounded-md p-2 transition"
                                            title="Lihat Detail">

                                            <img src="https://img.icons8.com/?size=24&id=85146&format=png&color=ffffff"
                                                alt="view">

                                        </a>


                                        {{-- Edit --}}
                                        <a href="{{ route('digital.edit', $archive->id) }}"
                                            class="flex items-center justify-center bg-amber-500 hover:bg-orange-600 rounded-md p-2 transition"
                                            title="Edit">

                                            <img src="https://img.icons8.com/?size=24&id=88584&format=png&color=ffffff"
                                                alt="edit">

                                        </a>


                                        {{-- Hapus --}}
                                        <form action="{{ route('digital.destroy', $archive->id) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus arsip digital ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="flex items-center justify-center bg-red-500 hover:bg-red-600 rounded-md p-2 transition"
                                                title="Hapus">

                                                <img src="https://img.icons8.com/?size=24&id=43949&format=png&color=ffffff"
                                                    alt="delete">

                                            </button>

                                        </form>

                                    </div>

                                </div>

                            @endforeach


                            {{-- Pagination --}}
                            <div class="pt-4">

                                {{ $digitalarchive->links() }}

                            </div>

                        </div>

                    @else

                        {{-- ================================================= --}}
                        {{-- EMPTY STATE --}}
                        {{-- ================================================= --}}

                        <div class="mt-6 text-center bg-white rounded-2xl shadow-md border border-gray-200 py-10">

                            <div
                                class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full mb-6 shadow-inner">

                                <svg class="mx-auto mb-3 w-16 h-16 text-gray-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M3 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z" />

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M8 13h8" />

                                </svg>

                            </div>


                            <p class="text-xl font-semibold text-gray-700 mb-3">
                                Belum Ada Arsip Digital
                            </p>

                            <p class="text-gray-500 mb-8 max-w-md mx-auto">
                                Tidak ada arsip digital yang tersedia.
                                Silakan tambahkan arsip digital pertama untuk mulai menyimpan dokumen Anda.
                            </p>

                        </div>

                    @endif

                </div>

            </div>
        </div>

    </div>

</x-app-layout>