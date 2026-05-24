@php
$services = app()->getLocale() === 'en' ? [
    'Landing Pages',
    'Management Systems',
    'Dashboards',
    'Process Automation',
    'Online Scheduling',
    'PIX Integration',
    'Business Platforms',
    'APIs & Integrations',
] : [
    'Landing Pages',
    'Sistemas de Gestão',
    'Dashboards',
    'Automação de Processos',
    'Agendamentos Online',
    'Integrações PIX',
    'Plataformas Empresariais',
    'APIs & Integrações',
];
@endphp

<style>
    @keyframes stripScroll {
        from { transform: translateX(0); }
        to   { transform: translateX(-50%); }
    }
    .services-strip-track {
        display: flex;
        width: max-content;
        animation: stripScroll 50s linear infinite;
    }
    .services-strip-track:hover {
        animation-play-state: paused;
    }
    @media (prefers-reduced-motion: reduce) {
        .services-strip-track { animation: none; }
    }
</style>

<div class="relative w-full overflow-hidden z-10" style="border-top: 1px solid rgba(255,255,255,0.04); border-bottom: 1px solid rgba(255,255,255,0.04);">

    {{-- glow line center --}}
    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-purple-900/[0.06] to-transparent pointer-events-none"></div>

    {{-- fade masks --}}
    <div class="absolute inset-y-0 left-0 w-28 z-10 pointer-events-none"
         style="background: linear-gradient(to right, #030303, transparent);"></div>
    <div class="absolute inset-y-0 right-0 w-28 z-10 pointer-events-none"
         style="background: linear-gradient(to left, #030303, transparent);"></div>

    <div class="services-strip-track select-none py-5">

        @foreach([0, 1] as $copy)
        <div class="flex items-center" @if($copy) aria-hidden="true" @endif>
            @foreach($services as $index => $service)

            <div class="flex items-center gap-5 px-7">
                {{-- alternating separator style --}}
                @if($index % 3 === 0)
                    <span class="w-1.5 h-1.5 rounded-full flex-shrink-0"
                          style="background: #a855f7; box-shadow: 0 0 10px rgba(168,85,247,0.8);"></span>
                @elseif($index % 3 === 1)
                    <span class="w-1 h-1 rounded-full flex-shrink-0"
                          style="background: rgba(139,92,246,0.5); box-shadow: 0 0 6px rgba(139,92,246,0.4);"></span>
                @else
                    <span class="flex-shrink-0 text-purple-700/50 font-mono text-xs leading-none">◆</span>
                @endif

                <span class="whitespace-nowrap font-semibold uppercase tracking-[0.18em]"
                      style="font-size: 10.5px; color: rgba(161,161,170,0.75);">
                    {{ $service }}
                </span>
            </div>

            @endforeach
        </div>
        @endforeach

    </div>
</div>
