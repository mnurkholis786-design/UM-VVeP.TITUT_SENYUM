<x-app-layout>

    {{-- =========================================================
        HEADER
    ========================================================== --}}
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-[#003A8F] to-[#00AEEF]
                        flex items-center justify-center shadow-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 4v16m8-8H4"/>
                </svg>
            </div>

            <div>
                <h2 class="font-bold text-xl text-gray-800 leading-tight">
                    {{ __('Input Arsip') }}
                </h2>
                <p class="text-xs text-gray-500 mt-0.5">
                    Tambah sub kategori arsip
                </p>
            </div>
        </div>
    </x-slot>


    {{-- =========================================================
        BACK BUTTON
    ========================================================== --}}
    <div class="bg-gradient-to-b from-[#f4f9ff] to-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-5">

            <a href="{{ route('category.show', $category->id) }}"
               class="group inline-flex items-center gap-2 px-4 py-2.5
                      bg-white border border-blue-100
                      text-[#003A8F] font-semibold text-sm
                      rounded-xl shadow-sm
                      hover:bg-[#003A8F] hover:text-white
                      hover:border-[#003A8F] hover:shadow-lg
                      transition-all duration-300">

                <svg class="w-5 h-5 transition-transform duration-300 group-hover:-translate-x-1"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>

                <span>Kembali</span>
            </a>

        </div>
    </div>


    {{-- =========================================================
        MAIN
    ========================================================== --}}
    <div class="min-h-screen bg-gradient-to-b from-[#f4f9ff] via-white to-[#eef7ff] py-7">

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- =================================================
                CARD UTAMA
            ================================================== --}}
            <div class="bg-white rounded-3xl border border-blue-100
                        shadow-[0_20px_60px_rgba(0,58,143,0.12)]
                        overflow-hidden">


                {{-- =================================================
                    HERO HEADER
                ================================================== --}}
                <div class="relative overflow-hidden
                            bg-gradient-to-br from-[#003A8F] via-[#0056C7] to-[#00AEEF]
                            px-6 sm:px-8 py-7">

                    {{-- Decorative circles --}}
                    <div class="absolute -right-16 -top-20 w-56 h-56
                                bg-white/10 rounded-full"></div>

                    <div class="absolute -right-4 -bottom-28 w-72 h-72
                                bg-white/5 rounded-full"></div>

                    <div class="absolute left-1/2 -top-20 w-40 h-40
                                bg-cyan-300/10 rounded-full blur-2xl"></div>


                    <div class="relative z-10">

                        <div class="flex flex-col sm:flex-row sm:items-center gap-5">

                            {{-- Icon --}}
                            <div class="w-14 h-14 shrink-0
                                        flex items-center justify-center
                                        bg-white/15 backdrop-blur-md
                                        border border-white/20
                                        rounded-2xl
                                        shadow-[0_10px_30px_rgba(0,0,0,0.18)]">

                                <svg class="w-7 h-7 text-white"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M12 4v16m8-8H4"/>
                                </svg>

                            </div>


                            {{-- Title --}}
                            <div class="min-w-0">

                                <div class="flex items-center gap-2 mb-1">
                                    <span class="inline-flex items-center
                                                 px-2.5 py-1
                                                 rounded-full
                                                 bg-white/15
                                                 border border-white/20
                                                 text-[11px] font-bold
                                                 uppercase tracking-wider
                                                 text-white">
                                        Arsip Digital
                                    </span>
                                </div>

                                <h3 class="text-2xl sm:text-3xl font-bold text-white">
                                    Tambah Sub Kategori
                                </h3>

                                <p class="text-sm sm:text-base text-blue-100 mt-1">
                                    Lengkapi data sub kategori arsip dengan benar.
                                </p>

                            </div>

                        </div>


                        {{-- =================================================
                            CATEGORY PARENT INFO
                        ================================================== --}}
                        <div class="mt-6 p-4 rounded-2xl
                                    bg-white/10 backdrop-blur-md
                                    border border-white/20">

                            <div class="flex items-start gap-3">

                                <div class="w-9 h-9 shrink-0
                                            rounded-xl bg-white/15
                                            flex items-center justify-center">

                                    <svg class="w-5 h-5 text-white"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M3 7h5l2 2h11v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/>
                                    </svg>

                                </div>

                                <div class="min-w-0">
                                    <p class="text-xs text-blue-100 mb-0.5">
                                        Sub kategori akan ditambahkan ke kategori
                                    </p>

                                    <p class="text-sm sm:text-base font-bold text-white truncate">
                                        {{ $category->category_name }}
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                    FORM
                ================================================== --}}
                <form action="{{ route('subcategory.store') }}"
                      method="POST"
                      class="p-6 sm:p-8">

                    @csrf

                    {{-- Dynamic category ID --}}
                    <input type="hidden"
                           name="category_id"
                           value="{{ $category->id }}">


                    {{-- =================================================
                        VALIDATION SUMMARY
                    ================================================== --}}
                    @if ($errors->any())
                        <div class="mb-6 p-4 rounded-2xl
                                    bg-red-50 border border-red-200">

                            <div class="flex items-start gap-3">

                                <div class="w-9 h-9 shrink-0 rounded-xl
                                            bg-red-100 flex items-center justify-center">

                                    <svg class="w-5 h-5 text-red-600"
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
                                    <p class="font-bold text-red-800 text-sm">
                                        Periksa kembali data yang dimasukkan
                                    </p>

                                    <ul class="mt-1 text-xs text-red-700 list-disc list-inside">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>

                        </div>
                    @endif


                    {{-- =================================================
                        NAMA SUB KATEGORI
                    ================================================== --}}
                    <div class="mb-8">

                        <div class="flex items-center justify-between mb-2">

                            <label for="name"
                                   class="flex items-center gap-2
                                          text-sm font-bold text-gray-800">

                                <span class="w-8 h-8 rounded-lg
                                             bg-blue-50
                                             flex items-center justify-center">

                                    <svg class="w-4 h-4 text-[#0056C7]"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>

                                </span>

                                Nama Sub Kategori

                                <span class="text-red-500">*</span>

                            </label>

                        </div>


                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               required
                               placeholder="Contoh: Belanja Pegawai"
                               class="w-full px-4 py-3.5
                                      bg-gray-50
                                      border-2 border-gray-200
                                      rounded-2xl
                                      text-gray-800
                                      placeholder-gray-400
                                      outline-none
                                      transition-all duration-200
                                      focus:bg-white
                                      focus:border-[#0056C7]
                                      focus:ring-4 focus:ring-blue-100
                                      @error('name') border-red-400 focus:border-red-500 focus:ring-red-100 @enderror">

                        <div class="flex items-center justify-between mt-2">
                            <p class="text-xs text-gray-500">
                                Gunakan nama yang jelas dan mudah dipahami.
                            </p>

                            <span class="text-[11px] text-gray-400">
                                Wajib diisi
                            </span>
                        </div>

                        @error('name')
                            <p class="mt-2 text-xs font-medium text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    {{-- =================================================
                        JENIS KATEGORI
                    ================================================== --}}
                    <div>

                        <div class="flex items-center gap-3 mb-2">

                            <div class="w-8 h-8 rounded-lg
                                        bg-blue-50
                                        flex items-center justify-center">

                                <svg class="w-4 h-4 text-[#0056C7]"
                                     fill="currentColor"
                                     viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                          clip-rule="evenodd"/>
                                </svg>

                            </div>

                            <div>
                                <h3 class="text-sm font-bold text-gray-800">
                                    Jenis Kategori
                                </h3>

                                <p class="text-xs text-gray-500">
                                    Pilih metode pembayaran atau sumber dana
                                </p>
                            </div>

                        </div>


                        {{-- Info --}}
                        <div class="mt-4 mb-5 p-4 rounded-2xl
                                    bg-blue-50
                                    border border-blue-100">

                            <div class="flex items-start gap-3">

                                <div class="w-8 h-8 shrink-0
                                            rounded-lg bg-white
                                            flex items-center justify-center
                                            shadow-sm">

                                    <svg class="w-4 h-4 text-[#0056C7]"
                                         fill="none"
                                         stroke="currentColor"
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z"/>
                                    </svg>

                                </div>

                                <div>
                                    <p class="text-sm font-semibold text-[#003A8F]">
                                        Pilihan jenis kategori
                                    </p>

                                    <p class="text-xs text-blue-700 mt-1 leading-relaxed">
                                        Pilih salah satu jenis kategori atau
                                        kosongkan keduanya jika sub kategori
                                        tidak menggunakan metode pembayaran
                                        maupun sumber dana.
                                    </p>
                                </div>

                            </div>

                        </div>


                        {{-- =================================================
                            GRID PAYMENT + FUNDING
                        ================================================== --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                            {{-- =================================================
                                METODE PEMBAYARAN
                            ================================================== --}}
                            <div class="group p-5
                                        bg-white
                                        border-2 border-gray-100
                                        rounded-2xl
                                        shadow-sm
                                        hover:border-[#0074D9]
                                        hover:shadow-lg
                                        transition-all duration-300">

                                <div class="flex items-center gap-3 mb-4">

                                    <div class="w-10 h-10 rounded-xl
                                                bg-blue-50
                                                flex items-center justify-center
                                                group-hover:bg-[#0056C7]
                                                transition-colors duration-300">

                                        <svg class="w-5 h-5 text-[#0056C7]
                                                    group-hover:text-white"
                                             fill="currentColor"
                                             viewBox="0 0 20 20">
                                            <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z"/>
                                            <path fill-rule="evenodd"
                                                  d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 100-2 1 1 0 000 2zm3-1a1 1 0 011-1h4a1 1 0 110 2H8a1 1 0 01-1-1z"
                                                  clip-rule="evenodd"/>
                                        </svg>

                                    </div>

                                    <div>
                                        <h4 class="text-sm font-bold text-gray-800">
                                            Metode Pembayaran
                                        </h4>

                                        <p class="text-xs text-gray-500">
                                            Pilihan metode pembayaran
                                        </p>
                                    </div>

                                </div>


                                <select name="payment_method"
                                        class="w-full px-4 py-3
                                               bg-gray-50
                                               border-2 border-gray-200
                                               rounded-xl
                                               text-sm text-gray-700
                                               outline-none
                                               transition-all duration-200
                                               focus:bg-white
                                               focus:border-[#0056C7]
                                               focus:ring-4 focus:ring-blue-100">

                                    <option value="">
                                        -- Kosongkan jika tidak dipilih --
                                    </option>

                                    @foreach ($payment as $pay)
                                        <option value="{{ $pay->id }}"
                                            {{ old('payment_method') == $pay->id ? 'selected' : '' }}>
                                            {{ $pay->payment_method_name }}
                                            {{ $pay->sub_category ? ' → ' . $pay->sub_category : '' }}
                                        </option>
                                    @endforeach

                                </select>

                            </div>


                            {{-- =================================================
                                SUMBER DANA
                            ================================================== --}}
                            <div class="group p-5
                                        bg-white
                                        border-2 border-gray-100
                                        rounded-2xl
                                        shadow-sm
                                        hover:border-[#00AEEF]
                                        hover:shadow-lg
                                        transition-all duration-300">

                                <div class="flex items-center gap-3 mb-4">

                                    <div class="w-10 h-10 rounded-xl
                                                bg-cyan-50
                                                flex items-center justify-center
                                                group-hover:bg-[#00AEEF]
                                                transition-colors duration-300">

                                        <svg class="w-5 h-5 text-[#008FC7]
                                                    group-hover:text-white"
                                             fill="currentColor"
                                             viewBox="0 0 20 20">

                                            <path fill-rule="evenodd"
                                                  d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4z"
                                                  clip-rule="evenodd"/>

                                            <path d="M6 8a2 2 0 012-2h8a2 2 0 012 2v6a2 2 0 01-2 2H8a2 2 0 01-2-2V8z"/>

                                        </svg>

                                    </div>

                                    <div>
                                        <h4 class="text-sm font-bold text-gray-800">
                                            Sumber Dana
                                        </h4>

                                        <p class="text-xs text-gray-500">
                                            Pilihan sumber dana
                                        </p>
                                    </div>

                                </div>


                                <select name="funding_source"
                                        class="w-full px-4 py-3
                                               bg-gray-50
                                               border-2 border-gray-200
                                               rounded-xl
                                               text-sm text-gray-700
                                               outline-none
                                               transition-all duration-200
                                               focus:bg-white
                                               focus:border-[#00AEEF]
                                               focus:ring-4 focus:ring-cyan-100">

                                    <option value="">
                                        -- Kosongkan jika tidak dipilih --
                                    </option>

                                    @foreach ($funding as $fun)
                                        <option value="{{ $fun->id }}"
                                            {{ old('funding_source') == $fun->id ? 'selected' : '' }}>
                                            {{ $fun->funding_source_name }}
                                            {{ $fun->sub_category ? ' → ' . $fun->sub_category : '' }}
                                        </option>
                                    @endforeach

                                </select>

                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                        BOTTOM INFO
                    ================================================== --}}
                    <div class="mt-8 p-4 rounded-2xl
                                bg-gradient-to-r from-[#f4f9ff] to-[#eefaff]
                                border border-blue-100">

                        <div class="flex items-start gap-3">

                            <div class="w-9 h-9 shrink-0 rounded-xl
                                        bg-white
                                        flex items-center justify-center
                                        shadow-sm">

                                <svg class="w-5 h-5 text-[#0056C7]"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M12 9v2m0 4h.01M5.07 19h13.86c1.54 0 2.5-1.67 1.73-3L13.73 5c-.77-1.33-2.69-1.33-3.46 0L3.34 16c-.77 1.33.19 3 1.73 3z"/>
                                </svg>

                            </div>

                            <div>
                                <p class="text-sm font-bold text-[#003A8F]">
                                    Pastikan data sudah benar
                                </p>

                                <p class="text-xs text-gray-600 mt-1 leading-relaxed">
                                    Sub kategori akan tersimpan di bawah kategori
                                    <strong>{{ $category->category_name }}</strong>.
                                    Data yang sudah disimpan dapat digunakan
                                    untuk proses pengarsipan selanjutnya.
                                </p>
                            </div>

                        </div>

                    </div>


                    {{-- =================================================
                        ACTION BUTTON
                    ================================================== --}}
                    <div class="flex flex-col-reverse sm:flex-row
                                sm:items-center sm:justify-between
                                gap-4 pt-7 mt-7
                                border-t border-gray-100">

                        <a href="{{ route('category.show', $category->id) }}"
                           class="inline-flex items-center justify-center gap-2
                                  px-6 py-3
                                  rounded-xl
                                  border-2 border-gray-200
                                  bg-white
                                  text-gray-700
                                  font-bold text-sm
                                  hover:bg-gray-50
                                  hover:border-gray-300
                                  hover:-translate-y-0.5
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
                                class="group inline-flex items-center justify-center gap-2
                                       px-7 py-3
                                       rounded-xl
                                       bg-gradient-to-r from-[#003A8F] via-[#0056C7] to-[#00AEEF]
                                       text-white
                                       font-bold text-sm
                                       shadow-lg shadow-blue-200
                                       hover:shadow-xl hover:shadow-blue-300
                                       hover:-translate-y-0.5
                                       active:translate-y-0
                                       transition-all duration-200">

                            <svg class="w-5 h-5 transition-transform duration-200 group-hover:scale-110"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M5 13l4 4L19 7"/>
                            </svg>

                            Simpan Sub Kategori
                        </button>

                    </div>

                </form>

            </div>


            {{-- =================================================
                FOOTER INFO
            ================================================== --}}
            <div class="mt-5 text-center">

                <p class="text-xs text-gray-400">
                    Data sub kategori akan mengikuti kategori induk yang sedang dipilih.
                </p>

            </div>

        </div>

    </div>

</x-app-layout>