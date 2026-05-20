<section id="processos" class="w-full max-w-7xl mx-auto px-6 py-24 relative z-10 overflow-hidden">

    <div class="absolute top-1/4 -left-20 w-96 h-96 bg-purple-600/10 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-1/4 -right-20 w-96 h-96 bg-purple-600/10 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="text-center mb-20 relative z-10 select-none scroll-reveal">
        <span class="text-purple-500 font-bold text-[11px] uppercase tracking-[0.3em] block mb-4" style="font-family: 'Orbitron', sans-serif;">
            {{ __('site.processes_tag') }}
        </span>
        <h2 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tight leading-[1.1]" style="font-family: 'Orbitron', sans-serif;">
            {!! nl2br(e(__('site.processes_title'))) !!}
        </h2>
        <p class="text-zinc-400 text-sm md:text-base max-w-2xl mx-auto leading-relaxed mt-4">
            {{ __('site.processes_desc') }}
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-center relative">

        <div class="space-y-16 lg:space-y-28 z-20">

            <div class="relative group pt-6 scroll-reveal-delay-1">
                <span class="absolute -top-8 left-0 text-7xl font-black text-purple-500/[0.08] select-none uppercase tracking-tighter" style="font-family: 'Orbitron', sans-serif;">01</span>
                <div class="space-y-3 relative z-10">
                    <h3 class="text-xl font-bold text-white uppercase tracking-tight" style="font-family: 'Orbitron', sans-serif;">{{ __('site.processes_step1_title') }}</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed">
                        {{ __('site.processes_step1_desc') }}
                    </p>
                    <div class="flex flex-wrap gap-2 pt-2">
                        <span class="text-[9px] font-bold px-2 py-0.5 rounded bg-purple-500/10 border border-purple-500/20 text-purple-300 uppercase">{{ __('site.processes_tag1_estrategia') }}</span>
                        <span class="text-[9px] font-bold px-2 py-0.5 rounded bg-purple-500/10 border border-purple-500/20 text-purple-300 uppercase">{{ __('site.processes_tag1_posicionamento') }}</span>
                        <span class="text-[9px] font-bold px-2 py-0.5 rounded bg-purple-500/10 border border-purple-500/20 text-purple-300 uppercase">{{ __('site.processes_tag1_branding') }}</span>
                    </div>
                </div>
            </div>

            <div class="relative group pt-6 scroll-reveal-delay-2">
                <span class="absolute -top-8 left-0 text-7xl font-black text-purple-500/[0.08] select-none uppercase tracking-tighter" style="font-family: 'Orbitron', sans-serif;">03</span>
                <div class="space-y-3 relative z-10">
                    <h3 class="text-xl font-bold text-white uppercase tracking-tight" style="font-family: 'Orbitron', sans-serif;">{{ __('site.processes_step3_title') }}</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed">
                        {{ __('site.processes_step3_desc') }}
                    </p>
                    <div class="flex flex-wrap gap-2 pt-2">
                        <span class="text-[9px] font-bold px-2 py-0.5 rounded bg-purple-500/10 border border-purple-500/20 text-purple-300 uppercase">{{ __('site.processes_tag3_performance') }}</span>
                        <span class="text-[9px] font-bold px-2 py-0.5 rounded bg-purple-500/10 border border-purple-500/20 text-purple-300 uppercase">{{ __('site.processes_tag3_painel') }}</span>
                        <span class="text-[9px] font-bold px-2 py-0.5 rounded bg-purple-500/10 border border-purple-500/20 text-purple-300 uppercase">{{ __('site.processes_tag3_conversao') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative order-first lg:order-none flex justify-center items-center h-full min-h-[460px]">
            <div class="absolute inset-0 bg-radial-gradient from-purple-500/5 to-transparent rounded-full blur-3xl"></div>
            <div class="w-full max-w-[690px] relative z-10 animate-orbital-float">
                <img src="{{ asset('imagens/perfil.png') }}"
                     alt="Matheus de Paulo - Estratégia Digital"
                     class="w-full h-auto object-contain filter drop-shadow-[0_0_35px_rgba(168,85,247,0.25)] process-center-img">
            </div>
        </div>

        <div class="space-y-16 lg:space-y-28 z-20">

            <div class="relative group pt-6 scroll-reveal-delay-1">
                <span class="absolute -top-8 right-0 text-7xl font-black text-purple-500/[0.08] select-none uppercase tracking-tighter" style="font-family: 'Orbitron', sans-serif;">02</span>
                <div class="space-y-3 lg:text-right relative z-10">
                    <h3 class="text-xl font-bold text-white uppercase tracking-tight" style="font-family: 'Orbitron', sans-serif;">{{ __('site.processes_step2_title') }}</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed">
                        {{ __('site.processes_step2_desc') }}
                    </p>
                    <div class="flex flex-wrap lg:justify-end gap-2 pt-2">
                        <span class="text-[9px] font-bold px-2 py-0.5 rounded bg-purple-500/10 border border-purple-500/20 text-purple-300 uppercase">{{ __('site.processes_tag2_design') }}</span>
                        <span class="text-[9px] font-bold px-2 py-0.5 rounded bg-purple-500/10 border border-purple-500/20 text-purple-300 uppercase">{{ __('site.processes_tag2_validacao') }}</span>
                        <span class="text-[9px] font-bold px-2 py-0.5 rounded bg-purple-500/10 border border-purple-500/20 text-purple-300 uppercase">{{ __('site.processes_tag2_nav') }}</span>
                    </div>
                </div>
            </div>

            <div class="relative group pt-14 scroll-reveal-delay-2">
                <span class="absolute top-2 right-0 text-7xl font-black text-purple-500/[0.08] select-none uppercase tracking-tighter" style="font-family: 'Orbitron', sans-serif;">04</span>
                <div class="space-y-3 lg:text-right relative z-10">
                    <h3 class="text-xl font-bold text-white uppercase tracking-tight" style="font-family: 'Orbitron', sans-serif;">{{ __('site.processes_step4_title') }}</h3>
                    <p class="text-zinc-400 text-sm leading-relaxed">
                        {{ __('site.processes_step4_desc') }}
                    </p>
                    <div class="flex flex-wrap lg:justify-end gap-2 pt-2">
                        <span class="text-[9px] font-bold px-2 py-0.5 rounded bg-purple-500/10 border border-purple-500/20 text-purple-300 uppercase">{{ __('site.processes_tag4_publicacao') }}</span>
                        <span class="text-[9px] font-bold px-2 py-0.5 rounded bg-purple-500/10 border border-purple-500/20 text-purple-300 uppercase">{{ __('site.processes_tag4_otimizacao') }}</span>
                        <span class="text-[9px] font-bold px-2 py-0.5 rounded bg-purple-500/10 border border-purple-500/20 text-purple-300 uppercase">{{ __('site.processes_tag4_velocidade') }}</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<style>
    .scroll-reveal, .scroll-reveal-delay-1, .scroll-reveal-delay-2 {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.8s ease-out, transform 0.8s cubic-bezier(0.25, 1, 0.5, 1);
    }
    .reveal-visible { opacity: 1; transform: translateY(0); }
    @keyframes orbitalFloat {
        0% { transform: translateY(0) translateX(0); }
        25% { transform: translateY(-12px) translateX(0); }
        50% { transform: translateY(0) translateX(8px); }
        75% { transform: translateY(12px) translateX(0); }
        100% { transform: translateY(0) translateX(-8px); }
    }
    .animate-orbital-float { animation: orbitalFloat 8s ease-in-out infinite; }
    .process-center-img {
        -webkit-mask-image: linear-gradient(to bottom, black 60%, transparent 95%);
        mask-image: linear-gradient(to bottom, black 60%, transparent 95%);
        transform: scale(1.1);
    }
    @media (min-width: 1024px) {
        .process-center-img { transform: scale(1.35); }
    }
    @media (prefers-reduced-motion: reduce) {
        .animate-orbital-float { animation: none; }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const revealElements = document.querySelectorAll('.scroll-reveal, .scroll-reveal-delay-1, .scroll-reveal-delay-2');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('reveal-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15, rootMargin: "0px 0px -60px 0px" });
        revealElements.forEach(el => observer.observe(el));
    });
</script>
