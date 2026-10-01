<aside class="app-sidebar">

    {{-- =========================================================
        BACKGROUND DECORATION
    ========================================================== --}}
    <div class="sidebar-grid"></div>
    <div class="sidebar-glow sidebar-glow-top"></div>
    <div class="sidebar-glow sidebar-glow-bottom"></div>

    {{-- =========================================================
        LOGO
    ========================================================== --}}
    <div class="sidebar-logo">

        <a href="{{ route('dashboard') }}" class="sidebar-logo-link">

            <div class="sidebar-logo-image">
                <img
                    src="{{ asset('images/Logo.png') }}"
                    alt="VVeP App"
                >
            </div>

            <div class="sidebar-logo-text">
                <div class="sidebar-app-name">
                    VVeP App
                </div>

                <div class="sidebar-role">
                    {{ Auth::user()->role }}
                </div>
            </div>

        </a>

    </div>


    {{-- =========================================================
        CONTENT
    ========================================================== --}}
    <div class="sidebar-content">

        @php
            use Illuminate\Support\Facades\Auth;
            use App\Models\Notification;

            $role = Auth::user()->role;
            $privileged = Auth::user()->is_privileged;

            /*
            |--------------------------------------------------------------------------
            | DASHBOARD
            |--------------------------------------------------------------------------
            */
            $roleDashboard = match ($role) {
                'Admin' => route('admin.dashboard'),
                'Keuangan' => route('keuangan.dashboard'),
                'Bendahara' => route('bendahara.dashboard'),
                'PPSPM' => route('PPSPM.dashboard'),
                'Kepala Kantor TVRI' => route('kepala.dashboard'),
                default => route('user.dashboard'),
            };

            /*
            |--------------------------------------------------------------------------
            | ENVIRONMENT
            |--------------------------------------------------------------------------
            */
            $roleEnvironment = match ($role) {
                'Admin' => route('admin.envi'),
                default => route('user.dashboard'),
            };

            /*
            |--------------------------------------------------------------------------
            | ARSIP
            |--------------------------------------------------------------------------
            */
            $roleInputArsip =
                in_array(
                    $role,
                    [
                        'Admin',
                        'Bendahara',
                        'Keuangan',
                        'Kepala Kantor TVRI',
                        'PPSPM'
                    ]
                ) || $privileged
                ? route('cabinet.index')
                : '#';

            /*
            |--------------------------------------------------------------------------
            | USER
            |--------------------------------------------------------------------------
            */
            $roleKelolaUser =
                $role === 'Admin'
                ? route('account.index')
                : '#';

            /*
            |--------------------------------------------------------------------------
            | PENGAJUAN
            |--------------------------------------------------------------------------
            */
            $pengajuan =
                in_array($role, ['Admin', 'Keuangan'])
                ? '#'
                : route('submit.index');

            /*
            |--------------------------------------------------------------------------
            | MONITORING
            |--------------------------------------------------------------------------
            */
            $worklist =
                in_array($role, ['Admin', 'Keuangan'])
                ? '#'
                : route('user.monitoring');

            /*
            |--------------------------------------------------------------------------
            | DIGITAL ARSIP
            |--------------------------------------------------------------------------
            */
            $roleDigitalArsip =
                in_array($role, ['Keuangan', 'Bendahara'])
                ? route('digital.index')
                : '#';

            /*
            |--------------------------------------------------------------------------
            | NOTIFICATION
            |--------------------------------------------------------------------------
            */
            $unreadCount = Notification::where(
                'user_id',
                Auth::id()
            )
            ->where('is_read', false)
            ->count();

            $notificationRoute = route('notifications.index');

            /*
            |--------------------------------------------------------------------------
            | REPORT
            |--------------------------------------------------------------------------
            */
            $roleReport = match ($role) {
                'Admin' => route('admin.report'),
                'Bendahara' => route('bendahara.report'),
                'Keuangan' => route('keuangan.report'),
                'Kepala Kantor TVRI' => route('kepala.report'),
                default => route('user.report'),
            };


            /*
            |--------------------------------------------------------------------------
            | ICONS
            |--------------------------------------------------------------------------
            */
            $icons = [

                'Dashboard' =>
                    'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',

                'Report' =>
                    'M9 17v-2m3 2v-4m3 4v-6m2 10H5a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2z',

                'Setting Environment' =>
                    'M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8v2m0-2a2 2 0 100 4m0-4a2 2 0 110 4m12-2v2m0-2a2 2 0 100 4m0-4a2 2 0 110 4',

                'Input Arsip' =>
                    'M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',

                'Kelola User' =>
                    'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5 3.75V14.25m0 3.75h-6m6 0h-6m0 0V8.25',

                'Digital Arsip' =>
                    'M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4',

                'Pengajuan' =>
                    'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',

                'Monitoring' =>
                    'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2',

                'Notifikasi' =>
                    'M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0a3 3 0 11-6 0h6z',

                'Profile' =>
                    'M5.121 17.804A13.937 13.937 0 0112 15c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0z',

                'Logout' =>
                    'M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1',
            ];


            /*
            |--------------------------------------------------------------------------
            | MENU
            |--------------------------------------------------------------------------
            */
            $menuItems = [];

            if ($role === 'Admin') {

                $menuItems = [

                    [
                        'label' => 'Dashboard',
                        'href' => $roleDashboard,
                        'icon' => $icons['Dashboard']
                    ],

                    [
                        'label' => 'Setting Environment',
                        'href' => $roleEnvironment,
                        'icon' => $icons['Setting Environment']
                    ],

                    [
                        'label' => 'Arsip',
                        'href' => $roleInputArsip,
                        'icon' => $icons['Input Arsip']
                    ],

                    [
                        'label' => 'Kelola User',
                        'href' => $roleKelolaUser,
                        'icon' => $icons['Kelola User']
                    ],

                    [
                        'label' => 'Report',
                        'href' => $roleReport,
                        'icon' => $icons['Report']
                    ],
                ];

            } elseif ($role === 'Keuangan') {

                $menuItems = [

                    [
                        'label' => 'Dashboard',
                        'href' => $roleDashboard,
                        'icon' => $icons['Dashboard']
                    ],

                    [
                        'label' => 'Pengajuan',
                        'href' => route('verification.index'),
                        'icon' => $icons['Pengajuan']
                    ],

                    [
                        'label' => 'Arsip',
                        'href' => $roleInputArsip,
                        'icon' => $icons['Input Arsip']
                    ],

                    [
                        'label' => 'Notifikasi',
                        'href' => $notificationRoute,
                        'icon' => $icons['Notifikasi'],
                        'badge' => $unreadCount
                    ],

                    [
                        'label' => 'Report',
                        'href' => $roleReport,
                        'icon' => $icons['Report']
                    ],
                ];

            } elseif ($role === 'Bendahara') {

                $menuItems = [

                    [
                        'label' => 'Dashboard',
                        'href' => $roleDashboard,
                        'icon' => $icons['Dashboard']
                    ],

                    [
                        'label' => 'Pengajuan',
                        'href' => route('final.index'),
                        'icon' => $icons['Pengajuan']
                    ],

                    [
                        'label' => 'Arsip',
                        'href' => $roleInputArsip,
                        'icon' => $icons['Input Arsip']
                    ],

                    [
                        'label' => 'Notifikasi',
                        'href' => $notificationRoute,
                        'icon' => $icons['Notifikasi'],
                        'badge' => $unreadCount
                    ],

                    [
                        'label' => 'Report',
                        'href' => $roleReport,
                        'icon' => $icons['Report']
                    ],
                ];

            } elseif ($role === 'PPSPM') {

                $menuItems = [

                    [
                        'label' => 'Dashboard',
                        'href' => $roleDashboard,
                        'icon' => $icons['Dashboard']
                    ],

                    [
                        'label' => 'Pengajuan',
                        'href' => route('validation.index'),
                        'icon' => $icons['Pengajuan']
                    ],

                    [
                        'label' => 'Arsip',
                        'href' => $roleInputArsip,
                        'icon' => $icons['Input Arsip']
                    ],

                    [
                        'label' => 'Notifikasi',
                        'href' => $notificationRoute,
                        'icon' => $icons['Notifikasi'],
                        'badge' => $unreadCount
                    ],
                ];

            } elseif ($role === 'Kepala Kantor TVRI') {

                $menuItems = [

                    [
                        'label' => 'Dashboard',
                        'href' => $roleDashboard,
                        'icon' => $icons['Dashboard']
                    ],

                    [
                        'label' => 'Arsip',
                        'href' => $roleInputArsip,
                        'icon' => $icons['Input Arsip']
                    ],

                    [
                        'label' => 'Report',
                        'href' => $roleReport,
                        'icon' => $icons['Report']
                    ],
                ];

            } else {

                if ($privileged) {

                    $menuItems = [

                        [
                            'label' => 'Dashboard',
                            'href' => $roleDashboard,
                            'icon' => $icons['Dashboard']
                        ],

                        [
                            'label' => 'Pengajuan',
                            'href' => $pengajuan,
                            'icon' => $icons['Pengajuan']
                        ],

                        [
                            'label' => 'Monitoring',
                            'href' => $worklist,
                            'icon' => $icons['Monitoring']
                        ],

                        [
                            'label' => 'Arsip',
                            'href' => $roleInputArsip,
                            'icon' => $icons['Input Arsip']
                        ],

                        [
                            'label' => 'Notifikasi',
                            'href' => $notificationRoute,
                            'icon' => $icons['Notifikasi'],
                            'badge' => $unreadCount
                        ],

                        [
                            'label' => 'Report',
                            'href' => $roleReport,
                            'icon' => $icons['Report']
                        ],
                    ];

                } else {

                    $menuItems = [

                        [
                            'label' => 'Dashboard',
                            'href' => $roleDashboard,
                            'icon' => $icons['Dashboard']
                        ],

                        [
                            'label' => 'Pengajuan',
                            'href' => $pengajuan,
                            'icon' => $icons['Pengajuan']
                        ],

                        [
                            'label' => 'Monitoring',
                            'href' => $worklist,
                            'icon' => $icons['Monitoring']
                        ],

                        [
                            'label' => 'Notifikasi',
                            'href' => $notificationRoute,
                            'icon' => $icons['Notifikasi'],
                            'badge' => $unreadCount
                        ],

                        [
                            'label' => 'Report',
                            'href' => $roleReport,
                            'icon' => $icons['Report']
                        ],
                    ];
                }
            }
        @endphp


        {{-- =====================================================
             MENU UTAMA
        ====================================================== --}}
        <div class="sidebar-section-title">
            <span class="section-line"></span>
            <span>MENU UTAMA</span>
        </div>


        <nav class="sidebar-menu">

            @foreach ($menuItems as $item)

                @php
                    $isActive =
                        request()->url() === $item['href']
                        && $item['href'] !== '#';

                    $isDisabled =
                        $item['href'] === '#';
                @endphp

                <a
                    href="{{ $item['href'] }}"
                    @if ($isDisabled)
                        onclick="return false;"
                    @endif
                    class="sidebar-menu-item
                        {{ $isActive ? 'sidebar-menu-active' : '' }}
                        {{ $isDisabled ? 'sidebar-menu-disabled' : '' }}"
                >

                    <div class="sidebar-menu-icon">

                        <svg
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="{{ $item['icon'] }}"
                            />
                        </svg>

                    </div>


                    <span class="sidebar-menu-label">
                        {{ $item['label'] }}
                    </span>


                    @if (isset($item['badge']) && $item['badge'] > 0)

                        <span class="sidebar-notification-badge">
                            {{ $item['badge'] }}
                        </span>

                    @endif


                    @if (!$isDisabled)

                        <span class="sidebar-arrow">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5l7 7-7 7"
                                />
                            </svg>

                        </span>

                    @else

                        <span class="sidebar-soon">
                            Soon
                        </span>

                    @endif

                </a>

            @endforeach

        </nav>


        {{-- =====================================================
             ACCOUNT
        ====================================================== --}}
        <div class="sidebar-section-title sidebar-account-title">
            <span class="section-line"></span>
            <span>ACCOUNT</span>
        </div>


        {{-- PROFILE --}}
        @php
            $profileActive =
                request()->url() === route('profile.edit');
        @endphp

        <a
            href="{{ route('profile.edit') }}"
            class="sidebar-menu-item {{ $profileActive ? 'sidebar-menu-active' : '' }}"
        >

            <div class="sidebar-menu-icon">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="{{ $icons['Profile'] }}"
                    />
                </svg>

            </div>

            <span class="sidebar-menu-label">
                Profile
            </span>

            <span class="sidebar-arrow">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 5l7 7-7 7"
                    />
                </svg>

            </span>

        </a>


        {{-- LOGOUT --}}
        <form
            method="POST"
            action="{{ route('logout') }}"
            class="sidebar-logout-form"
        >

            @csrf

            <button
                type="submit"
                class="sidebar-menu-item sidebar-logout"
            >

                <div class="sidebar-menu-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="{{ $icons['Logout'] }}"
                        />
                    </svg>

                </div>

                <span class="sidebar-menu-label">
                    Logout
                </span>

            </button>

        </form>

    </div>


    {{-- =========================================================
        USER CARD
    ========================================================== --}}
    <div class="sidebar-user-card">

        <div class="sidebar-user-avatar">

            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

            <span class="sidebar-online"></span>

        </div>

        <div class="sidebar-user-info">

            <div class="sidebar-user-name">
                {{ Auth::user()->name }}
            </div>

            <div class="sidebar-user-email">
                {{ Auth::user()->email }}
            </div>

        </div>

    </div>

</aside>


<style>

/* ============================================================
   SIDEBAR GLOBAL
============================================================ */

.app-sidebar {

    --sidebar-width: 250px;

    position: fixed;

    top: 0;
    left: 0;

    width: var(--sidebar-width);

    height: 100vh;

    z-index: 1000;

    display: flex;

    flex-direction: column;

    overflow: hidden;

    color: #ffffff;

    font-family: 'Poppins', sans-serif;

    background:
        linear-gradient(
            180deg,
            #063f91 0%,
            #06347d 45%,
            #03275f 100%
        );

    border-right: 1px solid rgba(255,255,255,.12);

    box-shadow:
        12px 0 35px rgba(15, 61, 120, .18);

}


.app-sidebar::before {

    content: "";

    position: absolute;

    top: 0;
    left: 0;

    width: 100%;
    height: 3px;

    background:
        linear-gradient(
            90deg,
            #38bdf8,
            #60a5fa,
            #22d3ee,
            #38bdf8
        );

    box-shadow:
        0 0 18px rgba(56,189,248,.9);

    z-index: 10;

}


.sidebar-grid {

    position: absolute;

    inset: 0;

    opacity: .12;

    background-image:
        linear-gradient(
            rgba(255,255,255,.12) 1px,
            transparent 1px
        ),
        linear-gradient(
            90deg,
            rgba(255,255,255,.12) 1px,
            transparent 1px
        );

    background-size: 28px 28px;

    pointer-events: none;

}


.sidebar-glow {

    position: absolute;

    border-radius: 999px;

    filter: blur(40px);

    pointer-events: none;

}

.sidebar-glow-top {

    width: 170px;
    height: 170px;

    top: -90px;
    right: -70px;

    background: rgba(0, 174, 255, .25);

}

.sidebar-glow-bottom {

    width: 180px;
    height: 180px;

    bottom: -100px;
    left: -80px;

    background: rgba(37, 99, 235, .22);

}


/* ============================================================
   LOGO
============================================================ */

.sidebar-logo {

    position: relative;

    z-index: 2;

    height: 88px;

    flex-shrink: 0;

    padding: 0 18px;

    display: flex;

    align-items: center;

    border-bottom:
        1px solid rgba(255,255,255,.13);

    background:
        linear-gradient(
            180deg,
            rgba(255,255,255,.08),
            rgba(255,255,255,.015)
        );

}


.sidebar-logo-link {

    width: 100%;

    display: flex;

    align-items: center;

    gap: 12px;

    text-decoration: none;

}


.sidebar-logo-image {

    width: 48px;
    height: 48px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 15px;

    background: rgba(255,255,255,.96);

    border:
        1px solid rgba(255,255,255,.8);

    box-shadow:
        0 8px 18px rgba(0,0,0,.22),
        inset 0 1px 2px rgba(255,255,255,.9);

    transition:
        transform .25s ease,
        box-shadow .25s ease;

}


.sidebar-logo-image img {

    width: 38px;
    height: 38px;

    object-fit: contain;

}


.sidebar-logo-link:hover .sidebar-logo-image {

    transform:
        translateY(-2px)
        rotate(-2deg);

    box-shadow:
        0 12px 25px rgba(0,0,0,.28),
        0 0 20px rgba(56,189,248,.25);

}


.sidebar-logo-text {

    min-width: 0;

}


.sidebar-app-name {

    color: #ffffff;

    font-size: 18px;

    font-weight: 800;

    line-height: 1.1;

    letter-spacing: -.03em;

}


.sidebar-role {

    margin-top: 5px;

    color: rgba(219,234,254,.78);

    font-size: 11px;

    font-weight: 500;

}


/* ============================================================
   CONTENT
============================================================ */

.sidebar-content {

    position: relative;

    z-index: 2;

    flex: 1;

    min-height: 0;

    padding: 22px 14px 14px;

    overflow-y: auto;

    overflow-x: hidden;

}


.sidebar-content::-webkit-scrollbar {

    width: 4px;

}

.sidebar-content::-webkit-scrollbar-track {

    background: transparent;

}

.sidebar-content::-webkit-scrollbar-thumb {

    background: rgba(255,255,255,.18);

    border-radius: 999px;

}


/* ============================================================
   SECTION TITLE
============================================================ */

.sidebar-section-title {

    display: flex;

    align-items: center;

    gap: 7px;

    padding: 0 8px;

    margin-bottom: 11px;

    color: rgba(191,219,254,.65);

    font-size: 10px;

    font-weight: 800;

    letter-spacing: .16em;

}


.section-line {

    width: 4px;
    height: 4px;

    border-radius: 50%;

    background: #38bdf8;

    box-shadow:
        0 0 8px rgba(56,189,248,.8);

}


/* ============================================================
   MENU
============================================================ */

.sidebar-menu {

    display: flex;

    flex-direction: column;

    gap: 7px;

}


.sidebar-menu-item {

    position: relative;

    width: 100%;

    min-height: 50px;

    display: flex;

    align-items: center;

    gap: 11px;

    padding: 8px 10px;

    box-sizing: border-box;

    border-radius: 15px;

    border: 1px solid transparent;

    color: rgba(255,255,255,.84);

    background: transparent;

    text-decoration: none;

    cursor: pointer;

    transition:
        transform .22s ease,
        background .22s ease,
        border .22s ease,
        box-shadow .22s ease;

}


/* ============================================================
   ICON
============================================================ */

.sidebar-menu-icon {

    width: 38px;
    height: 38px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 12px;

    color: #dbeafe;

    background:
        linear-gradient(
            145deg,
            rgba(255,255,255,.12),
            rgba(255,255,255,.035)
        );

    border:
        1px solid rgba(255,255,255,.10);

    box-shadow:
        inset 0 1px 1px rgba(255,255,255,.08),
        0 5px 12px rgba(0,0,0,.10);

    transition:
        transform .22s ease,
        background .22s ease,
        color .22s ease,
        box-shadow .22s ease;

}


.sidebar-menu-icon svg {

    width: 19px;
    height: 19px;

}


/* ============================================================
   LABEL
============================================================ */

.sidebar-menu-label {

    flex: 1;

    min-width: 0;

    /* DIBESARKAN DARI 12px MENJADI 13px */
    font-size: 13px;

    font-weight: 600;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;

    text-align: left;

}


/* ============================================================
   ARROW
============================================================ */

.sidebar-arrow {

    display: flex;

    align-items: center;
    justify-content: center;

    opacity: .45;

    transition:
        transform .2s ease,
        opacity .2s ease;

}


.sidebar-arrow svg {

    width: 15px;
    height: 15px;

}


/* ============================================================
   HOVER
============================================================ */

.sidebar-menu-item:hover {

    transform: translateX(3px);

    color: #ffffff;

    background:
        linear-gradient(
            90deg,
            rgba(37,99,235,.35),
            rgba(14,165,233,.16)
        );

    border-color:
        rgba(96,165,250,.22);

    box-shadow:
        0 8px 20px rgba(0,0,0,.13),
        inset 0 1px rgba(255,255,255,.07);

}


.sidebar-menu-item:hover .sidebar-menu-icon {

    color: #ffffff;

    background:
        linear-gradient(
            145deg,
            #2389f5,
            #0757c9
        );

    border-color:
        rgba(255,255,255,.25);

    box-shadow:
        0 7px 16px rgba(14,116,220,.35);

    transform:
        translateY(-1px);

}


.sidebar-menu-item:hover .sidebar-arrow {

    opacity: 1;

    transform:
        translateX(3px);

}


/* ============================================================
   ACTIVE
============================================================ */

.sidebar-menu-active {

    color: #ffffff !important;

    background:
        linear-gradient(
            100deg,
            #1677e8 0%,
            #0866d8 55%,
            #0759c4 100%
        ) !important;

    border-color:
        rgba(125,211,252,.45) !important;

    box-shadow:
        0 10px 24px rgba(0,93,210,.34),
        inset 0 1px 0 rgba(255,255,255,.22);

}


.sidebar-menu-active::before {

    content: "";

    position: absolute;

    left: -1px;

    top: 9px;
    bottom: 9px;

    width: 4px;

    border-radius: 0 8px 8px 0;

    background: #67e8f9;

    box-shadow:
        0 0 12px rgba(103,232,249,.9);

}


.sidebar-menu-active .sidebar-menu-icon {

    color: #ffffff;

    background:
        linear-gradient(
            145deg,
            rgba(255,255,255,.28),
            rgba(255,255,255,.08)
        );

    border-color:
        rgba(255,255,255,.3);

    box-shadow:
        0 5px 15px rgba(0,0,0,.18);

}


.sidebar-menu-active .sidebar-arrow {

    opacity: 1;

}


/* ============================================================
   DISABLED
============================================================ */

.sidebar-menu-disabled {

    opacity: .45;

    cursor: not-allowed;

}

.sidebar-menu-disabled:hover {

    transform: none;

    background: transparent;

    border-color: transparent;

    box-shadow: none;

}


/* ============================================================
   SOON
============================================================ */

.sidebar-soon {

    padding: 3px 7px;

    border-radius: 7px;

    color: rgba(255,255,255,.55);

    background: rgba(255,255,255,.08);

    font-size: 8px;

    font-weight: 700;

}


/* ============================================================
   NOTIFICATION BADGE
============================================================ */

.sidebar-notification-badge {

    min-width: 21px;
    height: 21px;

    padding: 0 6px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 999px;

    background:
        linear-gradient(
            135deg,
            #ff5b70,
            #ef233c
        );

    color: white;

    font-size: 9px;

    font-weight: 800;

    box-shadow:
        0 4px 10px rgba(239,35,60,.35);

}


/* ============================================================
   ACCOUNT
============================================================ */

.sidebar-account-title {

    margin-top: 28px;

}


/* ============================================================
   LOGOUT
============================================================ */

.sidebar-logout-form {

    width: 100%;

    margin-top: 2px;

}


.sidebar-logout {

    width: 100%;

    margin: 0;

    padding: 8px 10px;

    display: flex;

    align-items: center;

    justify-content: flex-start;

    gap: 11px;

    text-align: left;

    border: 0;

    outline: none;

    font-family: inherit;

    font-size: inherit;

    line-height: normal;

    appearance: none;

    -webkit-appearance: none;

}


.sidebar-logout .sidebar-menu-label {

    flex: 1;

    text-align: left;

}


.sidebar-logout .sidebar-menu-icon {

    color: #fb7185;

}


.sidebar-logout:hover {

    color: #fecdd3;

    background:
        rgba(239,68,68,.12);

    border-color:
        rgba(248,113,113,.15);

}


.sidebar-logout:hover .sidebar-menu-icon {

    color: #ffffff;

    background:
        linear-gradient(
            145deg,
            #ef4444,
            #be123c
        );

}


/* ============================================================
   USER CARD
============================================================ */

.sidebar-user-card {

    position: relative;

    z-index: 5;

    flex-shrink: 0;

    margin: 10px 12px 14px;

    padding: 10px;

    display: flex;

    align-items: center;

    gap: 10px;

    border-radius: 16px;

    background:
        linear-gradient(
            145deg,
            rgba(255,255,255,.13),
            rgba(255,255,255,.045)
        );

    border:
        1px solid rgba(255,255,255,.12);

    box-shadow:
        0 10px 25px rgba(0,0,0,.16),
        inset 0 1px 1px rgba(255,255,255,.08);

    backdrop-filter: blur(10px);

}


.sidebar-user-avatar {

    position: relative;

    width: 38px;
    height: 38px;

    flex-shrink: 0;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 12px;

    color: #ffffff;

    font-size: 15px;

    font-weight: 800;

    background:
        linear-gradient(
            135deg,
            #2563eb,
            #7c3aed
        );

    box-shadow:
        0 7px 15px rgba(37,99,235,.35);

}


.sidebar-online {

    position: absolute;

    right: -2px;
    bottom: -2px;

    width: 9px;
    height: 9px;

    border-radius: 50%;

    background: #22c55e;

    border: 2px solid #06347d;

    box-shadow:
        0 0 8px rgba(34,197,94,.75);

}


.sidebar-user-info {

    min-width: 0;

    flex: 1;

}


.sidebar-user-name {

    color: #ffffff;

    font-size: 11px;

    font-weight: 700;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;

}


.sidebar-user-email {

    margin-top: 2px;

    color: rgba(219,234,254,.6);

    font-size: 9px;

    white-space: nowrap;

    overflow: hidden;

    text-overflow: ellipsis;

}


/* ============================================================
   DESKTOP
============================================================ */

@media (min-width: 769px) {

    .app-sidebar {

        width: 250px !important;

        min-width: 250px !important;

        max-width: 250px !important;

    }

}


/* ============================================================
   MOBILE
============================================================ */

@media (max-width: 768px) {

    .app-sidebar {

        width: 230px;

        min-width: 230px;

    }

}


/* ============================================================
   BOX SIZING
============================================================ */

.app-sidebar,
.app-sidebar * {

    box-sizing: border-box;

}

</style>