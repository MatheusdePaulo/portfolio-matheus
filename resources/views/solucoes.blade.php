<!DOCTYPE html>
<html lang="{{ app()->getLocale() === 'en' ? 'en' : 'pt-br' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ app()->getLocale() === 'en' ? 'Solutions' : 'Soluções' }} — Matheus de Paulo</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
            will-change: top, transform;
        }
        .parallax-layer { will-change: transform; }
        .code-symbol { font-family: 'Space Mono', monospace; user-select: none; }

        /* ============ ANIMAÇÕES DE SCROLL ============ */
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

        /* ============ GRID DE CARDS ============ */
        .sol-grid {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 24px;
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
            padding: 36px 28px 32px;
            overflow: hidden;
            transition: transform 0.5s cubic-bezier(0.25, 1, 0.5, 1),
            border-color 0.5s cubic-bezier(0.25, 1, 0.5, 1),
            box-shadow 0.5s cubic-bezier(0.25, 1, 0.5, 1);
            display: flex;
            flex-direction: column;
            height: 100%;
            cursor: pointer;
        }

        /* Borda gradiente via pseudo-elemento */
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

        /* Glow no topo do card */
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

        /* ============ CARD FEATURED ============ */
        .sol-card--featured {
            background: linear-gradient(180deg, rgba(45, 27, 78, 0.5) 0%, rgba(20, 17, 30, 0.99) 100%);
            border-color: rgba(168, 85, 247, 0.25);
            box-shadow: 0 20px 50px -10px rgba(168, 85, 247, 0.15);
        }
        .sol-card--featured::before { opacity: 0.6; }
        .sol-card--featured .sol-card__glow { opacity: 1; }

        /* ============ CARD ENTERPRISE EXCLUSIVO ============ */
        .sol-card--enterprise {
            border-color: rgba(99, 102, 241, 0.3);
            background: linear-gradient(180deg, rgba(13, 12, 28, 0.98) 0%, rgba(5, 4, 10, 1) 100%);
        }
        .sol-card--enterprise .sol-card__icon {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.2), rgba(168, 85, 247, 0.1));
            border-color: rgba(99, 102, 241, 0.4);
        }
        .sol-card--enterprise .sol-card__icon svg {
            stroke: #818cf8;
        }

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
        }

        .sol-badge--enterprise {
            background: linear-gradient(to right, #4f46e5, #10b981);
            box-shadow: 0 0 12px rgba(99, 102, 241, 0.4);
        }

        /* ============ ÍCONE DO CARD ============ */
        .sol-card__icon {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
            background: linear-gradient(135deg, rgba(168, 85, 247, 0.15), rgba(99, 102, 241, 0.1));
            border: 1px solid rgba(168, 85, 247, 0.2);
            position: relative;
            transition: transform 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
            z-index: 5;
        }
        .sol-card:hover .sol-card__icon {
            transform: scale(1.1) rotate(-5deg);
        }
        .sol-card__icon svg {
            width: 28px;
            height: 28px;
            stroke: #c084fc;
        }

        /* ============ TÍTULO E DESCRIÇÃO ============ */
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
        .sol-card--enterprise .sol-card__level {
            color: #818cf8;
        }
        .sol-card__title {
            font-family: 'Orbitron', sans-serif;
            font-weight: 900;
            font-size: 1.35rem;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 0.02em;
            line-height: 1.1;
            margin-bottom: 6px;
            z-index: 5;
        }
        .sol-card__phrase {
            font-size: 11px;
            font-weight: 600;
            color: #a855f7;
            opacity: 0.85;
            letter-spacing: 0.02em;
            margin-bottom: 12px;
            text-transform: uppercase;
            z-index: 5;
        }
        .sol-card--enterprise .sol-card__phrase {
            color: #818cf8;
        }
        .sol-card__desc {
            font-size: 13px;
            color: #a1a1aa;
            line-height: 1.6;
            margin-bottom: 24px;
            z-index: 5;
        }

        /* ============ LISTA DE FEATURES ============ */
        .sol-features {
            list-style: none;
            padding: 0;
            margin: 0 0 24px;
            flex-grow: 1;
            z-index: 5;
        }
        .sol-features li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 12.5px;
            color: #d4d4d8;
            line-height: 1.5;
            padding: 7px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
        }
        .sol-features li:last-child { border-bottom: none; }
        .sol-features svg {
            width: 14px;
            height: 14px;
            flex-shrink: 0;
            margin-top: 2px;
            stroke: #10b981;
        }

        /* ============ IDEAL PARA ============ */
        .sol-ideal {
            padding: 14px 16px;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.04);
            border-radius: 12px;
            margin-bottom: 20px;
            z-index: 5;
        }
        .sol-ideal__label {
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #a1a1aa;
            margin-bottom: 6px;
        }
        .sol-ideal__list {
            font-size: 11.5px;
            color: #d4d4d8;
            line-height: 1.5;
        }

        /* ============ PREÇO ============ */
        .sol-price {
            margin-bottom: 20px;
            padding-top: 16px;
            border-top: 1px dashed rgba(255, 255, 255, 0.08);
            z-index: 5;
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

        /* ============ BOTÃO CTA ============ */
        .sol-cta {
            width: 100%;
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 13px 20px;
            border-radius: 12px;
            font-size: 12px;
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
            transition: background 0.3s ease, color 0.3s ease,
            border-color 0.3s ease, box-shadow 0.3s ease;
            z-index: 5;
        }
        .sol-cta:hover {
            background: linear-gradient(to right, #7c3aed, #4f46e5);
            color: #fff;
            border-color: rgba(168, 85, 247, 0.5);
            box-shadow: 0 8px 25px rgba(168, 85, 247, 0.3);
        }
        .sol-cta__arrow {
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
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

        /* ============ MODAL ============ */
        #sol-modal {
            background-color: rgba(5, 3, 10, 0.96);
            backdrop-filter: blur(8px);
        }

        .sol-modal__content {
            background: linear-gradient(180deg, rgba(20, 17, 30, 0.95) 0%, rgba(10, 8, 18, 0.98) 100%);
            animation: solModalIn 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes solModalIn {
            from { opacity: 0; transform: scale(0.92) translateY(20px); }
            to   { opacity: 1; transform: scale(1) translateY(0); }
        }

        .sol-modal__media {
            background: linear-gradient(135deg, #1a1625, #0a0812);
            border: 1px solid rgba(168, 85, 247, 0.15);
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            aspect-ratio: 16 / 9;
        }
        .sol-modal__media video,
        .sol-modal__media img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        .sol-modal__media-placeholder {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 16px;
            color: #71717a;
            font-size: 13px;
        }
        .sol-modal__media-placeholder svg {
            width: 64px;
            height: 64px;
            opacity: 0.4;
        }

        .sol-modal__divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(168, 85, 247, 0.4), transparent);
        }
    </style>
</head>
<body class="text-white min-h-screen relative bg-grid-pattern overflow-x-hidden">

{{-- Fundo decorativo --}}
<div class="absolute inset-0 w-full h-full pointer-events-none overflow-hidden z-0">
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

    <div class="floating-item parallax-layer opacity-50 left-[8%]" style="top: 20%; animation-duration: 45s;" data-speed="-8"><span class="text-purple-400 code-symbol text-4xl">{</span></div>
    <div class="floating-item parallax-layer opacity-40 left-[88%]" style="top: 45%; animation-duration: 38s;" data-speed="12"><span class="text-indigo-400 code-symbol text-5xl">}</span></div>
    <div class="floating-item parallax-layer opacity-50 left-[15%]" style="top: 70%; animation-duration: 52s;" data-speed="-6"><span class="text-violet-400 code-symbol text-3xl">[]</span></div>
    <div class="floating-item parallax-layer opacity-35 left-[75%]" style="top: 15%; animation-duration: 60s;" data-speed="8"><span class="text-purple-300 code-symbol text-2xl">;</span></div>
</div>

@include('partials.navbar')

<main class="relative z-10">

    <section id="solucoes" class="w-full max-w-7xl mx-auto px-6 py-24 relative overflow-hidden">

        {{-- Cabeçalho --}}
        <div class="text-center mb-16 relative z-10 select-none sol-reveal">
            <span class="text-purple-500 font-bold text-[11px] uppercase tracking-[0.3em] block mb-4" style="font-family: 'Orbitron', sans-serif;">
                Soluções Empresariais
            </span>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-black text-white uppercase tracking-tight leading-[1.05]" style="font-family: 'Orbitron', sans-serif;">
                Sistemas que<br><span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-indigo-400">elevam seu negócio</span>
            </h2>
            <p class="text-zinc-400 text-sm md:text-base max-w-2xl mx-auto leading-relaxed mt-5">
                Do posicionamento premium ao software sob medida. Desenvolvemos ecossistemas tecnológicos integrados focados em automação, escala e autoridade comercial.
            </p>
        </div>

        {{-- Grid de cards --}}
        <div class="sol-grid relative z-10">

            {{-- ============ PLANO 1 — Presença Digital ============ --}}
            <div class="sol-card sol-reveal">
                <div class="sol-card__glow"></div>

                {{-- Elemento Decorativo Tecnológico Sutil --}}
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

                <div class="sol-card__level">Plano 01</div>
                <h3 class="sol-card__title">Presença Digital</h3>
                <div class="sol-card__phrase">“Ideal para empresas que querem atrair mais clientes online.”</div>
                <p class="sol-card__desc">Posicionamento de alto nível através de uma estrutura otimizada, gerando autoridade imediata no mercado.</p>

                <ul class="sol-features">
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Design exclusivo e responsivo de alta conversão
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Canal direto de conversão via WhatsApp integrado
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Captura qualificada através de formulários inteligentes
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Estrutura técnica blindada focada em autoridade
                    </li>
                </ul>

                <div class="sol-ideal">
                    <div class="sol-ideal__label">Foco de Atuação</div>
                    <div class="sol-ideal__list">Empresas locais e prestadores de serviço que buscam dominar o mercado local e fechar contratos de maior valor.</div>
                </div>

                <div class="sol-price">
                    <div class="sol-price__label">A partir de</div>
                    <div class="sol-price__value"><span class="sol-price__currency">R$</span>697</div>
                </div>

                <a href="{{ app()->getLocale() === 'en' ? '/en#agendamento' : '/#agendamento' }}" class="sol-cta">
                    Solicitar proposta
                    <span class="sol-cta__arrow">→</span>
                </a>
            </div>

            {{-- ============ PLANO 2 — Gestão Inteligente (FEATURED) ============ --}}
            <div class="sol-card sol-card--featured sol-reveal" onclick="openSolutionModal('gestao-inteligente')">
                <span class="sol-badge">★ Mais Popular</span>
                <div class="sol-card__glow"></div>

                {{-- Linha Gráfica Futurista Sutil --}}
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

                <div class="sol-card__level">Plano 02</div>
                <h3 class="sol-card__title">Gestão Inteligente</h3>
                <div class="sol-card__phrase">“Automatize sua operação e profissionalize seu atendimento.”</div>
                <p class="sol-card__desc">Software de gestão centralizado para automatizar processos de ponta a ponta e erradicar falhas operacionais.</p>

                <ul class="sol-features">
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Painel administrativo exclusivo com métricas em tempo real
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Organize clientes e automatize seus agendamentos
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Receba pagamentos automaticamente via PIX integrado
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Relatórios inteligentes e métricas de faturamento líquido
                    </li>
                </ul>

                <div class="sol-ideal">
                    <div class="sol-ideal__label">Foco de Atuação</div>
                    <div class="sol-ideal__list">Barbeiros, clínicas boutique e profissionais que operam sob agendamento e querem eliminar o agendamento manual.</div>
                </div>

                <div class="sol-price">
                    <div class="sol-price__label">A partir de</div>
                    <div class="sol-price__value"><span class="sol-price__currency">R$</span>2.200</div>
                </div>

                <button class="sol-cta sol-cta--featured" type="button">
                    Ver demonstração
                    <span class="sol-cta__arrow">→</span>
                </button>
            </div>

            {{-- ============ PLANO 3 — Equipe PRO ============ --}}
            <div class="sol-card sol-reveal">
                <div class="sol-card__glow"></div>

                {{-- Mini Dashboard Transparente Sutil --}}
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

                <div class="sol-card__level">Plano 03</div>
                <h3 class="sol-card__title">Equipe PRO</h3>
                <div class="sol-card__phrase">“Gerencie equipes e aumente a produtividade do seu negócio.”</div>
                <p class="sol-card__desc">Infraestrutura multiusuário robusta desenvolvida para unificar fluxos de trabalho e liderar times de alta performance.</p>

                <ul class="sol-features">
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Múltiplos níveis de acessos e permissões administrativas
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Agenda compartilhada em tempo real com distribuição de carga
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Split de pagamentos nativo (PIX e Cartão de Crédito)
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
                        Relatórios avançados de produtividade e comissionamento
                    </li>
                </ul>

                <div class="sol-ideal">
                    <div class="sol-ideal__label">Foco de Atuação</div>
                    <div class="sol-ideal__list">Barbearias em expansão, clínicas médicas de médio porte e salões com múltiplos colaboradores parceiros.</div>
                </div>

                <div class="sol-price">
                    <div class="sol-price__label">A partir de</div>
                    <div class="sol-price__value"><span class="sol-price__currency">R$</span>3.200</div>
                </div>

                <a href="{{ app()->getLocale() === 'en' ? '/en#agendamento' : '/#agendamento' }}" class="sol-cta">
                    Solicitar proposta
                    <span class="sol-cta__arrow">→</span>
                </a>
            </div>

            {{-- ============ PLANO 4 — Enterprise (MELHORADO) ============ --}}
            <div class="sol-card sol-card--enterprise sol-reveal">
                <span class="sol-badge sol-badge--enterprise">✦ Solução Custom</span>
                <div class="sol-card__glow" style="background: linear-gradient(90deg, transparent, rgba(99, 102, 241, 0.6), transparent);"></div>

                {{-- Elemento Decorativo Grade de Dados Futurista --}}
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

                <div class="sol-card__level">Plano 04</div>
                <h3 class="sol-card__title">Enterprise</h3>
                <div class="sol-card__phrase">“Estrutura completa para empresas em crescimento.”</div>
                <p class="sol-card__desc">Solução de software sob medida de alta complexidade desenvolvida exclusivamente para suprir gargalos de grandes operações.</p>

                <ul class="sol-features">
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="stroke: #818cf8;"><polyline points="20 6 9 17 4 12"/></svg>
                        Solução 100% sob medida mapeada para o seu modelo de negócio
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="stroke: #818cf8;"><polyline points="20 6 9 17 4 12"/></svg>
                        Integração completa com APIs externas e ERPs legados
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="stroke: #818cf8;"><polyline points="20 6 9 17 4 12"/></svg>
                        Expansão altamente escalável preparada para alto tráfego
                    </li>
                    <li>
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="stroke: #818cf8;"><polyline points="20 6 9 17 4 12"/></svg>
                        Atendimento prioritário com SLA e suporte VIP contínuo
                    </li>
                </ul>

                <div class="sol-ideal">
                    <div class="sol-ideal__label">Foco de Atuação</div>
                    <div class="sol-ideal__list">Franquias, indústrias, redes de clínicas ou corporações que demandam arquitetura dedicada e engenharia exclusiva.</div>
                </div>

                <div class="sol-price">
                    <div class="sol-price__label">Arquitetura Dedicada</div>
                    <div class="sol-price__value" style="color: #818cf8;">Sob Consulta</div>
                </div>

                <a href="{{ app()->getLocale() === 'en' ? '/en#agendamento' : '/#agendamento' }}" class="sol-cta sol-cta--enterprise">
                    Falar com especialista
                    <span class="sol-cta__arrow">→</span>
                </a>
            </div>

        </div>

        {{-- ============ NOVA ÁREA DE PERCEPÇÃO DE CONFIANÇA/AUTORIDADE ============ --}}
        <div class="mt-20 pt-10 border-t border-white/[0.04] max-w-5xl mx-auto sol-reveal select-none">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-6 text-center">
                <div class="space-y-1 group">
                    <div class="text-white font-bold text-xs uppercase tracking-widest font-orbitron transition-colors group-hover:text-purple-400" style="font-family: 'Orbitron', sans-serif;">Desenvolvimento Custom</div>
                    <div class="text-[11px] text-zinc-500 font-medium">Sistemas Autorais</div>
                </div>
                <div class="space-y-1 group">
                    <div class="text-white font-bold text-xs uppercase tracking-widest font-orbitron transition-colors group-hover:text-purple-400" style="font-family: 'Orbitron', sans-serif;">Arquitetura Moderna</div>
                    <div class="text-[11px] text-zinc-500 font-medium">Código Limpo e Ágil</div>
                </div>
                <div class="space-y-1 group">
                    <div class="text-white font-bold text-xs uppercase tracking-widest font-orbitron transition-colors group-hover:text-purple-400" style="font-family: 'Orbitron', sans-serif;">Design Responsivo</div>
                    <div class="Layout Fluido">Experiência Premium</div>
                </div>
                <div class="space-y-1 group">
                    <div class="text-white font-bold text-xs uppercase tracking-widest font-orbitron transition-colors group-hover:text-purple-400" style="font-family: 'Orbitron', sans-serif;">Suporte Dedicado</div>
                    <div class="text-[11px] text-zinc-500 font-medium">Acompanhamento Ativo</div>
                </div>
                <div class="col-span-2 md:col-span-1 space-y-1 group">
                    <div class="text-white font-bold text-xs uppercase tracking-widest font-orbitron transition-colors group-hover:text-purple-400" style="font-family: 'Orbitron', sans-serif;">Escala Garantida</div>
                    <div class="text-[11px] text-zinc-500 font-medium">Pronto para o Crescimento</div>
                </div>
            </div>
        </div>

        {{-- Rodapé com CTA secundário --}}
        <div class="text-center mt-16 sol-reveal">
            <p class="text-zinc-400 text-sm mb-4">
                Precisa de uma estrutura exclusiva fora dos escopos acima?
            </p>
            <a href="{{ app()->getLocale() === 'en' ? '/en#agendamento' : '/#agendamento' }}" class="inline-flex items-center gap-2 px-7 py-3 rounded-full text-xs font-bold bg-gradient-to-r from-purple-600 to-indigo-600 text-white uppercase tracking-widest transition-all hover:scale-105 shadow-[0_4px_20px_rgba(168,85,247,0.25)]" style="font-family: 'Orbitron', sans-serif;">
                Alinhar Projeto Exclusivo
                <span>→</span>
            </a>
        </div>

    </section>

</main>

@include('partials.footer')

{{-- ============ MODAL DE DEMONSTRAÇÃO (exclusivo do Plano 02) ============ --}}
<div id="sol-modal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 md:p-6 opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="sol-modal__content w-full max-w-4xl max-h-[90vh] overflow-y-auto rounded-[28px] border border-white/[0.08] shadow-[0_0_80px_rgba(168,85,247,0.2)] relative">

        <button onclick="closeSolutionModal()" class="absolute top-5 right-5 z-50 flex items-center justify-center w-10 h-10 rounded-full border border-white/10 bg-zinc-900/80 text-zinc-400 hover:text-white hover:border-purple-500/40 transition-all">
            ✕
        </button>

        <div id="sol-modal-content" class="p-6 md:p-10 space-y-6"></div>
    </div>
</div>

<script>
    (function () {
        const contactUrl = "{{ app()->getLocale() === 'en' ? '/en#agendamento' : '/#agendamento' }}";

        // Apenas o Plano 02 tem demonstração real
        const gestaoData = {
            level: 'Plano 02',
            title: 'Gestão Inteligente',
            tag: 'Sistema Completo de Gestão',
            mediaType: 'image',
            mediaSrc: '{{ asset("imagens/Painel Administrativo.png") }}',
            mediaAlt: 'Painel Administrativo Sistema Nathan',
            desc: 'O sistema que profissionalizou a operação da Barbearia Nathan do Corte. Um ecossistema completo onde você gerencia agendamentos, clientes, faturamento e marketing — tudo em uma única interface limpa e intuitiva.',
            highlights: [
                { icon: '📊', title: 'Dashboard Inteligente', desc: 'Visão consolidada de agendamentos, receita e métricas em tempo real.' },
                { icon: '📅', title: 'Agenda Automatizada', desc: 'Clientes agendam sozinhos via link público. Você foca em atender, não em responder mensagens.' },
                { icon: '💸', title: 'PIX Integrado', desc: 'Recebimento automático via PIX com confirmação instantânea no painel.' },
                { icon: '📈', title: 'Relatórios Financeiros', desc: 'Acompanhe entradas, saídas, lucro líquido e métricas de no-show.' }
            ],
            ctaLabel: 'Solicitar demonstração ao vivo',
            price: 'A partir de R$2.200'
        };

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

        // ============ MODAL ============
        window.openSolutionModal = function (id) {
            if (id !== 'gestao-inteligente') return;
            const data = gestaoData;

            const mediaHtml = data.mediaType === 'image' && data.mediaSrc
                ? `<img src="${data.mediaSrc}" alt="${data.mediaAlt || ''}">`
                : `<div class="sol-modal__media-placeholder">
                       <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                           <polygon points="5 3 19 12 5 21 5 3"/>
                       </svg>
                       Demonstração em breve
                   </div>`;

            document.getElementById('sol-modal-content').innerHTML = `
                <div class="space-y-2">
                    <span class="text-[10px] font-black uppercase tracking-[0.25em] text-purple-400" style="font-family: 'Orbitron', sans-serif;">${data.level} · ${data.tag}</span>
                    <h3 class="text-3xl md:text-4xl font-black text-white uppercase tracking-tight pt-1" style="font-family: 'Orbitron', sans-serif;">${data.title}</h3>
                </div>
                <div class="sol-modal__divider"></div>
                <div class="sol-modal__media">${mediaHtml}</div>
                <p class="text-zinc-300 text-sm md:text-base leading-relaxed">${data.desc}</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
                    ${data.highlights.map(h => `
                        <div class="p-4 rounded-2xl bg-zinc-900/40 border border-white/[0.04] flex gap-3 items-start hover:border-purple-500/20 transition-all">
                            <span class="text-2xl leading-none">${h.icon}</span>
                            <div class="space-y-1">
                                <h4 class="text-white text-sm font-bold uppercase tracking-tight" style="font-family: 'Orbitron', sans-serif;">${h.title}</h4>
                                <p class="text-zinc-400 text-xs leading-relaxed">${h.desc}</p>
                            </div>
                        </div>
                    `).join('')}
                </div>
                <div class="sol-modal__divider"></div>
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pt-2">
                    <div>
                        <div class="text-[10px] font-bold uppercase tracking-widest text-zinc-500 mb-1">Investimento</div>
                        <div class="text-2xl font-black text-white" style="font-family: 'Orbitron', sans-serif;">${data.price}</div>
                    </div>
                    <a href="${contactUrl}" onclick="closeSolutionModal()" class="inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-full text-xs font-bold bg-gradient-to-r from-purple-600 to-indigo-600 text-white uppercase tracking-widest transition-all hover:scale-105 shadow-[0_8px_25px_rgba(168,85,247,0.3)]" style="font-family: 'Orbitron', sans-serif;">
                        ${data.ctaLabel} <span>→</span>
                    </a>
                </div>
            `;

            const modal = document.getElementById('sol-modal');
            modal.classList.remove('opacity-0', 'pointer-events-none');
            document.body.style.overflow = 'hidden';
        };

        window.closeSolutionModal = function () {
            document.getElementById('sol-modal').classList.add('opacity-0', 'pointer-events-none');
            document.body.style.overflow = '';
        };

        document.getElementById('sol-modal').addEventListener('click', function (e) {
            if (e.target === this) closeSolutionModal();
        });

        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeSolutionModal();
        });
    })();
</script>

@include('partials.custom-cursor')
</body>
</html>
