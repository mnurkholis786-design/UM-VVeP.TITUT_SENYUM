<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-[#0066CC] to-[#003A8F] shadow-lg shadow-blue-900/20">
                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-6-2a4 4 0 100-8 4 4 0 000 8zM3 21a7 7 0 0114 0"/>
                </svg>
            </div>

            <div>
                <h2 class="text-2xl font-extrabold tracking-tight text-gray-800">
                    Create User
                </h2>
                <p class="text-sm text-gray-500">
                    Tambahkan akun pengguna baru ke dalam sistem
                </p>
            </div>
        </div>
    </x-slot>


    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/40 to-white py-8">

        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">

            {{-- ========================================================= --}}
            {{-- BACK + BREADCRUMB --}}
            {{-- ========================================================= --}}
            <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                <div class="flex items-center gap-2 text-sm">

                    <a href="{{ route('account.index') }}"
                       class="font-semibold text-gray-400 transition-colors duration-200 hover:text-[#0066CC]">
                        Kelola User
                    </a>

                    <svg class="h-4 w-4 text-gray-300"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M9 5l7 7-7 7"/>
                    </svg>

                    <span class="font-bold text-[#003A8F]">
                        Create User
                    </span>

                </div>


                <a href="{{ route('account.index') }}"
                   class="group inline-flex w-fit items-center gap-2 rounded-2xl border border-gray-200 bg-white px-4 py-2.5 text-sm font-bold text-gray-600 shadow-sm transition-all duration-300 hover:-translate-x-1 hover:border-blue-200 hover:bg-blue-50 hover:text-[#0056B8] hover:shadow-md">

                    <svg class="h-4 w-4 transition-transform duration-300 group-hover:-translate-x-1"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>

                    Kembali

                </a>

            </div>


            {{-- ========================================================= --}}
            {{-- VALIDATION ERROR --}}
            {{-- ========================================================= --}}
            @if ($errors->any())

                <div class="mb-6 overflow-hidden rounded-2xl border border-red-200 bg-red-50 shadow-sm">

                    <div class="flex items-start gap-3 p-5">

                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-red-100">
                            <svg class="h-5 w-5 text-red-600"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>

                        <div>
                            <h3 class="font-extrabold text-red-800">
                                Periksa kembali data yang diisi
                            </h3>

                            <ul class="mt-2 list-inside list-disc space-y-1 text-sm text-red-700">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>

                    </div>

                </div>

            @endif


            {{-- ========================================================= --}}
            {{-- MAIN CARD --}}
            {{-- ========================================================= --}}
            <div class="overflow-hidden rounded-[30px] border border-gray-100 bg-white shadow-2xl shadow-blue-900/10">

                {{-- ===================================================== --}}
                {{-- HEADER --}}
                {{-- ===================================================== --}}
                <div class="relative overflow-hidden bg-gradient-to-br from-[#003A8F] via-[#0056B8] to-[#0074D9] px-6 py-7 sm:px-8">

                    <div class="absolute -right-16 -top-20 h-56 w-56 rounded-full bg-white/10 blur-xl"></div>

                    <div class="absolute -bottom-24 left-1/3 h-64 w-64 rounded-full bg-cyan-300/10 blur-3xl"></div>

                    <div class="relative flex items-center gap-5">

                        <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-white/15 shadow-inner ring-1 ring-white/20 backdrop-blur-md">

                            <svg class="h-8 w-8 text-white"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M15 19a6 6 0 00-12 0M9 11a4 4 0 100-8 4 4 0 000 8z"/>
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M19 8v6m3-3h-6"/>
                            </svg>

                        </div>

                        <div>

                            <p class="mb-1 text-xs font-bold uppercase tracking-[0.2em] text-blue-100">
                                Account Management
                            </p>

                            <h1 class="text-2xl font-black text-white sm:text-3xl">
                                Daftarkan Akun Baru
                            </h1>

                            <p class="mt-2 text-sm leading-relaxed text-blue-100">
                                Tambahkan pengguna baru dan tentukan role aksesnya
                                dalam sistem.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- INFO BANNER --}}
                {{-- ===================================================== --}}
                <div class="border-b border-blue-100 bg-gradient-to-r from-blue-50 via-sky-50 to-white px-6 py-5 sm:px-8">

                    <div class="flex items-start gap-4">

                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-blue-100 text-[#0066CC]">

                            <svg class="h-5 w-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>

                        </div>

                        <div>

                            <h4 class="font-extrabold text-gray-800">
                                Pastikan Data yang Diisi Benar
                            </h4>

                            <p class="mt-1 text-sm leading-relaxed text-gray-500">
                                Field dengan tanda
                                <span class="font-bold text-red-500">*</span>
                                wajib diisi menggunakan data yang valid dan sesuai.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- FORM --}}
                {{-- ===================================================== --}}
                <form action="{{ route('account.store') }}"
                      method="POST"
                      class="p-6 sm:p-8 lg:p-10">

                    @csrf


                    <div class="space-y-7">


                        {{-- ================================================= --}}
                        {{-- NAMA --}}
                        {{-- ================================================= --}}
                        <div>

                            <label for="name"
                                   class="mb-2.5 flex items-center gap-2 text-sm font-extrabold text-gray-700">

                                <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-blue-50 text-[#0066CC]">
                                    <svg class="h-4 w-4"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zm7-5v6m3-3h-6"/>
                                    </svg>
                                </span>

                                Nama Lengkap

                                <span class="text-red-500">*</span>

                            </label>


                            <div class="relative">

                                <input
                                    id="name"
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    placeholder="Masukkan nama lengkap"
                                    autocomplete="name"
                                    required
                                    class="w-full rounded-2xl border-2 border-gray-200 bg-gray-50 px-5 py-3.5 pl-12 text-sm text-gray-700 outline-none transition-all duration-300 placeholder:text-gray-400 focus:border-[#0066CC] focus:bg-white focus:ring-4 focus:ring-blue-100"
                                >

                                <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="1.8"
                                          d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8z"/>
                                </svg>

                            </div>

                            @error('name')
                                <p class="mt-2 text-xs font-semibold text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- ================================================= --}}
                        {{-- EMAIL --}}
                        {{-- ================================================= --}}
                        <div>

                            <label for="email"
                                   class="mb-2.5 flex items-center gap-2 text-sm font-extrabold text-gray-700">

                                <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-blue-50 text-[#0066CC]">
                                    <svg class="h-4 w-4"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="1.8"
                                              d="M3 8l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                                    </svg>
                                </span>

                                Email

                                <span class="text-red-500">*</span>

                            </label>


                            <div class="relative">

                                <input
                                    id="email"
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    placeholder="contoh@email.com"
                                    autocomplete="email"
                                    required
                                    class="w-full rounded-2xl border-2 border-gray-200 bg-gray-50 px-5 py-3.5 pl-12 text-sm text-gray-700 outline-none transition-all duration-300 placeholder:text-gray-400 focus:border-[#0066CC] focus:bg-white focus:ring-4 focus:ring-blue-100"
                                >

                                <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="1.8"
                                          d="M3 8l9 6 9-6M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z"/>
                                </svg>

                            </div>

                            @error('email')
                                <p class="mt-2 text-xs font-semibold text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- ================================================= --}}
                        {{-- PASSWORD --}}
                        {{-- ================================================= --}}
                        <div>

                            <label for="password"
                                   class="mb-2.5 flex items-center gap-2 text-sm font-extrabold text-gray-700">

                                <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-blue-50 text-[#0066CC]">
                                    <svg class="h-4 w-4"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="1.8"
                                              d="M16.5 10.5V7a4.5 4.5 0 00-9 0v3.5M6 10.5h12a2 2 0 012 2v7a2 2 0 01-2 2H6a2 2 0 01-2-2v-7a2 2 0 012-2z"/>
                                    </svg>
                                </span>

                                Password

                                <span class="text-red-500">*</span>

                            </label>


                            <div class="relative">

                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    placeholder="Masukkan password"
                                    autocomplete="new-password"
                                    required
                                    class="w-full rounded-2xl border-2 border-gray-200 bg-gray-50 px-5 py-3.5 pl-12 text-sm text-gray-700 outline-none transition-all duration-300 placeholder:text-gray-400 focus:border-[#0066CC] focus:bg-white focus:ring-4 focus:ring-blue-100"
                                >

                                <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="1.8"
                                          d="M16.5 10.5V7a4.5 4.5 0 00-9 0v3.5M6 10.5h12a2 2 0 012 2v7a2 2 0 01-2 2H6a2 2 0 01-2-2v-7a2 2 0 012-2z"/>
                                </svg>

                            </div>

                            @error('password')
                                <p class="mt-2 text-xs font-semibold text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror


                            {{-- PASSWORD INFO --}}
                            <div class="mt-3 flex items-start gap-3 rounded-2xl border border-blue-100 bg-blue-50/70 p-4">

                                <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-xl bg-white text-[#0066CC] shadow-sm">

                                    <svg class="h-4 w-4"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M12 11c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zm0 2v4m9-5a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>

                                </div>

                                <div>

                                    <p class="text-xs font-extrabold text-[#003A8F]">
                                        Tips keamanan password
                                    </p>

                                    <p class="mt-1 text-xs leading-relaxed text-gray-600">
                                        Gunakan password yang kuat dan sulit ditebak.
                                        Sebaiknya gunakan kombinasi huruf, angka, dan simbol.
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- ROLE --}}
                        {{-- ================================================= --}}
                        <div>

                            <label for="role"
                                   class="mb-2.5 flex items-center gap-2 text-sm font-extrabold text-gray-700">

                                <span class="flex h-7 w-7 items-center justify-center rounded-lg bg-blue-50 text-[#0066CC]">
                                    <svg class="h-4 w-4"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="1.8"
                                              d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 12c0 5.591 3.824 10.29 9 11.622C17.176 22.29 21 17.591 21 12c0-.997-.121-1.965-.35-2.882"/>
                                    </svg>
                                </span>

                                Role / Hak Akses

                                <span class="text-red-500">*</span>

                            </label>


                            <div class="relative">

                                <select
                                    id="role"
                                    name="role"
                                    required
                                    class="w-full cursor-pointer appearance-none rounded-2xl border-2 border-gray-200 bg-gray-50 px-5 py-3.5 pl-12 pr-12 text-sm text-gray-700 outline-none transition-all duration-300 focus:border-[#0066CC] focus:bg-white focus:ring-4 focus:ring-blue-100">

                                    <option value="" disabled {{ old('role') ? '' : 'selected' }}>
                                        -- Pilih Role --
                                    </option>

                                    <option value="Kepala Kantor TVRI" {{ old('role') == 'Kepala Kantor TVRI' ? 'selected' : '' }}>
                                        Kepala Kantor TVRI
                                    </option>

                                    <option value="Bendahara" {{ old('role') == 'Bendahara' ? 'selected' : '' }}>
                                        Bendahara
                                    </option>

                                    <option value="PPSPM" {{ old('role') == 'PPSPM' ? 'selected' : '' }}>
                                        PPSPM
                                    </option>

                                    <option value="Keuangan" {{ old('role') == 'Keuangan' ? 'selected' : '' }}>
                                        Keuangan
                                    </option>

                                    <option value="Program" {{ old('role') == 'Program' ? 'selected' : '' }}>
                                        Program
                                    </option>

                                    <option value="Berita" {{ old('role') == 'Berita' ? 'selected' : '' }}>
                                        Berita
                                    </option>

                                    <option value="Teknik" {{ old('role') == 'Teknik' ? 'selected' : '' }}>
                                        Teknik
                                    </option>

                                    <option value="KMB" {{ old('role') == 'KMB' ? 'selected' : '' }}>
                                        KMB
                                    </option>

                                    <option value="Promo" {{ old('role') == 'Promo' ? 'selected' : '' }}>
                                        Promo
                                    </option>

                                    <option value="Umum" {{ old('role') == 'Umum' ? 'selected' : '' }}>
                                        Umum
                                    </option>

                                    <option value="Tata usaha" {{ old('role') == 'Tata usaha' ? 'selected' : '' }}>
                                        Tata usaha
                                    </option>

                                    <option value="Pengembangan usaha" {{ old('role') == 'Pengembangan usaha' ? 'selected' : '' }}>
                                        Pengembangan usaha
                                    </option>

                                </select>


                                {{-- Left Icon --}}
                                <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="1.8"
                                          d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 12c0 5.591 3.824 10.29 9 11.622C17.176 22.29 21 17.591 21 12c0-.997-.121-1.965-.35-2.882"/>
                                </svg>


                                {{-- Arrow --}}
                                <svg class="pointer-events-none absolute right-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M19 9l-7 7-7-7"/>
                                </svg>

                            </div>

                            @error('role')
                                <p class="mt-2 text-xs font-semibold text-red-500">
                                    {{ $message }}
                                </p>
                            @enderror

                            <p class="mt-2 text-xs text-gray-400">
                                Pilih role sesuai dengan tugas dan tanggung jawab pengguna.
                            </p>

                        </div>

                    </div>


                    {{-- ===================================================== --}}
                    {{-- ACTION --}}
                    {{-- ===================================================== --}}
                    <div class="mt-10 flex flex-col-reverse gap-3 border-t border-gray-100 pt-7 sm:flex-row sm:justify-end">

                        <a href="{{ route('account.index') }}"
                           class="inline-flex items-center justify-center gap-2 rounded-2xl border border-gray-200 bg-white px-6 py-3.5 text-sm font-bold text-gray-600 shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:border-gray-300 hover:bg-gray-50 hover:shadow-md">

                            <svg class="h-4 w-4"
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


                        <button
                            type="submit"
                            class="group inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-[#0066CC] to-[#003A8F] px-7 py-3.5 text-sm font-extrabold text-white shadow-lg shadow-blue-900/20 transition-all duration-300 hover:-translate-y-1 hover:from-[#0056B8] hover:to-[#002766] hover:shadow-xl hover:shadow-blue-900/30">

                            <svg class="h-5 w-5 transition-transform duration-300 group-hover:rotate-90"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2.5"
                                      d="M12 5v14M5 12h14"/>
                            </svg>

                            Buat Akun

                        </button>

                    </div>

                </form>

            </div>


            {{-- ========================================================= --}}
            {{-- INFO CARDS --}}
            {{-- ========================================================= --}}
            <div class="mt-6 grid grid-cols-1 gap-4 md:grid-cols-3">

                {{-- Card 1 --}}
                <div class="group rounded-2xl border border-blue-100 bg-white p-5 shadow-lg shadow-blue-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">

                    <div class="flex items-start gap-3">

                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-[#0066CC] transition-colors duration-300 group-hover:bg-[#0066CC] group-hover:text-white">

                            <svg class="h-5 w-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 12c0 5.591 3.824 10.29 9 11.622C17.176 22.29 21 17.591 21 12c0-.997-.121-1.965-.35-2.882"/>
                            </svg>

                        </div>

                        <div>

                            <h4 class="text-sm font-extrabold text-gray-800">
                                Data Valid
                            </h4>

                            <p class="mt-1 text-xs leading-relaxed text-gray-500">
                                Pastikan nama dan email pengguna sudah benar.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Card 2 --}}
                <div class="group rounded-2xl border border-blue-100 bg-white p-5 shadow-lg shadow-blue-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">

                    <div class="flex items-start gap-3">

                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-[#0066CC] transition-colors duration-300 group-hover:bg-[#0066CC] group-hover:text-white">

                            <svg class="h-5 w-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 15v2m-6 4h12a2 2 0 002-2v-7a2 2 0 00-2-2H6a2 2 0 00-2 2v7a2 2 0 002 2zm10-11V7a4 4 0 00-8 0v2h8z"/>
                            </svg>

                        </div>

                        <div>

                            <h4 class="text-sm font-extrabold text-gray-800">
                                Password Aman
                            </h4>

                            <p class="mt-1 text-xs leading-relaxed text-gray-500">
                                Gunakan kombinasi karakter yang sulit ditebak.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Card 3 --}}
                <div class="group rounded-2xl border border-blue-100 bg-white p-5 shadow-lg shadow-blue-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">

                    <div class="flex items-start gap-3">

                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-50 text-[#0066CC] transition-colors duration-300 group-hover:bg-[#0066CC] group-hover:text-white">

                            <svg class="h-5 w-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 11c.552 0 1-.448 1-1s-.448-1-1-1-1 .448-1 1 .448 1 1 1zm0 2v4m9-5a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>

                        </div>

                        <div>

                            <h4 class="text-sm font-extrabold text-gray-800">
                                Role Tepat
                            </h4>

                            <p class="mt-1 text-xs leading-relaxed text-gray-500">
                                Tentukan hak akses sesuai tanggung jawab user.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>