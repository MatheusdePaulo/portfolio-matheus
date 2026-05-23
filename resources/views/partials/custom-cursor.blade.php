{{--
    Cursor Customizado — partial autossuficiente.
    Inclua ao FINAL do <body>: @include('partials.custom-cursor')
    Requer: elementos .parallax-layer com data-speed presentes no DOM antes deste include.
--}}

<style>
    /* Cursor — oculto por padrão. Só aparece após JS confirmar posição real do mouse. */
    .custom-cursor, .cursor-dot {
        display: none;
    }

    /* cursor:none e visibilidade dos elementos ativados APENAS via JS (classe .cursor-ready no body) */
    body.cursor-ready,
    body.cursor-ready a,
    body.cursor-ready button,
    body.cursor-ready select,
    body.cursor-ready [role="button"] {
        cursor: none !important;
    }

    body.cursor-ready .custom-cursor {
        display: block;
        position: fixed;
        top: 0; left: 0;
        width: 32px;
        height: 32px;
        border: 2px solid rgba(168, 85, 247, 0.6);
        border-radius: 50%;
        pointer-events: none;
        z-index: 9999;
        opacity: 0;
        transform-origin: center center;
        /* Apenas background-color e opacity usam CSS transition.
           Posição e scale são animados pelo rAF loop via transform — sem layout recalc. */
        transition: background-color 0.2s ease, opacity 0.3s ease;
        will-change: transform, opacity;
    }

    body.cursor-ready .cursor-dot {
        display: block;
        position: fixed;
        top: 0; left: 0;
        width: 8px;
        height: 8px;
        background-color: #a855f7;
        border-radius: 50%;
        pointer-events: none;
        z-index: 9998;
        will-change: transform, opacity;
    }
</style>

<div class="custom-cursor" id="customCursor"></div>

<script>
    (function () {
        /*
         * Desktop puro: largura >= 1024px e sem suporte a touch.
         * Cursor do sistema permanece intacto em qualquer outro dispositivo.
         */
        const isDesktop            = window.innerWidth >= 1024 && !('ontouchstart' in window) && window.matchMedia('(hover: hover)').matches;
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        if (!isDesktop || prefersReducedMotion) return;

        const cursor  = document.getElementById('customCursor');
        const maxDots = 8; // 8 dots: rastro preservado, menos elementos por frame (melhor perf em /solucoes)
        const dots    = [];

        const layers = document.querySelectorAll('.parallax-layer');

        let mouseX = 0, mouseY = 0;
        let cursorX = 0, cursorY = 0;
        // Scale lerpeado — substitui width/height no hover (sem layout recalc, GPU-accelerated)
        let targetScale = 1, cursorScale = 1;
        let layerOffsetX = 0, layerOffsetY = 0;
        let animationId  = null;

        for (var i = 0; i < maxDots; i++) {
            var dot = document.createElement('div');
            dot.className = 'cursor-dot';
            document.body.appendChild(dot);
            dots.push({ el: dot, x: 0, y: 0 });
        }

        function updateParallax() {
            layers.forEach(function (layer) {
                var speed = parseFloat(layer.getAttribute('data-speed')) || -40;
                layer.style.transform =
                    'translate3d(' + (layerOffsetX * speed) + 'px, ' + (layerOffsetY * speed) + 'px, 0)';
            });
        }

        function animateCursor() {
            // Lerp do anel — 0.38 elimina sensação de lag mantendo suavidade
            cursorX += (mouseX - cursorX) * 0.38;
            cursorY += (mouseY - cursorY) * 0.38;

            // Lerp do scale (hover expand) — feito aqui para não disparar layout recalc via CSS
            cursorScale += (targetScale - cursorScale) * 0.22;

            cursor.style.transform =
                'translate3d(' + (cursorX - 16) + 'px, ' + (cursorY - 16) + 'px, 0) scale(' + cursorScale.toFixed(3) + ')';

            // Rastro em cadeia: cada dot persegue o anterior
            var targetX = mouseX, targetY = mouseY;
            dots.forEach(function (dot, index) {
                dot.x += (targetX - dot.x) * 0.35;
                dot.y += (targetY - dot.y) * 0.35;
                var scale = (maxDots - index) / maxDots;
                dot.el.style.transform =
                    'translate3d(' + (dot.x - 4) + 'px, ' + (dot.y - 4) + 'px, 0) scale(' + scale + ')';
                dot.el.style.opacity = scale * 0.7;
                targetX = dot.x;
                targetY = dot.y;
            });

            // Parallax sincronizado no mesmo frame — zero listeners extras de mousemove
            updateParallax();
            animationId = requestAnimationFrame(animateCursor);
        }

        function onContinuousMove(e) {
            mouseX       = e.clientX;
            mouseY       = e.clientY;
            layerOffsetX = (mouseX / window.innerWidth)  - 0.5;
            layerOffsetY = (mouseY / window.innerHeight) - 0.5;
        }

        // PRIMEIRO MOUSEMOVE: snap para coordenadas reais antes de revelar o cursor.
        function onFirstMove(e) {
            mouseX       = e.clientX;
            mouseY       = e.clientY;
            layerOffsetX = (mouseX / window.innerWidth)  - 0.5;
            layerOffsetY = (mouseY / window.innerHeight) - 0.5;

            cursorX = mouseX;
            cursorY = mouseY;
            cursorScale = 1;
            cursor.style.transform =
                'translate3d(' + (cursorX - 16) + 'px, ' + (cursorY - 16) + 'px, 0) scale(1)';

            dots.forEach(function (dot) {
                dot.x = mouseX;
                dot.y = mouseY;
                dot.el.style.transform =
                    'translate3d(' + (mouseX - 4) + 'px, ' + (mouseY - 4) + 'px, 0) scale(1)';
                dot.el.style.opacity = '0';
            });

            document.body.classList.add('cursor-ready');

            requestAnimationFrame(function () {
                cursor.style.opacity = '1';
                if (!animationId) animationId = requestAnimationFrame(animateCursor);
            });

            window.addEventListener('mousemove', onContinuousMove, { passive: true });
        }

        window.addEventListener('mousemove', onFirstMove, { passive: true, once: true });

        // Hover expand via scale — nenhum width/height alterado, zero layout recalc
        document.addEventListener('mouseover', function (e) {
            if (!document.body.classList.contains('cursor-ready')) return;
            if (e.target.closest('a, button, [role="button"]')) {
                targetScale = 1.4;
                cursor.style.backgroundColor = 'rgba(168, 85, 247, 0.1)';
            }
        }, { passive: true });

        document.addEventListener('mouseout', function (e) {
            if (!document.body.classList.contains('cursor-ready')) return;
            if (e.target.closest('a, button, [role="button"]')) {
                targetScale = 1.0;
                cursor.style.backgroundColor = 'transparent';
            }
        }, { passive: true });
    })();
</script>
