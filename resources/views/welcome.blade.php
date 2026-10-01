<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>VVeP APP - Pengajuan & Arsip Digital</title>

    {{-- Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: #f5f9ff;
            color: #102a56;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        ::selection {
            background: #0056b8;
            color: #fff;
        }

        /* =========================================================
           BACKGROUND
        ========================================================= */

        .page-bg {
            position: relative;
            overflow: hidden;
            background: #f5f9ff;
        }

        .page-bg::before {
            content: "";
            position: absolute;
            width: 520px;
            height: 520px;
            top: 320px;
            left: -250px;
            border-radius: 50%;
            background: rgba(0, 86, 184, .08);
            filter: blur(90px);
            pointer-events: none;
        }

        .page-bg::after {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            top: 850px;
            right: -250px;
            border-radius: 50%;
            background: rgba(0, 174, 239, .08);
            filter: blur(90px);
            pointer-events: none;
        }

        /* =========================================================
           NAVBAR
        ========================================================= */

        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            height: 80px;
            background: rgba(255, 255, 255, .88);
            backdrop-filter: blur(22px);
            -webkit-backdrop-filter: blur(22px);
            border-bottom: 1px solid rgba(148, 163, 184, .18);
            box-shadow: 0 4px 25px rgba(15, 23, 42, .035);
        }

        .nav-container {
            max-width: 1280px;
            height: 100%;
            margin: auto;
            padding: 0 26px;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
        }

        .tvri-logo-box {
            width: 53px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #fff;
            border-radius: 12px;
            padding: 5px 7px;

            border: 1px solid rgba(203, 213, 225, .9);

            box-shadow:
                0 7px 18px rgba(15, 23, 42, .08),
                inset 0 1px 2px rgba(255, 255, 255, .9);

            overflow: hidden;
        }

        .tvri-logo {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }

        .brand-name {
            font-size: 21px;
            font-weight: 800;
            letter-spacing: -.6px;
            color: #0b2f63;
        }

        .brand-name span {
            color: #0066c7;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link {
            position: relative;
            padding: 11px 17px;
            border-radius: 11px;

            color: #475569;
            font-size: 13px;
            font-weight: 600;

            transition: .25s ease;
        }

        .nav-link::after {
            content: "";
            position: absolute;
            left: 17px;
            right: 17px;
            bottom: 6px;
            height: 2px;
            border-radius: 99px;

            background: #0066c7;

            transform: scaleX(0);
            transform-origin: center;

            transition: .25s ease;
        }

        .nav-link:hover {
            color: #0056b8;
            background: #eff6ff;
        }

        .nav-link:hover::after {
            transform: scaleX(1);
        }

        .nav-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            padding: 12px 20px;

            border-radius: 13px;

            color: #fff;

            font-size: 13px;
            font-weight: 700;

            background:
                linear-gradient(
                    135deg,
                    #003a8f 0%,
                    #0066c7 55%,
                    #00aeee 100%
                );

            box-shadow:
                0 10px 24px rgba(0, 86, 184, .22),
                inset 0 1px 1px rgba(255,255,255,.25);

            transition: .28s ease;
        }

        .nav-button:hover {
            transform: translateY(-2px);

            box-shadow:
                0 15px 30px rgba(0, 86, 184, .30),
                inset 0 1px 1px rgba(255,255,255,.25);
        }

        .nav-button svg {
            transition: .25s ease;
        }

        .nav-button:hover svg {
            transform: translateX(3px);
        }

        /* =========================================================
           HERO
        ========================================================= */

        .hero {
            position: relative;
            min-height: 650px;

            display: flex;
            align-items: center;

            overflow: hidden;

            background:
                radial-gradient(
                    circle at 88% 18%,
                    rgba(0, 102, 199, .17),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 5% 85%,
                    rgba(0, 174, 239, .12),
                    transparent 25%
                ),
                linear-gradient(
                    135deg,
                    #ffffff 0%,
                    #f4f9ff 52%,
                    #eaf6ff 100%
                );
        }

        .hero::before {
            content: "";

            position: absolute;

            width: 750px;
            height: 330px;

            right: -230px;
            bottom: -170px;

            background: rgba(0, 86, 184, .07);

            border-radius: 50%;

            filter: blur(25px);
        }

        .hero::after {
            content: "";

            position: absolute;

            width: 300px;
            height: 300px;

            top: 70px;
            left: -170px;

            border-radius: 50%;

            border: 55px solid rgba(0, 102, 199, .035);
        }

        .hero-container {
            position: relative;
            z-index: 2;

            width: 100%;
            max-width: 1280px;

            margin: auto;
            padding: 90px 26px;

            display: grid;

            grid-template-columns: 1.05fr .95fr;

            align-items: center;

            gap: 70px;
        }

        .hero-content {
            animation: fadeUp .8s ease forwards;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 9px;

            padding: 9px 16px;

            border-radius: 999px;

            background: rgba(255,255,255,.78);

            border: 1px solid rgba(96,165,250,.25);

            color: #0056b8;

            font-size: 11px;
            font-weight: 700;

            box-shadow:
                0 8px 25px rgba(0,86,184,.07);

            margin-bottom: 23px;
        }

        .hero-badge-dot {
            width: 8px;
            height: 8px;

            background: #16a34a;

            border-radius: 50%;

            box-shadow:
                0 0 0 5px rgba(22,163,74,.11);
        }

        .hero-title {
            margin: 0;

            font-size: clamp(43px, 5vw, 70px);

            line-height: 1.07;

            letter-spacing: -3px;

            font-weight: 800;

            color: #0b2f63;
        }

        .hero-title-gradient {
            display: inline-block;

            color: transparent;

            background:
                linear-gradient(
                    100deg,
                    #003a8f,
                    #0066c7 48%,
                    #00aeee
                );

            -webkit-background-clip: text;
            background-clip: text;
        }

        .hero-description {
            max-width: 630px;

            margin-top: 25px;

            color: #64748b;

            font-size: 14px;

            line-height: 1.95;
        }

        .hero-buttons {
            display: flex;
            align-items: center;

            gap: 13px;

            margin-top: 32px;
        }

        .primary-button {
            display: inline-flex;
            align-items: center;
            gap: 10px;

            padding: 14px 23px;

            border-radius: 14px;

            background:
                linear-gradient(
                    135deg,
                    #003a8f,
                    #0066c7,
                    #00aeee
                );

            color: white;

            font-size: 13px;
            font-weight: 700;

            box-shadow:
                0 13px 27px rgba(0, 86, 184, .25),
                inset 0 1px 1px rgba(255,255,255,.3);

            transition: .3s ease;
        }

        .primary-button:hover {
            transform: translateY(-4px);

            box-shadow:
                0 20px 38px rgba(0, 86, 184, .31),
                inset 0 1px 1px rgba(255,255,255,.3);
        }

        .primary-button svg {
            width: 18px;
            height: 18px;
            transition: .3s ease;
        }

        .primary-button:hover svg {
            transform: translateX(4px);
        }

        .secondary-button {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            padding: 13px 20px;

            border-radius: 14px;

            background: rgba(255,255,255,.8);

            color: #334155;

            border: 1px solid #dbeafe;

            font-size: 13px;
            font-weight: 700;

            transition: .3s ease;
        }

        .secondary-button:hover {
            background: #fff;
            border-color: #93c5fd;

            transform: translateY(-3px);

            box-shadow:
                0 11px 25px rgba(15,23,42,.08);
        }

        /* =========================================================
           HERO VISUAL
        ========================================================= */

        .hero-visual {
            position: relative;

            min-height: 430px;

            perspective: 1200px;

            animation:
                fadeRight 1s ease forwards;
        }

        .floating-orb {
            position: absolute;

            border-radius: 50%;

            filter: blur(.2px);

            animation:
                floating 5s ease-in-out infinite;
        }

        .orb-one {
            width: 95px;
            height: 95px;

            background:
                linear-gradient(
                    145deg,
                    #60a5fa,
                    #0056b8
                );

            top: 10px;
            right: 35px;

            opacity: .16;
        }

        .orb-two {
            width: 60px;
            height: 60px;

            background:
                linear-gradient(
                    145deg,
                    #22d3ee,
                    #0066c7
                );

            bottom: 45px;
            left: 0;

            opacity: .18;

            animation-delay: -2s;
        }

        .dashboard-3d {
            position: absolute;

            width: 100%;
            max-width: 520px;

            height: 340px;

            right: 0;
            top: 45px;

            border-radius: 26px;

            padding: 19px;

            background:
                linear-gradient(
                    145deg,
                    #ffffff,
                    #e8f3ff
                );

            border:
                1px solid rgba(147,197,253,.55);

            box-shadow:
                30px 35px 55px rgba(0,58,143,.14),
                10px 12px 30px rgba(15,23,42,.07),
                inset 1px 1px 0 rgba(255,255,255,.95);

            transform:
                rotateY(-12deg)
                rotateX(7deg)
                rotateZ(1deg);

            transition:
                transform .5s ease;
        }

        .hero-visual:hover .dashboard-3d {
            transform:
                rotateY(-5deg)
                rotateX(3deg)
                rotateZ(0deg)
                translateY(-7px);
        }

        .dashboard-top {
            display: flex;
            align-items: center;
            justify-content: space-between;

            padding-bottom: 15px;
        }

        .dashboard-dots {
            display: flex;
            gap: 5px;
        }

        .dashboard-dots span {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #cbd5e1;
        }

        .dashboard-dots span:first-child {
            background: #60a5fa;
        }

        .dashboard-dots span:nth-child(2) {
            background: #38bdf8;
        }

        .dashboard-dots span:last-child {
            background: #93c5fd;
        }

        .dashboard-title {
            width: 95px;
            height: 8px;

            border-radius: 20px;

            background: #dbeafe;
        }

        .dashboard-main {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 13px;
        }

        .mini-card {
            min-height: 108px;

            padding: 14px;

            border-radius: 17px;

            background:
                rgba(255,255,255,.88);

            border:
                1px solid #e2e8f0;

            box-shadow:
                0 8px 20px rgba(15,23,42,.05);
        }

        .mini-card.wide {
            grid-column: span 2;

            min-height: 92px;
        }

        .mini-icon {
            width: 31px;
            height: 31px;

            border-radius: 9px;

            display: flex;
            align-items: center;
            justify-content: center;

            background:
                linear-gradient(
                    145deg,
                    #003a8f,
                    #0066c7,
                    #00aeee
                );

            color: white;

            margin-bottom: 10px;

            box-shadow:
                0 6px 12px rgba(0,86,184,.16);
        }

        .mini-icon svg {
            width: 16px;
            height: 16px;
        }

        .mini-line {
            height: 6px;

            border-radius: 20px;

            background: #e2e8f0;

            margin-bottom: 7px;
        }

        .mini-line.short {
            width: 55%;
        }

        .mini-line.blue {
            background:
                linear-gradient(
                    90deg,
                    #0066c7,
                    #00aeee
                );

            width: 72%;
        }

        .chart {
            display: flex;

            align-items: flex-end;

            gap: 8px;

            height: 55px;

            padding-top: 5px;
        }

        .chart-bar {
            flex: 1;

            border-radius:
                6px 6px 2px 2px;

            background:
                linear-gradient(
                    180deg,
                    #00aeee,
                    #0056b8
                );

            min-height: 15px;
        }

        .chart-bar:nth-child(1) {
            height: 35%;
        }

        .chart-bar:nth-child(2) {
            height: 55%;
        }

        .chart-bar:nth-child(3) {
            height: 42%;
        }

        .chart-bar:nth-child(4) {
            height: 78%;
        }

        .chart-bar:nth-child(5) {
            height: 64%;
        }

        .chart-bar:nth-child(6) {
            height: 92%;
        }

        .floating-card {
            position: absolute;

            display: flex;
            align-items: center;

            gap: 10px;

            padding: 12px 15px;

            background:
                rgba(255,255,255,.91);

            backdrop-filter: blur(13px);

            border:
                1px solid rgba(255,255,255,.95);

            border-radius: 15px;

            box-shadow:
                0 18px 35px rgba(0,58,143,.13);

            font-size: 10px;

            font-weight: 700;

            color: #334155;

            animation:
                floating 4s ease-in-out infinite;
        }

        .floating-card svg {
            width: 19px;
            height: 19px;

            color: #0066c7;
        }

        .floating-card.one {
            top: 25px;
            left: 0;
        }

        .floating-card.two {
            bottom: 17px;
            right: 18px;

            animation-delay: -2s;
        }

        /* =========================================================
           SECTION
        ========================================================= */

        .section {
            position: relative;
            padding: 100px 26px;
        }

        .section-light {
            background:
                radial-gradient(
                    circle at 20% 10%,
                    rgba(96,165,250,.07),
                    transparent 25%
                ),
                #f7fbff;
        }

        .section-white {
            background: #fff;
        }

        .container {
            width: 100%;
            max-width: 1280px;
            margin: auto;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 55px;
        }

        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            font-size: 12px;

            color: #0066c7;

            font-weight: 800;

            margin-bottom: 10px;
        }

        .section-label::before {
            content: "";

            width: 8px;
            height: 8px;

            border-radius: 50%;

            background: #00aeee;

            box-shadow:
                0 0 0 5px rgba(0,174,239,.10);
        }

        .section-title {
            margin: 0;

            font-size:
                clamp(27px, 3vw, 38px);

            color: #0b2f63;

            font-weight: 800;

            letter-spacing: -.9px;
        }

        .section-description {
            margin: 10px auto 0;

            max-width: 680px;

            color: #64748b;

            font-size: 13px;

            line-height: 1.85;
        }

        /* =========================================================
           FEATURE CARDS
        ========================================================= */

        .features-grid {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 22px;
        }

        .feature-card {
            position: relative;

            padding: 28px;

            min-height: 245px;

            border-radius: 23px;

            background:
                rgba(255,255,255,.9);

            border:
                1px solid rgba(226,232,240,.95);

            box-shadow:
                0 10px 30px rgba(15,23,42,.045),
                0 2px 6px rgba(0,86,184,.035);

            overflow: hidden;

            transition:
                transform .35s ease,
                box-shadow .35s ease,
                border-color .35s ease;
        }

        .feature-card::before {
            content: "";

            position: absolute;

            width: 160px;
            height: 160px;

            border-radius: 50%;

            background:
                rgba(0,102,199,.055);

            right: -75px;
            top: -75px;

            transition: .4s ease;
        }

        .feature-card::after {
            content: "";

            position: absolute;

            left: 0;
            top: 0;

            width: 100%;
            height: 3px;

            background:
                linear-gradient(
                    90deg,
                    #003a8f,
                    #0066c7,
                    #00aeee
                );

            transform: scaleX(0);
            transform-origin: left;

            transition: .35s ease;
        }

        .feature-card:hover {
            transform:
                translateY(-10px);

            border-color:
                rgba(96,165,250,.55);

            box-shadow:
                0 25px 45px rgba(0,58,143,.11),
                0 8px 15px rgba(15,23,42,.06);
        }

        .feature-card:hover::before {
            transform: scale(1.4);
        }

        .feature-card:hover::after {
            transform: scaleX(1);
        }

        .feature-icon {
            position: relative;

            z-index: 2;

            width: 53px;
            height: 53px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 16px;

            color: white;

            margin-bottom: 22px;

            box-shadow:
                0 10px 20px rgba(0,86,184,.18),
                inset 2px 2px 4px rgba(255,255,255,.3);

            transition: .35s ease;
        }

        .feature-card:hover .feature-icon {
            transform:
                translateY(-4px)
                rotate(-5deg)
                scale(1.05);
        }

        .blue {
            background:
                linear-gradient(
                    145deg,
                    #003a8f,
                    #0066c7
                );
        }

        .cyan {
            background:
                linear-gradient(
                    145deg,
                    #0066c7,
                    #00aeee
                );
        }

        .navy {
            background:
                linear-gradient(
                    145deg,
                    #0b2f63,
                    #0066c7
                );
        }

        .sky {
            background:
                linear-gradient(
                    145deg,
                    #0074d9,
                    #00aeee
                );
        }

        .ocean {
            background:
                linear-gradient(
                    145deg,
                    #0056b8,
                    #0891b2
                );
        }

        .green {
            background:
                linear-gradient(
                    145deg,
                    #0084c7,
                    #00aeee
                );
        }

        .feature-icon svg {
            width: 25px;
            height: 25px;
        }

        .feature-title {
            position: relative;
            z-index: 2;

            margin: 0 0 9px;

            color: #0b2f63;

            font-size: 17px;

            font-weight: 800;
        }

        .feature-text {
            position: relative;
            z-index: 2;

            margin: 0;

            color: #64748b;

            font-size: 12.5px;

            line-height: 1.8;
        }

        .feature-arrow {
            position: absolute;

            top: 25px;
            right: 24px;

            width: 31px;
            height: 31px;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #0066c7;

            background: #eff6ff;

            transition: .3s ease;
        }

        .feature-card:hover .feature-arrow {
            background: #0066c7;
            color: white;

            transform:
                translateX(3px);
        }

        /* =========================================================
           BENEFITS
        ========================================================= */

        .benefits-wrapper {
            display: grid;

            grid-template-columns:
                1fr 1fr;

            gap: 70px;

            align-items: center;
        }

        .benefit-title {
            font-size:
                clamp(28px, 3vw, 39px);

            line-height: 1.2;

            color: #0b2f63;

            font-weight: 800;

            margin: 0 0 12px;
        }

        .benefit-subtitle {
            color: #64748b;

            font-size: 13px;

            line-height: 1.85;

            margin-bottom: 32px;

            max-width: 550px;
        }

        .benefit-list {
            display: grid;
            gap: 20px;
        }

        .benefit-item {
            display: flex;
            gap: 16px;
            align-items: flex-start;
        }

        .benefit-number {
            flex-shrink: 0;

            width: 44px;
            height: 44px;

            border-radius: 13px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: white;

            font-weight: 800;

            font-size: 12px;

            background:
                linear-gradient(
                    145deg,
                    #003a8f,
                    #0066c7,
                    #00aeee
                );

            box-shadow:
                0 9px 18px rgba(0,86,184,.17),
                inset 2px 2px 4px rgba(255,255,255,.25);
        }

        .benefit-item h4 {
            margin: 0 0 4px;

            font-size: 15px;

            color: #0b2f63;

            font-weight: 800;
        }

        .benefit-item p {
            margin: 0;

            color: #64748b;

            font-size: 12px;

            line-height: 1.7;
        }

        /* =========================================================
           TRUST CARD
        ========================================================= */

        .trust-scene {
            min-height: 430px;

            position: relative;

            display: flex;

            align-items: center;
            justify-content: center;

            perspective: 1000px;
        }

        .trust-bg {
            position: absolute;

            inset: 25px;

            border-radius: 35px;

            background:
                radial-gradient(
                    circle at 20% 20%,
                    rgba(255,255,255,.85),
                    transparent 25%
                ),
                linear-gradient(
                    145deg,
                    #dff3ff,
                    #dbeafe
                );

            transform:
                rotate(-4deg);

            box-shadow:
                0 25px 55px rgba(0,86,184,.08);
        }

        .trust-card {
            position: relative;

            z-index: 2;

            width: 340px;

            min-height: 320px;

            padding: 36px;

            border-radius: 27px;

            background:
                rgba(255,255,255,.92);

            border:
                1px solid rgba(255,255,255,.95);

            box-shadow:
                25px 30px 45px rgba(0,58,143,.13),
                0 5px 15px rgba(15,23,42,.07),
                inset 1px 1px 0 white;

            transform:
                rotateY(-10deg)
                rotateX(5deg);

            transition:
                transform .45s ease;
        }

        .trust-scene:hover .trust-card {
            transform:
                rotateY(-2deg)
                rotateX(2deg)
                translateY(-7px);
        }

        .trust-icon {
            width: 78px;
            height: 78px;

            border-radius: 24px;

            margin: 0 auto 23px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: white;

            background:
                linear-gradient(
                    145deg,
                    #003a8f,
                    #0066c7,
                    #00aeee
                );

            box-shadow:
                0 18px 30px rgba(0,86,184,.24),
                inset 3px 3px 7px rgba(255,255,255,.25);
        }

        .trust-icon svg {
            width: 38px;
            height: 38px;
        }

        .trust-card h4 {
            text-align: center;

            margin: 0 0 10px;

            font-size: 21px;

            font-weight: 800;

            color: #0b2f63;
        }

        .trust-card p {
            text-align: center;

            color: #64748b;

            font-size: 12px;

            line-height: 1.8;

            margin: 0;
        }

        .trust-badge {
            position: absolute;

            display: flex;

            align-items: center;

            gap: 7px;

            padding: 9px 13px;

            border-radius: 12px;

            background: white;

            box-shadow:
                0 12px 25px rgba(15,23,42,.1);

            font-size: 10px;

            font-weight: 700;

            color: #334155;

            z-index: 3;
        }

        .trust-badge svg {
            width: 15px;
            height: 15px;

            color: #16a34a;
        }

        .trust-badge.one {
            top: 55px;
            left: 15px;
        }

        .trust-badge.two {
            bottom: 55px;
            right: 5px;
        }

        /* =========================================================
           FOOTER
        ========================================================= */

        .footer {
            position: relative;

            overflow: hidden;

            background:
                radial-gradient(
                    circle at 80% 10%,
                    rgba(0,102,199,.2),
                    transparent 25%
                ),
                linear-gradient(
                    145deg,
                    #06152f,
                    #0a2348
                );

            color: white;

            padding: 75px 26px 25px;
        }

        .footer::before {
            content: "";

            position: absolute;

            width: 420px;
            height: 220px;

            left: -160px;
            bottom: -110px;

            background:
                rgba(0,174,239,.09);

            filter: blur(50px);

            border-radius: 50%;
        }

        .footer-grid {
            position: relative;

            z-index: 2;

            max-width: 1280px;

            margin: auto;

            display: grid;

            grid-template-columns:
                1.3fr .7fr 1fr 1fr;

            gap: 45px;
        }

        .footer-brand {
            display: flex;

            align-items: center;

            gap: 12px;

            margin-bottom: 17px;
        }

        .footer-tvri-box {
            width: 78px;
            height: 50px;

            display: flex;

            align-items: center;
            justify-content: center;

            background: #fff;

            border-radius: 12px;

            padding: 6px 8px;

            overflow: hidden;

            border:
                1px solid rgba(255,255,255,.95);

            box-shadow:
                0 8px 20px rgba(0,0,0,.15);
        }

        .footer-tvri-logo {
            width: 100%;
            height: 100%;

            object-fit: contain;

            display: block;
        }

        .footer-brand-divider {
            width: 1px;
            height: 30px;

            background:
                rgba(255,255,255,.25);
        }

        .footer-brand h4 {
            margin: 0;

            font-size: 18px;

            font-weight: 800;
        }

        .footer-description {
            color: #94a3b8;

            font-size: 12px;

            line-height: 1.9;

            max-width: 380px;
        }

        .footer-heading {
            font-size: 14px;

            font-weight: 800;

            margin: 0 0 18px;
        }

        .footer-links {
            display: grid;

            gap: 9px;
        }

        .footer-links a {
            color: #94a3b8;

            font-size: 12px;

            transition: .2s ease;
        }

        .footer-links a:hover {
            color: #38bdf8;
            transform: translateX(3px);
        }

        .developer,
        .pengembang {
            margin-bottom: 15px;
        }

        .developer-name,
        .pengembang-name {
            color: white;

            font-size: 12px;

            font-weight: 700;

            margin: 0;
        }

        .developer-role,
        .pengembang-role {
            color: #64748b;

            font-size: 10px;

            margin: 2px 0;
        }

        .developer a,
        .pengembang a {
            color: #94a3b8;

            font-size: 10px;

            transition: .2s ease;
        }

        .developer a:hover,
        .pengembang a:hover {
            color: #38bdf8;
        }

        .footer-bottom {
            position: relative;

            z-index: 2;

            max-width: 1280px;

            margin: 50px auto 0;

            padding-top: 22px;

            border-top:
                1px solid rgba(148,163,184,.13);

            text-align: center;

            color: #64748b;

            font-size: 11px;
        }

        /* =========================================================
           REVEAL
        ========================================================= */

        .reveal {
            opacity: 0;

            transform:
                translateY(25px);

            transition:
                opacity .7s ease,
                transform .7s ease;
        }

        .reveal.show {
            opacity: 1;

            transform:
                translateY(0);
        }

        /* =========================================================
           ANIMATIONS
        ========================================================= */

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes floating {
            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-12px);
            }
        }

        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 1100px) {

            .footer-grid {
                grid-template-columns:
                    1.2fr .8fr 1fr 1fr;

                gap: 25px;
            }
        }

        @media (max-width: 1000px) {

            .hero-container {
                grid-template-columns: 1fr;

                text-align: center;

                gap: 30px;
            }

            .hero-description {
                margin-left: auto;
                margin-right: auto;
            }

            .hero-buttons {
                justify-content: center;
            }

            .hero-visual {
                max-width: 600px;

                width: 100%;

                margin: auto;
            }

            .features-grid {
                grid-template-columns:
                    repeat(2, 1fr);
            }

            .benefits-wrapper {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns:
                    1fr 1fr;
            }
        }

        @media (max-width: 640px) {

            .navbar {
                height: 70px;
            }

            .nav-container {
                padding: 0 16px;
            }

            .tvri-logo-box {
                width: 43px;
                height: 36px;
            }

            .brand-name {
                font-size: 17px;
            }

            .nav-link {
                padding: 9px 10px;
                font-size: 11px;
            }

            .nav-button {
                padding: 9px 13px;
                font-size: 11px;
            }

            .hero {
                min-height: auto;
            }

            .hero-container {
                padding:
                    65px 18px 80px;
            }

            .hero-title {
                font-size: 39px;

                letter-spacing: -1.8px;
            }

            .hero-description {
                font-size: 13px;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .primary-button,
            .secondary-button {
                width: 100%;
                justify-content: center;
            }

            .hero-visual {
                min-height: 320px;
            }

            .dashboard-3d {
                height: 250px;

                top: 35px;

                transform: none;
            }

            .hero-visual:hover .dashboard-3d {
                transform:
                    translateY(-5px);
            }

            .floating-card {
                font-size: 9px;

                padding:
                    9px 11px;
            }

            .floating-card.one {
                left: 0;
            }

            .floating-card.two {
                right: 0;
            }

            .section {
                padding:
                    70px 18px;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .feature-card {
                min-height: 215px;
            }

            .trust-card {
                width: 290px;
            }

            .trust-bg {
                inset: 10px;
            }

            .footer {
                padding-left: 18px;
                padding-right: 18px;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 35px;
            }

            .footer-brand {
                align-items: center;
            }

            .footer-tvri-box {
                width: 68px;
                height: 44px;
            }
        }
    </style>
</head>

<body>

<div class="page-bg">

    {{-- =========================================================
         NAVBAR
    ========================================================== --}}

    <nav class="navbar">

        <div class="nav-container">

            <a href="{{ url('/') }}" class="brand">

                <div class="tvri-logo-box">

                    <img
                        src="{{ asset('images/tvri.png') }}"
                        alt="Logo TVRI"
                        class="tvri-logo"
                    >

                </div>

                <div class="brand-name">
                    VVeP <span>APP</span>
                </div>

            </a>


            <div class="nav-right">

                <a href="#fitur" class="nav-link">
                    Fitur
                </a>

                <a href="#tentang" class="nav-link">
                    Tentang
                </a>


                @if (Route::has('login'))

                    @auth

                        <a
                            href="{{ url('/dashboard') }}"
                            class="nav-button"
                        >

                            Dashboard

                            <svg
                                width="16"
                                height="16"
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

                        </a>

                    @else

                        <a
                            href="{{ route('login') }}"
                            class="nav-button"
                        >

                            Masuk

                            <svg
                                width="16"
                                height="16"
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

                        </a>

                    @endauth

                @endif

            </div>

        </div>

    </nav>


    {{-- =========================================================
         HERO
    ========================================================== --}}

    <section class="hero">

        <div class="hero-container">

            <div class="hero-content">

                <div class="hero-badge">

                    <span class="hero-badge-dot"></span>

                    Sistem Verifikasi & Validasi Elektronik Pembayaran

                </div>


                <h1 class="hero-title">

                    Kelola Pengajuan

                    <br>

                    dengan

                    <span class="hero-title-gradient">
                        Lebih Efisien
                    </span>

                </h1>


                <p class="hero-description">

                    Platform terintegrasi untuk pengajuan kegiatan, barang,
                    dan administrasi lainnya dengan proses verifikasi
                    yang terstruktur, transparan, dan mudah dipantau.

                </p>


                <div class="hero-buttons">

                    @if (Route::has('login'))

                        @guest

                            <a
                                href="{{ route('login') }}"
                                class="primary-button"
                            >

                                Mulai Sekarang

                                <svg
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

                            </a>

                        @else

                            <a
                                href="{{ url('/dashboard') }}"
                                class="primary-button"
                            >

                                Buka Dashboard

                                <svg
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6"
                                    />

                                </svg>

                            </a>

                        @endguest

                    @endif


                    <a
                        href="#fitur"
                        class="secondary-button"
                    >

                        Lihat Fitur

                        <svg
                            width="16"
                            height="16"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7"
                            />

                        </svg>

                    </a>

                </div>

            </div>


            {{-- =================================================
                 3D VISUAL
            ================================================== --}}

            <div class="hero-visual">

                <div class="floating-orb orb-one"></div>

                <div class="floating-orb orb-two"></div>


                <div class="floating-card one">

                    <svg
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M9 12l2 2 4-4"
                        />

                    </svg>

                    Verifikasi lebih terstruktur

                </div>


                <div class="dashboard-3d">

                    <div class="dashboard-top">

                        <div class="dashboard-dots">

                            <span></span>
                            <span></span>
                            <span></span>

                        </div>

                        <div class="dashboard-title"></div>

                    </div>


                    <div class="dashboard-main">

                        <div class="mini-card">

                            <div class="mini-icon">

                                <svg
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414A1 1 0 0120 6v13a2 2 0 01-2 2z"
                                    />

                                </svg>

                            </div>

                            <div class="mini-line blue"></div>

                            <div class="mini-line short"></div>

                        </div>


                        <div class="mini-card">

                            <div class="mini-icon">

                                <svg
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 3v18h18"
                                    />

                                </svg>

                            </div>

                            <div class="mini-line blue"></div>

                            <div class="mini-line short"></div>

                        </div>


                        <div class="mini-card wide">

                            <div class="mini-line blue"></div>

                            <div class="chart">

                                <div class="chart-bar"></div>
                                <div class="chart-bar"></div>
                                <div class="chart-bar"></div>
                                <div class="chart-bar"></div>
                                <div class="chart-bar"></div>
                                <div class="chart-bar"></div>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="floating-card two">

                    <svg
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                        />

                    </svg>

                    Data aman & terlindungi

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
         FEATURES
    ========================================================== --}}

    <section
        id="fitur"
        class="section section-light"
    >

        <div class="container">

            <div class="section-heading reveal">

                <div class="section-label">
                    Fitur Unggulan
                </div>

                <h2 class="section-title">
                    Solusi Lengkap untuk Pengelolaan Digital
                </h2>

                <p class="section-description">

                    Semua kebutuhan pengajuan, verifikasi, monitoring,
                    dan pengarsipan dokumen dalam satu sistem.

                </p>

            </div>


            <div class="features-grid">

                {{-- FEATURE 1 --}}

                <div class="feature-card reveal">

                    <div class="feature-icon blue">

                        <svg
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414A1 1 0 0120 6v13a2 2 0 01-2 2z"
                            />

                        </svg>

                    </div>

                    <div class="feature-arrow">
                        →
                    </div>

                    <h3 class="feature-title">
                        Pengajuan Digital
                    </h3>

                    <p class="feature-text">

                        Ajukan kegiatan, barang, atau administrasi lainnya
                        secara online dengan formulir yang mudah digunakan.

                    </p>

                </div>


                {{-- FEATURE 2 --}}

                <div class="feature-card reveal">

                    <div class="feature-icon cyan">

                        <svg
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"
                            />

                        </svg>

                    </div>

                    <div class="feature-arrow">
                        →
                    </div>

                    <h3 class="feature-title">
                        Arsip Terorganisir
                    </h3>

                    <p class="feature-text">

                        Simpan dan kelola dokumen pengajuan secara digital
                        dalam struktur arsip yang rapi dan mudah dicari.

                    </p>

                </div>


                {{-- FEATURE 3 --}}

                <div class="feature-card reveal">

                    <div class="feature-icon navy">

                        <svg
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 006 0M9 5a3 3 0 013-3 3 3 0 013 3m-6 9l2 2 4-4"
                            />

                        </svg>

                    </div>

                    <div class="feature-arrow">
                        →
                    </div>

                    <h3 class="feature-title">
                        Tracking Real-time
                    </h3>

                    <p class="feature-text">

                        Pantau status pengajuan dan proses verifikasi
                        pada setiap tahapan dengan lebih mudah.

                    </p>

                </div>


                {{-- FEATURE 4 --}}

                <div class="feature-card reveal">

                    <div class="feature-icon sky">

                        <svg
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                            />

                        </svg>

                    </div>

                    <div class="feature-arrow">
                        →
                    </div>

                    <h3 class="feature-title">
                        Keamanan Terjamin
                    </h3>

                    <p class="feature-text">

                        Sistem menggunakan akses berbasis role sehingga
                        setiap pengguna mendapatkan hak akses sesuai kebutuhan.

                    </p>

                </div>


                {{-- FEATURE 5 --}}

                <div class="feature-card reveal">

                    <div class="feature-icon ocean">

                        <svg
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                            />

                        </svg>

                    </div>

                    <div class="feature-arrow">
                        →
                    </div>

                    <h3 class="feature-title">
                        Sistem Verifikasi
                    </h3>

                    <p class="feature-text">

                        Proses verifikasi dan persetujuan dilakukan
                        secara bertahap dan terstruktur.

                    </p>

                </div>


                {{-- FEATURE 6 --}}

                <div class="feature-card reveal">

                    <div class="feature-icon green">

                        <svg
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
                            />

                        </svg>

                    </div>

                    <div class="feature-arrow">
                        →
                    </div>

                    <h3 class="feature-title">
                        Multi User Role
                    </h3>

                    <p class="feature-text">

                        Kelola akses pengaju, verifikator, bendahara,
                        dan pengguna lainnya dengan hak akses berbeda.

                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
         BENEFITS
    ========================================================== --}}

    <section
        id="tentang"
        class="section section-white"
    >

        <div class="container">

            <div class="benefits-wrapper">

                <div class="reveal">

                    <div class="section-label">
                        Mengapa VVeP APP?
                    </div>

                    <h2 class="benefit-title">

                        Pengelolaan lebih mudah,

                        <span class="hero-title-gradient">
                            lebih terstruktur.
                        </span>

                    </h2>

                    <p class="benefit-subtitle">

                        VVeP APP membantu proses pengajuan dan verifikasi
                        menjadi lebih terorganisir tanpa harus bergantung
                        pada proses manual.

                    </p>


                    <div class="benefit-list">

                        <div class="benefit-item">

                            <div class="benefit-number">
                                01
                            </div>

                            <div>

                                <h4>
                                    Efisiensi Waktu
                                </h4>

                                <p>
                                    Proses pengajuan dan verifikasi
                                    menjadi lebih cepat dan terstruktur.
                                </p>

                            </div>

                        </div>


                        <div class="benefit-item">

                            <div class="benefit-number">
                                02
                            </div>

                            <div>

                                <h4>
                                    Paperless System
                                </h4>

                                <p>
                                    Dokumen dapat dikelola secara digital
                                    sehingga lebih praktis.
                                </p>

                            </div>

                        </div>


                        <div class="benefit-item">

                            <div class="benefit-number">
                                03
                            </div>

                            <div>

                                <h4>
                                    Transparansi
                                </h4>

                                <p>
                                    Riwayat proses pengajuan dapat dipantau
                                    dengan lebih jelas.
                                </p>

                            </div>

                        </div>


                        <div class="benefit-item">

                            <div class="benefit-number">
                                04
                            </div>

                            <div>

                                <h4>
                                    Akses Fleksibel
                                </h4>

                                <p>
                                    Sistem dapat digunakan melalui berbagai
                                    perangkat selama terhubung ke sistem.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="trust-scene reveal">

                    <div class="trust-bg"></div>


                    <div class="trust-badge one">

                        <svg
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7"
                            />

                        </svg>

                        Digital System

                    </div>


                    <div class="trust-card">

                        <div class="trust-icon">

                            <svg
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.7"
                                    d="M12 3l7 3v5c0 4.5-3 8-7 9.2C8 19 5 15.5 5 11V6l7-3z"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.7"
                                    d="M9 12l2 2 4-4"
                                />

                            </svg>

                        </div>

                        <h4>
                            Sistem Terpercaya
                        </h4>

                        <p>

                            Sistem dirancang untuk mendukung pengelolaan
                            pengajuan, verifikasi, dan arsip dokumen secara
                            digital dengan lebih terstruktur.

                        </p>

                    </div>


                    <div class="trust-badge two">

                        <svg
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 12l2 2 4-4"
                            />

                        </svg>

                        Data Terorganisir

                    </div>

                </div>

            </div>

        </div>

    </section>


    {{-- =========================================================
         FOOTER
    ========================================================== --}}

    <footer class="footer">

        <div class="footer-grid">

            {{-- KOLOM 1 --}}

            <div>

                <div class="footer-brand">

                    <div class="footer-tvri-box">

                        <img
                            src="{{ asset('images/tvri.png') }}"
                            alt="Logo TVRI"
                            class="footer-tvri-logo"
                        >

                    </div>


                    <div class="footer-brand-divider"></div>


                    <h4>
                        VVeP APP
                    </h4>

                </div>


                <p class="footer-description">

                    Solusi digital untuk mengelola pengajuan,
                    verifikasi, dan arsip dokumen secara efisien
                    dan terstruktur.

                </p>

            </div>


            {{-- KOLOM 2 --}}

            <div>

                <h4 class="footer-heading">
                    Quick Links
                </h4>


                <div class="footer-links">

                    <a href="#fitur">
                        Fitur
                    </a>

                    <a href="#tentang">
                        Tentang
                    </a>


                    @if (Route::has('login'))

                        @guest

                            <a href="{{ route('login') }}">
                                Masuk
                            </a>

                        @else

                            <a href="{{ url('/dashboard') }}">
                                Dashboard
                            </a>

                        @endguest

                    @endif

                </div>

            </div>


            {{-- KOLOM 3 --}}

            <div>

                <h4 class="footer-heading">
                    Developer
                </h4>


                <div class="developer">

                    <p class="developer-name">
                        Ryandy Rhamadhany
                    </p>

                    <p class="developer-role">
                        Backend Developer
                    </p>

                    <a
                        href="https://www.instagram.com/ryandyrhamadhany23"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        @ryandyrhamadhany23
                    </a>

                </div>


                <div class="developer">

                    <p class="developer-name">
                        Muhammad Maulidi
                    </p>

                    <p class="developer-role">
                        Frontend Developer
                    </p>

                    <a
                        href="https://instagram.com/username2"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        @username2
                    </a>

                </div>


                <div class="developer">

                    <p class="developer-name">
                        Muhammad Rio Bisma Saputra
                    </p>

                    <p class="developer-role">
                        Frontend Developer
                    </p>

                    <a
                        href="https://instagram.com/username3"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        @username3
                    </a>

                </div>

            </div>


            {{-- KOLOM 4 --}}

            <div>

                <h4 class="footer-heading">
                    Pengembang
                </h4>


                <div class="pengembang">

                    <p class="pengembang-name">
                        Nazwa Mariamah
                    </p>

                    <p class="pengembang-role">
                        Pengembang
                    </p>

                    <a
                        href="https://instagram.com/nareneevy"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        @nareneevy
                    </a>

                </div>


                <div class="pengembang">

                    <p class="pengembang-name">
                        Siti Nurkholishah
                    </p>

                    <p class="pengembang-role">
                        Pengembang
                    </p>

                    <a
                        href="https://instagram.com/siti_ica786"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        @siti_ica786
                    </a>

                </div>

            </div>

        </div>


        <div class="footer-bottom">

            © {{ date('Y') }} VVeP APP. All rights reserved.

        </div>

    </footer>

</div>


{{-- =========================================================
     SCROLL REVEAL
========================================================== --}}

<script>

    document.addEventListener(
        'DOMContentLoaded',
        function () {

            const elements =
                document.querySelectorAll('.reveal');


            const observer =
                new IntersectionObserver(

                    (entries) => {

                        entries.forEach(
                            (entry) => {

                                if (
                                    entry.isIntersecting
                                ) {

                                    entry.target.classList.add(
                                        'show'
                                    );

                                    observer.unobserve(
                                        entry.target
                                    );

                                }

                            }
                        );

                    },

                    {
                        threshold: 0.12
                    }

                );


            elements.forEach(
                (element) => {

                    observer.observe(element);

                }
            );

        }
    );

</script>

</body>

</html>