@php
$locale = app()->getLocale();
$isEn   = $locale === 'en';
$urlSol = $isEn ? '/en/solucoes' : '/solucoes';
@endphp

<style>
    .cta-final-section {
        position: relative;
        overflow: hidden;
    }

    /* Full-section background texture */
    .cta-bg-grid {
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(to right, rgba(168,85,247,0.022) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(168,85,247,0.022) 1px, transparent 1px);
        background-size: 80px 80px;
        pointer-events: none;
    }

    /* Central radial glow — subtle, full-section */
    .cta-bg-glow {
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse 65% 55% at 50% 50%, rgba(168,85,247,0.07) 0%, transparent 70%);
        pointer-events: none;
    }

    /* Horizontal decorative lines */
    .cta-hline {
        position: absolute;
        left: 0;
        right: 0;
        height: 1px;
        pointer-events: none;
    }
    .cta-hline--top {
        top: 12%;
        background: linear-gradient(90deg,
            transparent 0%,
            rgba(168,85,247,0.15) 15%,
            rgba(168,85,247,0.35) 50%,
            rgba(168,85,247,0.15) 85%,
            transparent 100%);
    }
    .cta-hline--bottom {
        bottom: 12%;
        background: linear-gradient(90deg,
            transparent 0%,
            rgba(168,85,247,0.1) 15%,
            rgba(168,85,247,0.22) 50%,
            rgba(168,85,247,0.1) 85%,
            transparent 100%);
    }

    /* HUD corner brackets */
    .cta-corner {
        position: absolute;
        width: 36px;
        height: 36px;
        opacity: 0.3;
        pointer-events: none;
    }
    .cta-corner--tl { top: 10%; left: 6%;  border-top: 1.5px solid #a855f7; border-left: 1.5px solid #a855f7; }
    .cta-corner--tr { top: 10%; right: 6%; border-top: 1.5px solid #a855f7; border-right: 1.5px solid #a855f7; }
    .cta-corner--bl { bottom: 10%; left: 6%;  border-bottom: 1.5px solid #a855f7; border-left: 1.5px solid #a855f7; }
    .cta-corner--br { bottom: 10%; right: 6%; border-bottom: 1.5px solid #a855f7; border-right: 1.5px solid #a855f7; }

    @media (max-width: 767px) {
        .cta-corner { opacity: 0.18; width: 24px; height: 24px; }
        .cta-corner--tl, .cta-corner--tr { top: 5%; }
        .cta-corner--bl, .cta-corner--br { bottom: 5%; }
        .cta-corner--tl, .cta-corner--bl { left: 4%; }
        .cta-corner--tr, .cta-corner--br { right: 4%; }
    }

    /* Fade masks — blends into site bg #030303 */
    .cta-fade-top {
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 120px;
        background: linear-gradient(to bottom, #030303 0%, transparent 100%);
        pointer-events: none;
        z-index: 5;
    }
    .cta-fade-bottom {
        position: absolute;
        bottom: 0; left: 0; right: 0;
        height: 140px;
        background: linear-gradient(to top, #030303 0%, transparent 100%);
        pointer-events: none;
        z-index: 5;
    }

    /* Heading */
    .cta-final-heading {
        font-family: 'Orbitron', sans-serif;
        font-weight: 900;
        line-height: 1.05;
        letter-spacing: -0.01em;
        text-transform: uppercase;
        background: linear-gradient(135deg, #ffffff 10%, #c084fc 55%, #818cf8 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Pill tag */
    .cta-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 7px 18px;
        border-radius: 999px;
        border: 1px solid rgba(168,85,247,0.25);
        background: rgba(168,85,247,0.06);
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.16em;
        text-transform: uppercase;
        color: #c084fc;
        backdrop-filter: blur(4px);
    }
    .cta-pill-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #a855f7;
        box-shadow: 0 0 8px rgba(168,85,247,0.9);
        animation: ctaPulse 2.2s ease-in-out infinite;
    }
    @keyframes ctaPulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50%       { opacity: 0.4; transform: scale(0.8); }
    }

    /* Trust row */
    .cta-trust-item {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 0.8125rem;
        font-weight: 600;
        color: rgba(161,161,170,0.85);
        letter-spacing: 0.02em;
    }
    .cta-trust-diamond {
        font-size: 0.6rem;
        color: #a855f7;
        flex-shrink: 0;
        filter: drop-shadow(0 0 4px rgba(168,85,247,0.7));
    }
    .cta-trust-sep {
        width: 1px;
        height: 18px;
        background: rgba(168,85,247,0.2);
    }

    /* CTA button */
    .cta-final-btn {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 17px 44px;
        border-radius: 999px;
        font-weight: 700;
        font-size: 0.9rem;
        letter-spacing: 0.07em;
        background: linear-gradient(135deg, #9333ea, #7c3aed);
        color: #fff;
        box-shadow: 0 4px 32px rgba(168,85,247,0.4), 0 0 0 1px rgba(168,85,247,0.18);
        transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    .cta-final-btn::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at center, rgba(255,255,255,0.18), transparent 60%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .cta-final-btn:hover {
        transform: scale(1.06) translateY(-2px);
        box-shadow: 0 8px 50px rgba(168,85,247,0.6), 0 0 0 1px rgba(168,85,247,0.35);
    }
    .cta-final-btn:hover::before { opacity: 1; }
    .cta-final-btn .cta-arrow {
        display: inline-block;
        font-size: 1.1em;
        transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1);
    }
    .cta-final-btn:hover .cta-arrow { transform: translateX(6px); }

    /* Scroll reveal */
    .cf-reveal {
        opacity: 0;
        transform: translateY(24px);
        transition: opacity 0.75s ease, transform 0.75s cubic-bezier(0.22,1,0.36,1);
    }
    .cf-reveal.is-visible { opacity: 1; transform: translateY(0); }
    .cf-reveal--d1 { transition-delay: 0.08s; }
    .cf-reveal--d2 { transition-delay: 0.2s; }
    .cf-reveal--d3 { transition-delay: 0.33s; }
    .cf-reveal--d4 { transition-delay: 0.46s; }
    .cf-reveal--d5 { transition-delay: 0.6s; }

    @media (prefers-reduced-motion: reduce) {
        .cf-reveal { opacity: 1; transform: none; transition: none; }
        .cta-pill-dot { animation: none; }
        .cta-final-btn { transition: none; }
    }
</style>

<section id="cta-final" class="cta-final-section w-full py-32 lg:py-48">

    {{-- Atmospheric layers --}}
    <div class="cta-bg-grid"></div>
    <div class="cta-bg-glow"></div>

    {{-- Decorative horizontal lines --}}
    <div class="cta-hline cta-hline--top"></div>
    <div class="cta-hline cta-hline--bottom"></div>

    {{-- HUD corner brackets --}}
    <div class="cta-corner cta-corner--tl"></div>
    <div class="cta-corner cta-corner--tr"></div>
    <div class="cta-corner cta-corner--bl"></div>
    <div class="cta-corner cta-corner--br"></div>

    {{-- Blend fades --}}
    <div class="cta-fade-top"></div>
    <div class="cta-fade-bottom"></div>

    {{-- Content --}}
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center flex flex-col items-center gap-8">

        <div class="cf-reveal cf-reveal--d1">
            <span class="cta-pill">
                <span class="cta-pill-dot"></span>
                {{ $isEn ? 'Enterprise Solutions' : 'Soluções Empresariais' }}
            </span>
        </div>

        <div class="cf-reveal cf-reveal--d2">
            <h2 class="cta-final-heading text-5xl sm:text-6xl lg:text-7xl">
                {{ $isEn ? 'Ready for the' : 'Pronto para o' }}<br>
                {{ $isEn ? 'next level?' : 'próximo nível?' }}
            </h2>
        </div>

        <div class="cf-reveal cf-reveal--d3 max-w-lg">
            <p class="text-zinc-400 text-base sm:text-lg leading-relaxed font-medium">
                {{ $isEn
                    ? 'Enterprise-grade systems built to transform local businesses into digital benchmarks.'
                    : 'Sistemas empresariais desenvolvidos para transformar negócios locais em referências digitais.' }}
            </p>
        </div>

        <div class="cf-reveal cf-reveal--d4 flex flex-wrap items-center justify-center gap-x-6 gap-y-3">
            <span class="cta-trust-item">
                <span class="cta-trust-diamond">◆</span>
                {{ $isEn ? 'Custom development' : 'Desenvolvimento sob medida' }}
            </span>
            <span class="cta-trust-sep hidden sm:block"></span>
            <span class="cta-trust-item">
                <span class="cta-trust-diamond">◆</span>
                {{ $isEn ? 'Measurable results' : 'Resultados mensuráveis' }}
            </span>
            <span class="cta-trust-sep hidden sm:block"></span>
            <span class="cta-trust-item">
                <span class="cta-trust-diamond">◆</span>
                {{ $isEn ? 'Premium support' : 'Suporte premium' }}
            </span>
        </div>

        <div class="cf-reveal cf-reveal--d5">
            <a href="{{ $urlSol }}" class="cta-final-btn">
                {{ $isEn ? 'Explore the solutions' : 'Explorar as soluções' }}
                <span class="cta-arrow">→</span>
            </a>
        </div>

    </div>

</section>

<script>
(function () {
    var els = document.querySelectorAll('.cf-reveal');
    if (!els.length) return;
    var obs = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
            if (e.isIntersecting) {
                e.target.classList.add('is-visible');
                obs.unobserve(e.target);
            }
        });
    }, { threshold: 0.12 });
    els.forEach(function (el) { obs.observe(el); });
})();
</script>
