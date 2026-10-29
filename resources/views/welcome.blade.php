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

        /* =========================================================
           WIDGET 3D INTERAKTIF: JAM, TANGGAL & SAPAAN TVRI KALSEL
        ========================================================= */

        .hero-live-widget {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 24px;
            perspective: 1000px;
        }

        /* Kartu Jam & Tanggal 3D */
        .live-clock-card {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 7px 16px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(240, 247, 255, 0.9) 100%);
            border: 1.5px solid rgba(191, 219, 254, 0.75);
            border-radius: 999px;
            box-shadow:
                0 10px 22px -5px rgba(0, 58, 143, 0.12),
                inset 0 1px 2px rgba(255, 255, 255, 1);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            width: fit-content;
            transform-style: preserve-3d;
            transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
            cursor: default;
        }

        .live-clock-card:hover {
            transform: translateY(-3px) scale(1.02);
            border-color: #38bdf8;
            box-shadow:
                0 14px 28px -5px rgba(0, 102, 199, 0.22),
                0 0 16px rgba(0, 174, 239, 0.25);
        }

        .live-clock-icon {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0066c7;
        }

        .live-signal-ping {
            position: absolute;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #22c55e;
            top: -2px;
            right: -2px;
            box-shadow: 0 0 8px #22c55e;
            animation: pulseSignal 2s infinite;
        }

        .live-date-text {
            font-size: 11.5px;
            font-weight: 700;
            color: #1e3a8a;
            letter-spacing: 0.2px;
        }

        .live-clock-divider {
            width: 1.5px;
            height: 14px;
            background: rgba(147, 197, 253, 0.7);
        }

        .live-time-text {
            font-size: 12px;
            font-weight: 800;
            color: #0066c7;
            font-feature-settings: "tnum";
            font-variant-numeric: tabular-nums;
            letter-spacing: 0.5px;
        }

        /* Kartu Sapaan Lucu Harian 3D */
        .daily-greeting-card {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 18px;
            max-width: 540px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.94) 0%, rgba(244, 249, 255, 0.9) 100%);
            border: 1.5px solid rgba(226, 232, 240, 0.9);
            border-left: 4px solid #0066c7;
            border-radius: 18px;
            box-shadow:
                0 12px 25px -6px rgba(0, 58, 143, 0.1),
                0 4px 10px rgba(15, 23, 42, 0.04),
                inset 0 1px 2px rgba(255, 255, 255, 1);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            transform-style: preserve-3d;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            cursor: pointer;
            user-select: none;
        }

        .daily-greeting-card:hover {
            transform: translateY(-4px) rotateX(4deg) scale(1.015);
            border-color: rgba(96, 165, 250, 0.85);
            border-left-color: #00aeee;
            box-shadow:
                0 18px 35px -8px rgba(0, 86, 184, 0.22),
                0 0 20px rgba(0, 174, 239, 0.18);
        }

        .greeting-emoji {
            font-size: 24px;
            line-height: 1;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.12));
            transition: transform 0.3s ease;
        }

        .daily-greeting-card:hover .greeting-emoji {
            transform: scale(1.25) rotate(12deg);
        }

        .greeting-content {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .greeting-day-tag {
            font-size: 10px;
            font-weight: 800;
            color: #0284c7;
            letter-spacing: 0.8px;
            text-transform: uppercase;
        }

        .greeting-text {
            margin: 0;
            font-size: 12.5px;
            font-weight: 600;
            color: #334155;
            line-height: 1.5;
            transition: color 0.3s ease;
        }

        .daily-greeting-card:hover .greeting-text {
            color: #003a8f;
        }

        /* Badge Lama Disederhanakan */
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 8px 16px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(96, 165, 250, 0.3);
            color: #0056b8;
            font-size: 11px;
            font-weight: 700;
            box-shadow: 0 6px 18px rgba(0, 86, 184, 0.06);
            margin-bottom: 20px;
            width: fit-content;
        }

        .hero-badge-dot {
            width: 8px;
            height: 8px;
            background: #16a34a;
            border-radius: 50%;
            box-shadow: 0 0 0 4px rgba(22, 163, 74, 0.14);
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

        /* =========================================================
           HERO VISUAL - 3D INTERACTIVE BROADCAST TVRI KALSEL
        ========================================================= */

        .hero-visual {
            position: relative;
            min-height: 460px;
            perspective: 1400px;
            perspective-origin: 50% 40%;
            animation: fadeRight 1s ease forwards;
        }

        /* Gelombang Pemancar Sinyal TVRI Kalsel */
        .broadcast-wave {
            position: absolute;
            top: 50%;
            left: 55%;
            transform: translate(-50%, -50%);
            width: 440px;
            height: 440px;
            border-radius: 50%;
            border: 2px dashed rgba(0, 102, 199, 0.18);
            pointer-events: none;
            animation: radarRotate 24s linear infinite;
        }

        .broadcast-wave::after {
            content: "";
            position: absolute;
            inset: -45px;
            border-radius: 50%;
            border: 1px solid rgba(0, 174, 239, 0.12);
            animation: pulseSignal 3.5s ease-out infinite;
        }

        .floating-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(1px);
            pointer-events: none;
            animation: floating 6s ease-in-out infinite;
        }

        .orb-one {
            width: 120px;
            height: 120px;
            background: radial-gradient(circle, rgba(0, 174, 239, 0.35) 0%, rgba(0, 58, 143, 0.1) 70%, transparent 100%);
            top: -20px;
            right: 20px;
            opacity: 0.75;
        }

        .orb-two {
            width: 90px;
            height: 90px;
            background: radial-gradient(circle, rgba(245, 158, 11, 0.3) 0%, rgba(0, 102, 199, 0.15) 60%, transparent 100%);
            bottom: 25px;
            left: -20px;
            opacity: 0.65;
            animation-delay: -3s;
        }

        /* Papan Utama 3D Dashboard */
        .dashboard-3d {
            position: absolute;
            width: 100%;
            max-width: 530px;
            height: 355px;
            right: 0;
            top: 40px;
            border-radius: 28px;
            padding: 22px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(240, 247, 255, 0.9) 100%);
            border: 1.5px solid rgba(255, 255, 255, 0.9);
            box-shadow:
                0 35px 65px -15px rgba(0, 58, 143, 0.22),
                0 15px 30px -8px rgba(0, 174, 239, 0.16),
                inset 0 1px 2px rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            transform-style: preserve-3d;
            transform: rotateY(-14deg) rotateX(9deg) rotateZ(1deg);
            transition: all 0.55s cubic-bezier(0.165, 0.84, 0.44, 1);
            overflow: hidden;
            cursor: pointer;
        }

        /* Pantulan Kilau Cahaya (Sheen Hologram) */
        .dashboard-3d::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -60%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                60deg,
                transparent 40%,
                rgba(255, 255, 255, 0.55) 50%,
                rgba(0, 174, 239, 0.2) 53%,
                transparent 60%
            );
            transform: rotate(25deg);
            transition: all 0.75s ease;
            pointer-events: none;
            opacity: 0.6;
        }

        .hero-visual:hover .dashboard-3d {
            transform: rotateY(-4deg) rotateX(4deg) translateY(-14px) scale(1.02);
            box-shadow:
                0 45px 80px -15px rgba(0, 58, 143, 0.32),
                0 20px 40px -10px rgba(0, 174, 239, 0.28),
                inset 0 2px 3px rgba(255, 255, 255, 1);
            border-color: rgba(96, 165, 250, 0.8);
        }

        .hero-visual:hover .dashboard-3d::before {
            left: 80%;
            top: 20%;
        }

        /* Header Dashboard */
        .dashboard-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 16px;
            border-bottom: 1px solid rgba(226, 232, 240, 0.7);
            transform: translateZ(25px);
            transition: transform 0.4s ease;
        }

        .dashboard-brand-pill {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 4px 11px;
            background: rgba(0, 86, 184, 0.08);
            border-radius: 99px;
            border: 1px solid rgba(0, 102, 199, 0.15);
            font-size: 11px;
            font-weight: 700;
            color: #003a8f;
            letter-spacing: 0.3px;
        }

        /* LED Indikator Siaran ON-AIR */
        .live-on-air {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 10px;
            font-weight: 800;
            color: #15803d;
            background: rgba(34, 197, 94, 0.12);
            border: 1px solid rgba(34, 197, 94, 0.3);
            padding: 3px 9px;
            border-radius: 999px;
            letter-spacing: 0.5px;
        }

        .live-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #16a34a;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.3);
            animation: pulseDot 1.4s infinite;
        }

        .dashboard-main {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            padding-top: 14px;
            transform-style: preserve-3d;
        }

        /* Mini Cards 3D Pop-Out */
        .mini-card {
            min-height: 110px;
            padding: 14px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.85);
            border: 1px solid rgba(203, 213, 225, 0.8);
            box-shadow: 0 8px 22px rgba(15, 23, 42, 0.05);
            transform: translateZ(20px);
            transition: all 0.4s ease;
        }

        .hero-visual:hover .mini-card {
            transform: translateZ(40px);
            box-shadow: 0 16px 30px rgba(0, 58, 143, 0.12);
        }

        .mini-card.wide {
            grid-column: span 2;
            min-height: 98px;
            transform: translateZ(25px);
        }

        .hero-visual:hover .mini-card.wide {
            transform: translateZ(48px);
        }

        .mini-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .mini-icon {
            width: 33px;
            height: 33px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #002b66 0%, #0066c7 60%, #00aeee 100%);
            color: white;
            box-shadow: 0 6px 14px rgba(0, 86, 184, 0.25);
            transition: transform 0.3s ease;
        }

        .hero-visual:hover .mini-icon {
            transform: scale(1.1) rotate(-5deg);
        }

        .mini-icon.gold {
            background: linear-gradient(135deg, #b45309 0%, #f59e0b 60%, #fbbf24 100%);
            box-shadow: 0 6px 14px rgba(245, 158, 11, 0.3);
        }

        .mini-icon svg {
            width: 17px;
            height: 17px;
        }

        .mini-stat-num {
            font-size: 15px;
            font-weight: 800;
            color: #0b2f63;
            letter-spacing: -0.3px;
        }

        .mini-stat-label {
            font-size: 11px;
            font-weight: 600;
            color: #64748b;
        }

        /* Broadcast Equalizer / Waveform Chart */
        .chart {
            display: flex;
            align-items: flex-end;
            gap: 7px;
            height: 52px;
            padding-top: 6px;
        }

        .chart-bar {
            flex: 1;
            border-radius: 6px 6px 2px 2px;
            background: linear-gradient(180deg, #00aeee 0%, #0056b8 100%);
            min-height: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 174, 239, 0.25);
        }

        .chart-bar:nth-child(1) { height: 40%; }
        .chart-bar:nth-child(2) { height: 65%; }
        .chart-bar:nth-child(3) { height: 48%; }
        .chart-bar:nth-child(4) { height: 85%; }
        .chart-bar:nth-child(5) { height: 60%; }
        .chart-bar:nth-child(6) { height: 96%; background: linear-gradient(180deg, #38bdf8 0%, #0066c7 100%); }

        .hero-visual:hover .chart-bar {
            filter: brightness(1.12);
        }

        /* 3D Floating Badges Melayang */
        .floating-card {
            position: absolute;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 18px;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.95);
            border-radius: 18px;
            box-shadow:
                0 20px 40px -8px rgba(0, 58, 143, 0.18),
                0 8px 16px rgba(15, 23, 42, 0.06);
            font-size: 11px;
            font-weight: 700;
            color: #0f172a;
            z-index: 5;
            transition: all 0.4s ease;
            cursor: pointer;
        }

        .floating-card:hover {
            transform: translateY(-8px) scale(1.05) !important;
            box-shadow:
                0 25px 50px -8px rgba(0, 58, 143, 0.28),
                0 12px 20px rgba(0, 174, 239, 0.2);
            border-color: #60a5fa;
        }

        .floating-card svg {
            width: 20px;
            height: 20px;
            color: #0066c7;
        }

        .floating-card.one {
            top: 15px;
            left: -20px;
            animation: floating 4.5s ease-in-out infinite;
        }

        .floating-card.two {
            bottom: 10px;
            right: 15px;
            animation: floating 5s ease-in-out infinite;
            animation-delay: -2.5s;
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
           FEATURE CARDS - 3D TVRI KALSEL BROADCAST CARDS
        ========================================================= */

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 26px;
            perspective: 1200px;
        }

        .feature-card {
            position: relative;
            padding: 30px;
            min-height: 255px;
            border-radius: 26px;
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.96) 0%, rgba(246, 250, 255, 0.92) 100%);
            border: 1.5px solid rgba(226, 232, 240, 0.85);
            box-shadow:
                0 14px 35px -8px rgba(0, 58, 143, 0.08),
                0 4px 12px rgba(15, 23, 42, 0.03),
                inset 0 1px 1px rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            overflow: hidden;
            transform-style: preserve-3d;
            transition: all 0.45s cubic-bezier(0.165, 0.84, 0.44, 1);
            cursor: pointer;
        }

        /* Pantulan Kilau Hologram Studio */
        .feature-card::before {
            content: "";
            position: absolute;
            top: -60%;
            left: -60%;
            width: 220%;
            height: 220%;
            background: linear-gradient(
                60deg,
                transparent 42%,
                rgba(255, 255, 255, 0.6) 50%,
                rgba(0, 174, 239, 0.15) 54%,
                transparent 62%
            );
            transform: rotate(25deg);
            transition: all 0.65s ease;
            pointer-events: none;
            opacity: 0;
            z-index: 1;
        }

        /* Garis Aksen Siaran TVRI + Emas Banua */
        .feature-card::after {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #002b66 0%, #0066c7 40%, #00aeee 75%, #f59e0b 100%);
            transform: scaleX(0.2);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .feature-card:hover {
            transform: translateY(-12px) rotateX(6deg) rotateY(-2deg) scale(1.02);
            border-color: rgba(96, 165, 250, 0.75);
            box-shadow:
                0 30px 60px -12px rgba(0, 58, 143, 0.22),
                0 14px 28px -6px rgba(0, 174, 239, 0.22),
                inset 0 1px 3px rgba(255, 255, 255, 1);
        }

        .feature-card:hover::before {
            opacity: 1;
            left: 40%;
            top: 20%;
        }

        .feature-card:hover::after {
            transform: scaleX(1);
        }

        /* Ikon 3D Pop-Out */
        .feature-icon {
            position: relative;
            z-index: 2;
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 18px;
            color: white;
            margin-bottom: 22px;
            box-shadow:
                0 12px 24px -4px rgba(0, 86, 184, 0.3),
                inset 0 2px 4px rgba(255, 255, 255, 0.35);
            transform: translateZ(25px);
            transition: all 0.4s ease;
        }

        .feature-card:hover .feature-icon {
            transform: translateZ(45px) rotate(-6deg) scale(1.12);
            box-shadow:
                0 18px 30px -4px rgba(0, 86, 184, 0.42),
                0 0 20px rgba(0, 174, 239, 0.4),
                inset 0 2px 4px rgba(255, 255, 255, 0.5);
        }

        /* Varian Warna Ikon TVRI Kalsel */
        .blue {
            background: linear-gradient(135deg, #002b66 0%, #0066c7 100%);
        }

        .cyan {
            background: linear-gradient(135deg, #0056b8 0%, #00aeee 100%);
        }

        .navy {
            background: linear-gradient(135deg, #0b2f63 0%, #004b99 100%);
        }

        .sky {
            background: linear-gradient(135deg, #0066c7 0%, #38bdf8 100%);
        }

        .ocean {
            background: linear-gradient(135deg, #003a8f 0%, #0891b2 100%);
        }

        .green {
            background: linear-gradient(135deg, #0056b8 0%, #0284c7 60%, #10b981 100%);
        }

        .feature-icon svg {
            width: 26px;
            height: 26px;
        }

        .feature-title {
            position: relative;
            z-index: 2;
            margin: 0 0 10px;
            color: #0b2f63;
            font-size: 18px;
            font-weight: 800;
            letter-spacing: -0.3px;
            transform: translateZ(15px);
            transition: transform 0.4s ease, color 0.3s ease;
        }

        .feature-card:hover .feature-title {
            transform: translateZ(25px);
            color: #0056b8;
        }

        .feature-text {
            position: relative;
            z-index: 2;
            margin: 0;
            color: #64748b;
            font-size: 13px;
            line-height: 1.8;
            transform: translateZ(10px);
            transition: transform 0.4s ease;
        }

        .feature-card:hover .feature-text {
            transform: translateZ(18px);
        }

        /* 3D Arrow Button */
        .feature-arrow {
            position: absolute;
            top: 25px;
            right: 24px;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0066c7;
            background: rgba(239, 246, 255, 0.9);
            border: 1px solid rgba(191, 219, 254, 0.6);
            transform: translateZ(20px);
            transition: all 0.35s ease;
            box-shadow: 0 4px 10px rgba(0, 86, 184, 0.08);
        }

        .feature-card:hover .feature-arrow {
            background: linear-gradient(135deg, #003a8f 0%, #00aeee 100%);
            color: white;
            border-color: transparent;
            transform: translateZ(35px) translateX(4px) scale(1.1);
            box-shadow: 0 8px 20px rgba(0, 86, 184, 0.32);
        }
        /* =========================================================
           BENEFITS - 3D INTERACTIVE TVRI KALSEL
        ========================================================= */

        .benefits-wrapper {
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 70px;
            align-items: center;
        }

        .benefit-title {
            font-size: clamp(28px, 3.2vw, 42px);
            line-height: 1.18;
            color: #0b2f63;
            font-weight: 800;
            letter-spacing: -1.2px;
            margin: 0 0 14px;
        }

        .benefit-subtitle {
            color: #64748b;
            font-size: 14px;
            line-height: 1.85;
            margin-bottom: 34px;
            max-width: 550px;
        }

        .benefit-list {
            display: grid;
            gap: 16px;
        }

        .benefit-item {
            display: flex;
            gap: 18px;
            align-items: flex-start;
            padding: 14px 18px;
            border-radius: 20px;
            background: transparent;
            border: 1px solid transparent;
            transition: all 0.35s ease;
            cursor: pointer;
        }

        .benefit-item:hover {
            background: rgba(240, 247, 255, 0.85);
            border-color: rgba(191, 219, 254, 0.6);
            transform: translateX(10px);
            box-shadow: 0 10px 25px -5px rgba(0, 58, 143, 0.08);
        }

        /* Nomor Langkah 3D Bevel */
        .benefit-number {
            flex-shrink: 0;
            width: 48px;
            height: 48px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 800;
            font-size: 13px;
            background: linear-gradient(135deg, #002b66 0%, #0066c7 60%, #00aeee 100%);
            box-shadow:
                0 10px 22px rgba(0, 86, 184, 0.28),
                inset 0 2px 3px rgba(255, 255, 255, 0.4);
            transition: all 0.35s ease;
        }

        .benefit-item:hover .benefit-number {
            transform: scale(1.1) rotate(-5deg);
            box-shadow: 0 14px 28px rgba(0, 174, 239, 0.4);
        }

        .benefit-item h4 {
            margin: 0 0 5px;
            font-size: 16px;
            color: #0b2f63;
            font-weight: 800;
            letter-spacing: -0.2px;
            transition: color 0.3s ease;
        }

        .benefit-item:hover h4 {
            color: #0056b8;
        }

        .benefit-item p {
            margin: 0;
            color: #64748b;
            font-size: 13px;
            line-height: 1.7;
        }

        /* =========================================================
           3D TRUST SCENE & CONSOLE
        ========================================================= */

        .trust-scene {
            min-height: 460px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            perspective: 1200px;
        }

        .trust-bg {
            position: absolute;
            inset: 20px;
            border-radius: 38px;
            background:
                radial-gradient(circle at 25% 25%, rgba(255, 255, 255, 0.9), transparent 40%),
                linear-gradient(135deg, #d8eeff 0%, #cbe7ff 100%);
            border: 2px dashed rgba(0, 102, 199, 0.2);
            transform: rotate(-5deg);
            box-shadow: 0 30px 65px rgba(0, 86, 184, 0.12);
            transition: transform 0.5s ease;
        }

        .trust-scene:hover .trust-bg {
            transform: rotate(-2deg) scale(1.02);
        }

        /* Kartu Konsol Kaca 3D */
        .trust-card {
            position: relative;
            z-index: 2;
            width: 350px;
            min-height: 330px;
            padding: 38px 32px;
            border-radius: 30px;
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.96) 0%, rgba(240, 247, 255, 0.92) 100%);
            border: 1.5px solid rgba(255, 255, 255, 0.95);
            box-shadow:
                0 35px 70px -15px rgba(0, 58, 143, 0.22),
                0 15px 30px -8px rgba(0, 174, 239, 0.16),
                inset 0 1px 2px rgba(255, 255, 255, 1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            transform-style: preserve-3d;
            transform: rotateY(-13deg) rotateX(8deg);
            transition: all 0.55s cubic-bezier(0.165, 0.84, 0.44, 1);
            cursor: pointer;
        }

        .trust-scene:hover .trust-card {
            transform: rotateY(-3deg) rotateX(3deg) translateY(-12px) scale(1.03);
            box-shadow:
                0 45px 85px -15px rgba(0, 58, 143, 0.32),
                0 20px 40px -10px rgba(0, 174, 239, 0.28);
            border-color: rgba(96, 165, 250, 0.8);
        }

        .trust-icon {
            width: 82px;
            height: 82px;
            border-radius: 26px;
            margin: 0 auto 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            background: linear-gradient(135deg, #002b66 0%, #0066c7 50%, #00aeee 100%);
            box-shadow:
                0 20px 35px rgba(0, 86, 184, 0.32),
                inset 0 3px 6px rgba(255, 255, 255, 0.4);
            transform: translateZ(35px);
            transition: all 0.4s ease;
        }

        .trust-scene:hover .trust-icon {
            transform: translateZ(50px) scale(1.1) rotate(5deg);
            box-shadow: 0 25px 45px rgba(0, 174, 239, 0.45);
        }

        .trust-icon svg {
            width: 40px;
            height: 40px;
        }

        .trust-card h4 {
            text-align: center;
            margin: 0 0 12px;
            font-size: 22px;
            font-weight: 800;
            color: #0b2f63;
            letter-spacing: -0.5px;
            transform: translateZ(25px);
        }

        .trust-card p {
            text-align: center;
            color: #64748b;
            font-size: 13px;
            line-height: 1.85;
            margin: 0;
            transform: translateZ(15px);
        }

        /* 3D Floating Badges */
        .trust-badge {
            position: absolute;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 11px 16px;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(255, 255, 255, 0.95);
            box-shadow:
                0 18px 35px -8px rgba(0, 58, 143, 0.18),
                0 6px 14px rgba(15, 23, 42, 0.05);
            font-size: 11px;
            font-weight: 700;
            color: #1e293b;
            z-index: 5;
            transform: translateZ(45px);
            transition: all 0.4s ease;
        }

        .trust-badge:hover {
            transform: translateZ(60px) scale(1.08) translateY(-4px);
            box-shadow: 0 22px 42px rgba(0, 86, 184, 0.28);
            border-color: #60a5fa;
        }

        .trust-badge svg {
            width: 17px;
            height: 17px;
            color: #16a34a;
        }

        .trust-badge.one {
            top: 45px;
            left: 5px;
            animation: floating 4.5s ease-in-out infinite;
        }

        .trust-badge.two {
            bottom: 45px;
            right: -5px;
            animation: floating 5s ease-in-out infinite;
            animation-delay: -2.2s;
        }
        /* =========================================================
           FOOTER - 3D TVRI KALSEL BROADCAST NIGHT STUDIO
        ========================================================= */

        .footer {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at 85% 15%, rgba(0, 102, 199, 0.28), transparent 35%),
                radial-gradient(circle at 15% 85%, rgba(0, 174, 239, 0.15), transparent 30%),
                linear-gradient(160deg, #041026 0%, #081c3c 55%, #051329 100%);
            color: white;
            padding: 85px 26px 30px;
            border-top: 3px solid transparent;
            border-image: linear-gradient(90deg, transparent 5%, #0066c7 25%, #00aeee 50%, #f59e0b 75%, transparent 95%) 1;
        }

        /* Ambient Glow Penyiaran */
        .footer::before {
            content: "";
            position: absolute;
            width: 550px;
            height: 300px;
            left: -180px;
            bottom: -100px;
            background: radial-gradient(circle, rgba(0, 174, 239, 0.18) 0%, transparent 70%);
            filter: blur(65px);
            border-radius: 50%;
            pointer-events: none;
        }

        .footer-grid {
            position: relative;
            z-index: 2;
            max-width: 1280px;
            margin: auto;
            display: grid;
            grid-template-columns: 1.25fr 0.75fr 1fr 1fr;
            gap: 45px;
        }

        /* Brand & Logo TVRI 3D */
        .footer-brand {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 20px;
        }

        .footer-tvri-box {
            width: 84px;
            height: 52px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ffffff;
            border-radius: 14px;
            padding: 7px 10px;
            overflow: hidden;
            border: 1.5px solid rgba(255, 255, 255, 0.9);
            box-shadow:
                0 12px 25px rgba(0, 0, 0, 0.35),
                0 0 20px rgba(0, 174, 239, 0.25),
                inset 0 1px 2px rgba(255, 255, 255, 1);
            transform: perspective(600px) rotateY(-8deg);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            cursor: pointer;
        }

        .footer-tvri-box:hover {
            transform: perspective(600px) rotateY(0deg) translateY(-4px) scale(1.06);
            box-shadow:
                0 18px 35px rgba(0, 86, 184, 0.45),
                0 0 25px rgba(0, 174, 239, 0.5);
        }

        .footer-tvri-logo {
            width: 100%;
            height: 100%;
            object-fit: contain;
            display: block;
        }

        .footer-brand-divider {
            width: 2px;
            height: 34px;
            background: linear-gradient(180deg, transparent, rgba(96, 165, 250, 0.8), transparent);
        }

        .footer-brand h4 {
            margin: 0;
            font-size: 20px;
            font-weight: 800;
            letter-spacing: -0.5px;
            background: linear-gradient(100deg, #ffffff 30%, #93c5fd 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .footer-description {
            color: #94a3b8;
            font-size: 13px;
            line-height: 1.85;
            max-width: 380px;
        }

        .footer-station-tag {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            margin-top: 15px;
            padding: 6px 12px;
            background: rgba(0, 86, 184, 0.2);
            border: 1px solid rgba(0, 174, 239, 0.25);
            border-radius: 99px;
            font-size: 10.5px;
            font-weight: 700;
            color: #38bdf8;
            letter-spacing: 0.5px;
        }

        .footer-station-tag span {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #22c55e;
            box-shadow: 0 0 8px #22c55e;
        }

        /* Heading Kolom */
        .footer-heading {
            font-size: 15px;
            font-weight: 800;
            margin: 0 0 20px;
            color: #ffffff;
            letter-spacing: 0.3px;
            position: relative;
            padding-bottom: 8px;
        }

        .footer-heading::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 28px;
            height: 3px;
            border-radius: 99px;
            background: linear-gradient(90deg, #00aeee, #0056b8);
        }

        /* Quick Links Interaktif */
        .footer-links {
            display: grid;
            gap: 12px;
        }

        .footer-links a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #94a3b8;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.25s ease;
            width: fit-content;
        }

        .footer-links a::before {
            content: "▸";
            color: #00aeee;
            font-size: 12px;
            opacity: 0;
            transform: translateX(-5px);
            transition: all 0.25s ease;
        }

        .footer-links a:hover {
            color: #38bdf8;
            transform: translateX(6px);
        }

        .footer-links a:hover::before {
            opacity: 1;
            transform: translateX(0);
        }

        /* 3D Glass Cards untuk Profil Tim Pengembang */
        .developer,
        .pengembang {
            margin-bottom: 14px;
            padding: 11px 14px;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
            transform: perspective(600px) translateZ(0);
        }

        .developer:hover,
        .pengembang:hover {
            background: rgba(0, 102, 199, 0.16);
            border-color: rgba(0, 174, 239, 0.4);
            transform: perspective(600px) translateY(-5px) translateZ(20px) scale(1.02);
            box-shadow:
                0 12px 25px -5px rgba(0, 58, 143, 0.35),
                0 0 15px rgba(0, 174, 239, 0.2);
        }

        .developer-name,
        .pengembang-name {
            color: #f8fafc;
            font-size: 13px;
            font-weight: 700;
            margin: 0;
            letter-spacing: -0.2px;
        }

        .developer-role,
        .pengembang-role {
            color: #38bdf8;
            font-size: 11px;
            font-weight: 600;
            margin: 2px 0 6px;
        }

        .developer a,
        .pengembang a {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            color: #94a3b8;
            font-size: 11px;
            padding: 3px 8px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 6px;
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.25s ease;
            text-decoration: none;
        }

        .developer a:hover,
        .pengembang a:hover {
            color: #ffffff;
            background: linear-gradient(135deg, #0056b8, #00aeee);
            border-color: transparent;
            box-shadow: 0 4px 12px rgba(0, 174, 239, 0.35);
        }

        /* Bottom Footer */
        .footer-bottom {
            position: relative;
            z-index: 2;
            max-width: 1280px;
            margin: 55px auto 0;
            padding-top: 24px;
            border-top: 1px solid rgba(148, 163, 184, 0.15);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            color: #64748b;
            font-size: 12px;
        }

        .footer-bottom-tagline {
            color: #94a3b8;
            font-weight: 500;
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
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-12px) rotate(1deg);
            }
        }

        @keyframes pulseSignal {
            0% {
                transform: scale(0.9);
                opacity: 0.6;
            }
            50% {
                opacity: 0.2;
            }
            100% {
                transform: scale(1.22);
                opacity: 0;
            }
        }

        @keyframes radarRotate {
            from {
                transform: translate(-50%, -50%) rotate(0deg);
            }
            to {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        @keyframes pulseDot {
            0%, 100% {
                box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.4);
                transform: scale(1);
            }
            50% {
                box-shadow: 0 0 0 6px rgba(34, 197, 94, 0.1);
                transform: scale(1.15);
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

                {{-- WIDGET 3D: JAM, TANGGAL & SAPAAN LUCU HARIAN --}}
                <div class="hero-live-widget">

                    {{-- Baris 1: Jam & Tanggal Digital TVRI (WITA) --}}
                    <div class="live-clock-card" title="Waktu Resmi Stasiun TVRI Kalimantan Selatan">
                        <div class="live-clock-icon">
                            <span class="live-signal-ping"></span>
                            <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" stroke-width="2"/>
                                <polyline points="12 6 12 12 16 14" stroke-width="2"/>
                            </svg>
                        </div>
                        <span class="live-date-text" id="liveDate">Memuat tanggal...</span>
                        <div class="live-clock-divider"></div>
                        <span class="live-time-text" id="liveTime">00:00:00 WITA</span>
                    </div>

                    {{-- Baris 2: Sapaan Menarik & Lucu Harian (Bisa Diklik!) --}}
                    <div class="daily-greeting-card" id="greetingCard" title="Klik untuk ganti sapaan lucu lainnya!">
                        <span class="greeting-emoji" id="greetingEmoji">☕</span>
                        <div class="greeting-content">
                            <span class="greeting-day-tag" id="greetingDayTag">HARI INI</span>
                            <p class="greeting-text" id="greetingText">Memuat sapaan hari ini...</p>
                        </div>
                    </div>

                </div>

                {{-- Sub Badge Sistem --}}
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

                {{-- Efek Radar Pemancar Transmisi TVRI Kalsel --}}
                <div class="broadcast-wave"></div>

                <div class="floating-orb orb-one"></div>
                <div class="floating-orb orb-two"></div>

                {{-- Floating Badge 1 --}}
                <div class="floating-card one">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>Verifikasi Digital Terintegrasi</span>
                </div>

                {{-- 3D Mockup Dashboard --}}
                <div class="dashboard-3d">

                    {{-- Top Header Mockup --}}
                    <div class="dashboard-top">
                        <div class="dashboard-brand-pill">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="2" y="7" width="20" height="15" rx="3" />
                                <polyline points="17 2 12 7 7 2" />
                            </svg>
                            TVRI STASIUN KALSEL
                        </div>

                        <div class="live-on-air">
                            <span class="live-dot"></span>
                            SYSTEM ON-AIR
                        </div>
                    </div>

                    {{-- Main Content Mockup --}}
                    <div class="dashboard-main">

                        {{-- Card 1: Pengajuan Siaran & Kegiatan --}}
                        <div class="mini-card">
                            <div class="mini-card-header">
                                <div class="mini-icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414A1 1 0 0120 6v13a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">100% Valid</span>
                            </div>
                            <div class="mini-stat-num">SPJ & Anggaran</div>
                            <div class="mini-stat-label">Validasi Keuangan Cepat</div>
                        </div>

                        {{-- Card 2: Arsip Digital Banua --}}
                        <div class="mini-card">
                            <div class="mini-card-header">
                                <div class="mini-icon gold">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                    </svg>
                                </div>
                                <span class="text-xs font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded-full">Tersimpan</span>
                            </div>
                            <div class="mini-stat-num">Arsip Digital</div>
                            <div class="mini-stat-label">Dokumen Permanen TVRI</div>
                        </div>

                        {{-- Card Wide: Broadcast Equalizer Stream --}}
                        <div class="mini-card wide">
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-xs font-bold text-slate-700">Aktivitas Verifikasi Siaran & Pengeluaran</span>
                                <span class="text-[10px] font-semibold text-blue-600">Real-Time Data</span>
                            </div>

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

                {{-- Floating Badge 2 --}}
                <div class="floating-card two">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                    <span>Keamanan Arsip Berbasis TVRI</span>
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

            {{-- KOLOM 1: BRAND TVRI KALSEL --}}
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

                    <h4>VVeP APP</h4>
                </div>

                <p class="footer-description">
                    Sistem Verifikasi & Validasi Elektronik Pembayaran serta Pengarsipan Digital resmi Stasiun TVRI Kalimantan Selatan.
                </p>

                <div class="footer-station-tag">
                    <span></span>
                    TVRI STASIUN KALIMANTAN SELATAN
                </div>
            </div>

            {{-- KOLOM 2: QUICK LINKS --}}
            <div>
                <h4 class="footer-heading">Quick Links</h4>

                <div class="footer-links">
                    <a href="#fitur">Fitur Unggulan</a>
                    <a href="#tentang">Tentang Sistem</a>

                    @if (Route::has('login'))
                        @guest
                            <a href="{{ route('login') }}">Masuk ke Sistem</a>
                        @else
                            <a href="{{ url('/dashboard') }}">Buka Dashboard</a>
                        @endguest
                    @endif
                </div>
            </div>

            {{-- KOLOM 3: DEVELOPER --}}
            <div>
                <h4 class="footer-heading">Developer</h4>

                <div class="developer">
                    <p class="developer-name">Ryandy Rhamadhany</p>
                    <p class="developer-role">Backend Developer</p>
                    <a href="https://www.instagram.com/ryandyrhamadhany23" target="_blank" rel="noopener noreferrer">
                        <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        @ryandyrhamadhany23
                    </a>
                </div>

                <div class="developer">
                    <p class="developer-name">Muhammad Maulidi</p>
                    <p class="developer-role">Frontend Developer</p>
                    <a href="https://instagram.com/username2" target="_blank" rel="noopener noreferrer">
                        <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        @username2
                    </a>
                </div>

                <div class="developer">
                    <p class="developer-name">Muhammad Rio Bisma Saputra</p>
                    <p class="developer-role">Frontend Developer</p>
                    <a href="https://instagram.com/username3" target="_blank" rel="noopener noreferrer">
                        <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        @username3
                    </a>
                </div>
            </div>

            {{-- KOLOM 4: PENGEMBANG --}}
            <div>
                <h4 class="footer-heading">Pengembang</h4>

                <div class="pengembang">
                    <p class="pengembang-name">Nazwa Mariamah</p>
                    <p class="pengembang-role">Pengembang</p>
                    <a href="https://instagram.com/nayaneevy" target="_blank" rel="noopener noreferrer">
                        <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        @nayaneevy
                    </a>
                </div>

                <div class="pengembang">
                    <p class="pengembang-name">Siti Nurkholishah</p>
                    <p class="pengembang-role">Pengembang</p>
                    <a href="https://instagram.com/siti_ica786" target="_blank" rel="noopener noreferrer">
                        <svg width="12" height="12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        @siti_ica786
                    </a>
                </div>
            </div>

        </div>

        {{-- FOOTER BOTTOM --}}
        <div class="footer-bottom">
            <div>
                © {{ date('Y') }} <strong>VVeP APP</strong> — All rights reserved.
            </div>
            <div class="footer-bottom-tagline">
                LPP TVRI Stasiun Kalimantan Selatan • Saluran Pemersatu Bangsa
            </div>
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

            // =========================================================
            // JAM REAL-TIME WITA & SAPAAN HARIAN LUCU TVRI KALSEL
            // =========================================================
            const hariList = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const bulanList = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

                    // Bank Sapaan Harian Universal & Menghibur untuk Semua Insan TVRI Kalsel
            const sapaanHarian = {
                1: [ // SENIN
                    { emoji: "☕", tag: "SENIN SEMANGAT", text: "Awali pekan dengan senyuman! Secangkir kopi hangat siap menemani karya terbaikmu hari ini~" },
                    { emoji: "🚀", tag: "SENIN GASPOL", text: "Bismillah hari Senin lancar! Semoga segala tugas dan urusan hari ini dipermudah!" },
                    { emoji: "📺", tag: "SENIN INSPIRATIF", text: "Semangat Senin seluruh keluarga besar TVRI Kalsel! Bersama kita berikan yang terbaik untuk Banua!" }
                ],
                2: [ // SELASA
                    { emoji: "✨", tag: "SELASA CERIA", text: "Hari Selasa penuh energi! Mau di studio, meja kerja, atau di lapangan, tetap jaga senyum ya!" },
                    { emoji: "💧", tag: "SELASA FOKUS", text: "Jangan lupa minum air putih biar pikiran tetap segar dan pekerjaan tuntas tepat waktu!" },
                    { emoji: "🤝", tag: "SELASA KOMPAK", text: "Kerja kompak, hasil memikat! Kebanggaan TVRI Kalsel ada pada dedikasi kita bersama!" }
                ],
                3: [ // RABU
                    { emoji: "🔥", tag: "RABU MENGGEBU", text: "Sudah pertengahan minggu nih! Tetap semangat, jangan lupa istirahat makan siang yang nikmat ya!" },
                    { emoji: "🍲", tag: "RABU BANUA", text: "Tetap adem dan tenang walau aktivitas padat. Tarik nafas, hembuskan, lalu gaspol lagi!" },
                    { emoji: "🎯", tag: "RABU PRODUKTIF", text: "Setiap langkah kecil yang tuntas hari ini adalah kontribusi besar bagi kemajuan TVRI Kalsel!" }
                ],
                4: [ // KAMIS
                    { emoji: "🌸", tag: "KAMIS MANIS", text: "Kamis manis hari yang harmonis! Tinggal selangkah lagi menuju akhir pekan, tetap fokus dan teliti ya!" },
                    { emoji: "💼", tag: "KAMIS RAPI", text: "Tugas rapi dan tuntas itu bikin hati tenang. Semoga harimu menyenangkan dan bebas kendala!" },
                    { emoji: "😉", tag: "KAMIS ENERGIK", text: "Senyum itu ibadah dan bikin awet muda, apalagi kalau semua pekerjaan hari ini beres lancar!" }
                ],
                5: [ // JUMAT
                    { emoji: "🕌", tag: "JUMAT BERKAH", text: "Jumat penuh berkah! Semoga kerja keras dan pengabdian kita bernilai ibadah serta kebaikan!" },
                    { emoji: "🤲", tag: "JUMAT SEJUK", text: "Selesaikan tanggung jawab hari ini dengan tenang biar akhir pekan bisa istirahat dengan nyaman!" },
                    { emoji: "🎉", tag: "JUMAT CERIA", text: "Alhamdulillah sudah hari Jumat! Terima kasih atas dedikasi luar biasa seluruh insan TVRI Kalsel pekan ini!" }
                ],
                6: [ // SABTU
                    { emoji: "🎬", tag: "SABTU SERU", text: "Sabtu ceria! Untuk yang bertugas siaran & operasional tetap semangat, untuk yang libur selamat rehat!" },
                    { emoji: "🌿", tag: "SABTU SANTAI", text: "Selamat akhir pekan! Manfaatkan waktu untuk recharge energi positif bersama keluarga tercinta!" },
                    { emoji: "☕", tag: "SABTU DAMAI", text: "Nikmati suasana akhir pekan di Banua yang nyaman. Jaga kesehatan dan selalu bahagia!" }
                ],
                0: [ // MINGGU
                    { emoji: "☀️", tag: "MINGGU TENANG", text: "Happy Sunday! Selamat menikmati hari libur dan memanjakan diri sebelum kembali beraktivitas esok!" },
                    { emoji: "🌻", tag: "MINGGU RELAKS", text: "Rehat sejenak dari rutinitas. Semoga harimu penuh tawa, ketenangan, dan kehangatan keluarga!" },
                    { emoji: "📺", tag: "MINGGU SEGAR", text: "Siapkan semangat baru untuk menyambut pekan depan. TVRI Kalsel siap berkarya kembali!" }
                ]
            };

            // Fungsi Update Jam & Tanggal Live
            function updateClock() {
                const now = new Date();
                
                // Konversi waktu ke WITA (UTC+8)
                const utc = now.getTime() + (now.getTimezoneOffset() * 60000);
                const witaDate = new Date(utc + (3600000 * 8));

                const hari = hariList[witaDate.getDay()];
                const tanggal = witaDate.getDate();
                const bulan = bulanList[witaDate.getMonth()];
                const tahun = witaDate.getFullYear();

                const jam = String(witaDate.getHours()).padStart(2, '0');
                const menit = String(witaDate.getMinutes()).padStart(2, '0');
                const detik = String(witaDate.getSeconds()).padStart(2, '0');

                const liveDateEl = document.getElementById('liveDate');
                const liveTimeEl = document.getElementById('liveTime');

                if (liveDateEl) liveDateEl.innerText = `${hari}, ${tanggal} ${bulan} ${tahun}`;
                if (liveTimeEl) liveTimeEl.innerText = `${jam}:${menit}:${detik} WITA`;
            }

            // Fungsi Tampilkan Sapaan Harian
            let currentDayQuotes = [];
            let quoteIdx = 0;

            function initGreeting() {
                const now = new Date();
                const dayIndex = now.getDay();
                currentDayQuotes = sapaanHarian[dayIndex] || sapaanHarian[1];
                showGreeting(0);

                // Fitur interaktif: Klik kartu untuk ganti sapaan lucu lainnya!
                const card = document.getElementById('greetingCard');
                if (card) {
                    card.addEventListener('click', () => {
                        quoteIdx = (quoteIdx + 1) % currentDayQuotes.length;
                        showGreeting(quoteIdx);
                    });
                }
            }

            function showGreeting(idx) {
                const q = currentDayQuotes[idx];
                const emojiEl = document.getElementById('greetingEmoji');
                const tagEl = document.getElementById('greetingDayTag');
                const textEl = document.getElementById('greetingText');

                if (emojiEl) emojiEl.innerText = q.emoji;
                if (tagEl) tagEl.innerText = q.tag;
                if (textEl) textEl.innerText = q.text;
            }

            updateClock();
            setInterval(updateClock, 1000);
            initGreeting();

        }
    );

</script>

</body>

</html>