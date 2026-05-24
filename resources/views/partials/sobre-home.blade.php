@php
$locale = app()->getLocale();
$isEn   = $locale === 'en';

$diferenciais = $isEn ? [
    'Custom-built development — no templates, no copies',
    'Modern, scalable and maintainable systems',
    'Strategic UX focused on conversion',
    'Performance-optimized for all devices',
    'Smart integrations (PIX, WhatsApp, APIs)',
    'Dedicated support and active follow-up',
] : [
    'Desenvolvimento sob medida — sem templates, sem cópias',
    'Sistemas modernos, escaláveis e de fácil manutenção',
    'UX estratégica focada em conversão real',
    'Performance otimizada para todos os dispositivos',
    'Integrações inteligentes (PIX, WhatsApp, APIs)',
    'Suporte dedicado e acompanhamento ativo',
];
@endphp

<style>
    .sobre-reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.8s ease-out, transform 0.8s cubic-bezier(0.25, 1, 0.5, 1);
    }
    .sobre-reveal.visible { opacity: 1; transform: translateY(0); }
    .sobre-reveal--d1 { transition-delay: 0.15s; }
    .sobre-reveal--d2 { transition-delay: 0.30s; }

    .diferencial-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 10px 0;
        border-bottom: 1px solid rgba(255,255,255,0.03);
        transition: transform 0.3s ease;
    }
    .diferencial-item:last-child { border-bottom: none; }
    .diferencial-item:hover { transform: translateX(4px); }
    .diferencial-check {
        width: 18px; height: 18px; flex-shrink: 0; margin-top: 1px;
        border-radius: 50%; background: rgba(16,185,129,0.12);
        border: 1px solid rgba(16,185,129,0.3);
        display: flex; align-items: center; justify-content: center;
        transition: background 0.3s ease, border-color 0.3s ease;
    }
    .diferencial-item:hover .diferencial-check {
        background: rgba(16,185,129,0.2);
        border-color: rgba(16,185,129,0.5);
    }
    .diferencial-check svg { stroke: #10b981; width: 10px; height: 10px; }
</style>

<section class="w-full max-w-7xl mx-auto px-6 py-20 relative z-10 overflow-hidden">

    {{-- ambient --}}
    <div class="absolute left-0 top-1/2 -translate-y-1/2 w-96 h-96 bg-purple-600/6 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

        {{-- LEFT — Heading + diferenciais --}}
        <div class="space-y-8 sobre-reveal">
            <div class="space-y-4">
                <span class="text-purple-500 font-bold text-[11px] uppercase tracking-[0.3em] block"
                      style="font-family: 'Orbitron', sans-serif;">
                    {{ $isEn ? 'About the Developer' : 'Sobre o Desenvolvedor' }}
                </span>
                <h2 class="font-black uppercase tracking-tight leading-[1.05] text-4xl md:text-5xl"
                    style="font-family: 'Orbitron', sans-serif;">
                    {{ $isEn ? 'Technology that works' : 'Tecnologia que trabalha' }}<br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-indigo-400">
                        {{ $isEn ? 'for your business' : 'pelo seu negócio' }}
                    </span>
                </h2>
                <p class="text-zinc-400 text-base leading-relaxed max-w-lg">
                    {{ $isEn
                        ? 'I\'m not the average freelancer. I build complete digital ecosystems — from strategy and design to code and launch — built to generate real commercial results.'
                        : 'Não sou o freelancer comum. Construo ecossistemas digitais completos — da estratégia e design ao código e lançamento — projetados para gerar resultados comerciais reais.' }}
                </p>
            </div>

            {{-- Diferenciais --}}
            <div class="space-y-0">
                @foreach($diferenciais as $item)
                <div class="diferencial-item">
                    <div class="diferencial-check">
                        <svg viewBox="0 0 24 24" fill="none" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"/>
                        </svg>
                    </div>
                    <span class="text-zinc-300 text-sm font-medium leading-snug">{{ $item }}</span>
                </div>
                @endforeach
            </div>

            <div class="flex flex-wrap gap-4 pt-2">
                <a href="#agendamento"
                   class="inline-flex items-center gap-2 px-6 py-3 rounded-full text-xs font-bold bg-gradient-to-r from-purple-600 to-indigo-600 text-white uppercase tracking-widest transition-all hover:scale-105 shadow-[0_4px_20px_rgba(168,85,247,0.25)]"
                   style="font-family: 'Orbitron', sans-serif;">
                    {{ $isEn ? 'Start a project' : 'Iniciar projeto' }} →
                </a>
                <a href="{{ $isEn ? '/en/sobre' : '/sobre' }}"
                   class="inline-flex items-center gap-2 px-6 py-3 rounded-full text-xs font-bold border border-white/10 text-zinc-300 hover:text-white hover:border-purple-500/30 uppercase tracking-widest transition-all"
                   style="font-family: 'Orbitron', sans-serif;">
                    {{ $isEn ? 'Learn more' : 'Saiba mais' }}
                </a>
            </div>
        </div>

        {{-- RIGHT — Stats card + visual badge grid --}}
        <div class="flex flex-col gap-6 sobre-reveal sobre-reveal--d1">

            {{-- Stats card --}}
            <div class="rounded-2xl border border-white/[0.06] bg-zinc-900/50 p-8 backdrop-blur-sm
                        shadow-[0_20px_50px_rgba(0,0,0,0.4)] hover:border-purple-500/15 transition-all duration-500">
                <div class="grid grid-cols-2 gap-6 divide-x divide-white/[0.06]">
                    <div class="text-center space-y-1">
                        <div class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest">
                            {{ $isEn ? 'Experience' : 'Experiência' }}
                        </div>
                        <div class="text-4xl font-black text-purple-400 leading-none"
                             style="font-family: 'Orbitron', sans-serif;">2+</div>
                        <div class="text-sm font-bold text-white">{{ $isEn ? 'Years' : 'Anos' }}</div>
                    </div>
                    <div class="text-center pl-6 space-y-1">
                        <div class="text-[10px] font-bold text-zinc-500 uppercase tracking-widest">
                            {{ $isEn ? 'Projects' : 'Projetos' }}
                        </div>
                        <div class="text-4xl font-black text-white leading-none"
                             style="font-family: 'Orbitron', sans-serif;">+15</div>
                        <div class="text-sm font-bold text-zinc-300">{{ $isEn ? 'Delivered' : 'Entregues' }}</div>
                    </div>
                </div>

                <div class="mt-6 pt-5 border-t border-white/[0.04]">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                        <span class="text-xs font-medium text-zinc-300">
                            {{ $isEn ? 'Available for new projects' : 'Disponível para novos projetos' }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- Quick tech badges --}}
            <div class="grid grid-cols-3 gap-3 sobre-reveal sobre-reveal--d2">
                @php
                $techs = [
                    ['label' => 'Laravel',     'color' => 'rgba(239,68,68,0.15)',    'border' => 'rgba(239,68,68,0.2)',    'text' => '#fca5a5'],
                    ['label' => 'PHP',         'color' => 'rgba(139,92,246,0.15)',   'border' => 'rgba(139,92,246,0.25)',  'text' => '#c4b5fd'],
                    ['label' => 'Tailwind',    'color' => 'rgba(56,189,248,0.12)',   'border' => 'rgba(56,189,248,0.2)',   'text' => '#7dd3fc'],
                    ['label' => 'MySQL',       'color' => 'rgba(251,191,36,0.12)',   'border' => 'rgba(251,191,36,0.2)',   'text' => '#fde68a'],
                    ['label' => 'Figma',       'color' => 'rgba(168,85,247,0.12)',   'border' => 'rgba(168,85,247,0.2)',   'text' => '#e9d5ff'],
                    ['label' => 'Livewire',    'color' => 'rgba(99,102,241,0.12)',   'border' => 'rgba(99,102,241,0.2)',   'text' => '#a5b4fc'],
                ];
                @endphp
                @foreach($techs as $tech)
                <div class="rounded-xl px-3 py-2 text-center text-xs font-bold uppercase tracking-wider transition-transform hover:-translate-y-0.5"
                     style="background: {{ $tech['color'] }}; border: 1px solid {{ $tech['border'] }}; color: {{ $tech['text'] }};">
                    {{ $tech['label'] }}
                </div>
                @endforeach
            </div>

        </div>

    </div>
</section>

<script>
    (function () {
        const sobreObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    sobreObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -30px 0px' });

        document.querySelectorAll('.sobre-reveal').forEach(el => sobreObserver.observe(el));
    })();
</script>
