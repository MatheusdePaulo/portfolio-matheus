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
        border: 2px solid rgba(168, 85, 247, 0.5);
        border-radius: 50%;
        pointer-events: none;
        z-index: 9999;
        opacity: 0;
        transition: width 0.2s ease, height 0.2s ease,
                    background-color 0.2s ease, opacity 0.3s ease;
        will-change: transform;
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
         * Detecção robusta sem dependência de matchMedia:
         * - window.innerWidth >= 1024  → tela desktop
         * - !('ontouchstart' in window) → sem suporte a touch (exclui celular, tablet, laptop touch)
         * Isso garante ativação em desktops puros e fallback seguro (cursor do sistema) para o resto.
         */
        const isDesktop            = window.innerWidth >= 1024 && !('ontouchstart' in window);
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        // Fallback garantido: se não for desktop puro, cursor do sistema permanece intacto
        if (!isDesktop || prefersReducedMotion) return;

        const cursor  = document.getElementById('customCursor');
        const maxDots = 12;
        const dots    = [];

        // .parallax-layer já existem no DOM (partial incluído ao final do body)
        const layers = document.querySelectorAll('.parallax-layer');

        let mouseX = 0, mouseY = 0;
        let cursorX = 0, cursorY = 0;
        let layerOffsetX = 0, layerOffsetY = 0;
        let animationId  = null;

        // Cria pontos do rastro — ficam com display:none até cursor-ready
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
            // Lerp suave do anel (0.2 = fluido sem delay excessivo)
            cursorX += (mouseX - cursorX) * 0.2;
            cursorY += (mouseY - cursorY) * 0.2;
            cursor.style.transform =
                'translate3d(' + (cursorX - 16) + 'px, ' + (cursorY - 16) + 'px, 0)';

            // Rastro em cadeia: cada ponto persegue o anterior
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

            updateParallax();
            animationId = requestAnimationFrame(animateCursor);
        }

        function onContinuousMove(e) {
            mouseX       = e.clientX;
            mouseY       = e.clientY;
            layerOffsetX = (mouseX / window.innerWidth)  - 0.5;
            layerOffsetY = (mouseY / window.innerHeight) - 0.5;
        }

        // PRIMEIRO MOUSEMOVE: snap para coordenadas reais antes de revelar qualquer coisa.
        // Evita o artefato do "cursor preso no canto superior esquerdo" no carregamento.
        function onFirstMove(e) {
            mouseX       = e.clientX;
            mouseY       = e.clientY;
            layerOffsetX = (mouseX / window.innerWidth)  - 0.5;
            layerOffsetY = (mouseY / window.innerHeight) - 0.5;

            // Pré-posiciona tudo na localização real do mouse enquanto ainda invisível
            cursorX = mouseX;
            cursorY = mouseY;
            cursor.style.transform =
                'translate3d(' + (cursorX - 16) + 'px, ' + (cursorY - 16) + 'px, 0)';

            dots.forEach(function (dot) {
                dot.x = mouseX;
                dot.y = mouseY;
                dot.el.style.transform =
                    'translate3d(' + (mouseX - 4) + 'px, ' + (mouseY - 4) + 'px, 0) scale(1)';
                dot.el.style.opacity = '0';
            });

            // Ativa cursor-ready: oculta cursor do sistema, exibe cursor customizado no DOM
            document.body.classList.add('cursor-ready');

            // Fade-in do anel no próximo frame (display:block precisa ser processado primeiro)
            requestAnimationFrame(function () {
                cursor.style.opacity = '1';
                if (!animationId) animationId = requestAnimationFrame(animateCursor);
            });

            // Troca para listener leve contínuo
            window.addEventListener('mousemove', onContinuousMove, { passive: true });
        }

        // once:true → listener se remove automaticamente após o primeiro disparo
        window.addEventListener('mousemove', onFirstMove, { passive: true, once: true });

        // Hover: expande o anel ao passar sobre links e botões
        document.addEventListener('mouseover', function (e) {
            if (!document.body.classList.contains('cursor-ready')) return;
            if (e.target.closest('a, button, [role="button"]')) {
                cursor.style.width           = '45px';
                cursor.style.height          = '45px';
                cursor.style.backgroundColor = 'rgba(168, 85, 247, 0.1)';
            }
        }, { passive: true });

        document.addEventListener('mouseout', function (e) {
            if (!document.body.classList.contains('cursor-ready')) return;
            if (e.target.closest('a, button, [role="button"]')) {
                cursor.style.width           = '32px';
                cursor.style.height          = '32px';
                cursor.style.backgroundColor = 'transparent';
            }
        }, { passive: true });
    })();
</script>
