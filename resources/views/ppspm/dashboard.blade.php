<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Dashboard
        </h2>
    </x-slot>
        
    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- WELCOME CARD --}}
            <div class="relative overflow-hidden bg-gradient-to-b from-[#003A8F] to-[#002766] text-white p-10 rounded-2xl shadow-2xl mb-8">
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-40 h-40 bg-white opacity-10 rounded-full"></div>
                <div class="absolute bottom-0 left-0 -mb-8 -ml-8 w-32 h-32 bg-white opacity-10 rounded-full"></div>
                <div class="relative z-10">
                    <div class="flex items-center mb-3">
                        <svg class="w-10 h-10 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                        </svg>
                        <h1 class="text-3xl font-bold">Selamat Datang di Dashboard PPSPM</h1>
                    </div>
                    <p class="text-lg opacity-90 ml-13">
                        Validasi dan Verifikasi Dokumen Seperti Dokumen Gaji dan Lainnya
                    </p>
                </div>
            </div>

            {{-- KARTU STATISTIK --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                
                {{-- Card Total Masuk --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Total Dokumen Masuk</p>
                        <h4 class="text-3xl font-bold text-gray-800">{{ $totalMasuk ?? 0 }}</h4>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center font-bold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>

                {{-- Card Selesai Diverifikasi --}}
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 mb-1">Selesai Diverifikasi</p>
                        <h4 class="text-3xl font-bold text-gray-800">{{ $selesai ?? 0 }}</h4>
                    </div>
                    <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center font-bold">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                </div>

            </div>

            {{-- TABEL PENGAJUAN TERBARU --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
                    <h4 class="font-bold text-gray-800 text-lg">Pengajuan Anggaran Terbaru</h4>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 text-gray-600 text-xs uppercase tracking-wider border-b border-gray-200">
                                <th class="py-3 px-6">No</th>
                                <th class="py-3 px-6">Nama Pengajuan</th>
                                <th class="py-3 px-6">Nominal</th>
                                <th class="py-3 px-6">Status Verifikasi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                            @forelse ($recentSubmissions as $index => $item)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="py-4 px-6 font-medium text-gray-500">
                                        {{ ($recentSubmissions->currentPage() - 1) * $recentSubmissions->perPage() + $index + 1 }}
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-gray-800">{{ $item->budget_submission_name ?? '-' }}</td>
                                    
                                    {{-- Kolom Nominal dengan pengecekan NULL --}}
                                    <td class="py-4 px-6">
                                        @if($item->nominal)
                                            Rp {{ number_format($item->nominal, 0, ',', '.') }}
                                        @else
                                            <span class="text-gray-400">-</span>
                                        @endif
                                    </td>

                                    <td class="py-4 px-6">
                                        @php
                                            $status = $item->verification_status;
                                            if ($status == '1' || $status == 1 || $status == '0' || $status === 0 || $status === null) {
                                                $statusText = 'Menunggu';
                                                $badgeColor = 'bg-amber-100 text-amber-700';
                                            } elseif ($status == 'selesai' || $status == 'verified') {
                                                $statusText = 'Selesai';
                                                $badgeColor = 'bg-emerald-100 text-emerald-700';
                                            } else {
                                                $statusText = ucfirst($status);
                                                $badgeColor = 'bg-gray-100 text-gray-700';
                                            }
                                        @endphp
                                        <span class="px-2.5 py-1 rounded-full text-xs font-medium {{ $badgeColor }}">
                                            {{ $statusText }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-6 text-gray-500">Belum ada data pengajuan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- PAGINATION LINKS --}}
                <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                    {{ $recentSubmissions->links() }}
                </div>
            </div>

        </div>
    </div>

</x-app-layout>