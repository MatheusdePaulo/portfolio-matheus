@php
    $locale = app()->getLocale();
    $isEn = $locale === 'en';
    $base = $isEn ? '/en' : '';

    // Detecta se estamos na página /sobre (PT ou EN)
    $isAboutPage = request()->is('sobre') || request()->is('en/sobre');

    // URLs base
    $urlHome     = $base . '/#inicio';
    $urlAbout    = $base . '/sobre';
    $urlProjects = $base . '/#projetos';
    $urlContact  = $base . '/#agendamento';
    $urlLogo     = $isEn ? '/en' : '/';

    // Troca de idioma — mantém a página atual
    $urlSwitchPt = $isAboutPage ? '/sobre' : '/';
    $urlSwitchEn = $isAboutPage ? '/en/sobre' : '/en';
@endphp

<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700;900&display=swap" rel="stylesheet">

<header class="w-full bg-black/30 border-b border-white/[0.03] backdrop-blur-md sticky top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        {{-- LOGO --}}
        <a href="{{ $urlLogo }}" class="flex items-center gap-2.5 select-none group relative z-50">
            <div class="h-6 flex items-center justify-center transform group-hover:scale-105 transition duration-300">
                <img src="{{ asset('imagens/logotipo.png') }}" alt="Logo Matheus de Paulo" class="h-full w-auto object-contain opacity-90 group-hover:opacity-100 filter drop-shadow-[0_0_8px_rgba(168,85,247,0.2)]">
            </div>
            <span class="text-white text-base font-black tracking-widest uppercase" style="font-family: 'Orbitron', sans-serif;">
                matheus de paulo
            </span>
        </a>

        {{-- NAV DESKTOP --}}
        <nav class="hidden xl:flex items-center gap-1 glass-effect px-1.5 py-1 rounded-full bg-zinc-950/40 border border-white/[0.04] shadow-[0_4px_30px_rgba(0,0,0,0.15)] relative">

            <div id="nav-marker" class="absolute top-1 bottom-1 left-1.5 rounded-full bg-white/[0.07] border border-white/20 transition-all duration-300 ease-out shadow-[0_2px_10px_rgba(0,0,0,0.3)] flex items-center pl-3.5 pointer-events-none">
                <span class="w-1.5 h-1.5 rounded-[2px] bg-purple-500 shadow-[0_0_12px_rgba(168,85,247,1)]"></span>
            </div>

            <a href="{{ $urlHome }}"
               class="nav-item relative z-10 px-4 py-1.5 rounded-full text-xs font-bold text-zinc-400 hover:text-white transition duration-300"
               data-anchor="inicio">
                {{ __('site.nav_home') }}
            </a>
            <a href="{{ $urlAbout }}"
               class="nav-item relative z-10 px-4 py-1.5 rounded-full text-xs font-bold text-zinc-400 hover:text-white transition duration-300"
               data-page="about">
                {{ __('site.nav_about') }}
            </a>
            <a href="{{ $urlProjects }}"
               class="nav-item relative z-10 px-4 py-1.5 rounded-full text-xs font-bold text-zinc-400 hover:text-white transition duration-300"
               data-anchor="projetos">
                {{ __('site.nav_projects') }}
            </a>
            <a href="{{ $urlContact }}"
               class="nav-item relative z-10 px-4 py-1.5 rounded-full text-xs font-bold text-zinc-400 hover:text-white transition duration-300"
               data-anchor="agendamento">
                {{ __('site.nav_contact') }}
            </a>
        </nav>

        {{-- LADO DIREITO --}}
        <div class="flex items-center gap-4 relative z-50">

            {{-- Seletor PT / EN --}}
            <div class="hidden sm:flex items-center gap-1 bg-zinc-900/40 border border-white/[0.03] p-1 rounded-xl text-[10px] font-bold tracking-wider select-none">
                <a href="{{ $urlSwitchPt }}"
                   class="px-2.5 py-1 rounded-md transition duration-300 {{ !$isEn ? 'text-white bg-white/10' : 'text-zinc-500 hover:text-zinc-300' }}">
                    PT
                </a>
                <a href="{{ $urlSwitchEn }}"
                   class="px-2.5 py-1 rounded-md transition duration-300 {{ $isEn ? 'text-white bg-white/10' : 'text-zinc-500 hover:text-zinc-300' }}">
                    EN
                </a>
            </div>

            <a href="{{ $urlContact }}"
               class="px-6 py-2.5 rounded-full text-xs font-bold bg-gradient-to-r from-purple-600 to-indigo-600 text-white shadow-[0_4px_20px_rgba(168,85,247,0.25)] hover:shadow-[0_4px_30px_rgba(168,85,247,0.45)] transform transition-all duration-300 ease-out hover:scale-105 active:scale-95">
                {{ __('site.nav_cta') }}
            </a>

            <button id="hamburger-btn" class="xl:hidden flex flex-col justify-center items-center w-10 h-10 rounded-xl border border-white/[0.06] bg-zinc-900/40 text-white gap-1.5 focus:outline-none transition-all duration-300 hover:bg-zinc-900/80">
                <span id="line-1" class="w-5 h-0.5 bg-white rounded-full transition-all duration-300"></span>
                <span id="line-2" class="w-5 h-0.5 bg-white rounded-full transition-all duration-300"></span>
                <span id="line-3" class="w-5 h-0.5 bg-white rounded-full transition-all duration-300"></span>
            </button>
        </div>
    </div>

    {{-- MOBILE MENU --}}
    <div id="mobile-menu" class="fixed inset-0 top-0 left-full w-full h-screen bg-black/70 backdrop-blur-2xl z-40 flex flex-col justify-center items-center transition-all duration-500 opacity-0 pointer-events-none">
        <nav class="flex flex-col items-center gap-8 text-center">
            <a href="{{ $urlHome }}" class="mobile-nav-link text-2xl font-bold tracking-wider uppercase text-zinc-500 hover:text-white transition duration-300" style="font-family: 'Orbitron', sans-serif;">{{ __('site.nav_home') }}</a>
            <a href="{{ $urlAbout }}" class="mobile-nav-link text-2xl font-bold tracking-wider uppercase text-zinc-500 hover:text-white transition duration-300" style="font-family: 'Orbitron', sans-serif;">{{ __('site.nav_about') }}</a>
            <a href="{{ $urlProjects }}" class="mobile-nav-link text-2xl font-bold tracking-wider uppercase text-zinc-500 hover:text-white transition duration-300" style="font-family: 'Orbitron', sans-serif;">{{ __('site.nav_projects') }}</a>
            <a href="{{ $urlContact }}" class="mobile-nav-link text-2xl font-bold tracking-wider uppercase text-zinc-500 hover:text-white transition duration-300" style="font-family: 'Orbitron', sans-serif;">{{ __('site.nav_contact') }}</a>

            <div class="flex items-center gap-4 mt-2">
                <a href="{{ $urlSwitchPt }}" class="{{ !$isEn ? 'text-white' : 'text-zinc-500' }} text-sm font-bold tracking-widest uppercase transition" style="font-family: 'Orbitron', sans-serif;">PT</a>
                <span class="text-zinc-700">|</span>
                <a href="{{ $urlSwitchEn }}" class="{{ $isEn ? 'text-white' : 'text-zinc-500' }} text-sm font-bold tracking-widest uppercase transition" style="font-family: 'Orbitron', sans-serif;">EN</a>
            </div>

            <a href="{{ $urlContact }}" class="mobile-nav-link mt-4 px-8 py-3 rounded-full text-sm font-bold bg-gradient-to-r from-purple-600 to-indigo-600 text-white shadow-[0_4px_20px_rgba(168,85,247,0.3)]">
                {{ __('site.nav_cta') }}
            </a>
        </nav>
    </div>
</header>

<script>
    (function () {
        const path = window.location.pathname;
        const isHome = path === '/' || path === '' || path === '/en' || path === '/en/';
        const isAbout = path === '/sobre' || path === '/en/sobre';

        document.addEventListener('DOMContentLoaded', function () {
            // ============== MOBILE MENU ==============
            const btn = document.getElementById('hamburger-btn');
            const menu = document.getElementById('mobile-menu');
            const line1 = document.getElementById('line-1');
            const line2 = document.getElementById('line-2');
            const line3 = document.getElementById('line-3');

            function toggleMenu() {
                const isOpen = menu.classList.contains('left-0');
                if (!isOpen) {
                    menu.classList.remove('left-full', 'opacity-0', 'pointer-events-none');
                    menu.classList.add('left-0', 'opacity-100');
                    line1.style.transform = 'rotate(45deg) translate(5px, 5px)';
                    line2.style.opacity = '0';
                    line3.style.transform = 'rotate(-45deg) translate(5px, -5px)';
                } else {
                    menu.classList.remove('left-0', 'opacity-100');
                    menu.classList.add('left-full', 'opacity-0', 'pointer-events-none');
                    line1.style.transform = 'none';
                    line2.style.opacity = '1';
                    line3.style.transform = 'none';
                }
            }
            btn.addEventListener('click', toggleMenu);

            // ============== SCROLL SUAVE ==============
            function smoothScrollTo(anchorId) {
                if (anchorId === 'inicio') {
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                } else {
                    const el = document.getElementById(anchorId);
                    if (el) el.scrollIntoView({ behavior: 'smooth' });
                }
            }

            // ============== MARCADOR ATIVO ==============
            const navItems = document.querySelectorAll('.nav-item');
            const marker = document.getElementById('nav-marker');

            function moveMarker(element) {
                if (!element || !marker) return;
                marker.style.opacity = '1';
                marker.style.width = `${element.offsetWidth}px`;
                marker.style.transform = `translateX(${element.offsetLeft - 6}px)`;
                navItems.forEach(item => {
                    item.classList.remove('text-white', 'pl-7');
                    item.classList.add('text-zinc-400');
                });
                element.classList.remove('text-zinc-400');
                element.classList.add('text-white', 'pl-7');
            }

            // ============== CLIQUES NA NAV ==============
            navItems.forEach(item => {
                item.addEventListener('click', function (e) {
                    const anchor = this.getAttribute('data-anchor');
                    const page = this.getAttribute('data-page');

                    // Link "Sobre" — navegação normal entre páginas
                    if (page === 'about') {
                        moveMarker(this);
                        return; // deixa o navegador seguir o href
                    }

                    // Links com âncora
                    if (anchor) {
                        if (isHome) {
                            e.preventDefault();
                            moveMarker(this);
                            smoothScrollTo(anchor);
                            history.replaceState(null, '', `#${anchor}`);
                        }
                        // Se NÃO está na home, deixa o navegador seguir o href normalmente (vai para /#anchor)
                    }
                });
            });

            // ============== MOBILE NAV CLIQUES ==============
            document.querySelectorAll('.mobile-nav-link').forEach(link => {
                link.addEventListener('click', function (e) {
                    const href = this.getAttribute('href');

                    // Sobre, contato, etc — deixa navegar normal
                    if (href.includes('/sobre') || !href.includes('#')) {
                        toggleMenu();
                        return;
                    }

                    // Pega a âncora
                    const hashIndex = href.indexOf('#');
                    const anchor = hashIndex >= 0 ? href.substring(hashIndex + 1) : '';

                    if (isHome && anchor) {
                        e.preventDefault();
                        toggleMenu();
                        setTimeout(() => smoothScrollTo(anchor), 300);
                    } else {
                        toggleMenu();
                    }
                });
            });

            // ============== ESTADO INICIAL DO MARCADOR ==============
            function setInitialMarker() {
                if (isAbout) {
                    const aboutLink = document.querySelector('.nav-item[data-page="about"]');
                    if (aboutLink) moveMarker(aboutLink);
                } else if (isHome) {
                    // Verifica se tem hash na URL
                    const hash = window.location.hash.replace('#', '');
                    if (hash) {
                        const activeLink = document.querySelector(`.nav-item[data-anchor="${hash}"]`);
                        if (activeLink) {
                            moveMarker(activeLink);
                            setTimeout(() => smoothScrollTo(hash), 300);
                            return;
                        }
                    }
                    // Default: primeira opção (início)
                    if (navItems.length > 0) moveMarker(navItems[0]);
                }
            }
            setTimeout(setInitialMarker, 100);

            // ============== SCROLL SPY (destaca seção ativa enquanto rola) ==============
            if (isHome) {
                const sections = ['inicio', 'projetos', 'agendamento']
                    .map(id => ({ id, el: document.getElementById(id) }))
                    .filter(s => s.el);

                let scrollTimeout;
                window.addEventListener('scroll', () => {
                    clearTimeout(scrollTimeout);
                    scrollTimeout = setTimeout(() => {
                        const scrollY = window.scrollY + 100;
                        let current = 'inicio';

                        // Se está perto do topo
                        if (scrollY < 200) {
                            current = 'inicio';
                        } else {
                            for (const s of sections) {
                                if (s.el.offsetTop <= scrollY) current = s.id;
                            }
                        }

                        const activeLink = document.querySelector(`.nav-item[data-anchor="${current}"]`);
                        if (activeLink && !activeLink.classList.contains('text-white')) {
                            moveMarker(activeLink);
                        }
                    }, 50);
                });
            }

            // ============== REPOSICIONA MARCADOR AO REDIMENSIONAR ==============
            let resizeTimeout;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(() => {
                    const active = document.querySelector('.nav-item.text-white');
                    if (active) moveMarker(active);
                }, 150);
            });
        });
    })();
</script>
