<x-app-layout>
    <x-slot name="header">
        <div class="profile-header-container">
            <div class="profile-header-icon-box">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <div class="profile-header-text">
                <h2 class="profile-header-title">Edit Profile</h2>
                <p class="profile-header-subtitle">Kelola informasi dan keamanan akun Anda dalam satu kendali penuh</p>
            </div>
        </div>
    </x-slot>

    <div class="profile-workspace">
        {{-- 3D Dynamic Background Orbs & Grid Layers --}}
        <div class="profile-grid-bg"></div>
        <div class="profile-orb profile-orb-alpha"></div>
        <div class="profile-orb profile-orb-beta"></div>
        <div class="profile-orb profile-orb-gamma"></div>

        <div class="profile-layout-wrapper">

            {{-- 3D INTRO BANNER CARD --}}
            <div class="profile-banner-card">
                <div class="profile-banner-icon-wrapper">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div class="profile-banner-content">
                    <div class="profile-banner-row">
                        <h1>Account Settings & Security</h1>
                        <span class="profile-active-badge">
                            <span class="profile-active-dot"></span>
                            System Secure
                        </span>
                    </div>
                    <p>Sesuaikan kredensial akun, perbarui kata sandi, dan kelola preferensi privasi Anda dengan aman.</p>
                </div>
            </div>

            {{-- MASTER 3D ELEVATION CONTAINER --}}
            <div class="profile-master-card">
                
                {{-- Glowing Top Neon Line Accent --}}
                <div class="profile-card-top-glow"></div>

                {{-- INTERACTIVE 3D TABS NAVIGATION --}}
                <div class="profile-navigation-strip">
                    <nav class="profile-nav-tabs" aria-label="Profile Settings Navigation">

                        {{-- TAB 1: PROFILE --}}
                        <button type="button" class="profile-navigation-tab active" data-tab="profile">
                            <span class="profile-nav-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </span>
                            <span class="profile-nav-text-group">
                                <span class="profile-nav-title">Profile</span>
                                <span class="profile-nav-desc">Informasi akun</span>
                            </span>
                            <span class="profile-nav-bar"></span>
                        </button>

                        {{-- TAB 2: SECURITY --}}
                        <button type="button" class="profile-navigation-tab" data-tab="security">
                            <span class="profile-nav-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </span>
                            <span class="profile-nav-text-group">
                                <span class="profile-nav-title">Security</span>
                                <span class="profile-nav-desc">Keamanan & Password</span>
                            </span>
                            <span class="profile-nav-bar"></span>
                        </button>

                        {{-- TAB 3: DANGER ZONE --}}
                        <button type="button" class="profile-navigation-tab danger-action-tab" data-tab="danger">
                            <span class="profile-nav-icon">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                                </svg>
                            </span>
                            <span class="profile-nav-text-group">
                                <span class="profile-nav-title">Danger Zone</span>
                                <span class="profile-nav-desc">Hapus akun permanen</span>
                            </span>
                            <span class="profile-nav-bar"></span>
                        </button>

                    </nav>
                </div>

                {{-- CONTENT VIEW PANELS --}}
                <div class="profile-content-viewport">
                    
                    {{-- VIEWPANEL 1: PROFILE --}}
                    <div id="tab-profile" class="profile-panel-pane active-pane">
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    {{-- VIEWPANEL 2: SECURITY --}}
                    <div id="tab-security" class="profile-panel-pane hidden-pane">
                        @include('profile.partials.update-password-form')
                    </div>

                    {{-- VIEWPANEL 3: DANGER --}}
                    <div id="tab-danger" class="profile-panel-pane hidden-pane">
                        @include('profile.partials.delete-user-form')
                    </div>

                </div>

            </div>

        </div>
    </div>

    {{-- EXHAUSTIVE INTERACTIVE TAB ENGINE --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navTabs = document.querySelectorAll('.profile-navigation-tab');
            const panelPanes = document.querySelectorAll('.profile-panel-pane');

            function switchActiveTab(selectedTabButton, targetTabKey) {
                navTabs.forEach(btn => {
                    btn.classList.remove('active', 'elevated-tab');
                });

                panelPanes.forEach(pane => {
                    pane.classList.remove('active-pane');
                    pane.classList.add('hidden-pane');
                });

                selectedTabButton.classList.add('active', 'elevated-tab');

                const targetPane = document.getElementById('tab-' + targetTabKey);
                if (targetPane) {
                    targetPane.classList.remove('hidden-pane');
                    requestAnimationFrame(() => {
                        requestAnimationFrame(() => {
                            targetPane.classList.add('active-pane');
                        });
                    });
                }
            }

            navTabs.forEach(button => {
                button.addEventListener('click', function () {
                    const tabKey = this.dataset.tab;
                    switchActiveTab(this, tabKey);
                });
            });

            const initialTab = document.querySelector('.profile-navigation-tab[data-tab="profile"]');
            if (initialTab) {
                switchActiveTab(initialTab, 'profile');
            }
        });
    </script>

    {{-- MASSIVE 3D DEPTH, GLASSMORPHISM & UI DESIGN SYSTEM STYLING --}}
    <style>
        .profile-workspace {
            position: relative;
            min-height: calc(100vh - 70px);
            padding: 38px 22px 65px;
            overflow: hidden;
            background: linear-gradient(135deg, #f3f7fc 0%, #ebf2fc 50%, #f6faff 100%);
        }

        .profile-grid-bg {
            position: absolute;
            inset: 0;
            pointer-events: none;
            opacity: 0.4;
            background-image: linear-gradient(rgba(0, 87, 184, .055) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(0, 87, 184, .055) 1px, transparent 1px);
            background-size: 40px 40px;
            mask-image: linear-gradient(to bottom, black 40%, transparent 100%);
        }

        .profile-orb {
            position: absolute;
            border-radius: 999px;
            pointer-events: none;
            filter: blur(50px);
            animation: profileOrbFloat 14s ease-in-out infinite;
        }

        .profile-orb-alpha {
            width: 380px; height: 380px;
            top: -160px; left: -120px;
            background: radial-gradient(circle, rgba(0, 174, 239, 0.22), transparent 70%);
        }

        .profile-orb-beta {
            width: 480px; height: 480px;
            right: -220px; bottom: -220px;
            background: radial-gradient(circle, rgba(0, 87, 184, 0.18), transparent 70%);
            animation-delay: -5s;
        }

        .profile-orb-gamma {
            width: 260px; height: 260px;
            right: 18%; top: 12%;
            background: radial-gradient(circle, rgba(96, 189, 247, 0.16), transparent 70%);
            animation-delay: -9s;
        }

        @keyframes profileOrbFloat {
            0%, 100% { transform: translate3d(0, 0, 0); }
            50% { transform: translate3d(0, -25px, 0); }
        }

        .profile-layout-wrapper {
            position: relative;
            z-index: 5;
            max-width: 1020px;
            margin: 0 auto;
        }

        .profile-header-container {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .profile-header-icon-box {
            width: 52px; height: 52px;
            border-radius: 16px;
            background: linear-gradient(135deg, #031b43, #0057b8);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 22px rgba(0, 63, 135, 0.22);
            transition: transform 0.3s ease;
        }

        .profile-header-icon-box:hover {
            transform: translateY(-3px) scale(1.05);
        }

        .profile-header-title {
            font-size: 24px;
            font-weight: 900;
            color: #17345e;
            letter-spacing: -0.5px;
            line-height: 1.2;
        }

        .profile-header-subtitle {
            font-size: 12px;
            font-weight: 600;
            color: #71849d;
            margin-top: 2px;
        }

        .profile-banner-card {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 24px 28px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.95);
            border-radius: 24px;
            box-shadow: 0 12px 30px rgba(3, 27, 67, 0.08), 0 25px 50px rgba(0, 63, 135, 0.06);
            margin-bottom: 24px;
            transition: all 0.3s ease;
        }

        .profile-banner-card:hover {
            box-shadow: 0 16px 35px rgba(3, 27, 67, 0.12), 0 30px 60px rgba(0, 63, 135, 0.09);
            transform: translateY(-2px);
        }

        .profile-banner-icon-wrapper {
            width: 64px; height: 64px;
            border-radius: 20px;
            background: linear-gradient(145deg, #0057b8, #00aeef);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            box-shadow: 0 10px 25px rgba(0, 174, 239, 0.3);
        }

        .profile-banner-content {
            flex: 1;
            min-width: 0;
        }

        .profile-banner-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 6px;
        }

        .profile-banner-content h1 {
            font-size: 19px;
            font-weight: 900;
            color: #18345f;
            margin: 0;
            letter-spacing: -0.3px;
        }

        .profile-banner-content p {
            font-size: 13px;
            font-weight: 500;
            color: #71849d;
            margin: 0;
            line-height: 1.5;
        }

        .profile-active-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: 999px;
            background: #e6f7ef;
            border: 1px solid #b7ebd0;
            color: #0d8a4e;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .profile-active-dot {
            width: 6px; height: 6px;
            border-radius: 999px;
            background: #10b981;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2);
        }

        .profile-master-card {
            position: relative;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.98);
            border-radius: 26px;
            box-shadow: 0 10px 25px rgba(3, 27, 67, 0.06), 0 30px 70px rgba(0, 63, 135, 0.12);
            overflow: hidden;
        }

        .profile-card-top-glow {
            position: absolute;
            z-index: 10;
            top: 0; left: 12%;
            width: 76%; height: 4px;
            border-radius: 0 0 999px 999px;
            background: linear-gradient(90deg, transparent, #00aeef 25%, #0057b8 50%, #00aeef 75%, transparent);
            box-shadow: 0 2px 14px rgba(0, 174, 239, 0.45);
        }

        .profile-navigation-strip {
            padding: 16px 24px 0;
            background: linear-gradient(to bottom, rgba(247, 251, 255, 0.9), rgba(255, 255, 255, 0.7));
            border-bottom: 1px solid #e3edf7;
        }

        .profile-nav-tabs {
            display: flex;
            gap: 10px;
            overflow-x: auto;
        }

        .profile-navigation-tab {
            position: relative;
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 200px;
            padding: 14px 18px;
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid #e1ebf5;
            border-bottom: none;
            border-radius: 16px 16px 0 0;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .profile-navigation-tab:hover {
            background: #ffffff;
            border-color: #cbdcf0;
            transform: translateY(-2px);
        }

        .profile-nav-icon {
            width: 40px; height: 40px;
            border-radius: 12px;
            background: #edf4fa;
            color: #647d9b;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .profile-nav-text-group {
            display: flex;
            flex-direction: column;
            gap: 2px;
            text-align: left;
        }

        .profile-nav-title {
            font-size: 13px;
            font-weight: 800;
            color: #2c4a6f;
            line-height: 1.2;
        }

        .profile-nav-desc {
            font-size: 10px;
            font-weight: 600;
            color: #8da2bb;
            line-height: 1.2;
        }

        .profile-nav-bar {
            position: absolute;
            left: 16px; right: 16px; bottom: -1px;
            height: 3px;
            border-radius: 999px 999px 0 0;
            background: linear-gradient(90deg, #00aeef, #0057b8);
            transform: scaleX(0);
            transform-origin: center;
            transition: transform 0.3s ease;
        }

        /* ACTIVE TAB 3D PILL ELEVATION */
        .profile-navigation-tab.active {
            background: #ffffff;
            border-color: #c5dbf5;
            box-shadow: 0 -4px 20px rgba(0, 63, 135, 0.06);
            transform: translateY(-3px);
        }

        .profile-navigation-tab.active .profile-nav-icon {
            background: linear-gradient(135deg, #031b43, #0057b8);
            color: #ffffff;
            box-shadow: 0 6px 15px rgba(0, 87, 184, 0.28);
        }

        .profile-navigation-tab.active .profile-nav-bar {
            transform: scaleX(1);
        }

        /* DANGER TAB SPECIAL ACTIVE STATE */
        .profile-navigation-tab.danger-action-tab.active {
            border-color: #f7d2d2;
        }

        .profile-navigation-tab.danger-action-tab.active .profile-nav-icon {
            background: linear-gradient(135deg, #a62d2d, #dc4b4b);
            color: #ffffff;
            box-shadow: 0 6px 15px rgba(220, 75, 75, 0.28);
        }

        .profile-navigation-tab.danger-action-tab.active .profile-nav-bar {
            background: linear-gradient(90deg, #ef4444, #b91c1c);
        }

        .profile-content-viewport {
            padding: 32px;
        }

        .profile-panel-pane {
            opacity: 0;
            transform: translateY(12px);
            transition: opacity 0.35s ease, transform 0.35s ease;
        }

        .profile-panel-pane.active-pane {
            opacity: 1;
            transform: translateY(0);
        }

        .profile-panel-pane.hidden-pane {
            display: none;
        }

        /* GLOBAL FORM UI REFINEMENT */
        .profile-content-viewport input:not([type="checkbox"]):not([type="radio"]),
        .profile-content-viewport select,
        .profile-content-viewport textarea {
            border-radius: 14px !important;
            border-color: #d2e3f5 !important;
            background-color: #fafcfe !important;
            padding: 13px 18px !important;
            font-weight: 700 !important;
            color: #18345f !important;
            transition: all 0.25s ease !important;
        }

        .profile-content-viewport input:not([type="checkbox"]):not([type="radio"]):focus,
        .profile-content-viewport select:focus,
        .profile-content-viewport textarea:focus {
            border-color: #0057b8 !important;
            background-color: #ffffff !important;
            box-shadow: 0 0 0 4px rgba(0, 87, 184, 0.12) !important;
        }

        @media (max-width: 768px) {
            .profile-workspace { padding: 22px 12px 45px; }
            .profile-banner-card { padding: 18px 20px; gap: 14px; }
            .profile-banner-icon-wrapper { width: 52px; height: 52px; border-radius: 16px; }
            .profile-banner-content h1 { font-size: 16px; }
            .profile-navigation-tab { min-width: 160px; padding: 11px 14px; }
            .profile-content-viewport { padding: 20px 16px; }
        }
    </style>
</x-app-layout>