<!DOCTYPE html>
<html lang="{{ app()->getLocale() === 'en' ? 'en' : 'pt-br' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('site.about_page_title') }}</title>

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
        .fade-bottom-mask {
            mask-image: linear-gradient(to bottom, black 65%, transparent 100%);
            -webkit-mask-image: linear-gradient(to bottom, black 65%, transparent 100%);
        }
    </style>
</head>
<body class="text-white min-h-screen relative bg-grid-pattern overflow-x-hidden">

<div class="absolute inset-0 w-full h-full pointer-events-none overflow-hidden z-0">
    <div class="absolute w-[700px] h-[700px] rounded-full bg-purple-600/10 blur-[130px] top-[-5%] left-[-10%]"></div>
    <div class="absolute w-[600px] h-[600px] rounded-full bg-indigo-600/10 blur-[140px] top-[30%] right-[-10%]"></div>

    <div class="parallax-layer absolute top-[15%] right-[-5%] opacity-35 z-10" data-speed="-15">
        <svg width="320" height="320" viewBox="0 0 100 100" fill="none" stroke="currentColor" class="text-purple-500/40 rot-macro-slow-cw">
            <circle cx="50" cy="50" r="45" stroke-width="0.3"/>
            <ellipse cx="50" cy="50" rx="45" ry="15" stroke-width="0.25"/>
            <ellipse cx="50" cy="50" rx="15" ry="45" stroke-width="0.25"/>
        </svg>
    </div>

    <div class="floating-item parallax-layer opacity-50 left-[8%]" style="top: 20%; animation-duration: 45s;"><span class="text-purple-400 code-symbol text-4xl">{</span></div>
    <div class="floating-item parallax-layer opacity-40 left-[88%]" style="top: 45%; animation-duration: 38s;"><span class="text-indigo-400 code-symbol text-5xl">}</span></div>
    <div class="floating-item parallax-layer opacity-50 left-[15%]" style="top: 70%; animation-duration: 52s;"><span class="text-violet-400 code-symbol text-3xl">[]</span></div>
</div>

@include('partials.navbar')

<main class="w-full max-w-7xl mx-auto px-6 py-20 md:py-32 relative z-10 min-h-[60vh]">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 items-center">

        <div class="lg:col-span-5 flex flex-col items-center lg:items-start relative select-none">
            <div class="w-full max-w-md relative transform transition duration-700 hover:scale-[1.01] flex flex-col items-center lg:items-start">

                <div class="fade-bottom-mask w-full">
                    <img src="{{ asset('imagens/perfil.png') }}" alt="Matheus de Paulo" class="w-full h-auto object-contain filter drop-shadow-[0_10px_25px_rgba(168,85,247,0.15)]">
                </div>

                <div class="absolute -bottom-12 lg:-bottom-6 lg:-left-16 z-20 flex gap-4 backdrop-blur-md bg-zinc-950/70 border border-white/[0.06] p-4 rounded-2xl shadow-[0_25px_50px_rgba(0,0,0,0.8)]">
                    <div class="px-4 text-center lg:text-left border-r border-white/10">
                        <p class="text-purple-400 text-[9px] font-black tracking-widest uppercase font-orbitron" style="font-family: 'Orbitron', sans-serif;">{{ __('site.about_exp_label') }}</p>
                        <p class="text-white text-xl font-black mt-0.5 font-orbitron leading-none" style="font-family: 'Orbitron', sans-serif;">{{ __('site.about_exp_value') }}</p>
                    </div>
                    <div class="px-4 text-center lg:text-left">
                        <p class="text-indigo-400 text-[9px] font-black tracking-widest uppercase font-orbitron" style="font-family: 'Orbitron', sans-serif;">{{ __('site.about_sys_label') }}</p>
                        <p class="text-white text-xl font-black mt-0.5 font-orbitron leading-none" style="font-family: 'Orbitron', sans-serif;">{{ __('site.about_sys_value') }}</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="lg:col-span-7 space-y-8 text-center lg:text-left pt-16 lg:pt-0">
            <div class="space-y-3">
                <h1 class="text-4xl md:text-6xl font-black text-white uppercase tracking-tight font-orbitron leading-none" style="font-family: 'Orbitron', sans-serif;">
                    {{ __('site.about_h1_p1') }}<br><span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-indigo-400">{{ __('site.about_h1_p2') }}</span>
                </h1>
            </div>

            <div class="space-y-6 text-zinc-400 text-sm md:text-base leading-relaxed max-w-2xl mx-auto lg:mx-0">
                <p>{{ __('site.about_p1') }}</p>
                <p>{{ __('site.about_p2') }}</p>
                <p>{!! __('site.about_p3') !!}</p>
            </div>

            <div class="p-6 rounded-2xl bg-zinc-900/20 border border-purple-500/10 max-w-2xl mx-auto lg:mx-0 relative backdrop-blur-md">
                <p class="text-zinc-300 text-xs md:text-sm font-semibold italic leading-relaxed">
                    {{ __('site.about_quote') }}
                </p>
            </div>

            <div class="pt-2">
                <a href="{{ app()->getLocale() === 'en' ? '/en#agendamento' : '/#agendamento' }}" class="inline-flex px-8 py-4 rounded-full text-xs font-bold bg-gradient-to-r from-purple-600 to-indigo-600 text-white uppercase tracking-widest transition-all duration-300 hover:scale-105 active:scale-95 shadow-[0_4px_20px_rgba(168,85,247,0.3)] hover:shadow-[0_4px_30px_rgba(168,85,247,0.5)]">
                    {{ __('site.about_cta') }}
                </a>
            </div>
        </div>

    </div>
</main>

@include('partials.stacks')

@include('partials.experiencia')

@include('partials.footer')


@include('partials.custom-cursor')
</body>
</html>
