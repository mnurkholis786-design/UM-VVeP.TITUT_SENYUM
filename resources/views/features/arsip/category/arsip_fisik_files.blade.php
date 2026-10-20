<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center shadow-lg">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-xl text-gray-800 leading-tight">Daftar Berkas Arsip - Tahun {{ $tahun }}</h2>
                <p class="text-xs text-gray-500 mt-0.5">Kategori: {{ $category->category_name }} | Total: {{ $archives->total() }} Berkas</p>
            </div>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/40 to-indigo-50/50 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-6">
                <a href="{{ route('category.manageArsipFisik', $category->id) }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white text-gray-700 text-xs font-semibold rounded-xl border border-gray-200 shadow-sm hover:bg-gray-50 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali ke Kelola Arsip Fisik
                </a>

                <form method="GET" action="{{ route('category.arsipFisikFiles', [$category->id, $tahun]) }}" class="flex gap-2 w-full sm:w-auto">
                    <input type="text" name="search" value="{{ $search }}" placeholder="Cari Uraian / Kuitansi / SP2D..." class="text-xs border-gray-300 rounded-xl px-3 py-2 w-full sm:w-72 focus:ring-blue-500 focus:border-blue-500">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white text-xs font-semibold rounded-xl hover:bg-blue-700 shadow">Cari</button>
                    @if($search)
                        <a href="{{ route('category.arsipFisikFiles', [$category->id, $tahun]) }}" class="px-3 py-2 bg-gray-200 text-gray-700 text-xs font-semibold rounded-xl hover:bg-gray-300">Reset</a>
                    @endif
                </form>
            </div>

            <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-xs">
                        <thead class="bg-gray-50 text-gray-600 font-semibold uppercase">
                            <tr>
                                <th class="px-4 py-3.5 text-center w-12">No</th>
                                <th class="px-4 py-3.5 text-center w-16">Item</th>
                                <th class="px-4 py-3.5 text-left">Nama Berkas & Uraian</th>
                                <th class="px-4 py-3.5 text-center">Sub Kategori</th>
                                <th class="px-4 py-3.5 text-center">Lokasi Simpan</th>
                                <th class="px-4 py-3.5 text-center">Tgl Terima / SP2D</th>
                                <th class="px-4 py-3.5 text-center w-28">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-gray-700">
                            @forelse($archives as $index => $archive)
                                <tr class="hover:bg-blue-50/50 transition">
                                    <td class="px-4 py-3 text-center">{{ $archives->firstItem() + $index }}</td>
                                    <td class="px-4 py-3 text-center font-bold text-blue-600">{{ $archive->no_item ?? '-' }}</td>
                                    <td class="px-4 py-3">
                                        <p class="font-bold text-gray-900">{{ $archive->file_name }}</p>
                                        <p class="text-gray-500 line-clamp-2 mt-0.5">{{ $archive->uraian }}</p>
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <span class="px-2 py-0.5 bg-blue-100 text-blue-700 rounded-md font-semibold text-[10px]">
                                            {{ $archive->folder->category->sub_category ?? 'Umum' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-center whitespace-nowrap">
                                        <span class="px-2 py-1 bg-indigo-50 text-indigo-700 rounded-lg font-semibold">
                                            {{ $archive->folder->rack_name ?? 'Rak -' }} / {{ $archive->folder->folder_name ?? 'Folder -' }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-center whitespace-nowrap">
                                        {{ $archive->tgl_terima ? \Carbon\Carbon::parse($archive->tgl_terima)->format('d/m/Y') : ($archive->tgl_sp2d ? \Carbon\Carbon::parse($archive->tgl_sp2d)->format('d/m/Y') : '-') }}
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <a href="{{ route('archive.show', $archive->id) }}" class="inline-flex items-center gap-1 px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold shadow transition">
                                            <span>Detail</span>
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-4 py-12 text-center text-gray-500">
                                        Belum ada data berkas yang diimpor untuk tahun {{ $tahun }}.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="px-6 py-4 border-t border-gray-100">
                    {{ $archives->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>