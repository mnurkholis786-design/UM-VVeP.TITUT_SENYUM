<nav class="app-navigation">

    <div class="app-navigation-inner">

        {{-- =====================================================
             LEFT SIDE
             HEADER DARI MASING-MASING HALAMAN
        ====================================================== --}}
        <div class="app-navigation-left">

            @isset($header)
                <div class="app-header-content">
                    {{ $header }}
                </div>
            @endisset

        </div>


        {{-- =====================================================
             RIGHT SIDE
             NOTIFICATION
        ====================================================== --}}
        <div class="app-navigation-right">

            @auth

                @php
                    $unreadCount = Auth::user()
                        ->notifications()
                        ->where('is_read', false)
                        ->count();
                @endphp

                <a
                    href="{{ route('notifications.index') }}"
                    class="app-notification"
                    aria-label="Notifikasi"
                >

                    <svg
                        class="app-notification-icon"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                        />
                    </svg>

                    @if ($unreadCount > 0)

                        <span class="app-notification-badge">
                            {{ $unreadCount }}
                        </span>

                    @endif

                </a>

            @endauth

        </div>

    </div>

</nav>


<style>

/* =========================================================
   HEADER GLOBAL
========================================================= */

.app-navigation {
    position: sticky;
    top: 0;

    width: 100%;
    height: 82px;

    z-index: 90;

    background: #ffffff;

    border-bottom: 1px solid #e5e7eb;

    box-shadow:
        0 4px 14px rgba(15, 23, 42, 0.04);
}


/* =========================================================
   HEADER INNER
========================================================= */

.app-navigation-inner {
    width: 100%;
    height: 100%;

    display: flex;
    align-items: center;
    justify-content: space-between;

    padding-left: 28px;
    padding-right: 28px;

    box-sizing: border-box;
}


/* =========================================================
   LEFT
========================================================= */

.app-navigation-left {
    flex: 1;
    min-width: 0;

    display: flex;
    align-items: center;
}


/* =========================================================
   HEADER CONTENT
   Ini menerima isi dari <x-slot name="header">
========================================================= */

.app-header-content {
    display: flex;
    align-items: center;

    min-width: 0;

    width: 100%;
}


/* =========================================================
   JANGAN UBAH ISI HEADER HALAMAN
   Icon, title dan subtitle tetap dari halaman masing-masing
========================================================= */

.app-header-content > div {
    display: flex;
    align-items: center;

    min-width: 0;
}


/* =========================================================
   TITLE WRAPPER
========================================================= */

.app-header-content h2 {
    margin: 0;

    font-family: 'Poppins', sans-serif !important;

    color: #1e293b;

    font-size: 20px;

    line-height: 1.25;

    font-weight: 700;

    letter-spacing: -0.02em;
}


/* =========================================================
   SUBTITLE
========================================================= */

.app-header-content p {
    margin-top: 3px;

    margin-bottom: 0;

    font-family: 'Poppins', sans-serif !important;

    color: #64748b;

    font-size: 12px;

    line-height: 1.5;

    font-weight: 400;
}


/* =========================================================
   RIGHT SIDE
========================================================= */

.app-navigation-right {
    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-left: auto;

    height: 100%;
}


/* =========================================================
   NOTIFICATION
========================================================= */

.app-notification {
    position: relative;

    width: 48px;
    height: 48px;

    display: flex;
    align-items: center;
    justify-content: center;

    color: #4f46e5;

    text-decoration: none;

    border-radius: 14px;

    transition:
        background .2s ease,
        color .2s ease,
        transform .2s ease;
}


.app-notification:hover {
    background: rgba(79, 70, 229, 0.08);

    color: #4338ca;

    transform: translateY(-1px);
}


.app-notification:active {
    transform: translateY(0);
}


/* =========================================================
   BELL ICON
========================================================= */

.app-notification-icon {
    width: 25px;
    height: 25px;

    stroke-width: 1.9;
}


/* =========================================================
   NOTIFICATION BADGE
========================================================= */

.app-notification-badge {
    position: absolute;

    top: 3px;
    right: 1px;

    min-width: 20px;
    height: 20px;

    padding: 0 5px;

    display: flex;
    align-items: center;
    justify-content: center;

    box-sizing: border-box;

    border-radius: 999px;

    background: #ef4444;

    color: #ffffff;

    font-size: 10px;
    line-height: 1;

    font-weight: 700;

    border: 2px solid #ffffff;

    box-shadow:
        0 3px 8px rgba(239, 68, 68, 0.25);
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 768px) {

    .app-navigation {
        height: 76px;
    }

    .app-navigation-inner {
        padding-left: 18px;
        padding-right: 18px;
    }

    .app-notification {
        width: 44px;
        height: 44px;
    }

    .app-notification-icon {
        width: 23px;
        height: 23px;
    }

    .app-header-content h2 {
        font-size: 18px;
    }

    .app-header-content p {
        font-size: 11px;
    }

}


/* =========================================================
   SMALL MOBILE
========================================================= */

@media (max-width: 480px) {

    .app-navigation {
        height: 70px;
    }

    .app-navigation-inner {
        padding-left: 14px;
        padding-right: 14px;
    }

    .app-header-content h2 {
        font-size: 16px;
    }

    .app-header-content p {
        font-size: 10px;
    }

    .app-notification {
        width: 42px;
        height: 42px;
    }

    .app-notification-icon {
        width: 22px;
        height: 22px;
    }

}

</style>