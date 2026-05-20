<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<style>
    .project-card { position: relative; border-radius: 24px; overflow: hidden; height: 500px; border: 1px solid rgba(255,255,255,0.05); display: flex; flex-direction: column; justify-content: flex-end; cursor: pointer; transition: transform 0.4s cubic-bezier(0.34,1.56,0.64,1), border-color 0.4s ease, box-shadow 0.4s ease; }
    .project-card:hover { transform: translateY(-8px); border-color: rgba(168,85,247,0.4); box-shadow: 0 25px 50px rgba(0,0,0,0.7), 0 0 0 1px rgba(168,85,247,0.15); }
    .project-card--featured { border: 1px solid rgba(168,85,247,0.25); box-shadow: 0 10px 30px rgba(168,85,247,0.05); }
    .project-card--featured:hover { border-color: rgba(168,85,247,0.6); box-shadow: 0 25px 60px rgba(168,85,247,0.2), 0 0 0 1px rgba(168,85,247,0.2); }
    .project-card__bg { position: absolute; inset: 0; z-index: 0; background-color: #05030a; }
    .project-card__bg img { width: 100%; height: 65%; object-fit: contain; object-position: center top; padding-top: 20px; transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1), opacity 0.4s ease; opacity: 0.35; }
    .project-card__bg img.cover-fill { height: 100% !important; object-fit: cover !important; padding-top: 0 !important; opacity: 0.28; }
    .project-card:hover .project-card__bg img { transform: scale(1.03) translateY(-4px); opacity: 0.55; }
    .project-card:hover .project-card__bg img.cover-fill { transform: scale(1.04); opacity: 0.45; }
    .project-card__overlay { position: absolute; inset: 0; z-index: 1; background: linear-gradient(to bottom, rgba(5, 3, 10, 0.1) 0%, rgba(5, 3, 10, 0.4) 30%, rgba(5, 3, 10, 0.85) 60%, rgba(5, 3, 10, 0.98) 100%); }
    .project-card__glow { position: absolute; inset: 0; z-index: 2; background: radial-gradient(ellipse at 50% 100%, rgba(168,85,247,0.15), transparent 75%); opacity: 0; transition: opacity 0.4s ease; }
    .project-card:hover .project-card__glow { opacity: 1; }
    .project-card__content { position: relative; z-index: 3; padding: 32px 28px 28px; display: flex; flex-direction: column; gap: 10px; }
    .project-card__tag { display: inline-block; font-size: 9px; font-weight: 800; letter-spacing: 0.18em; text-transform: uppercase; color: #c084fc; background: rgba(168,85,247,0.12); border: 1px solid rgba(168,85,247,0.25); padding: 4px 12px; border-radius: 6px; width: fit-content; }
    .project-card__tag--featured { color: #fff; background: linear-gradient(to right, #7c3aed, #4f46e5); border: 1px solid rgba(168,85,247,0.5); box-shadow: 0 0 12px rgba(168,85,247,0.4); }
    .project-card__title { font-family: 'Orbitron', sans-serif; font-weight: 900; font-size: 1.4rem; color: #fff; text-transform: uppercase; letter-spacing: 0.02em; line-height: 1.1; }
    .project-card__subtitle { font-size: 13px; font-weight: 600; color: #c084fc; line-height: 1.4; }
    .project-card__desc { font-size: 13px; color: #a1a1aa; line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
    .project-card__cta { display: inline-flex; align-items: center; gap: 6px; font-size: 11px; font-weight: 800; letter-spacing: 0.15em; text-transform: uppercase; color: #fff; margin-top: 6px; transition: color 0.3s ease, gap 0.3s ease; }
    .project-card:hover .project-card__cta { color: #c084fc; gap: 12px; }
    .project-card__shadow-top { width: 100%; height: 1px; background: rgba(255,255,255,0.08); margin: 6px 0; }
    .swiper-pagination-bullet { background: rgba(255,255,255,0.15) !important; opacity: 1 !important; width: 8px; height: 8px; transition: all 0.3s ease; }
    .swiper-pagination-bullet-active { background: #a855f7 !important; width: 28px !important; border-radius: 6px !important; box-shadow: 0 0 15px rgba(168,85,247,0.7); }
    #project-modal-container { will-change: opacity; background-color: rgba(5, 3, 10, 0.96); }
</style>

<section id="projetos" class="w-full max-w-7xl mx-auto px-6 py-24 relative z-10">

    <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-16 select-none">
        <div class="space-y-3">
            <p class="font-orbitron text-xs font-bold tracking-[0.3em] text-purple-500 uppercase" style="font-family: 'Orbitron', sans-serif;">{{ __('site.projects_tag') }}</p>
            <h2 class="font-orbitron font-black uppercase tracking-tight text-white text-4xl md:text-6xl leading-[1.05]" style="font-family: 'Orbitron', sans-serif;">
                {!! nl2br(e(__('site.projects_title'))) !!}
            </h2>
        </div>
        <p class="text-zinc-400 text-sm md:text-base leading-relaxed max-w-sm md:text-right">
            {{ __('site.projects_desc') }}
        </p>
    </div>

    <div class="swiper projectsSwiper overflow-visible !pb-16">
        <div class="swiper-wrapper">

            <div class="swiper-slide h-auto">
                <div class="project-card project-card--featured"
                     role="button" tabindex="0"
                     onclick="openProjectModal('barber-nathan')"
                     onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();openProjectModal('barber-nathan')}">
                    <div class="project-card__bg">
                        <img src="{{ asset('imagens/nathan.png') }}" alt="{{ __('site.projects_p1_title') }}">
                    </div>
                    <div class="project-card__overlay"></div>
                    <div class="project-card__glow"></div>
                    <div class="project-card__content">
                        <span class="project-card__tag project-card__tag--featured">{{ __('site.projects_featured') }}</span>
                        <h3 class="project-card__title">{{ __('site.projects_p1_title') }}</h3>
                        <p class="project-card__subtitle">{{ __('site.projects_p1_subtitle') }}</p>
                        <div class="project-card__shadow-top"></div>
                        <p class="project-card__desc">{{ __('site.projects_p1_desc') }}</p>
                        <span class="project-card__cta">{{ __('site.projects_cta') }}</span>
                    </div>
                </div>
            </div>

            <div class="swiper-slide h-auto">
                <div class="project-card"
                     role="button" tabindex="0"
                     onclick="openProjectModal('autoai-classifier')"
                     onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();openProjectModal('autoai-classifier')}">
                    <div class="project-card__bg">
                        <img src="{{ asset('imagens/AutoAi.png') }}" alt="{{ __('site.projects_p2_title') }}">
                    </div>
                    <div class="project-card__overlay"></div>
                    <div class="project-card__glow"></div>
                    <div class="project-card__content">
                        <span class="project-card__tag">{{ __('site.projects_p2_tag') }}</span>
                        <h3 class="project-card__title">{{ __('site.projects_p2_title') }}</h3>
                        <p class="project-card__subtitle">{{ __('site.projects_p2_subtitle') }}</p>
                        <div class="project-card__shadow-top"></div>
                        <p class="project-card__desc">{{ __('site.projects_p2_desc') }}</p>
                        <span class="project-card__cta">{{ __('site.projects_cta') }}</span>
                    </div>
                </div>
            </div>

            <div class="swiper-slide h-auto">
                <div class="project-card"
                     role="button" tabindex="0"
                     onclick="openProjectModal('task-organizer')"
                     onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();openProjectModal('task-organizer')}">
                    <div class="project-card__bg">
                        <img src="{{ asset('imagens/task.webp') }}" class="cover-fill" alt="{{ __('site.projects_p3_title') }}">
                    </div>
                    <div class="project-card__overlay"></div>
                    <div class="project-card__glow"></div>
                    <div class="project-card__content">
                        <span class="project-card__tag">{{ __('site.projects_p3_tag') }}</span>
                        <h3 class="project-card__title">{{ __('site.projects_p3_title') }}</h3>
                        <p class="project-card__subtitle">{{ __('site.projects_p3_subtitle') }}</p>
                        <div class="project-card__shadow-top"></div>
                        <p class="project-card__desc">{{ __('site.projects_p3_desc') }}</p>
                        <span class="project-card__cta">{{ __('site.projects_cta') }}</span>
                    </div>
                </div>
            </div>

            <div class="swiper-slide h-auto">
                <div class="project-card project-card--featured"
                     role="button" tabindex="0"
                     onclick="openProjectModal('barber-nathan')"
                     onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();openProjectModal('barber-nathan')}">
                    <div class="project-card__bg">
                        <img src="{{ asset('imagens/nathan.png') }}" alt="{{ __('site.projects_p1_title') }}">
                    </div>
                    <div class="project-card__overlay"></div>
                    <div class="project-card__glow"></div>
                    <div class="project-card__content">
                        <span class="project-card__tag project-card__tag--featured">{{ __('site.projects_featured') }}</span>
                        <h3 class="project-card__title">{{ __('site.projects_p1_title') }}</h3>
                        <p class="project-card__subtitle">{{ __('site.projects_p1_subtitle') }}</p>
                        <div class="project-card__shadow-top"></div>
                        <p class="project-card__desc">{{ __('site.projects_p1_desc') }}</p>
                        <span class="project-card__cta">{{ __('site.projects_cta') }}</span>
                    </div>
                </div>
            </div>

            <div class="swiper-slide h-auto">
                <div class="project-card"
                     role="button" tabindex="0"
                     onclick="openProjectModal('plataforma-blindada')"
                     onkeydown="if(event.key==='Enter'||event.key===' '){event.preventDefault();openProjectModal('plataforma-blindada')}">
                    <div class="project-card__bg">
                        <img src="{{ asset('imagens/blindada.webp') }}" class="cover-fill" alt="{{ __('site.projects_p4_title') }}">
                    </div>
                    <div class="project-card__overlay"></div>
                    <div class="project-card__glow"></div>
                    <div class="project-card__content">
                        <span class="project-card__tag">{{ __('site.projects_p4_tag') }}</span>
                        <h3 class="project-card__title">{{ __('site.projects_p4_title') }}</h3>
                        <p class="project-card__subtitle">{{ __('site.projects_p4_subtitle') }}</p>
                        <div class="project-card__shadow-top"></div>
                        <p class="project-card__desc">{{ __('site.projects_p4_desc') }}</p>
                        <span class="project-card__cta">{{ __('site.projects_cta') }}</span>
                    </div>
                </div>
            </div>

        </div>
        <div class="swiper-pagination !-bottom-2"></div>
    </div>
</section>

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

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
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
            title: @json(__('site.projects_p1_title')),
            subtitle: @json(__('site.projects_p1_subtitle')),
            tag: locale === 'en' ? "SaaS / Premium Business Management" : "SaaS / Gestão Comercial Premium",
            liveUrl: "https://nathandocorte.com",
            gitUrl: "https://github.com/matheusdepaulo/barber-nathan",
            pain: locale === 'en'
                ? "Nathan was losing up to 40% of potential bookings because he couldn't reply to WhatsApp messages while focused on serving clients in the chair. Clients wanted immediate convenience to book and ended up going to another professional due to the lack of quick response."
                : "O Nathan perdia até 40% dos potenciais agendamentos porque não conseguia responder as mensagens do WhatsApp enquanto estava focado atendendo os clientes na cadeira. Os clientes queriam praticidade imediata para marcar um horário e acabavam indo procurar outro profissional por falta de resposta rápida.",
            solution: locale === 'en'
                ? "We created an elegant digital ecosystem where the client books interactively in less than 45 seconds, chooses the preferred barber and services with no barriers. The business gained autonomy, optimized the waiting line and stopped leaving money on the table."
                : "Criamos um ecossistema digital elegante onde o cliente faz o agendamento de forma interativa em menos de 45 segundos, escolhe o barbeiro de preferência e os serviços sem barreiras. O negócio ganhou autonomia, otimizou a fila de espera e parou de deixar dinheiro na mesa.",
            adminPanels: [
                {
                    title: locale === 'en' ? "Central Control Dashboard" : "Dashboard Central de Controle",
                    img: "{{ asset('imagens/Painel Administrativo.png') }}",
                    desc: locale === 'en'
                        ? "The central engine of the business. A clean and intuitive interface designed for the owner to monitor daily booking flow, real-time barbershop status, total revenue and visitor volume without any technical complication."
                        : "A engrenagem central do negócio. Uma interface limpa e intuitiva projetada para o empresário monitorar o fluxo de agendamentos diários, o status da barbearia em tempo real, receita total e o volume de visitantes sem qualquer complicação técnica."
                },
                {
                    title: locale === 'en' ? "Smart Schedule & Operational Control" : "Agenda Inteligente & Controle Operacional",
                    img: "{{ asset('imagens/agenda.png') }}",
                    desc: locale === 'en'
                        ? "Internal time-slot monitoring module. Allows on-the-spot bookings, intuitive calendar view and immediate slot blocking for team organization."
                        : "Módulo interno de monitoramento de horários. Permite a criação de agendamentos avulsos na hora, visualização intuitiva por calendário e bloqueio imediato de slots na agenda para organização da equipe."
                },
                {
                    title: locale === 'en' ? "Active Client Management & Auto Drawing" : "Gestão Ativa de Clientes & Sorteio Automático",
                    img: "{{ asset('imagens/clientes.png') }}",
                    desc: locale === 'en'
                        ? "A living database. Includes an integrated **Automatic Drawing of Gifts and Services** tool, designed to fire WhatsApp engagement campaigns, increase base return and bring clients back automatically."
                        : "Uma base de dados viva. Conta com uma ferramenta de **Sorteio Automático de Brindes e Serviços** integrada, projetada para disparar campanhas de engajamento no WhatsApp, aumentar o retorno da base e atrair o cliente de volta de forma automatizada."
                },
                {
                    title: locale === 'en' ? "Birthday Tracking & Loyalty Marketing" : "Controle de Aniversariantes & Marketing de Fidelização",
                    img: "{{ asset('imagens/aniversariantes.png') }}",
                    desc: locale === 'en'
                        ? "The secret to retaining clients and creating loyalty. The system automatically filters the day's birthday clients, creating a perfect opportunity for Nathan to send a gift or exclusive benefit, shielding the brand against competition."
                        : "O segredo para reter clientes e criar lealdade. O sistema filtra automaticamente os aniversariantes do dia, gerando uma oportunidade perfeita para o Nathan enviar um presente ou benefício exclusivo, blindando a marca contra a concorrência."
                },
                {
                    title: locale === 'en' ? "Financial Intelligence & Business Health" : "Inteligência Financeira & Saúde do Negócio",
                    img: "{{ asset('imagens/relatorio.png') }}",
                    desc: locale === 'en'
                        ? "Clean charts of income, expenses, net profit and No-show metrics. Nathan tracks revenue evolution and exports full reports to keep financial health 100% under control."
                        : "Gráficos limpos de entradas, saídas, lucro líquido e métricas de faltas (No-show). O Nathan acompanha a evolução de faturamento e exporta relatórios completos para manter a saúde financeira 100% controlada."
                },
                {
                    title: locale === 'en' ? "Services Catalog, Prices and Inventory" : "Catálogo de Serviços, Preços e Inventário",
                    img: "{{ asset('imagens/serviços.png') }}",
                    desc: locale === 'en'
                        ? "Commercial flexibility module. Full autonomy for the owner to adjust haircut prices, execution times and manage the inventory of premium men's products for sale."
                        : "Módulo de flexibilidade comercial. Autonomia total para o empresário ajustar valores de cortes, tempos de execução e gerenciar o estoque de produtos masculinos premium à venda."
                }
            ],
            steps: locale === 'en' ? [
                { num: "01", name: "Briefing & Ideation", desc: "We discussed the barbershop's needs and sketched the first strategic ideas to eliminate the manual WhatsApp bottleneck." },
                { num: "02", name: "Design & Validation", desc: "I built the entire exclusive visual interface in Figma and presented it for Nathan's approval before starting the code." },
                { num: "03", name: "Panel & Strategy", desc: "I developed the system code and admin panel with business rules focused on facilitating schedule and revenue control." },
                { num: "04", name: "Infrastructure & Deploy", desc: "High-performance server setup, rigorous mobile stability testing and official platform launch." }
            ] : [
                { num: "01", name: "Briefing & Ideação", desc: "Discutimos as necessidades da barbearia e desenhamos as primeiras sugestões estratégicas para eliminar o gargalo do WhatsApp manual." },
                { num: "02", name: "Design & Validação", desc: "Montei toda a interface visual exclusiva da plataforma no Figma e apresentei para aprovação do Nathan antes de iniciar o código." },
                { num: "03", name: "Painel & Estratégia", desc: "Desenvolvi o código do sistema e o painel administrativo com regras de negócio focadas em facilitar o controle de horários e faturamento." },
                { num: "04", name: "Infraestrutura & Deploy", desc: "Configuração de servidores de alta performance, testes rigorosos de estabilidade mobile e publicação oficial da plataforma no ar." }
            ]
        },
        'autoai-classifier': {
            title: @json(__('site.projects_p2_title')),
            subtitle: @json(__('site.projects_p2_subtitle')),
            tag: @json(__('site.projects_p2_tag')),
            liveUrl: "https://huggingface.co/spaces/matheusdepaulo/AutoAI-Classifier",
            gitUrl: "https://github.com/matheusdepaulo/autoai-email-classifier",
            pain: locale === 'en'
                ? "Sales teams lost contract closing time because inboxes got overcrowded, delaying hot lead responses by hours due to heavy manual triage."
                : "Setores comerciais perdiam o tempo de fechamento de contratos porque as caixas de entrada ficavam superlotadas, atrasando o retorno de leads quentes por horas devido à triagem manual pesada.",
            solution: locale === 'en'
                ? "We integrated smart models that immediately classify incoming messages and generate ready reply drafts, cutting admin response time by up to 80%."
                : "Integramos modelos inteligentes que classificam mensagens de entrada imediatamente e geram minutas prontas de resposta, cortando o tempo de resposta administrativa em até 80%.",
            steps: locale === 'en' ? [
                { num: "01", name: "Briefing & Intentions", desc: "We aligned triage goals and mapped the main message categories overloading the commercial operation." },
                { num: "02", name: "Prompt Design", desc: "Structuring AI rules and flows, validating contextual response drafts before development." },
                { num: "03", name: "Panel & Integration", desc: "Building the admin interface with automated rules so the team can manage and validate returns in seconds." },
                { num: "04", name: "Infrastructure & Cloud", desc: "High-availability cloud hosting (Hugging Face Spaces), ensuring fast processing and data delivery tests." }
            ] : [
                { num: "01", name: "Briefing & Intenções", desc: "Alinhamos os objetivos de triagem e mapeamos as principais categorias de mensagens que sobrecarregavam a operação comercial." },
                { num: "02", name: "Design de Prompts", desc: "Estruturação das regras e fluxos de inteligência artificial, validando as minutas de resposta contextual antes do desenvolvimento." },
                { num: "03", name: "Painel & Integração", desc: "Construção da interface administrativa com regras automatizadas para que a equipe possa gerenciar e validar os retornos em segundos." },
                { num: "04", name: "Infraestrutura & Cloud", desc: "Hospedagem em nuvem de alta disponibilidade (Hugging Face Spaces), garantindo processamento rápido e testes de entrega de dados." }
            ]
        },
        'task-organizer': {
            title: @json(__('site.projects_p3_title')),
            subtitle: @json(__('site.projects_p3_subtitle')),
            tag: @json(__('site.projects_p3_tag')),
            liveUrl: "https://matheusdepaulo.github.io/to-do-list-pastel/",
            gitUrl: "https://github.com/matheusdepaulo/to-do-list-pastel",
            pain: locale === 'en'
                ? "Small teams lost control of daily deliveries by using complex spreadsheets or cluttered tools that scattered employees' focus on secondary tasks."
                : "Pequenas equipes perdiam o controle de entregas diárias por utilizarem planilhas complexas ou ferramentas poluídas que dispersavam o foco dos colaboradores em tarefas secundárias.",
            solution: locale === 'en'
                ? "An ultra-fast minimalist interface built with stable local storage, created to keep total focus on the day's priorities without distractions."
                : "Uma interface minimalista ultra-veloz desenvolvida com armazenamento local estável, criada para manter o foco total nas prioridades do dia sem distrações.",
            steps: locale === 'en' ? [
                { num: "01", name: "Flow Alignment", desc: "We analyzed the operational routine to understand how to simplify delivery steps and optimize daily focus time." },
                { num: "02", name: "Minimalist Interface", desc: "We designed a clean Figma layout focused on eliminating user decision fatigue, validating touch and desktop usability." },
                { num: "03", name: "Performance Engineering", desc: "System coding with stable local data persistence and fast filters for instant navigation." },
                { num: "04", name: "Tests & Publishing", desc: "Load testing on older devices and official publishing via GitHub Pages with optimized performance." }
            ] : [
                { num: "01", name: "Alinhamento de Fluxos", desc: "Analisamos a rotina operacional para entender como simplificar as etapas de entrega e otimizar o tempo de foco diário." },
                { num: "02", name: "Interface Minimalista", desc: "Desenhamos um layout limpo no Figma focado em eliminar a fadiga de decisão do usuário, validando a usabilidade touch e desktop." },
                { num: "03", name: "Engenharia de Performance", desc: "Codificação do system aplicando persistência de dados local estável e filtros rápidos para uma navegação instantânea." },
                { num: "04", name: "Testes & Publicação", desc: "Execução de testes de carregamento em dispositivos antigos e publicação oficial via GitHub Pages com performance otimizada." }
            ]
        },
        'plataforma-blindada': {
            title: @json(__('site.projects_p4_title')),
            subtitle: @json(__('site.projects_p4_subtitle')),
            tag: @json(__('site.projects_p4_tag')),
            liveUrl: "#agendamento",
            gitUrl: "https://github.com/matheusdepaulo/plataforma-mvc-nativa",
            pain: locale === 'en'
                ? "Companies suffered from slow panels and were exposed to vulnerabilities on shared servers that risked confidential revenue reports and client data."
                : "Empresas sofriam com painéis lentos e ficavam expostas a vulnerabilidades em servidores compartilhados que colocavam em risco relatórios confidenciais de faturamento e dados de clientes.",
            solution: locale === 'en'
                ? "Development of a stable platform with strict security architecture, ensuring legal protection, fast reports and zero breach windows."
                : "Desenvolvimento de uma plataforma estável em arquitetura de segurança rígida, garantindo proteção jurídica, relatórios rápidos e zero brechas para invasões.",
            steps: locale === 'en' ? [
                { num: "01", name: "Risk Briefing", desc: "We mapped the critical points of the old database and the main management report demands the company needed." },
                { num: "02", name: "Operational Design", desc: "Creation of a clean admin interface in Figma so managers can handle data securely without complexity." },
                { num: "03", name: "Shielding & Business", desc: "Back-end development in native MVC architecture with multi-layer encryption and ultra-fast report generation." },
                { num: "04", name: "Deploy & Audit", desc: "Hosting in an isolated, secure environment with automated backup routines and stress tests against intrusions." }
            ] : [
                { num: "01", name: "Briefing de Riscos", desc: "Mapeamos os pontos críticos do antigo banco de dados e as principais demandas de relatórios gerenciais que a empresa precisava." },
                { num: "02", name: "Design Operacional", desc: "Criação de uma interface administrativa limpa no Figma para que gestores gerenciem dados de forma segura sem complexidade." },
                { num: "03", name: "Blindagem & Negócio", desc: "Desenvolvimento do back-end em arquitetura MVC nativa com criptografia multicamadas e geração de relatórios ultra-rápidos." },
                { num: "04", name: "Deploy & Auditoria", desc: "Hospedagem em ambiente isolado e seguro com rotinas de backup automatizadas e testes de estresse contra invasões." }
            ]
        }
    };

    function openProjectModal(projectId) {
        const data = projectsData[projectId];
        if (!data) return;

        const contentTarget = document.getElementById('modal-dynamic-content');

        let adminPanelHtml = '';
        if (data.adminPanels && data.adminPanels.length > 0) {
            adminPanelHtml = `
                <div class="space-y-6 border-t border-white/5 pt-8">
                    <div class="space-y-1">
                        <h4 class="text-xs font-black uppercase text-purple-400 font-orbitron tracking-widest">${i18n.adminTitle}</h4>
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
                                <div class="w-full rounded-2xl overflow-hidden border border-white/[0.04] bg-zinc-950/60 p-2 shadow-[0_20px_50px_rgba(0,0,0,0.5)] transform transition duration-500 hover:border-purple-500/20">
                                    <img src="${panel.img}" alt="${panel.title}" class="w-full h-auto object-contain rounded-xl opacity-90 group-hover:opacity-100 transition duration-300 filter drop-shadow-[0_4px_20px_rgba(0,0,0,0.6)]">
                                </div>
                            </div>
                        `).join('')}
                    </div>
                </div>
            `;
        }

        contentTarget.innerHTML = `
            <div class="space-y-2">
                <span class="text-xs font-bold tracking-widest text-purple-400 uppercase bg-purple-500/10 border border-purple-500/20 px-3 py-1 rounded-md">${data.tag}</span>
                <h3 id="modal-title" class="text-3xl md:text-5xl font-black text-white font-orbitron uppercase pt-3" style="font-family: 'Orbitron', sans-serif;">${data.title}</h3>
                <p class="text-zinc-400 text-sm md:text-base font-medium">${data.subtitle}</p>
            </div>

            <div class="flex flex-wrap gap-4 pt-2">
                <a href="${data.liveUrl}" target="_blank" class="px-6 py-2.5 rounded-xl bg-purple-600 hover:bg-purple-500 text-white font-bold text-xs uppercase tracking-wider transition-all shadow-[0_4px_15px_rgba(168,85,247,0.2)] flex items-center gap-2">
                    ${i18n.live}
                </a>
                <a href="${data.gitUrl}" target="_blank" class="px-6 py-2.5 rounded-xl bg-zinc-900 border border-white/10 hover:bg-zinc-800 text-zinc-300 hover:text-white font-bold text-xs uppercase tracking-wider transition-all flex items-center gap-2">
                    ${i18n.git}
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 border-t border-b border-white/5 py-8">
                <div class="space-y-3">
                    <h4 class="text-xs font-black uppercase text-purple-400 font-orbitron tracking-wider">${i18n.painTitle}</h4>
                    <p class="text-zinc-300 text-sm leading-relaxed">${data.pain}</p>
                </div>
                <div class="space-y-3">
                    <h4 class="text-xs font-black uppercase text-emerald-400 font-orbitron tracking-wider">${i18n.solTitle}</h4>
                    <p class="text-zinc-300 text-sm leading-relaxed">${data.solution}</p>
                </div>
            </div>

            <div class="space-y-6">
                <h4 class="text-xs font-black uppercase text-zinc-500 font-orbitron tracking-widest">${i18n.stepsTitle}</h4>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    ${data.steps.map(step => `
                        <div class="p-5 rounded-2xl bg-zinc-900/30 border border-white/[0.03] flex gap-5 items-start h-full">
                            <span class="text-xl font-black text-purple-500/40 font-orbitron leading-none select-none">${step.num}</span>
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

        const modalContainer = document.getElementById('project-modal-container');
        modalContainer.classList.remove('opacity-0', 'pointer-events-none');
        document.body.style.overflow = 'hidden';
    }

    function closeProjectModal() {
        const modalContainer = document.getElementById('project-modal-container');
        modalContainer.classList.add('opacity-0', 'pointer-events-none');
        document.body.style.overflow = '';
    }

    document.getElementById('project-modal-container').addEventListener('click', function(e) {
        if(e.target === this) closeProjectModal();
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeProjectModal();
    });

    document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.projectsSwiper', {
            slidesPerView: 1,
            spaceBetween: 24,
            loop: true,
            grabCursor: true,
            speed: 750,
            autoplay: { delay: 4500, disableOnInteraction: false },
            pagination: { el: '.swiper-pagination', clickable: true },
            breakpoints: {
                768: { slidesPerView: 2, spaceBetween: 24 },
                1200: { slidesPerView: 3, spaceBetween: 24 }
            }
        });
    });
</script>
