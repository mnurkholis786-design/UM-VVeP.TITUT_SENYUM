<x-guest-layout>

    {{-- =========================================================
        LOGIN CARD STYLE ONLY
    ========================================================== --}}
    <style>
        [x-cloak] {
            display: none !important;
        }

        /* =====================================================
           FONT
        ====================================================== */

        .vvep-login {
            font-family: 'Poppins', sans-serif;
        }


        /* =====================================================
           3D SCENE
        ====================================================== */

        .login-3d-scene {
            width: 100%;
            max-width: 430px;
            perspective: 1400px;
        }


        /* =====================================================
           3D WRAPPER
        ====================================================== */

        .login-3d-wrapper {
            position: relative;
            transform-style: preserve-3d;

            transition:
                transform 0.18s
                cubic-bezier(.2, .8, .2, 1);
        }


        /* =====================================================
           BACK 3D LAYERS
        ====================================================== */

        .login-3d-layer-1,
        .login-3d-layer-2,
        .login-card-glow {
            position: absolute;
            inset: 0;

            border-radius: 26px;

            pointer-events: none;

            transition:
                transform 0.25s ease;
        }


        .login-3d-layer-1 {
            background:
                linear-gradient(
                    145deg,
                    rgba(2, 31, 76, 0.70),
                    rgba(0, 84, 170, 0.48)
                );

            transform:
                translateZ(-38px)
                translateX(15px)
                translateY(18px);

            filter: blur(1px);

            box-shadow:
                0 35px 65px rgba(2, 31, 76, 0.22);
        }


        .login-3d-layer-2 {
            background:
                linear-gradient(
                    145deg,
                    rgba(0, 174, 239, 0.25),
                    rgba(0, 87, 184, 0.38)
                );

            transform:
                translateZ(-22px)
                translateX(8px)
                translateY(10px);

            border:
                1px solid rgba(255, 255, 255, 0.35);
        }


        /* =====================================================
           GLOW AROUND CARD
        ====================================================== */

        .login-card-glow {
            transform:
                translateZ(-3px);

            background:
                linear-gradient(
                    135deg,
                    rgba(0, 174, 239, 0.25),
                    rgba(0, 87, 184, 0.18),
                    transparent 65%
                );

            filter: blur(18px);

            opacity: 0.75;
        }


        /* =====================================================
           MAIN LOGIN CARD
        ====================================================== */

        .login-3d-card {
            position: relative;

            overflow: hidden;

            padding: 34px 32px 27px;

            border-radius: 26px;

            border:
                1px solid rgba(255, 255, 255, 0.95);

            background:
                linear-gradient(
                    145deg,
                    rgba(255, 255, 255, 0.985),
                    rgba(248, 252, 255, 0.97)
                );

            transform-style: preserve-3d;

            box-shadow:
                0 8px 18px rgba(3, 27, 67, 0.06),
                0 25px 55px rgba(0, 63, 135, 0.14),
                0 45px 90px rgba(3, 27, 67, 0.13);

            transition:
                box-shadow 0.35s ease,
                border-color 0.35s ease;
        }


        .login-3d-wrapper:hover .login-3d-card {
            border-color:
                rgba(255, 255, 255, 1);

            box-shadow:
                0 12px 24px rgba(3, 27, 67, 0.08),
                0 32px 68px rgba(0, 63, 135, 0.17),
                0 55px 105px rgba(3, 27, 67, 0.15);
        }


        /* =====================================================
           CARD TOP ACCENT
        ====================================================== */

        .card-top-accent {
            position: absolute;

            top: 0;
            left: 8%;

            width: 84%;
            height: 4px;

            border-radius:
                0 0 999px 999px;

            background:
                linear-gradient(
                    90deg,
                    transparent,
                    #00aeef 25%,
                    #0057b8 50%,
                    #00aeef 75%,
                    transparent
                );

            box-shadow:
                0 2px 12px rgba(0, 174, 239, 0.18);

            opacity: 0.9;
        }


        /* =====================================================
           CARD TOP GLOW
        ====================================================== */

        .card-top-glow {
            position: absolute;

            top: -100px;
            left: 50%;

            width: 330px;
            height: 190px;

            transform:
                translateX(-50%);

            border-radius: 999px;

            background:
                radial-gradient(
                    circle,
                    rgba(0, 174, 239, 0.12),
                    transparent 70%
                );

            pointer-events: none;
        }


        /* =====================================================
           CARD SHINE
        ====================================================== */

        .card-shine {
            position: absolute;

            top: 0;
            left: 0;

            width: 100%;
            height: 44%;

            border-radius:
                26px
                26px
                55%
                55%;

            background:
                linear-gradient(
                    to bottom,
                    rgba(255, 255, 255, 0.72),
                    rgba(255, 255, 255, 0)
                );

            pointer-events: none;

            transform:
                translateZ(5px);
        }


        /* =====================================================
           HEADER
        ====================================================== */

        .login-header {
            position: relative;

            z-index: 10;

            display: flex;
            flex-direction: column;
            align-items: center;

            margin-bottom: 25px;
        }


        /* =====================================================
           LOGO ROW
        ====================================================== */

        .logo-3d {
            display: flex;
            align-items: center;

            gap: 13px;

            transform:
                translateZ(35px);

            transition:
                transform 0.3s ease;
        }


        .login-3d-wrapper:hover .logo-3d {
            transform:
                translateZ(48px)
                translateY(-2px);
        }


        /* =====================================================
           TVRI LOGO BOX
        ====================================================== */

        .logo-box {
            position: relative;

            display: flex;
            align-items: center;
            justify-content: center;

            min-width: 84px;
            height: 58px;

            padding:
                7px 11px;

            background:
                rgba(255, 255, 255, 0.98);

            border:
                1px solid rgba(0, 87, 184, 0.08);

            border-radius:
                15px;

            box-shadow:
                0 5px 12px rgba(0, 63, 135, 0.07),
                0 12px 25px rgba(0, 63, 135, 0.09);

            transition:
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }


        .logo-box::before {
            content: "";

            position: absolute;

            inset: -4px;

            border-radius:
                18px;

            border:
                1px solid rgba(0, 174, 239, 0.10);

            pointer-events: none;
        }


        .login-3d-wrapper:hover .logo-box {
            transform:
                translateY(-2px);

            box-shadow:
                0 8px 15px rgba(0, 63, 135, 0.08),
                0 16px 30px rgba(0, 63, 135, 0.11);
        }


        .logo-box img {
            display: block;

            width: auto;
            height: 43px;

            max-width: 73px;

            object-fit: contain;
        }


        /* =====================================================
           DIVIDER
        ====================================================== */

        .logo-divider {
            width: 1px;
            height: 38px;

            background:
                linear-gradient(
                    to bottom,
                    transparent,
                    #cbd9e9,
                    transparent
                );
        }


        /* =====================================================
           VVeP TITLE
        ====================================================== */

        .vvep-title {
            font-size: 25px;

            line-height: 1;

            font-weight: 800;

            letter-spacing: -0.7px;

            background:
                linear-gradient(
                    135deg,
                    #031b43 0%,
                    #0057b8 55%,
                    #00aeef 100%
                );

            -webkit-background-clip: text;
            background-clip: text;

            -webkit-text-fill-color: transparent;

            transform:
                translateZ(32px);
        }


        .vvep-subtitle {
            display: block;

            margin-top: 6px;

            font-size: 8px;

            font-weight: 700;

            letter-spacing: 1.8px;

            color: #7b91aa;

            text-transform: uppercase;
        }


        /* =====================================================
           WELCOME TEXT
        ====================================================== */

        .login-title {
            margin-top: 16px;

            color: #667b95;

            font-size: 12px;

            font-weight: 500;

            text-align: center;

            transform:
                translateZ(22px);
        }


        .login-title strong {
            color: #18345f;

            font-weight: 700;
        }


        /* =====================================================
           FORM
        ====================================================== */

        .form-3d {
            position: relative;

            z-index: 10;

            transform:
                translateZ(18px);
        }


        /* =====================================================
           LABEL
        ====================================================== */

        .login-label {
            display: block;

            margin-bottom: 8px;

            color: #18345f;

            font-size: 11px;

            font-weight: 700;

            letter-spacing: 0.15px;
        }


        /* =====================================================
           INPUT WRAPPER
        ====================================================== */

        .input-3d {
            position: relative;

            transition:
                transform 0.2s ease;
        }


        .input-3d:focus-within {
            transform:
                translateZ(8px)
                translateY(-1px);
        }


        /* =====================================================
           INPUT
        ====================================================== */

        .input-3d input {
            width: 100%;

            min-height: 48px;

            padding-top: 12px !important;
            padding-bottom: 12px !important;

            color: #17345e !important;

            background:
                rgba(255, 255, 255, 0.92) !important;

            border:
                1px solid #d9e4f0 !important;

            border-radius:
                12px !important;

            outline: none;

            box-shadow:
                inset 0 1px 2px rgba(3, 27, 67, 0.025),
                0 3px 8px rgba(0, 63, 135, 0.025);

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;
        }


        .input-3d input::placeholder {
            color: #9aabc0;
        }


        .input-3d input:hover {
            background:
                #ffffff !important;

            border-color:
                #b9cfe6 !important;
        }


        .input-3d input:focus {
            background:
                #ffffff !important;

            border-color:
                #0878dc !important;

            box-shadow:
                0 0 0 3px rgba(0, 87, 184, 0.09),
                0 8px 18px rgba(0, 87, 184, 0.07);
        }


        /* =====================================================
           ICON
        ====================================================== */

        .input-icon {
            color: #8ba1ba;

            transition:
                color 0.2s ease,
                transform 0.2s ease;
        }


        .input-3d:focus-within .input-icon {
            color:
                #0057b8;

            transform:
                scale(1.05);
        }


        /* =====================================================
           PASSWORD BUTTON
        ====================================================== */

        .password-toggle {
            color: #8ba1ba;

            transition:
                color 0.2s ease,
                transform 0.2s ease;
        }


        .password-toggle:hover {
            color:
                #0057b8;

            transform:
                scale(1.06);
        }


        /* =====================================================
           REMEMBER
        ====================================================== */

        .remember-label {
            color: #526982;

            font-size: 11px;

            font-weight: 500;
        }


        .remember-checkbox {
            width: 15px;
            height: 15px;

            border-radius: 4px;

            border-color:
                #cbd9e8;

            color:
                #0057b8;

            accent-color:
                #0057b8;

            box-shadow:
                0 2px 4px rgba(0, 63, 135, 0.05);
        }


        /* =====================================================
           FORGOT PASSWORD
        ====================================================== */

        .forgot-link {
            color:
                #0057b8;

            font-size: 11px;

            font-weight: 700;

            text-decoration: none;

            transition:
                color 0.2s ease,
                transform 0.2s ease;
        }


        .forgot-link:hover {
            color:
                #003f8f;

            transform:
                translateY(-1px);
        }


        /* =====================================================
           LOGIN BUTTON
        ====================================================== */

        .login-button-3d {
            position: relative;

            width: 100%;

            min-height: 49px;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;

            padding:
                12px 18px;

            border: none;

            border-radius:
                13px;

            color:
                #ffffff;

            font-size: 13px;

            font-weight: 700;

            letter-spacing: 0.3px;

            cursor: pointer;

            background:
                linear-gradient(
                    135deg,
                    #031b43 0%,
                    #0057b8 52%,
                    #008ee0 100%
                );

            box-shadow:
                0 5px 0 #003f8f,
                0 12px 25px rgba(0, 87, 184, 0.27);

            transform:
                translateZ(22px);

            transition:
                transform 0.15s ease,
                box-shadow 0.15s ease,
                filter 0.2s ease;
        }


        .login-button-3d:hover {
            filter:
                brightness(1.04);

            transform:
                translateZ(30px)
                translateY(-2px);

            box-shadow:
                0 6px 0 #003879,
                0 17px 30px rgba(0, 87, 184, 0.34);
        }


        .login-button-3d:active {
            transform:
                translateZ(10px)
                translateY(4px);

            box-shadow:
                0 1px 0 #003879,
                0 6px 12px rgba(0, 87, 184, 0.22);
        }


        .login-button-3d:focus-visible {
            outline: none;

            box-shadow:
                0 0 0 4px rgba(0, 174, 239, 0.15),
                0 5px 0 #003f8f,
                0 12px 25px rgba(0, 87, 184, 0.27);
        }


        /* =====================================================
           BUTTON SHINE
        ====================================================== */

        .login-button-3d::after {
            content: "";

            position: absolute;

            top: 0;
            left: -120%;

            width: 55%;
            height: 100%;

            background:
                linear-gradient(
                    90deg,
                    transparent,
                    rgba(255, 255, 255, 0.27),
                    transparent
                );

            transform:
                skewX(-20deg);

            transition:
                left 0.65s ease;
        }


        .login-button-3d:hover::after {
            left: 130%;
        }


        /* =====================================================
           BUTTON ARROW
        ====================================================== */

        .button-arrow {
            transition:
                transform 0.2s ease;
        }


        .login-button-3d:hover .button-arrow {
            transform:
                translateX(4px);
        }


        /* =====================================================
           FOOTER
        ====================================================== */

        .card-footer-3d {
            position: relative;

            z-index: 10;

            margin-top: 23px;

            padding-top: 17px;

            border-top:
                1px solid #edf2f7;

            transform:
                translateZ(12px);
        }


        .footer-text {
            color:
                #7b8ea6;

            font-size: 10px;

            font-weight: 500;

            letter-spacing: 0.1px;
        }


        .footer-dot {
            display: inline-block;

            width: 5px;
            height: 5px;

            margin-right: 6px;

            border-radius: 999px;

            background:
                linear-gradient(
                    135deg,
                    #00aeef,
                    #0057b8
                );

            box-shadow:
                0 0 0 3px rgba(0, 174, 239, 0.08);
        }


        /* =====================================================
           MOBILE
        ====================================================== */

        @media (max-width: 640px) {

            .login-3d-scene {
                max-width: 390px;
            }


            .login-3d-card {
                padding:
                    29px 22px 24px;

                border-radius:
                    23px;
            }


            .login-3d-layer-1,
            .login-3d-layer-2,
            .login-card-glow {
                border-radius:
                    23px;
            }


            .vvep-title {
                font-size: 22px;
            }


            .logo-box {
                min-width: 75px;
                height: 53px;
            }


            .logo-box img {
                height: 38px;
                max-width: 65px;
            }


            .logo-divider {
                height: 34px;
            }


            .login-3d-layer-1 {
                transform:
                    translateZ(-23px)
                    translateX(8px)
                    translateY(10px);
            }


            .login-3d-layer-2 {
                transform:
                    translateZ(-14px)
                    translateX(5px)
                    translateY(6px);
            }


            .login-card-glow {
                transform:
                    translateZ(-2px);
            }
        }


        /* =====================================================
           SMALL MOBILE
        ====================================================== */

        @media (max-width: 390px) {

            .login-3d-card {
                padding:
                    25px 18px 21px;
            }


            .logo-3d {
                gap: 9px;
            }


            .logo-box {
                min-width: 68px;
                height: 49px;

                padding:
                    6px 8px;
            }


            .logo-box img {
                height: 34px;
                max-width: 58px;
            }


            .vvep-title {
                font-size: 20px;
            }


            .login-title {
                font-size: 11px;
            }


            .remember-label,
            .forgot-link {
                font-size: 10px;
            }
        }


        /* =====================================================
           REDUCED MOTION
        ====================================================== */

        @media (prefers-reduced-motion: reduce) {

            .login-3d-wrapper,
            .login-3d-card,
            .logo-3d,
            .logo-box,
            .login-button-3d {
                transition: none !important;
            }
        }
    </style>


    {{-- =========================================================
        3D LOGIN CARD
    ========================================================== --}}

    <div
        class="vvep-login login-3d-scene"

        x-data="{
            rotateX: 0,
            rotateY: 0,

            moveCard(event) {

                if (window.innerWidth < 768) {
                    return;
                }

                const rect =
                    $el.getBoundingClientRect();

                const x =
                    event.clientX - rect.left;

                const y =
                    event.clientY - rect.top;

                const centerX =
                    rect.width / 2;

                const centerY =
                    rect.height / 2;

                this.rotateY =
                    ((x - centerX) / centerX) * 5;

                this.rotateX =
                    ((centerY - y) / centerY) * 5;
            },

            resetCard() {
                this.rotateX = 0;
                this.rotateY = 0;
            }
        }"

        @mousemove="moveCard($event)"
        @mouseleave="resetCard()"
    >

        <div
            class="login-3d-wrapper"

            :style="`
                transform:
                    rotateX(${rotateX}deg)
                    rotateY(${rotateY}deg);
            `"
        >

            {{-- =================================================
                BACK LAYERS
            ================================================== --}}

            <div class="login-card-glow"></div>

            <div class="login-3d-layer-1"></div>

            <div class="login-3d-layer-2"></div>


            {{-- =================================================
                MAIN CARD
            ================================================== --}}

            <div class="login-3d-card">

                {{-- Top Accent --}}

                <div class="card-top-accent"></div>


                {{-- Top Glow --}}

                <div class="card-top-glow"></div>


                {{-- Shine --}}

                <div class="card-shine"></div>


                {{-- =================================================
                    HEADER
                ================================================== --}}

                <div class="login-header">

                    <div class="logo-3d">

                        {{-- TVRI LOGO --}}

                        <div class="logo-box">

                            <img
                                src="{{ asset('images/tvri.png') }}"
                                alt="TVRI"
                            >

                        </div>


                        {{-- Divider --}}

                        <div class="logo-divider"></div>


                        {{-- VVeP --}}

                        <div>

                            <div class="vvep-title">
                                VVeP App
                            </div>

                            <span class="vvep-subtitle">
                                Digital Verification System
                            </span>

                        </div>

                    </div>


                    {{-- Welcome --}}

                    <h2 class="login-title">

                        Selamat Datang,
                        <strong>Silahkan Login</strong>

                    </h2>

                </div>


                {{-- =================================================
                    SESSION STATUS
                ================================================== --}}

                <div class="relative z-10">

                    <x-auth-session-status
                        class="mb-4"
                        :status="session('status')"
                    />

                </div>


                {{-- =================================================
                    FORM
                ================================================== --}}

                <form
                    method="POST"

                    action="{{ route('login') }}"

                    class="form-3d space-y-6"
                >

                    @csrf


                    {{-- =================================================
                        EMAIL
                    ================================================== --}}

                    <div>

                        <label
                            for="email"
                            class="login-label"
                        >
                            Email Address
                        </label>


                        <div class="input-3d">

                            {{-- Email Icon --}}

                            <div
                                class="
                                    absolute
                                    inset-y-0
                                    left-0
                                    pl-3.5
                                    flex
                                    items-center
                                    pointer-events-none
                                    z-10
                                "
                            >

                                <svg
                                    class="input-icon w-5 h-5"

                                    fill="none"

                                    stroke="currentColor"

                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"

                                        d="M4 6h16a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V8a2 2 0 012-2z"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"

                                        d="M4 8l8 5 8-5"
                                    />

                                </svg>

                            </div>


                            <x-text-input
                                id="email"

                                class="
                                    block
                                    w-full
                                    pl-11
                                    pr-3
                                    py-3
                                "

                                type="email"

                                name="email"

                                :value="old('email')"

                                required

                                autofocus

                                autocomplete="username"

                                placeholder="Enter your email"
                            />

                        </div>


                        <x-input-error
                            :messages="$errors->get('email')"

                            class="mt-2"
                        />

                    </div>


                    {{-- =================================================
                        PASSWORD
                    ================================================== --}}

                    <div
                        x-data="{ show: false }"
                    >

                        <label
                            for="password"
                            class="login-label"
                        >
                            Password
                        </label>


                        <div class="input-3d">

                            {{-- Lock Icon --}}

                            <div
                                class="
                                    absolute
                                    inset-y-0
                                    left-0
                                    flex
                                    items-center
                                    pl-3.5
                                    pointer-events-none
                                    z-10
                                "
                            >

                                <svg
                                    class="input-icon h-5 w-5"

                                    fill="none"

                                    stroke="currentColor"

                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"

                                        d="M7 10V7a5 5 0 0110 0v3"
                                    />

                                    <rect
                                        x="4"
                                        y="10"
                                        width="16"
                                        height="11"
                                        rx="2"

                                        stroke-width="1.8"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-width="1.8"

                                        d="M12 14v3"
                                    />

                                </svg>

                            </div>


                            {{-- Password Input --}}

                            <x-text-input
                                id="password"

                                class="
                                    block
                                    w-full
                                    pl-11
                                    pr-12
                                    py-3
                                "

                                ::type="
                                    show
                                        ? 'text'
                                        : 'password'
                                "

                                name="password"

                                required

                                autocomplete="current-password"

                                placeholder="Enter your password"
                            />


                            {{-- Eye Button --}}

                            <button
                                type="button"

                                @click="show = !show"

                                class="
                                    password-toggle
                                    absolute
                                    inset-y-0
                                    right-0
                                    pr-3.5
                                    flex
                                    items-center
                                    focus:outline-none
                                    z-10
                                "

                                :aria-label="
                                    show
                                        ? 'Hide password'
                                        : 'Show password'
                                "
                            >

                                {{-- Show Password --}}

                                <svg
                                    x-show="!show"

                                    class="h-5 w-5"

                                    fill="none"

                                    stroke="currentColor"

                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"

                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"

                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                    />

                                </svg>


                                {{-- Hide Password --}}

                                <svg
                                    x-show="show"

                                    x-cloak

                                    class="h-5 w-5"

                                    fill="none"

                                    stroke="currentColor"

                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"

                                        d="M3 3l18 18"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"

                                        d="M10.58 10.58a2 2 0 102.83 2.83"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.8"

                                        d="M9.88 4.24A9.53 9.53 0 0112 4c4.48 0 8.27 2.94 9.54 7a9.72 9.72 0 01-4.13 5.41M6.61 6.61A9.94 9.94 0 002.46 12c1.27 4.06 5.06 7 9.54 7 1.1 0 2.15-.19 3.13-.54"
                                    />

                                </svg>

                            </button>

                        </div>


                        <x-input-error
                            :messages="$errors->get('password')"

                            class="mt-2"
                        />

                    </div>


                    {{-- =================================================
                        REMEMBER + FORGOT
                    ================================================== --}}

                    <div
                        class="
                            flex
                            items-center
                            justify-between
                        "
                    >

                        <label
                            for="remember_me"

                            class="
                                remember-label
                                inline-flex
                                items-center
                                cursor-pointer
                            "
                        >

                            <input
                                id="remember_me"

                                type="checkbox"

                                class="
                                    remember-checkbox
                                "

                                name="remember"
                            >

                            <span class="ml-2">
                                {{ __('Remember me') }}
                            </span>

                        </label>


                        @if (Route::has('password.request'))

                            <a
                                class="forgot-link"

                                href="{{ route('password.request') }}"
                            >
                                {{ __('Forgot password?') }}
                            </a>

                        @endif

                    </div>


                    {{-- =================================================
                        LOGIN BUTTON
                    ================================================== --}}

                    <div class="pt-1">

                        <button
                            type="submit"

                            class="login-button-3d"
                        >

                            <span>
                                {{ __('Login') }}
                            </span>


                            <svg
                                class="
                                    button-arrow
                                    ml-2
                                    w-4
                                    h-4
                                "

                                fill="none"

                                stroke="currentColor"

                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"

                                    d="M13 7l5 5m0 0l-5 5m5-5H6"
                                />

                            </svg>

                        </button>

                    </div>

                </form>


                {{-- =================================================
                    FOOTER
                ================================================== --}}

                <div class="card-footer-3d text-center">

                    <p class="footer-text">

                        <span class="footer-dot"></span>

                        VVeP App • TVRI Kalimantan Selatan

                    </p>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>