<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center shadow-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 7a2 2 0 012-2h5l2 2h7a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/>
                </svg>
            </div>

            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    {{ __('Buat Arsip Digital') }}
                </h2>
                <p class="text-xs text-gray-500 mt-0.5">
                    Tambahkan data arsip digital baru
                </p>
            </div>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/40 to-indigo-50/60 py-8">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- BACK BUTTON --}}
            <div class="mb-6">
                <a href="{{ route('year.show', $category->id) }}"
                    class="group inline-flex items-center gap-2 px-4 py-2.5
                    bg-white/90 backdrop-blur text-gray-700
                    border border-gray-200 rounded-xl
                    shadow-sm hover:shadow-md hover:-translate-x-1
                    transition-all duration-200">

                    <svg class="w-5 h-5 group-hover:-translate-x-0.5 transition-transform"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>

                    <span class="text-sm font-semibold">Kembali</span>
                </a>
            </div>


            {{-- MAIN CARD --}}
            <div class="bg-white/95 backdrop-blur rounded-3xl shadow-2xl
                border border-white/80 overflow-hidden">

                {{-- HERO HEADER --}}
                <div class="relative overflow-hidden">

                    <div class="absolute inset-0 bg-gradient-to-br from-blue-700 via-blue-800 to-indigo-900"></div>

                    <div class="absolute -top-24 -right-24 w-72 h-72
                        bg-blue-400/20 rounded-full blur-3xl"></div>

                    <div class="absolute -bottom-28 -left-20 w-72 h-72
                        bg-indigo-400/20 rounded-full blur-3xl"></div>

                    <div class="relative px-6 sm:px-10 py-8">

                        <div class="flex flex-col sm:flex-row sm:items-center gap-5">

                            <div class="w-16 h-16 rounded-2xl
                                bg-white/15 backdrop-blur-md
                                border border-white/20
                                flex items-center justify-center
                                shadow-xl">

                                <svg class="w-8 h-8 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M7 3h8l4 4v14H7a2 2 0 01-2-2V5a2 2 0 012-2z"/>

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M15 3v5h4M9 13h6M9 17h6"/>
                                </svg>
                            </div>

                            <div class="flex-1">

                                <div class="flex flex-wrap items-center gap-2 mb-2">

                                    <span class="inline-flex items-center gap-1.5
                                        px-3 py-1 rounded-full
                                        bg-white/15 border border-white/20
                                        text-white text-xs font-semibold">

                                        <span class="w-1.5 h-1.5 bg-emerald-300 rounded-full"></span>
                                        Arsip Digital
                                    </span>

                                    <span class="px-3 py-1 rounded-full
                                        bg-blue-500/30 border border-blue-300/20
                                        text-blue-100 text-xs font-medium">

                                        Kategori ID: {{ $category->id }}
                                    </span>

                                </div>

                                <h1 class="text-2xl sm:text-3xl font-bold text-white">
                                    Buat Arsip Digital
                                </h1>

                                <p class="mt-2 text-sm text-blue-100 max-w-2xl">
                                    Lengkapi informasi arsip, data petugas, dokumen,
                                    dan keterangan sebelum menyimpan arsip digital.
                                </p>

                            </div>

                        </div>

                    </div>
                </div>


                {{-- FORM --}}
                <form action="{{ route('digital.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="p-6 sm:p-10 space-y-10">

                    @csrf

                    {{-- CATEGORY ID --}}
                    <input type="hidden"
                        name="category_id"
                        value="{{ $category->id }}">


                    {{-- =====================================================
                        SECTION 1 - INFORMASI UTAMA
                    ====================================================== --}}
                    <section>

                        <div class="flex items-center gap-3 mb-6">

                            <div class="w-10 h-10 rounded-xl
                                bg-blue-100 text-blue-700
                                flex items-center justify-center">

                                <svg class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z"/>
                                </svg>

                            </div>

                            <div>
                                <h3 class="text-lg font-bold text-gray-800">
                                    Informasi Utama Arsip
                                </h3>

                                <p class="text-sm text-gray-500">
                                    Informasi dasar mengenai arsip yang akan dibuat
                                </p>
                            </div>

                        </div>


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            {{-- NAMA DIGITAL --}}
                            <div class="md:col-span-2">

                                <label class="form-label">
                                    Nama Digital
                                </label>

                                <input type="text"
                                    name="digital_name"
                                    value="{{ old('digital_name') }}"
                                    class="form-input text-lg font-semibold"
                                    placeholder="Masukkan nama arsip digital">

                                @error('digital_name')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- KATEGORI --}}
                            <div class="md:col-span-2">

                                <label class="form-label">
                                    Kategori Arsip
                                    <span class="text-red-500">*</span>
                                </label>

                                <select name="kategori"
                                    required
                                    class="form-input">

                                    <option value="">
                                        -- Pilih Kategori Arsip --
                                    </option>

                                    <optgroup label="AEC - Kerja Sama">
                                        <option value="AEC.001"
                                            {{ old('kategori') == 'AEC.001' ? 'selected' : '' }}>
                                            AEC.001 Kerja Sama Jasa Siaran dan Digitalisasi Penyiaran Daerah
                                        </option>
                                    </optgroup>

                                    <optgroup label="BAH - Pelayanan Publik Lainnya">

                                        <option value="BAH.001"
                                            {{ old('kategori') == 'BAH.001' ? 'selected' : '' }}>
                                            BAH.001 Siaran Berita, Current Affairs dan Olahraga
                                        </option>

                                        <option value="BAH.002"
                                            {{ old('kategori') == 'BAH.002' ? 'selected' : '' }}>
                                            BAH.002 Siaran Program dan Promosi Acara
                                        </option>

                                        <option value="BAH.003"
                                            {{ old('kategori') == 'BAH.003' ? 'selected' : '' }}>
                                            BAH.003 Siaran Konten Media Baru
                                        </option>

                                    </optgroup>

                                    <optgroup label="CBR - Dukungan Teknis">

                                        <option value="CBR.001"
                                            {{ old('kategori') == 'CBR.001' ? 'selected' : '' }}>
                                            CBR.001 Dukungan Teknis Kinerja Transmisi, Multipleksing dan Fasilitas Teknik
                                        </option>

                                    </optgroup>

                                    <optgroup label="CBT - Prasarana Bidang Teknologi Informasi dan Komunikasi">

                                        <option value="CBT.002"
                                            {{ old('kategori') == 'CBT.002' ? 'selected' : '' }}>
                                            CBT.002 Sarana dan Prasarana Teknik Produksi dan Penyiaran
                                        </option>

                                    </optgroup>

                                    <optgroup label="CDS OP - Prasarana Bidang Teknologi Informasi dan Komunikasi">

                                        <option value="CDS.001"
                                            {{ old('kategori') == 'CDS.001' ? 'selected' : '' }}>
                                            CDS.001 Pemeliharaan Transmisi, Multipleksing dan Fasilitas Teknik
                                        </option>

                                        <option value="CDS.002"
                                            {{ old('kategori') == 'CDS.002' ? 'selected' : '' }}>
                                            CDS.002 Pemeliharaan Peralatan Teknik Produksi dan Penyiaran
                                        </option>

                                        <option value="CDS.003"
                                            {{ old('kategori') == 'CDS.003' ? 'selected' : '' }}>
                                            CDS.003 Pemeliharaan Infrastruktur Teknologi Informatika dan Media Baru
                                        </option>

                                    </optgroup>

                                    <optgroup label="EBA - Layanan Dukungan Managemen Innternal">

                                        <option value="EBA.994"
                                            {{ old('kategori') == 'EBA.994' ? 'selected' : '' }}>
                                            EBA.994 Layanan Perkantoran
                                        </option>

                                    </optgroup>

                                    <optgroup label="WA - Program Dukungan Managemen">

                                        <option value="WA.4376"
                                            {{ old('kategori') == 'WA.4376' ? 'selected' : '' }}>
                                            WA.4376 Pelaksanaan Dukungan Manajemen dan Tugas Teknis Lainnya Stasiun Penyiaran TV Publik Lokal dan Regional
                                        </option>

                                    </optgroup>

                                </select>

                                @error('kategori')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- KODE --}}
                            <div>

                                <label class="form-label">
                                    Kode Arsip
                                </label>

                                <input type="text"
                                    name="digital_code"
                                    value="{{ old('digital_code') }}"
                                    class="form-input"
                                    placeholder="Masukkan kode arsip">

                                @error('digital_code')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- DIVISI --}}
                            <div>

                                <label class="form-label">
                                    Divisi Asal
                                </label>

                                <input type="text"
                                    name="from_division"
                                    value="{{ old('from_division') }}"
                                    class="form-input"
                                    placeholder="Masukkan divisi asal">

                                @error('from_division')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- KODE KLASIFIKASI --}}
                            <div>

                                <label class="form-label">
                                    Kode Klasifikasi
                                </label>

                                <input type="text"
                                    name="kode_klasifikasi"
                                    value="{{ old('kode_klasifikasi') }}"
                                    class="form-input"
                                    placeholder="Kode klasifikasi">

                                @error('kode_klasifikasi')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- INDEKS 1 --}}
                            <div>

                                <label class="form-label">
                                    Indeks 1
                                </label>

                                <input type="text"
                                    name="indeks1"
                                    value="{{ old('indeks1') }}"
                                    class="form-input"
                                    placeholder="Indeks 1">

                                @error('indeks1')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- INDEKS 2 --}}
                            <div>

                                <label class="form-label">
                                    Indeks 2
                                </label>

                                <input type="text"
                                    name="indeks2"
                                    value="{{ old('indeks2') }}"
                                    class="form-input"
                                    placeholder="Indeks 2">

                                @error('indeks2')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- NO ITEM --}}
                            <div>

                                <label class="form-label">
                                    No Item
                                </label>

                                <input type="text"
                                    name="no_item"
                                    value="{{ old('no_item') }}"
                                    class="form-input"
                                    placeholder="Nomor item">

                                @error('no_item')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- NOMINAL --}}
                            <div>

                                <label class="form-label">
                                    Nominal
                                </label>

                                <div class="relative">

                                    <span class="absolute left-4 top-1/2 -translate-y-1/2
                                        text-gray-400 font-semibold">
                                        Rp
                                    </span>

                                    <input type="number"
                                        name="nominal"
                                        value="{{ old('nominal') }}"
                                        class="form-input pl-12"
                                        placeholder="0">

                                </div>

                                @error('nominal')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- URAIAN --}}
                            <div class="md:col-span-2">

                                <label class="form-label">
                                    Uraian
                                </label>

                                <textarea name="uraian"
                                    rows="4"
                                    class="form-input resize-none"
                                    placeholder="Masukkan uraian singkat mengenai arsip">{{ old('uraian') }}</textarea>

                                @error('uraian')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>

                    </section>


                    {{-- =====================================================
                        SECTION 2 - DOKUMEN KEUANGAN
                    ====================================================== --}}
                    <section class="border-t border-gray-100 pt-10">

                        <div class="flex items-center gap-3 mb-6">

                            <div class="w-10 h-10 rounded-xl
                                bg-emerald-100 text-emerald-700
                                flex items-center justify-center">

                                <svg class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 8c-2.21 0-4 1.343-4 3s1.79 3 4 3 4 1.343 4 3-1.79 3-4 3m0-12V5m0 14v-3m0-8a2 2 0 100-4 2 2 0 000 4z"/>

                                </svg>

                            </div>

                            <div>
                                <h3 class="text-lg font-bold text-gray-800">
                                    Informasi Dokumen Keuangan
                                </h3>

                                <p class="text-sm text-gray-500">
                                    Nomor dan informasi dokumen pembayaran
                                </p>
                            </div>

                        </div>


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            {{-- NO SPBY --}}
                            <div class="md:col-span-2">
                                <label class="form-label">No SPBy</label>

                                <input type="text"
                                    name="no_spby"
                                    value="{{ old('no_spby') }}"
                                    class="form-input"
                                    placeholder="Nomor SPBy">

                                @error('no_spby')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror
                            </div>


                            {{-- NO SPM --}}
                            <div>
                                <label class="form-label">No SPM</label>

                                <input type="text"
                                    name="no_spm"
                                    value="{{ old('no_spm') }}"
                                    class="form-input"
                                    placeholder="Nomor SPM">

                                @error('no_spm')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror
                            </div>


                            {{-- JENIS SPM --}}
                            <div>
                                <label class="form-label">Jenis SPM</label>

                                <input type="text"
                                    name="jenis_spm"
                                    value="{{ old('jenis_spm') }}"
                                    class="form-input"
                                    placeholder="Jenis SPM">

                                @error('jenis_spm')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror
                            </div>


                            {{-- NO SP2D --}}
                            <div>
                                <label class="form-label">No SP2D</label>

                                <input type="text"
                                    name="no_sp2d"
                                    value="{{ old('no_sp2d') }}"
                                    class="form-input"
                                    placeholder="Nomor SP2D">

                                @error('no_sp2d')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror
                            </div>


                            {{-- NILAI SP2D --}}
                            <div>

                                <label class="form-label">
                                    Nilai SP2D
                                </label>

                                <div class="relative">

                                    <span class="absolute left-4 top-1/2 -translate-y-1/2
                                        text-gray-400 font-semibold">
                                        Rp
                                    </span>

                                    <input type="number"
                                        name="nilai_sp2d"
                                        value="{{ old('nilai_sp2d') }}"
                                        class="form-input pl-12"
                                        placeholder="0">

                                </div>

                                @error('nilai_sp2d')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- JENIS SP2D --}}
                            <div>
                                <label class="form-label">Jenis SP2D</label>

                                <input type="text"
                                    name="jenis_sp2d"
                                    value="{{ old('jenis_sp2d') }}"
                                    class="form-input"
                                    placeholder="Jenis SP2D">

                                @error('jenis_sp2d')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror
                            </div>


                            {{-- TGL SP2D --}}
                            <div>
                                <label class="form-label">Tanggal SP2D</label>

                                <input type="date"
                                    name="tgl_sp2d"
                                    value="{{ old('tgl_sp2d') }}"
                                    class="form-input">

                                @error('tgl_sp2d')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror
                            </div>


                            {{-- TGL SELESAI SP2D --}}
                            <div>
                                <label class="form-label">Tanggal Selesai SP2D</label>

                                <input type="date"
                                    name="tgl_selesai_sp2d"
                                    value="{{ old('tgl_selesai_sp2d') }}"
                                    class="form-input">

                                @error('tgl_selesai_sp2d')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror
                            </div>


                            {{-- INVOICE --}}
                            <div>
                                <label class="form-label">No Invoice</label>

                                <input type="text"
                                    name="no_invoice"
                                    value="{{ old('no_invoice') }}"
                                    class="form-input"
                                    placeholder="Nomor invoice">

                                @error('no_invoice')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror
                            </div>


                            {{-- TGL INVOICE --}}
                            <div>
                                <label class="form-label">Tanggal Invoice</label>

                                <input type="date"
                                    name="tgl_invoice"
                                    value="{{ old('tgl_invoice') }}"
                                    class="form-input">

                                @error('tgl_invoice')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror
                            </div>


                            {{-- TGL TERIMA --}}
                            <div>
                                <label class="form-label">Tanggal Terima</label>

                                <input type="date"
                                    name="tgl_terima"
                                    value="{{ old('tgl_terima') }}"
                                    class="form-input">

                                @error('tgl_terima')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                    </section>


                    {{-- =====================================================
                        SECTION 3 - INFORMASI ARSIP
                    ====================================================== --}}
                    <section class="border-t border-gray-100 pt-10">

                        <div class="flex items-center gap-3 mb-6">

                            <div class="w-10 h-10 rounded-xl
                                bg-violet-100 text-violet-700
                                flex items-center justify-center">

                                <svg class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0M9 5h6"/>

                                </svg>

                            </div>

                            <div>
                                <h3 class="text-lg font-bold text-gray-800">
                                    Informasi Kearsipan
                                </h3>

                                <p class="text-sm text-gray-500">
                                    Atur informasi retensi dan klasifikasi arsip
                                </p>
                            </div>

                        </div>


                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div>
                                <label class="form-label">
                                    Tingkat Pertimbangan
                                </label>

                                <input type="text"
                                    name="tingkat_pertimbangan"
                                    value="{{ old('tingkat_pertimbangan') }}"
                                    class="form-input"
                                    placeholder="Tingkat pertimbangan">

                                @error('tingkat_pertimbangan')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror
                            </div>


                            <div>
                                <label class="form-label">
                                    Jumlah Halaman
                                </label>

                                <input type="number"
                                    name="jumlah_halaman"
                                    value="{{ old('jumlah_halaman') }}"
                                    class="form-input"
                                    placeholder="Jumlah halaman">

                                @error('jumlah_halaman')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror
                            </div>


                            <div>
                                <label class="form-label">
                                    Retensi Arsip Aktif (Tahun)
                                </label>

                                <input type="number"
                                    name="retensi_arsip_aktif"
                                    value="{{ old('retensi_arsip_aktif') }}"
                                    class="form-input"
                                    placeholder="Contoh: 2">

                                @error('retensi_arsip_aktif')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror
                            </div>


                            <div>
                                <label class="form-label">
                                    Retensi Arsip Inaktif (Tahun)
                                </label>

                                <input type="number"
                                    name="retensi_arsip_inaktif"
                                    value="{{ old('retensi_arsip_inaktif') }}"
                                    class="form-input"
                                    placeholder="Contoh: 3">

                                @error('retensi_arsip_inaktif')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror
                            </div>


                            <div>
                                <label class="form-label">
                                    Nasib Akhir Arsip
                                </label>

                                <input type="text"
                                    name="nasib_akhir_arsip"
                                    value="{{ old('nasib_akhir_arsip') }}"
                                    class="form-input"
                                    placeholder="Nasib akhir arsip">

                                @error('nasib_akhir_arsip')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror
                            </div>


                            <div>
                                <label class="form-label">
                                    Klasifikasi Keamanan
                                </label>

                                <input type="text"
                                    name="klasifikasi_keamanan"
                                    value="{{ old('klasifikasi_keamanan') }}"
                                    class="form-input"
                                    placeholder="Klasifikasi keamanan">

                                @error('klasifikasi_keamanan')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror
                            </div>


                            <div>
                                <label class="form-label">
                                    Status
                                </label>

                                <input type="text"
                                    name="status"
                                    value="{{ old('status') }}"
                                    class="form-input"
                                    placeholder="Status arsip">

                                @error('status')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror
                            </div>


                            <div>
                                <label class="form-label">
                                    Tanggal Pembuangan
                                </label>

                                <input type="date"
                                    name="disposal_date"
                                    value="{{ old('disposal_date') }}"
                                    class="form-input">

                                @error('disposal_date')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                    </section>


                    {{-- =====================================================
                        SECTION 4 - PETUGAS
                    ====================================================== --}}
                    <section class="border-t border-gray-100 pt-10">

                        <div class="flex items-center gap-3 mb-6">

                            <div class="w-10 h-10 rounded-xl
                                bg-indigo-100 text-indigo-700
                                flex items-center justify-center">

                                <svg class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17 20h5v-1a4 4 0 00-4-4h-1M9 20H4v-1a4 4 0 014-4h1m7-5a4 4 0 10-8 0 4 4 0 008 0zm6-1a3 3 0 10-6 0"/>

                                </svg>

                            </div>

                            <div>
                                <h3 class="text-lg font-bold text-gray-800">
                                    Informasi Petugas
                                </h3>

                                <p class="text-sm text-gray-500">
                                    Masukkan petugas yang berkaitan dengan arsip
                                </p>
                            </div>

                        </div>


                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                            {{-- PENGAJU --}}
                            <div class="p-5 rounded-2xl bg-purple-50
                                border border-purple-100">

                                <label class="block text-sm font-bold text-purple-700 mb-3">
                                    Pengaju
                                </label>

                                <input type="text"
                                    name="submiter_name"
                                    value="{{ old('submiter_name') }}"
                                    class="w-full rounded-xl border-purple-200
                                    bg-white px-4 py-3 text-sm
                                    focus:border-purple-500 focus:ring-4 focus:ring-purple-100"
                                    placeholder="Nama Pengaju">

                                @error('submiter_name')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- KEUANGAN --}}
                            <div class="p-5 rounded-2xl bg-teal-50
                                border border-teal-100">

                                <label class="block text-sm font-bold text-teal-700 mb-3">
                                    Divisi Keuangan
                                </label>

                                <input type="text"
                                    name="finance_officer_name"
                                    value="{{ old('finance_officer_name') }}"
                                    class="w-full rounded-xl border-teal-200
                                    bg-white px-4 py-3 text-sm
                                    focus:border-teal-500 focus:ring-4 focus:ring-teal-100"
                                    placeholder="Nama Finance Officer">

                                @error('finance_officer_name')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror

                            </div>


                            {{-- BENDAHARA --}}
                            <div class="p-5 rounded-2xl bg-blue-50
                                border border-blue-100">

                                <label class="block text-sm font-bold text-blue-700 mb-3">
                                    Bendahara
                                </label>

                                <input type="text"
                                    name="revenue_officer_name"
                                    value="{{ old('revenue_officer_name') }}"
                                    class="w-full rounded-xl border-blue-200
                                    bg-white px-4 py-3 text-sm
                                    focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                                    placeholder="Nama Bendahara">

                                @error('revenue_officer_name')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>

                    </section>


                    {{-- =====================================================
                        SECTION 5 - FILE
                    ====================================================== --}}
                    <section class="border-t border-gray-100 pt-10">

                        <div class="flex items-center gap-3 mb-6">

                            <div class="w-10 h-10 rounded-xl
                                bg-red-100 text-red-600
                                flex items-center justify-center">

                                <svg class="w-5 h-5"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M7 3h8l4 4v14H7a2 2 0 01-2-2V5a2 2 0 012-2zM15 3v5h4"/>

                                </svg>

                            </div>

                            <div>
                                <h3 class="text-lg font-bold text-gray-800">
                                    File Arsip Digital
                                </h3>

                                <p class="text-sm text-gray-500">
                                    Upload dokumen arsip dalam format PDF
                                </p>
                            </div>

                        </div>


                        <div class="relative">

                            <label for="file_path_digital"
                                class="group flex flex-col items-center justify-center
                                min-h-52 px-6 py-8
                                border-2 border-dashed border-blue-200
                                rounded-2xl bg-blue-50/40
                                hover:bg-blue-50 hover:border-blue-400
                                cursor-pointer transition-all duration-200">

                                <div class="w-14 h-14 rounded-2xl
                                    bg-blue-100 text-blue-600
                                    flex items-center justify-center
                                    mb-4 group-hover:scale-110 transition-transform">

                                    <svg class="w-7 h-7"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>

                                    </svg>

                                </div>

                                <span class="text-sm font-bold text-gray-700">
                                    Klik untuk memilih file PDF
                                </span>

                                <span class="text-xs text-gray-500 mt-1">
                                    Maksimal 5 file • Maksimal 20MB per file
                                </span>

                                <input type="file"
                                    name="file_path_digital[]"
                                    accept="application/pdf"
                                    multiple
                                    id="file_path_digital"
                                    class="hidden">

                            </label>


                            <div id="file_list_preview"
                                class="mt-4 space-y-2">
                            </div>

                        </div>


                        @error('file_path_digital')
                            <p class="error-text">{{ $message }}</p>
                        @enderror

                        @error('file_path_digital.*')
                            <p class="error-text">{{ $message }}</p>
                        @enderror

                    </section>


                    {{-- =====================================================
                        SECTION 6 - LINK & KETERANGAN
                    ====================================================== --}}
                    <section class="border-t border-gray-100 pt-10">

                        <div class="grid grid-cols-1 gap-6">

                            <div>

                                <label class="form-label">
                                    Link Arsip Eksternal
                                </label>

                                <input type="url"
                                    name="link_arsip"
                                    value="{{ old('link_arsip') }}"
                                    class="form-input"
                                    placeholder="https://example.com/arsip">

                                @error('link_arsip')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror

                            </div>


                            <div>

                                <label class="form-label">
                                    Keterangan
                                </label>

                                <textarea name="keterangan"
                                    rows="4"
                                    class="form-input resize-none"
                                    placeholder="Keterangan tambahan atau catatan mengenai arsip">{{ old('keterangan') }}</textarea>

                                @error('keterangan')
                                    <p class="error-text">{{ $message }}</p>
                                @enderror

                            </div>

                        </div>

                    </section>


                    {{-- =====================================================
                        ACTION
                    ====================================================== --}}
                    <div class="border-t border-gray-100 pt-8">

                        <div class="flex flex-col lg:flex-row
                            lg:items-center lg:justify-between gap-5">

                            <div class="flex items-start gap-3">

                                <div class="w-9 h-9 rounded-xl bg-amber-100
                                    text-amber-600 flex items-center justify-center shrink-0">

                                    <svg class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 4c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z"/>

                                    </svg>

                                </div>

                                <div>
                                    <p class="text-sm font-semibold text-gray-700">
                                        Periksa kembali data sebelum menyimpan.
                                    </p>

                                    <p class="text-xs text-gray-500 mt-0.5">
                                        Pastikan file dan informasi arsip sudah sesuai.
                                    </p>
                                </div>

                            </div>


                            <div class="flex flex-col sm:flex-row gap-3">

                                <a href="{{ route('year.show', $category->id) }}"
                                    class="inline-flex justify-center items-center gap-2
                                    px-6 py-3 rounded-xl
                                    bg-gray-100 hover:bg-gray-200
                                    text-gray-700 font-semibold
                                    border border-gray-200
                                    transition-all duration-200">

                                    <svg class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"/>

                                    </svg>

                                    Batal
                                </a>


                                <button type="submit"
                                    class="inline-flex justify-center items-center gap-2
                                    px-7 py-3 rounded-xl
                                    bg-gradient-to-r from-blue-600 to-indigo-700
                                    hover:from-blue-700 hover:to-indigo-800
                                    text-white font-bold
                                    shadow-lg hover:shadow-xl
                                    hover:-translate-y-0.5
                                    active:translate-y-0
                                    transition-all duration-200">

                                    <svg class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7"/>

                                    </svg>

                                    Buat Arsip Digital
                                </button>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>


    {{-- =========================================================
        STYLE
    ========================================================== --}}
    <style>
        .form-label {
            display: block;
            margin-bottom: .5rem;
            font-size: .875rem;
            line-height: 1.25rem;
            font-weight: 600;
            color: #374151;
        }

        .form-input {
            width: 100%;
            border-radius: .75rem;
            border: 1px solid #e5e7eb;
            background: #f9fafb;
            padding: .75rem 1rem;
            color: #1f2937;
            transition: all .2s ease;
            outline: none;
        }

        .form-input:hover {
            border-color: #cbd5e1;
            background: #ffffff;
        }

        .form-input:focus {
            border-color: #3b82f6;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(59,130,246,.12);
        }

        .error-text {
            margin-top: .375rem;
            font-size: .75rem;
            line-height: 1rem;
            color: #ef4444;
        }
    </style>


    {{-- =========================================================
        FILE PREVIEW + VALIDATION
    ========================================================== --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const input = document.getElementById('file_path_digital');
            const preview = document.getElementById('file_list_preview');

            if (!input || !preview) return;

            input.addEventListener('change', function (e) {

                const files = Array.from(e.target.files);

                preview.innerHTML = '';

                if (files.length > 5) {

                    preview.innerHTML = `
                        <div class="p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm">
                            <strong>Maksimal 5 file.</strong>
                            Kamu memilih ${files.length} file.
                        </div>
                    `;

                    input.value = '';
                    return;
                }


                let invalid = false;


                files.forEach(function (file) {

                    const isPdf =
                        file.type === 'application/pdf' ||
                        file.name.toLowerCase().endsWith('.pdf');

                    const maxSize = 20 * 1024 * 1024;

                    if (!isPdf || file.size > maxSize) {
                        invalid = true;
                    }


                    const item = document.createElement('div');

                    item.className =
                        'flex items-center justify-between gap-3 p-3 rounded-xl border bg-gray-50';


                    item.innerHTML = `
                        <div class="flex items-center gap-3 min-w-0">

                            <div class="w-9 h-9 rounded-lg bg-red-100 text-red-600
                                flex items-center justify-center shrink-0">

                                <svg class="w-4 h-4"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M7 3h8l4 4v14H7a2 2 0 01-2-2V5a2 2 0 012-2zM15 3v5h4"/>

                                </svg>

                            </div>

                            <div class="min-w-0">

                                <p class="text-sm font-semibold text-gray-700 truncate">
                                    ${file.name}
                                </p>

                                <p class="text-xs text-gray-500">
                                    ${(file.size / 1024 / 1024).toFixed(2)} MB
                                </p>

                            </div>

                        </div>

                        <span class="text-xs font-semibold
                            ${isPdf && file.size <= maxSize
                                ? 'text-emerald-600'
                                : 'text-red-600'}">

                            ${isPdf && file.size <= maxSize
                                ? 'Valid'
                                : 'Tidak valid'}

                        </span>
                    `;

                    preview.appendChild(item);

                });


                if (invalid) {

                    const warning = document.createElement('div');

                    warning.className =
                        'p-4 rounded-xl bg-red-50 border border-red-200 text-red-700 text-sm';

                    warning.innerHTML =
                        '<strong>File tidak valid.</strong> Semua file harus PDF dan maksimal 20MB per file.';

                    preview.prepend(warning);

                    input.value = '';
                }

            });

        });
    </script>

</x-app-layout>