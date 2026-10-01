<x-app-layout>

    {{-- =========================
        HEADER
    ========================== --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    Dashboard Administrator
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Kelola dokumen, arsip, pengguna, dan aktivitas sistem.
                </p>
            </div>

            <div
                class="hidden sm:flex items-center gap-2 px-4 py-2
                       bg-blue-50 border border-blue-100
                       rounded-xl text-blue-700 text-sm font-semibold"
            >
                <svg
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955
                           11.955 0 0112 2.944a11.955 11.955
                           0 01-8.618 3.04A12.02 12.02
                           0 003 9c0 5.591 3.824 10.29
                           9 11.622C17.176 19.29 21 14.591
                           21 9c0-1.042-.133-2.052-.382-3.016z"
                    />
                </svg>

                Administrator
            </div>
        </div>
    </x-slot>


    {{-- =========================
        MAIN CONTENT
    ========================== --}}
    <div class="py-10 bg-gradient-to-b from-blue-50/60 via-white to-gray-50 min-h-screen">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            {{-- =========================
                WELCOME HERO
            ========================== --}}
            <div
                class="relative overflow-hidden
                       bg-gradient-to-r from-[#003A8F] via-[#0066CC] to-[#00AEEF]
                       text-white
                       p-8 sm:p-10
                       rounded-[28px]
                       shadow-[0_20px_50px_rgba(0,58,143,0.25)]
                       mb-8
                       dashboard-fade-in"
            >

                {{-- Decorative circles --}}
                <div
                    class="absolute -top-20 -right-20
                           w-72 h-72
                           rounded-full
                           bg-white/10
                           blur-sm"
                ></div>

                <div
                    class="absolute -bottom-28 -left-20
                           w-80 h-80
                           rounded-full
                           bg-white/10"
                ></div>

                <div
                    class="absolute top-10 right-1/3
                           w-16 h-16
                           rounded-full
                           bg-white/10"
                ></div>


                <div class="relative z-10">

                    <div
                        class="inline-flex items-center gap-2
                               px-4 py-2
                               rounded-full
                               bg-white/15
                               border border-white/20
                               backdrop-blur-md
                               text-sm font-semibold
                               mb-5"
                    >
                        <span
                            class="w-2.5 h-2.5
                                   rounded-full
                                   bg-cyan-300
                                   shadow-[0_0_12px_rgba(103,232,249,0.9)]"
                        ></span>

                        Dashboard Aktif
                    </div>


                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">

                        <div class="max-w-3xl">

                            <h1
                                class="text-3xl sm:text-4xl lg:text-5xl
                                       font-extrabold
                                       tracking-tight
                                       leading-tight"
                            >
                                Selamat Datang di
                                <span class="text-cyan-200">
                                    Dashboard Administrator!
                                </span>
                            </h1>

                            <p
                                class="mt-4
                                       text-blue-50
                                       text-base sm:text-lg
                                       leading-relaxed
                                       max-w-2xl"
                            >
                                Kelola dokumen, pantau statistik, dan akses
                                berbagai fitur sistem dengan lebih mudah,
                                cepat, dan terorganisir.
                            </p>

                        </div>


                        {{-- Admin Icon --}}
                        <div
                            class="hidden md:flex
                                   flex-shrink-0
                                   w-28 h-28
                                   rounded-3xl
                                   bg-white/15
                                   border border-white/20
                                   backdrop-blur-md
                                   items-center justify-center
                                   shadow-xl"
                        >

                            <svg
                                class="w-16 h-16 text-white"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M12 11c2.21 0 4-1.79
                                       4-4s-1.79-4-4-4-4 1.79-4 4
                                       1.79 4 4 4z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M5.5 21a6.5 6.5 0 0113 0"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M19 8v6m3-3h-6"
                                />
                            </svg>

                        </div>

                    </div>

                </div>

            </div>



            {{-- =========================
                STATISTICS
            ========================== --}}
            <div
                class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3
                       gap-6 mb-8"
            >

                {{-- JUMLAH ARSIP --}}
                <div
                    class="group relative overflow-hidden
                           bg-white
                           rounded-3xl
                           p-6
                           border border-blue-100
                           shadow-[0_10px_30px_rgba(0,58,143,0.08)]
                           hover:shadow-[0_18px_40px_rgba(0,58,143,0.16)]
                           hover:-translate-y-1
                           transition-all duration-300
                           dashboard-fade-in"
                >

                    <div
                        class="absolute -right-10 -top-10
                               w-32 h-32
                               rounded-full
                               bg-blue-50
                               group-hover:bg-blue-100
                               transition"
                    ></div>


                    <div class="relative z-10 flex items-start justify-between">

                        <div>

                            <p
                                class="text-sm font-semibold
                                       text-gray-500
                                       uppercase tracking-wide"
                            >
                                Jumlah Arsip
                            </p>

                            <p
                                class="text-4xl
                                       font-extrabold
                                       text-[#003A8F]
                                       mt-2"
                            >
                                {{ $arsip }}
                            </p>

                            <p class="text-sm text-gray-500 mt-2">
                                Arsip digital tersimpan
                            </p>

                        </div>


                        <div
                            class="w-14 h-14
                                   rounded-2xl
                                   bg-gradient-to-br
                                   from-[#003A8F]
                                   to-[#0066CC]
                                   text-white
                                   flex items-center justify-center
                                   shadow-lg
                                   shadow-blue-200
                                   group-hover:scale-110
                                   transition-transform duration-300"
                        >

                            <svg
                                class="w-7 h-7"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 19a2 2 0 002 2h10a2 2
                                       0 002-2V8.828a2 2 0
                                       00-.586-1.414l-4.828-4.828A2
                                       2 0 0012.172 2H7a2 2 0
                                       00-2 2v15z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 3v5h5"
                                />
                            </svg>

                        </div>

                    </div>

                    <div
                        class="absolute bottom-0 left-0
                               h-1 w-full
                               bg-gradient-to-r
                               from-[#003A8F]
                               to-[#00AEEF]"
                    ></div>

                </div>



                {{-- JUMLAH PENGAJUAN --}}
                <div
                    class="group relative overflow-hidden
                           bg-white
                           rounded-3xl
                           p-6
                           border border-cyan-100
                           shadow-[0_10px_30px_rgba(0,174,239,0.08)]
                           hover:shadow-[0_18px_40px_rgba(0,174,239,0.16)]
                           hover:-translate-y-1
                           transition-all duration-300
                           dashboard-fade-in"
                >

                    <div
                        class="absolute -right-10 -top-10
                               w-32 h-32
                               rounded-full
                               bg-cyan-50
                               group-hover:bg-cyan-100
                               transition"
                    ></div>


                    <div class="relative z-10 flex items-start justify-between">

                        <div>

                            <p
                                class="text-sm font-semibold
                                       text-gray-500
                                       uppercase tracking-wide"
                            >
                                Jumlah Pengajuan
                            </p>

                            <p
                                class="text-4xl
                                       font-extrabold
                                       text-[#0066CC]
                                       mt-2"
                            >
                                {{ $pengajuan }}
                            </p>

                            <p class="text-sm text-gray-500 mt-2">
                                Total pengajuan anggaran
                            </p>

                        </div>


                        <div
                            class="w-14 h-14
                                   rounded-2xl
                                   bg-gradient-to-br
                                   from-[#0066CC]
                                   to-[#00AEEF]
                                   text-white
                                   flex items-center justify-center
                                   shadow-lg
                                   shadow-cyan-200
                                   group-hover:scale-110
                                   transition-transform duration-300"
                        >

                            <svg
                                class="w-7 h-7"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 12h6m-6 4h6m2
                                       5H7a2 2 0 01-2-2V5a2
                                       2 0 012-2h5.586a1 1 0
                                       01.707.293l5.414 5.414A1
                                       1 0 0119 9.414V19a2
                                       2 0 01-2 2z"
                                />
                            </svg>

                        </div>

                    </div>

                    <div
                        class="absolute bottom-0 left-0
                               h-1 w-full
                               bg-gradient-to-r
                               from-[#0066CC]
                               to-[#00AEEF]"
                    ></div>

                </div>



                {{-- JUMLAH USER --}}
                <div
                    class="group relative overflow-hidden
                           bg-white
                           rounded-3xl
                           p-6
                           border border-blue-100
                           shadow-[0_10px_30px_rgba(0,58,143,0.08)]
                           hover:shadow-[0_18px_40px_rgba(0,58,143,0.16)]
                           hover:-translate-y-1
                           transition-all duration-300
                           dashboard-fade-in"
                >

                    <div
                        class="absolute -right-10 -top-10
                               w-32 h-32
                               rounded-full
                               bg-sky-50
                               group-hover:bg-sky-100
                               transition"
                    ></div>


                    <div class="relative z-10 flex items-start justify-between">

                        <div>

                            <p
                                class="text-sm font-semibold
                                       text-gray-500
                                       uppercase tracking-wide"
                            >
                                Jumlah User
                            </p>

                            <p
                                class="text-4xl
                                       font-extrabold
                                       text-[#0056B3]
                                       mt-2"
                            >
                                {{ $akun }}
                            </p>

                            <p class="text-sm text-gray-500 mt-2">
                                Pengguna terdaftar
                            </p>

                        </div>


                        <div
                            class="w-14 h-14
                                   rounded-2xl
                                   bg-gradient-to-br
                                   from-[#0056B3]
                                   to-[#008ED6]
                                   text-white
                                   flex items-center justify-center
                                   shadow-lg
                                   shadow-blue-200
                                   group-hover:scale-110
                                   transition-transform duration-300"
                        >

                            <svg
                                class="w-7 h-7"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17 20h5v-2a3 3 0
                                       00-5.356-1.857M17 20H7m10
                                       0v-2c0-.656-.126-1.283-.356-1.857M7
                                       20H2v-2a3 3 0
                                       015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0
                                       0a5.002 5.002 0 019.288
                                       0M15 7a3 3 0 11-6
                                       0 3 3 0 016 0zm6 3a2
                                       2 0 11-4 0 2 2 0 014
                                       0zM7 10a2 2 0 11-4
                                       0 2 2 0 014 0z"
                                />
                            </svg>

                        </div>

                    </div>

                    <div
                        class="absolute bottom-0 left-0
                               h-1 w-full
                               bg-gradient-to-r
                               from-[#0056B3]
                               to-[#008ED6]"
                    ></div>

                </div>

            </div>



            {{-- =========================
                LIST ARSIP DIGITAL
            ========================== --}}
            <div
                class="bg-white
                       rounded-3xl
                       border border-blue-100
                       shadow-[0_10px_35px_rgba(0,58,143,0.08)]
                       overflow-hidden
                       dashboard-fade-in"
            >

                {{-- HEADER --}}
                <div
                    class="px-6 sm:px-8
                           py-6
                           border-b border-blue-100
                           bg-gradient-to-r
                           from-blue-50
                           via-white
                           to-cyan-50"
                >

                    <div
                        class="flex flex-col sm:flex-row
                               sm:items-center
                               sm:justify-between
                               gap-4"
                    >

                        <div class="flex items-center gap-4">

                            <div
                                class="w-12 h-12
                                       rounded-2xl
                                       bg-gradient-to-br
                                       from-[#003A8F]
                                       to-[#00AEEF]
                                       text-white
                                       flex items-center justify-center
                                       shadow-lg
                                       shadow-blue-200"
                            >

                                <svg
                                    class="w-6 h-6"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 7a2 2 0 012-2h5l2
                                           2h7a2 2 0 012 2v8a2
                                           2 0 01-2 2H5a2 2
                                           0 01-2-2V7z"
                                    />
                                </svg>

                            </div>


                            <div>

                                <h3
                                    class="text-xl
                                           font-bold
                                           text-gray-800"
                                >
                                    Arsip Digital
                                </h3>

                                <p
                                    class="text-sm
                                           text-gray-500
                                           mt-0.5"
                                >
                                    Daftar arsip digital terbaru
                                </p>

                            </div>

                        </div>


                        <div
                            class="inline-flex items-center
                                   gap-2
                                   self-start sm:self-auto
                                   px-4 py-2
                                   rounded-xl
                                   bg-white
                                   border border-blue-200
                                   text-[#003A8F]
                                   font-bold
                                   text-sm
                                   shadow-sm"
                        >

                            <span
                                class="w-2.5 h-2.5
                                       rounded-full
                                       bg-[#00AEEF]"
                            ></span>

                            {{ $arsip }} Arsip

                        </div>

                    </div>

                </div>



                {{-- LIST --}}
                <div class="p-5 sm:p-8">

                    @php
                        $no = 1;
                    @endphp


                    @forelse ($arsiplist as $ar)

                        <div
                            class="group
                                   flex flex-col sm:flex-row
                                   sm:items-center
                                   gap-4
                                   p-4 sm:p-5
                                   mb-3 last:mb-0
                                   rounded-2xl
                                   border border-gray-100
                                   bg-white
                                   hover:bg-blue-50/50
                                   hover:border-blue-200
                                   hover:shadow-md
                                   transition-all duration-300"
                        >

                            {{-- NOMOR --}}
                            <div
                                class="flex-shrink-0
                                       w-11 h-11
                                       rounded-xl
                                       bg-gradient-to-br
                                       from-blue-50
                                       to-cyan-50
                                       border border-blue-100
                                       flex items-center justify-center
                                       text-[#003A8F]
                                       font-extrabold"
                            >
                                {{ $no++ }}
                            </div>


                            {{-- INFORMASI ARSIP --}}
                            <a
                                href="{{ route('digital.show', $ar->id) }}"
                                class="flex-1 min-w-0"
                            >

                                <div
                                    class="flex flex-col sm:flex-row
                                           sm:items-center
                                           gap-2"
                                >

                                    <h4
                                        class="font-bold
                                               text-gray-800
                                               group-hover:text-[#003A8F]
                                               transition-colors
                                               truncate"
                                    >
                                        {{ $ar->archive_name }}
                                    </h4>


                                    <span
                                        class="inline-flex
                                               w-fit
                                               items-center
                                               px-2.5 py-1
                                               rounded-lg
                                               bg-blue-50
                                               border border-blue-100
                                               text-[#0066CC]
                                               text-xs
                                               font-bold"
                                    >
                                        Arsip Digital
                                    </span>

                                </div>


                                <p
                                    class="text-xs
                                           text-gray-400
                                           mt-1"
                                >
                                    Klik untuk melihat detail arsip
                                </p>

                            </a>


                            {{-- TOMBOL LIHAT --}}
                            <a
                                href="{{ route('digital.show', $ar->id) }}"
                                class="inline-flex
                                       items-center
                                       justify-center
                                       gap-2
                                       px-5 py-2.5
                                       rounded-xl
                                       bg-gradient-to-r
                                       from-[#003A8F]
                                       to-[#0066CC]
                                       text-white
                                       text-sm
                                       font-bold
                                       shadow-md
                                       shadow-blue-200
                                       hover:from-[#002E73]
                                       hover:to-[#0055AA]
                                       hover:shadow-lg
                                       hover:-translate-y-0.5
                                       transition-all duration-300"
                            >

                                Lihat

                                <svg
                                    class="w-4 h-4
                                           group-hover:translate-x-1
                                           transition-transform"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 5l7 7-7 7"
                                    />
                                </svg>

                            </a>

                        </div>

                    @empty

                        {{-- EMPTY STATE --}}
                        <div
                            class="py-16
                                   text-center"
                        >

                            <div
                                class="mx-auto
                                       w-20 h-20
                                       rounded-3xl
                                       bg-gradient-to-br
                                       from-blue-50
                                       to-cyan-50
                                       border border-blue-100
                                       flex items-center justify-center
                                       text-[#0066CC]
                                       mb-5"
                            >

                                <svg
                                    class="w-10 h-10"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                        d="M3 7a2 2 0 012-2h5l2
                                           2h7a2 2 0 012 2v8a2
                                           2 0 01-2 2H5a2 2
                                           0 01-2-2V7z"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                        d="M9 13h6"
                                    />
                                </svg>

                            </div>


                            <h4
                                class="text-lg
                                       font-bold
                                       text-gray-700"
                            >
                                Belum Ada Arsip
                            </h4>

                            <p
                                class="text-sm
                                       text-gray-400
                                       mt-2"
                            >
                                Belum terdapat arsip digital yang tersedia.
                            </p>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>


    {{-- =========================
        CUSTOM ANIMATION
    ========================== --}}
    <style>
        @keyframes dashboardFadeIn {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dashboard-fade-in {
            animation: dashboardFadeIn 0.55s ease-out both;
        }
    </style>

</x-app-layout>