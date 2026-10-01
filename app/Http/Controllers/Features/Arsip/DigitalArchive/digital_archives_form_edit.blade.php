<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Arsip Digital — ' . $judul) }}
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
        <a href="{{ route('digital.index') }}"
            class="inline-flex items-center gap-2 bg-gray-100 text-gray-700 px-4 py-2 rounded-full border border-gray-200
                shadow-sm transition hover:bg-gray-200">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke Kategori
        </a>
    </div>

    <div class="py-4 bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-md rounded-md border border-gray-200 divide-y divide-gray-100">

                @forelse ($archives as $index => $item)
                    <div class="flex items-center justify-between p-4">
                        <div class="flex items-center gap-3">
                            <span class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-600 text-white text-sm font-semibold">
                                {{ $archives->firstItem() + $index }}
                            </span>
                            <div>
                                <p class="font-semibold text-gray-800">{{ $item->archive_name }}</p>
                                <p class="text-sm text-gray-500">
                                    Diajukan: {{ $item->submiter_name ?? '-' }}
                                    &middot; Ditandatangani: {{ $item->revenue_officer_name ?? '-' }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <a href="{{ route('digital.show', $item->id) }}"
                                class="px-3 py-1.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm rounded-md transition">
                                Lihat
                            </a>
                            <a href="{{ route('digital.edit', $item->id) }}"
                                class="px-3 py-1.5 bg-yellow-500 hover:bg-yellow-600 text-white text-sm rounded-md transition">
                                Edit
                            </a>
                            <form action="{{ route('digital.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus arsip ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white text-sm rounded-md transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="p-8 text-center text-gray-500">
                        Belum ada arsip pada kategori "{{ $judul }}".
                    </div>
                @endforelse

            </div>

            <div class="mt-4">
                {{ $archives->links() }}
            </div>

        </div>
    </div>
</x-app-layout>