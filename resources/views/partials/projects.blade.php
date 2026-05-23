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
        object-fit: contain; object-position: center top;
        opacity: 0.65;
        transition: transform 0.7s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.4s ease;
    }
    .case-spotlight:hover .case-spotlight__visual img { transform: scale(1.01); opacity: 0.82; }
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
    #project-modal-container { will-change: opacity; background-color: rgba(5, 3, 10, 0.96); }
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
            <img src="{{ asset('imagens/nathan.png') }}"
                 alt="Painel Administrativo — Nathan do Corte">
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
                    ? 'From online booking to full financial control — an exclusive ecosystem running 24/7, built from scratch to scale the barbershop\'s revenue.'
                    : 'Do agendamento online ao controle financeiro completo — ecossistema exclusivo operando 24h, construído do zero para escalar o faturamento da barbearia.' }}
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

    {{-- ── Secondary cases grid ────────────────────────────── --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

        {{-- Case 02: Plataforma Blindada --}}
        <div class="case-card case-reveal case-reveal--d1"
             role="button" tabindex="0"
             onclick="openProjectModal('plataforma-blindada')"
             onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();openProjectModal('plataforma-blindada')}">

            <div class="case-card__visual">
                <img src="{{ asset('imagens/blindada.webp') }}" alt="{{ __('site.projects_p4_title') }}" style="object-position: center center;">
                <span class="case-card__num">02</span>
            </div>

            <div class="case-card__content">
                <span class="case-card__tag">{{ __('site.projects_p4_tag') }}</span>
                <h3 class="case-card__title">{{ __('site.projects_p4_title') }}</h3>
                <p class="case-card__subtitle">{{ __('site.projects_p4_subtitle') }}</p>
                <p class="case-card__desc">
                    {{ app()->getLocale() === 'en'
                        ? 'Native MVC architecture with multi-layer encryption to protect sensitive corporate data with maximum performance and zero vulnerabilities.'
                        : 'Arquitetura MVC nativa com criptografia multicamadas para proteger dados sensíveis corporativos com máxima performance e zero brechas.' }}
                </p>
                <div class="flex flex-wrap gap-1.5 mt-1">
                    <span class="case-pill">MVC Nativo</span>
                    <span class="case-pill">{{ app()->getLocale() === 'en' ? 'Encryption' : 'Criptografia' }}</span>
                    <span class="case-pill">{{ app()->getLocale() === 'en' ? 'High Performance' : 'Alta Performance' }}</span>
                </div>
                <div class="case-card__footer">
                    <span class="case-card__cta">
                        {{ app()->getLocale() === 'en' ? 'View case' : 'Ver case' }}
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </span>
                    <span class="text-zinc-700 text-[10px] font-bold uppercase tracking-wider" style="font-family: 'Orbitron', sans-serif;">Case 02</span>
                </div>
            </div>
        </div>

        {{-- Case 03: AutoAI Classifier --}}
        <div class="case-card case-reveal case-reveal--d2"
             role="button" tabindex="0"
             onclick="openProjectModal('autoai-classifier')"
             onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();openProjectModal('autoai-classifier')}">

            <div class="case-card__visual">
                <img src="{{ asset('imagens/AutoAi.png') }}" alt="{{ __('site.projects_p2_title') }}" style="object-position: center center;">
                <span class="case-card__num">03</span>
            </div>

            <div class="case-card__content">
                <span class="case-card__tag">{{ __('site.projects_p2_tag') }}</span>
                <h3 class="case-card__title">{{ __('site.projects_p2_title') }}</h3>
                <p class="case-card__subtitle">{{ __('site.projects_p2_subtitle') }}</p>
                <p class="case-card__desc">
                    {{ app()->getLocale() === 'en'
                        ? 'Classifies and generates reply drafts for incoming messages in real time, cutting commercial response time by up to 80%.'
                        : 'Classifica e gera minutas de resposta para mensagens recebidas em tempo real, cortando o tempo de retorno comercial em até 80%.' }}
                </p>
                <div class="flex flex-wrap gap-1.5 mt-1">
                    <span class="case-pill">NLP / IA</span>
                    <span class="case-pill">Cloud Deploy</span>
                    <span class="case-pill">−80% {{ app()->getLocale() === 'en' ? 'Response Time' : 'Tempo' }}</span>
                </div>
                <div class="case-card__footer">
                    <span class="case-card__cta">
                        {{ app()->getLocale() === 'en' ? 'View case' : 'Ver case' }}
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </span>
                    <span class="text-zinc-700 text-[10px] font-bold uppercase tracking-wider" style="font-family: 'Orbitron', sans-serif;">Case 03</span>
                </div>
            </div>
        </div>

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
            live:        @json(__('site.modal_live')),
            git:         @json(__('site.modal_git')),
            painTitle:   @json(__('site.modal_pain_title')),
            solTitle:    @json(__('site.modal_solution_title')),
            stepsTitle:  @json(__('site.modal_steps_title')),
            adminTitle:  @json(__('site.modal_admin_title')),
            adminSub:    @json(__('site.modal_admin_sub')),
            adminDesc:   @json(__('site.modal_admin_desc')),
            finalCta:    @json(__('site.modal_final_cta'))
        };

        const locale = @json(app()->getLocale());

        const projectsData = {
            'barber-nathan': {
                title:    @json(__('site.projects_p1_title')),
                subtitle: @json(__('site.projects_p1_subtitle')),
                tag: locale === 'en' ? 'SaaS · Premium Commercial Management' : 'SaaS · Gestão Comercial Premium',
                liveUrl: 'https://nathandocorte.com',
                gitUrl:  'https://github.com/matheusdepaulo/barber-nathan',
                pain: locale === 'en'
                    ? 'Nathan was losing up to 40% of potential bookings because he couldn\'t reply to WhatsApp messages while focused on serving clients. Customers wanted immediate convenience and ended up going elsewhere.'
                    : 'O Nathan perdia até 40% dos potenciais agendamentos porque não conseguia responder as mensagens do WhatsApp enquanto atendia clientes. Os clientes queriam praticidade imediata e acabavam indo procurar outro profissional.',
                solution: locale === 'en'
                    ? 'We created an elegant digital ecosystem where the client books interactively in under 45 seconds, chooses the preferred barber and services with no friction. The business gained full autonomy and stopped leaving money on the table.'
                    : 'Criamos um ecossistema digital elegante onde o cliente faz o agendamento em menos de 45 segundos, escolhe o barbeiro e os serviços sem barreiras. O negócio ganhou autonomia total e parou de deixar dinheiro na mesa.',
                adminPanels: [
                    {
                        title: locale === 'en' ? 'Central Control Dashboard' : 'Dashboard Central de Controle',
                        img:   '{{ asset("imagens/Painel Administrativo.png") }}',
                        desc:  locale === 'en'
                            ? 'The central engine of the business. A clean and intuitive interface designed for the owner to monitor daily booking flow, real-time barbershop status, total revenue and visitor volume.'
                            : 'A engrenagem central do negócio. Interface limpa e intuitiva para o empresário monitorar agendamentos diários, status da barbearia em tempo real, receita total e volume de visitantes.'
                    },
                    {
                        title: locale === 'en' ? 'Smart Schedule & Operational Control' : 'Agenda Inteligente & Controle Operacional',
                        img:   '{{ asset("imagens/agenda.png") }}',
                        desc:  locale === 'en'
                            ? 'Internal time-slot monitoring module. Allows on-the-spot bookings, intuitive calendar view and immediate slot blocking for team organization.'
                            : 'Módulo interno de monitoramento de horários. Permite agendamentos avulsos, visualização por calendário e bloqueio imediato de slots para organização da equipe.'
                    },
                    {
                        title: locale === 'en' ? 'Active Client Management & Auto Drawing' : 'Gestão Ativa de Clientes & Sorteio Automático',
                        img:   '{{ asset("imagens/clientes.png") }}',
                        desc:  locale === 'en'
                            ? 'A living database with an integrated Automatic Drawing tool, designed to fire WhatsApp engagement campaigns and bring clients back automatically.'
                            : 'Base de dados viva com ferramenta de Sorteio Automático integrada, projetada para disparar campanhas de engajamento no WhatsApp e atrair o cliente de volta automaticamente.'
                    },
                    {
                        title: locale === 'en' ? 'Birthday Tracking & Loyalty Marketing' : 'Controle de Aniversariantes & Fidelização',
                        img:   '{{ asset("imagens/aniversariantes.png") }}',
                        desc:  locale === 'en'
                            ? 'The system automatically filters birthday clients each day, creating the perfect opportunity to send a gift or exclusive benefit — shielding the brand against competition.'
                            : 'O sistema filtra automaticamente os aniversariantes do dia, gerando oportunidade perfeita para enviar um presente ou benefício exclusivo, blindando a marca contra a concorrência.'
                    },
                    {
                        title: locale === 'en' ? 'Financial Intelligence & Business Health' : 'Inteligência Financeira & Saúde do Negócio',
                        img:   '{{ asset("imagens/relatorio.png") }}',
                        desc:  locale === 'en'
                            ? 'Clean charts of income, expenses, net profit and No-show metrics. Nathan tracks revenue evolution and exports full reports to keep financial health 100% under control.'
                            : 'Gráficos limpos de entradas, saídas, lucro líquido e métricas de no-show. O Nathan acompanha a evolução de faturamento e exporta relatórios completos para manter a saúde financeira controlada.'
                    },
                    {
                        title: locale === 'en' ? 'Services, Prices & Inventory' : 'Catálogo de Serviços, Preços e Inventário',
                        img:   '{{ asset("imagens/serviços.png") }}',
                        desc:  locale === 'en'
                            ? 'Full autonomy to adjust haircut prices, execution times and manage the inventory of premium men\'s products for sale.'
                            : 'Autonomia total para ajustar valores de cortes, tempos de execução e gerenciar o estoque de produtos masculinos premium à venda.'
                    }
                ],
                steps: locale === 'en' ? [
                    { num: '01', name: 'Briefing & Ideation',     desc: 'We discussed the barbershop\'s needs and mapped the first strategic ideas to eliminate the manual WhatsApp bottleneck.' },
                    { num: '02', name: 'Design & Validation',     desc: 'I built the entire exclusive visual interface in Figma and presented it for Nathan\'s approval before starting the code.' },
                    { num: '03', name: 'Panel & Strategy',        desc: 'I developed the system and admin panel with business rules focused on schedule and revenue control.' },
                    { num: '04', name: 'Infrastructure & Deploy', desc: 'High-performance server setup, rigorous mobile stability testing and official platform launch.' }
                ] : [
                    { num: '01', name: 'Briefing & Ideação',       desc: 'Discutimos as necessidades da barbearia e desenhamos as primeiras ideias estratégicas para eliminar o gargalo do WhatsApp manual.' },
                    { num: '02', name: 'Design & Validação',       desc: 'Montei toda a interface visual exclusiva no Figma e apresentei para aprovação do Nathan antes de iniciar o código.' },
                    { num: '03', name: 'Painel & Estratégia',      desc: 'Desenvolvi o sistema e o painel administrativo com regras de negócio focadas em controle de horários e faturamento.' },
                    { num: '04', name: 'Infraestrutura & Deploy',  desc: 'Configuração de servidores de alta performance, testes rigorosos de estabilidade mobile e publicação oficial da plataforma.' }
                ]
            },
            'autoai-classifier': {
                title:    @json(__('site.projects_p2_title')),
                subtitle: @json(__('site.projects_p2_subtitle')),
                tag:      @json(__('site.projects_p2_tag')),
                liveUrl:  'https://huggingface.co/spaces/matheusdepaulo/AutoAI-Classifier',
                gitUrl:   'https://github.com/matheusdepaulo/autoai-email-classifier',
                pain: locale === 'en'
                    ? 'Sales teams lost contract closing time because inboxes got overcrowded, delaying hot lead responses by hours due to heavy manual triage.'
                    : 'Setores comerciais perdiam o tempo de fechamento de contratos porque as caixas de entrada ficavam superlotadas, atrasando o retorno de leads quentes por horas devido à triagem manual pesada.',
                solution: locale === 'en'
                    ? 'We integrated smart models that immediately classify incoming messages and generate ready reply drafts, cutting admin response time by up to 80%.'
                    : 'Integramos modelos inteligentes que classificam mensagens imediatamente e geram minutas prontas de resposta, cortando o tempo de resposta administrativa em até 80%.',
                steps: locale === 'en' ? [
                    { num: '01', name: 'Briefing & Intentions', desc: 'We aligned triage goals and mapped the main message categories overloading the commercial operation.' },
                    { num: '02', name: 'Prompt Design',         desc: 'Structuring AI rules and flows, validating contextual response drafts before development.' },
                    { num: '03', name: 'Panel & Integration',   desc: 'Building the admin interface with automated rules so the team can manage and validate returns in seconds.' },
                    { num: '04', name: 'Cloud & Deploy',        desc: 'High-availability cloud hosting on Hugging Face Spaces, ensuring fast processing and reliable delivery.' }
                ] : [
                    { num: '01', name: 'Briefing & Intenções',  desc: 'Alinhamos os objetivos de triagem e mapeamos as principais categorias de mensagens que sobrecarregavam a operação comercial.' },
                    { num: '02', name: 'Design de Prompts',     desc: 'Estruturação das regras e fluxos de IA, validando as minutas de resposta contextual antes do desenvolvimento.' },
                    { num: '03', name: 'Painel & Integração',   desc: 'Construção da interface administrativa com regras automatizadas para gerenciar e validar retornos em segundos.' },
                    { num: '04', name: 'Cloud & Deploy',        desc: 'Hospedagem em nuvem de alta disponibilidade (Hugging Face Spaces), garantindo processamento rápido e entrega confiável.' }
                ]
            },
            'plataforma-blindada': {
                title:    @json(__('site.projects_p4_title')),
                subtitle: @json(__('site.projects_p4_subtitle')),
                tag:      @json(__('site.projects_p4_tag')),
                liveUrl:  '#agendamento',
                gitUrl:   'https://github.com/matheusdepaulo/plataforma-mvc-nativa',
                pain: locale === 'en'
                    ? 'Companies suffered from slow panels and were exposed to vulnerabilities on shared servers that put confidential revenue reports and client data at risk.'
                    : 'Empresas sofriam com painéis lentos e ficavam expostas a vulnerabilidades em servidores compartilhados que colocavam em risco relatórios financeiros e dados de clientes.',
                solution: locale === 'en'
                    ? 'Development of a stable platform with strict security architecture, ensuring legal protection, fast reports and zero breach windows.'
                    : 'Desenvolvimento de plataforma estável em arquitetura de segurança rígida, garantindo proteção jurídica, relatórios rápidos e zero brechas para invasões.',
                steps: locale === 'en' ? [
                    { num: '01', name: 'Risk Briefing',       desc: 'We mapped critical points of the old database and the main management report demands the company needed.' },
                    { num: '02', name: 'Operational Design',  desc: 'Creation of a clean admin interface in Figma so managers can handle data securely without complexity.' },
                    { num: '03', name: 'Shielding & Backend', desc: 'Back-end in native MVC architecture with multi-layer encryption and ultra-fast report generation.' },
                    { num: '04', name: 'Deploy & Audit',      desc: 'Hosting in an isolated, secure environment with automated backup routines and stress tests against intrusions.' }
                ] : [
                    { num: '01', name: 'Briefing de Riscos',    desc: 'Mapeamos os pontos críticos do banco de dados e as principais demandas de relatórios gerenciais que a empresa precisava.' },
                    { num: '02', name: 'Design Operacional',    desc: 'Criação de interface administrativa limpa no Figma para que gestores gerenciem dados de forma segura sem complexidade.' },
                    { num: '03', name: 'Blindagem & Back-end',  desc: 'Desenvolvimento back-end em arquitetura MVC nativa com criptografia multicamadas e relatórios ultra-rápidos.' },
                    { num: '04', name: 'Deploy & Auditoria',    desc: 'Hospedagem em ambiente isolado e seguro com rotinas de backup automatizadas e testes de estresse contra invasões.' }
                ]
            }
        };

        // ── Modal open/close ────────────────────────────────────
        window.openProjectModal = function (projectId) {
            const data = projectsData[projectId];
            if (!data) return;

            let adminPanelHtml = '';
            if (data.adminPanels && data.adminPanels.length > 0) {
                adminPanelHtml = `
                    <div class="space-y-6 border-t border-white/5 pt-8">
                        <div class="space-y-1">
                            <h4 class="text-xs font-black uppercase text-purple-400 tracking-widest" style="font-family:'Orbitron',sans-serif;">${i18n.adminTitle}</h4>
                            <p class="text-zinc-300 text-sm font-medium">${i18n.adminSub}</p>
                        </div>
                        <p class="text-zinc-400 text-xs leading-relaxed max-w-2xl">${i18n.adminDesc}</p>
                        <div class="space-y-10 pt-2">
                            ${data.adminPanels.map(panel => `
                                <div class="space-y-3 group">
                                    <div class="flex items-center gap-2.5">
                                        <div class="w-2 h-2 rounded-[2px] bg-purple-500 shadow-[0_0_10px_rgba(168,85,247,0.8)]"></div>
                                        <h5 class="text-white text-xs md:text-sm font-black uppercase tracking-wider">${panel.title}</h5>
                                    </div>
                                    <p class="text-zinc-400 text-xs md:text-sm leading-relaxed max-w-3xl">${panel.desc}</p>
                                    <div class="w-full rounded-2xl overflow-hidden border border-white/[0.04] bg-zinc-950/60 p-2 shadow-[0_20px_50px_rgba(0,0,0,0.5)] transition-all duration-500 hover:border-purple-500/20">
                                        <img src="${panel.img}" alt="${panel.title}" class="w-full h-auto object-contain rounded-xl opacity-90 group-hover:opacity-100 transition duration-300">
                                    </div>
                                </div>
                            `).join('')}
                        </div>
                    </div>
                `;
            }

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

                ${adminPanelHtml}

                <div class="text-center pt-4">
                    <a href="#agendamento" onclick="closeProjectModal()" class="inline-flex px-8 py-3.5 rounded-full font-bold bg-gradient-to-r from-purple-600 to-indigo-600 text-white text-xs uppercase tracking-widest transition-all hover:scale-105 shadow-[0_4px_20px_rgba(168,85,247,0.2)]">
                        ${i18n.finalCta}
                    </a>
                </div>
            `;

            document.getElementById('project-modal-container').classList.remove('opacity-0', 'pointer-events-none');
            document.body.style.overflow = 'hidden';
        };

        window.closeProjectModal = function () {
            document.getElementById('project-modal-container').classList.add('opacity-0', 'pointer-events-none');
            document.body.style.overflow = '';
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
