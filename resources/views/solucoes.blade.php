<!DOCTYPE html>
<html lang="{{ app()->getLocale() === 'en' ? 'en' : 'pt-br' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ app()->getLocale() === 'en' ? 'Solutions' : 'Soluções' }} | Matheus de Paulo</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="https://fonts.gstatic.com/s/orbitron/v35/yMJRMIlzdpvBhQQL_QqprQ.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="https://fonts.gstatic.com/s/plusjakartasans/v12/LDIoaomQNQcsA88c7O9yZ4KMCoOg4Ko20y0.woff2" as="font" type="font/woff2" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Orbitron:wght@700;900&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #030303; overflow-x: hidden; margin: 0; padding: 0; }
        .bg-grid-pattern {
            background-size: 50px 50px;
            background-image:
                linear-gradient(to right, rgba(255, 255, 255, 0.015) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.015) 1px, transparent 1px);
        }
        @keyframes spinClockwise { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
        @keyframes spinCounterClockwise { from { transform: rotate(0deg); } to { transform: rotate(-360deg); } }
        @keyframes riseUp { from { top: 110%; } to { top: -20%; } }
        .rot-macro-slow-cw { animation: spinClockwise 60s linear infinite; }
        .rot-macro-slow-ccw { animation: spinCounterClockwise 75s linear infinite; }
        .floating-item {
            position: absolute; animation-name: riseUp;
            animation-timing-function: linear; animation-iteration-count: infinite;
            will-change: transform;
        }
        .parallax-layer { /* static decorative elements */ }
        .code-symbol { font-family: 'Space Mono', monospace; user-select: none; }

        /* ============ SCROLL REVEAL ============ */
        .sol-reveal {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 0.8s ease-out, transform 0.8s cubic-bezier(0.25, 1, 0.5, 1);
        }
        .sol-reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .sol-card:nth-child(1) { transition-delay: 0s; }
        .sol-card:nth-child(2) { transition-delay: 0.1s; }
        .sol-card:nth-child(3) { transition-delay: 0.2s; }
        .sol-card:nth-child(4) { transition-delay: 0.3s; }

        /* ============ GRID ============ */
        .sol-grid {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 24px;
            align-items: stretch;
        }
        @media (min-width: 768px) {
            .sol-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (min-width: 1280px) {
            .sol-grid { grid-template-columns: repeat(4, 1fr); }
        }

        /* ============ CARD BASE ============ */
        .sol-card {
            position: relative;
            background: linear-gradient(180deg, rgba(20, 17, 30, 0.97) 0%, rgba(10, 8, 18, 0.99) 100%);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 24px;
            padding: 28px 22px 24px;
            overflow: hidden;
            transition: transform 0.5s cubic-bezier(0.25, 1, 0.5, 1),
                        border-color 0.5s cubic-bezier(0.25, 1, 0.5, 1),
                        box-shadow 0.5s cubic-bezier(0.25, 1, 0.5, 1);
            display: flex;
            flex-direction: column;
            height: 100%;
            cursor: pointer;
        }
        .sol-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 24px;
            padding: 1px;
            background: linear-gradient(135deg, rgba(168, 85, 247, 0) 0%, rgba(168, 85, 247, 0.4) 50%, rgba(99, 102, 241, 0) 100%);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.5s ease;
            pointer-events: none;
        }
        .sol-card:hover {
            transform: translate3d(0, -8px, 0);
            will-change: transform;
            border-color: rgba(168, 85, 247, 0.25);
            box-shadow: 0 30px 60px -20px rgba(168, 85, 247, 0.25), 0 0 0 1px rgba(168, 85, 247, 0.1);
        }
        .sol-card:hover::before { opacity: 1; }

        .sol-card__glow {
            position: absolute;
            top: -1px;
            left: 30%;
            right: 30%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(168, 85, 247, 0.6), transparent);
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        .sol-card:hover .sol-card__glow { opacity: 1; }

        /* ============ FEATURED ============ */
        .sol-card--featured {
            background: linear-gradient(180deg, rgba(45, 27, 78, 0.5) 0%, rgba(20, 17, 30, 0.99) 100%);
            border-color: rgba(168, 85, 247, 0.25);
            box-shadow: 0 20px 50px -10px rgba(168, 85, 247, 0.15);
        }
        .sol-card--featured::before { opacity: 0.6; }
        .sol-card--featured .sol-card__glow { opacity: 1; }

        /* ============ ENTERPRISE ============ */
        .sol-card--enterprise {
            border-color: rgba(99, 102, 241, 0.3);
            background: linear-gradient(180deg, rgba(13, 12, 28, 0.98) 0%, rgba(5, 4, 10, 1) 100%);
        }
        .sol-card--enterprise .sol-card__icon {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.2), rgba(168, 85, 247, 0.1));
            border-color: rgba(99, 102, 241, 0.4);
        }
        .sol-card--enterprise .sol-card__icon svg { stroke: #818cf8; }

        /* ============ BADGE ============ */
        .sol-badge {
            position: absolute;
            top: 16px;
            right: 16px;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 10px;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #fff;
            background: linear-gradient(to right, #7c3aed, #4f46e5);
            border-radius: 999px;
            box-shadow: 0 0 12px rgba(168, 85, 247, 0.4);
            font-family: 'Orbitron', sans-serif;
        }
        .sol-badge--enterprise {
            background: linear-gradient(to right, #4f46e5, #10b981);
            box-shadow: 0 0 12px rgba(99, 102, 241, 0.4);
        }

        /* ============ ÍCONE ============ */
        .sol-card__icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            background: linear-gradient(135deg, rgba(168, 85, 247, 0.15), rgba(99, 102, 241, 0.1));
            border: 1px solid rgba(168, 85, 247, 0.2);
            position: relative;
            transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            z-index: 5;
            flex-shrink: 0;
        }
        .sol-card:hover .sol-card__icon { transform: scale(1.1) rotate(-5deg); }
        .sol-card__icon svg { width: 24px; height: 24px; stroke: #c084fc; }

        /* ============ TEXTOS ============ */
        .sol-card__level {
            font-family: 'Orbitron', sans-serif;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: #a855f7;
            margin-bottom: 6px;
            z-index: 5;
        }
        .sol-card--enterprise .sol-card__level { color: #818cf8; }

        .sol-card__title {
            font-family: 'Orbitron', sans-serif;
            font-weight: 900;
            font-size: 1.25rem;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 0.02em;
            line-height: 1.1;
            margin-bottom: 10px;
            z-index: 5;
        }
        .sol-card__phrase {
            font-size: 12px;
            font-style: italic;
            font-weight: 500;
            color: #c084fc;
            margin-bottom: 12px;
            line-height: 1.55;
            z-index: 5;
        }
        .sol-card--enterprise .sol-card__phrase { color: #818cf8; }

        .sol-card__desc {
            font-size: 12.5px;
            color: #a1a1aa;
            line-height: 1.55;
            margin-bottom: 16px;
            z-index: 5;
        }

        /* ============ FEATURES ============ */
        .sol-features {
            list-style: none;
            padding: 0;
            margin: 0 0 16px;
            flex-grow: 1;
            z-index: 5;
        }
        .sol-features li {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            font-size: 12px;
            color: #d4d4d8;
            line-height: 1.4;
            padding: 5px 0;
        }
        .sol-features svg {
            width: 13px;
            height: 13px;
            flex-shrink: 0;
            stroke: #10b981;
            margin-top: 1px;
        }

        /* ============ FOCO DE ATUAÇÃO ============ */
        .sol-ideal {
            padding: 10px 12px;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.04);
            border-radius: 10px;
            margin-bottom: 14px;
            z-index: 5;
        }
        .sol-ideal__label {
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #71717a;
            margin-bottom: 4px;
        }
        .sol-ideal__list {
            font-size: 11px;
            color: #d4d4d8;
            line-height: 1.45;
        }

        /* ============ PREÇO ============ */
        .sol-price {
            margin-bottom: 14px;
            padding-top: 12px;
            border-top: 1px dashed rgba(255, 255, 255, 0.08);
            z-index: 5;
        }
        .sol-price__row {
            display: flex;
            align-items: baseline;
            gap: 6px;
            line-height: 1.3;
        }
        .sol-price__de {
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #52525b;
            flex-shrink: 0;
        }
        .sol-price__por {
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #71717a;
            flex-shrink: 0;
        }
        .sol-price__original {
            font-size: 12px;
            font-weight: 600;
            color: #52525b;
            text-decoration: line-through;
        }
        .sol-price__label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #71717a;
            margin-bottom: 4px;
        }
        .sol-price__value {
            font-family: 'Orbitron', sans-serif;
            font-weight: 900;
            font-size: 1.5rem;
            color: #fff;
            letter-spacing: 0.01em;
            line-height: 1.1;
        }
        .sol-price__value .sol-price__currency {
            font-size: 0.85rem;
            color: #a855f7;
            margin-right: 4px;
        }
        .sol-price__monthly {
            font-size: 10px;
            color: #3f3f46;
            margin-top: 10px;
            text-align: center;
            line-height: 1.4;
        }

        /* ============ CTA ============ */
        .sol-cta {
            width: 100%;
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 13px 20px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            font-family: 'Orbitron', sans-serif;
            background: rgba(168, 85, 247, 0.1);
            color: #c084fc;
            border: 1px solid rgba(168, 85, 247, 0.25);
            cursor: pointer;
            overflow: hidden;
            text-decoration: none;
            transition: background 0.3s ease, color 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
            z-index: 5;
        }
        .sol-cta:hover {
            background: linear-gradient(to right, #7c3aed, #4f46e5);
            color: #fff;
            border-color: rgba(168, 85, 247, 0.5);
            box-shadow: 0 8px 25px rgba(168, 85, 247, 0.3);
        }
        .sol-cta__arrow { transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1); }
        .sol-cta:hover .sol-cta__arrow { transform: translateX(4px); }

        .sol-cta--featured {
            background: linear-gradient(to right, #7c3aed, #4f46e5);
            color: #fff;
            border-color: rgba(168, 85, 247, 0.5);
            box-shadow: 0 8px 25px rgba(168, 85, 247, 0.2);
        }
        .sol-cta--featured:hover {
            box-shadow: 0 12px 35px rgba(168, 85, 247, 0.5);
            transform: translate3d(0, -1px, 0);
        }
        .sol-cta--enterprise {
            background: transparent;
            color: #818cf8;
            border-color: rgba(99, 102, 241, 0.4);
        }
        .sol-cta--enterprise:hover {
            background: linear-gradient(to right, #4f46e5, #10b981);
            color: #fff;
            border-color: rgba(168, 85, 247, 0.2);
            box-shadow: 0 8px 25px rgba(99, 102, 241, 0.3);
        }

        /* ============ MODAL PREMIUM ============ */
        #sol-modal {
            background: rgba(3, 2, 8, 0.92);
            transition: opacity 0.22s ease;
        }
        .sol-modal__panel {
            background: linear-gradient(160deg, rgba(17, 13, 26, 0.99) 0%, rgba(7, 5, 14, 1) 100%);
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 28px;
            box-shadow: 0 24px 80px rgba(0, 0, 0, 0.65), 0 0 0 1px rgba(168, 85, 247, 0.07);
            max-height: 90vh;
            overflow-y: auto;
            overflow-x: hidden;
            scrollbar-width: thin;
            scrollbar-color: rgba(168, 85, 247, 0.22) transparent;
            animation: solModalIn 0.3s cubic-bezier(0.25, 1, 0.5, 1) forwards;
        }
        .sol-modal__panel::-webkit-scrollbar { width: 4px; }
        .sol-modal__panel::-webkit-scrollbar-track { background: transparent; }
        .sol-modal__panel::-webkit-scrollbar-thumb { background: rgba(168, 85, 247, 0.18); border-radius: 2px; }

        @keyframes solModalIn {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .sol-modal__hero {
            padding: 36px 32px 28px;
            background: linear-gradient(148deg, rgba(48, 18, 85, 0.28) 0%, rgba(14, 10, 24, 0.06) 65%);
            position: relative;
            overflow: hidden;
            border-radius: 27px 27px 0 0;
        }
        @media (max-width: 639px) { .sol-modal__hero { padding: 22px 18px 18px; } }
        .sol-modal__hero::before {
            content: '';
            position: absolute;
            top: 0; left: 10%; right: 10%; height: 1px;
            background: linear-gradient(90deg, transparent, rgba(168, 85, 247, 0.45), transparent);
        }
        .sol-modal__hero-badge {
            display: inline-flex; align-items: center; gap: 6px;
            padding: 4px 12px;
            background: rgba(168, 85, 247, 0.09);
            border: 1px solid rgba(168, 85, 247, 0.2);
            border-radius: 999px;
            font-family: 'Orbitron', sans-serif;
            font-size: 9px; font-weight: 800; letter-spacing: 0.2em; text-transform: uppercase;
            color: #c084fc;
            margin-bottom: 14px;
        }
        .sol-modal__hero-title {
            font-family: 'Orbitron', sans-serif;
            font-size: clamp(1.6rem, 5vw, 2.6rem);
            font-weight: 900;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 0.02em;
            line-height: 1.06;
            margin-bottom: 10px;
        }
        .sol-modal__hero-subtitle {
            font-size: 13.5px; color: #a1a1aa; line-height: 1.72; max-width: 500px;
        }

        .sol-modal__body { padding: 24px 32px; }
        @media (max-width: 639px) { .sol-modal__body { padding: 16px 14px; } }

        .sol-modal__section-label { display: flex; align-items: center; gap: 14px; margin-bottom: 16px; }
        .sol-modal__section-label .label-text {
            font-family: 'Orbitron', sans-serif;
            font-size: 9px; font-weight: 700;
            letter-spacing: 0.22em; text-transform: uppercase;
            color: #a855f7; white-space: nowrap;
        }
        .sol-modal__section-label .label-line { height: 1px; flex: 1; background: linear-gradient(90deg, rgba(168, 85, 247, 0.28), transparent); }

        .sol-benefit {
            padding: 11px 12px;
            background: rgba(255, 255, 255, 0.018);
            border: 1px solid rgba(255, 255, 255, 0.04);
            border-radius: 11px;
            display: flex; gap: 10px; align-items: flex-start;
            transition: border-color 0.25s ease, background 0.25s ease;
        }
        .sol-benefit:hover { border-color: rgba(168, 85, 247, 0.16); background: rgba(168, 85, 247, 0.025); }
        .sol-benefit__icon {
            width: 32px; height: 32px; flex-shrink: 0;
            display: flex; align-items: center; justify-content: center;
            background: rgba(168, 85, 247, 0.08);
            border: 1px solid rgba(168, 85, 247, 0.12);
            border-radius: 8px;
        }
        .sol-benefit__icon svg { width: 14px; height: 14px; stroke: #c084fc; }
        .sol-benefit__title {
            font-size: 10px; font-weight: 700; color: #e4e4e7;
            text-transform: uppercase; letter-spacing: 0.04em; line-height: 1.3; margin-bottom: 2px;
        }
        .sol-benefit__desc { font-size: 9.5px; color: #52525b; line-height: 1.4; }

        .sol-video-card {
            border-radius: 13px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            overflow: hidden;
            background: rgba(7, 5, 14, 0.95);
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .sol-video-card:hover {
            border-color: rgba(168, 85, 247, 0.19);
            box-shadow: 0 10px 30px rgba(168, 85, 247, 0.08);
        }
        .sol-video-header {
            padding: 11px 13px 9px;
            display: flex; align-items: center; gap: 9px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
        }
        .sol-video-num { font-family: 'Orbitron', sans-serif; font-size: 10px; font-weight: 900; color: #a855f7; letter-spacing: 0.05em; flex-shrink: 0; }
        .sol-video-title { font-family: 'Orbitron', sans-serif; font-size: 9px; font-weight: 700; color: #d4d4d8; text-transform: uppercase; letter-spacing: 0.09em; line-height: 1.25; }
        .sol-video-desc { font-size: 9.5px; color: #3f3f46; line-height: 1.4; margin-top: 2px; }
        .sol-video-caption {
            font-size: 11px;
            color: #a1a1aa;
            line-height: 1.55;
            padding: 8px 13px 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
        }
        .sol-video-wrap { position: relative; aspect-ratio: 16 / 9; overflow: hidden; background: #04020b; }
        .sol-video-wrap video { width: 100%; height: 100%; object-fit: cover; display: block; }
        .sol-video-wrap--mobile { aspect-ratio: 9 / 16; }
        .sol-video-card--mobile .sol-video-num { color: #818cf8; }
        .sol-video-card--mobile .sol-video-header { border-color: rgba(99, 102, 241, 0.08); }
        .sol-video-card--mobile:hover { border-color: rgba(99, 102, 241, 0.22); box-shadow: 0 10px 30px rgba(99, 102, 241, 0.08); }

        .sol-mobile-badge {
            display: inline-flex; align-items: center; gap: 4px;
            padding: 2px 7px; border-radius: 999px;
            font-size: 8px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase;
            background: rgba(99, 102, 241, 0.1); border: 1px solid rgba(99, 102, 241, 0.2);
            color: #818cf8; white-space: nowrap;
        }

        .sol-modal__footer {
            padding: 18px 32px 28px;
            border-top: 1px solid rgba(255, 255, 255, 0.04);
            display: flex; flex-direction: column; align-items: center; text-align: center; gap: 10px;
        }
        @media (max-width: 639px) { .sol-modal__footer { padding: 14px 14px 22px; } }

        @media (prefers-reduced-motion: reduce) {
            .floating-item { animation: none !important; opacity: 0 !important; }
            .rot-macro-slow-cw, .rot-macro-slow-ccw { animation: none !important; }
            .sol-reveal { transition: none !important; opacity: 1 !important; transform: none !important; }
            .sol-modal__panel { animation: none !important; }
        }
    </style>
</head>
<body class="text-white min-h-screen relative bg-grid-pattern overflow-x-hidden">

{{-- Fundo decorativo --}}
<div class="fixed inset-0 w-screen h-screen pointer-events-none overflow-hidden z-0" style="contain: strict;">
    <div class="absolute w-[700px] h-[700px] rounded-full bg-purple-600/10 blur-[130px] top-[-5%] left-[-10%]"></div>
    <div class="absolute w-[600px] h-[600px] rounded-full bg-indigo-600/10 blur-[140px] top-[30%] right-[-10%]"></div>
    <div class="absolute w-[500px] h-[500px] rounded-full bg-violet-600/8 blur-[120px] bottom-[10%] left-[20%]"></div>

    <div class="parallax-layer absolute top-[15%] right-[-5%] opacity-35 z-10" data-speed="-15">
        <svg width="320" height="320" viewBox="0 0 100 100" fill="none" stroke="currentColor" class="text-purple-500/40 rot-macro-slow-cw">
            <circle cx="50" cy="50" r="45" stroke-width="0.3"/>
            <ellipse cx="50" cy="50" rx="45" ry="15" stroke-width="0.25"/>
            <ellipse cx="50" cy="50" rx="15" ry="45" stroke-width="0.25"/>
        </svg>
    </div>

    <div class="parallax-layer absolute top-[60%] left-[-3%] opacity-20 z-10" data-speed="10">
        <svg width="220" height="220" viewBox="0 0 100 100" fill="none" stroke="currentColor" class="text-indigo-500/40 rot-macro-slow-ccw">
            <circle cx="50" cy="50" r="45" stroke-width="0.3"/>
            <circle cx="50" cy="50" r="30" stroke-width="0.2"/>
            <circle cx="50" cy="50" r="15" stroke-width="0.2"/>
        </svg>
    </div>

    <div class="floating-item parallax-layer opacity-50 left-[8%]" style="animation-duration: 45s;" data-speed="-8"><span class="text-purple-400 code-symbol text-4xl">{</span></div>
    <div class="floating-item parallax-layer opacity-40 left-[88%]" style="animation-duration: 38s;" data-speed="12"><span class="text-indigo-400 code-symbol text-5xl">}</span></div>
    <div class="floating-item parallax-layer opacity-50 left-[15%]" style="animation-duration: 52s;" data-speed="-6"><span class="text-violet-400 code-symbol text-3xl">[]</span></div>
    <div class="floating-item parallax-layer opacity-35 left-[75%]" style="animation-duration: 60s;" data-speed="8"><span class="text-purple-300 code-symbol text-2xl">;</span></div>
</div>

@include('partials.navbar')

@php $isEn = app()->getLocale() === 'en'; @endphp
<main class="relative z-10">

    <section id="solucoes" class="w-full max-w-7xl mx-auto px-6 py-24 relative overflow-hidden">

        {{-- Cabeçalho --}}
        <div class="text-center mb-16 relative z-10 select-none sol-reveal">
            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-[0.25em] text-purple-300 bg-purple-500/10 border border-purple-500/20 mb-5" style="font-family: 'Orbitron', sans-serif;">
                {{ $isEn ? 'Plans & Solutions' : 'Planos e Soluções' }}
            </span>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-black text-white uppercase tracking-tight leading-[1.05]" style="font-family: 'Orbitron', sans-serif;">
                {{ $isEn ? 'Choose the Right Plan' : 'Escolha o Plano Ideal' }}<br>{{ $isEn ? 'For Your ' : 'Para o ' }}<span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-indigo-400">{{ $isEn ? 'Business' : 'Seu Negócio' }}</span>
            </h2>
            <p class="text-zinc-400 text-sm md:text-base max-w-2xl mx-auto leading-relaxed mt-5">
                {{ $isEn ? 'Each plan was designed to solve a real business problem, from online positioning to complete operational automation.' : 'Cada plano foi criado para resolver um problema real de negócio, do posicionamento online à automação operacional completa.' }}
            </p>
        </div>

        {{-- Grid de cards --}}
        <div class="sol-grid relative z-10">

            {{-- ============ SOLUÇÃO 01 — Presença Digital ============ --}}
            <div class="sol-card sol-reveal">
                <div class="sol-card__glow"></div>
                <div class="absolute top-0 right-0 w-32 h-32 bg-purple-500/5 rounded-full blur-2xl pointer-events-none"></div>
                <div class="absolute top-6 right-6 opacity-[0.15] pointer-events-none select-none code-symbol text-xs text-purple-400">
                    &lt;div id="brand"&gt;<br>&nbsp;&nbsp;scale: 100%;<br>&lt;/div&gt;
                </div>

                <div class="sol-card__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s-8-4.5-8-11.8a8 8 0 0 1 16 0c0 7.3-8 11.8-8 11.8z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                </div>

                <div class="sol-card__level">{{ $isEn ? 'Solution 01' : 'Solução 01' }}</div>
                <h3 class="sol-card__title">{{ $isEn ? 'Digital Presence' : 'Presença Digital' }}</h3>
                <p class="sol-card__phrase">"{{ $isEn ? 'Strategic digital presence for businesses that want to lead locally.' : 'Presença digital estratégica para negócios que querem liderar localmente.' }}"</p>
                <p class="sol-card__desc">{{ $isEn ? 'Premium website built from scratch to convey immediate authority and attract new clients.' : 'Site premium desenvolvido sob medida para transmitir autoridade imediata e atrair novos clientes.' }}</p>

                <ul class="sol-features">
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ $isEn ? 'Exclusive and responsive design' : 'Design exclusivo e responsivo' }}
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ $isEn ? 'WhatsApp integrated for instant contact' : 'WhatsApp integrado para contato imediato' }}
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ $isEn ? 'Smart forms to capture leads' : 'Formulários inteligentes para captar leads' }}
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ $isEn ? 'Google-optimized structure for conversion' : 'Estrutura otimizada para Google e para conversão' }}
                    </li>
                </ul>

                <div class="sol-ideal">
                    <div class="sol-ideal__label">{{ $isEn ? 'Target Focus' : 'Foco de Atuação' }}</div>
                    <div class="sol-ideal__list">{{ $isEn ? 'Professionals and local businesses that need to increase authority, visibility and win more clients.' : 'Profissionais e negócios locais que precisam aumentar autoridade, visibilidade e conquistar mais clientes.' }}</div>
                </div>

                <div class="sol-price">
                    <div class="sol-price__row">
                        <span class="sol-price__de">{{ $isEn ? 'WAS' : 'DE' }}</span>
                        <span class="sol-price__original">R$ 2.490</span>
                    </div>
                    <div class="sol-price__row" style="margin-top: 4px;">
                        <span class="sol-price__por">{{ $isEn ? 'NOW' : 'POR' }}</span>
                        <div class="sol-price__value"><span class="sol-price__currency">R$</span>1.890</div>
                    </div>
                </div>

                <a href="{{ $isEn ? '/en#agendamento' : '/#agendamento' }}" class="sol-cta">
                    {{ $isEn ? 'Request a Proposal' : 'Solicitar Proposta' }} <span class="sol-cta__arrow">→</span>
                </a>
                <p class="sol-price__monthly">+ R$60/{{ $isEn ? 'mo' : 'mês' }} ({{ $isEn ? 'domain, hosting and basic support' : 'domínio, hospedagem e suporte básico' }})</p>
            </div>

            {{-- ============ SOLUÇÃO 02 — Gestão Inteligente (FEATURED) ============ --}}
            <div class="sol-card sol-card--featured sol-reveal" onclick="openSolutionModal('gestao-inteligente')">
                <span class="sol-badge">★ {{ $isEn ? 'Most Chosen' : 'Mais Escolhido' }}</span>
                <div class="sol-card__glow"></div>
                <div class="absolute bottom-16 right-0 left-0 h-12 bg-gradient-to-t from-purple-500/[0.02] to-transparent pointer-events-none"></div>
                <div class="absolute top-24 right-4 opacity-[0.08] pointer-events-none select-none">
                    <svg width="80" height="40" viewBox="0 0 80 40" fill="none" stroke="#a855f7" stroke-width="1.5">
                        <path d="M0 35 Q 20 10, 40 25 T 80 5" />
                    </svg>
                </div>

                <div class="sol-card__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="7" height="9"/>
                        <rect x="14" y="3" width="7" height="5"/>
                        <rect x="14" y="12" width="7" height="9"/>
                        <rect x="3" y="16" width="7" height="5"/>
                    </svg>
                </div>

                <div class="sol-card__level">{{ $isEn ? 'Solution 02' : 'Solução 02' }}</div>
                <h3 class="sol-card__title">{{ $isEn ? 'Smart Management' : 'Gestão Inteligente' }}</h3>
                <p class="sol-card__phrase">"{{ $isEn ? 'Stop losing money to disorganization. Automate everything.' : 'Pare de perder dinheiro com desorganização. Automatize tudo.' }}"</p>
                <p class="sol-card__desc">{{ $isEn ? 'Complete system that eliminates manual processes and puts financial and operational control in the palm of your hand.' : 'Sistema completo que elimina processos manuais e coloca o controle financeiro e operacional na palma da sua mão.' }}</p>

                <ul class="sol-features">
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ $isEn ? 'Admin dashboard with real-time metrics' : 'Painel administrativo com métricas em tempo real' }}
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ $isEn ? '24/7 automated scheduling via link and WhatsApp' : 'Agendamentos 24h automáticos via link e WhatsApp' }}
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ $isEn ? 'Integrated PIX payments' : 'Recebimentos via PIX integrados' }}
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ $isEn ? 'Organized client database with full history' : 'Base de clientes organizada com histórico completo' }}
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ $isEn ? 'Financial and net revenue reports' : 'Relatórios financeiros e de faturamento líquido' }}
                    </li>
                </ul>

                <div class="sol-ideal">
                    <div class="sol-ideal__label">{{ $isEn ? 'Target Focus' : 'Foco de Atuação' }}</div>
                    <div class="sol-ideal__list">{{ $isEn ? 'Businesses that want to professionalize service, automate billing and have full operational control.' : 'Negócios que querem profissionalizar o atendimento, automatizar o faturamento e ter controle total da operação.' }}</div>
                </div>

                <div class="sol-price">
                    <div class="sol-price__label">{{ $isEn ? 'Investment' : 'Investimento' }}</div>
                    <div class="sol-price__row" style="align-items: baseline; gap: 6px;">
                        <div class="sol-price__value" style="font-size: 1.25rem;"><span class="sol-price__currency">R$</span>2.800</div>
                        <span style="font-size: 11px; color: #52525b; font-weight: 600; flex-shrink: 0;">–</span>
                        <div class="sol-price__value" style="font-size: 1.25rem;"><span class="sol-price__currency">R$</span>3.500</div>
                    </div>
                </div>

                <button class="sol-cta sol-cta--featured" type="button">
                    {{ $isEn ? 'View Demo' : 'Ver Demonstração' }} <span class="sol-cta__arrow">→</span>
                </button>
                <p class="sol-price__monthly">+ R$60/{{ $isEn ? 'mo' : 'mês' }} ({{ $isEn ? 'domain, hosting and basic support' : 'domínio, hospedagem e suporte básico' }})</p>
            </div>

            {{-- ============ SOLUÇÃO 03 — Equipe PRO ============ --}}
            <div class="sol-card sol-reveal">
                <div class="sol-card__glow"></div>
                <div class="absolute top-28 right-4 opacity-[0.05] pointer-events-none select-none flex gap-1 items-end">
                    <div class="w-2 h-8 bg-purple-400 rounded-t"></div>
                    <div class="w-2 h-12 bg-purple-400 rounded-t"></div>
                    <div class="w-2 h-6 bg-purple-400 rounded-t"></div>
                    <div class="w-2 h-16 bg-purple-400 rounded-t"></div>
                </div>

                <div class="sol-card__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                </div>

                <div class="sol-card__level">{{ $isEn ? 'Solution 03' : 'Solução 03' }}</div>
                <h3 class="sol-card__title">{{ $isEn ? 'PRO Team' : 'Equipe PRO' }}</h3>
                <p class="sol-card__phrase">"{{ $isEn ? 'Your team organized, productive and scaling together.' : 'Sua equipe organizada, produtiva e escalando junto.' }}"</p>
                <p class="sol-card__desc">{{ $isEn ? 'Multi-user platform for teams that want to grow with control, performance and security.' : 'Plataforma multiusuário para equipes que desejam crescer com controle, performance e segurança.' }}</p>

                <ul class="sol-features">
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ $isEn ? 'Multiple users with profiles and permissions' : 'Múltiplos usuários com perfis e permissões' }}
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ $isEn ? 'Shared schedule with smart distribution' : 'Agenda compartilhada com distribuição inteligente' }}
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ $isEn ? 'Payment split (PIX and Credit Card)' : 'Split de pagamentos (PIX e Cartão de Crédito)' }}
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ $isEn ? 'Individual productivity and commission reports' : 'Relatórios individuais de produtividade e comissão' }}
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ $isEn ? 'Team client and service management' : 'Gestão de clientes e serviços da equipe' }}
                    </li>
                </ul>

                <div class="sol-ideal">
                    <div class="sol-ideal__label">{{ $isEn ? 'Target Focus' : 'Foco de Atuação' }}</div>
                    <div class="sol-ideal__list">{{ $isEn ? 'Companies with teams that need to manage schedule, performance, productivity and profitability.' : 'Empresas que possuem equipes e precisam manter agenda, performance, produtividade e lucratividade.' }}</div>
                </div>

                <div class="sol-price">
                    <div class="sol-price__row">
                        <span class="sol-price__de">{{ $isEn ? 'WAS' : 'DE' }}</span>
                        <span class="sol-price__original">R$ 5.200</span>
                    </div>
                    <div class="sol-price__row" style="margin-top: 4px;">
                        <span class="sol-price__por">{{ $isEn ? 'NOW' : 'POR' }}</span>
                        <div class="sol-price__value"><span class="sol-price__currency">R$</span>3.200</div>
                    </div>
                </div>

                <a href="{{ $isEn ? '/en#agendamento' : '/#agendamento' }}" class="sol-cta">
                    {{ $isEn ? 'Request a Proposal' : 'Solicitar Proposta' }} <span class="sol-cta__arrow">→</span>
                </a>
                <p class="sol-price__monthly">+ R$60/{{ $isEn ? 'mo' : 'mês' }} ({{ $isEn ? 'domain, hosting and basic support' : 'domínio, hospedagem e suporte básico' }})</p>
            </div>

            {{-- ============ SOLUÇÃO 04 — Enterprise ============ --}}
            <div class="sol-card sol-card--enterprise sol-reveal">
                <span class="sol-badge sol-badge--enterprise">✦ {{ $isEn ? 'Custom Solution' : 'Solução Custom' }}</span>
                <div class="sol-card__glow" style="background: linear-gradient(90deg, transparent, rgba(99, 102, 241, 0.6), transparent);"></div>
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(99,102,241,0.05),transparent_50%)] pointer-events-none"></div>
                <div class="absolute top-28 right-6 opacity-[0.12] pointer-events-none select-none text-[9px] text-indigo-400 font-mono leading-none">
                    [01] scale_node: stable<br>
                    [02] load_balance: active<br>
                    [03] secure_layer: 100%<br>
                    [04] custom_api: open
                </div>

                <div class="sol-card__icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2 22h20"/>
                        <path d="M4 22V4h6v18"/>
                        <path d="M14 22V10h6v12"/>
                        <line x1="6" y1="8" x2="8" y2="8"/>
                        <line x1="6" y1="12" x2="8" y2="12"/>
                        <line x1="16" y1="14" x2="18" y2="14"/>
                    </svg>
                </div>

                <div class="sol-card__level">{{ $isEn ? 'Solution 04' : 'Solução 04' }}</div>
                <h3 class="sol-card__title">Enterprise</h3>
                <p class="sol-card__phrase">"{{ $isEn ? 'When standard won\'t cut it. We build what your business actually needs.' : 'Quando o padrão não resolve. Construímos o que o seu negócio realmente precisa.' }}"</p>
                <p class="sol-card__desc">{{ $isEn ? 'Dedicated software engineering for complex operations that require exclusive solutions and advanced integrations.' : 'Engenharia de software dedicada para operações complexas que exigem soluções exclusivas e integrações avançadas.' }}</p>

                <ul class="sol-features">
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="stroke: #818cf8;"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ $isEn ? '100% custom-built system' : 'Sistema 100% sob medida' }}
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="stroke: #818cf8;"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ $isEn ? 'Native integration with APIs, ERPs and legacy systems' : 'Integração nativa com APIs, ERPs e sistemas legados' }}
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="stroke: #818cf8;"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ $isEn ? 'Scalable architecture for high volume and performance' : 'Arquitetura escalável para alto volume e performance' }}
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="stroke: #818cf8;"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ $isEn ? 'VIP support with guaranteed SLA' : 'Suporte VIP com SLA garantido' }}
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="stroke: #818cf8;"><polyline points="20 6 9 17 4 12"/></svg>
                        {{ $isEn ? 'Cutting-edge technology applied to your business model' : 'Tecnologia de ponta aplicada ao seu modelo de negócio' }}
                    </li>
                </ul>

                <div class="sol-ideal">
                    <div class="sol-ideal__label">{{ $isEn ? 'Target Focus' : 'Foco de Atuação' }}</div>
                    <div class="sol-ideal__list">{{ $isEn ? 'Large companies, franchises, industries and operations demanding high performance and dedicated architecture.' : 'Empresas de grande porte, franquias, indústrias e operações que exigem alta performance e arquitetura dedicada.' }}</div>
                </div>

                <div class="sol-price">
                    <div class="sol-price__label">{{ $isEn ? 'Dedicated Architecture' : 'Arquitetura Dedicada' }}</div>
                    <div class="sol-price__value" style="color: #818cf8; font-size: 1.2rem; font-family: 'Orbitron', sans-serif;">{{ $isEn ? 'Custom Quote' : 'Sob Consulta' }}</div>
                </div>

                <a href="{{ $isEn ? '/en#agendamento' : '/#agendamento' }}" class="sol-cta sol-cta--enterprise">
                    {{ $isEn ? 'Talk to a Specialist' : 'Falar com Especialista' }} <span class="sol-cta__arrow">→</span>
                </a>
                <p class="sol-price__monthly" style="color: #3f3f46;">{{ $isEn ? 'Infrastructure and support upon request' : 'Infraestrutura e suporte sob consulta' }}</p>
            </div>

        </div>{{-- /sol-grid --}}

        {{-- ============ FAIXA INFRAESTRUTURA E SUPORTE ============ --}}
        <div class="mt-16 sol-reveal">
            <div class="max-w-5xl mx-auto px-6 py-6 rounded-2xl border border-white/[0.05] bg-white/[0.012]">
                <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-6">
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="text-base leading-none">🧊</span>
                            <span class="text-xs font-bold uppercase tracking-widest text-white" style="font-family: 'Orbitron', sans-serif;">{{ $isEn ? 'Infrastructure & Support' : 'Infraestrutura e Suporte' }}</span>
                        </div>
                        <p class="text-[11px] text-zinc-500 mb-4 max-w-lg leading-relaxed">
                            {{ $isEn ? 'A fixed monthly fee that keeps your business online, secure and running flawlessly at all times.' : 'Cobramos um valor fixo mensal que garante que o seu negócio esteja sempre no ar, seguro e funcionando perfeitamente.' }}
                        </p>
                        <div class="flex flex-wrap gap-x-5 gap-y-2">
                            <div class="flex items-center gap-1.5">
                                <svg class="w-3 h-3 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="#a855f7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                <span class="text-[11px] text-zinc-400">{{ $isEn ? 'Professional domain' : 'Domínio profissional' }}</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <svg class="w-3 h-3 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="#a855f7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                <span class="text-[11px] text-zinc-400">{{ $isEn ? 'Premium hosting' : 'Hospedagem premium' }}</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <svg class="w-3 h-3 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="#a855f7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                <span class="text-[11px] text-zinc-400">{{ $isEn ? 'SSL and security' : 'SSL e segurança' }}</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <svg class="w-3 h-3 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="#a855f7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                <span class="text-[11px] text-zinc-400">{{ $isEn ? 'Maintenance and updates' : 'Manutenções e ajustes' }}</span>
                            </div>
                            <div class="flex items-center gap-1.5">
                                <svg class="w-3 h-3 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="#a855f7" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                                <span class="text-[11px] text-zinc-400">{{ $isEn ? 'Ongoing support' : 'Suporte contínuo' }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="lg:pl-8 lg:border-l border-white/[0.06] text-left lg:text-right flex-shrink-0">
                        <div class="text-[9px] font-bold uppercase tracking-[0.2em] text-zinc-500 mb-1" style="font-family: 'Orbitron', sans-serif;">{{ $isEn ? 'Fixed Investment' : 'Investimento Fixo' }}</div>
                        <div style="font-family: 'Orbitron', sans-serif; font-weight: 900; font-size: 1.9rem; letter-spacing: 0.02em; color: #fff; line-height: 1;">
                            <span style="font-size: 1rem; color: #a855f7; margin-right: 2px;">R$</span>60<span style="font-size: 0.9rem; color: #71717a; font-weight: 700;">/{{ $isEn ? 'mo' : 'mês' }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- CTA final --}}
        <div class="text-center mt-12 sol-reveal">
            <p class="text-zinc-500 text-sm mb-5">{{ $isEn ? 'Need something outside the standard?' : 'Precisa de algo fora do padrão?' }}</p>
            <a href="{{ $isEn ? '/en#agendamento' : '/#agendamento' }}" class="inline-flex items-center gap-2 px-7 py-3 rounded-full text-xs font-bold bg-gradient-to-r from-purple-600 to-indigo-600 text-white uppercase tracking-widest transition-all hover:scale-105 shadow-[0_4px_20px_rgba(168,85,247,0.25)]" style="font-family: 'Orbitron', sans-serif;">
                {{ $isEn ? 'Align Custom Project' : 'Alinhar Projeto Exclusivo' }} <span>→</span>
            </a>
        </div>

    </section>

</main>

@include('partials.footer')

{{-- ============ MODAL PREMIUM — GESTÃO INTELIGENTE ============ --}}
<div id="sol-modal"
     class="fixed inset-0 z-[100] flex items-center justify-center p-3 sm:p-5"
     style="opacity:0;pointer-events:none;"
     role="dialog" aria-modal="true" aria-labelledby="sol-modal-title" aria-hidden="true">

    <div class="sol-modal__panel w-full max-w-6xl relative">

        <button id="sol-modal-close"
                class="absolute top-4 right-4 z-50 w-9 h-9 flex items-center justify-center rounded-full border border-white/10 bg-black/60 text-zinc-400 hover:text-white hover:border-purple-500/30 transition-all text-sm"
                aria-label="{{ $isEn ? 'Close demo' : 'Fechar demonstração' }}">✕</button>

        {{-- HERO --}}
        <div class="sol-modal__hero">
            <span class="absolute bottom-2 right-6 select-none pointer-events-none leading-none"
                  style="font-family:'Orbitron',sans-serif;font-size:7rem;font-weight:900;color:rgba(168,85,247,0.04);">02</span>
            <div class="absolute inset-0 pointer-events-none"
                 style="background:radial-gradient(ellipse 55% 70% at 20% 50%,rgba(100,30,200,0.1),transparent)"></div>

            <div class="relative z-10">
                <div class="sol-modal__hero-badge">
                    <svg width="7" height="7" viewBox="0 0 8 8" fill="currentColor" class="text-purple-400"><circle cx="4" cy="4" r="3.5"/></svg>
                    {{ $isEn ? 'Professional System' : 'Sistema Profissional' }}
                </div>
                <h2 id="sol-modal-title" class="sol-modal__hero-title">
                    {{ $isEn ? 'Smart' : 'Gestão' }} <span style="color:transparent;background:linear-gradient(92deg,#c084fc,#818cf8);-webkit-background-clip:text;background-clip:text;">{{ $isEn ? 'Management' : 'Inteligente' }}</span>
                </h2>
                <p class="sol-modal__hero-subtitle">
                    {{ $isEn ? 'Automate scheduling, payments and operational management in a single platform and professionalize every detail of your business.' : 'Automatize agendamentos, pagamentos e gestão operacional em uma única plataforma e profissionalize cada detalhe do seu negócio.' }}
                </p>
            </div>
        </div>

        {{-- BODY --}}
        <div class="sol-modal__body">

            <div class="mb-8">
                <div class="sol-modal__section-label">
                    <span class="label-text">{{ $isEn ? 'What you get' : 'O que você ganha' }}</span>
                    <span class="label-line"></span>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2.5">

                    <div class="sol-benefit">
                        <div class="sol-benefit__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        </div>
                        <div>
                            <div class="sol-benefit__title">{{ $isEn ? 'Automated' : 'Agendamento' }}<br>{{ $isEn ? 'Scheduling' : 'Automatizado' }}</div>
                            <div class="sol-benefit__desc">{{ $isEn ? 'Effortless 24/7' : '24h sem esforço' }}</div>
                        </div>
                    </div>

                    <div class="sol-benefit">
                        <div class="sol-benefit__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="9"/><rect x="14" y="3" width="7" height="5"/><rect x="14" y="12" width="7" height="9"/><rect x="3" y="16" width="7" height="5"/></svg>
                        </div>
                        <div>
                            <div class="sol-benefit__title">{{ $isEn ? 'Admin' : 'Painel' }}<br>{{ $isEn ? 'Dashboard' : 'Administrativo' }}</div>
                            <div class="sol-benefit__desc">{{ $isEn ? 'Full overview' : 'Visão completa' }}</div>
                        </div>
                    </div>

                    <div class="sol-benefit">
                        <div class="sol-benefit__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                        </div>
                        <div>
                            <div class="sol-benefit__title">PIX<br>{{ $isEn ? 'Integrated' : 'Integrado' }}</div>
                            <div class="sol-benefit__desc">{{ $isEn ? 'Instant payments' : 'Receba na hora' }}</div>
                        </div>
                    </div>

                    <div class="sol-benefit">
                        <div class="sol-benefit__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                        </div>
                        <div>
                            <div class="sol-benefit__title">{{ $isEn ? 'Financial' : 'Controle' }}<br>{{ $isEn ? 'Control' : 'Financeiro' }}</div>
                            <div class="sol-benefit__desc">{{ $isEn ? 'No surprises' : 'Sem surpresas' }}</div>
                        </div>
                    </div>

                    <div class="sol-benefit">
                        <div class="sol-benefit__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                        </div>
                        <div>
                            <div class="sol-benefit__title">{{ $isEn ? 'Real-Time' : 'Relatórios' }}<br>{{ $isEn ? 'Reports' : 'em Tempo Real' }}</div>
                            <div class="sol-benefit__desc">{{ $isEn ? 'Live data' : 'Dados ao vivo' }}</div>
                        </div>
                    </div>

                    <div class="sol-benefit">
                        <div class="sol-benefit__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                        </div>
                        <div>
                            <div class="sol-benefit__title">{{ $isEn ? 'Client' : 'Gestão de' }}<br>{{ $isEn ? 'Management' : 'Clientes' }}</div>
                            <div class="sol-benefit__desc">{{ $isEn ? 'Full history' : 'Histórico total' }}</div>
                        </div>
                    </div>

                    <div class="sol-benefit">
                        <div class="sol-benefit__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        </div>
                        <div>
                            <div class="sol-benefit__title">{{ $isEn ? 'Professional' : 'Atendimento' }}<br>{{ $isEn ? 'Service' : 'Profissional' }}</div>
                            <div class="sol-benefit__desc">{{ $isEn ? 'Top experience' : 'Experiência top' }}</div>
                        </div>
                    </div>

                    <div class="sol-benefit">
                        <div class="sol-benefit__icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
                        </div>
                        <div>
                            <div class="sol-benefit__title">{{ $isEn ? 'Business' : 'Escalabilidade' }}<br>{{ $isEn ? 'Scalability' : 'do Negócio' }}</div>
                            <div class="sol-benefit__desc">{{ $isEn ? 'Grow without limits' : 'Cresça sem limites' }}</div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- VIDEO SECTION --}}
            <div class="sol-modal__section-label" style="margin-bottom:20px;">
                <span class="label-line" style="background:linear-gradient(90deg,transparent,rgba(168,85,247,0.28));"></span>
                <span class="label-text">{{ $isEn ? 'Video Demo' : 'Demonstração em Vídeo' }}</span>
                <span class="label-line" style="background:linear-gradient(90deg,rgba(168,85,247,0.28),transparent);"></span>
            </div>

            <div class="space-y-5">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                    <div class="sol-video-card">
                        <div class="sol-video-header">
                            <span class="sol-video-num">01</span>
                            <div>
                                <div class="sol-video-title">{{ $isEn ? 'Site Template' : 'Modelo Site' }}</div>
                                <div class="sol-video-desc">{{ $isEn ? 'Client homepage' : 'Homepage do cliente' }}</div>
                            </div>
                        </div>
                        <p class="sol-video-caption">{{ $isEn ? 'The homepage clients land on: premium design, service showcase and a direct booking button for a seamless experience.' : 'A página principal que o cliente entra - design premium, apresentação dos serviços e botão direto para o agendamento, além da visualização dos tipos de serviços.' }}</p>
                        <div class="sol-video-wrap">
                            <video class="sol-demo-video" muted loop playsinline preload="none">
                                <source src="{{ asset('videos/Modelo-site.mp4') }}" type="video/mp4">
                            </video>
                        </div>
                    </div>

                    <div class="sol-video-card">
                        <div class="sol-video-header">
                            <span class="sol-video-num">02</span>
                            <div>
                                <div class="sol-video-title">{{ $isEn ? 'Booking' : 'Agendar' }}</div>
                                <div class="sol-video-desc">{{ $isEn ? 'Scheduling flow' : 'Fluxo de agendamento' }}</div>
                            </div>
                        </div>
                        <p class="sol-video-caption">{{ $isEn ? 'The end client picks the service, date and time — all in a few clicks, no calls or messages needed.' : 'O cliente final escolhe o serviço, a data e o horário - tudo em poucos cliques, sem precisar ligar ou mandar mensagem.' }}</p>
                        <div class="sol-video-wrap">
                            <video class="sol-demo-video" muted loop playsinline preload="none">
                                <source src="{{ asset('videos/Agendar.mp4') }}" type="video/mp4">
                            </video>
                        </div>
                    </div>

                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 items-start">

                    <div class="sol-video-card sm:col-span-2">
                        <div class="sol-video-header">
                            <span class="sol-video-num">03</span>
                            <div>
                                <div class="sol-video-title">{{ $isEn ? 'Admin Panel' : 'Painel Adm' }}</div>
                                <div class="sol-video-desc">{{ $isEn ? 'Administrative panel' : 'Painel administrativo' }}</div>
                            </div>
                        </div>
                        <p class="sol-video-caption">{{ $isEn ? 'Strategic Management and Data Intelligence. The panel delivers a 360° view of operations, centralizing daily schedule control and cash flow. Beyond records, it generates detailed revenue reports so the owner can track business growth in real time. On the marketing side, the client module boosts retention with integrated sweepstakes tools and a loyalty system by celebration date, identifying birthdays to instantly trigger personalized promotions.' : 'Gestão Estratégica e Inteligência de Dados. O painel oferece uma visão 360º da operação, centralizando o controle de agendamentos diários e o fluxo de caixa. Mais do que um registro, o sistema gera relatórios detalhados de faturamento, permitindo que o dono acompanhe o crescimento do negócio em tempo real. Na frente de marketing, o módulo de clientes potencializa a retenção com ferramentas de sorteios integrados e um sistema de fidelização por data comemorativa, que identifica aniversariantes para o envio imediato de promoções e mensagens personalizadas.' }}</p>
                        <div class="sol-video-wrap">
                            <video class="sol-demo-video" muted loop playsinline preload="none">
                                <source src="{{ asset('videos/Painel-adm.mp4') }}" type="video/mp4">
                            </video>
                        </div>
                    </div>

                    <div class="sol-video-card sol-video-card--mobile sm:col-span-1">
                        <div class="sol-video-header">
                            <span class="sol-video-num">04</span>
                            <div>
                                <div class="sol-video-title" style="display:flex;align-items:center;gap:6px;">
                                    {{ $isEn ? 'Mobile Template' : 'Modelo Mobile' }}
                                    <span class="sol-mobile-badge">
                                        <svg width="8" height="8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
                                        Mobile
                                    </span>
                                </div>
                                <div class="sol-video-desc">{{ $isEn ? "Client's mobile version" : 'Versão celular do cliente' }}</div>
                            </div>
                        </div>
                        <p class="sol-video-caption">{{ $isEn ? 'How the site looks on mobile: responsive, fast and delivering the same premium experience as desktop.' : 'Como o site aparece no celular: responsivo, rápido e com a mesma experiência premium do desktop.' }}</p>
                        <div class="sol-video-wrap sol-video-wrap--mobile">
                            <video class="sol-demo-video" muted loop playsinline preload="none">
                                <source src="{{ asset('videos/Modelo-mobile.mp4') }}" type="video/mp4">
                            </video>
                        </div>
                    </div>

                </div>

            </div>

        </div>{{-- /body --}}

        {{-- FOOTER CTA --}}
        <div class="sol-modal__footer">
            <p class="text-[11px] text-zinc-600">{{ $isEn ? 'Real project: Nathan do Corte Barbershop' : 'Projeto real: Barbearia Nathan do Corte' }}</p>
            <a href="{{ $isEn ? '/en#agendamento' : '/#agendamento' }}"
               class="inline-flex items-center gap-2 px-8 py-3.5 rounded-full text-[11px] font-bold text-white uppercase tracking-widest transition-all hover:scale-[1.03] active:scale-[0.98]"
               style="font-family:'Orbitron',sans-serif;background:linear-gradient(to right,#7c3aed,#4f46e5);box-shadow:0 8px 24px rgba(124,58,237,0.28);"
               onclick="closeSolutionModal()">
                {{ $isEn ? 'Request a live demo' : 'Solicitar demonstração ao vivo' }} <span>→</span>
            </a>
            <div class="text-[11px] text-zinc-600 mt-1">{{ $isEn ? 'Starting at' : 'A partir de' }} <strong class="text-zinc-400" style="font-family:'Orbitron',sans-serif;">R$2.800</strong></div>
        </div>

    </div>
</div>

<script>
    (function () {
        const contactUrl = "{{ app()->getLocale() === 'en' ? '/en#agendamento' : '/#agendamento' }}";

        // ============ SCROLL REVEAL ============
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15, rootMargin: '0px 0px -40px 0px' });

        document.querySelectorAll('#solucoes .sol-reveal').forEach(el => revealObserver.observe(el));

        // ============ MODAL PREMIUM ============
        var solModal      = document.getElementById('sol-modal');
        var solModalPanel = solModal.querySelector('.sol-modal__panel');
        var demoVideos    = solModal.querySelectorAll('.sol-demo-video');

        window.openSolutionModal = function (id) {
            if (id !== 'gestao-inteligente') return;
            solModal.style.opacity      = '1';
            solModal.style.pointerEvents = 'all';
            solModal.setAttribute('aria-hidden', 'false');
            solModalPanel.scrollTop     = 0;
            document.body.style.overflow = 'hidden';
            demoVideos.forEach(function (v) { v.play().catch(function () {}); });
        };

        window.closeSolutionModal = function () {
            solModal.style.opacity      = '0';
            solModal.style.pointerEvents = 'none';
            solModal.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
            demoVideos.forEach(function (v) { v.pause(); });
        };

        document.getElementById('sol-modal-close').addEventListener('click', closeSolutionModal);

        solModal.addEventListener('click', function (e) {
            if (e.target === solModal) closeSolutionModal();
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && solModal.style.pointerEvents !== 'none') closeSolutionModal();
        });

        var vidObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    entry.target.play().catch(function () {});
                } else {
                    entry.target.pause();
                }
            });
        }, { root: solModalPanel, threshold: 0.25 });

        demoVideos.forEach(function (v) { vidObserver.observe(v); });
    })();
</script>

</body>
</html>
