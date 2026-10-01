<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Arsip Digital') }}
        </h2>

    </x-slot>


    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            {{-- CARD UTAMA --}}
            <div class="bg-white shadow-sm sm:rounded-lg p-6">


                {{-- HEADER --}}
                <div class="flex items-center gap-3 mb-8">

                    <div class="p-3 bg-blue-500 rounded-lg shadow-md">

                        <svg
                            class="w-6 h-6 text-white"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>

                        </svg>

                    </div>


                    <div>

                        <h3 class="text-xl font-semibold text-gray-800">
                            Daftar Arsip Digital
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            Arsip digital berdasarkan kategori
                        </p>

                    </div>

                </div>



                {{-- DAFTAR KATEGORI --}}
                <div class="space-y-4">


                    @foreach ($categories as $categoryName)

                        @php

                            $categoryArchives = $archives[$categoryName]
                                ?? collect();

                        @endphp


                        {{-- CARD KATEGORI --}}
                        <div
                            class="flex items-center justify-between
                            p-5
                            bg-white
                            border border-gray-200
                            rounded-xl
                            shadow-sm
                            hover:shadow-md
                            hover:border-blue-300
                            transition-all duration-200">


                            {{-- INFORMASI KATEGORI --}}
                            <div class="flex items-center gap-4">


                                {{-- ICON --}}
                                <div
                                    class="w-12 h-12
                                    flex items-center justify-center
                                    bg-gradient-to-br
                                    from-blue-500
                                    to-blue-600
                                    rounded-lg
                                    shadow-md">

                                    <svg
                                        class="w-6 h-6 text-white"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z">
                                        </path>

                                    </svg>

                                </div>


                                {{-- NAMA --}}
                                <div>

                                    <h4 class="text-lg font-semibold text-gray-800">

                                        {{ $categoryName }}

                                    </h4>


                                    <p class="text-sm text-gray-500 mt-1">

                                        {{ $categoryArchives->count() }}

                                        arsip digital

                                    </p>

                                </div>

                            </div>



                            {{-- TOMBOL LIHAT --}}
                            @if ($categoryArchives->count() > 0)

                                <a
                                    href="{{ route(
                                        'digital.category',
                                        $categoryArchives->first()->category_id
                                    ) }}"
                                    class="inline-flex items-center gap-2
                                    px-4 py-2
                                    bg-blue-600
                                    hover:bg-blue-700
                                    text-white
                                    font-medium
                                    rounded-lg
                                    shadow-sm
                                    transition">

                                    Lihat Arsip


                                    <svg
                                        class="w-5 h-5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 5l7 7-7 7">
                                        </path>

                                    </svg>

                                </a>

                            @else

                                {{-- BELUM ADA DATA --}}
                                <span
                                    class="px-4 py-2
                                    bg-gray-100
                                    text-gray-400
                                    rounded-lg
                                    text-sm">

                                    Belum ada arsip

                                </span>

                            @endif


                        </div>

                    @endforeach


                </div>

            </div>

        </div>

    </div>

</x-app-layout>