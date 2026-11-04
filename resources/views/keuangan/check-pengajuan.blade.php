{{-- Form Checklist --}}
<form action="{{ route('keuangan.checkandupate', $pengajuan->id) }}" method="POST">
    @method('PUT')
    @csrf

    {{-- ========================================================= --}}
    {{-- CHECKLIST DOKUMEN & TANDA TANGAN --}}
    {{-- ========================================================= --}}
    <div class="bg-white rounded-md shadow-sm border border-gray-200 overflow-hidden">

        {{-- HEADER --}}
        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between gap-3">

                <div class="flex items-center gap-3">
                    <div class="p-2 bg-white rounded-md shadow-sm border border-gray-200">
                        <svg class="w-5 h-5 text-purple-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                    </div>

                    <h3 class="font-semibold text-lg text-gray-900">
                        Checklist Dokumen & Tanda Tangan
                    </h3>
                </div>

                {{-- TOMBOL TAMBAH --}}
                @if (Auth::check() && Auth::user()->role === 'Keuangan')
                    <button type="button"
                        onclick="openTambahDokumenModal()"
                        class="inline-flex items-center gap-2 px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-semibold rounded-md shadow-sm transition-all duration-200">

                        <svg class="w-4 h-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 4v16m8-8H4" />
                        </svg>

                        Tambah Dokumen
                    </button>
                @endif

            </div>
        </div>

        <div class="p-6">

            <div class="overflow-x-auto rounded-md border border-gray-200">

                <table class="min-w-full bg-white text-sm">

                    <thead class="bg-gray-100 text-gray-700 uppercase text-xs">

                        <tr>
                            <th rowspan="2"
                                class="px-4 py-3 border border-gray-300 text-center">
                                No
                            </th>

                            <th rowspan="2"
                                class="px-4 py-3 border border-gray-300">
                                Nama Dokumen & TTD
                            </th>

                            <th colspan="3"
                                class="px-4 py-3 border border-gray-300 text-center">
                                Dokumen
                            </th>

                            <th colspan="2"
                                class="px-4 py-3 border border-gray-300 text-center">
                                Tanda Tangan
                            </th>

                            @if (Auth::check() && Auth::user()->role === 'Keuangan')
                                <th rowspan="2"
                                    class="px-4 py-3 border border-gray-300 text-center">
                                    Aksi
                                </th>
                            @endif

                            <th rowspan="2"
                                class="px-4 py-3 border border-gray-300 text-center">
                                Keterangan
                            </th>
                        </tr>

                        <tr>
                            <th class="px-4 py-2 border border-gray-300 text-center">
                                Ada
                            </th>

                            <th class="px-4 py-2 border border-gray-300 text-center">
                                Tidak Ada
                            </th>

                            <th class="px-4 py-2 border border-gray-300 text-center">
                                Tidak Diperlukan
                            </th>

                            <th class="px-4 py-2 border border-gray-300 text-center">
                                Lengkap
                            </th>

                            <th class="px-4 py-2 border border-gray-300 text-center">
                                Belum
                            </th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach ($checklistRows as $index => $item)

                            @php
                                $excelRow = $item['row'];
                                $dokumen = $item['dokumen'];
                            @endphp

                            <tr class="hover:bg-gray-50 transition-colors">

                                {{-- NO --}}
                                <td class="px-4 py-3 border border-gray-300 text-center font-medium text-gray-900">
                                    {{ $index + 1 }}

                                    {{-- BARIS EXCEL --}}
                                    <input type="hidden"
                                        name="row[{{ $index }}]"
                                        value="{{ $excelRow }}">
                                </td>

                                {{-- NAMA DOKUMEN --}}
                                <td class="px-4 py-3 border border-gray-300 text-gray-900">

                                    <div class="flex items-center justify-between gap-3">

                                        <div>
                                            @if (preg_match('/^[IVX]+\.\d+/', $dokumen))
                                                <span class="font-bold text-blue-700">
                                                    {{ $dokumen }}
                                                </span>
                                            @elseif (preg_match('/^\d+\.\d+/', $dokumen))
                                                <span class="pl-6 text-gray-800">
                                                    {{ $dokumen }}
                                                </span>
                                            @else
                                                <span class="text-gray-800">
                                                    {{ $dokumen }}
                                                </span>
                                            @endif
                                        </div>

                                    </div>

                                </td>

                                {{-- ADA --}}
                                <td class="px-4 py-3 border border-gray-300 text-center">

                                    <input type="radio"
                                        name="ada[{{ $index }}]"
                                        value="1"
                                        {{ !empty($item['ada']) ? 'checked' : '' }}
                                        class="w-5 h-5 text-green-600 focus:ring-green-500">

                                </td>

                                {{-- TIDAK ADA --}}
                                <td class="px-4 py-3 border border-gray-300 text-center">

                                    <input type="radio"
                                        name="ada[{{ $index }}]"
                                        value="0"
                                        {{ !empty($item['tidakada']) ? 'checked' : '' }}
                                        class="w-5 h-5 text-red-600 focus:ring-red-500">

                                </td>

                                {{-- TIDAK DIPERLUKAN --}}
                                <td class="px-4 py-3 border border-gray-300 text-center">

                                    <input type="radio"
                                        name="ada[{{ $index }}]"
                                        value="2"
                                        {{ !empty($item['tidakperlu']) ? 'checked' : '' }}
                                        class="w-5 h-5 text-yellow-600 focus:ring-yellow-500">

                                </td>

                                {{-- TTD LENGKAP --}}
                                <td class="px-4 py-3 border border-gray-300 text-center">

                                    <input type="radio"
                                        name="ttd[{{ $index }}]"
                                        value="1"
                                        {{ !empty($item['lengkap']) ? 'checked' : '' }}
                                        class="w-5 h-5 text-blue-600 focus:ring-blue-500">

                                </td>

                                {{-- TTD BELUM --}}
                                <td class="px-4 py-3 border border-gray-300 text-center">

                                    <input type="radio"
                                        name="ttd[{{ $index }}]"
                                        value="0"
                                        {{ !empty($item['belum']) ? 'checked' : '' }}
                                        class="w-5 h-5 text-gray-600 focus:ring-gray-500">

                                </td>

                                {{-- AKSI --}}
                                @if (Auth::check() && Auth::user()->role === 'Keuangan')

                                    <td class="px-4 py-3 border border-gray-300 text-center">

                                        <div class="flex items-center justify-center gap-2">

                                            {{-- EDIT --}}
                                            <button type="button"
                                                onclick="openEditDokumenModal(
                                                    {{ $excelRow }},
                                                    @js($dokumen)
                                                )"
                                                class="inline-flex items-center justify-center w-9 h-9 rounded-md bg-blue-100 text-blue-700 hover:bg-blue-200 transition"
                                                title="Edit Dokumen">

                                                <svg class="w-4 h-4"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5h2m-1-1v2m-7 8l-2 2v3h3l2-2m0 0l8-8a2.828 2.828 0 10-4-4l-8 8z" />
                                                </svg>

                                            </button>

                                            {{-- HAPUS --}}
                                            <button type="button"
                                                onclick="openHapusDokumenModal(
                                                    {{ $excelRow }},
                                                    @js($dokumen)
                                                )"
                                                class="inline-flex items-center justify-center w-9 h-9 rounded-md bg-red-100 text-red-700 hover:bg-red-200 transition"
                                                title="Hapus Dokumen">

                                                <svg class="w-4 h-4"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M6 7h12m-9 0V5a2 2 0 012-2h2a2 2 0 012 2v2m2 0v12a2 2 0 01-2 2H8a2 2 0 01-2-2V7m3 4v6m4-6v6" />
                                                </svg>

                                            </button>

                                        </div>

                                    </td>

                                @endif

                                {{-- KETERANGAN --}}
                                <td class="px-4 py-3 border border-gray-300">

                                    <input type="text"
                                        name="keterangan[{{ $index }}]"
                                        value="{{ $item['keterangan'] ?? '' }}"
                                        class="w-full border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-purple-500 focus:border-purple-500"
                                        placeholder="Catatan...">

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- ========================================================= --}}
    {{-- MODAL TAMBAH                                              --}}
    {{-- ========================================================= --}}
    <div id="modalTambahDokumen"
        class="hidden" style="position: fixed; inset: 0; z-index: 99999; overflow-y: auto;">

        {{-- Backdrop Gelap & Blur Solid (Anti Tembus) --}}
        <div class="fixed inset-0 transition-opacity" style="position: fixed; inset: 0; background-color: rgba(15, 23, 42, 0.72); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); z-index: 99998;"
            onclick="closeTambahDokumenModal()"></div>

        <div class="flex items-center justify-center min-h-screen p-4 text-center" style="position: relative; z-index: 100000; min-height: 100vh;">

            <div class="relative transform overflow-hidden rounded-3xl text-left shadow-2xl transition-all w-full max-w-md p-7 sm:p-8" style="background-color: #FFFFFF !important; position: relative; z-index: 100001; box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.45); border-radius: 24px; border: 1px solid #E2E8F0;">

                {{-- Close Button X --}}
                <button type="button"
                    onclick="closeTambahDokumenModal()"
                    style="position: absolute; top: 18px; right: 18px; width: 34px; height: 34px; border-radius: 50%; background-color: #F1F5F9; color: #64748B; border: none; display: flex; align-items: center; justify-content: center; cursor: pointer;"
                    class="hover:bg-slate-200 hover:text-slate-800 transition"
                    aria-label="Tutup">
                    <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <div class="mb-5 text-left">
                    <div style="width: 44px; height: 44px; border-radius: 12px; background: linear-gradient(135deg, #7C3AED 0%, #6D28D9 100%); display: flex; align-items: center; justify-content: center; margin-bottom: 12px; box-shadow: 0 4px 12px rgba(124, 58, 237, 0.3);">
                        <svg style="width: 22px; height: 22px; color: #FFFFFF;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-black text-gray-900">
                        Tambah Dokumen
                    </h3>
                    <p class="text-xs text-gray-500 mt-1">
                        Dokumen yang ditambahkan hanya berlaku untuk pengajuan ini.
                    </p>
                </div>

                <form action="{{ route('keuangan.checkandupate', $pengajuan->id) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <input type="hidden"
                        name="aksi"
                        value="tambah_dokumen">

                    <div class="mb-6 text-left">
                        <label class="block text-xs font-bold text-gray-700 mb-1.5">
                            Nama Dokumen & TTD <span class="text-red-500">*</span>
                        </label>

                        <input type="text"
                            name="nama_dokumen"
                            required
                            autocomplete="off"
                            style="width: 100%; font-size: 13px; color: #0F172A; background-color: #F8FAFC; border: 1.5px solid #CBD5E1; border-radius: 14px; padding: 12px 14px; outline: none; box-sizing: border-box;"
                            placeholder="Contoh: Routing Slip">

                    </div>

                    <div class="grid grid-cols-2 gap-4 w-full">

                        <button type="button"
                            onclick="closeTambahDokumenModal()"
                            style="background-color: #F8FAFC; color: #475569; border: 1.5px solid #CBD5E1; padding: 13px 20px; font-size: 13.5px; font-weight: 700; border-radius: 14px; min-height: 48px; box-shadow: 0 1px 2px rgba(0,0,0,0.05);"
                            class="w-full transition hover:bg-slate-100 cursor-pointer flex items-center justify-center text-center">
                            Batal
                        </button>

                        <button type="submit"
                            style="background: linear-gradient(135deg, #7C3AED 0%, #6D28D9 100%); color: #FFFFFF; padding: 13px 20px; font-size: 13.5px; font-weight: 800; border-radius: 14px; border: none; box-shadow: 0 4px 14px rgba(124, 58, 237, 0.35); min-height: 48px;"
                            class="w-full transition hover:brightness-110 cursor-pointer flex items-center justify-center text-center">
                            Simpan
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- MODAL EDIT                                                --}}
    {{-- ========================================================= --}}
    <div id="modalEditDokumen"
        class="hidden" style="position: fixed; inset: 0; z-index: 99999; overflow-y: auto;">

        {{-- Backdrop Gelap & Blur Solid (Anti Tembus) --}}
        <div class="fixed inset-0 transition-opacity" style="position: fixed; inset: 0; background-color: rgba(15, 23, 42, 0.72); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); z-index: 99998;"
            onclick="closeEditDokumenModal()"></div>

        <div class="flex items-center justify-center min-h-screen p-4 text-center" style="position: relative; z-index: 100000; min-height: 100vh;">

            <div class="relative transform overflow-hidden rounded-3xl text-left shadow-2xl transition-all w-full max-w-md p-7 sm:p-8" style="background-color: #FFFFFF !important; position: relative; z-index: 100001; box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.45); border-radius: 24px; border: 1px solid #E2E8F0;">

                {{-- Close Button X --}}
                <button type="button"
                    onclick="closeEditDokumenModal()"
                    style="position: absolute; top: 18px; right: 18px; width: 34px; height: 34px; border-radius: 50%; background-color: #F1F5F9; color: #64748B; border: none; display: flex; align-items: center; justify-content: center; cursor: pointer;"
                    class="hover:bg-slate-200 hover:text-slate-800 transition"
                    aria-label="Tutup">
                    <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <div class="mb-5 text-left">
                    <div style="width: 44px; height: 44px; border-radius: 12px; background: linear-gradient(135deg, #2563EB 0%, #1D4ED8 100%); display: flex; align-items: center; justify-content: center; margin-bottom: 12px; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);">
                        <svg style="width: 22px; height: 22px; color: #FFFFFF;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-black text-gray-900">
                        Edit Dokumen
                    </h3>
                    <p class="text-xs text-gray-500 mt-1">
                        Perubahan hanya berlaku untuk pengajuan ini.
                    </p>
                </div>

                <form action="{{ route('keuangan.checkandupate', $pengajuan->id) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <input type="hidden"
                        name="aksi"
                        value="edit_dokumen">

                    <input type="hidden"
                        name="row"
                        id="editRowDokumen">

                    <div class="mb-6 text-left">

                        <label class="block text-xs font-bold text-gray-700 mb-1.5">
                            Nama Dokumen & TTD <span class="text-red-500">*</span>
                        </label>

                        <input type="text"
                            name="nama_dokumen"
                            id="editNamaDokumen"
                            required
                            autocomplete="off"
                            style="width: 100%; font-size: 13px; color: #0F172A; background-color: #F8FAFC; border: 1.5px solid #CBD5E1; border-radius: 14px; padding: 12px 14px; outline: none; box-sizing: border-box;">

                    </div>

                    <div class="grid grid-cols-2 gap-4 w-full">

                        <button type="button"
                            onclick="closeEditDokumenModal()"
                            style="background-color: #F8FAFC; color: #475569; border: 1.5px solid #CBD5E1; padding: 13px 20px; font-size: 13.5px; font-weight: 700; border-radius: 14px; min-height: 48px; box-shadow: 0 1px 2px rgba(0,0,0,0.05);"
                            class="w-full transition hover:bg-slate-100 cursor-pointer flex items-center justify-center text-center">
                            Batal
                        </button>

                        <button type="submit"
                            style="background: linear-gradient(135deg, #2563EB 0%, #1D4ED8 100%); color: #FFFFFF; padding: 13px 20px; font-size: 13.5px; font-weight: 800; border-radius: 14px; border: none; box-shadow: 0 4px 14px rgba(37, 99, 235, 0.35); min-height: 48px;"
                            class="w-full transition hover:brightness-110 cursor-pointer flex items-center justify-center text-center">
                            Simpan
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- MODAL HAPUS                                               --}}
    {{-- ========================================================= --}}
    <div id="modalHapusDokumen"
        class="hidden" style="position: fixed; inset: 0; z-index: 99999; overflow-y: auto;">

        {{-- Backdrop Gelap & Blur Solid (Anti Tembus) --}}
        <div class="fixed inset-0 transition-opacity" style="position: fixed; inset: 0; background-color: rgba(15, 23, 42, 0.72); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); z-index: 99998;"
            onclick="closeHapusDokumenModal()"></div>

        <div class="flex items-center justify-center min-h-screen p-4 text-center" style="position: relative; z-index: 100000; min-height: 100vh;">

            <div class="relative transform overflow-hidden rounded-3xl text-left shadow-2xl transition-all w-full max-w-md p-7 sm:p-8" style="background-color: #FFFFFF !important; position: relative; z-index: 100001; box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.45); border-radius: 24px; border: 1px solid #E2E8F0;">

                {{-- Close Button X --}}
                <button type="button"
                    onclick="closeHapusDokumenModal()"
                    style="position: absolute; top: 18px; right: 18px; width: 34px; height: 34px; border-radius: 50%; background-color: #F1F5F9; color: #64748B; border: none; display: flex; align-items: center; justify-content: center; cursor: pointer;"
                    class="hover:bg-slate-200 hover:text-slate-800 transition"
                    aria-label="Tutup">
                    <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <div class="mb-5 text-left">
                    <div style="width: 44px; height: 44px; border-radius: 12px; background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%); display: flex; align-items: center; justify-content: center; margin-bottom: 12px; box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);">
                        <svg style="width: 22px; height: 22px; color: #FFFFFF;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-black text-gray-900">
                        Hapus Dokumen
                    </h3>
                    <p class="text-xs text-gray-500 mt-1">
                        Apakah Anda yakin ingin menghapus dokumen berikut?
                    </p>
                </div>

                {{-- Preview Dokumen yang dihapus --}}
                <div style="background-color: #FEF2F2; border: 1.5px solid #FEE2E2; border-radius: 14px; padding: 12px 16px; margin-bottom: 16px;">
                    <p id="hapusNamaDokumen" style="color: #991B1B; font-weight: 800; font-size: 13.5px; margin: 0; word-break: break-word;">
                        -
                    </p>
                </div>

                <p class="text-xs text-gray-400 mb-6">
                    Dokumen hanya akan dihapus dari checklist pengajuan ini. Pengajuan lainnya tidak akan terpengaruh.
                </p>

                <form action="{{ route('keuangan.checkandupate', $pengajuan->id) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <input type="hidden"
                        name="aksi"
                        value="hapus_dokumen">

                    <input type="hidden"
                        name="row"
                        id="hapusRowDokumen">

                    <div class="grid grid-cols-2 gap-4 w-full">

                        <button type="button"
                            onclick="closeHapusDokumenModal()"
                            style="background-color: #F8FAFC; color: #475569; border: 1.5px solid #CBD5E1; padding: 13px 20px; font-size: 13.5px; font-weight: 700; border-radius: 14px; min-height: 48px; box-shadow: 0 1px 2px rgba(0,0,0,0.05);"
                            class="w-full transition hover:bg-slate-100 cursor-pointer flex items-center justify-center text-center">
                            Batal
                        </button>

                        <button type="submit"
                            style="background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%); color: #FFFFFF; padding: 13px 20px; font-size: 13.5px; font-weight: 800; border-radius: 14px; border: none; box-shadow: 0 4px 14px rgba(239, 68, 68, 0.35); min-height: 48px;"
                            class="w-full transition hover:brightness-110 cursor-pointer flex items-center justify-center text-center">
                            Ya, Hapus
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- FILE KELENGKAPAN (METADATA) --}}
    {{-- ========================================================= --}}
    <div class="bg-blue-50 border border-blue-200 rounded-md p-5 my-4">

        <div class="flex items-start gap-3">

            <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

            </svg>

            <div class="flex-1">

                <p class="text-sm font-semibold text-blue-900 mb-1">
                    Informasi Tambahan
                </p>

                <p class="text-xs text-blue-700 mb-3">
                    File metadata excel kelengkapan pengajuan (opsional)
                </p>

                <a href="{{ route('download.metadata', $pengajuan->id) }}"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md shadow-sm transition-all duration-200 font-medium text-sm">

                    <svg class="w-4 h-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />

                    </svg>

                    Download File Metadata

                </a>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- CATATAN PENGEMBALIAN --}}
    {{-- ========================================================= --}}
    <div class="bg-yellow-50 border-l-4 border-yellow-400 rounded-md p-5 mb-4">

        <div class="flex items-start gap-3 mb-3">

            <div class="text-2xl">
                📝
            </div>

            <div class="flex-1">

                <h3 class="text-base font-semibold text-yellow-900 mb-1">
                    Catatan Jika Belum Lengkap
                </h3>

                <p class="text-xs text-yellow-700">
                    Tuliskan alasan pengembalian jika dokumen belum lengkap
                    atau saran perbaikan
                </p>

            </div>

        </div>

        <textarea name="catatan"
            rows="4"
            class="w-full p-3 border border-yellow-200 rounded-md bg-white shadow-sm focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 text-sm"
            placeholder="Contoh: Dokumen tanda tangan kepala divisi belum lengkap...">{{ $pengajuan->message }}</textarea>

    </div>


    {{-- ========================================================= --}}
    {{-- TOMBOL SUBMIT --}}
    {{-- ========================================================= --}}
    @if ($pengajuan->is_archive == 1)

        <div class="flex justify-end">

            <div class="inline-flex items-center gap-2 px-8 py-3 border border-gray-300 bg-gray-100 text-gray-500 font-semibold rounded-md shadow-sm text-base cursor-not-allowed">

                <svg class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 13l4 4L19 7" />

                </svg>

                File Sudah Diarsipkan

            </div>

        </div>

    @else

        <div class="flex justify-end">

            <button type="submit"
                name="aksi"
                value="lengkap"
                class="inline-flex items-center gap-2 px-8 py-3 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold rounded-md shadow-sm transition-all duration-200 text-base">

                <svg class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M5 13l4 4L19 7" />

                </svg>

                Selesaikan Pemeriksaan

            </button>

        </div>

    @endif

</form>


{{-- ========================================================= --}}
{{-- JAVASCRIPT MODAL --}}
{{-- ========================================================= --}}
<script>
    function openTambahDokumenModal() {
        document
            .getElementById('modalTambahDokumen')
            .classList
            .remove('hidden');
    }

    function closeTambahDokumenModal() {
        document
            .getElementById('modalTambahDokumen')
            .classList
            .add('hidden');
    }


    function openEditDokumenModal(row, nama) {

        document
            .getElementById('editRowDokumen')
            .value = row;

        document
            .getElementById('editNamaDokumen')
            .value = nama;

        document
            .getElementById('modalEditDokumen')
            .classList
            .remove('hidden');
    }

    function closeEditDokumenModal() {
        document
            .getElementById('modalEditDokumen')
            .classList
            .add('hidden');
    }


    function openHapusDokumenModal(row, nama) {

        document
            .getElementById('hapusRowDokumen')
            .value = row;

        document
            .getElementById('hapusNamaDokumen')
            .textContent = nama;

        document
            .getElementById('modalHapusDokumen')
            .classList
            .remove('hidden');
    }

    function closeHapusDokumenModal() {
        document
            .getElementById('modalHapusDokumen')
            .classList
            .add('hidden');
    }

    

    // Tutup modal dengan tombol ESC
    document.addEventListener('keydown', function(event) {

        if (event.key === 'Escape') {

            closeTambahDokumenModal();
            closeEditDokumenModal();
            closeHapusDokumenModal();

        }

    });
</script>