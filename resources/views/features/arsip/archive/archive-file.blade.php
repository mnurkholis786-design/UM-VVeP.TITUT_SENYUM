<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 tracking-tight">
            {{ __('Daftar File Arsip') }}
        </h2>
    </x-slot>

    {{-- CONTAINER UTAMA --}}
    <div class="py-8 bg-slate-100 min-h-screen">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- TOMBOL KEMBALI & INDIKATOR FOLDER --}}
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-2">
                <a href="{{ route('rack.show', $folder->id) }}"
                    class="inline-flex items-center gap-2.5 bg-white text-slate-800 px-4 py-2.5 rounded-xl border-2 border-slate-200
                    shadow-sm hover:border-blue-600 hover:text-blue-700 hover:shadow-md hover:-translate-y-0.5 active:scale-95 transition-all duration-200 w-fit">
                    <div class="w-6 h-6 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center font-bold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7" />
                        </svg>
                    </div>
                    <span class="text-sm font-bold">Kembali ke Rak</span>
                </a>

                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white rounded-xl border border-slate-200 shadow-sm text-xs text-slate-700 font-semibold w-fit">
                    <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                    <span>Folder Aktif: <span class="text-blue-900 font-black text-sm ml-1">{{ $folder->folder_name ?? 'Folder Arsip' }}</span></span>
                </div>
            </div>

            {{-- HEADER BANNER BIRU TVRI DENGAN INLINE GRADIENT --}}
            <div class="relative overflow-hidden rounded-3xl p-7 sm:p-9 shadow-xl border border-blue-900/30"
                 style="background: linear-gradient(120deg, #002766 0%, #003A8F 52%, #0056C7 100%) !important; color: #ffffff !important;">

                <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div class="flex items-center gap-4">
                        <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center border border-white/30 shadow-inner shrink-0">
                            <svg class="w-9 h-9 text-amber-300 drop-shadow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <span class="inline-block px-3 py-1 text-xs font-bold uppercase tracking-wider rounded-full mb-1.5 border border-white/30"
                                  style="background: rgba(255, 255, 255, 0.2) !important; color: #ffffff !important;">
                                TVRI Kalsel • Berkas Digital
                            </span>
                            <h3 class="text-2xl sm:text-3xl font-black text-white tracking-tight drop-shadow-sm" style="color: #ffffff !important;">
                                Kelola File Arsip
                            </h3>
                            <p class="text-sm mt-1 font-medium" style="color: #dbeafe !important;">
                                Total Berkas Terdaftar: <span class="font-extrabold text-white bg-white/20 px-2.5 py-0.5 rounded-lg ml-1">{{ $archives->total() }} Dokumen</span>
                            </p>
                        </div>
                    </div>

                    @if(Auth::user()->role !== 'Kepala Kantor TVRI')
                    <form action="{{ route('archive.create') }}" method="GET">
                        @csrf
                        <input type="text" name="folder_id" value="{{ $folder->id }}" class="hidden">
                        <button type="submit" class="inline-flex items-center gap-2 px-6 py-3.5 bg-emerald-600 hover:bg-emerald-700 text-white font-extrabold text-xs uppercase tracking-wider rounded-xl shadow-lg shadow-emerald-700/40 hover:-translate-y-0.5 active:scale-95 transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                            </svg>
                            <span>Tambah File Arsip</span>
                        </button>
                    </form>
                    @endif
                </div>
            </div>

            {{-- LIST FILE ARSIP --}}
            <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-md border-2 border-slate-200">
                @if ($archives->count() > 0)
                    <div class="space-y-4">
                        @php $no = $archives->firstItem() ?? 1; @endphp

                        @foreach ($archives as $archive)
                            <div class="flex items-center justify-between p-4 bg-slate-50 hover:bg-blue-50/50 rounded-2xl border-2 border-slate-200 hover:border-blue-400 hover:shadow-md transition-all duration-200 group">

                                {{-- KLIK MENUJU DETAIL --}}
                                <a href="{{ route('archive.show', $archive->id) }}"
                                    class="flex items-center gap-4 flex-1 min-w-0 pr-4">

                                    <div class="w-11 h-11 shrink-0 flex items-center justify-center rounded-xl bg-blue-700 text-white font-black text-sm shadow-md">
                                        {{ $no++ }}
                                    </div>

                                    <div class="min-w-0">
                                        <p class="font-bold text-slate-900 text-base group-hover:text-blue-800 transition-colors truncate">
                                            {{ $archive->file_name ?? 'Dokumen Tanpa Judul' }}
                                        </p>

                                        <div class="flex items-center gap-2.5 mt-1.5">
                                            @if ($archive->file_path || $archive->excel_path || $archive->status === 'Tersedia')
                                                <span class="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800 border border-emerald-300">
                                                    <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                                                    Tersedia
                                                </span>
                                            @else
                                                <span class="inline-flex items-center gap-1.5 px-3 py-0.5 rounded-full text-xs font-bold bg-rose-100 text-rose-800 border border-rose-300">
                                                    <span class="w-2 h-2 rounded-full bg-rose-600"></span>
                                                    Belum Upload
                                                </span>
                                            @endif

                                            @if($archive->kode_klasifikasi)
                                                <span class="text-xs font-bold text-slate-500">• {{ $archive->kode_klasifikasi }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </a>

                                @if(Auth::user()->role !== 'Kepala Kantor TVRI')
                                {{-- AKSI --}}
                                <div class="flex items-center gap-2 shrink-0">
                                    <a href="{{ route('archive.edit', $archive->id) }}"
                                        class="p-2.5 bg-amber-500 hover:bg-amber-600 text-white rounded-xl shadow-sm hover:shadow active:scale-95 transition-all"
                                        title="Edit File">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </a>

                                    <form action="{{ route('archive.destroy', $archive->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus file ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2.5 bg-rose-600 hover:bg-rose-700 text-white rounded-xl shadow-sm hover:shadow active:scale-95 transition-all"
                                            title="Hapus File">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-8 pt-5 border-t border-slate-200">
                        {{ $archives->links() }}
                    </div>
                @else
                    {{-- EMPTY STATE TEGAS --}}
                    <div class="text-center py-16 px-4">
                        <div class="w-20 h-20 mx-auto rounded-3xl bg-blue-50 text-blue-600 flex items-center justify-center mb-4 border-2 border-blue-100 shadow-inner">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h4 class="text-lg font-black text-slate-800">Belum Ada File Arsip</h4>
                        <p class="text-sm font-medium text-slate-500 max-w-sm mx-auto mt-1">
                            Folder ini masih kosong. Silakan klik tombol "Tambah File Arsip" di atas untuk menambahkan berkas baru.
                        </p>
                    </div>
                @endif
            </div>

        </div>
    </div>
    </div>
</x-app-layout>