<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center shadow-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-xl text-gray-800 leading-tight">Kelola Arsip Fisik</h2>
                <p class="text-xs text-gray-500 mt-0.5">Kategori: {{ $category->category_name }}</p>
            </div>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/40 to-indigo-50/50 py-8" x-data="{ showCreateModal: false }">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- TOMBOL KEMBALI --}}
            <div class="mb-6">
                <a href="{{ route('category.show', $category->id) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white text-gray-700 text-xs font-semibold rounded-xl border border-gray-200 shadow-sm hover:bg-gray-50 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Sub Kategori
                </a>
            </div>

{{-- NOTIFIKASI OTOMATIS HILANG DALAM 3 DETIK --}}
            @if(session('success') || session('error'))
                <div x-data="{ show: true }" 
                     x-init="setTimeout(() => show = false, 3000)" 
                     x-show="show" 
                     x-transition.duration.500ms 
                     class="mb-6">
                    
                    @if(session('success'))
                        <div class="p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm rounded-2xl flex items-center justify-between shadow-sm">
                            <span>{{ session('success') }}</span>
                            <button @click="show = false" class="text-emerald-500 hover:text-emerald-700 font-bold">&times;</button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="p-4 bg-red-50 border border-red-200 text-red-700 text-sm rounded-2xl flex items-center justify-between shadow-sm">
                            <span>{{ session('error') }}</span>
                            <button @click="show = false" class="text-red-500 hover:text-red-700 font-bold">&times;</button>
                        </div>
                    @endif
                </div>
            @endif

            {{-- PANEL CRUD ARSIP FISIK --}}
            <div class="bg-white/90 backdrop-blur-xl border border-white/80 rounded-3xl shadow-xl p-6 sm:p-8">
                
                {{-- HEADER CARD: JUDUL DAN TOMBOL CREATE DI SEBELAH KANANNYA --}}
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between border-b border-gray-100 pb-4 mb-6 gap-4">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">Manajemen Berkas Excel Arsip Fisik</h3>
                        <p class="text-xs text-gray-500 mt-1">Lakukan operasi Tambah, Lihat, Unduh, Edit (Replace), dan Hapus berkas rekapitulasi.</p>
                    </div>
                    <div>
                        <button type="button" @click="showCreateModal = true" class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-600 text-white text-xs font-semibold rounded-xl shadow-md hover:bg-blue-700 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Create Arsip
                        </button>
                    </div>
                </div>

                {{-- GRID DAFTAR TAHUN SECARA DINAMIS --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    @foreach($arsipList as $tahun => $fileName)
                        <div class="p-5 border border-gray-200 rounded-2xl bg-gray-50/50" x-data="{ showEdit: false, showEditTahun: false }">
                            
                            {{-- HEADER TAHUN & TOMBOL EDIT TAHUN --}}
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center gap-2">
                                    <span class="px-3 py-1 bg-blue-100 text-blue-700 font-bold text-xs rounded-lg">Tahun {{ $tahun }}</span>
                                    <button type="button" @click="showEditTahun = !showEditTahun" class="text-amber-600 hover:text-amber-800 text-[11px] font-semibold underline">Edit Tahun</button>
                                </div>

                                <div>
                                    @if($fileName)
                                        <span class="px-2.5 py-0.5 bg-emerald-100 text-emerald-700 text-[11px] font-semibold rounded-full">Tersedia</span>
                                    @else
                                        <span class="px-2.5 py-0.5 bg-amber-100 text-amber-700 text-[11px] font-semibold rounded-full">Belum Ada File</span>
                                    @endif
                                </div>
                            </div>

                            {{-- FORM EDIT / GANTI NAMA TAHUN --}}
                            <div x-show="showEditTahun" x-transition class="mb-4 p-3 bg-blue-50 rounded-xl border border-blue-200">
                                <form action="{{ route('category.updateTahunArsip', [$category->id, $tahun]) }}" method="POST" class="flex gap-2">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="tahun_baru" value="{{ $tahun }}" required class="block w-full text-xs text-gray-700 border border-gray-300 rounded-lg p-1.5 bg-white">
                                    <button type="submit" class="px-3 py-1.5 bg-blue-600 text-white text-xs font-semibold rounded-lg hover:bg-blue-700 whitespace-nowrap">Simpan</button>
                                </form>
                            </div>

                            @if($fileName)
                                <div class="bg-white p-3 border border-gray-200 rounded-xl mb-4">
                                    <p class="text-xs font-semibold text-gray-700 truncate" title="{{ $fileName }}">{{ $fileName }}</p>
                                </div>

                                {{-- AKSI READ, DOWNLOAD, EDIT FILE, DELETE (HAPUS KARTU/FOLDER) --}}
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                                    <a href="{{ route('category.previewArsipFisik', [$category->id, $tahun]) }}" target="_blank" class="px-2 py-2 bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white rounded-xl text-center text-xs font-semibold transition">Lihat</a>
                                    <a href="{{ route('category.downloadArsipFisik', [$category->id, $tahun]) }}" class="px-2 py-2 bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white rounded-xl text-center text-xs font-semibold transition">Unduh</a>
                                    <button type="button" @click="showEdit = !showEdit" class="px-2 py-2 bg-amber-50 text-amber-600 hover:bg-amber-600 hover:text-white rounded-xl text-center text-xs font-semibold transition">Edit File</button>
                                    <form action="{{ route('category.deleteArsipFisik', [$category->id, $tahun]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus seluruh kartu dan berkas Arsip Fisik Tahun {{ $tahun }} ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="w-full px-2 py-2 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded-xl text-center text-xs font-semibold transition">Hapus</button>
                                    </form>
                                </div>

                                {{-- FORM EDIT / REPLACE FILE --}}
                                <div x-show="showEdit" x-transition class="mt-4 p-3 bg-amber-50 rounded-xl border border-amber-200">
                                    <p class="text-xs font-semibold text-amber-800 mb-2">Ganti File Excel Tahun {{ $tahun }}:</p>
                                    <form action="{{ route('category.uploadArsipFisik', $category->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="tahun" value="{{ $tahun }}">
                                        <input type="file" name="file_excel" accept=".xlsx, .xls" required class="block w-full text-xs text-gray-500 mb-2 border rounded-lg p-1 bg-white">
                                        <button type="submit" class="w-full py-1.5 bg-amber-600 text-white text-xs font-semibold rounded-lg hover:bg-amber-700">Simpan Perubahan</button>
                                    </form>
                                </div>
                            @else
                                {{-- FORM UPLOAD JIKA KOSONG & TOMBOL HAPUS KARTU KOSONG --}}
                                <form action="{{ route('category.uploadArsipFisik', $category->id) }}" method="POST" enctype="multipart/form-data" class="mb-3">
                                    @csrf
                                    <input type="hidden" name="tahun" value="{{ $tahun }}">
                                    <input type="file" name="file_excel" accept=".xlsx, .xls" required class="block w-full text-xs text-gray-500 mb-2 border rounded-xl p-1.5 bg-white">
                                    <button type="submit" class="w-full py-2 bg-blue-600 text-white text-xs font-semibold rounded-xl hover:bg-blue-700 transition">Upload Excel {{ $tahun }}</button>
                                </form>
                                
                                <form action="{{ route('category.deleteArsipFisik', [$category->id, $tahun]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kartu Tahun {{ $tahun }} ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="w-full py-1.5 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded-xl text-center text-xs font-semibold transition">Hapus Kartu</button>
                                </form>
                            @endif
                        </div>
                    @endforeach

                </div>
            </div>

        </div>

        {{-- MODAL POP-UP CREATE ARSIP FISIK --}}
        <div x-show="showCreateModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm p-4" x-transition>
            <div @click.away="showCreateModal = false" class="bg-white rounded-3xl shadow-2xl max-w-md w-full p-6 sm:p-8 transform transition-all">
                <div class="flex items-center justify-between border-b border-gray-100 pb-4 mb-4">
                    <h3 class="text-base font-bold text-gray-800">Tambah Arsip Fisik Baru</h3>
                    <button type="button" @click="showCreateModal = false" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form action="{{ route('category.uploadArsipFisik', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-xs font-semibold text-gray-700 mb-2">Tahun Arsip</label>
                        <input type="text" name="tahun" placeholder="Masukkan tahun (Contoh: 2026)" required class="block w-full text-xs text-gray-700 border border-gray-200 rounded-xl p-2.5 bg-gray-50 focus:bg-white focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <div class="mb-6">
                        <label class="block text-xs font-semibold text-gray-700 mb-2">File Excel Rekapitulasi (.xlsx / .xls)</label>
                        <input type="file" name="file_excel" accept=".xlsx, .xls" required class="block w-full text-xs text-gray-500 border border-gray-200 rounded-xl p-2 bg-gray-50">
                    </div>

                    <div class="flex items-center justify-end gap-3">
                        <button type="button" @click="showCreateModal = false" class="px-4 py-2 bg-gray-100 text-gray-700 text-xs font-semibold rounded-xl hover:bg-gray-200 transition">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white text-xs font-semibold rounded-xl shadow-md hover:bg-blue-700 transition">Simpan Arsip</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>