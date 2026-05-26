@php
    $locale = app()->getLocale();
    $isEn   = $locale === 'en';
    $home   = $isEn ? '/en' : '/';
    $base   = $isEn ? '/en' : '';
@endphp

<footer class="w-full bg-black/40 border-t border-white/[0.03] relative z-10 pt-16 pb-8 text-zinc-400 font-sans">

    <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-purple-600/[0.03] rounded-full blur-[120px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-10 pb-12 items-start">

            <div class="lg:col-span-5 space-y-4 select-none flex flex-col items-center md:items-start">
                <a href="{{ $home }}" class="flex items-center gap-2.5 group w-fit">
                    <svg width="22" height="22" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-purple-500 transform group-hover:scale-110 transition duration-300">
                        <path d="M50 5 L95 85 H5 Z" stroke="currentColor" stroke-width="8" stroke-linejoin="round"/>
                        <path d="M50 25 L80 80 H20 Z" stroke="currentColor" stroke-width="6" stroke-linejoin="round" opacity="0.7"/>
                    </svg>
                    <span class="text-white text-base font-black tracking-widest uppercase font-orbitron" style="font-family: 'Orbitron', sans-serif;">
                        matheus de paulo
                    </span>
                </a>
                <p class="text-xs md:text-sm text-zinc-500 leading-relaxed max-w-xs text-center md:text-left">
                    {{ __('site.footer_desc') }}
                </p>

                <div class="flex items-center gap-3 pt-2 justify-center md:justify-start">
                    <a href="https://github.com/matheusdepaulo" target="_blank" class="w-8 h-8 rounded-lg border border-white/5 bg-zinc-900/30 flex items-center justify-center text-zinc-500 hover:text-white hover:border-purple-500/30 hover:bg-purple-500/10 transition duration-300">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12c0 4.42 2.865 8.166 6.839 9.489.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.464-1.11-1.464-.908-.62.069-.008.069-.008 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.831.092-.646.35-1.086.636-1.336-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.579.688.481C19.137 20.162 22 16.418 22 12c0-5.523-4.477-10-10-10z"/></svg>
                    </a>
                    <a href="https://linkedin.com" target="_blank" class="w-8 h-8 rounded-lg border border-white/5 bg-zinc-900/30 flex items-center justify-center text-zinc-500 hover:text-white hover:border-purple-500/30 hover:bg-purple-500/10 transition duration-300">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                </div>
            </div>

            <div class="lg:col-span-3 space-y-4 flex flex-col items-center md:items-start">
                <h4 class="text-xs font-black uppercase tracking-widest text-white font-orbitron" style="font-family: 'Orbitron', sans-serif;">{{ __('site.footer_nav') }}</h4>
                <ul class="space-y-2 text-xs md:text-sm text-center md:text-left">
                    <li><a href="{{ $home }}#inicio" class="text-zinc-500 hover:text-white transition duration-200">{{ __('site.nav_home') }}</a></li>
                    <li><a href="{{ $base }}/sobre" class="text-zinc-500 hover:text-white transition duration-200">{{ __('site.nav_about') }}</a></li>
                    <li><a href="{{ $home }}#projetos" class="text-zinc-500 hover:text-white transition duration-200">{{ __('site.nav_projects') }}</a></li>
                    <li><a href="{{ $isEn ? '/en/solucoes' : '/solucoes' }}" class="text-zinc-500 hover:text-white transition duration-200">{{ __('site.nav_solutions') }}</a></li>
                    <li><a href="{{ $home }}#agendamento" class="text-zinc-500 hover:text-white transition duration-200">{{ __('site.nav_contact') }}</a></li>
                </ul>
            </div>

            <div class="lg:col-span-4 space-y-4 flex flex-col items-center md:items-start">
                <h4 class="text-xs font-black uppercase tracking-widest text-white font-orbitron" style="font-family: 'Orbitron', sans-serif;">{{ __('site.footer_channels') }}</h4>
                <ul class="space-y-2.5 text-xs md:text-sm">
                    <li class="flex items-center gap-2 justify-center md:justify-start">
                        <span class="text-purple-500 text-xs">✉️</span>
                        <a href="mailto:matheusdepaulo21@gmail.com" class="text-zinc-500 hover:text-white transition duration-200 break-all">matheusdepaulo21@gmail.com</a>
                    </li>
                    <li class="flex items-center gap-2 justify-center md:justify-start">
                        <span class="text-purple-500 text-xs">📱</span>
                        <a href="https://wa.me/5585991495105" target="_blank" class="text-zinc-500 hover:text-white transition duration-200">(85) 99149-5105</a>
                    </li>
                    <li class="flex items-center gap-2 text-zinc-500 justify-center md:justify-start">
                        <span class="text-purple-500 text-xs">📍</span>
                        <span>{{ $isEn ? 'Ceará, Brazil' : 'Ceará, Brasil' }}</span>
                    </li>
                </ul>
            </div>

        </div>

        <div class="mt-8 pt-8 border-t border-white/[0.03] flex flex-col sm:flex-row justify-between items-center gap-4 text-[11px] text-zinc-600 select-none">
            <p>© {{ date('Y') }} Matheus de Paulo. {{ __('site.footer_rights') }}</p>
            <p class="flex items-center gap-1.5">
                {{ __('site.footer_made') }} <span>❤️</span> {{ $isEn ? 'by' : 'por' }} Matheus de Paulo
            </p>
        </div>

    </div>
</footer>
