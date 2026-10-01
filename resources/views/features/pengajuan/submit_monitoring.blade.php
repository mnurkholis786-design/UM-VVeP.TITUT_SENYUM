<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-500 to-blue-700 text-white flex items-center justify-center shadow-lg shadow-blue-500/30">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h8.586a2 2 0 011.414.586l3.414 3.414A2 2 0 0121 8.414V19a2 2 0 01-2 2z" />
                </svg>
            </div>

            <div>
                <h2 class="font-bold text-xl leading-tight text-gray-800">
                    {{ __('Semua Status Submit') }}
                </h2>
                <p class="text-xs text-gray-500">
                    Kelola dan pantau pengajuan keuangan Anda
                </p>
            </div>
        </div>
    </x-slot>

    <style>
        /* ================================
           MONITOR PAGE
        ================================= */

        .monitor-bg {
            background:
                radial-gradient(circle at 10% 10%, rgba(37, 99, 235, .07), transparent 28%),
                radial-gradient(circle at 90% 20%, rgba(99, 102, 241, .06), transparent 25%),
                #f5f7fb;
        }

        .monitor-card {
            border: 1px solid rgba(226, 232, 240, .9);
            box-shadow:
                0 10px 30px rgba(15, 23, 42, .06),
                0 2px 6px rgba(15, 23, 42, .04);
        }

        .hero-monitor {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at 90% 15%, rgba(96, 165, 250, .28), transparent 25%),
                radial-gradient(circle at 10% 90%, rgba(59, 130, 246, .18), transparent 30%),
                linear-gradient(135deg, #003a8f 0%, #0754c7 55%, #0b63e5 100%);
            box-shadow:
                0 18px 35px rgba(0, 58, 143, .22),
                inset 0 1px 0 rgba(255, 255, 255, .15);
        }

        .hero-monitor::before {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border-radius: 999px;
            background: rgba(255,255,255,.07);
            right: -80px;
            top: -110px;
        }

        .hero-monitor::after {
            content: "";
            position: absolute;
            width: 150px;
            height: 150px;
            border-radius: 999px;
            background: rgba(255,255,255,.05);
            left: -60px;
            bottom: -80px;
        }

        .hero-icon {
            box-shadow:
                0 10px 25px rgba(0, 0, 0, .15),
                inset 0 1px 0 rgba(255,255,255,.2);
        }

        .monitor-tab-wrapper {
            box-shadow:
                0 8px 20px rgba(15, 23, 42, .05);
        }

        .submit-item {
            position: relative;
            overflow: hidden;
            border: 1px solid #e5e7eb;
            background: linear-gradient(145deg, #ffffff, #f9fbff);
            box-shadow:
                0 4px 10px rgba(15, 23, 42, .04),
                0 1px 2px rgba(15, 23, 42, .04);
            transition:
                transform .25s ease,
                box-shadow .25s ease,
                border-color .25s ease;
        }

        .submit-item::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(180deg, #2563eb, #60a5fa);
            opacity: 0;
            transition: opacity .25s ease;
        }

        .submit-item:hover {
            transform: translateY(-3px);
            border-color: #bfdbfe;
            box-shadow:
                0 14px 28px rgba(37, 99, 235, .10),
                0 4px 8px rgba(15, 23, 42, .06);
        }

        .submit-item:hover::before {
            opacity: 1;
        }

        .number-box {
            background: linear-gradient(145deg, #0b5ddd, #003a8f);
            box-shadow:
                0 7px 14px rgba(0, 58, 143, .22),
                inset 0 1px 0 rgba(255,255,255,.2);
            transition: transform .25s ease;
        }

        .submit-item:hover .number-box {
            transform: scale(1.06) rotate(-2deg);
        }

        .status-badge {
            border: 1px solid transparent;
            box-shadow: inset 0 1px 0 rgba(255,255,255,.5);
        }

        .action-btn {
            transition:
                transform .2s ease,
                box-shadow .2s ease;
        }

        .action-btn:hover {
            transform: translateY(-2px);
        }

        .edit-btn {
            box-shadow: 0 5px 12px rgba(234, 179, 8, .20);
        }

        .delete-btn {
            box-shadow: 0 5px 12px rgba(239, 68, 68, .18);
        }

        .empty-box {
            background:
                radial-gradient(circle at 50% 0%, rgba(59,130,246,.08), transparent 45%),
                #f8fafc;
        }

        .pagination-wrapper nav {
            display: flex;
            justify-content: center;
        }

        /* scrollbar */
        .custom-scroll::-webkit-scrollbar {
            height: 5px;
        }

        .custom-scroll::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 999px;
        }

        .custom-scroll::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 999px;
        }
    </style>

    <div
        class="py-8 min-h-screen monitor-bg"
        x-data="{ tab: '{{ request()->get('tab', 'semua') }}' }"
    >

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- =========================================
                 MAIN CARD
            ========================================== --}}
            <div class="monitor-card bg-white/90 backdrop-blur-sm rounded-2xl overflow-hidden">

                <div class="p-6 md:p-8 space-y-7">

                    {{-- =========================================
                         HERO HEADER
                    ========================================== --}}
                    <div class="hero-monitor text-white rounded-2xl p-6 md:p-8">

                        <div class="relative z-10 flex items-center justify-between gap-5">

                            <div class="flex items-center gap-5">

                                <div class="hero-icon w-14 h-14 md:w-16 md:h-16 rounded-2xl bg-white/15 backdrop-blur-md border border-white/20 flex items-center justify-center flex-shrink-0">

                                    <svg class="w-7 h-7 md:w-8 md:h-8"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="1.8"
                                            d="M9 17v-2m3 2v-4m3 4v-6m2 9H7a2 2 0 01-2-2V5a2 2 0 012-2h7.586A2 2 0 0116 3.586l2.414 2.414A2 2 0 0119 7.414V19a2 2 0 01-2 2z" />

                                    </svg>

                                </div>

                                <div>

                                    <h2 class="text-2xl md:text-3xl font-bold tracking-tight">
                                        Submit Saya
                                    </h2>

                                    <p class="text-blue-100 text-sm md:text-base mt-1">
                                        Kelola dan pantau semua submit keuangan Anda dalam satu tempat
                                    </p>

                                </div>

                            </div>

                            {{-- Decorative icon --}}
                            <div class="hidden md:flex w-20 h-20 rounded-full bg-white/10 border border-white/10 items-center justify-center">

                                <svg class="w-10 h-10 text-white/80"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622C17.176 19.29 21 14.591 21 9c0-1.042-.133-2.052-.382-3.016z" />

                                </svg>

                            </div>

                        </div>

                    </div>


                    {{-- =========================================
                         NAVIGATION TABS
                    ========================================== --}}
                    <div class="monitor-tab-wrapper bg-white border border-gray-200 rounded-2xl overflow-hidden">

                        <div class="overflow-x-auto custom-scroll">

                            <nav
                                class="flex min-w-max px-4 md:px-6"
                                aria-label="Tabs"
                            >

                                {{-- SEMUA --}}
                                <button
                                    type="button"
                                    @click="tab = 'semua'"
                                    :class="tab === 'semua'
                                        ? 'border-blue-600 text-blue-600'
                                        : 'border-transparent text-gray-500 hover:text-gray-800 hover:border-gray-300'"
                                    class="relative whitespace-nowrap py-5 px-4 md:px-5 border-b-2 font-semibold text-sm transition-all duration-200 flex items-center gap-2"
                                >

                                    <svg class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h8.586A2 2 0 0117 3.586l3.414 3.414A2 2 0 0121 8.414V19a2 2 0 01-2 2z" />

                                    </svg>

                                    <span>Semua Submit</span>

                                    <span
                                        class="py-1 px-2.5 rounded-full text-xs font-bold"
                                        :class="tab === 'semua'
                                            ? 'bg-blue-100 text-blue-700'
                                            : 'bg-gray-100 text-gray-600'"
                                    >
                                        {{ isset($all_submissions) ? $all_submissions->total() : 0 }}
                                    </span>

                                </button>


                                {{-- PROSES --}}
                                <button
                                    type="button"
                                    @click="tab = 'proses'"
                                    :class="tab === 'proses'
                                        ? 'border-blue-600 text-blue-600'
                                        : 'border-transparent text-gray-500 hover:text-gray-800 hover:border-gray-300'"
                                    class="whitespace-nowrap py-5 px-4 md:px-5 border-b-2 font-semibold text-sm transition-all duration-200 flex items-center gap-2"
                                >

                                    <svg class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />

                                    </svg>

                                    <span>Submit dalam Proses</span>

                                    <span
                                        class="py-1 px-2.5 rounded-full text-xs font-bold"
                                        :class="tab === 'proses'
                                            ? 'bg-blue-100 text-blue-700'
                                            : 'bg-gray-100 text-gray-600'"
                                    >
                                        {{ isset($proses_submissions) ? $proses_submissions->total() : 0 }}
                                    </span>

                                </button>


                                {{-- SELESAI --}}
                                <button
                                    type="button"
                                    @click="tab = 'selesai'"
                                    :class="tab === 'selesai'
                                        ? 'border-blue-600 text-blue-600'
                                        : 'border-transparent text-gray-500 hover:text-gray-800 hover:border-gray-300'"
                                    class="whitespace-nowrap py-5 px-4 md:px-5 border-b-2 font-semibold text-sm transition-all duration-200 flex items-center gap-2"
                                >

                                    <svg class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />

                                    </svg>

                                    <span>Diverifikasi atau Selesai</span>

                                    <span
                                        class="py-1 px-2.5 rounded-full text-xs font-bold"
                                        :class="tab === 'selesai'
                                            ? 'bg-blue-100 text-blue-700'
                                            : 'bg-gray-100 text-gray-600'"
                                    >
                                        {{ isset($archive_submit) ? $archive_submit->total() : 0 }}
                                    </span>

                                </button>


                                {{-- ARSIP --}}
                                <button
                                    type="button"
                                    @click="tab = 'arsip'"
                                    :class="tab === 'arsip'
                                        ? 'border-blue-600 text-blue-600'
                                        : 'border-transparent text-gray-500 hover:text-gray-800 hover:border-gray-300'"
                                    class="whitespace-nowrap py-5 px-4 md:px-5 border-b-2 font-semibold text-sm transition-all duration-200 flex items-center gap-2"
                                >

                                    <svg class="w-4 h-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />

                                    </svg>

                                    <span>Diarsipkan</span>

                                    <span
                                        class="py-1 px-2.5 rounded-full text-xs font-bold"
                                        :class="tab === 'arsip'
                                            ? 'bg-blue-100 text-blue-700'
                                            : 'bg-gray-100 text-gray-600'"
                                    >
                                        {{ isset($arsip_submissions) ? $arsip_submissions->total() : 0 }}
                                    </span>

                                </button>

                            </nav>

                        </div>

                    </div>


                    {{-- =========================================
                         MAIN CONTENT
                    ========================================== --}}
                    <div class="space-y-7">


                        {{-- =====================================================
                             TAB 1 : SEMUA SUBMIT
                        ====================================================== --}}
                        <div x-show="tab === 'semua'" class="space-y-5">

                            <div class="flex items-center justify-between gap-4 pb-4 border-b border-gray-200">

                                <div>

                                    <h3 class="text-xl font-bold text-gray-800">
                                        Semua Submit
                                    </h3>

                                    <p class="text-sm text-gray-500 mt-1">
                                        Daftar seluruh pengajuan keuangan Anda
                                    </p>

                                </div>

                                <span class="px-4 py-2 bg-blue-50 text-blue-700 text-sm font-bold rounded-xl border border-blue-100">
                                    {{ $all_submissions->total() }} Item
                                </span>

                            </div>


                            <div class="space-y-3">

                                @php
                                    $no = ($all_submissions->currentPage() - 1) * $all_submissions->perPage() + 1;
                                @endphp

                                @forelse ($all_submissions as $all)

                                    <div class="submit-item rounded-xl p-4 md:p-5">

                                        <div class="flex items-center gap-4">

                                            {{-- NUMBER --}}
                                            <div class="number-box flex-shrink-0 w-11 h-11 flex items-center justify-center text-white font-bold text-sm rounded-xl">
                                                {{ $no++ }}
                                            </div>


                                            {{-- CONTENT --}}
                                            <a
                                                href="{{ route('submit.show', $all->id) }}"
                                                class="flex-1 min-w-0"
                                            >

                                                <div class="font-bold text-gray-800 text-sm md:text-base mb-3 truncate">
                                                    {{ $all->budget_submission_name }}
                                                </div>


                                                <div class="flex flex-wrap items-center gap-2">

                                                    @if ($all->requirements_status == 'Belum Lengkap')

                                                        <span class="status-badge px-3 py-1.5 text-xs font-semibold rounded-lg bg-yellow-50 text-yellow-700 border-yellow-200">
                                                            Belum Lengkap
                                                        </span>

                                                    @elseif($all->requirements_status == 'Lengkap')

                                                        <span class="status-badge px-3 py-1.5 text-xs font-semibold rounded-lg bg-green-50 text-green-700 border-green-200">
                                                            Lengkap
                                                        </span>

                                                    @else

                                                        <span class="status-badge px-3 py-1.5 text-xs font-semibold rounded-lg bg-red-50 text-red-700 border-red-200">
                                                            Belum Diperiksa
                                                        </span>

                                                    @endif


                                                    @if ($all->verification_status == 1)

                                                        <span class="status-badge px-3 py-1.5 text-xs font-semibold rounded-lg bg-green-50 text-green-700 border-green-200">
                                                            Diverifikasi
                                                        </span>

                                                    @else

                                                        <span class="status-badge px-3 py-1.5 text-xs font-semibold rounded-lg bg-red-50 text-red-700 border-red-200">
                                                            Belum Diverifikasi
                                                        </span>

                                                    @endif


                                                    @if ($all->is_archive == 1)

                                                        <span class="status-badge px-3 py-1.5 text-xs font-semibold rounded-lg bg-blue-50 text-blue-700 border-blue-200">
                                                            Diarsipkan
                                                        </span>

                                                    @endif


                                                    <span class="text-xs text-gray-400 flex items-center gap-1 ml-1">

                                                        <svg class="w-3.5 h-3.5"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            viewBox="0 0 24 24">

                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />

                                                        </svg>

                                                        {{ $all->created_at->diffForHumans() }}

                                                    </span>

                                                </div>

                                            </a>


                                            {{-- ACTION --}}
                                            @if (!$all->is_archive)

                                                <div class="flex gap-2 flex-shrink-0">

                                                    <a
                                                        href="{{ route('submit.edit', $all->id) }}"
                                                        class="action-btn edit-btn w-10 h-10 flex items-center justify-center bg-yellow-400 hover:bg-yellow-500 text-white rounded-xl"
                                                        title="Edit"
                                                    >

                                                        <svg class="w-4 h-4"
                                                            fill="currentColor"
                                                            viewBox="0 0 20 20">

                                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>

                                                        </svg>

                                                    </a>


                                                    <form
                                                        action="{{ route('submit.destroy', $all->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Yakin ingin menghapus submit ini?');"
                                                    >

                                                        @csrf
                                                        @method('DELETE')

                                                        <button
                                                            type="submit"
                                                            class="action-btn delete-btn w-10 h-10 flex items-center justify-center bg-red-500 hover:bg-red-600 text-white rounded-xl"
                                                            title="Hapus"
                                                        >

                                                            <svg class="w-4 h-4"
                                                                fill="currentColor"
                                                                viewBox="0 0 20 20">

                                                                <path fill-rule="evenodd"
                                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                    clip-rule="evenodd"/>

                                                            </svg>

                                                        </button>

                                                    </form>

                                                </div>

                                            @endif

                                        </div>

                                    </div>

                                @empty

                                    <div class="empty-box rounded-2xl border border-dashed border-gray-300 py-14 text-center">

                                        <div class="w-14 h-14 mx-auto rounded-2xl bg-blue-50 text-blue-500 flex items-center justify-center mb-4">

                                            <svg class="w-7 h-7"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h8.586A2 2 0 0117 3.586l3.414 3.414A2 2 0 0121 8.414V19a2 2 0 01-2 2z"/>

                                            </svg>

                                        </div>

                                        <p class="text-gray-700 font-semibold">
                                            Belum ada submit
                                        </p>

                                        <p class="text-gray-400 text-sm mt-1">
                                            Pengajuan Anda akan muncul di sini.
                                        </p>

                                    </div>

                                @endforelse


                                <div class="pagination-wrapper pt-3">
                                    {{ $all_submissions->appends(['tab' => 'semua'])->links() }}
                                </div>

                            </div>

                        </div>


                        {{-- =====================================================
                             TAB 2 : PROSES
                        ====================================================== --}}
                        <div
                            x-show="tab === 'proses'"
                            style="display: none;"
                            class="space-y-5"
                        >

                            <div class="flex items-center justify-between gap-4 pb-4 border-b border-gray-200">

                                <div>

                                    <h3 class="text-xl font-bold text-gray-800">
                                        Submit dalam Proses
                                    </h3>

                                    <p class="text-sm text-gray-500 mt-1">
                                        Pengajuan yang masih membutuhkan proses
                                    </p>

                                </div>

                                <span class="px-4 py-2 bg-yellow-50 text-yellow-700 text-sm font-bold rounded-xl border border-yellow-100">
                                    {{ $proses_submissions->total() }} Item
                                </span>

                            </div>


                            <div class="space-y-3">

                                @php
                                    $no = ($proses_submissions->currentPage() - 1) * $proses_submissions->perPage() + 1;
                                @endphp

                                @forelse ($proses_submissions as $proses)

                                    <div class="submit-item rounded-xl p-4 md:p-5">

                                        <div class="flex items-center gap-4">

                                            <div class="number-box flex-shrink-0 w-11 h-11 flex items-center justify-center text-white font-bold text-sm rounded-xl">
                                                {{ $no++ }}
                                            </div>

                                            <a
                                                href="{{ route('submit.show', $proses->id) }}"
                                                class="flex-1 min-w-0"
                                            >

                                                <div class="font-bold text-gray-800 text-sm md:text-base mb-3 truncate">
                                                    {{ $proses->budget_submission_name }}
                                                </div>

                                                <div class="flex flex-wrap items-center gap-2">

                                                    <span class="status-badge px-3 py-1.5 text-xs font-semibold rounded-lg bg-yellow-50 text-yellow-700 border-yellow-200">
                                                        Belum Lengkap
                                                    </span>

                                                    <span class="status-badge px-3 py-1.5 text-xs font-semibold rounded-lg bg-red-50 text-red-700 border-red-200">
                                                        Belum Diverifikasi
                                                    </span>

                                                    <span class="text-xs text-gray-400 flex items-center gap-1 ml-1">

                                                        <svg class="w-3.5 h-3.5"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            viewBox="0 0 24 24">

                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>

                                                        </svg>

                                                        {{ $proses->created_at->diffForHumans() }}

                                                    </span>

                                                </div>

                                            </a>


                                            <div class="flex gap-2 flex-shrink-0">

                                                <a
                                                    href="{{ route('submit.edit', $proses->id) }}"
                                                    class="action-btn edit-btn w-10 h-10 flex items-center justify-center bg-yellow-400 hover:bg-yellow-500 text-white rounded-xl"
                                                    title="Edit"
                                                >

                                                    <svg class="w-4 h-4"
                                                        fill="currentColor"
                                                        viewBox="0 0 20 20">

                                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>

                                                    </svg>

                                                </a>


                                                <form
                                                    action="{{ route('submit.destroy', $proses->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus submit ini?');"
                                                >

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="action-btn delete-btn w-10 h-10 flex items-center justify-center bg-red-500 hover:bg-red-600 text-white rounded-xl"
                                                        title="Hapus"
                                                    >

                                                        <svg class="w-4 h-4"
                                                            fill="currentColor"
                                                            viewBox="0 0 20 20">

                                                            <path fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd"/>

                                                        </svg>

                                                    </button>

                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                @empty

                                    <div class="empty-box rounded-2xl border border-dashed border-gray-300 py-14 text-center">

                                        <div class="w-14 h-14 mx-auto rounded-2xl bg-yellow-50 text-yellow-500 flex items-center justify-center mb-4">

                                            <svg class="w-7 h-7"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>

                                            </svg>

                                        </div>

                                        <p class="text-gray-700 font-semibold">
                                            Belum ada submit dalam proses
                                        </p>

                                    </div>

                                @endforelse


                                <div class="pagination-wrapper pt-3">
                                    {{ $proses_submissions->appends(['tab' => 'proses'])->links() }}
                                </div>

                            </div>

                        </div>


                        {{-- =====================================================
                             TAB 3 : SELESAI
                        ====================================================== --}}
                        <div
                            x-show="tab === 'selesai'"
                            style="display: none;"
                            class="space-y-5"
                        >

                            <div class="flex items-center justify-between gap-4 pb-4 border-b border-gray-200">

                                <div>

                                    <h3 class="text-xl font-bold text-gray-800">
                                        Submit Diverifikasi atau Selesai
                                    </h3>

                                    <p class="text-sm text-gray-500 mt-1">
                                        Pengajuan yang telah selesai diverifikasi
                                    </p>

                                </div>

                                <span class="px-4 py-2 bg-green-50 text-green-700 text-sm font-bold rounded-xl border border-green-100">
                                    {{ $archive_submit->total() }} Item
                                </span>

                            </div>


                            <div class="space-y-3">

                                @php
                                    $no = ($archive_submit->currentPage() - 1) * $archive_submit->perPage() + 1;
                                @endphp

                                @forelse ($archive_submit as $archived)

                                    <div class="submit-item rounded-xl p-4 md:p-5">

                                        <div class="flex items-center gap-4">

                                            <div class="number-box flex-shrink-0 w-11 h-11 flex items-center justify-center text-white font-bold text-sm rounded-xl">
                                                {{ $no++ }}
                                            </div>


                                            <a
                                                href="{{ route('submit.show', $archived->id) }}"
                                                class="flex-1 min-w-0"
                                            >

                                                <div class="font-bold text-gray-800 text-sm md:text-base mb-3 truncate">
                                                    {{ $archived->budget_submission_name }}
                                                </div>

                                                <div class="flex flex-wrap items-center gap-2">

                                                    <span class="status-badge px-3 py-1.5 text-xs font-semibold rounded-lg bg-green-50 text-green-700 border-green-200">
                                                        Selesai
                                                    </span>

                                                    <span class="status-badge px-3 py-1.5 text-xs font-semibold rounded-lg bg-green-50 text-green-700 border-green-200">
                                                        Lengkap
                                                    </span>

                                                    <span class="status-badge px-3 py-1.5 text-xs font-semibold rounded-lg bg-green-50 text-green-700 border-green-200">
                                                        Diverifikasi
                                                    </span>

                                                    <span class="text-xs text-gray-400 flex items-center gap-1 ml-1">

                                                        <svg class="w-3.5 h-3.5"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            viewBox="0 0 24 24">

                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>

                                                        </svg>

                                                        {{ $archived->created_at->diffForHumans() }}

                                                    </span>

                                                </div>

                                            </a>


                                            <div class="flex gap-2 flex-shrink-0">

                                                <a
                                                    href="{{ route('submit.edit', $archived->id) }}"
                                                    class="action-btn edit-btn w-10 h-10 flex items-center justify-center bg-yellow-400 hover:bg-yellow-500 text-white rounded-xl"
                                                    title="Edit"
                                                >

                                                    <svg class="w-4 h-4"
                                                        fill="currentColor"
                                                        viewBox="0 0 20 20">

                                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>

                                                    </svg>

                                                </a>


                                                <form
                                                    action="{{ route('submit.destroy', $archived->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Yakin ingin menghapus submit ini?');"
                                                >

                                                    @csrf
                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="action-btn delete-btn w-10 h-10 flex items-center justify-center bg-red-500 hover:bg-red-600 text-white rounded-xl"
                                                        title="Hapus"
                                                    >

                                                        <svg class="w-4 h-4"
                                                            fill="currentColor"
                                                            viewBox="0 0 20 20">

                                                            <path fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd"/>

                                                        </svg>

                                                    </button>

                                                </form>

                                            </div>

                                        </div>

                                    </div>

                                @empty

                                    <div class="empty-box rounded-2xl border border-dashed border-gray-300 py-14 text-center">

                                        <div class="w-14 h-14 mx-auto rounded-2xl bg-green-50 text-green-500 flex items-center justify-center mb-4">

                                            <svg class="w-7 h-7"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>

                                            </svg>

                                        </div>

                                        <p class="text-gray-700 font-semibold">
                                            Belum ada submit yang selesai
                                        </p>

                                    </div>

                                @endforelse


                                <div class="pagination-wrapper pt-3">
                                    {{ $archive_submit->appends(['tab' => 'selesai'])->links() }}
                                </div>

                            </div>

                        </div>


                        {{-- =====================================================
                             TAB 4 : ARSIP
                        ====================================================== --}}
                        <div
                            x-show="tab === 'arsip'"
                            style="display: none;"
                            class="space-y-5"
                        >

                            <div class="flex items-center justify-between gap-4 pb-4 border-b border-gray-200">

                                <div>

                                    <h3 class="text-xl font-bold text-gray-800">
                                        Submit Diarsipkan
                                    </h3>

                                    <p class="text-sm text-gray-500 mt-1">
                                        Daftar pengajuan yang telah masuk arsip
                                    </p>

                                </div>

                                <span class="px-4 py-2 bg-blue-50 text-blue-700 text-sm font-bold rounded-xl border border-blue-100">
                                    {{ $arsip_submissions->total() }} Item
                                </span>

                            </div>


                            <div class="space-y-3">

                                @php
                                    $no = ($arsip_submissions->currentPage() - 1) * $arsip_submissions->perPage() + 1;
                                @endphp

                                @forelse ($arsip_submissions as $arsip)

                                    <div class="submit-item rounded-xl p-4 md:p-5">

                                        <div class="flex items-center gap-4">

                                            <div class="number-box flex-shrink-0 w-11 h-11 flex items-center justify-center text-white font-bold text-sm rounded-xl">
                                                {{ $no++ }}
                                            </div>


                                            <a
                                                href="{{ route('submit.show', $arsip->id) }}"
                                                class="flex-1 min-w-0"
                                            >

                                                <div class="font-bold text-gray-800 text-sm md:text-base mb-3 truncate">
                                                    {{ $arsip->budget_submission_name }}
                                                </div>


                                                <div class="flex flex-wrap items-center gap-2">

                                                    <span class="status-badge px-3 py-1.5 text-xs font-semibold rounded-lg bg-blue-50 text-blue-700 border-blue-200">
                                                        Diarsipkan
                                                    </span>

                                                    <span class="text-xs text-gray-400 flex items-center gap-1 ml-1">

                                                        <svg class="w-3.5 h-3.5"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            viewBox="0 0 24 24">

                                                            <path stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>

                                                        </svg>

                                                        {{ $arsip->created_at->diffForHumans() }}

                                                    </span>

                                                </div>

                                            </a>

                                        </div>

                                    </div>

                                @empty

                                    <div class="empty-box rounded-2xl border border-dashed border-gray-300 py-14 text-center">

                                        <div class="w-14 h-14 mx-auto rounded-2xl bg-blue-50 text-blue-500 flex items-center justify-center mb-4">

                                            <svg class="w-7 h-7"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="1.8"
                                                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>

                                            </svg>

                                        </div>

                                        <p class="text-gray-700 font-semibold">
                                            Belum ada submit yang diarsipkan
                                        </p>

                                    </div>

                                @endforelse


                                <div class="pagination-wrapper pt-3">
                                    {{ $arsip_submissions->appends(['tab' => 'arsip'])->links() }}
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>