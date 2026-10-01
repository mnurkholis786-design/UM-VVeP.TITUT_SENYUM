<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="flex items-center justify-center w-11 h-11 rounded-2xl bg-gradient-to-br from-[#003A8F] to-[#0066CC] shadow-lg">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                </svg>
            </div>

            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    Edit User
                </h2>
                <p class="text-sm text-gray-500">
                    Kelola informasi dan hak akses pengguna
                </p>
            </div>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/40 to-slate-100 py-8">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- =========================================================
                TOMBOL KEMBALI
            ========================================================== --}}
            <div class="mb-6">
                <a href="{{ route('account.index') }}"
                    class="group inline-flex items-center gap-2 px-4 py-2.5 bg-white text-gray-700
                           rounded-xl border border-gray-200 shadow-md
                           hover:bg-[#003A8F] hover:text-white hover:border-[#003A8F]
                           hover:shadow-lg transition-all duration-300">

                    <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform duration-300"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m7 7H3"/>
                    </svg>

                    <span class="font-semibold text-sm">
                        Kembali ke Kelola User
                    </span>
                </a>
            </div>

            {{-- =========================================================
                BREADCRUMB
            ========================================================== --}}
            <div class="mb-6 flex items-center gap-2 text-sm">

                <a href="{{ route('account.index') }}"
                    class="text-gray-500 hover:text-[#003A8F] transition-colors font-medium">
                    Kelola User
                </a>

                <svg class="w-4 h-4 text-gray-400"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"/>
                </svg>

                <span class="font-semibold text-[#003A8F]">
                    Edit User
                </span>
            </div>

            {{-- =========================================================
                VALIDATION ERROR
            ========================================================== --}}
            @if ($errors->any())
                <div class="mb-6 bg-red-50 border border-red-200 rounded-2xl p-5 shadow-sm">

                    <div class="flex items-start gap-3">

                        <div class="flex-shrink-0 w-10 h-10 rounded-xl bg-red-100 flex items-center justify-center">
                            <svg class="w-5 h-5 text-red-600"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>

                        <div>
                            <h4 class="font-bold text-red-800">
                                Data belum dapat disimpan
                            </h4>

                            <ul class="mt-2 text-sm text-red-700 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>• {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            @endif

            {{-- =========================================================
                MAIN CARD
            ========================================================== --}}
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-200">

                {{-- =====================================================
                    HEADER
                ====================================================== --}}
                <div class="relative overflow-hidden bg-gradient-to-br from-[#003A8F] via-[#0056B8] to-[#0074D9] px-7 py-7">

                    {{-- Decorative circles --}}
                    <div class="absolute -top-16 -right-16 w-48 h-48 rounded-full bg-white/10"></div>
                    <div class="absolute -bottom-20 -left-10 w-52 h-52 rounded-full bg-white/10"></div>
                    <div class="absolute top-10 right-1/3 w-20 h-20 rounded-full bg-white/5"></div>

                    <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-6 items-center">

                        {{-- LEFT --}}
                        <div class="flex items-center gap-4">

                            <div class="flex-shrink-0 w-16 h-16 rounded-2xl bg-white/15 backdrop-blur-md
                                        border border-white/20 flex items-center justify-center shadow-lg">

                                <svg class="w-8 h-8 text-white"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                </svg>

                            </div>

                            <div>
                                <h3 class="text-2xl font-extrabold text-white">
                                    Update Informasi User
                                </h3>

                                <p class="text-blue-100 mt-1 text-sm">
                                    Edit data pengguna yang terdaftar dalam sistem
                                </p>
                            </div>

                        </div>

                        {{-- =================================================
                            USER INFO
                        ================================================== --}}
                        <div class="bg-white/95 backdrop-blur-xl rounded-2xl p-4 shadow-xl border border-white/40">

                            <div class="flex items-center gap-4">

                                {{-- Avatar otomatis dari nama --}}
                                <div class="flex-shrink-0 w-14 h-14 rounded-2xl
                                            bg-gradient-to-br from-[#00AEEF] to-[#0056B8]
                                            flex items-center justify-center
                                            text-white font-extrabold text-2xl shadow-lg">

                                    {{ strtoupper(substr($user->name, 0, 1)) }}

                                </div>

                                <div class="min-w-0">

                                    <h4 class="text-lg font-extrabold text-gray-800 truncate">
                                        {{ $user->name }}
                                    </h4>

                                    <p class="text-sm text-gray-500 truncate">
                                        {{ $user->email }}
                                    </p>

                                    <div class="flex flex-wrap gap-2 mt-2">

                                        <span class="inline-flex items-center gap-1 px-3 py-1
                                                     rounded-full text-xs font-bold
                                                     bg-blue-100 text-[#003A8F]">

                                            <span class="w-1.5 h-1.5 rounded-full bg-[#0066CC]"></span>

                                            {{ $user->role ?? 'User' }}

                                        </span>

                                        @if($user->sub_role)
                                            <span class="inline-flex items-center px-3 py-1
                                                         rounded-full text-xs font-bold
                                                         bg-sky-100 text-sky-700">
                                                {{ $user->sub_role }}
                                            </span>
                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                </div>

                {{-- =====================================================
                    FORM
                ====================================================== --}}
                <form action="{{ route('account.update', $user->id) }}"
                    method="POST"
                    class="p-6 sm:p-8">

                    @csrf
                    @method('PUT')

                    {{-- =================================================
                        DATA DASAR
                    ================================================== --}}
                    <div class="mb-8">

                        <div class="flex items-center gap-3 mb-5">

                            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#003A8F]"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>

                            <div>
                                <h3 class="font-bold text-lg text-gray-800">
                                    Informasi Dasar
                                </h3>

                                <p class="text-xs text-gray-500">
                                    Informasi identitas pengguna
                                </p>
                            </div>

                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            {{-- NAME --}}
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">
                                    Nama Lengkap
                                    <span class="text-red-500">*</span>
                                </label>

                                <div class="relative">

                                    <input
                                        type="text"
                                        name="name"
                                        value="{{ old('name', $user->name) }}"
                                        required
                                        class="w-full px-4 py-3 pl-11
                                               border-2 border-gray-200 rounded-xl
                                               bg-gray-50
                                               focus:bg-white
                                               focus:border-[#0066CC]
                                               focus:ring-4 focus:ring-blue-100
                                               transition-all duration-300
                                               outline-none"
                                        placeholder="Masukkan nama lengkap">

                                    <svg class="absolute left-4 top-1/2 -translate-y-1/2
                                                w-5 h-5 text-gray-400"
                                        fill="currentColor" viewBox="0 0 20 20">

                                        <path fill-rule="evenodd"
                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd"/>

                                    </svg>

                                </div>
                            </div>

                            {{-- EMAIL --}}
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2">
                                    Email
                                    <span class="text-red-500">*</span>
                                </label>

                                <div class="relative">

                                    <input
                                        type="email"
                                        name="email"
                                        value="{{ old('email', $user->email) }}"
                                        required
                                        class="w-full px-4 py-3 pl-11
                                               border-2 border-gray-200 rounded-xl
                                               bg-gray-50
                                               focus:bg-white
                                               focus:border-[#0066CC]
                                               focus:ring-4 focus:ring-blue-100
                                               transition-all duration-300
                                               outline-none"
                                        placeholder="contoh@email.com">

                                    <svg class="absolute left-4 top-1/2 -translate-y-1/2
                                                w-5 h-5 text-gray-400"
                                        fill="currentColor" viewBox="0 0 20 20">

                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                        <path d="M18 8.118l-8 4v5.882a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>

                                    </svg>

                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- =================================================
                        PASSWORD
                    ================================================== --}}
                    <div class="mb-8">

                        <div class="flex items-center gap-3 mb-5">

                            <div class="w-10 h-10 rounded-xl bg-sky-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#0066CC]"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>

                                </svg>
                            </div>

                            <div>
                                <h3 class="font-bold text-lg text-gray-800">
                                    Keamanan Akun
                                </h3>

                                <p class="text-xs text-gray-500">
                                    Kosongkan password jika tidak ingin mengubahnya
                                </p>
                            </div>

                        </div>

                        <div class="relative">

                            <input
                                type="password"
                                name="password"
                                autocomplete="new-password"
                                class="w-full px-4 py-3 pl-11
                                       border-2 border-gray-200 rounded-xl
                                       bg-gray-50
                                       focus:bg-white
                                       focus:border-[#0066CC]
                                       focus:ring-4 focus:ring-blue-100
                                       transition-all duration-300
                                       outline-none"
                                placeholder="Masukkan password baru (opsional)">

                            <svg class="absolute left-4 top-1/2 -translate-y-1/2
                                        w-5 h-5 text-gray-400"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>

                            </svg>

                        </div>

                        <div class="mt-3 flex items-start gap-3
                                    p-4 bg-blue-50 border border-blue-100 rounded-xl">

                            <svg class="w-5 h-5 text-[#0066CC] flex-shrink-0 mt-0.5"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>

                            </svg>

                            <p class="text-xs text-blue-800">
                                Password lama tidak akan ditampilkan. Isi field ini hanya jika
                                ingin mengganti password user.
                            </p>

                        </div>

                    </div>

                    {{-- =================================================
                        ROLE & SUB ROLE
                    ================================================== --}}
                    <div class="mb-8">

                        <div class="flex items-center gap-3 mb-5">

                            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#003A8F]"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>

                                </svg>
                            </div>

                            <div>
                                <h3 class="font-bold text-lg text-gray-800">
                                    Hak Akses & Divisi
                                </h3>

                                <p class="text-xs text-gray-500">
                                    Tentukan role dan sub divisi pengguna
                                </p>
                            </div>

                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            {{-- ROLE --}}
                            <div>

                                <label class="block text-sm font-bold text-gray-700 mb-2">
                                    Divisi / Role
                                    <span class="text-red-500">*</span>
                                </label>

                                <div class="relative">

                                    <select
                                        name="role"
                                        required
                                        class="w-full px-4 py-3
                                               border-2 border-gray-200 rounded-xl
                                               bg-gray-50
                                               focus:bg-white
                                               focus:border-[#0066CC]
                                               focus:ring-4 focus:ring-blue-100
                                               transition-all duration-300
                                               outline-none appearance-none cursor-pointer">

                                        <option value="" disabled
                                            {{ old('role', $user->role) ? '' : 'selected' }}>
                                            Pilih Divisi
                                        </option>

                                        <option value="Kepala"
                                            {{ old('role', $user->role) == 'Kepala' ? 'selected' : '' }}>
                                            Kepala Kantor
                                        </option>

                                        <option value="Kepala Kantor TVRI"
                                            {{ old('role', $user->role) == 'Kepala Kantor TVRI' ? 'selected' : '' }}>
                                            Kepala Kantor TVRI
                                        </option>

                                        <option value="Bendahara"
                                            {{ old('role', $user->role) == 'Bendahara' ? 'selected' : '' }}>
                                            Bendahara
                                        </option>

                                        <option value="PPSPM"
                                            {{ old('role', $user->role) == 'PPSPM' ? 'selected' : '' }}>
                                            PPSPM
                                        </option>

                                        <option value="Keuangan"
                                            {{ old('role', $user->role) == 'Keuangan' ? 'selected' : '' }}>
                                            Keuangan
                                        </option>

                                        <option value="Program"
                                            {{ old('role', $user->role) == 'Program' ? 'selected' : '' }}>
                                            Program
                                        </option>

                                        <option value="Berita"
                                            {{ old('role', $user->role) == 'Berita' ? 'selected' : '' }}>
                                            Berita
                                        </option>

                                        <option value="Teknik"
                                            {{ old('role', $user->role) == 'Teknik' ? 'selected' : '' }}>
                                            Teknik
                                        </option>

                                        <option value="KMB"
                                            {{ old('role', $user->role) == 'KMB' ? 'selected' : '' }}>
                                            KMB
                                        </option>

                                        <option value="Promo"
                                            {{ old('role', $user->role) == 'Promo' ? 'selected' : '' }}>
                                            Promo
                                        </option>

                                        <option value="Umum"
                                            {{ old('role', $user->role) == 'Umum' ? 'selected' : '' }}>
                                            Umum
                                        </option>

                                        <option value="Tata usaha"
                                            {{ old('role', $user->role) == 'Tata usaha' ? 'selected' : '' }}>
                                            Tata Usaha
                                        </option>

                                        <option value="Pengembangan usaha"
                                            {{ old('role', $user->role) == 'Pengembangan usaha' ? 'selected' : '' }}>
                                            Pengembangan Usaha
                                        </option>

                                        <option value="Admin"
                                            {{ old('role', $user->role) == 'Admin' ? 'selected' : '' }}>
                                            Admin
                                        </option>

                                    </select>

                                    <svg class="absolute right-4 top-1/2 -translate-y-1/2
                                                w-5 h-5 text-gray-400 pointer-events-none"
                                        fill="currentColor" viewBox="0 0 20 20">

                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"/>

                                    </svg>

                                </div>

                            </div>

                            {{-- SUB ROLE --}}
                            <div>

                                <label class="block text-sm font-bold text-gray-700 mb-2">
                                    Sub Divisi
                                    <span class="text-red-500">*</span>
                                </label>

                                <div class="relative">

                                    <select
                                        name="sub_role"
                                        required
                                        class="w-full px-4 py-3
                                               border-2 border-gray-200 rounded-xl
                                               bg-gray-50
                                               focus:bg-white
                                               focus:border-[#0066CC]
                                               focus:ring-4 focus:ring-blue-100
                                               transition-all duration-300
                                               outline-none appearance-none cursor-pointer">

                                        <option value="" disabled
                                            {{ old('sub_role', $user->sub_role) ? '' : 'selected' }}>
                                            Pilih kode Akun
                                        </option>

                                        <option value="GC"
                                            {{ old('sub_role', $user->sub_role) == 'GC' ? 'selected' : '' }}>
                                            GC - (Program Penyiaran Publik)
                                        </option>

                                        <option value="WA"
                                            {{ old('sub_role', $user->sub_role) == 'WA' ? 'selected' : '' }}>
                                            WA - (Program Dukungan Manajemen)
                                        </option>

                                    </select>

                                    <svg class="absolute right-4 top-1/2 -translate-y-1/2
                                                w-5 h-5 text-gray-400 pointer-events-none"
                                        fill="currentColor" viewBox="0 0 20 20">

                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"/>

                                    </svg>

                                </div>

                            </div>

                        </div>

                    </div>

                    {{-- =================================================
                        AKSES ARSIP DIGITAL
                    ================================================== --}}
                    <div class="mb-8">

                        <div class="flex items-center gap-3 mb-5">

                            <div class="w-10 h-10 rounded-xl bg-sky-100 flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#0066CC]"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>

                                </svg>
                            </div>

                            <div>
                                <h3 class="font-bold text-lg text-gray-800">
                                    Akses Arsip Digital
                                </h3>

                                <p class="text-xs text-gray-500">
                                    Atur izin pengguna terhadap arsip digital
                                </p>
                            </div>

                        </div>

                        <div class="bg-gradient-to-br from-blue-50 to-sky-50
                                    border-2 border-blue-100 rounded-2xl p-5">

                            <div class="flex items-start gap-3 mb-5">

                                <div class="w-10 h-10 rounded-xl bg-white shadow-sm
                                            flex items-center justify-center">

                                    <svg class="w-5 h-5 text-[#0066CC]"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>

                                    </svg>

                                </div>

                                <div>
                                    <p class="font-bold text-gray-800">
                                        Izin Akses Arsip Digital
                                    </p>

                                    <p class="text-xs text-gray-600 mt-1">
                                        Tentukan apakah user dapat mengakses arsip digital.
                                    </p>
                                </div>

                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                {{-- IZINKAN --}}
                                <label class="group relative flex items-center p-4
                                              bg-white rounded-xl border-2 border-gray-200
                                              cursor-pointer
                                              hover:border-[#0066CC]
                                              hover:shadow-md
                                              transition-all duration-300">

                                    <input
                                        type="radio"
                                        name="izin_akses_arsip"
                                        value="1"
                                        {{ old('izin_akses_arsip', $user->is_privileged) == '1' ? 'checked' : '' }}
                                        class="w-5 h-5 text-[#0066CC]
                                               border-gray-300
                                               focus:ring-[#0066CC]">

                                    <div class="ml-3">

                                        <span class="font-bold text-gray-800 block">
                                            Izinkan Akses
                                        </span>

                                        <span class="text-xs text-gray-500">
                                            User dapat melihat dan mengunduh arsip digital
                                        </span>

                                    </div>

                                </label>

                                {{-- BLOKIR --}}
                                <label class="group relative flex items-center p-4
                                              bg-white rounded-xl border-2 border-gray-200
                                              cursor-pointer
                                              hover:border-red-400
                                              hover:shadow-md
                                              transition-all duration-300">

                                    <input
                                        type="radio"
                                        name="izin_akses_arsip"
                                        value="0"
                                        {{ old('izin_akses_arsip', $user->is_privileged) == '0' ? 'checked' : '' }}
                                        class="w-5 h-5 text-red-500
                                               border-gray-300
                                               focus:ring-red-400">

                                    <div class="ml-3">

                                        <span class="font-bold text-gray-800 block">
                                            Blokir Akses
                                        </span>

                                        <span class="text-xs text-gray-500">
                                            User tidak dapat mengakses arsip digital
                                        </span>

                                    </div>

                                </label>

                            </div>

                            <div class="mt-4 flex items-start gap-3
                                        bg-white border border-blue-100 rounded-xl p-4">

                                <svg class="w-5 h-5 text-[#0066CC] flex-shrink-0 mt-0.5"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>

                                </svg>

                                <p class="text-xs text-blue-800">
                                    Aktifkan akses jika user membutuhkan hak untuk melihat
                                    dan mengunduh dokumen pada arsip digital.
                                </p>

                            </div>

                        </div>

                    </div>

                    {{-- =================================================
                        ACTION BUTTON
                    ================================================== --}}
                    <div class="flex flex-col-reverse sm:flex-row sm:justify-between
                                gap-3 pt-6 border-t-2 border-gray-100">

                        <a href="{{ route('account.index') }}"
                            class="inline-flex items-center justify-center gap-2
                                   px-6 py-3.5
                                   bg-gray-100 text-gray-700
                                   font-bold rounded-xl
                                   border border-gray-200
                                   hover:bg-gray-200
                                   transition-all duration-300">

                            <svg class="w-5 h-5"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"/>

                            </svg>

                            Batal

                        </a>

                        <button
                            type="submit"
                            class="group inline-flex items-center justify-center gap-2
                                   px-8 py-3.5
                                   bg-gradient-to-r from-[#003A8F] via-[#0056B8] to-[#0074D9]
                                   hover:from-[#002766] hover:via-[#003A8F] hover:to-[#0066CC]
                                   text-white font-bold rounded-xl
                                   shadow-lg hover:shadow-xl
                                   hover:-translate-y-0.5
                                   transition-all duration-300">

                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7"/>

                            </svg>

                            Simpan Perubahan

                        </button>

                    </div>

                </form>

            </div>

            {{-- =========================================================
                BOTTOM INFO
            ========================================================== --}}
            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">

                <div class="bg-white rounded-2xl p-5 border border-gray-200 shadow-md
                            hover:shadow-lg hover:-translate-y-1 transition-all duration-300">

                    <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center mb-3">

                        <svg class="w-5 h-5 text-[#003A8F]"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622C17.176 19.29 21 14.591 21 9c0-.35-.012-.697-.035-1.04A11.955 11.955 0 0116.618 4.984z"/>

                        </svg>

                    </div>

                    <h4 class="font-bold text-gray-800 text-sm">
                        Data Aman
                    </h4>

                    <p class="text-xs text-gray-500 mt-1">
                        Perubahan data akan disimpan secara aman ke sistem.
                    </p>

                </div>

                <div class="bg-white rounded-2xl p-5 border border-gray-200 shadow-md
                            hover:shadow-lg hover:-translate-y-1 transition-all duration-300">

                    <div class="w-10 h-10 rounded-xl bg-sky-100 flex items-center justify-center mb-3">

                        <svg class="w-5 h-5 text-[#0066CC]"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>

                        </svg>

                    </div>

                    <h4 class="font-bold text-gray-800 text-sm">
                        Password Opsional
                    </h4>

                    <p class="text-xs text-gray-500 mt-1">
                        Password hanya berubah jika kolom password diisi.
                    </p>

                </div>

                <div class="bg-white rounded-2xl p-5 border border-gray-200 shadow-md
                            hover:shadow-lg hover:-translate-y-1 transition-all duration-300">

                    <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center mb-3">

                        <svg class="w-5 h-5 text-[#003A8F]"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>

                        </svg>

                    </div>

                    <h4 class="font-bold text-gray-800 text-sm">
                        Hak Akses
                    </h4>

                    <p class="text-xs text-gray-500 mt-1">
                        Role dan akses arsip menentukan fitur yang dapat digunakan user.
                    </p>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>