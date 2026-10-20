<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Detail Arsip') }}
        </h2>
    </x-slot>

    {{-- TOMBOL KEMBALI --}} 
    <div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
            <a href="{{ route('folder.show', $archives->folder_id) }}"
                class="inline-flex items-center gap-2 bg-gray-100 text-gray-700 px-3 py-2 rounded-full border border-gray-200
                    shadow-sm transition-all duration-200 ease-in-out hover:bg-gray-200 hover:shadow-md active:bg-gray-300 active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span class="hidden sm:inline text-sm font-medium">Kembali</span>
            </a>             
        </div>
    </div>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-md p-8 border border-gray-200 space-y-6">

                {{-- Header --}}
                <div class="pb-4 border-b border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800">Informasi Detail Arsip</h3>
                    <p class="text-sm text-gray-600 mt-1">Detail lengkap file arsip yang tersimpan pada sistem.</p>
                </div>

                {{-- Grid 2 Kolom untuk Info --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Nama File --}}
                    <div class="md:col-span-2">
                        <p class="text-sm font-medium text-gray-500 mb-2">Nama Arsip</p>
                        <p class="text-lg font-semibold text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->file_name ?? '-' }}
                        </p>
                    </div>

                    {{-- Kode Klasifikasi --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">Kode Klasifikasi</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->kode_klasifikasi ?? '-' }}
                        </p>
                    </div>

                    {{-- Indeks 1 --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">Indeks 1</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->indeks1 ?? '-' }}
                        </p>
                    </div>

                    {{-- Indeks 2 --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">Indeks 2</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->indeks2 ?? '-' }}
                        </p>
                    </div>

                    {{-- No Item --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">No Item</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->no_item ?? '-' }}
                        </p>
                    </div>

                    {{-- Uraian --}}
                    <div class="md:col-span-2">
                        <p class="text-sm font-medium text-gray-500 mb-2">Uraian</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200 min-h-[80px]">
                            {{ $archives->uraian ?? '-' }}
                        </p>
                    </div>

                    {{-- No SPBy --}}
                    <div class="md:col-span-2">
                        <p class="text-sm font-medium text-gray-500 mb-2">No SPBy</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->no_spby ?? '-' }}
                        </p>
                    </div>

                    {{-- No SPM --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">No SPM</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->no_spm ?? '-' }}
                        </p>
                    </div>

                    {{-- Jenis SPM --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">Jenis SPM</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->jenis_spm ?? '-' }}
                        </p>
                    </div>

                    {{-- NO SP2D --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">No SP2D</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->no_sp2d ?? '-' }}
                        </p>
                    </div>

                    {{-- Nilai SP2D --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">Nilai SP2D</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->nilai_sp2d ?? '-' }}
                        </p>
                    </div>

                    {{-- Jenis SP2D --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">Jenis SP2D</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->jenis_sp2d ?? '-' }}
                        </p>
                    </div>

                    {{-- Tanggal SP2D --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">Tanggal SP2D</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->tgl_sp2d ? \Carbon\Carbon::parse($archives->tgl_sp2d)->format('d F Y') : '-' }}
                        </p>
                    </div>

                    {{-- Tanggal Selesai SP2D --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">Tanggal Selesai SP2D</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->tgl_selesai_sp2d ? \Carbon\Carbon::parse($archives->tgl_selesai_sp2d)->format('d F Y') : '-' }}
                        </p>
                    </div>

                    {{-- Tanggal Invoice --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">Tanggal Invoice</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->tgl_invoice ?? '-' }}
                        </p>
                    </div>

                    {{-- Tanggal Terima --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">Tanggal Terima</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->tgl_terima ? \Carbon\Carbon::parse($archives->tgl_terima)->format('d F Y') : '-' }}
                        </p>
                    </div>       
                    
                    {{-- No Invoice --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">No Invoice</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->no_invoice ?? '-' }}
                        </p>
                    </div>

                    {{-- Tingkat Pertimbangan --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">Tingkat Pertimbangan</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->tingkat_pertimbangan ?? '-' }}
                        </p>
                    </div>

                    {{-- Jumlah Halaman --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">Jumlah Halaman</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->jumlah_halaman ? $archives->jumlah_halaman . ' lembar' : '-' }}
                        </p>
                    </div>

                    {{-- Retensi Arsip Aktif --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">Retensi Arsip Aktif</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->retensi_arsip_aktif ? $archives->retensi_arsip_aktif . ' tahun' : '-' }}
                        </p>
                    </div>

                    {{-- Retensi Arsip Inaktif --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">Retensi Arsip Inaktif</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->retensi_arsip_inaktif ? $archives->retensi_arsip_inaktif . ' tahun' : '-' }}
                        </p>
                    </div>

                    {{-- Nasib Akhir Arsip --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">Nasib Akhir Arsip</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->nasib_akhir_arsip ?? '-' }}
                        </p>
                    </div>

                    {{-- Klasifikasi Keamanan --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">Klasifikasi Keamanan</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->klasifikasi_keamanan ?? '-' }}
                        </p>
                    </div>

                    {{-- Status --}}
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-2">Status</p>
                        <p class="text-gray-800 px-4 py-2.5 bg-gray-50 rounded-md border border-gray-200">
                            {{ $archives->status ?? '-' }}
                        </p>
                    </div>

                </div>
{{-- SECTION FILE LAMPIRAN (PDF & EXCEL) --}}
<div class="pt-6 border-t border-gray-200">
    <p class="text-sm font-medium text-gray-700 mb-4">File Lampiran Arsip</p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        {{-- FILE PDF --}}
        <div class="border border-gray-200 rounded-xl p-5 bg-gray-50">
            <div class="flex items-center gap-4">
                <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-red-100 flex items-center justify-center">
                    <svg class="w-7 h-7 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 18H6a2 2 0 01-2-2V6a2 2 0 012-2h8l4 4v8a2 2 0 01-2 2h-1M14 4v4h4M8 13h2a1.5 1.5 0 010 3H8v-3zm0 0v-2h2a1.5 1.5 0 010 3H8m6-1h2m-2 0v3m0-3v-3h2"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-gray-800">Dokumen PDF Arsip</p>
                    @if ($archives->file_path)
                        <p class="text-xs text-gray-600 truncate mt-1">📄 {{ basename($archives->file_path) }}</p>
                        <div class="flex gap-2 mt-3">
                            <a href="{{ route('archive.stream', $archives->id) }}" target="_blank"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium rounded-lg shadow transition">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5 c4.478 0 8.268 2.943 9.542 7 -1.274 4.057-5.064 7-9.542 7 -4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Lihat
                            </a>
                            <a href="{{ route('archive.download', $archives->id) }}"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-medium rounded-lg shadow transition">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                                Download
                            </a>
                        </div>
                    @else
                        <p class="text-xs text-red-500 mt-1">File PDF belum diunggah</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- FILE EXCEL --}}
        <div class="border border-gray-200 rounded-xl p-5 bg-gray-50">
            <div class="flex items-center gap-4">
                <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-green-100 flex items-center justify-center">
                    <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 17l3-3 3 3m-3-3V8m0 0l-3 3m3-3l3 3M5 4h14a1 1 0 011 1v14a1 1 0 01-1 1H5a1 1 0 01-1-1V5a1 1 0 011-1z"/>
                    </svg>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-gray-800">File Excel Arsip Fisik</p>
                    @if ($archives->excel_path)
                        <p class="text-xs text-gray-600 truncate mt-1">📊 {{ basename($archives->excel_path) }}</p>
                        <div class="flex gap-2 mt-3">
                            {{-- LIHAT EXCEL --}}
                            <a href="{{ route('archive.excel.view', $archives->id) }}" target="_blank"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium rounded-lg shadow transition">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5 c4.478 0 8.268 2.943 9.542 7 -1.274 4.057-5.064 7-9.542 7 -4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                Lihat
                            </a>

                            {{-- DOWNLOAD EXCEL --}}
                            <a href="{{ route('archive.excel.download', $archives->id) }}"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-medium rounded-lg shadow transition">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                                Download
                            </a>
                        </div>
                    @else
                        <p class="text-xs text-amber-600 mt-1">File Excel belum diunggah</p>
                    @endif
                </div>
            </div>
        </div>
    {{-- TAMBAHKAN KARTU GOOGLE DRIVE JIKA LINK_ARSIP TERSEDIA --}}
    @if ($archives->link_arsip)
        <div class="border border-blue-200 rounded-xl p-5 bg-blue-50/60 md:col-span-2">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="flex-shrink-0 w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center text-blue-600 font-bold">
                        <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM19 18H6c-2.21 0-4-1.79-4-4 0-2.05 1.53-3.76 3.56-3.97l1.07-.11.5-.95C8.08 7.14 9.94 6 12 6c2.62 0 4.88 1.86 5.39 4.43l.3 1.5 1.53.11c1.56.1 2.78 1.41 2.78 2.96 0 1.65-1.35 3-3 3z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-800">Berkas Asli Digital (Google Drive)</p>
                        <p class="text-xs text-gray-500 mt-0.5 truncate max-w-lg">{{ $archives->link_arsip }}</p>
                    </div>
                </div>
                <a href="{{ $archives->link_arsip }}" target="_blank"
                    class="inline-flex items-center gap-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold rounded-xl shadow transition">
                    <span>Buka Google Drive</span>
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            </div>
        </div>
    @endif
    </div>
</div>
            

                {{-- Keterangan --}}
                <div class="pt-6 border-t border-gray-200">
                    <p class="text-sm font-medium text-gray-500 mb-2">Keterangan</p>
                    <div class="px-4 py-3 bg-gray-50 rounded-md border border-gray-200 text-gray-800 min-h-[80px]">
                        {{ $archives->keterangan ?? '-' }}
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                    <div class="flex items-center gap-3">
                        {{-- Edit --}}
                        <a href="{{ route('archive.edit', $archives->id) }}"
                            class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Edit
                        </a>

                        {{-- Hapus --}}
                        <form action="{{ route('archive.destroy', $archives->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus arsip ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="inline-flex items-center gap-2 px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white font-medium rounded-md transition">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>