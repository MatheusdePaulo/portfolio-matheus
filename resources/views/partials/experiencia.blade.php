<style>
    .exp-card {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.7s ease, transform 0.7s ease, border-color 0.3s ease, background 0.3s ease, box-shadow 0.3s ease;
    }
    .exp-card.visible { opacity: 1; transform: translateY(0); }
    .exp-card:nth-child(1) { transition-delay: 0s; }
    .exp-card:nth-child(2) { transition-delay: 0.15s; }
    .exp-card:nth-child(3) { transition-delay: 0.3s; }

    .exp-card:hover {
        border-color: rgba(255,255,255,0.15) !important;
        background: rgba(39,39,42,0.85) !important;
        box-shadow: 0 0 40px rgba(168,85,247,0.06);
    }

    .exp-card::before {
        content: '';
        position: absolute;
        left: 0; top: 20%; height: 60%; width: 2px;
        border-radius: 2px;
        opacity: 0;
        transition: opacity 0.3s ease, height 0.3s ease, top 0.3s ease;
    }
    .exp-card:hover::before { opacity: 1; top: 10%; height: 80%; }
    .exp-card.accent-emerald::before { background: #10b981; box-shadow: 0 0 12px rgba(16,185,129,0.6); }
    .exp-card.accent-purple::before  { background: #a855f7; box-shadow: 0 0 12px rgba(168,85,247,0.6); }
    .exp-card.accent-indigo::before  { background: #6366f1; box-shadow: 0 0 12px rgba(99,102,241,0.6); }

    .exp-badge { transition: transform 0.2s ease, filter 0.2s ease; }
    .exp-badge:hover { transform: translateY(-1px); filter: brightness(1.2); }

    .exp-title { transition: color 0.2s ease; }
    .exp-card:hover .exp-title { color: #e4e4e7; }

    .exp-current {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 10px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: #a855f7;
        background: rgba(168,85,247,0.1);
        border: 1px solid rgba(168,85,247,0.25);
        padding: 3px 10px;
        border-radius: 999px;
        margin-left: 8px;
    }
    .exp-current::before {
        content: '';
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #a855f7;
        box-shadow: 0 0 8px rgba(168,85,247,0.8);
        animation: pulseDot 1.8s ease-in-out infinite;
    }
    @keyframes pulseDot {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.4; }
    }
</style>

<section class="w-full max-w-7xl mx-auto px-6 py-20 pb-32 relative z-10">

    <div class="flex flex-col mb-16 select-none text-center items-center justify-center">
        <h2 class="font-orbitron font-black uppercase tracking-tight text-purple-500 text-3xl md:text-5xl drop-shadow-[0_0_25px_rgba(168,85,247,0.3)]" style="font-family: 'Orbitron', sans-serif;">
            {{ __('site.exp_title') }}
        </h2>

    </div>

    <div class="flex flex-col gap-4">

        <!-- Card 1 - Freelancer (atual) -->
        <div class="exp-card accent-indigo group relative rounded-2xl bg-zinc-900/60 border border-white/[0.08] p-8">
            <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-1 mb-1">
                <h3 class="exp-title text-lg font-bold text-white uppercase tracking-wide flex items-center flex-wrap" style="font-family: 'Orbitron', sans-serif;">
                    {{ __('site.exp0_role') }}
                    <span class="exp-current">{{ __('site.exp_current') }}</span>
                </h3>
                <span class="text-xs text-zinc-400 font-medium uppercase tracking-widest whitespace-nowrap mt-1">
                    {{ __('site.exp0_period') }}
                </span>
            </div>

            <span class="text-sm font-semibold text-indigo-400 mb-4 block" style="font-family: 'Orbitron', sans-serif;">
                {{ __('site.exp0_company') }}
            </span>

            <p class="text-sm text-zinc-400 leading-relaxed mb-6 max-w-3xl">
                {!! __('site.exp0_desc') !!}
            </p>

            <div class="flex flex-wrap gap-2 mb-4">
                <span class="exp-badge px-3 py-1 rounded-full text-xs font-semibold bg-indigo-500/15 text-indigo-400 border border-indigo-500/25">{{ __('site.exp0_badge1') }}</span>
                <span class="exp-badge px-3 py-1 rounded-full text-xs font-semibold bg-indigo-500/15 text-indigo-400 border border-indigo-500/25">{{ __('site.exp0_badge2') }}</span>
                <span class="exp-badge px-3 py-1 rounded-full text-xs font-semibold bg-indigo-500/15 text-indigo-400 border border-indigo-500/25">{{ __('site.exp0_badge3') }}</span>
            </div>

            <div class="flex flex-wrap gap-3">
                <span class="text-xs text-zinc-500 font-medium">PHP</span>
                <span class="text-xs text-zinc-500 font-medium">Laravel</span>
                <span class="text-xs text-zinc-500 font-medium">Livewire</span>
                <span class="text-xs text-zinc-500 font-medium">Tailwind CSS</span>
                <span class="text-xs text-zinc-500 font-medium">Figma</span>
                <span class="text-xs text-zinc-500 font-medium">MySQL</span>
            </div>
        </div>

        <!-- Card 2 - Otimizap -->
        <div class="exp-card accent-emerald group relative rounded-2xl bg-zinc-900/60 border border-white/[0.08] p-8">
            <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-1 mb-1">
                <h3 class="exp-title text-lg font-bold text-white uppercase tracking-wide" style="font-family: 'Orbitron', sans-serif;">
                    {{ __('site.exp1_role') }}
                </h3>
                <span class="text-xs text-zinc-400 font-medium uppercase tracking-widest whitespace-nowrap mt-1">
                    {{ __('site.exp1_period') }}
                </span>
            </div>

            <span class="text-sm font-semibold text-emerald-400 mb-4 block" style="font-family: 'Orbitron', sans-serif;">
                {{ __('site.exp1_company') }}
            </span>

            <p class="text-sm text-zinc-400 leading-relaxed mb-6 max-w-3xl">
                {!! __('site.exp1_desc') !!}
            </p>

            <div class="flex flex-wrap gap-2 mb-4">
                <span class="exp-badge px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/15 text-emerald-400 border border-emerald-500/25">{{ __('site.exp1_badge1') }}</span>
                <span class="exp-badge px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/15 text-emerald-400 border border-emerald-500/25">{{ __('site.exp1_badge2') }}</span>
                <span class="exp-badge px-3 py-1 rounded-full text-xs font-semibold bg-emerald-500/15 text-emerald-400 border border-emerald-500/25">{{ __('site.exp1_badge3') }}</span>
            </div>

            <div class="flex flex-wrap gap-3">
                <span class="text-xs text-zinc-500 font-medium">PHP</span>
                <span class="text-xs text-zinc-500 font-medium">Laravel</span>
                <span class="text-xs text-zinc-500 font-medium">APIs REST</span>
                <span class="text-xs text-zinc-500 font-medium">Eloquent ORM</span>
            </div>
        </div>

        <!-- Card 3 - UNIFOR -->
        <div class="exp-card accent-purple group relative rounded-2xl bg-zinc-900/60 border border-white/[0.08] p-8">
            <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-1 mb-1">
                <h3 class="exp-title text-lg font-bold text-white uppercase tracking-wide" style="font-family: 'Orbitron', sans-serif;">
                    {{ __('site.exp2_role') }}
                </h3>
                <span class="text-xs text-zinc-400 font-medium uppercase tracking-widest whitespace-nowrap mt-1">
                    {{ __('site.exp2_period') }}
                </span>
            </div>

            <span class="text-sm font-semibold text-purple-400 mb-4 block" style="font-family: 'Orbitron', sans-serif;">
                {{ __('site.exp2_company') }}
            </span>

            <p class="text-sm text-zinc-400 leading-relaxed mb-6 max-w-3xl">
                {!! __('site.exp2_desc') !!}
            </p>

            <div class="flex flex-wrap gap-2 mb-4">
                <span class="exp-badge px-3 py-1 rounded-full text-xs font-semibold bg-purple-500/15 text-purple-400 border border-purple-500/25">{{ __('site.exp2_badge1') }}</span>
                <span class="exp-badge px-3 py-1 rounded-full text-xs font-semibold bg-purple-500/15 text-purple-400 border border-purple-500/25">{{ __('site.exp2_badge2') }}</span>
                <span class="exp-badge px-3 py-1 rounded-full text-xs font-semibold bg-purple-500/15 text-purple-400 border border-purple-500/25">{{ __('site.exp2_badge3') }}</span>
            </div>

            <div class="flex flex-wrap gap-3">
                <span class="text-xs text-zinc-500 font-medium">Java</span>
                <span class="text-xs text-zinc-500 font-medium">Spring Boot</span>
                <span class="text-xs text-zinc-500 font-medium">APIs REST</span>
                <span class="text-xs text-zinc-500 font-medium">SQL</span>
            </div>
        </div>

    </div>
</section>

<script>
    const expCards = document.querySelectorAll('.exp-card');
    const expObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) entry.target.classList.add('visible');
        });
    }, { threshold: 0.15 });
    expCards.forEach(card => expObserver.observe(card));
</script>
