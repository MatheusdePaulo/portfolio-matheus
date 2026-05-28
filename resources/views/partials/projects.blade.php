<style>
    /* === Scroll reveal === */
    .case-reveal {
        opacity: 0;
        transform: translateY(28px);
        transition: opacity 0.8s ease-out, transform 0.8s cubic-bezier(0.25, 1, 0.5, 1);
    }
    .case-reveal.visible { opacity: 1; transform: translateY(0); }
    .case-reveal--d1 { transition-delay: 0.1s; }
    .case-reveal--d2 { transition-delay: 0.2s; }

    /* === Live indicator === */
    @keyframes live-pulse {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.4; transform: scale(0.72); }
    }
    .live-dot {
        width: 8px; height: 8px; flex-shrink: 0;
        background: #10b981; border-radius: 50%;
        box-shadow: 0 0 8px rgba(16, 185, 129, 0.7);
        animation: live-pulse 2s ease-in-out infinite;
    }

    /* === Feature pills === */
    .case-pill {
        display: inline-flex; align-items: center;
        font-size: 10.5px; font-weight: 600;
        color: #c4b5fd;
        background: rgba(139, 92, 246, 0.08);
        border: 1px solid rgba(139, 92, 246, 0.18);
        border-radius: 6px; padding: 4px 10px;
        white-space: nowrap;
    }

    /* ========================================================
       SPOTLIGHT — Nathan case principal (horizontal split)
    ======================================================== */
    .case-spotlight {
        display: grid;
        border-radius: 28px; overflow: hidden;
        background: linear-gradient(135deg, rgba(12, 9, 22, 0.99), rgba(8, 6, 15, 0.99));
        border: 1px solid rgba(168, 85, 247, 0.18);
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(168, 85, 247, 0.06);
        transition: box-shadow 0.5s ease, border-color 0.5s ease;
    }
    .case-spotlight:hover {
        box-shadow: 0 32px 80px rgba(0, 0, 0, 0.65), 0 0 0 1px rgba(168, 85, 247, 0.22);
        border-color: rgba(168, 85, 247, 0.28);
    }
    @media (min-width: 1024px) {
        .case-spotlight { grid-template-columns: 55fr 45fr; min-height: 500px; }
    }

    /* Visual side */
    .case-spotlight__visual {
        position: relative; overflow: hidden;
        background: #070510; min-height: 280px;
    }
    .case-spotlight__visual img {
        width: 100%; height: 100%;
        object-fit: cover; object-position: 70% center;
        opacity: 0.65;
        transition: transform 0.7s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.4s ease;
    }
    .case-spotlight:hover .case-spotlight__visual img { transform: scale(1.03); opacity: 0.82; }
    /* Gradient fade: on desktop → fades right into content; on mobile → fades down */
    .case-spotlight__visual::after {
        content: ''; position: absolute; inset: 0; pointer-events: none;
        background:
            linear-gradient(to right, transparent 45%, rgba(8, 6, 15, 0.97) 95%),
            linear-gradient(to bottom, rgba(8, 6, 15, 0.35) 0%, transparent 15%);
    }
    @media (max-width: 1023px) {
        .case-spotlight__visual::after {
            background: linear-gradient(to bottom, transparent 40%, rgba(8, 6, 15, 0.97) 95%);
        }
    }

    /* Content side */
    .case-spotlight__content {
        padding: 48px 40px;
        display: flex; flex-direction: column; justify-content: center; gap: 22px;
    }
    @media (max-width: 1023px) {
        .case-spotlight__content { padding: 28px 24px 40px; }
    }

    /* CTA button inside spotlight */
    .case-spotlight__btn {
        display: inline-flex; align-items: center; gap: 10px;
        padding: 13px 24px; border-radius: 12px;
        font-size: 11px; font-weight: 800;
        letter-spacing: 0.12em; text-transform: uppercase;
        font-family: 'Orbitron', sans-serif;
        color: #fff;
        background: linear-gradient(to right, #7c3aed, #4f46e5);
        border: none; cursor: pointer; width: fit-content;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 8px 25px rgba(168, 85, 247, 0.25);
    }
    .case-spotlight__btn:hover { transform: translate3d(0, -2px, 0); box-shadow: 0 14px 35px rgba(168, 85, 247, 0.45); }
    .case-spotlight__btn svg { transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1); }
    .case-spotlight__btn:hover svg { transform: translateX(4px); }

    /* ========================================================
       SECONDARY CASE CARDS
    ======================================================== */
    .case-card {
        position: relative; border-radius: 24px; overflow: hidden;
        background: rgba(10, 8, 18, 0.99);
        border: 1px solid rgba(255, 255, 255, 0.05);
        cursor: pointer;
        transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1),
                    border-color 0.4s ease, box-shadow 0.4s ease;
        display: flex; flex-direction: column;
    }
    .case-card:hover {
        transform: translate3d(0, -7px, 0);
        border-color: rgba(168, 85, 247, 0.28);
        box-shadow: 0 22px 55px rgba(0, 0, 0, 0.6), 0 0 0 1px rgba(168, 85, 247, 0.12);
    }

    /* Image area */
    .case-card__visual {
        position: relative; overflow: hidden;
        height: 220px; background: #07050e; flex-shrink: 0;
    }
    .case-card__visual img {
        width: 100%; height: 100%;
        object-fit: cover; object-position: center top;
        opacity: 0.42;
        transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.4s ease;
    }
    .case-card:hover .case-card__visual img { transform: scale(1.04); opacity: 0.65; }
    .case-card__visual::after {
        content: ''; position: absolute; inset: 0; pointer-events: none;
        background: linear-gradient(to bottom, rgba(10, 8, 18, 0.1) 0%, rgba(10, 8, 18, 0.72) 100%);
    }
    /* Ghost case number in the image corner */
    .case-card__num {
        position: absolute; top: 14px; right: 18px; z-index: 2;
        font-family: 'Orbitron', sans-serif; font-size: 2.8rem;
        font-weight: 900; color: rgba(255, 255, 255, 0.05);
        line-height: 1; user-select: none; pointer-events: none;
    }

    /* Content area */
    .case-card__content {
        padding: 24px 28px 28px;
        flex: 1; display: flex; flex-direction: column; gap: 10px;
    }
    .case-card__tag {
        display: inline-block;
        font-size: 9px; font-weight: 800; letter-spacing: 0.18em;
        text-transform: uppercase; color: #c084fc;
        background: rgba(168, 85, 247, 0.1); border: 1px solid rgba(168, 85, 247, 0.2);
        padding: 4px 10px; border-radius: 6px; width: fit-content;
    }
    .case-card__title {
        font-family: 'Orbitron', sans-serif;
        font-weight: 900; font-size: 1.2rem; color: #fff;
        text-transform: uppercase; letter-spacing: 0.02em; line-height: 1.15;
    }
    .case-card__subtitle { font-size: 12px; font-weight: 600; color: #9d84d4; }
    .case-card__desc {
        font-size: 13px; color: #a1a1aa; line-height: 1.6; flex-grow: 1;
    }
    .case-card__footer {
        display: flex; align-items: center; justify-content: space-between;
        padding-top: 12px; border-top: 1px solid rgba(255, 255, 255, 0.04);
        margin-top: 6px;
    }
    .case-card__cta {
        font-size: 10.5px; font-weight: 800; letter-spacing: 0.14em;
        text-transform: uppercase; color: rgba(192, 132, 252, 0.7);
        display: inline-flex; align-items: center; gap: 6px;
        transition: color 0.3s ease, gap 0.3s ease;
    }
    .case-card:hover .case-card__cta { color: #c084fc; gap: 11px; }

    /* === MODAL === */
    #project-modal-container { will-change: opacity; background-color: rgba(5, 3, 10, 0.96); overflow-x: hidden; }

    /* === Android Chrome modal fix — evita expansão horizontal da viewport === */
    #project-modal-container > div {
        overflow-x: hidden;
        overflow-wrap: break-word;
        word-wrap: break-word;
    }
    #project-modal-container img,
    #project-modal-container video,
    #project-modal-container pre,
    #project-modal-container table {
        max-width: 100%;
        height: auto;
    }
    @media (max-width: 767px) {
        #project-modal-container {
            padding: 12px;
            align-items: flex-start;
        }
        #project-modal-container > div {
            max-height: calc(100vh - 24px);
            border-radius: 20px;
        }
        #project-modal-container * {
            word-wrap: break-word;
            overflow-wrap: break-word;
        }
        .case-pill { white-space: normal; }
        .modal-video-header { flex-wrap: wrap; }
    }

    /* === Modal video cards === */
    .modal-video-card {
        border-radius: 14px;
        border: 1px solid rgba(255, 255, 255, 0.06);
        overflow: hidden;
        background: rgba(0, 0, 0, 0.35);
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    .modal-video-card:hover {
        border-color: rgba(168, 85, 247, 0.22);
        box-shadow: 0 10px 30px rgba(168, 85, 247, 0.07);
    }
    .modal-video-header {
        padding: 12px 14px 10px;
        display: flex; align-items: center; gap: 10px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.04);
    }
    .modal-video-num {
        font-family: 'Orbitron', sans-serif; font-size: 11px; font-weight: 900;
        color: #a855f7; letter-spacing: 0.05em; flex-shrink: 0;
    }
    .modal-video-title {
        font-family: 'Orbitron', sans-serif; font-size: 9px; font-weight: 700;
        color: #d4d4d8; text-transform: uppercase; letter-spacing: 0.09em; line-height: 1.25;
    }
    .modal-video-sub { font-size: 9.5px; color: #52525b; line-height: 1.4; margin-top: 2px; }
    .modal-video-caption {
        font-size: 12px; color: #a1a1aa; line-height: 1.65;
        padding: 11px 14px 13px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.03);
    }
    .modal-video-wrap { position: relative; aspect-ratio: 16/9; overflow: hidden; background: #04020b; }
    .modal-video-wrap video { width: 100%; height: 100%; object-fit: cover; display: block; }
</style>

<section id="projetos" class="w-full max-w-7xl mx-auto px-6 py-24 relative z-10">

    {{-- ── Header ─────────────────────────────────────────── --}}
    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-16 select-none case-reveal">
        <div class="space-y-3">
            <p class="text-xs font-bold tracking-[0.3em] text-purple-500 uppercase" style="font-family: 'Orbitron', sans-serif;">
                {{ __('site.projects_tag') }}
            </p>
            <h2 class="font-black uppercase tracking-tight text-white text-4xl md:text-6xl leading-[1.05]" style="font-family: 'Orbitron', sans-serif;">
                {!! nl2br(e(__('site.projects_title'))) !!}
            </h2>
        </div>
        <p class="text-zinc-400 text-sm md:text-base leading-relaxed max-w-sm md:text-right">
            {{ __('site.projects_desc') }}
        </p>
    </div>

    {{-- ── Spotlight: Nathan do Corte ──────────────────────── --}}
    <div class="case-spotlight case-reveal">

        {{-- Visual: Admin panel screenshot --}}
        <div class="case-spotlight__visual">
            <picture>
                <source srcset="{{ asset('imagens/nathan.webp') }}" type="image/webp">
                <img src="{{ asset('imagens/nathan.png') }}"
                     alt="Painel Administrativo - Nathan do Corte"
                     width="926" height="498"
                     loading="lazy">
            </picture>
        </div>

        {{-- Content --}}
        <div class="case-spotlight__content">

            {{-- Status bar --}}
            <div class="flex items-center gap-3 flex-wrap">
                <div class="flex items-center gap-2 bg-emerald-500/10 border border-emerald-500/20 rounded-full px-3 py-1.5">
                    <span class="live-dot"></span>
                    <span class="text-emerald-400 text-[10px] font-bold tracking-widest uppercase">
                        {{ app()->getLocale() === 'en' ? 'Live system' : 'Sistema ao vivo' }}
                    </span>
                </div>
                <a href="https://nathandocorte.com" target="_blank" rel="noopener"
                   class="text-zinc-600 text-[11px] font-medium hover:text-zinc-300 transition-colors flex items-center gap-1">
                    nathandocorte.com
                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                </a>
            </div>

            {{-- Case header --}}
            <div>
                <p class="text-purple-500 text-[10px] font-black tracking-[0.28em] uppercase mb-2" style="font-family: 'Orbitron', sans-serif;">
                    {{ app()->getLocale() === 'en' ? 'Case 01 · Main' : 'Case 01 · Principal' }}
                </p>
                <h3 class="text-white font-black uppercase leading-[1.05] text-3xl md:text-[2.4rem]" style="font-family: 'Orbitron', sans-serif;">
                    {{ app()->getLocale() === 'en' ? "Nathan\ndo Corte" : "Nathan\ndo Corte" }}
                </h3>
                <p class="text-purple-400/80 text-sm font-semibold mt-2">
                    {{ app()->getLocale() === 'en' ? 'Complete Commercial Management Platform' : 'Plataforma Completa de Gestão Comercial' }}
                </p>
            </div>

            {{-- Impact statement --}}
            <p class="text-zinc-400 text-sm leading-relaxed max-w-xs">
                {{ app()->getLocale() === 'en'
                    ? 'From online booking to full financial control: an exclusive ecosystem running 24/7, built from scratch to scale the barbershop\'s revenue.'
                    : 'Do agendamento online ao controle financeiro completo: ecossistema exclusivo operando 24h, construído do zero para escalar o faturamento da barbearia.' }}
            </p>

            {{-- Feature pills --}}
            <div class="flex flex-wrap gap-2">
                <span class="case-pill">{{ app()->getLocale() === 'en' ? 'Booking 24/7' : 'Agenda Online 24h' }}</span>
                <span class="case-pill">PIX {{ app()->getLocale() === 'en' ? 'Integrated' : 'Integrado' }}</span>
                <span class="case-pill">{{ app()->getLocale() === 'en' ? 'Admin Panel' : 'Painel Administrativo' }}</span>
                <span class="case-pill">{{ app()->getLocale() === 'en' ? 'Client Retention' : 'Fidelização de Clientes' }}</span>
            </div>

            {{-- CTA --}}
            <button class="case-spotlight__btn" type="button" onclick="openProjectModal('barber-nathan')">
                {{ app()->getLocale() === 'en' ? 'View full case' : 'Ver case completo' }}
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </button>

        </div>
    </div>

    {{-- ── Mini metrics strip below the spotlight ────────── --}}
    <div class="case-reveal case-reveal--d1 mt-6 grid grid-cols-2 sm:grid-cols-4 gap-4">
        @php
        $metrics = app()->getLocale() === 'en' ? [
            ['value' => '−40%',  'label' => 'No-show Rate',         'color' => 'text-emerald-400'],
            ['value' => '24h',   'label' => 'Automated Scheduling', 'color' => 'text-purple-400'],
            ['value' => '< 45s', 'label' => 'Client Booking Time',  'color' => 'text-indigo-400'],
            ['value' => '+3mo',  'label' => 'Live in Production',   'color' => 'text-emerald-400'],
        ] : [
            ['value' => '−40%',  'label' => 'Taxa de No-show',    'color' => 'text-emerald-400'],
            ['value' => '24h',   'label' => 'Agenda Automatizada', 'color' => 'text-purple-400'],
            ['value' => '< 45s', 'label' => 'Tempo de Agendamento','color' => 'text-indigo-400'],
            ['value' => '+3mo',  'label' => 'Em Operação',         'color' => 'text-emerald-400'],
        ];
        @endphp
        @foreach($metrics as $m)
        <div class="rounded-2xl border border-white/[0.05] bg-zinc-900/40 px-5 py-4 flex flex-col gap-1 select-none
                    hover:border-purple-500/20 hover:bg-zinc-900/60 transition-all duration-300">
            <div class="font-black text-2xl leading-none {{ $m['color'] }}"
                 style="font-family: 'Orbitron', sans-serif;">{{ $m['value'] }}</div>
            <div class="text-[10px] font-bold uppercase tracking-widest text-zinc-500">{{ $m['label'] }}</div>
        </div>
        @endforeach
    </div>

</section>

{{-- ── Modal ─────────────────────────────────────────────── --}}
<div id="project-modal-container"
     role="dialog"
     aria-modal="true"
     aria-labelledby="modal-title"
     class="fixed inset-0 z-[100] flex items-center justify-center p-4 md:p-6 opacity-0 pointer-events-none transition-opacity duration-200">
    <div class="bg-zinc-950 border border-white/[0.08] w-full max-w-4xl max-h-[85vh] overflow-y-auto rounded-[32px] shadow-[0_0_50px_rgba(168,85,247,0.15)] relative">
        <button onclick="closeProjectModal()"
                aria-label="{{ app()->getLocale() === 'en' ? 'Close' : 'Fechar' }}"
                class="absolute top-6 right-6 z-50 flex items-center justify-center w-10 h-10 rounded-full border border-white/10 bg-zinc-900/60 text-zinc-400 hover:text-white transition-all">✕</button>
        <div id="modal-dynamic-content" class="p-6 md:p-12 space-y-10"></div>
    </div>
</div>

<script>
    (function () {
        const i18n = {
            live:       @json(__('site.modal_live')),
            git:        @json(__('site.modal_git')),
            painTitle:  @json(__('site.modal_pain_title')),
            solTitle:   @json(__('site.modal_solution_title')),
            stepsTitle: @json(__('site.modal_steps_title')),
            finalCta:   @json(__('site.modal_final_cta'))
        };

        const locale = @json(app()->getLocale());

        const projectsData = {
            'barber-nathan': {
                title:    @json(__('site.projects_p1_title')),
                subtitle: @json(__('site.projects_p1_subtitle')),
                tag: locale === 'en' ? 'Live Case · Commercial Management System' : 'Case Real · Sistema de Gestão Comercial',
                liveUrl: 'https://nathandocorte.com',
                gitUrl:  'https://github.com/matheusdepaulo/barber-nathan',
                pain: locale === 'en'
                    ? 'Every day starts the same: waking up to dozens of unanswered messages, mentally tracking who booked, which slot is open, who cancelled without warning. While you\'re in the middle of a service, clients walk out the door to a competitor because they didn\'t get a fast reply. The schedule turns to chaos: unexplained empty slots, unpunished no-shows, revenue that drops with no clear reason. The business grows on your talent but hits a wall on structure. The more clients show up, the deeper the disorganization, and the more money slips through your fingers without you even realizing it.'
                    : 'Todo dia começa igual: acordar com dezenas de mensagens sem resposta, tentar lembrar mentalmente quem agendou, qual horário sobrou, qual cliente sumiu sem avisar. Enquanto você está no meio de um atendimento, clientes vão embora para o concorrente porque não tiveram retorno rápido. A agenda vira caos: horários buracos que ninguém explica, no-shows sem punição, faturamento que oscila sem que você consiga identificar o motivo. O negócio cresce pelo seu talento, mas trava na falta de estrutura. Quanto mais clientes chegam, maior a desorganização, e mais dinheiro escapa pelas suas mãos sem você perceber.',
                solution: locale === 'en'
                    ? 'We built a complete digital ecosystem that runs on its own, 24 hours a day, without depending on a single manual message. The client books in under 45 seconds directly from their phone. Nathan wakes up with a structured schedule, receives payments automatically and sees the month\'s revenue in real time on a single screen. Operational chaos was replaced by total control. The business stopped leaking money, stopped losing clients from unanswered messages and started scaling with structure, predictability and authority.'
                    : 'Construímos um ecossistema digital completo que opera sozinho, 24 horas por dia, sem depender de nenhuma mensagem manual. O cliente agenda em menos de 45 segundos direto pelo celular. O Nathan acorda com a agenda estruturada, recebe os pagamentos automaticamente via PIX e enxerga o faturamento do mês em tempo real numa única tela. O caos operacional foi substituído por controle total. O negócio parou de vazar dinheiro, parou de perder clientes por falta de resposta e começou a crescer com estrutura, previsibilidade e autoridade.',
                steps: locale === 'en' ? [
                    { num: '01', name: 'Immersion & Strategy',   desc: 'We mapped every bottleneck in the business, understood the real client profile and designed the structure to eliminate operational chaos once and for all.' },
                    { num: '02', name: 'Identity & Design',      desc: 'We built an exclusive interface in Figma, with every detail of the booking flow designed to transmit authority and convert visitors into paying clients.' },
                    { num: '03', name: 'Ecosystem Build',        desc: 'We developed the client-facing site, admin panel, financial management and automated payments, all integrated into one single custom platform.' },
                    { num: '04', name: 'Launch & Operation',     desc: 'We went live, trained Nathan to master every feature and ensured the operation ran fully autonomously from the very first day.' }
                ] : [
                    { num: '01', name: 'Imersão & Estratégia',    desc: 'Mapeamos cada gargalo do negócio, entendemos o perfil real do cliente da barbearia e desenhamos a estrutura ideal para eliminar o caos operacional de uma vez por todas.' },
                    { num: '02', name: 'Identidade & Design',     desc: 'Criamos uma interface exclusiva no Figma, com cada detalhe do fluxo de agendamento pensado para transmitir autoridade e converter visitantes em clientes pagos.' },
                    { num: '03', name: 'Construção do Ecossistema', desc: 'Desenvolvemos o site do cliente, o painel administrativo, a gestão financeira e a automação de pagamentos, tudo integrado em uma única plataforma sob medida.' },
                    { num: '04', name: 'Lançamento & Operação',   desc: 'Colocamos o sistema no ar, treinamos o Nathan para dominar cada funcionalidade e garantimos que a operação rodasse de forma totalmente autônoma desde o primeiro dia.' }
                ]
            },
        };

        // ── Modal open/close ────────────────────────────────────
        window.openProjectModal = function (projectId) {
            const data = projectsData[projectId];
            if (!data) return;

            const videoSectionHtml = `
                <div class="space-y-5 border-t border-white/5 pt-8">
                    <div class="space-y-1.5">
                        <h4 class="text-xs font-black uppercase tracking-widest" style="font-family:'Orbitron',sans-serif;color:#a855f7;">
                            ${locale === 'en' ? 'The System in Action' : 'O Sistema em Ação'}
                        </h4>
                        <p class="text-zinc-300 text-sm font-medium">
                            ${locale === 'en'
                                ? 'Two perspectives of a business that stopped leaking money and started operating with total control.'
                                : 'Duas perspectivas de um negócio que parou de vazar dinheiro e começou a operar com controle total.'}
                        </p>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div class="modal-video-card">
                            <div class="modal-video-header">
                                <span class="modal-video-num">01</span>
                                <div>
                                    <div class="modal-video-title">${locale === 'en' ? 'What your client sees' : 'O que o seu cliente vê'}</div>
                                    <div class="modal-video-sub">${locale === 'en' ? 'End client experience' : 'Experiência do cliente final'}</div>
                                </div>
                            </div>
                            <p class="modal-video-caption">
                                ${locale === 'en'
                                    ? 'A page that sells before the first service. Exclusive design, clear service presentation and a direct booking button: your client chooses, pays and confirms in under 45 seconds, from any device, at any hour. No calls, no WhatsApp messages needed. While you\'re working, the system fills your schedule for you.'
                                    : 'Uma página que vende antes mesmo do primeiro atendimento. Design exclusivo, serviços apresentados com clareza e agendamento que acontece em segundos: o cliente escolhe, confirma e paga direto pelo celular, a qualquer hora do dia. Sem ligar, sem mensagem. Enquanto você atende, o sistema enche sua agenda por você.'}
                            </p>
                            <div class="modal-video-wrap">
                                <video class="modal-demo-video" muted loop playsinline preload="none">
                                    <source src="{{ asset('videos/Modelo-site.mp4') }}" type="video/mp4">
                                </video>
                            </div>
                        </div>

                        <div class="modal-video-card">
                            <div class="modal-video-header">
                                <span class="modal-video-num">02</span>
                                <div>
                                    <div class="modal-video-title">${locale === 'en' ? 'What you control' : 'O que você controla'}</div>
                                    <div class="modal-video-sub">${locale === 'en' ? 'Admin panel' : 'Painel administrativo'}</div>
                                </div>
                            </div>
                            <p class="modal-video-caption">
                                ${locale === 'en'
                                    ? 'Your command center. Full-month revenue, today\'s schedule, complete client history, cash flow and your best-performing services, all on one screen. You stop guessing and start deciding with real data. This is the difference between managing in chaos and scaling with clarity and control.'
                                    : 'A central de comando do negócio. Faturamento do mês, agenda do dia, histórico completo de cada cliente, controle de caixa e os serviços que mais geram receita, tudo numa única tela. Você para de adivinhar e começa a decidir com dados reais. Essa é a diferença entre administrar no caos e escalar com clareza e controle.'}
                            </p>
                            <div class="modal-video-wrap">
                                <video class="modal-demo-video" muted loop playsinline preload="none">
                                    <source src="{{ asset('videos/Painel-adm.mp4') }}" type="video/mp4">
                                </video>
                            </div>
                        </div>

                    </div>
                </div>
            `;

            document.getElementById('modal-dynamic-content').innerHTML = `
                <div class="space-y-2">
                    <span class="text-xs font-bold tracking-widest text-purple-400 uppercase bg-purple-500/10 border border-purple-500/20 px-3 py-1 rounded-md">${data.tag}</span>
                    <h3 id="modal-title" class="text-3xl md:text-5xl font-black text-white uppercase pt-3" style="font-family:'Orbitron',sans-serif;">${data.title}</h3>
                    <p class="text-zinc-400 text-sm md:text-base font-medium">${data.subtitle}</p>
                </div>

                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="${data.liveUrl}" target="_blank" rel="noopener" class="px-6 py-2.5 rounded-xl bg-purple-600 hover:bg-purple-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-[0_4px_15px_rgba(168,85,247,0.2)] flex items-center gap-2">${i18n.live}</a>
                    <a href="${data.gitUrl}" target="_blank" rel="noopener" class="px-6 py-2.5 rounded-xl bg-zinc-900 border border-white/10 hover:bg-zinc-800 text-zinc-300 hover:text-white font-bold text-xs uppercase tracking-wider transition-all flex items-center gap-2">${i18n.git}</a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 border-t border-b border-white/5 py-8">
                    <div class="space-y-3">
                        <h4 class="text-xs font-black uppercase text-purple-400 tracking-wider" style="font-family:'Orbitron',sans-serif;">${i18n.painTitle}</h4>
                        <p class="text-zinc-300 text-sm leading-relaxed">${data.pain}</p>
                    </div>
                    <div class="space-y-3">
                        <h4 class="text-xs font-black uppercase text-emerald-400 tracking-wider" style="font-family:'Orbitron',sans-serif;">${i18n.solTitle}</h4>
                        <p class="text-zinc-300 text-sm leading-relaxed">${data.solution}</p>
                    </div>
                </div>

                <div class="space-y-6">
                    <h4 class="text-xs font-black uppercase text-zinc-500 tracking-widest" style="font-family:'Orbitron',sans-serif;">${i18n.stepsTitle}</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        ${data.steps.map(step => `
                            <div class="p-5 rounded-2xl bg-zinc-900/30 border border-white/[0.03] flex gap-5 items-start">
                                <span class="text-xl font-black text-purple-500/40 leading-none select-none" style="font-family:'Orbitron',sans-serif;">${step.num}</span>
                                <div class="space-y-1">
                                    <h5 class="text-white text-sm font-bold uppercase tracking-tight">${step.name}</h5>
                                    <p class="text-zinc-400 text-xs leading-relaxed">${step.desc}</p>
                                </div>
                            </div>
                        `).join('')}
                    </div>
                </div>

                ${videoSectionHtml}

                <div class="text-center pt-4">
                    <a href="#agendamento" onclick="closeProjectModal()" class="inline-flex px-8 py-3.5 rounded-full font-bold bg-gradient-to-r from-purple-600 to-indigo-600 text-white text-xs uppercase tracking-widest transition-all hover:scale-105 shadow-[0_4px_20px_rgba(168,85,247,0.2)]">
                        ${i18n.finalCta}
                    </a>
                </div>
            `;

            document.getElementById('project-modal-container').classList.remove('opacity-0', 'pointer-events-none');
            document.body.style.overflow = 'hidden';
            document.documentElement.style.overflowX = 'hidden';
            document.querySelectorAll('.modal-demo-video').forEach(v => v.play().catch(() => {}));
        };

        window.closeProjectModal = function () {
            document.querySelectorAll('.modal-demo-video').forEach(v => { v.pause(); v.currentTime = 0; });
            document.getElementById('project-modal-container').classList.add('opacity-0', 'pointer-events-none');
            document.body.style.overflow = '';
            document.documentElement.style.overflowX = '';
        };

        document.getElementById('project-modal-container').addEventListener('click', function (e) {
            if (e.target === this) closeProjectModal();
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') closeProjectModal();
        });

        // ── Scroll reveal ───────────────────────────────────────
        const caseObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    caseObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12, rootMargin: '0px 0px -30px 0px' });

        document.querySelectorAll('#projetos .case-reveal').forEach(el => caseObserver.observe(el));
    })();
</script>
