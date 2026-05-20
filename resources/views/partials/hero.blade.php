@php
    $larguraMax = "750px";
    $alturaMax  = "750px";
@endphp

{{-- IMPORT DA FONTE --}}
<style>
    @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@700;900&display=swap');

    .hero-name-line {
        font-family: 'Orbitron', sans-serif;
        font-weight: 900;
        line-height: 1;
        color: #a855f7;
        text-shadow: 0 0 35px rgba(168,85,247,0.3);
        display: block;
        letter-spacing: 0.03em;
    }

    .hero-name-line .big-letter {
        font-size: 1.2em;
        display: inline-block;
        line-height: 1;
    }

    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 14px 32px;
        border-radius: 999px;
        font-weight: 700;
        font-size: 0.875rem;
        letter-spacing: 0.05em;
        background: #9333ea;
        color: #fff;
        box-shadow: 0 4px 25px rgba(168,85,247,0.4);
        transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1),
        box-shadow 0.3s ease,
        background 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    .btn-primary::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at center, rgba(255,255,255,0.15), transparent 70%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .btn-primary:hover {
        transform: scale(1.08);
        background: #a855f7;
        box-shadow: 0 6px 40px rgba(168,85,247,0.7), 0 0 0 1px rgba(168,85,247,0.3);
    }
    .btn-primary:hover::before { opacity: 1; }
    .btn-primary .arrow {
        transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1);
        display: inline-block;
    }
    .btn-primary:hover .arrow { transform: translateX(5px); }

    .btn-secondary {
        display: inline-flex;
        align-items: center;
        padding: 14px 32px;
        border-radius: 999px;
        font-weight: 700;
        font-size: 0.875rem;
        letter-spacing: 0.05em;
        color: #fff;
        border: 1px solid rgba(168,85,247,0.3);
        background: transparent;
        transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1),
        box-shadow 0.3s ease,
        border-color 0.3s ease,
        background 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    .btn-secondary::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at center, rgba(168,85,247,0.12), transparent 70%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .btn-secondary:hover {
        transform: scale(1.08);
        border-color: rgba(168,85,247,0.7);
        background: rgba(168,85,247,0.08);
        box-shadow: 0 4px 30px rgba(168,85,247,0.2), 0 0 0 1px rgba(168,85,247,0.2);
    }
    .btn-secondary:hover::before { opacity: 1; }

    /* MOUSE */
    .scroll-mouse {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 8px;
        animation: fadeInUp 1s ease 1.5s both;
    }
    .scroll-mouse__icon {
        width: 26px;
        height: 42px;
        border: 2px solid rgba(168,85,247,0.5);
        border-radius: 13px;
        display: flex;
        justify-content: center;
        padding-top: 7px;
    }
    .scroll-mouse__wheel {
        width: 3px;
        height: 8px;
        background: #a855f7;
        border-radius: 2px;
        animation: scrollWheel 1.8s ease-in-out infinite;
        box-shadow: 0 0 6px rgba(168,85,247,0.8);
    }
    .scroll-mouse__label {
        font-size: 10px;
        font-weight: 600;
        letter-spacing: 0.15em;
        text-transform: uppercase;
        color: rgba(168,85,247,0.6);
    }

    @keyframes scrollWheel {
        0%   { transform: translateY(0); opacity: 1; }
        60%  { transform: translateY(8px); opacity: 0.2; }
        61%  { transform: translateY(0); opacity: 0; }
        100% { transform: translateY(0); opacity: 1; }
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(10px); }
        to   { opacity: 1; transform: translateY(0); }
    }
</style>

{{-- WRAPPER GERAL: grid + mouse abaixo --}}
<div class="w-full max-w-7xl mx-auto px-6 relative z-10">

    <main class="pt-20 pb-8 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">

        {{-- COLUNA ESQUERDA --}}
        <div class="lg:col-span-6 space-y-7 z-20 relative">

            <div class="space-y-4 select-none">
                <p class="text-sm font-semibold text-white tracking-[0.2em] uppercase">
                    {{ __('site.hero_tag') }}
                </p>

                <h1 class="leading-none uppercase" style="font-family: 'Orbitron', sans-serif; font-weight: 900;">
                    <span class="hero-name-line" style="font-size: clamp(2.6rem, 4.5vw, 3.6rem);">
                        <span class="big-letter">M</span>ATHEUS
                    </span>
                    <span class="hero-name-line mt-2" style="font-size: clamp(2rem, 3.4vw, 2.8rem);">
                        DE <span class="big-letter">P</span>AULO
                    </span>
                </h1>

                <p class="text-zinc-300 text-base md:text-lg leading-relaxed max-w-md font-medium">
                    {{ __('site.hero_subtitle') }}
                </p>
            </div>

            <div class="flex flex-nowrap gap-2 pt-1 overflow-visible">
                <span class="text-[11px] font-bold px-2.5 py-1.5 rounded-full bg-white/5 border border-white/10 text-purple-300 tracking-wide whitespace-nowrap">{{ __('site.hero_badge_1') }}</span>
                <span class="text-[11px] font-bold px-2.5 py-1.5 rounded-full bg-white/5 border border-white/10 text-purple-300 tracking-wide whitespace-nowrap">{{ __('site.hero_badge_2') }}</span>
                <span class="text-[11px] font-bold px-2.5 py-1.5 rounded-full bg-white/5 border border-white/10 text-purple-300 tracking-wide whitespace-nowrap">{{ __('site.hero_badge_3') }}</span>
                <span class="text-[11px] font-bold px-2.5 py-1.5 rounded-full bg-white/5 border border-white/10 text-purple-300 tracking-wide whitespace-nowrap">{{ __('site.hero_badge_4') }}</span>
            </div>

            <p class="text-zinc-400 text-sm md:text-base leading-relaxed max-w-sm">
                {{ __('site.hero_desc') }}
            </p>

            <div class="flex flex-wrap gap-5 text-sm text-zinc-400">
                <div class="flex items-center gap-2 font-medium">
                    <span class="text-purple-500">📍</span> Ceará, Brasil
                </div>
                <div class="flex items-center gap-2 font-medium">
                    <span class="inline-block w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    {{ __('site.hero_available') }}
                </div>
            </div>

            <div class="flex flex-wrap items-center gap-4 pt-1">
                <a href="#projetos" class="btn-primary">
                    {{ __('site.hero_btn_projects') }} <span class="arrow">→</span>
                </a>
                <a href="#contato" class="btn-secondary">
                    {{ __('site.hero_btn_contact') }}
                </a>
            </div>

        </div>

        {{-- COLUNA DIREITA --}}
        <div class="lg:col-span-6 relative flex flex-col justify-center items-center min-h-[460px] lg:min-h-[620px]">

            <div class="w-full flex items-center justify-center relative z-10 transition-all duration-500 ease-out hover:scale-[1.02]"
                 style="max-width: {{ $larguraMax }}; height: {{ $alturaMax }};
                        -webkit-mask-image: linear-gradient(to bottom, black 60%, transparent 92%);
                        mask-image: linear-gradient(to bottom, black 60%, transparent 92%);">
                <img src="{{ asset('imagens/MatheusCaricatura.png') }}"
                     alt="Matheus de Paulo — Desenvolvedor Web Premium"
                     class="w-full h-full object-contain filter drop-shadow-[0_10px_40px_rgba(168,85,247,0.15)]">
            </div>

            <div class="mt-4 lg:mt-0 lg:absolute lg:bottom-10 lg:right-6 z-30
                        py-5 px-8 rounded-2xl
                        bg-zinc-900/70 border border-white/[0.06]
                        backdrop-blur-xl shadow-[0_20px_50px_rgba(0,0,0,0.5)]
                        select-none min-w-[240px] lg:min-w-[280px]">
                <div class="grid grid-cols-2 gap-8 divide-x divide-white/10 items-center">
                    <div class="text-center space-y-1">
                        <div class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest">{{ __('experiência') }}</div>
                        <div class="text-3xl font-black text-purple-400 tracking-tight leading-none">2</div>
                        <div class="text-sm font-bold text-white">{{ __('site.hero_years') }}</div>
                    </div>
                    <div class="text-center pl-8 space-y-1">
                        <div class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest">{{ __('site.hero_projects') }}</div>
                        <div class="text-3xl font-black text-white tracking-tight leading-none">+15</div>
                        <div class="text-sm font-bold text-zinc-300">{{ __('site.hero_delivered') }}</div>
                    </div>
                </div>
            </div>

        </div>

    </main>

    {{-- MOUSE CENTRALIZADO ABAIXO DO GRID --}}
    <div class="w-full flex justify-center pb-6 -mt-8">
        <div class="scroll-mouse">
            <div class="scroll-mouse__icon">
                <div class="scroll-mouse__wheel"></div>
            </div>
            <span class="scroll-mouse__label">Scroll</span>
        </div>
    </div>

</div>
