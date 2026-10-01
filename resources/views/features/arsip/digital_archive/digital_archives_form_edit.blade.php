<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center shadow-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.5-9.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 7.5-7.5z" />
                </svg>
            </div>

            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    {{ __('Edit Arsip Digital') }}
                </h2>

                <p class="text-sm text-gray-500 mt-0.5">
                    Perbarui informasi arsip digital
                </p>
            </div>
        </div>
    </x-slot>


    {{-- ========================================================= --}}
    {{-- BACK BUTTON --}}
    {{-- ========================================================= --}}

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-5">

        <a href="{{ route('year.show', $digital->category_id) }}"
            class="group inline-flex items-center gap-2 px-4 py-2.5 rounded-xl
            bg-white border border-gray-200 text-gray-600
            shadow-sm hover:shadow-md hover:border-blue-200 hover:text-blue-600
            transition-all duration-200">

            <svg class="w-5 h-5 transition-transform duration-200 group-hover:-translate-x-1"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />

            </svg>

            <span class="text-sm font-semibold">
                Kembali
            </span>

        </a>

    </div>


    {{-- ========================================================= --}}
    {{-- MAIN CONTAINER --}}
    {{-- ========================================================= --}}

    <div class="py-7 bg-gradient-to-b from-gray-50 to-white min-h-screen">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- ===================================================== --}}
            {{-- HERO --}}
            {{-- ===================================================== --}}

            <div class="relative overflow-hidden rounded-3xl
                bg-gradient-to-br from-blue-700 via-blue-600 to-indigo-700
                shadow-2xl shadow-blue-200/50 mb-7">

                <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full bg-white/10 blur-2xl"></div>
                <div class="absolute -bottom-24 -left-16 w-72 h-72 rounded-full bg-indigo-400/20 blur-3xl"></div>

                <div class="relative px-6 sm:px-8 py-7">

                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

                        <div class="flex items-start gap-4">

                            <div class="w-14 h-14 rounded-2xl bg-white/15 border border-white/20
                                backdrop-blur-md flex items-center justify-center flex-shrink-0 shadow-lg">

                                <svg class="w-7 h-7 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.5-9.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 7.5-7.5z" />

                                </svg>

                            </div>

                            <div>

                                <div class="flex flex-wrap items-center gap-2 mb-2">

                                    <span class="inline-flex items-center px-3 py-1 rounded-full
                                        bg-white/15 border border-white/20
                                        text-white text-xs font-semibold backdrop-blur-sm">

                                        EDIT ARSIP

                                    </span>

                                    @if(!empty($digital->archive_code))

                                        <span class="inline-flex items-center px-3 py-1 rounded-full
                                            bg-white/10 border border-white/15
                                            text-blue-50 text-xs font-medium">

                                            {{ $digital->archive_code }}

                                        </span>

                                    @endif

                                </div>

                                <h3 class="text-2xl sm:text-3xl font-bold text-white leading-tight">
                                    Edit Arsip Digital
                                </h3>

                                <p class="text-blue-100 text-sm mt-2 max-w-2xl">
                                    Perbarui data, informasi klasifikasi, petugas, dan file arsip
                                    dengan teliti sebelum menyimpan perubahan.
                                </p>

                            </div>

                        </div>

                        <div class="hidden lg:flex items-center justify-center w-16 h-16
                            rounded-2xl bg-white/10 border border-white/20 backdrop-blur-md">

                            <svg class="w-8 h-8 text-white/90"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M12 6v12m-6-6h12" />

                            </svg>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- FORM CARD --}}
            {{-- ===================================================== --}}

            <div class="bg-white rounded-3xl border border-gray-200 shadow-xl shadow-gray-200/50 overflow-hidden">

                <form
                    action="{{ route('digital.update', $digital->id) }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="divide-y divide-gray-100"
                >

                    @csrf
                    @method('PUT')


                    {{-- ===================================================== --}}
                    {{-- SECTION INFORMASI UTAMA --}}
                    {{-- ===================================================== --}}

                    <div class="p-6 sm:p-8">

                        <div class="flex items-center gap-4 mb-7">

                            <div class="w-11 h-11 rounded-xl bg-blue-50 text-blue-600
                                flex items-center justify-center flex-shrink-0">

                                <svg class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l4.414 4.414A1 1 0 0118 8.414V19a2 2 0 01-2 2z" />

                                </svg>

                            </div>

                            <div>
                                <h4 class="text-lg font-bold text-gray-800">
                                    Informasi Arsip
                                </h4>

                                <p class="text-sm text-gray-500">
                                    Informasi dasar dan klasifikasi arsip digital
                                </p>
                            </div>

                        </div>


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                            {{-- NAMA DIGITAL --}}

                            <div class="md:col-span-2">

                                <label class="form-label">
                                    Nama Digital
                                </label>

                                <input
                                    type="text"
                                    name="digital_name"
                                    value="{{ old('digital_name', $digital->archive_name) }}"
                                    class="form-input text-lg font-semibold"
                                    placeholder="Masukkan nama digital"
                                >

                                @error('digital_name')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- KATEGORI --}}

                            <div class="md:col-span-2">

                                <label class="form-label">
                                    Kategori Arsip
                                    <span class="text-red-500">*</span>
                                </label>

                                @php
                                    $currentKategori = old('kategori', $digital->kategori ?? '');
                                @endphp

                                <div class="relative">

                                    <select
                                        name="kategori"
                                        id="kategori"
                                        required
                                        class="form-input appearance-none pr-11 font-medium"
                                    >

                                        <option value="">
                                            -- Pilih Kategori Arsip --
                                        </option>

                                        <optgroup label="AEC - Kerja Sama">

                                            <option value="AEC.001"
                                                {{ $currentKategori == 'AEC.001' ? 'selected' : '' }}>
                                                AEC.001 Kerja Sama Jasa Siaran dan Digitalisasi Penyiaran Daerah
                                            </option>

                                        </optgroup>

                                        <optgroup label="BAH - Pelayanan Publik Lainnya">

                                            <option value="BAH.001"
                                                {{ $currentKategori == 'BAH.001' ? 'selected' : '' }}>
                                                BAH.001 Siaran Berita, Current Affairs dan Olahraga
                                            </option>

                                            <option value="BAH.002"
                                                {{ $currentKategori == 'BAH.002' ? 'selected' : '' }}>
                                                BAH.002 Siaran Program dan Promosi Acara
                                            </option>

                                            <option value="BAH.003"
                                                {{ $currentKategori == 'BAH.003' ? 'selected' : '' }}>
                                                BAH.003 Siaran Konten Media Baru
                                            </option>

                                        </optgroup>

                                        <optgroup label="CBR - Dukungan Teknis">

                                            <option value="CBR.001"
                                                {{ $currentKategori == 'CBR.001' ? 'selected' : '' }}>
                                                CBR.001 Dukungan Teknis Kinerja Transmisi, Multipleksing dan Fasilitas Teknik
                                            </option>

                                        </optgroup>

                                        <optgroup label="CBT - Prasarana Bidang Teknologi Informasi dan Komunikasi">

                                            <option value="CBT.002"
                                                {{ $currentKategori == 'CBT.002' ? 'selected' : '' }}>
                                                CBT.002 Sarana dan Prasarana Teknik Produksi dan Penyiaran
                                            </option>

                                        </optgroup>

                                        <optgroup label="CDS - Prasarana Bidang Teknologi Informasi dan Komunikasi">

                                            <option value="CDS.001"
                                                {{ $currentKategori == 'CDS.001' ? 'selected' : '' }}>
                                                CDS.001 Pemeliharaan Transmisi, Multipleksing dan Fasilitas Teknik
                                            </option>

                                            <option value="CDS.002"
                                                {{ $currentKategori == 'CDS.002' ? 'selected' : '' }}>
                                                CDS.002 Pemeliharaan Peralatan Teknik Produksi dan Penyiaran
                                            </option>

                                            <option value="CDS.003"
                                                {{ $currentKategori == 'CDS.003' ? 'selected' : '' }}>
                                                CDS.003 Pemeliharaan Infrastruktur Teknologi Informatika dan Media Baru
                                            </option>

                                        </optgroup>

                                        <optgroup label="EBA - Layanan Dukungan Manajemen Internal">

                                            <option value="EBA.994"
                                                {{ $currentKategori == 'EBA.994' ? 'selected' : '' }}>
                                                EBA.994 Layanan Perkantoran
                                            </option>

                                        </optgroup>

                                        <optgroup label="WA - Program Dukungan Manajemen">

                                            <option value="WA.4376"
                                                {{ $currentKategori == 'WA.4376' ? 'selected' : '' }}>
                                                WA.4376 Pelaksanaan Dukungan Manajemen dan Tugas Teknis Lainnya Stasiun Penyiaran TV Publik Lokal dan Regional
                                            </option>

                                        </optgroup>

                                    </select>

                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">

                                        <svg class="w-5 h-5"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M19 9l-7 7-7-7" />

                                        </svg>

                                    </div>

                                </div>

                                @error('kategori')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- KODE ARSIP --}}

                            <div>

                                <label class="form-label">
                                    Kode Arsip
                                </label>

                                <input
                                    type="text"
                                    name="digital_code"
                                    value="{{ old('digital_code', $digital->archive_code) }}"
                                    class="form-input"
                                    placeholder="Kode Arsip"
                                >

                                @error('digital_code')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- DIVISI ASAL --}}

                            <div>

                                <label class="form-label">
                                    Divisi Asal
                                </label>

                                <input
                                    type="text"
                                    name="from_division"
                                    value="{{ old('from_division', $digital->from_division) }}"
                                    class="form-input"
                                    placeholder="Divisi Asal"
                                >

                                @error('from_division')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- KODE KLASIFIKASI --}}

                            <div>

                                <label class="form-label">
                                    Kode Klasifikasi
                                </label>

                                <input
                                    type="text"
                                    name="kode_klasifikasi"
                                    value="{{ old('kode_klasifikasi', $digital->kode_klasifikasi) }}"
                                    class="form-input"
                                    placeholder="Kode Klasifikasi"
                                >

                                @error('kode_klasifikasi')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- INDEKS 1 --}}

                            <div>

                                <label class="form-label">
                                    Indeks 1
                                </label>

                                <input
                                    type="text"
                                    name="indeks1"
                                    value="{{ old('indeks1', $digital->indeks1) }}"
                                    class="form-input"
                                    placeholder="Indeks 1"
                                >

                                @error('indeks1')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- INDEKS 2 --}}

                            <div>

                                <label class="form-label">
                                    Indeks 2
                                </label>

                                <input
                                    type="text"
                                    name="indeks2"
                                    value="{{ old('indeks2', $digital->indeks2) }}"
                                    class="form-input"
                                    placeholder="Indeks 2"
                                >

                                @error('indeks2')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- NO ITEM --}}

                            <div>

                                <label class="form-label">
                                    No Item
                                </label>

                                <input
                                    type="text"
                                    name="no_item"
                                    value="{{ old('no_item', $digital->no_item) }}"
                                    class="form-input"
                                    placeholder="No Item"
                                >

                                @error('no_item')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- NOMINAL --}}

                            <div>

                                <label class="form-label">
                                    Nominal
                                </label>

                                <div class="relative">

                                    <span class="absolute left-4 top-1/2 -translate-y-1/2
                                        text-sm font-semibold text-gray-400">
                                        Rp
                                    </span>

                                    <input
                                        type="number"
                                        name="nominal"
                                        value="{{ old('nominal', $digital->nominal) }}"
                                        class="form-input pl-11"
                                        placeholder="0"
                                    >

                                </div>

                                @error('nominal')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- URAIAN --}}

                            <div class="md:col-span-2">

                                <label class="form-label">
                                    Uraian
                                </label>

                                <textarea
                                    name="uraian"
                                    rows="4"
                                    class="form-input resize-y"
                                    placeholder="Uraian singkat mengenai arsip"
                                >{{ old('uraian', $digital->uraian) }}</textarea>

                                @error('uraian')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>

                    </div>


                    {{-- ===================================================== --}}
                    {{-- SECTION KEUANGAN --}}
                    {{-- ===================================================== --}}

                    <div class="p-6 sm:p-8 bg-gray-50/60">

                        <div class="flex items-center gap-4 mb-7">

                            <div class="w-11 h-11 rounded-xl bg-emerald-50 text-emerald-600
                                flex items-center justify-center flex-shrink-0">

                                <svg class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V6m0 12v-2m0 2c-1.11 0-2.08-.402-2.599-1M12 18c-1.657 0-3-.895-3-2m3 2c1.657 0 3-.895 3-2m-6-6H5m14 0h-3" />

                                </svg>

                            </div>

                            <div>
                                <h4 class="text-lg font-bold text-gray-800">
                                    Informasi Keuangan
                                </h4>

                                <p class="text-sm text-gray-500">
                                    Data SPBy, SPM, SP2D, dan invoice
                                </p>
                            </div>

                        </div>


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                            {{-- NO SPBY --}}

                            <div class="md:col-span-2">

                                <label class="form-label">
                                    No SPBy
                                </label>

                                <input
                                    type="text"
                                    name="no_spby"
                                    value="{{ old('no_spby', $digital->no_spby) }}"
                                    class="form-input"
                                    placeholder="No SPBy"
                                >

                                @error('no_spby')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- NO SPM --}}

                            <div>

                                <label class="form-label">
                                    No SPM
                                </label>

                                <input
                                    type="text"
                                    name="no_spm"
                                    value="{{ old('no_spm', $digital->no_spm) }}"
                                    class="form-input"
                                    placeholder="No SPM"
                                >

                                @error('no_spm')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- JENIS SPM --}}

                            <div>

                                <label class="form-label">
                                    Jenis SPM
                                </label>

                                <input
                                    type="text"
                                    name="jenis_spm"
                                    value="{{ old('jenis_spm', $digital->jenis_spm) }}"
                                    class="form-input"
                                    placeholder="Jenis SPM"
                                >

                                @error('jenis_spm')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- NO SP2D --}}

                            <div>

                                <label class="form-label">
                                    No SP2D
                                </label>

                                <input
                                    type="text"
                                    name="no_sp2d"
                                    value="{{ old('no_sp2d', $digital->no_sp2d) }}"
                                    class="form-input"
                                    placeholder="No SP2D"
                                >

                                @error('no_sp2d')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- NILAI SP2D --}}

                            <div>

                                <label class="form-label">
                                    Nilai SP2D
                                </label>

                                <div class="relative">

                                    <span class="absolute left-4 top-1/2 -translate-y-1/2
                                        text-sm font-semibold text-gray-400">
                                        Rp
                                    </span>

                                    <input
                                        type="number"
                                        name="nilai_sp2d"
                                        value="{{ old('nilai_sp2d', $digital->nilai_sp2d) }}"
                                        class="form-input pl-11"
                                        placeholder="0"
                                    >

                                </div>

                                @error('nilai_sp2d')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- JENIS SP2D --}}

                            <div>

                                <label class="form-label">
                                    Jenis SP2D
                                </label>

                                <input
                                    type="text"
                                    name="jenis_sp2d"
                                    value="{{ old('jenis_sp2d', $digital->jenis_sp2d) }}"
                                    class="form-input"
                                    placeholder="Jenis SP2D"
                                >

                                @error('jenis_sp2d')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- TANGGAL SP2D --}}

                            <div>

                                <label class="form-label">
                                    Tanggal SP2D
                                </label>

                                <input
                                    type="date"
                                    name="tgl_sp2d"
                                    value="{{ old('tgl_sp2d', $digital->tgl_sp2d) }}"
                                    class="form-input"
                                >

                                @error('tgl_sp2d')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- TANGGAL SELESAI SP2D --}}

                            <div>

                                <label class="form-label">
                                    Tanggal Selesai SP2D
                                </label>

                                <input
                                    type="date"
                                    name="tgl_selesai_sp2d"
                                    value="{{ old('tgl_selesai_sp2d', $digital->tgl_selesai_sp2d) }}"
                                    class="form-input"
                                >

                                @error('tgl_selesai_sp2d')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- NO INVOICE --}}

                            <div>

                                <label class="form-label">
                                    No Invoice
                                </label>

                                <input
                                    type="text"
                                    name="no_invoice"
                                    value="{{ old('no_invoice', $digital->no_invoice) }}"
                                    class="form-input"
                                    placeholder="No Invoice"
                                >

                                @error('no_invoice')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- TANGGAL INVOICE --}}

                            <div>

                                <label class="form-label">
                                    Tanggal Invoice
                                </label>

                                <input
                                    type="date"
                                    name="tgl_invoice"
                                    value="{{ old('tgl_invoice', $digital->tgl_invoice) }}"
                                    class="form-input"
                                >

                                @error('tgl_invoice')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- TANGGAL TERIMA --}}

                            <div>

                                <label class="form-label">
                                    Tanggal Terima
                                </label>

                                <input
                                    type="date"
                                    name="tgl_terima"
                                    value="{{ old('tgl_terima', $digital->tgl_terima) }}"
                                    class="form-input"
                                >

                                @error('tgl_terima')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>

                    </div>


                    {{-- ===================================================== --}}
                    {{-- SECTION RETENSI --}}
                    {{-- ===================================================== --}}

                    <div class="p-6 sm:p-8">

                        <div class="flex items-center gap-4 mb-7">

                            <div class="w-11 h-11 rounded-xl bg-violet-50 text-violet-600
                                flex items-center justify-center flex-shrink-0">

                                <svg class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />

                                </svg>

                            </div>

                            <div>
                                <h4 class="text-lg font-bold text-gray-800">
                                    Retensi & Keamanan Arsip
                                </h4>

                                <p class="text-sm text-gray-500">
                                    Pengaturan masa simpan dan klasifikasi arsip
                                </p>
                            </div>

                        </div>


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                            {{-- TINGKAT PERTIMBANGAN --}}

                            <div>

                                <label class="form-label">
                                    Tingkat Pertimbangan
                                </label>

                                <input
                                    type="text"
                                    name="tingkat_pertimbangan"
                                    value="{{ old('tingkat_pertimbangan', $digital->tingkat_pertimbangan) }}"
                                    class="form-input"
                                    placeholder="Tingkat Pertimbangan"
                                >

                                @error('tingkat_pertimbangan')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- JUMLAH HALAMAN --}}

                            <div>

                                <label class="form-label">
                                    Jumlah Halaman
                                </label>

                                <input
                                    type="number"
                                    name="jumlah_halaman"
                                    value="{{ old('jumlah_halaman', $digital->jumlah_halaman) }}"
                                    class="form-input"
                                    placeholder="Jumlah Halaman"
                                >

                                @error('jumlah_halaman')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- RETENSI AKTIF --}}

                            <div>

                                <label class="form-label">
                                    Retensi Arsip Aktif
                                    <span class="text-xs font-normal text-gray-400">(Tahun)</span>
                                </label>

                                <input
                                    type="number"
                                    name="retensi_arsip_aktif"
                                    value="{{ old('retensi_arsip_aktif', $digital->retensi_arsip_aktif) }}"
                                    class="form-input"
                                    placeholder="Retensi Arsip Aktif"
                                >

                                @error('retensi_arsip_aktif')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- RETENSI INAKTIF --}}

                            <div>

                                <label class="form-label">
                                    Retensi Arsip Inaktif
                                    <span class="text-xs font-normal text-gray-400">(Tahun)</span>
                                </label>

                                <input
                                    type="number"
                                    name="retensi_arsip_inaktif"
                                    value="{{ old('retensi_arsip_inaktif', $digital->retensi_arsip_inaktif) }}"
                                    class="form-input"
                                    placeholder="Retensi Arsip Inaktif"
                                >

                                @error('retensi_arsip_inaktif')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- NASIB AKHIR --}}

                            <div>

                                <label class="form-label">
                                    Nasib Akhir Arsip
                                </label>

                                <input
                                    type="text"
                                    name="nasib_akhir_arsip"
                                    value="{{ old('nasib_akhir_arsip', $digital->nasib_akhir_arsip) }}"
                                    class="form-input"
                                    placeholder="Nasib Akhir Arsip"
                                >

                                @error('nasib_akhir_arsip')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- KLASIFIKASI KEAMANAN --}}

                            <div>

                                <label class="form-label">
                                    Klasifikasi Keamanan
                                </label>

                                <input
                                    type="text"
                                    name="klasifikasi_keamanan"
                                    value="{{ old('klasifikasi_keamanan', $digital->klasifikasi_keamanan) }}"
                                    class="form-input"
                                    placeholder="Klasifikasi Keamanan"
                                >

                                @error('klasifikasi_keamanan')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- STATUS --}}

                            <div>

                                <label class="form-label">
                                    Status
                                </label>

                                <input
                                    type="text"
                                    name="status"
                                    value="{{ old('status', $digital->status) }}"
                                    class="form-input"
                                    placeholder="Status"
                                >

                                @error('status')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- TANGGAL PEMBUANGAN --}}

                            <div>

                                <label class="form-label">
                                    Tanggal Pembuangan
                                </label>

                                <input
                                    type="date"
                                    name="disposal_date"
                                    value="{{ old('disposal_date', $digital->disposal_date) }}"
                                    class="form-input"
                                >

                                @error('disposal_date')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>

                    </div>


                    {{-- ===================================================== --}}
                    {{-- SECTION PETUGAS --}}
                    {{-- ===================================================== --}}

                    <div class="p-6 sm:p-8 bg-gray-50/60">

                        <div class="flex items-center gap-4 mb-7">

                            <div class="w-11 h-11 rounded-xl bg-indigo-50 text-indigo-600
                                flex items-center justify-center flex-shrink-0">

                                <svg class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />

                                </svg>

                            </div>

                            <div>
                                <h4 class="text-lg font-bold text-gray-800">
                                    Informasi Petugas
                                </h4>

                                <p class="text-sm text-gray-500">
                                    Data pengguna yang berkaitan dengan arsip
                                </p>
                            </div>

                        </div>


                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">


                            {{-- PENGAJU --}}

                            <div class="rounded-2xl bg-purple-50 border border-purple-100 p-5">

                                <label class="text-xs font-bold uppercase tracking-wider text-purple-600 mb-3 block">
                                    Pengaju
                                </label>

                                <input
                                    type="text"
                                    name="submiter_name"
                                    value="{{ old('submiter_name', $digital->submiter_name) }}"
                                    class="w-full text-sm font-semibold text-gray-800 px-4 py-3
                                    bg-white rounded-xl border border-purple-200
                                    focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition"
                                    placeholder="Nama Pengaju"
                                >

                                @error('submiter_name')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- KEUANGAN --}}

                            <div class="rounded-2xl bg-teal-50 border border-teal-100 p-5">

                                <label class="text-xs font-bold uppercase tracking-wider text-teal-600 mb-3 block">
                                    Divisi Keuangan
                                </label>

                                <input
                                    type="text"
                                    name="finance_officer_name"
                                    value="{{ old('finance_officer_name', $digital->finance_officer_name) }}"
                                    class="w-full text-sm font-semibold text-gray-800 px-4 py-3
                                    bg-white rounded-xl border border-teal-200
                                    focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition"
                                    placeholder="Nama Finance Officer"
                                >

                                @error('finance_officer_name')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- BENDAHARA --}}

                            <div class="rounded-2xl bg-blue-50 border border-blue-100 p-5">

                                <label class="text-xs font-bold uppercase tracking-wider text-blue-600 mb-3 block">
                                    Bendahara
                                </label>

                                <input
                                    type="text"
                                    name="revenue_officer_name"
                                    value="{{ old('revenue_officer_name', $digital->revenue_officer_name) }}"
                                    class="w-full text-sm font-semibold text-gray-800 px-4 py-3
                                    bg-white rounded-xl border border-blue-200
                                    focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                    placeholder="Nama Bendahara"
                                >

                                @error('revenue_officer_name')
                                    <p class="form-error">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>

                    </div>


                    {{-- ===================================================== --}}
                    {{-- SECTION FILE --}}
                    {{-- ===================================================== --}}

                    <div class="p-6 sm:p-8">

                        <div class="flex items-center gap-4 mb-7">

                            <div class="w-11 h-11 rounded-xl bg-red-50 text-red-600
                                flex items-center justify-center flex-shrink-0">

                                <svg class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M7 3h7l5 5v13H7a2 2 0 01-2-2V5a2 2 0 012-2z" />

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M14 3v6h6" />

                                </svg>

                            </div>

                            <div>
                                <h4 class="text-lg font-bold text-gray-800">
                                    File Arsip Digital
                                </h4>

                                <p class="text-sm text-gray-500">
                                    Kelola file PDF yang tersimpan pada arsip
                                </p>
                            </div>

                        </div>


                        @php

                            $existingFiles = $digital->file_path_archive ?? [];

                            if (!is_array($existingFiles)) {

                                $existingFiles = $existingFiles
                                    ? [$existingFiles]
                                    : [];

                            }

                            $existingFileCount = count($existingFiles);

                            $remainingSlots = max(
                                0,
                                5 - $existingFileCount
                            );

                        @endphp


                        {{-- FILE LAMA --}}

                        @if ($existingFileCount > 0)

                            <div class="rounded-2xl border border-gray-200 bg-gray-50 p-4 sm:p-5 mb-5">

                                <div class="flex items-center justify-between gap-3 mb-4">

                                    <div>

                                        <p class="font-semibold text-gray-800">
                                            File tersimpan
                                        </p>

                                        <p class="text-xs text-gray-500 mt-1">
                                            <strong id="existing_file_count">
                                                {{ $existingFileCount }}
                                            </strong>
                                            dari 5 file
                                        </p>

                                    </div>

                                    <span class="px-3 py-1.5 rounded-full bg-green-100 text-green-700
                                        text-xs font-bold">
                                        {{ $existingFileCount }}/5
                                    </span>

                                </div>


                                <div class="space-y-3">

                                    @foreach ($existingFiles as $index => $filePath)

                                        <div
                                            id="existing_file_{{ $index }}"
                                            class="group p-4 bg-white border border-green-200 rounded-xl
                                            flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3
                                            transition-all duration-200 hover:shadow-md"
                                        >

                                            <div class="flex items-center gap-3 min-w-0">

                                                <div class="w-10 h-10 rounded-xl bg-red-50 text-red-500
                                                    flex items-center justify-center flex-shrink-0">

                                                    <svg class="w-5 h-5"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24">

                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M7 3h7l5 5v13H7a2 2 0 01-2-2V5a2 2 0 012-2z" />

                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M14 3v6h6" />

                                                    </svg>

                                                </div>

                                                <div class="min-w-0">

                                                    <p
                                                        class="text-sm font-semibold text-gray-800 truncate"
                                                        title="{{ basename($filePath) }}"
                                                    >
                                                        {{ basename($filePath) }}
                                                    </p>

                                                    <p class="text-xs text-gray-400 mt-0.5">
                                                        File PDF
                                                    </p>

                                                </div>

                                            </div>


                                            <div class="flex items-center gap-2 flex-shrink-0">

                                                {{-- LIHAT --}}

                                                <a
                                                    href="{{ route('archive.digital.stream', [$digital->id, $index]) }}"
                                                    target="_blank"
                                                    class="inline-flex items-center justify-center gap-2
                                                    px-3.5 py-2 bg-blue-600 hover:bg-blue-700
                                                    text-white text-xs font-bold rounded-xl
                                                    shadow-sm hover:shadow-md transition-all"
                                                >

                                                    <svg class="w-4 h-4"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24">

                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />

                                                    </svg>

                                                    Lihat

                                                </a>


                                                {{-- HAPUS --}}

                                                <button
                                                    type="button"
                                                    class="delete-file-button inline-flex items-center justify-center
                                                    w-10 h-10 bg-red-500 hover:bg-red-600
                                                    text-white rounded-xl shadow-sm hover:shadow-md transition-all"
                                                    data-index="{{ $index }}"
                                                    data-file-name="{{ basename($filePath) }}"
                                                    title="Hapus file"
                                                    aria-label="Hapus {{ basename($filePath) }}"
                                                >

                                                    <svg class="w-4 h-4"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        viewBox="0 0 24 24">

                                                        <path stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-9 0h12" />

                                                    </svg>

                                                </button>


                                                <input
                                                    type="hidden"
                                                    name="delete_files[]"
                                                    value="{{ $index }}"
                                                    id="delete_file_input_{{ $index }}"
                                                    disabled
                                                >

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        @else

                            <div class="rounded-2xl border border-dashed border-gray-300
                                bg-gray-50 p-6 text-center mb-5">

                                <div class="w-12 h-12 mx-auto rounded-xl bg-gray-100
                                    flex items-center justify-center text-gray-400 mb-3">

                                    <svg class="w-6 h-6"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M7 3h7l5 5v13H7a2 2 0 01-2-2V5a2 2 0 012-2z" />

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M14 3v6h6" />

                                    </svg>

                                </div>

                                <p class="text-sm font-semibold text-gray-600">
                                    Belum ada file tersimpan
                                </p>

                                <p class="text-xs text-gray-400 mt-1">
                                    Silakan tambahkan file PDF di bawah.
                                </p>

                            </div>

                        @endif


                        {{-- UPLOAD BARU --}}

                        <div class="rounded-2xl border-2 border-dashed border-blue-200
                            bg-blue-50/50 p-5">

                            <div class="flex items-start gap-4">

                                <div class="w-11 h-11 rounded-xl bg-blue-100 text-blue-600
                                    flex items-center justify-center flex-shrink-0">

                                    <svg class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 16V4m0 0L8 8m4-4l4 4M5 20h14" />

                                    </svg>

                                </div>

                                <div class="flex-1 min-w-0">

                                    <p class="font-bold text-gray-800">
                                        Tambahkan File PDF
                                    </p>

                                    <p class="text-xs text-gray-500 mt-1 mb-4">
                                        Maksimal 5 file secara keseluruhan dan maksimal 20MB per file.
                                    </p>


                                    <input
                                        type="file"
                                        name="file_path_digital[]"
                                        accept="application/pdf"
                                        multiple
                                        id="file_path_digital"

                                        @if ($remainingSlots <= 0)
                                            disabled
                                        @endif

                                        class="w-full text-sm text-gray-500
                                        file:mr-4 file:py-2.5 file:px-4
                                        file:rounded-xl file:border-0
                                        file:text-sm file:font-bold
                                        file:bg-blue-600 file:text-white
                                        hover:file:bg-blue-700
                                        border border-blue-200 bg-white rounded-xl
                                        cursor-pointer focus:outline-none
                                        disabled:bg-gray-100
                                        disabled:cursor-not-allowed
                                        disabled:opacity-60"
                                    />


                                    <p
                                        id="file_limit_message"
                                        class="text-xs text-gray-500 mt-3"
                                    >

                                        @if ($remainingSlots > 0)

                                            Sisa slot:
                                            <strong id="remaining_slots" class="text-blue-600">
                                                {{ $remainingSlots }}
                                            </strong>
                                            file.

                                        @else

                                            <strong class="text-red-500">
                                                Maksimal 5 file sudah tercapai.
                                            </strong>

                                        @endif

                                    </p>


                                    @error('file_path_digital')

                                        <p class="form-error">
                                            {{ $message }}
                                        </p>

                                    @enderror


                                    <div
                                        id="file_list_preview"
                                        class="text-xs text-gray-600 space-y-1 mt-3"
                                    ></div>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- ===================================================== --}}
                    {{-- SECTION LINK --}}
                    {{-- ===================================================== --}}

                    <div class="p-6 sm:p-8 bg-gray-50/60">

                        <div class="flex items-center gap-4 mb-6">

                            <div class="w-11 h-11 rounded-xl bg-cyan-50 text-cyan-600
                                flex items-center justify-center flex-shrink-0">

                                <svg class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M10 13a5 5 0 007.54.54l3-3a5 5 0 00-7.07-7.07l-1.72 1.71" />

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M14 11a5 5 0 00-7.54-.54l-3 3a5 5 0 007.07 7.07l1.71-1.71" />

                                </svg>

                            </div>

                            <div>
                                <h4 class="text-lg font-bold text-gray-800">
                                    Arsip Eksternal
                                </h4>

                                <p class="text-sm text-gray-500">
                                    Tautan menuju arsip yang tersimpan di luar sistem
                                </p>
                            </div>

                        </div>


                        <label class="form-label">
                            Link Arsip Eksternal
                        </label>

                        <input
                            type="url"
                            name="link_arsip"
                            value="{{ old('link_arsip', $digital->link_arsip) }}"
                            class="form-input"
                            placeholder="https://example.com/arsip"
                        >

                        @error('link_arsip')
                            <p class="form-error">{{ $message }}</p>
                        @enderror

                    </div>


                    {{-- ===================================================== --}}
                    {{-- SECTION KETERANGAN --}}
                    {{-- ===================================================== --}}

                    <div class="p-6 sm:p-8">

                        <div class="flex items-center gap-4 mb-6">

                            <div class="w-11 h-11 rounded-xl bg-amber-50 text-amber-600
                                flex items-center justify-center flex-shrink-0">

                                <svg class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.5-9.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 7.5-7.5z" />

                                </svg>

                            </div>

                            <div>
                                <h4 class="text-lg font-bold text-gray-800">
                                    Keterangan
                                </h4>

                                <p class="text-sm text-gray-500">
                                    Tambahkan catatan atau informasi tambahan mengenai arsip
                                </p>
                            </div>

                        </div>


                        <textarea
                            name="keterangan"
                            rows="4"
                            class="form-input resize-y"
                            placeholder="Keterangan tambahan atau catatan mengenai arsip"
                        >{{ old('keterangan', $digital->keterangan) }}</textarea>

                        @error('keterangan')
                            <p class="form-error">{{ $message }}</p>
                        @enderror

                    </div>


                    {{-- ===================================================== --}}
                    {{-- FOOTER BUTTON --}}
                    {{-- ===================================================== --}}

                    <div class="p-6 sm:p-8 bg-gray-50 border-t border-gray-200">

                        <div class="flex flex-col lg:flex-row lg:items-center
                            lg:justify-between gap-5">

                            <div class="flex items-start gap-3">

                                <div class="w-9 h-9 rounded-lg bg-amber-100 text-amber-600
                                    flex items-center justify-center flex-shrink-0">

                                    <svg class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />

                                    </svg>

                                </div>

                                <div>

                                    <p class="text-sm font-semibold text-gray-700">
                                        Periksa kembali data
                                    </p>

                                    <p class="text-xs text-gray-500 mt-0.5">
                                        Pastikan semua perubahan sudah benar sebelum menyimpan.
                                    </p>

                                </div>

                            </div>


                            <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">


                                {{-- BATAL --}}

                                <a
                                    href="{{ route('year.show', $digital->category_id) }}"
                                    class="inline-flex items-center justify-center gap-2
                                    px-5 py-3 bg-white border border-gray-300
                                    hover:bg-gray-100 hover:border-gray-400
                                    text-gray-700 font-semibold rounded-xl
                                    shadow-sm transition-all duration-200"
                                >

                                    <svg class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />

                                    </svg>

                                    Batal

                                </a>


                                {{-- UPDATE --}}

                                <button
                                    type="submit"
                                    class="group inline-flex items-center justify-center gap-2
                                    px-6 py-3
                                    bg-gradient-to-r from-blue-600 to-indigo-600
                                    hover:from-blue-700 hover:to-indigo-700
                                    text-white font-bold rounded-xl
                                    shadow-lg shadow-blue-200
                                    hover:shadow-xl hover:shadow-blue-300
                                    transition-all duration-200
                                    hover:-translate-y-0.5"
                                >

                                    <svg class="w-5 h-5 transition-transform duration-200 group-hover:scale-110"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7" />

                                    </svg>

                                    Update Arsip

                                </button>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- STYLE --}}
    {{-- ========================================================= --}}

    <style>

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            line-height: 1.25rem;
            font-weight: 600;
            color: #374151;
        }

        .form-input {
            width: 100%;
            border-radius: 0.75rem;
            border: 1px solid #e5e7eb;
            background-color: #f9fafb;
            padding: 0.75rem 1rem;
            color: #1f2937;
            font-size: 0.875rem;
            line-height: 1.25rem;
            outline: none;
            transition: all 0.2s ease;
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        .form-input:hover {
            border-color: #cbd5e1;
            background-color: #ffffff;
        }

        .form-input:focus {
            border-color: #3b82f6;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.12);
        }

        .form-error {
            margin-top: 0.375rem;
            font-size: 0.75rem;
            line-height: 1rem;
            color: #ef4444;
        }

        optgroup {
            font-weight: 700;
            color: #374151;
        }

        option {
            color: #1f2937;
        }

    </style>


    {{-- ========================================================= --}}
    {{-- JAVASCRIPT --}}
    {{-- ========================================================= --}}

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const fileInput =
                document.getElementById('file_path_digital');

            const preview =
                document.getElementById('file_list_preview');

            const countElement =
                document.getElementById('existing_file_count');

            const message =
                document.getElementById('file_limit_message');

            const maxFiles = 5;

            const originalExistingFileCount =
                {{ $existingFileCount }};


            // =====================================================
            // HITUNG FILE YANG DITANDAI HAPUS
            // =====================================================

            function getDeletedCount() {

                return document.querySelectorAll(
                    'input[name="delete_files[]"]:not([disabled])'
                ).length;

            }


            // =====================================================
            // UPDATE SLOT FILE
            // =====================================================

            function updateFileInputState() {

                const deletedCount =
                    getDeletedCount();

                const currentExistingCount =
                    Math.max(
                        0,
                        originalExistingFileCount - deletedCount
                    );

                const remainingSlots =
                    Math.max(
                        0,
                        maxFiles - currentExistingCount
                    );


                if (countElement) {

                    countElement.textContent =
                        currentExistingCount;

                }


                if (fileInput) {

                    fileInput.disabled =
                        remainingSlots <= 0;

                    fileInput.dataset.maxFiles =
                        remainingSlots;


                    if (remainingSlots <= 0) {

                        fileInput.value = '';

                        if (preview) {
                            preview.innerHTML = '';
                        }

                    }

                }


                if (message) {

                    if (remainingSlots > 0) {

                        message.innerHTML =
                            'Sisa slot: <strong class="text-blue-600">' +
                            remainingSlots +
                            '</strong> file. ' +
                            'Total maksimal <strong>5 file</strong>, maksimal 20MB per file.';

                    } else {

                        message.innerHTML =
                            '<strong class="text-red-500">' +
                            'Maksimal 5 file sudah tercapai.' +
                            '</strong>';

                    }

                }

            }


            // =====================================================
            // TOMBOL HAPUS FILE
            // =====================================================

            document
                .querySelectorAll('.delete-file-button')
                .forEach(function (button) {

                    button.addEventListener(
                        'click',
                        function () {

                            const index =
                                this.dataset.index;

                            const fileName =
                                this.dataset.fileName;

                            const row =
                                document.getElementById(
                                    'existing_file_' + index
                                );

                            const hiddenInput =
                                document.getElementById(
                                    'delete_file_input_' + index
                                );


                            if (!hiddenInput || !row) {
                                return;
                            }


                            const alreadyDeleted =
                                !hiddenInput.disabled;


                            if (alreadyDeleted) {

                                hiddenInput.disabled = true;


                                row.classList.remove(
                                    'opacity-50',
                                    'bg-red-50',
                                    'border-red-200'
                                );

                                row.classList.add(
                                    'bg-white',
                                    'border-green-200'
                                );


                                this.classList.remove(
                                    'bg-gray-500',
                                    'hover:bg-gray-600'
                                );

                                this.classList.add(
                                    'bg-red-500',
                                    'hover:bg-red-600'
                                );


                                this.title =
                                    'Hapus file';

                                this.setAttribute(
                                    'aria-label',
                                    'Hapus ' + fileName
                                );


                            } else {

                                hiddenInput.disabled = false;


                                row.classList.remove(
                                    'bg-white',
                                    'border-green-200'
                                );

                                row.classList.add(
                                    'opacity-50',
                                    'bg-red-50',
                                    'border-red-200'
                                );


                                this.classList.remove(
                                    'bg-red-500',
                                    'hover:bg-red-600'
                                );

                                this.classList.add(
                                    'bg-gray-500',
                                    'hover:bg-gray-600'
                                );


                                this.title =
                                    'Batalkan penghapusan';

                                this.setAttribute(
                                    'aria-label',
                                    'Batalkan penghapusan ' + fileName
                                );

                            }


                            updateFileInputState();

                        }
                    );

                });


            // =====================================================
            // PILIH FILE BARU
            // =====================================================

            if (fileInput) {

                fileInput.addEventListener(
                    'change',
                    function (e) {

                        const files =
                            Array.from(
                                e.target.files || []
                            );


                        const maxAllowed =
                            parseInt(
                                this.dataset.maxFiles || '0',
                                10
                            );


                        if (files.length > maxAllowed) {

                            alert(
                                'Kamu hanya bisa menambahkan maksimal ' +
                                maxAllowed +
                                ' file lagi.'
                            );

                            this.value = '';

                            if (preview) {
                                preview.innerHTML = '';
                            }

                            return;

                        }


                        const invalidFile =
                            files.find(function (file) {

                                const isPdf =
                                    file.type === 'application/pdf' ||
                                    file.name
                                        .toLowerCase()
                                        .endsWith('.pdf');


                                const isTooLarge =
                                    file.size >
                                    20 * 1024 * 1024;


                                return !isPdf || isTooLarge;

                            });


                        if (invalidFile) {

                            alert(
                                'File harus PDF dan ukuran maksimal 20MB per file.'
                            );

                            this.value = '';

                            if (preview) {
                                preview.innerHTML = '';
                            }

                            return;

                        }


                        if (preview) {

                            preview.innerHTML = '';


                            files.forEach(function (file) {

                                const wrapper =
                                    document.createElement('div');

                                wrapper.className =
                                    'flex items-center gap-2 p-2.5 bg-white border border-blue-100 rounded-lg';


                                const icon =
                                    document.createElement('span');

                                icon.textContent = '📄';


                                const text =
                                    document.createElement('span');

                                text.className =
                                    'text-gray-700 font-medium';

                                text.textContent =
                                    file.name +
                                    ' (' +
                                    (
                                        file.size /
                                        1024 /
                                        1024
                                    ).toFixed(2) +
                                    ' MB)';


                                wrapper.appendChild(icon);
                                wrapper.appendChild(text);

                                preview.appendChild(wrapper);

                            });

                        }

                    }
                );

            }


            updateFileInputState();

        });

    </script>

</x-app-layout>