<!DOCTYPE html>
<html lang="pt-br" style="scroll-behavior: smooth;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matheus de Paulo | Portfólio</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Space+Mono:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #030303;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        .bg-grid-pattern {
            background-size: 50px 50px;
            background-image:
                linear-gradient(to right, rgba(255, 255, 255, 0.015) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.015) 1px, transparent 1px);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.02);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.04);
        }

        .text-gradient {
            background: linear-gradient(135deg, #ffffff 30%, #a855f7 70%, #6366f1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .code-symbol {
            font-family: 'Space Mono', monospace;
            user-select: none;
        }

        @keyframes spinClockwise { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
        @keyframes spinCounterClockwise { from { transform: rotate(0deg); } to { transform: rotate(-360deg); } }
        @keyframes riseUp { from { top: 110%; } to { top: -20%; } }

        .rot-macro-slow-cw { animation: spinClockwise 60s linear infinite; }
        .rot-macro-slow-ccw { animation: spinCounterClockwise 75s linear infinite; }
        .rot-slow-cw { animation: spinClockwise 28s linear infinite; }
        .rot-slow-ccw { animation: spinCounterClockwise 34s linear infinite; }
        .rot-medium-cw { animation: spinClockwise 18s linear infinite; }

        .floating-item {
            position: absolute;
            animation-name: riseUp;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
            will-change: top, transform;
        }

        .parallax-layer {
            transition: transform 0.5s cubic-bezier(0.1, 0.8, 0.2, 1);
            will-change: transform;
        }

        /* Reduz drasticamente o peso no mobile */
        @media (max-width: 768px) {
            /* Esconde metade dos elementos flutuantes em mobile pra performance */
            .floating-item:nth-child(odd) {
                display: none;
            }
            /* Reduz blur dos orbs em mobile */
            .bg-orb {
                filter: blur(60px) !important;
            }
        }

        /* Respeita usuários com sensibilidade a movimento */
        @media (prefers-reduced-motion: reduce) {
            .floating-item,
            .rot-macro-slow-cw,
            .rot-macro-slow-ccw,
            .rot-slow-cw,
            .rot-slow-ccw,
            .rot-medium-cw {
                animation: none !important;
            }
            .parallax-layer {
                transform: none !important;
                transition: none !important;
            }
        }
    </style>
</head>
<body class="text-white min-h-screen relative bg-grid-pattern overflow-x-hidden">

<div class="absolute inset-0 w-full h-full pointer-events-none overflow-hidden z-0">
    <div class="bg-orb absolute w-[700px] h-[700px] rounded-full bg-purple-600/10 blur-[130px] top-[-10%] left-[-10%]"></div>
    <div class="bg-orb absolute w-[600px] h-[600px] rounded-full bg-indigo-600/10 blur-[140px] top-[10%] right-[-5%]"></div>
    <div class="bg-orb absolute w-[500px] h-[500px] rounded-full bg-purple-500/15 blur-[100px] top-[20%] right-[15%]"></div>

    <div class="parallax-layer absolute top-[-10%] left-[-8%] opacity-55 z-10" data-speed="-30">
        <svg width="460" height="460" viewBox="0 0 100 100" fill="none" stroke="currentColor" class="text-purple-400 rot-macro-slow-cw">
            <circle cx="50" cy="50" r="45" stroke-width="0.3"/><circle cx="50" cy="50" r="30" stroke-width="0.2" stroke-dasharray="0.5 0.5"/>
            <ellipse cx="50" cy="50" rx="45" ry="35" stroke-width="0.25"/><ellipse cx="50" cy="50" rx="45" ry="22" stroke-width="0.2"/>
            <ellipse cx="50" cy="50" rx="45" ry="8" stroke-width="0.25"/><ellipse cx="50" cy="50" rx="35" ry="45" stroke-width="0.25"/>
            <ellipse cx="50" cy="50" rx="22" ry="45" stroke-width="0.2"/><ellipse cx="50" cy="50" rx="8" ry="45" stroke-width="0.25"/>
            <g transform="rotate(45 50 50)"><ellipse cx="50" cy="50" rx="45" ry="18" stroke-width="0.2"/><ellipse cx="50" cy="50" rx="18" ry="45" stroke-width="0.2"/></g>
        </svg>
    </div>

    <div class="parallax-layer absolute top-[5%] right-[-5%] opacity-45 z-10" data-speed="-45">
        <svg width="220" height="220" viewBox="0 0 100 100" fill="none" stroke="currentColor" class="text-violet-400 rot-macro-slow-ccw">
            <polygon points="50,2 92,46 50,90 8,46" stroke-width="0.5"/><polygon points="50,22 72,46 50,70 28,46" stroke-width="0.4" stroke-dasharray="1 1"/>
            <line x1="50" y1="2" x2="50" y2="22" stroke-width="0.5"/><line x1="50" y1="70" x2="50" y2="90" stroke-width="0.5"/>
            <line x1="8" y1="46" x2="28" y2="46" stroke-width="0.5"/><line x1="72" y1="46" x2="92" y2="46" stroke-width="0.5"/>
        </svg>
    </div>

    <div class="parallax-layer absolute bottom-[2%] left-[-2%] opacity-40 z-10" data-speed="-35">
        <svg width="180" height="180" viewBox="0 0 100 100" fill="none" stroke="currentColor" class="text-purple-300 rot-macro-slow-ccw">
            <polygon points="50,8 12,82 88,82" stroke-width="0.6"/><line x1="50" y1="8" x2="50" y2="82" stroke-width="0.6"/>
        </svg>
    </div>

    <div class="parallax-layer absolute bottom-[-5%] right-[-4%] opacity-50 z-10" data-speed="-25">
        <svg width="340" height="340" viewBox="0 0 100 100" fill="none" stroke="currentColor" class="text-violet-400 rot-macro-slow-cw">
            <circle cx="50" cy="50" r="42" stroke-width="0.5"/><circle cx="50" cy="50" r="26" stroke-width="0.4" stroke-dasharray="1 1"/>
            <ellipse cx="50" cy="50" rx="42" ry="34" stroke-width="0.3"/><ellipse cx="50" cy="50" rx="42" ry="24" stroke-width="0.3"/>
            <ellipse cx="50" cy="50" rx="34" ry="42" stroke-width="0.3"/><ellipse cx="50" cy="50" rx="24" ry="42" stroke-width="0.3"/>
        </svg>
    </div>

    <div class="floating-item parallax-layer opacity-65 left-[4%]" style="animation-duration: 45s; animation-delay: 0s;" data-speed="-50">
        <svg width="75" height="75" viewBox="0 0 100 100" fill="none" stroke="currentColor" class="text-purple-300 rot-slow-cw">
            <circle cx="50" cy="50" r="45" stroke-width="0.7"/><ellipse cx="50" cy="50" rx="45" ry="15" stroke-width="0.6"/><ellipse cx="50" cy="50" rx="15" ry="45" stroke-width="0.6"/>
        </svg>
    </div>
    <div class="floating-item parallax-layer opacity-50 left-[12%] text-indigo-300 code-symbol text-4xl" style="animation-duration: 35s; animation-delay: -15s;" data-speed="-30">{</div>
    <div class="floating-item parallax-layer opacity-65 left-[9%]" style="animation-duration: 55s; animation-delay: -25s;" data-speed="-60">
        <svg width="55" height="55" viewBox="0 0 100 100" fill="none" stroke="currentColor" class="text-violet-300 rot-slow-ccw">
            <polygon points="50,5 95,50 50,95 5,50" stroke-width="1.0"/><line x1="50" y1="5" x2="50" y2="95" stroke-width="0.6"/>
        </svg>
    </div>

    <div class="floating-item parallax-layer opacity-65 left-[20%]" style="animation-duration: 60s; animation-delay: -5s;" data-speed="-40">
        <svg width="95" height="95" viewBox="0 0 100 100" fill="none" stroke="currentColor" class="text-purple-300 rot-slow-cw">
            <circle cx="50" cy="50" r="45" stroke-width="0.7"/><circle cx="50" cy="50" r="30" stroke-width="0.6"/><ellipse cx="50" cy="50" rx="45" ry="20" stroke-width="0.5"/>
        </svg>
    </div>
    <div class="floating-item parallax-layer opacity-50 left-[26%] text-purple-300 code-symbol text-5xl font-bold" style="animation-duration: 40s; animation-delay: -8s;" data-speed="35">}</div>
    <div class="floating-item parallax-layer opacity-65 left-[34%]" style="animation-duration: 50s; animation-delay: -32s;" data-speed="-45">
        <svg width="65" height="65" viewBox="0 0 100 100" fill="none" stroke="currentColor" class="text-indigo-300 rot-medium-cw">
            <path d="M30 20 L70 20 L70 60 L30 60 Z" stroke-width="1.0"/><path d="M45 35 L85 35 L85 75 L45 75 Z" stroke-width="0.8"/>
        </svg>
    </div>

    <div class="floating-item parallax-layer opacity-60 left-[40%] text-purple-300 code-symbol text-6xl font-bold" style="animation-duration: 42s; animation-delay: -18s;" data-speed="-20">.</div>
    <div class="floating-item parallax-layer opacity-65 left-[48%]" style="animation-duration: 65s; animation-delay: -12s;" data-speed="-55">
        <svg width="85" height="85" viewBox="0 0 100 100" fill="none" stroke="currentColor" class="text-violet-300 rot-slow-ccw">
            <polygon points="50,15 15,75 85,75" stroke-width="1.0"/><line x1="50" y1="15" x2="50" y2="75" stroke-width="0.8"/>
        </svg>
    </div>
    <div class="floating-item parallax-layer opacity-50 left-[55%] text-indigo-300 code-symbol text-4xl" style="animation-duration: 48s; animation-delay: -29s;" data-speed="40">]</div>

    <div class="floating-item parallax-layer opacity-65 left-[62%]" style="animation-duration: 52s; animation-delay: -3s;" data-speed="-35">
        <svg width="80" height="80" viewBox="0 0 100 100" fill="none" stroke="currentColor" class="text-purple-300 rot-slow-cw">
            <circle cx="50" cy="50" r="40" stroke-width="0.7"/><ellipse cx="50" cy="50" rx="40" ry="26" stroke-width="0.5"/>
        </svg>
    </div>
    <div class="floating-item parallax-layer opacity-50 left-[67%] text-purple-300 code-symbol text-5xl" style="animation-duration: 38s; animation-delay: -22s;" data-speed="50">(</div>
    <div class="floating-item parallax-layer opacity-65 left-[72%]" style="animation-duration: 58s; animation-delay: -40s;" data-speed="-50">
        <svg width="70" height="70" viewBox="0 0 100 100" fill="none" stroke="currentColor" class="text-indigo-300 rot-medium-cw">
            <circle cx="50" cy="50" r="38" stroke-width="0.8"/><circle cx="50" cy="50" r="22" stroke-width="0.6" stroke-dasharray="2 1"/>
        </svg>
    </div>

    <div class="floating-item parallax-layer opacity-60 left-[80%] text-indigo-300 code-symbol text-[5rem] font-bold" style="animation-duration: 44s; animation-delay: -7s;" data-speed="25">,</div>
    <div class="floating-item parallax-layer opacity-65 left-[86%]" style="animation-duration: 47s; animation-delay: -15s;" data-speed="-45">
        <svg width="90" height="90" viewBox="0 0 100 100" fill="none" stroke="currentColor" class="text-purple-300 rot-slow-ccw">
            <circle cx="50" cy="50" r="45" stroke-width="0.7"/><ellipse cx="50" cy="50" rx="45" ry="32" stroke-width="0.5"/>
        </svg>
    </div>
    <div class="floating-item parallax-layer opacity-45 left-[94%] text-purple-300 code-symbol text-4xl" style="animation-duration: 36s; animation-delay: -33s;" data-speed="30">;</div>
</div>

@include('partials.navbar')

@include('partials.hero')

@include('partials.projects')

@include('partials.processes')

@include('partials.solucoes-section')

@include('partials.cta-final')

@include('partials.contact')

@include('partials.footer')

</body>

</html>
