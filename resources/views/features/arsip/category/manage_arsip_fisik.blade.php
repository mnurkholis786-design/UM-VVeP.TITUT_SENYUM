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
        <div x-show="showCreateModal" style="display: none; position: fixed; inset: 0; z-index: 99999; overflow-y: auto;" x-transition>
            {{-- Backdrop --}}
            <div class="fixed inset-0 transition-opacity" style="position: fixed; inset: 0; background-color: rgba(15, 23, 42, 0.72); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); z-index: 99998;" @click="showCreateModal = false"></div>

            <div class="flex min-h-screen items-center justify-center p-4 text-center" style="position: relative; z-index: 100000; min-height: 100vh;">
                <div @click.away="showCreateModal = false" class="relative transform overflow-hidden rounded-3xl text-left shadow-2xl transition-all max-w-md w-full p-7 sm:p-8" style="background-color: #FFFFFF !important; position: relative; z-index: 100001; box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.45); border-radius: 24px; border: 1px solid #E2E8F0;">
                    
                    <button type="button" @click="showCreateModal = false" style="position: absolute; top: 18px; right: 18px; width: 34px; height: 34px; border-radius: 50%; background-color: #F1F5F9; color: #64748B; border: none; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                        <svg style="width: 16px; height: 16px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <div class="mb-5">
                        <h3 class="text-xl font-black text-slate-900">Tambah Arsip Fisik Baru</h3>
                        <p class="text-xs text-slate-500 mt-1">Unggah berkas rekapitulasi fisik sesuai tahun.</p>
                    </div>

                    <form action="{{ route('category.uploadArsipFisik', $category->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">Tahun Arsip</label>
                            <input type="text" name="tahun" placeholder="Masukkan tahun (Contoh: 2026)" required style="width: 100%; font-size: 13px; color: #0F172A; background-color: #F8FAFC; border: 1.5px solid #CBD5E1; border-radius: 14px; padding: 12px 14px; outline: none; box-sizing: border-box;">
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1.5">File Excel Rekapitulasi (.xlsx / .xls)</label>
                            <input type="file" name="file_excel" accept=".xlsx, .xls" required style="width: 100%; font-size: 13px; color: #475569; background-color: #F8FAFC; border: 1.5px solid #CBD5E1; border-radius: 14px; padding: 10px 14px; outline: none; box-sizing: border-box;">
                        </div>

                        <div class="grid grid-cols-2 gap-4 w-full mt-6 pt-2">
                            <button type="button" @click="showCreateModal = false" style="background-color: #F8FAFC; color: #475569; border: 1.5px solid #CBD5E1; padding: 12px 20px; font-size: 13.5px; font-weight: 700; border-radius: 14px; min-height: 46px; cursor: pointer;">
                                Batal
                            </button>
                            <button type="submit" style="background: linear-gradient(135deg, #003A8F 0%, #0066CC 100%); color: #FFFFFF; padding: 12px 20px; font-size: 13.5px; font-weight: 800; border-radius: 14px; border: none; box-shadow: 0 4px 14px rgba(0, 58, 143, 0.35); min-height: 46px; cursor: pointer;">
                                Simpan Arsip
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- MODAL POP-UP KONFIRMASI HAPUS --}}
        <div x-show="showDeleteModal" style="display: none; position: fixed; inset: 0; z-index: 99999; overflow-y: auto;" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0">
            
            <div class="fixed inset-0 transition-opacity" style="position: fixed; inset: 0; background-color: rgba(15, 23, 42, 0.72); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); z-index: 99998;" @click="showDeleteModal = false"></div>

            <div class="flex min-h-screen items-center justify-center p-4 text-center" style="position: relative; z-index: 100000; min-height: 100vh;">
                <div @click.away="showDeleteModal = false" 
                     class="relative transform overflow-hidden rounded-3xl text-left shadow-2xl transition-all max-w-md w-full p-7 sm:p-8"
                     style="background-color: #FFFFFF !important; position: relative; z-index: 100001; box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.45); border-radius: 24px; border: 1px solid #E2E8F0;">
                    
                    {{-- Icon Peringatan Merah --}}
                    <div class="w-16 h-16 mx-auto mb-4 rounded-2xl flex items-center justify-center shadow-inner" style="background-color: #FEF2F2; color: #DC2626;">
                        <svg style="width: 32px; height: 32px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </div>

                    <div class="text-center">
                        <h3 class="text-xl font-black text-gray-900" x-text="deleteTitle">Konfirmasi Hapus</h3>
                        <p class="text-sm text-gray-500 mt-2 leading-relaxed" x-text="deleteMessage">
                            Yakin ingin menghapus berkas ini?
                        </p>
                    </div>

                    <form :action="deleteActionUrl" method="POST" class="grid grid-cols-2 gap-4 w-full mt-7">
                        @csrf
                        @method('DELETE')
                        <button type="button" @click="showDeleteModal = false" style="background-color: #F8FAFC; color: #475569; border: 1.5px solid #CBD5E1; padding: 13px 20px; font-size: 13.5px; font-weight: 700; border-radius: 14px; min-height: 48px; box-shadow: 0 1px 2px rgba(0,0,0,0.05); cursor: pointer;" class="w-full text-center">
                            Batal
                        </button>
                        <button type="submit" style="background: linear-gradient(135deg, #DC2626 0%, #B91C1C 100%); color: #FFFFFF; padding: 13px 20px; font-size: 13.5px; font-weight: 800; border-radius: 14px; border: none; box-shadow: 0 4px 14px rgba(220, 38, 38, 0.35); min-height: 48px; cursor: pointer;" class="w-full text-center">
                            Ya, Hapus
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>