<style>
    @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@700;900&display=swap');
    .st-wrap { background: transparent; padding: 40px 0; font-family: sans-serif; max-width: 800px; margin: 0 auto; }
    .st-title { text-align: center; font-family: 'Orbitron', monospace; font-size: 32px; font-weight: 900; text-transform: uppercase; color: #a855f7; letter-spacing: 2px; margin-bottom: 32px; }

    .st-card {
        background: #111113;
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 12px;
        padding: 20px 24px;
        margin-bottom: 12px;
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 0.6s ease, transform 0.6s ease, border-color 0.3s ease, box-shadow 0.3s ease;
    }
    .st-card.visible { opacity: 1; transform: translateY(0); }
    .st-card:hover { border-color: rgba(255,255,255,0.18); box-shadow: 0 0 30px rgba(255,255,255,0.03); }

    .st-cat { display: flex; align-items: center; gap: 8px; margin-bottom: 14px; }
    .st-dot { width: 8px; height: 8px; border-radius: 50%; flex-shrink: 0; transition: transform 0.3s ease; }
    .st-card:hover .st-dot { transform: scale(1.4); }
    .st-cat-label { font-family: 'Orbitron', monospace; font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 3px; }
    .st-badges { display: flex; flex-wrap: wrap; gap: 8px; }

    .st-badge {
        display: flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        border-radius: 8px;
        background: #1a1a1e;
        border: 1px solid rgba(255,255,255,0.1);
        font-size: 12px;
        color: #d4d4d4;
        font-weight: 500;
        transition: transform 0.2s ease, border-color 0.2s ease, color 0.2s ease, background 0.2s ease;
        cursor: default;
    }
    .st-badge:hover { transform: translateY(-2px); border-color: rgba(255,255,255,0.25); color: #fff; background: #222228; }

    .st-badge-icon {
        width: 18px; height: 18px; border-radius: 4px;
        display: flex; align-items: center; justify-content: center;
        font-size: 11px; font-weight: 700; flex-shrink: 0;
        transition: transform 0.2s ease;
    }
    .st-badge:hover .st-badge-icon { transform: scale(1.15); }

    .st-card:nth-child(2) { transition-delay: 0s; }
    .st-card:nth-child(3) { transition-delay: 0.1s; }
    .st-card:nth-child(4) { transition-delay: 0.2s; }
    .st-card:nth-child(5) { transition-delay: 0.3s; }
</style>

<div class="st-wrap">
    <h2 class="st-title">{{ __('site.stacks_title') }}</h2>

    <!-- Design -->
    <div class="st-card">
        <div class="st-cat">
            <div class="st-dot" style="background:#a855f7; box-shadow: 0 0 8px rgba(168,85,247,0.8);"></div>
            <span class="st-cat-label" style="color:#a855f7;">{{ __('site.stacks_design') }}</span>
        </div>
        <div class="st-badges">
            <span class="st-badge"><span class="st-badge-icon" style="background:#2d1b4e; color:#a855f7;">DS</span>Design Systems</span>
            <span class="st-badge"><span class="st-badge-icon" style="background:#2d1b4e; color:#a855f7;">UX</span>UX Research</span>
            <span class="st-badge"><span class="st-badge-icon" style="background:#2d1b4e; color:#a855f7;">UI</span>UI Design</span>
            <span class="st-badge"><span class="st-badge-icon" style="background:#2d1b4e; color:#a855f7;">▶</span>Prototyping</span>
            <span class="st-badge"><span class="st-badge-icon" style="background:#2d1b4e; color:#a855f7;">Br</span>Branding</span>
        </div>
    </div>

    <!-- Desenvolvimento -->
    <div class="st-card">
        <div class="st-cat">
            <div class="st-dot" style="background:#10b981; box-shadow: 0 0 8px rgba(16,185,129,0.8);"></div>
            <span class="st-cat-label" style="color:#10b981;">{{ __('site.stacks_dev') }}</span>
        </div>
        <div class="st-badges">
            <span class="st-badge"><span class="st-badge-icon" style="background:#0d2b1e; color:#10b981;">&lt;/&gt;</span>HTML/CSS</span>
            <span class="st-badge"><span class="st-badge-icon" style="background:#0d2b1e; color:#f0c000;">JS</span>JavaScript</span>
            <span class="st-badge"><span class="st-badge-icon" style="background:#0d2b1e; color:#61dafb;">⚛</span>React</span>
            <span class="st-badge"><span class="st-badge-icon" style="background:#0d2b1e; color:#3178c6;">TS</span>TypeScript</span>
            <span class="st-badge"><span class="st-badge-icon" style="background:#0d2b1e; color:#38bdf8;">~</span>Tailwind CSS</span>
            <span class="st-badge"><span class="st-badge-icon" style="background:#0d2b1e; color:#10b981;">▲</span>Next.js</span>
        </div>
    </div>

    <!-- Inteligência Artificial -->
    <div class="st-card">
        <div class="st-cat">
            <div class="st-dot" style="background:#f59e0b; box-shadow: 0 0 8px rgba(245,158,11,0.8);"></div>
            <span class="st-cat-label" style="color:#f59e0b;">{{ __('site.stacks_ai') }}</span>
        </div>
        <div class="st-badges">
            <span class="st-badge"><span class="st-badge-icon" style="background:#2b1d05; color:#f59e0b;">AG</span>Antigravity</span>
            <span class="st-badge"><span class="st-badge-icon" style="background:#2b1d05; color:#f59e0b;">FM</span>Figma Make</span>
            <span class="st-badge"><span class="st-badge-icon" style="background:#2b1d05; color:#f59e0b;">✦</span>Cursor AI</span>
            <span class="st-badge"><span class="st-badge-icon" style="background:#2b1d05; color:#4285f4;">G</span>Gemini</span>
            <span class="st-badge"><span class="st-badge-icon" style="background:#2b1d05; color:#cc785c;">✦</span>Claude Code</span>
        </div>
    </div>

    <!-- Ferramentas -->
    <div class="st-card">
        <div class="st-cat">
            <div class="st-dot" style="background:#6366f1; box-shadow: 0 0 8px rgba(99,102,241,0.8);"></div>
            <span class="st-cat-label" style="color:#6366f1;">{{ __('site.stacks_tools') }}</span>
        </div>
        <div class="st-badges">
            <span class="st-badge"><span class="st-badge-icon" style="background:#1a1b3a; color:#6366f1;">Fg</span>Figma</span>
            <span class="st-badge"><span class="st-badge-icon" style="background:#1a1b3a; color:#6366f1;">Mi</span>Miro</span>
            <span class="st-badge"><span class="st-badge-icon" style="background:#1a1b3a; color:#f05032;">◆</span>Git</span>
            <span class="st-badge"><span class="st-badge-icon" style="background:#1a1b3a; color:#6366f1;">N</span>Notion</span>
            <span class="st-badge"><span class="st-badge-icon" style="background:#1a1b3a; color:#5e6ad2;">Li</span>Linear</span>
            <span class="st-badge"><span class="st-badge-icon" style="background:#1a1b3a; color:#0052cc;">PHP</span>PHPUnit</span>
            <span class="st-badge"><span class="st-badge-icon" style="background:#1a1b3a; color:#e37400;">GA</span>Google Analytics</span>
        </div>
    </div>
</div>

<script>
    const cards = document.querySelectorAll('.st-card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) entry.target.classList.add('visible');
        });
    }, { threshold: 0.1 });
    cards.forEach(card => observer.observe(card));
</script>
