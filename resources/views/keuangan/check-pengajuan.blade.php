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
    {{-- MODAL TAMBAH --}}
    {{-- ========================================================= --}}
    <div id="modalTambahDokumen"
        class="hidden fixed inset-0 z-50 overflow-y-auto">

        <div class="flex items-center justify-center min-h-screen px-4">

            <div class="fixed inset-0 bg-black/50"
                onclick="closeTambahDokumenModal()"></div>

            <div class="relative bg-white rounded-lg shadow-xl w-full max-w-md p-6">

                <div class="flex items-center justify-between mb-5">

                    <h3 class="text-lg font-semibold text-gray-900">
                        Tambah Dokumen
                    </h3>

                    <button type="button"
                        onclick="closeTambahDokumenModal()"
                        class="text-gray-400 hover:text-gray-600">

                        ✕

                    </button>

                </div>

                <p class="text-sm text-gray-500 mb-4">
                    Dokumen yang ditambahkan hanya berlaku untuk pengajuan ini.
                </p>

                <form action="{{ route('keuangan.checkandupate', $pengajuan->id) }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <input type="hidden"
                        name="aksi"
                        value="tambah_dokumen">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Dokumen
                        </label>

                        <input type="text"
                            name="nama_dokumen"
                            required
                            class="w-full rounded-md border-gray-300 focus:ring-purple-500 focus:border-purple-500"
                            placeholder="Contoh: Routing Slip">

                    </div>

                    <div class="flex justify-end gap-2 mt-6">

                        <button type="button"
                            onclick="closeTambahDokumenModal()"
                            class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200">
                            Batal
                        </button>

                        <button type="submit"
                            class="px-4 py-2 bg-purple-600 text-white rounded-md hover:bg-purple-700">
                            Simpan
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- MODAL EDIT --}}
    {{-- ========================================================= --}}
    <div id="modalEditDokumen"
        class="hidden fixed inset-0 z-50 overflow-y-auto">

        <div class="flex items-center justify-center min-h-screen px-4">

            <div class="fixed inset-0 bg-black/50"
                onclick="closeEditDokumenModal()"></div>

            <div class="relative bg-white rounded-lg shadow-xl w-full max-w-md p-6">

                <div class="flex items-center justify-between mb-5">

                    <h3 class="text-lg font-semibold text-gray-900">
                        Edit Dokumen
                    </h3>

                    <button type="button"
                        onclick="closeEditDokumenModal()"
                        class="text-gray-400 hover:text-gray-600">
                        ✕
                    </button>

                </div>

                <p class="text-sm text-gray-500 mb-4">
                    Perubahan hanya berlaku untuk pengajuan ini.
                </p>

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

                    <div>

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Nama Dokumen
                        </label>

                        <input type="text"
                            name="nama_dokumen"
                            id="editNamaDokumen"
                            required
                            class="w-full rounded-md border-gray-300 focus:ring-blue-500 focus:border-blue-500">

                    </div>

                    <div class="flex justify-end gap-2 mt-6">

                        <button type="button"
                            onclick="closeEditDokumenModal()"
                            class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200">
                            Batal
                        </button>

                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            Simpan Perubahan
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- MODAL HAPUS --}}
    {{-- ========================================================= --}}
    <div id="modalHapusDokumen"
        class="hidden fixed inset-0 z-50 overflow-y-auto">

        <div class="flex items-center justify-center min-h-screen px-4">

            <div class="fixed inset-0 bg-black/50"
                onclick="closeHapusDokumenModal()"></div>

            <div class="relative bg-white rounded-lg shadow-xl w-full max-w-md p-6">

                <div class="flex items-center gap-3 mb-4">

                    <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center">

                        <svg class="w-5 h-5 text-red-600"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 9v4m0 4h.01M10.29 3.86l-7.82 13.5A2 2 0 004.2 20h15.6a2 2 0 001.73-2.64l-7.82-13.5a2 2 0 00-3.46 0z" />
                        </svg>

                    </div>

                    <h3 class="text-lg font-semibold text-gray-900">
                        Hapus Dokumen
                    </h3>

                </div>

                <p class="text-sm text-gray-600">
                    Apakah yakin ingin menghapus dokumen:
                </p>

                <p id="hapusNamaDokumen"
                    class="font-semibold text-red-600 mt-2 break-words">
                </p>

                <p class="text-xs text-gray-500 mt-3">
                    Dokumen hanya akan dihapus dari checklist pengajuan ini.
                    Pengajuan lainnya tidak akan terpengaruh.
                </p>

                <form action="{{ route('keuangan.checkandupate', $pengajuan->id) }}"
                    method="POST"
                    class="mt-6">

                    @csrf
                    @method('PUT')

                    <input type="hidden"
                        name="aksi"
                        value="hapus_dokumen">

                    <input type="hidden"
                        name="row"
                        id="hapusRowDokumen">

                    <div class="flex justify-end gap-2">

                        <button type="button"
                            onclick="closeHapusDokumenModal()"
                            class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200">
                            Batal
                        </button>

                        <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
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