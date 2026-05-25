@php
$locale  = app()->getLocale();
$isEn    = $locale === 'en';
$urlSol  = $isEn ? '/en/solucoes' : '/solucoes';
@endphp

<style>
    /* ============ SCROLL REVEAL ============ */
    .sol-reveal {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.8s ease-out, transform 0.8s cubic-bezier(0.25, 1, 0.5, 1);
    }
    .sol-reveal.visible { opacity: 1; transform: translateY(0); }
    .sol-card:nth-child(1) { transition-delay: 0s; }
    .sol-card:nth-child(2) { transition-delay: 0.1s; }
    .sol-card:nth-child(3) { transition-delay: 0.2s; }
    .sol-card:nth-child(4) { transition-delay: 0.3s; }

    /* ============ GRID ============ */
    .sol-grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        gap: 24px;
    }
    @media (min-width: 768px)  { .sol-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (min-width: 1280px) { .sol-grid { grid-template-columns: repeat(4, 1fr); } }

    /* ============ CARD BASE ============ */
    .sol-card {
        position: relative;
        background: linear-gradient(180deg, rgba(20,17,30,0.97) 0%, rgba(10,8,18,0.99) 100%);
        border: 1px solid rgba(255,255,255,0.06);
        border-radius: 24px;
        padding: 36px 28px 32px;
        overflow: hidden;
        transition: transform 0.5s cubic-bezier(0.25,1,0.5,1),
                    border-color 0.5s cubic-bezier(0.25,1,0.5,1),
                    box-shadow 0.5s cubic-bezier(0.25,1,0.5,1);
        display: flex;
        flex-direction: column;
        height: 100%;
    }
    .sol-card::before {
        content: '';
        position: absolute; inset: 0; border-radius: 24px; padding: 1px;
        background: linear-gradient(135deg, rgba(168,85,247,0) 0%, rgba(168,85,247,0.4) 50%, rgba(99,102,241,0) 100%);
        -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        -webkit-mask-composite: xor; mask-composite: exclude;
        opacity: 0; transition: opacity 0.5s ease; pointer-events: none;
    }
    .sol-card:hover {
        transform: translate3d(0,-8px,0);
        border-color: rgba(168,85,247,0.25);
        box-shadow: 0 30px 60px -20px rgba(168,85,247,0.25), 0 0 0 1px rgba(168,85,247,0.1);
    }
    .sol-card:hover::before { opacity: 1; }

    /* Glow line top */
    .sol-card__glow {
        position: absolute; top: -1px; left: 30%; right: 30%; height: 1px;
        background: linear-gradient(90deg, transparent, rgba(168,85,247,0.6), transparent);
        opacity: 0; transition: opacity 0.5s ease;
    }
    .sol-card:hover .sol-card__glow { opacity: 1; }

    /* ============ FEATURED ============ */
    .sol-card--featured {
        background: linear-gradient(180deg, rgba(45,27,78,0.5) 0%, rgba(20,17,30,0.99) 100%);
        border-color: rgba(168,85,247,0.25);
        box-shadow: 0 20px 50px -10px rgba(168,85,247,0.15);
    }
    .sol-card--featured::before { opacity: 0.6; }
    .sol-card--featured .sol-card__glow { opacity: 1; }

    /* ============ ENTERPRISE ============ */
    .sol-card--enterprise {
        border-color: rgba(99,102,241,0.3);
        background: linear-gradient(180deg, rgba(13,12,28,0.98) 0%, rgba(5,4,10,1) 100%);
    }
    .sol-card--enterprise .sol-card__icon {
        background: linear-gradient(135deg, rgba(99,102,241,0.2), rgba(168,85,247,0.1));
        border-color: rgba(99,102,241,0.4);
    }
    .sol-card--enterprise .sol-card__icon svg { stroke: #818cf8; }

    /* ============ BADGE ============ */
    .sol-badge {
        position: absolute; top: 16px; right: 16px;
        display: inline-flex; align-items: center; gap: 4px;
        padding: 4px 10px; font-size: 9px; font-weight: 800;
        letter-spacing: 0.15em; text-transform: uppercase; color: #fff;
        background: linear-gradient(to right, #7c3aed, #4f46e5);
        border-radius: 999px; box-shadow: 0 0 12px rgba(168,85,247,0.4);
    }
    .sol-badge--enterprise {
        background: linear-gradient(to right, #4f46e5, #10b981);
        box-shadow: 0 0 12px rgba(99,102,241,0.4);
    }

    /* ============ ICON ============ */
    .sol-card__icon {
        width: 52px; height: 52px; border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        margin-bottom: 20px;
        background: linear-gradient(135deg, rgba(168,85,247,0.15), rgba(99,102,241,0.1));
        border: 1px solid rgba(168,85,247,0.2);
        transition: transform 0.5s cubic-bezier(0.34,1.56,0.64,1); z-index: 5;
    }
    .sol-card:hover .sol-card__icon { transform: scale(1.1) rotate(-5deg); }
    .sol-card__icon svg { width: 26px; height: 26px; stroke: #c084fc; }

    /* ============ TEXTS ============ */
    .sol-card__level {
        font-family: 'Orbitron', sans-serif; font-size: 10px; font-weight: 700;
        letter-spacing: 0.2em; text-transform: uppercase; color: #a855f7; margin-bottom: 6px; z-index: 5;
    }
    .sol-card--enterprise .sol-card__level { color: #818cf8; }
    .sol-card__title {
        font-family: 'Orbitron', sans-serif; font-weight: 900; font-size: 1.25rem;
        color: #fff; text-transform: uppercase; letter-spacing: 0.02em;
        line-height: 1.1; margin-bottom: 8px; z-index: 5;
    }
    .sol-card__desc { font-size: 13px; color: #a1a1aa; line-height: 1.65; flex-grow: 1; margin-bottom: 20px; z-index: 5; }

    /* ============ FEATURES LIST ============ */
    .sol-features { list-style: none; padding: 0; margin: 0 0 20px; z-index: 5; }
    .sol-features li {
        display: flex; align-items: flex-start; gap: 10px;
        font-size: 12px; color: #d4d4d8; line-height: 1.5;
        padding: 6px 0; border-bottom: 1px solid rgba(255,255,255,0.03);
    }
    .sol-features li:last-child { border-bottom: none; }
    .sol-features svg { width: 13px; height: 13px; flex-shrink: 0; margin-top: 2px; stroke: #10b981; }

    /* ============ CTA BUTTON ============ */
    .sol-cta {
        width: 100%; position: relative;
        display: inline-flex; align-items: center; justify-content: center; gap: 8px;
        padding: 12px 20px; border-radius: 12px; font-size: 11px; font-weight: 800;
        letter-spacing: 0.12em; text-transform: uppercase;
        font-family: 'Orbitron', sans-serif;
        background: rgba(168,85,247,0.08); color: #c084fc;
        border: 1px solid rgba(168,85,247,0.2);
        text-decoration: none;
        transition: background 0.3s ease, color 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
        z-index: 5; margin-top: auto;
    }
    .sol-cta:hover {
        background: linear-gradient(to right, #7c3aed, #4f46e5); color: #fff;
        border-color: rgba(168,85,247,0.5); box-shadow: 0 8px 25px rgba(168,85,247,0.3);
    }
    .sol-cta__arrow { transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1); }
    .sol-cta:hover .sol-cta__arrow { transform: translateX(4px); }
    .sol-cta--featured {
        background: linear-gradient(to right, #7c3aed, #4f46e5); color: #fff;
        border-color: rgba(168,85,247,0.5); box-shadow: 0 8px 25px rgba(168,85,247,0.2);
    }
    .sol-cta--featured:hover { box-shadow: 0 12px 35px rgba(168,85,247,0.5); transform: translate3d(0,-1px,0); }
    .sol-cta--enterprise { background: transparent; color: #818cf8; border-color: rgba(99,102,241,0.4); }
    .sol-cta--enterprise:hover {
        background: linear-gradient(to right, #4f46e5, #10b981); color: #fff;
        border-color: rgba(168,85,247,0.2); box-shadow: 0 8px 25px rgba(99,102,241,0.3);
    }
</style>

<section id="solucoes" class="w-full max-w-7xl mx-auto px-6 py-24 relative z-10">

    {{-- Ambient glows --}}
    <div class="absolute top-0 left-1/4 w-96 h-96 bg-purple-600/6 rounded-full blur-[120px] pointer-events-none -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-indigo-600/6 rounded-full blur-[120px] pointer-events-none translate-y-1/2"></div>

    {{-- Header --}}
    <div class="text-center mb-14 relative z-10 select-none sol-reveal">
        <span class="text-purple-500 font-bold text-[11px] uppercase tracking-[0.3em] block mb-4"
              style="font-family: 'Orbitron', sans-serif;">
            {{ $isEn ? 'Business Solutions' : 'Soluções Empresariais' }}
        </span>
        <h2 class="text-4xl md:text-5xl lg:text-6xl font-black text-white uppercase tracking-tight leading-[1.05]"
            style="font-family: 'Orbitron', sans-serif;">
            {{ $isEn ? 'Systems built' : 'Sistemas criados' }}<br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-indigo-400">
                {{ $isEn ? 'for real results' : 'para resultados reais' }}
            </span>
        </h2>
        <p class="text-zinc-400 text-sm md:text-base max-w-2xl mx-auto leading-relaxed mt-5">
            {{ $isEn
                ? 'Four levels of solution, each designed for a different stage of business growth. Find the right fit.'
                : 'Quatro níveis de solução, cada um desenhado para um momento diferente do negócio. Encontre o ideal para você.' }}
        </p>
    </div>

    {{-- Grid de cards --}}
    <div class="sol-grid relative z-10">

        {{-- PLANO 1 — Presença Digital --}}
        <div class="sol-card sol-reveal">
            <div class="sol-card__glow"></div>
            <div class="absolute top-0 right-0 w-32 h-32 bg-purple-500/4 rounded-full blur-2xl pointer-events-none"></div>
            <div class="absolute top-6 right-6 opacity-[0.1] pointer-events-none select-none text-xs text-purple-400"
                 style="font-family:'Space Mono',monospace;">
                &lt;div id="brand"&gt;<br>&nbsp;&nbsp;scale: 100%;<br>&lt;/div&gt;
            </div>
            <div class="sol-card__icon">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/>
                    <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                </svg>
            </div>
            <div class="sol-card__level">{{ $isEn ? 'Solution 01' : 'Solução 01' }}</div>
            <h3 class="sol-card__title">{{ $isEn ? 'Digital Presence' : 'Presença Digital' }}</h3>
            <p class="sol-card__desc">{{ $isEn
                ? 'Premium positioning and high-conversion digital structure to build immediate authority in the market.'
                : 'Posicionamento de alto nível e estrutura digital de alta conversão para gerar autoridade imediata no mercado.' }}</p>
            <ul class="sol-features">
                <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>{{ $isEn ? 'Exclusive responsive high-conversion design' : 'Design exclusivo e responsivo de alta conversão' }}</li>
                <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>{{ $isEn ? 'Direct WhatsApp conversion channel' : 'Canal direto de conversão via WhatsApp' }}</li>
                <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>{{ $isEn ? 'Qualified lead capture forms' : 'Formulários inteligentes de captura de leads' }}</li>
            </ul>
            <a href="{{ $urlSol }}" class="sol-cta">
                {{ $isEn ? 'Learn more' : 'Conhecer solução' }}
                <span class="sol-cta__arrow">→</span>
            </a>
        </div>

        {{-- PLANO 2 — Gestão Inteligente (FEATURED) --}}
        <div class="sol-card sol-card--featured sol-reveal">
            <span class="sol-badge">★ {{ $isEn ? 'Most Popular' : 'Mais Popular' }}</span>
            <div class="sol-card__glow"></div>
            <div class="absolute bottom-16 right-0 left-0 h-12 bg-gradient-to-t from-purple-500/[0.02] to-transparent pointer-events-none"></div>
            <div class="absolute top-24 right-4 opacity-[0.08] pointer-events-none select-none">
                <svg width="80" height="40" viewBox="0 0 80 40" fill="none" stroke="#a855f7" stroke-width="1.5">
                    <path d="M0 35 Q 20 10, 40 25 T 80 5"/>
                </svg>
            </div>
            <div class="sol-card__icon">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="7" height="9"/><rect x="14" y="3" width="7" height="5"/>
                    <rect x="14" y="12" width="7" height="9"/><rect x="3" y="16" width="7" height="5"/>
                </svg>
            </div>
            <div class="sol-card__level">{{ $isEn ? 'Solution 02' : 'Solução 02' }}</div>
            <h3 class="sol-card__title">{{ $isEn ? 'Smart Management' : 'Gestão Inteligente' }}</h3>
            <p class="sol-card__desc">{{ $isEn
                ? 'Centralized management software that automates scheduling, payments and client retention, end to end.'
                : 'Software de gestão centralizado que automatiza agendamentos, pagamentos e retenção de clientes, de ponta a ponta.' }}</p>
            <ul class="sol-features">
                <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>{{ $isEn ? 'Exclusive admin panel with real-time metrics' : 'Painel administrativo exclusivo em tempo real' }}</li>
                <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>{{ $isEn ? 'Online scheduling 24h without manual work' : 'Agendamento online 24h sem trabalho manual' }}</li>
                <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>{{ $isEn ? 'Automatic PIX payments integrated' : 'Recebimento automático via PIX integrado' }}</li>
            </ul>
            <a href="{{ $urlSol }}" class="sol-cta sol-cta--featured">
                {{ $isEn ? 'Explore platform' : 'Explorar plataforma' }}
                <span class="sol-cta__arrow">→</span>
            </a>
        </div>

        {{-- PLANO 3 — Equipe PRO --}}
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
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
            </div>
            <div class="sol-card__level">{{ $isEn ? 'Solution 03' : 'Solução 03' }}</div>
            <h3 class="sol-card__title">{{ $isEn ? 'PRO Team' : 'Equipe PRO' }}</h3>
            <p class="sol-card__desc">{{ $isEn
                ? 'Multi-user infrastructure for teams: shared calendars, permissions, split payments and advanced reporting.'
                : 'Infraestrutura multiusuário para equipes: agendas compartilhadas, permissões, split de pagamentos e relatórios avançados.' }}</p>
            <ul class="sol-features">
                <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>{{ $isEn ? 'Multiple access levels and permissions' : 'Múltiplos níveis de acesso e permissões' }}</li>
                <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>{{ $isEn ? 'Real-time shared calendar' : 'Agenda compartilhada em tempo real' }}</li>
                <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>{{ $isEn ? 'Productivity and commission reports' : 'Relatórios de produtividade e comissionamento' }}</li>
            </ul>
            <a href="{{ $urlSol }}" class="sol-cta">
                {{ $isEn ? 'View details' : 'Ver detalhes' }}
                <span class="sol-cta__arrow">→</span>
            </a>
        </div>

        {{-- PLANO 4 — Enterprise --}}
        <div class="sol-card sol-card--enterprise sol-reveal">
            <span class="sol-badge sol-badge--enterprise">✦ {{ $isEn ? 'Custom' : 'Custom' }}</span>
            <div class="sol-card__glow" style="background: linear-gradient(90deg, transparent, rgba(99,102,241,0.6), transparent);"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,rgba(99,102,241,0.05),transparent_50%)] pointer-events-none"></div>
            <div class="absolute top-28 right-6 opacity-[0.1] pointer-events-none select-none text-[9px] text-indigo-400 leading-none" style="font-family:'Space Mono',monospace;">
                [01] scale_node: stable<br>[02] load_balance: active<br>[03] secure_layer: 100%<br>[04] custom_api: open
            </div>
            <div class="sol-card__icon">
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M2 22h20"/><path d="M4 22V4h6v18"/><path d="M14 22V10h6v12"/>
                    <line x1="6" y1="8" x2="8" y2="8"/><line x1="6" y1="12" x2="8" y2="12"/><line x1="16" y1="14" x2="18" y2="14"/>
                </svg>
            </div>
            <div class="sol-card__level">{{ $isEn ? 'Solution 04' : 'Solução 04' }}</div>
            <h3 class="sol-card__title">Enterprise</h3>
            <p class="sol-card__desc">{{ $isEn
                ? 'Fully bespoke high-complexity software, mapped, designed and engineered exclusively for your operation\'s scale.'
                : 'Software de alta complexidade 100% sob medida, mapeado, desenhado e desenvolvido exclusivamente para a escala da sua operação.' }}</p>
            <ul class="sol-features">
                <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="stroke:#818cf8"><polyline points="20 6 9 17 4 12"/></svg>{{ $isEn ? '100% custom solution for your model' : 'Solução 100% sob medida para o seu modelo' }}</li>
                <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="stroke:#818cf8"><polyline points="20 6 9 17 4 12"/></svg>{{ $isEn ? 'API integrations and legacy ERP connections' : 'Integrações com APIs e ERPs legados' }}</li>
                <li><svg viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="stroke:#818cf8"><polyline points="20 6 9 17 4 12"/></svg>{{ $isEn ? 'Priority SLA and continuous VIP support' : 'SLA prioritário e suporte VIP contínuo' }}</li>
            </ul>
            <a href="{{ $urlSol }}" class="sol-cta sol-cta--enterprise">
                {{ $isEn ? 'Talk to a specialist' : 'Falar com especialista' }}
                <span class="sol-cta__arrow">→</span>
            </a>
        </div>

    </div>

    {{-- Trust strip --}}
    <div class="mt-16 pt-10 border-t border-white/[0.04] max-w-5xl mx-auto sol-reveal select-none">
        <div class="grid grid-cols-2 md:grid-cols-5 gap-6 text-center">
            @php
            $trust = $isEn ? [
                ['title' => 'Custom Development', 'sub' => 'Original Systems'],
                ['title' => 'Modern Architecture', 'sub' => 'Clean & Agile Code'],
                ['title' => 'Responsive Design',  'sub' => 'Premium Experience'],
                ['title' => 'Dedicated Support',  'sub' => 'Active Follow-up'],
                ['title' => 'Guaranteed Scale',   'sub' => 'Ready to Grow'],
            ] : [
                ['title' => 'Desenvolvimento Custom', 'sub' => 'Sistemas Autorais'],
                ['title' => 'Arquitetura Moderna',    'sub' => 'Código Limpo e Ágil'],
                ['title' => 'Design Responsivo',      'sub' => 'Experiência Premium'],
                ['title' => 'Suporte Dedicado',       'sub' => 'Acompanhamento Ativo'],
                ['title' => 'Escala Garantida',       'sub' => 'Pronto para Crescer'],
            ];
            @endphp
            @foreach($trust as $i => $t)
            <div class="space-y-1 group {{ $i === 4 ? 'col-span-2 md:col-span-1' : '' }}">
                <div class="text-white font-bold text-xs uppercase tracking-widest transition-colors group-hover:text-purple-400"
                     style="font-family: 'Orbitron', sans-serif;">{{ $t['title'] }}</div>
                <div class="text-[11px] text-zinc-500 font-medium">{{ $t['sub'] }}</div>
            </div>
            @endforeach
        </div>
    </div>

</section>

<script>
    (function () {
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

        document.querySelectorAll('#solucoes .sol-reveal').forEach(el => revealObserver.observe(el));
    })();
</script>
