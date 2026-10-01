<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3 animate-header-slide">
            <div class="flex h-11 w-11 items-center justify-center rounded-2xl bg-gradient-to-br from-[#0066CC] to-[#003A8F] shadow-lg shadow-blue-900/20">
                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            </div>

            <div>
                <h2 class="text-2xl font-extrabold tracking-tight text-gray-800">
                    Kelola User
                </h2>
                <p class="text-sm text-gray-500">
                    Kelola akun, role, dan akses pengguna sistem
                </p>
            </div>
        </div>
    </x-slot>

    {{-- =========================================================
        STYLE & KEYFRAME ANIMATIONS
    ========================================================= --}}
    <style>
        @keyframes slideInFromTop {
            0% { opacity: 0; transform: translateY(-15px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInFromBottom {
            0% { opacity: 0; transform: translateY(25px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        .animate-header-slide {
            animation: slideInFromTop 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .animate-hero-enter {
            animation: slideInFromBottom 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .animate-stats-enter {
            opacity: 0;
            animation: slideInFromBottom 0.6s cubic-bezier(0.16, 1, 0.3, 1) 0.15s forwards;
        }

        .animate-table-enter {
            opacity: 0;
            animation: slideInFromBottom 0.6s cubic-bezier(0.16, 1, 0.3, 1) 0.3s forwards;
        }
    </style>

    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/40 to-white py-8">

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 space-y-8">

            {{-- ========================================================= --}}
            {{-- HERO --}}
            {{-- ========================================================= --}}
            <div class="relative overflow-hidden rounded-[28px] bg-gradient-to-br from-[#003A8F] via-[#0056B8] to-[#0074D9] p-7 shadow-2xl shadow-blue-900/20 animate-hero-enter">

                {{-- Decorative Background --}}
                <div class="absolute -right-20 -top-20 h-64 w-64 rounded-full bg-white/10 blur-2xl"></div>
                <div class="absolute -bottom-32 left-1/3 h-72 w-72 rounded-full bg-cyan-300/10 blur-3xl"></div>

                <div class="relative flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

                    <div class="flex items-center gap-5">

                        <div class="flex h-16 w-16 shrink-0 items-center justify-center rounded-2xl bg-white/15 shadow-inner ring-1 ring-white/20 backdrop-blur-md">

                            <svg class="h-9 w-9 text-white"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>

                        </div>

                        <div>
                            <p class="mb-1 text-sm font-semibold uppercase tracking-[0.2em] text-blue-100">
                                Administration
                            </p>

                            <h1 class="text-3xl font-black tracking-tight text-white sm:text-4xl">
                                Manajemen Akun
                            </h1>

                            <p class="mt-2 max-w-xl text-sm leading-relaxed text-blue-100 sm:text-base">
                                Kelola pengguna yang terdaftar, role, dan akses mereka
                                ke dalam sistem.
                            </p>
                        </div>

                    </div>

                    {{-- Register --}}
                    <a href="{{ route('account.create') }}"
                       class="group inline-flex shrink-0 items-center justify-center gap-3 rounded-2xl bg-white px-6 py-3.5 font-bold text-[#003A8F] shadow-xl shadow-blue-950/20 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl">

                        <span class="flex h-8 w-8 items-center justify-center rounded-xl bg-blue-50 transition group-hover:bg-blue-100">
                            <svg class="h-5 w-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2.5"
                                      d="M12 4v16m8-8H4"/>
                            </svg>
                        </span>

                        <span>Tambah Account</span>

                    </a>

                </div>
            </div>


            {{-- ========================================================= --}}
            {{-- STATISTICS --}}
            {{-- ========================================================= --}}
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3 animate-stats-enter">

                {{-- Total User --}}
                <div class="group relative overflow-hidden rounded-3xl border border-blue-100 bg-white p-6 shadow-lg shadow-blue-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:shadow-blue-900/10">

                    <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-blue-50 transition-transform duration-500 group-hover:scale-150"></div>

                    <div class="relative flex items-start justify-between">

                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-gray-400">
                                Total User
                            </p>

                            <h3 class="mt-3 text-4xl font-black text-gray-800">
                                {{ $users->count() }}
                            </h3>

                            <div class="mt-3 flex items-center gap-2">
                                <span class="h-2 w-2 rounded-full bg-[#0066CC]"></span>
                                <span class="text-xs font-semibold text-[#0056B8]">
                                    Terdaftar dalam sistem
                                </span>
                            </div>
                        </div>

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-50 to-blue-100 shadow-inner transition-all duration-300 group-hover:from-[#0066CC] group-hover:to-[#003A8F]">

                            <svg class="h-7 w-7 text-[#0066CC] transition-colors duration-300 group-hover:text-white"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 005.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>

                        </div>

                    </div>
                </div>


                {{-- Administrator --}}
                <div class="group relative overflow-hidden rounded-3xl border border-sky-100 bg-white p-6 shadow-lg shadow-blue-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:shadow-blue-900/10">

                    <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-sky-50 transition-transform duration-500 group-hover:scale-150"></div>

                    <div class="relative flex items-start justify-between">

                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-gray-400">
                                Administrator
                            </p>

                            <h3 class="mt-3 text-4xl font-black text-gray-800">
                                {{ $users->where('role', 'Admin')->count() }}
                            </h3>

                            <div class="mt-3 flex items-center gap-2">
                                <span class="h-2 w-2 rounded-full bg-sky-500"></span>
                                <span class="text-xs font-semibold text-sky-600">
                                    Administrator aktif
                                </span>
                            </div>
                        </div>

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-sky-50 to-blue-100 shadow-inner transition-all duration-300 group-hover:from-[#0074D9] group-hover:to-[#0056B8]">

                            <svg class="h-7 w-7 text-[#0074D9] transition-colors duration-300 group-hover:text-white"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M12 15.5a3.5 3.5 0 100-7 3.5 3.5 0 000 7z"/>
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M19.4 15a1.7 1.7 0 00.34 1.88l.06.06-1.7 1.7-.06-.06a1.7 1.7 0 00-1.88-.34 1.7 1.7 0 00-1.04 1.56V20h-2.4v-.08a1.7 1.7 0 00-1.04-1.56 1.7 1.7 0 00-1.88.34l-.06.06-1.7-1.7.06-.06A1.7 1.7 0 008.44 15a1.7 1.7 0 00-1.56-1.04H6v-2.4h.88A1.7 1.7 0 008.44 10a1.7 1.7 0 00-.34-1.88l-.06-.06 1.7-1.7.06.06a1.7 1.7 0 001.88.34A1.7 1.7 0 0012.72 5.2V5h2.4v.2a1.7 1.7 0 001.04 1.56 1.7 1.7 0 001.88-.34l.06-.06 1.7 1.7-.06.06A1.7 1.7 0 0019.4 10a1.7 1.7 0 001.56 1.04H21v2.4h-.04A1.7 1.7 0 0019.4 15z"/>
                            </svg>

                        </div>

                    </div>
                </div>


                {{-- User Biasa --}}
                <div class="group relative overflow-hidden rounded-3xl border border-cyan-100 bg-white p-6 shadow-lg shadow-blue-900/5 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl hover:shadow-blue-900/10 sm:col-span-2 xl:col-span-1">

                    <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-cyan-50 transition-transform duration-500 group-hover:scale-150"></div>

                    <div class="relative flex items-start justify-between">

                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.18em] text-gray-400">
                                User Biasa
                            </p>

                            <h3 class="mt-3 text-4xl font-black text-gray-800">
                                {{ $users->where('role', '!=', 'Admin')->count() }}
                            </h3>

                            <div class="mt-3 flex items-center gap-2">
                                <span class="h-2 w-2 rounded-full bg-cyan-500"></span>
                                <span class="text-xs font-semibold text-cyan-600">
                                    Pengguna standar
                                </span>
                            </div>
                        </div>

                        <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-cyan-50 to-blue-100 shadow-inner transition-all duration-300 group-hover:from-[#00AEEF] group-hover:to-[#0066CC]">

                            <svg class="h-7 w-7 text-[#00AEEF] transition-colors duration-300 group-hover:text-white"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M15 20a6 6 0 00-12 0"/>
                                <circle cx="9"
                                        cy="7"
                                        r="4"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.8"/>
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.8"
                                      d="M16 11a4 4 0 100-8M16 13a5.5 5.5 0 015 5.5V20"/>
                            </svg>

                        </div>

                    </div>
                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- MAIN USER TABLE --}}
            {{-- ========================================================= --}}
            <div class="overflow-hidden rounded-[28px] border border-gray-100 bg-white shadow-2xl shadow-blue-900/10 animate-table-enter">

                {{-- TABLE HEADER --}}
                <div class="relative overflow-hidden bg-gradient-to-r from-[#003A8F] via-[#0056B8] to-[#0074D9] px-6 py-6 sm:px-8">

                    <div class="absolute -right-16 -top-20 h-52 w-52 rounded-full bg-white/10 blur-xl"></div>

                    <div class="relative flex flex-col gap-5 xl:flex-row xl:items-center xl:justify-between">

                        {{-- Title --}}
                        <div class="flex items-center gap-4">

                            <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-white/15 shadow-inner ring-1 ring-white/20 backdrop-blur">

                                <svg class="h-6 w-6 text-white"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="1.8"
                                          d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>

                            </div>

                            <div>
                                <h3 class="text-xl font-extrabold text-white sm:text-2xl">
                                    Daftar User Terdaftar
                                </h3>

                                <p class="mt-1 text-sm text-blue-100">
                                    Kelola akun, role, dan akses pengguna
                                </p>
                            </div>

                        </div>


                        {{-- SEARCH --}}
                        <form action="{{ route('account.index') }}"
                              method="GET"
                              class="flex w-full flex-col gap-2 sm:flex-row xl:w-auto">

                            <div class="relative flex-1">

                                <svg class="pointer-events-none absolute left-4 top-1/2 h-5 w-5 -translate-y-1/2 text-gray-400"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"/>
                                </svg>

                                <input
                                    type="text"
                                    name="search"
                                    value="{{ request('search') }}"
                                    placeholder="Cari nama atau email..."
                                    class="w-full rounded-2xl border-0 bg-white py-3 pl-11 pr-4 text-sm text-gray-700 shadow-lg outline-none ring-0 placeholder:text-gray-400 focus:ring-2 focus:ring-cyan-300 sm:w-64"
                                >

                            </div>

                            <button
                                type="submit"
                                class="inline-flex items-center justify-center gap-2 rounded-2xl bg-[#00AEEF] px-5 py-3 text-sm font-bold text-white shadow-lg transition-all duration-300 hover:-translate-y-0.5 hover:bg-[#0098D1] hover:shadow-xl">

                                <svg class="h-4 w-4"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"/>
                                </svg>

                                Cari
                            </button>

                            @if(request('search'))

                                <a href="{{ route('account.index') }}"
                                   class="inline-flex items-center justify-center gap-2 rounded-2xl bg-white/15 px-5 py-3 text-sm font-bold text-white ring-1 ring-white/20 backdrop-blur transition-all duration-300 hover:bg-white/25">

                                    <svg class="h-4 w-4"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M6 18L18 6M6 6l12 12"/>
                                    </svg>

                                    Reset
                                </a>

                            @endif

                        </form>

                    </div>
                </div>


                {{-- ===================================================== --}}
                {{-- TABLE --}}
                {{-- ===================================================== --}}
                @if ($users->count() > 0)

                    <div class="overflow-x-auto">

                        <table class="min-w-full">

                            <thead>
                                <tr class="border-b border-gray-100 bg-slate-50">

                                    <th class="whitespace-nowrap px-6 py-4 text-left text-[11px] font-extrabold uppercase tracking-[0.15em] text-gray-500 sm:px-8">
                                        No
                                    </th>

                                    <th class="whitespace-nowrap px-6 py-4 text-left text-[11px] font-extrabold uppercase tracking-[0.15em] text-gray-500">
                                        Pengguna
                                    </th>

                                    <th class="whitespace-nowrap px-6 py-4 text-left text-[11px] font-extrabold uppercase tracking-[0.15em] text-gray-500">
                                        Email
                                    </th>

                                    <th class="whitespace-nowrap px-6 py-4 text-left text-[11px] font-extrabold uppercase tracking-[0.15em] text-gray-500">
                                        Role
                                    </th>

                                    <th class="whitespace-nowrap px-6 py-4 text-center text-[11px] font-extrabold uppercase tracking-[0.15em] text-gray-500 sm:px-8">
                                        Aksi
                                    </th>

                                </tr>
                            </thead>


                            <tbody class="divide-y divide-gray-100">

                                @php
                                    $no = 1;
                                @endphp

                                @foreach ($users as $user)

                                    <tr class="group transition-all duration-200 hover:bg-blue-50/60">

                                        {{-- No --}}
                                        <td class="px-6 py-5 sm:px-8">

                                            <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-gray-100 text-sm font-extrabold text-gray-500 transition-all duration-200 group-hover:bg-[#0066CC] group-hover:text-white">
                                                {{ $no++ }}
                                            </div>

                                        </td>


                                        {{-- Nama --}}
                                        <td class="px-6 py-5">

                                            <div class="flex min-w-[220px] items-center gap-3">

                                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-[#0066CC] to-[#003A8F] text-sm font-black text-white shadow-md shadow-blue-900/20">

                                                    {{ strtoupper(substr($user->name, 0, 1)) }}

                                                </div>

                                                <div class="min-w-0">

                                                    <p class="truncate font-bold text-gray-800 group-hover:text-[#003A8F]">
                                                        {{ $user->name }}
                                                    </p>

                                                    <p class="mt-0.5 text-xs text-gray-400">
                                                        Account pengguna
                                                    </p>

                                                </div>

                                            </div>

                                        </td>


                                        {{-- Email --}}
                                        <td class="px-6 py-5">

                                            <div class="flex min-w-[220px] items-center gap-2">

                                                <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-blue-50 text-[#0066CC]">

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

                                                <span class="truncate text-sm font-medium text-gray-600">
                                                    {{ $user->email }}
                                                </span>

                                            </div>

                                        </td>


                                        {{-- Role --}}
                                        <td class="px-6 py-5">

                                            @php
                                                $role = $user->role;
                                                $isAdmin = strtolower((string) $role) === 'admin';
                                            @endphp

                                            <span class="inline-flex items-center gap-2 rounded-full px-3.5 py-2 text-xs font-extrabold
                                                {{ $isAdmin
                                                    ? 'bg-blue-100 text-[#003A8F] ring-1 ring-blue-200'
                                                    : 'bg-sky-50 text-[#0066CC] ring-1 ring-sky-200'
                                                }}">

                                                <span class="h-2 w-2 rounded-full
                                                    {{ $isAdmin ? 'bg-[#003A8F]' : 'bg-[#00AEEF]' }}">
                                                </span>

                                                {{ $role }}

                                            </span>

                                        </td>


                                        {{-- Aksi --}}
                                        <td class="px-6 py-5 sm:px-8">

                                            <div class="flex justify-center gap-2">

                                                {{-- EDIT --}}
                                                <a href="{{ route('account.edit', $user->id) }}"
                                                   class="group/edit inline-flex items-center gap-2 rounded-xl bg-blue-50 px-3.5 py-2.5 text-xs font-bold text-[#0056B8] ring-1 ring-blue-100 transition-all duration-200 hover:-translate-y-0.5 hover:bg-[#0066CC] hover:text-white hover:shadow-lg hover:shadow-blue-900/20">

                                                    <svg class="h-4 w-4 transition-transform duration-200 group-hover/edit:scale-110"
                                                         fill="none"
                                                         stroke="currentColor"
                                                         viewBox="0 0 24 24">

                                                        <path stroke-linecap="round"
                                                              stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                                    </svg>

                                                    Edit
                                                </a>


                                                {{-- HAPUS --}}
                                                <form action="{{ route('account.destroy', $user->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Yakin ingin menghapus akun {{ $user->name }}?');">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="group/delete inline-flex items-center gap-2 rounded-xl bg-red-50 px-3.5 py-2.5 text-xs font-bold text-red-600 ring-1 ring-red-100 transition-all duration-200 hover:-translate-y-0.5 hover:bg-red-500 hover:text-white hover:shadow-lg hover:shadow-red-500/20">

                                                        <svg class="h-4 w-4 transition-transform duration-200 group-hover/delete:scale-110"
                                                             fill="none"
                                                             stroke="currentColor"
                                                             viewBox="0 0 24 24">

                                                            <path stroke-linecap="round"
                                                                  stroke-linejoin="round"
                                                                  stroke-width="2"
                                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-9 0h14"/>
                                                        </svg>

                                                        Hapus
                                                    </button>

                                                </form>

                                            </div>

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    {{-- EMPTY STATE --}}
                    <div class="px-6 py-20 text-center">

                        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-blue-50">

                            <svg class="h-10 w-10 text-[#0066CC]"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="1.6"
                                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>

                        </div>

                        <h3 class="mt-5 text-lg font-extrabold text-gray-800">
                            Data user tidak ditemukan
                        </h3>

                        <p class="mx-auto mt-2 max-w-md text-sm text-gray-500">
                            Belum ada akun yang tersedia atau pencarian tidak menemukan
                            user yang sesuai.
                        </p>

                        @if(request('search'))

                            <a href="{{ route('account.index') }}"
                               class="mt-6 inline-flex items-center gap-2 rounded-xl bg-[#0066CC] px-5 py-3 text-sm font-bold text-white shadow-lg shadow-blue-900/20 transition hover:bg-[#003A8F]">

                                Tampilkan Semua User
                            </a>

                        @endif

                    </div>

                @endif


                {{-- FOOTER TABLE --}}
                @if ($users->count() > 0)

                    <div class="border-t border-gray-100 bg-slate-50 px-6 py-4 sm:px-8">

                        <div class="flex flex-col gap-2 text-sm sm:flex-row sm:items-center sm:justify-between">

                            <p class="text-gray-500">
                                Menampilkan
                                <span class="font-extrabold text-gray-700">
                                    {{ $users->count() }}
                                </span>
                                akun
                                @if(request('search'))
                                    untuk pencarian
                                    <span class="font-bold text-[#0056B8]">
                                        "{{ request('search') }}"
                                    </span>
                                @endif
                            </p>

                            <div class="flex items-center gap-2 text-xs font-semibold text-gray-400">

                                <span class="h-2 w-2 rounded-full bg-[#00AEEF]"></span>

                                Sistem Manajemen Account

                            </div>

                        </div>

                    </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>