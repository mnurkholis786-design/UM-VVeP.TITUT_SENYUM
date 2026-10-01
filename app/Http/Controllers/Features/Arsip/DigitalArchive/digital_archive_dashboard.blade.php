<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Daftar Sub Kategori Arsip') }}
        </h2>
    </x-slot>

    <div class="py-8 bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-50 border border-green-200 text-green-700 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-md sm:rounded-md p-6 border border-gray-200 mb-6 flex justify-between items-center">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">Pilih Sub Kategori</h3>
                    <p class="text-sm text-gray-500">Kelompokkan arsip berdasarkan sub kategori di bawah UP Bendahara atau LS SPM.</p>
                </div>
            </div>

            {{-- Daftar Folder / Sub Kategori --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @isset($folders)
                    @foreach($folders as $folder)
                        <a href="{{ route('folder.show', $folder->id) }}"
                            class="bg-white shadow-md rounded-md p-6 border border-gray-200 hover:shadow-lg hover:border-blue-300 transition flex items-center gap-4">
                            <div class="p-3 bg-blue-50 text-blue-600 rounded-lg text-2xl">
                                📁
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 text-lg">{{ $folder->folder_name }}</h3>
                                <p class="text-sm text-gray-500 mt-0.5">Sub Kategori Arsip</p>
                            </div>
                        </a>
                    @endforeach
                @endisset
            </div>

        </div>
    </div>
</x-app-layout>