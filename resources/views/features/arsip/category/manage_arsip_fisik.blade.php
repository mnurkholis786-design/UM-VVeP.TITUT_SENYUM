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

    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/40 to-indigo-50/50 py-8" x-data="{ showCreateModal: false, showDeleteModal: false, deleteActionUrl: '', deleteTitle: '', deleteMessage: '' }">
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
                    @if(Auth::user()->role !== 'Kepala Kantor TVRI')
                    <button type="button" @click="showCreateModal = true" 
                            class="px-4 py-2.5 bg-gradient-to-r from-[#003A8F] to-[#0066CC] hover:from-[#002b6b] hover:to-[#0052a3] text-white rounded-xl shadow-md text-xs font-semibold flex items-center gap-2 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                        Tambah Arsip Fisik
                    </button>
                    @endif
                    </div>
                </div>

                {{-- GRID DAFTAR TAHUN SECARA DINAMIS --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    @forelse($arsipList as $tahun => $fileName)
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
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 mb-3">
                                    <a href="{{ route('category.previewArsipFisik', [$category->id, $tahun]) }}" target="_blank" class="px-2 py-2 bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white rounded-xl text-center text-xs font-semibold transition">Lihat Excel</a>
                                    <a href="{{ route('category.downloadArsipFisik', [$category->id, $tahun]) }}" class="px-2 py-2 bg-emerald-50 text-emerald-600 hover:bg-emerald-600 hover:text-white rounded-xl text-center text-xs font-semibold transition">Unduh</a>
                                    @if(Auth::user()->role !== 'Kepala Kantor TVRI')
                                    <button type="button" @click="showEdit = !showEdit" class="px-2 py-2 bg-amber-50 text-amber-600 hover:bg-amber-600 hover:text-white rounded-xl text-center text-xs font-semibold transition">Edit File</button>
                                    <button type="button" 
                                        @click="deleteActionUrl = '{{ route('category.deleteArsipFisik', [$category->id, $tahun]) }}'; deleteTitle = 'Hapus Berkas Tahun {{ $tahun }}'; deleteMessage = 'Yakin ingin menghapus berkas Tahun {{ $tahun }} ini?'; showDeleteModal = true" 
                                        class="w-full px-2 py-2 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded-xl text-center text-xs font-semibold transition">
                                        Hapus
                                    </button>
                                    @endif
                                </div>

                                {{-- TOMBOL LIHAT DAFTAR BERKAS TERINPUT --}}
                                <a href="{{ route('category.arsipFisikFiles', [$category->id, $tahun]) }}" class="w-full inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold text-xs rounded-xl shadow transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                    </svg>
                                    <span>Buka Berkas Arsip Terinput</span>
                                </a>


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
                                
                                <button type="button" 
                                    @click="deleteActionUrl = '{{ route('category.deleteArsipFisik', [$category->id, $tahun]) }}'; deleteTitle = 'Hapus Kartu Tahun {{ $tahun }}'; deleteMessage = 'Yakin ingin menghapus kartu Tahun {{ $tahun }} ini?'; showDeleteModal = true" 
                                    class="w-full py-1.5 bg-red-50 text-red-600 hover:bg-red-600 hover:text-white rounded-xl text-center text-xs font-semibold transition">
                                    Hapus Kartu
                                </button>
                            @endif
                        </div>
                        @empty
                        <div class="col-span-1 md:col-span-2 text-center py-12 bg-white rounded-2xl border border-dashed border-gray-200">
                            <svg class="w-12 h-12 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <p class="text-sm font-semibold text-gray-700">Belum ada berkas Arsip Fisik untuk kategori ini</p>
                            <p class="text-xs text-gray-500 mt-1">Silakan klik tombol <strong class="text-blue-600">+ Create Arsip</strong> di pojok kanan atas untuk mengunggah berkas.</p>
                        </div>
                     
                    @endforelse

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

        {{-- MODAL POP-UP KONFIRMASI HAPUS --}}
        <div x-show="showDeleteModal" style="display: none;" 
             class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm p-4" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
             
            <div @click.away="showDeleteModal = false" 
                 class="bg-white rounded-3xl shadow-2xl max-w-sm w-full p-6 text-center transform transition-all"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95">
                
                {{-- Icon Peringatan Merah --}}
                <div class="w-14 h-14 mx-auto mb-4 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center shadow-inner">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </div>

                <h3 class="text-base font-bold text-gray-800 mb-1" x-text="deleteTitle">Konfirmasi Hapus</h3>
                <p class="text-xs text-gray-500 mb-6" x-text="deleteMessage">
                    Yakin ingin menghapus berkas ini?
                </p>

                <form :action="deleteActionUrl" method="POST" class="flex items-center justify-center gap-3">
                    @csrf
                    @method('DELETE')
                    <button type="button" @click="showDeleteModal = false" class="w-1/2 px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold rounded-xl transition">
                        Batal
                    </button>
                    <button type="submit" class="w-1/2 px-4 py-2.5 bg-red-600 hover:bg-red-700 text-white text-xs font-bold rounded-xl shadow-lg shadow-red-200 transition">
                        Ya, Hapus
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>