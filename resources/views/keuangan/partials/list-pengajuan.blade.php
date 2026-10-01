<div class="space-y-6">
    {{-- ================= FORM PENCARIAN & FILTER ================= --}}
    <form method="GET" action="{{ route('keuangan.dashboard') }}" class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
            {{-- Cari Nama Pengajuan --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Cari Pengajuan</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama pengajuan..."
                    class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            {{-- Filter Divisi (BARU) --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Filter Divisi</label>
                <select name="divisi" class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">Semua Divisi</option>
                    <option value="Berita" {{ request('divisi') == 'Berita' ? 'selected' : '' }}>Berita</option>
                    <option value="Umum" {{ request('divisi') == 'Umum' ? 'selected' : '' }}>Umum</option>
                    <option value="Program" {{ request('divisi') == 'Program' ? 'selected' : '' }}>Program</option>
                    <option value="KMB" {{ request('divisi') == 'KMB' ? 'selected' : '' }}>KMB</option>
                </select>
            </div>

        </div>

        {{-- Tombol Aksi --}}
        <div class="flex gap-3 pt-2">
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-all">
                Cari & Filter
            </button>
            <a href="{{ route('keuangan.dashboard') }}"
                class="px-4 py-2 bg-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-300 transition-all">
                Reset
            </a>
        </div>
    </form>

    {{-- ================= DAFTAR PENGAJUAN ================= --}}
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Daftar Pengajuan</h3>

        <div class="space-y-4">
            @forelse ($pengajuans ?? [] as $item)
                <div class="p-4 border border-gray-200 rounded-lg hover:shadow-md transition-all flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div>
                        <h4 class="font-semibold text-gray-800 text-base">
                            {{ $item->pengajuan_name ?? $item->budget_submission_name ?? 'Nama Kegiatan Tidak Ada' }}
                        </h4>
                        <p class="text-xs text-gray-500 mt-1">
                            Diajukan oleh: <span class="font-medium text-gray-700">{{ $item->user->name ?? '-' }}</span> | 
                            Divisi: <span class="font-semibold text-blue-600">{{ $item->divisi ?? '-' }}</span>
                        </p>
                    </div>
                    <div>
                        <span class="px-3 py-1 text-xs font-semibold rounded-full 
                            {{ ($item->verification_status ?? 0) == 1 ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700' }}">
                            {{ ($item->verification_status ?? 0) == 1 ? 'Sudah Diverifikasi' : 'Belum Diverifikasi' }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="text-center py-8 text-gray-500">
                    Tidak ada pengajuan yang ditemukan.
                </div>
            @endforelse
        </div>
    </div>
</div>