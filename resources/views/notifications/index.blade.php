<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-4">
            {{-- Icon header di sebelah kiri --}}
            <div
                class="hidden sm:flex items-center justify-center w-12 h-12 rounded-2xl
                       bg-gradient-to-br from-blue-500 to-indigo-600
                       text-white shadow-lg shadow-blue-200">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                    </path>
                </svg>
            </div>

            <div>
                <h2 class="font-bold text-2xl text-gray-800 tracking-tight">
                    Notifikasi
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Kelola dan lihat seluruh pemberitahuan akun Anda
                </p>
            </div>
        </div>
    </x-slot>

    @php
        $typeConfig = [
            'info' => [
                'bg' => 'from-blue-50 via-white to-indigo-50',
                'border' => 'border-blue-500',
                'icon' => 'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                'iconBg' => 'from-blue-500 to-indigo-600',
                'badge' => 'bg-blue-100 text-blue-700 border-blue-200',
                'label' => 'Informasi',
            ],

            'success' => [
                'bg' => 'from-emerald-50 via-white to-green-50',
                'border' => 'border-emerald-500',
                'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                'iconBg' => 'from-emerald-500 to-green-600',
                'badge' => 'bg-emerald-100 text-emerald-700 border-emerald-200',
                'label' => 'Berhasil',
            ],

            'warning' => [
                'bg' => 'from-amber-50 via-white to-yellow-50',
                'border' => 'border-amber-500',
                'icon' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z',
                'iconBg' => 'from-amber-500 to-yellow-600',
                'badge' => 'bg-amber-100 text-amber-700 border-amber-200',
                'label' => 'Peringatan',
            ],

            'error' => [
                'bg' => 'from-red-50 via-white to-rose-50',
                'border' => 'border-red-500',
                'icon' => 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z',
                'iconBg' => 'from-red-500 to-rose-600',
                'badge' => 'bg-red-100 text-red-700 border-red-200',
                'label' => 'Error',
            ],
        ];
    @endphp


    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- ========================================================= --}}
            {{-- HERO --}}
            {{-- ========================================================= --}}
            <div
                class="relative overflow-hidden rounded-3xl mb-7
                       bg-gradient-to-br from-blue-600 via-indigo-600 to-blue-800
                       shadow-2xl shadow-blue-200">

                {{-- Decorative circles --}}
                <div
                    class="absolute -right-16 -top-20 w-64 h-64 rounded-full
                           bg-white/10 blur-sm">
                </div>

                <div
                    class="absolute -left-20 -bottom-24 w-72 h-72 rounded-full
                           bg-white/5">
                </div>

                <div
                    class="absolute right-32 bottom-[-50px] w-40 h-40 rounded-full
                           bg-cyan-400/10">
                </div>

                <div class="relative px-6 py-7 sm:px-8 sm:py-8">

                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                        {{-- Hero text --}}
                        <div class="flex items-center gap-4">

                            <div
                                class="flex-shrink-0 w-16 h-16 rounded-2xl
                                       bg-white/15 backdrop-blur-md
                                       border border-white/20
                                       flex items-center justify-center
                                       shadow-xl">

                                <svg class="w-8 h-8 text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                    </path>
                                </svg>
                            </div>

                            <div>
                                <p class="text-blue-100 text-sm font-medium mb-1">
                                    Pusat Pemberitahuan
                                </p>

                                <h1 class="text-2xl sm:text-3xl font-extrabold text-white">
                                    Notifikasi
                                </h1>

                                <p class="text-blue-100 text-sm mt-1">
                                    Pantau informasi dan aktivitas terbaru Anda
                                </p>
                            </div>
                        </div>

                        {{-- Notification count --}}
                        <div
                            class="flex items-center gap-3
                                   bg-white/10 backdrop-blur-md
                                   border border-white/20
                                   rounded-2xl px-5 py-3
                                   shadow-lg">

                            <div>
                                <p class="text-xs text-blue-100">
                                    Total Notifikasi
                                </p>

                                <p class="text-2xl font-extrabold text-white">
                                    {{ $notifications->count() }}
                                </p>
                            </div>

                            <div class="w-px h-10 bg-white/20"></div>

                            <div class="text-right">
                                <p class="text-xs text-blue-100">
                                    Status
                                </p>

                                <p class="text-sm font-bold text-white">
                                    {{ request('filter') === 'unread' ? 'Belum Dibaca' : (request('filter') === 'read' ? 'Sudah Dibaca' : 'Semua') }}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            {{-- ========================================================= --}}
            {{-- FILTER & ACTIONS --}}
            {{-- ========================================================= --}}
            <div
                class="bg-white/90 backdrop-blur-sm
                       rounded-3xl
                       border border-gray-100
                       shadow-xl shadow-gray-200/50
                       p-4 sm:p-5 mb-7">

                <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-4">

                    {{-- Filter --}}
                    <div
                        class="flex flex-wrap gap-1.5
                               bg-gray-100/80
                               p-1.5 rounded-2xl
                               border border-gray-200">

                        {{-- Semua --}}
                        <a href="{{ route('notifications.index') }}"
                            class="group inline-flex items-center gap-2
                                   px-4 py-2.5 rounded-xl
                                   text-sm font-semibold
                                   transition-all duration-200
                                   {{ request('filter') === null
                                        ? 'bg-white text-blue-600 shadow-md shadow-gray-200'
                                        : 'text-gray-500 hover:text-blue-600 hover:bg-white/70' }}">

                            <svg class="w-4 h-4 transition-transform group-hover:scale-110"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16">
                                </path>
                            </svg>

                            Semua
                        </a>


                        {{-- Belum Dibaca --}}
                        <a href="{{ route('notifications.index', ['filter' => 'unread']) }}"
                            class="group inline-flex items-center gap-2
                                   px-4 py-2.5 rounded-xl
                                   text-sm font-semibold
                                   transition-all duration-200
                                   {{ request('filter') === 'unread'
                                        ? 'bg-white text-blue-600 shadow-md shadow-gray-200'
                                        : 'text-gray-500 hover:text-blue-600 hover:bg-white/70' }}">

                            <svg class="w-4 h-4 transition-transform group-hover:scale-110"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>

                            Belum Dibaca
                        </a>


                        {{-- Sudah Dibaca --}}
                        <a href="{{ route('notifications.index', ['filter' => 'read']) }}"
                            class="group inline-flex items-center gap-2
                                   px-4 py-2.5 rounded-xl
                                   text-sm font-semibold
                                   transition-all duration-200
                                   {{ request('filter') === 'read'
                                        ? 'bg-white text-blue-600 shadow-md shadow-gray-200'
                                        : 'text-gray-500 hover:text-blue-600 hover:bg-white/70' }}">

                            <svg class="w-4 h-4 transition-transform group-hover:scale-110"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>

                            Sudah Dibaca
                        </a>
                    </div>


                    {{-- Actions --}}
                    <div class="flex flex-wrap gap-2">

                        {{-- Tandai semua --}}
                        <form method="POST" action="{{ route('notifications.readAll') }}">
                            @csrf

                            <button type="submit"
                                class="group inline-flex items-center justify-center gap-2
                                       px-4 py-2.5
                                       rounded-xl
                                       bg-gradient-to-r from-blue-500 to-indigo-600
                                       text-white
                                       text-sm font-bold
                                       shadow-lg shadow-blue-200
                                       hover:shadow-xl hover:shadow-blue-300
                                       hover:-translate-y-0.5
                                       active:translate-y-0
                                       transition-all duration-200">

                                <svg class="w-4 h-4 transition-transform group-hover:scale-110"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 13l4 4L19 7">
                                    </path>
                                </svg>

                                Tandai Semua
                            </button>
                        </form>


                        {{-- Hapus dibaca --}}
                        <form method="POST" action="{{ route('notifications.deleteRead') }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="group inline-flex items-center justify-center gap-2
                                       px-4 py-2.5
                                       rounded-xl
                                       bg-gradient-to-r from-red-500 to-rose-600
                                       text-white
                                       text-sm font-bold
                                       shadow-lg shadow-red-200
                                       hover:shadow-xl hover:shadow-red-300
                                       hover:-translate-y-0.5
                                       active:translate-y-0
                                       transition-all duration-200">

                                <svg class="w-4 h-4 transition-transform group-hover:scale-110"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                    </path>
                                </svg>

                                Hapus Dibaca
                            </button>
                        </form>

                    </div>
                </div>
            </div>


            {{-- ========================================================= --}}
            {{-- NOTIFICATION LIST --}}
            {{-- ========================================================= --}}
            <div class="space-y-4">

                @forelse ($notifications as $notif)

                    @php
                        $config = $typeConfig[$notif->type] ?? $typeConfig['info'];
                    @endphp


                    {{-- Notification Card --}}
                    <div
                        class="notification-card
                               relative overflow-hidden
                               rounded-3xl
                               border border-gray-100
                               border-l-4 {{ $config['border'] }}
                               bg-gradient-to-r {{ $config['bg'] }}
                               shadow-lg shadow-gray-200/40
                               hover:shadow-2xl hover:shadow-gray-300/50
                               hover:-translate-y-1
                               transition-all duration-300
                               {{ $notif->is_read ? 'opacity-75' : '' }}">

                        {{-- Unread indicator --}}
                        @if (!$notif->is_read)
                            <div
                                class="absolute top-0 right-0
                                       w-28 h-28
                                       bg-blue-500/5
                                       rounded-bl-full">
                            </div>
                        @endif


                        <div class="relative p-5 sm:p-6">

                            <div class="flex items-start gap-4">

                                {{-- Icon --}}
                                <div class="flex-shrink-0">

                                    <div
                                        class="w-14 h-14 sm:w-16 sm:h-16
                                               rounded-2xl
                                               bg-gradient-to-br {{ $config['iconBg'] }}
                                               flex items-center justify-center
                                               shadow-lg
                                               ring-4 ring-white/70
                                               transform
                                               transition-transform duration-300
                                               hover:scale-105">

                                        <svg class="w-7 h-7 sm:w-8 sm:h-8 text-white"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="1.8"
                                                d="{{ $config['icon'] }}">
                                            </path>

                                        </svg>
                                    </div>

                                </div>


                                {{-- Content --}}
                                <div class="flex-1 min-w-0">

                                    {{-- Title + badge --}}
                                    <div
                                        class="flex flex-col sm:flex-row
                                               sm:items-start
                                               sm:justify-between
                                               gap-2 mb-2">

                                        <div class="flex items-center gap-2 min-w-0">

                                            <h3
                                                class="font-extrabold
                                                       text-gray-800
                                                       text-base sm:text-lg
                                                       leading-snug
                                                       break-words">

                                                {{ $notif->title }}
                                            </h3>

                                            @if (!$notif->is_read)
                                                <span
                                                    class="flex-shrink-0
                                                           w-2.5 h-2.5
                                                           bg-blue-600
                                                           rounded-full
                                                           animate-pulse
                                                           ring-4 ring-blue-100">
                                                </span>
                                            @endif

                                        </div>


                                        {{-- Type badge --}}
                                        <span
                                            class="self-start
                                                   inline-flex items-center
                                                   px-3 py-1
                                                   rounded-full
                                                   border
                                                   {{ $config['badge'] }}
                                                   text-[11px]
                                                   font-extrabold
                                                   uppercase
                                                   tracking-wider
                                                   whitespace-nowrap">

                                            {{ $config['label'] }}
                                        </span>

                                    </div>


                                    {{-- Message --}}
                                    <div
                                        class="text-gray-600
                                               text-sm
                                               leading-6
                                               mb-4
                                               prose prose-sm max-w-none">

                                        {!! $notif->message !!}
                                    </div>


                                    {{-- Footer --}}
                                    <div
                                        class="flex flex-col sm:flex-row
                                               sm:items-center
                                               sm:justify-between
                                               gap-3">

                                        {{-- Time --}}
                                        <div
                                            class="inline-flex items-center
                                                   gap-2
                                                   text-xs
                                                   font-medium
                                                   text-gray-400">

                                            <span
                                                class="flex items-center justify-center
                                                       w-7 h-7
                                                       rounded-lg
                                                       bg-white/80
                                                       border border-gray-100
                                                       shadow-sm">

                                                <svg class="w-4 h-4"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24">

                                                    <path stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z">
                                                    </path>
                                                </svg>

                                            </span>

                                            {{ $notif->created_at->diffForHumans() }}

                                        </div>


                                        {{-- Buttons --}}
                                        <div class="flex items-center gap-2">

                                            {{-- Read --}}
                                            @if (!$notif->is_read)

                                                <form method="POST"
                                                    action="{{ route('notifications.read', $notif->id) }}">

                                                    @csrf

                                                    <button type="submit"
                                                        class="group inline-flex items-center gap-2
                                                               px-4 py-2
                                                               rounded-xl
                                                               bg-white
                                                               border border-blue-200
                                                               text-blue-600
                                                               text-sm font-bold
                                                               shadow-sm
                                                               hover:bg-blue-50
                                                               hover:border-blue-300
                                                               hover:shadow-md
                                                               hover:-translate-y-0.5
                                                               transition-all duration-200">

                                                        <svg class="w-4 h-4 transition-transform group-hover:scale-110"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            viewBox="0 0 24 24">

                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z">
                                                            </path>

                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                            </path>
                                                        </svg>

                                                        Baca
                                                    </button>

                                                </form>

                                            @endif


                                            {{-- Delete --}}
                                            @if ($notif->is_read)

                                                <form method="POST"
                                                    action="{{ route('notifications.delete', $notif->id) }}">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                        class="group inline-flex items-center gap-2
                                                               px-4 py-2
                                                               rounded-xl
                                                               bg-white
                                                               border border-red-200
                                                               text-red-600
                                                               text-sm font-bold
                                                               shadow-sm
                                                               hover:bg-red-50
                                                               hover:border-red-300
                                                               hover:shadow-md
                                                               hover:-translate-y-0.5
                                                               transition-all duration-200">

                                                        <svg class="w-4 h-4 transition-transform group-hover:scale-110"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            viewBox="0 0 24 24">

                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                            </path>
                                                        </svg>

                                                        Hapus
                                                    </button>

                                                </form>

                                            @endif

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>

                @empty

                    {{-- Empty State --}}
                    <div
                        class="relative overflow-hidden
                               bg-white
                               rounded-3xl
                               border border-gray-100
                               shadow-xl shadow-gray-200/50
                               px-6 py-20 sm:py-28
                               text-center">

                        <div
                            class="absolute -top-20 -right-20
                                   w-56 h-56
                                   bg-blue-50
                                   rounded-full">
                        </div>

                        <div
                            class="absolute -bottom-24 -left-20
                                   w-64 h-64
                                   bg-indigo-50
                                   rounded-full">
                        </div>

                        <div class="relative">

                            <div
                                class="w-24 h-24 mx-auto mb-6
                                       rounded-3xl
                                       bg-gradient-to-br
                                       from-blue-50 to-indigo-100
                                       flex items-center justify-center
                                       shadow-inner">

                                <svg class="w-12 h-12 text-blue-400"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                    </path>
                                </svg>
                            </div>

                            <h3
                                class="text-2xl font-extrabold
                                       text-gray-800 mb-2">
                                Tidak ada notifikasi
                            </h3>

                            <p
                                class="text-gray-500
                                       max-w-md
                                       mx-auto
                                       leading-relaxed">
                                Semua notifikasi sudah terbaca atau belum ada notifikasi baru untuk akun Anda.
                            </p>

                        </div>
                    </div>

                @endforelse

            </div>

        </div>
    </div>


    {{-- ========================================================= --}}
    {{-- CUSTOM STYLE --}}
    {{-- ========================================================= --}}
    <style>
        @keyframes notificationSlideIn {
            from {
                opacity: 0;
                transform: translateY(14px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .notification-card {
            animation: notificationSlideIn .35s ease-out both;
        }

        .notification-card:nth-child(2) {
            animation-delay: .04s;
        }

        .notification-card:nth-child(3) {
            animation-delay: .08s;
        }

        .notification-card:nth-child(4) {
            animation-delay: .12s;
        }

        .notification-card:nth-child(5) {
            animation-delay: .16s;
        }

        .notification-card:nth-child(n+6) {
            animation-delay: .2s;
        }

        @media (max-width: 640px) {
            .notification-card {
                border-left-width: 3px;
            }
        }
    </style>

</x-app-layout>