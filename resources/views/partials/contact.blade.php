<section id="agendamento" class="w-full max-w-7xl mx-auto px-6 py-24 relative z-10 overflow-hidden text-white font-sans">

    <div class="absolute -top-10 right-0 w-96 h-96 bg-purple-600/10 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute -bottom-20 -left-20 w-96 h-96 bg-purple-600/5 rounded-full blur-[120px] pointer-events-none"></div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center relative z-10">

        <div class="lg:col-span-5 space-y-6 select-none scroll-reveal">
            <span class="text-purple-500 font-bold text-[11px] uppercase tracking-[0.3em] block" style="font-family: 'Orbitron', sans-serif;">
                {{ __('site.contact_tag') }}
            </span>
            <h2 class="text-4xl md:text-5xl font-black uppercase tracking-tight leading-[1.1]" style="font-family: 'Orbitron', sans-serif;">
                {{ __('site.contact_title_1') }}<br><span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-purple-600">{{ __('site.contact_title_2') }}</span>
            </h2>
            <p class="text-zinc-400 text-sm md:text-base leading-relaxed max-w-md">
                {{ __('site.contact_desc') }}
            </p>

            <div class="pt-6 border-t border-zinc-800/60 max-w-sm space-y-4">
                <div class="p-4 rounded-xl bg-zinc-900/30 border border-purple-500/20 shadow-[0_0_20px_rgba(168,85,247,0.05)]">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-xs font-bold uppercase tracking-wider text-zinc-400">{{ __('site.contact_slots_label') }}</span>
                        <span class="text-xs font-black text-purple-400 font-orbitron" style="font-family: 'Orbitron', sans-serif;">3 / 5</span>
                    </div>
                    <div class="w-full h-2 bg-zinc-900 rounded-full overflow-hidden border border-white/5">
                        <div class="h-full bg-gradient-to-r from-purple-600 to-indigo-500 rounded-full" style="width: 60%;"></div>
                    </div>
                    <p class="text-[11px] text-zinc-500 mt-2 leading-relaxed">
                        {{ __('site.contact_slots_note') }}
                    </p>
                </div>

                <div class="flex items-center gap-3 pl-1">
                    <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                    <span class="text-xs font-medium text-zinc-300">{{ __('site.contact_active') }}</span>
                </div>
            </div>
        </div>

        <div class="lg:col-span-7 scroll-reveal-delay-1">
            <div class="w-full bg-zinc-950/40 border border-zinc-800/80 backdrop-blur-md p-8 md:p-10 rounded-2xl relative shadow-[0_0_50px_rgba(0,0,0,0.5)] group hover:border-purple-500/20 transition-all duration-500">

                <div class="absolute top-0 left-1/4 right-1/4 h-[1px] bg-gradient-to-r from-transparent via-purple-500/30 to-transparent"></div>

                <form action="#" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="name" class="text-xs font-bold tracking-wider text-zinc-400 uppercase">{{ __('site.contact_name') }}</label>
                            <input type="text" id="name" name="name" required
                                   class="w-full bg-zinc-900/50 border border-zinc-800 focus:border-purple-500 rounded-lg px-4 py-3.5 text-sm text-white placeholder-zinc-600 focus:outline-none focus:ring-1 focus:ring-purple-500 transition-all duration-300"
                                   placeholder="{{ __('site.contact_name_ph') }}">
                        </div>

                        <div class="space-y-2">
                            <label for="whatsapp" class="text-xs font-bold tracking-wider text-zinc-400 uppercase">{{ __('site.contact_whatsapp') }}</label>
                            <input type="tel" id="whatsapp" name="whatsapp" required
                                   class="w-full bg-zinc-900/50 border border-zinc-800 focus:border-purple-500 rounded-lg px-4 py-3.5 text-sm text-white placeholder-zinc-600 focus:outline-none focus:ring-1 focus:ring-purple-500 transition-all duration-300"
                                   placeholder="{{ __('site.contact_whatsapp_ph') }}">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label for="business_type" class="text-xs font-bold tracking-wider text-zinc-400 uppercase">{{ __('site.contact_business') }}</label>
                            <div class="relative">
                                <select id="business_type" name="business_type" required
                                        class="w-full bg-zinc-900/50 border border-zinc-800 focus:border-purple-500 rounded-lg px-4 py-3.5 text-sm text-white focus:outline-none focus:ring-1 focus:ring-purple-500 appearance-none transition-all duration-300 cursor-pointer">
                                    <option value="" disabled selected class="bg-zinc-950 text-zinc-600">{{ __('site.contact_business_ph') }}</option>
                                    <option value="barbearia" class="bg-zinc-950 text-white">{{ __('site.contact_b1') }}</option>
                                    <option value="clinica" class="bg-zinc-950 text-white">{{ __('site.contact_b2') }}</option>
                                    <option value="fisioterapia_dentista" class="bg-zinc-950 text-white">{{ __('site.contact_b3') }}</option>
                                    <option value="academia" class="bg-zinc-950 text-white">{{ __('site.contact_b4') }}</option>
                                    <option value="restaurante" class="bg-zinc-950 text-white">{{ __('site.contact_b5') }}</option>
                                    <option value="outro" class="bg-zinc-950 text-white">{{ __('site.contact_b6') }}</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-zinc-500">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="objective" class="text-xs font-bold tracking-wider text-zinc-400 uppercase">{{ __('site.contact_objective') }}</label>
                            <div class="relative">
                                <select id="objective" name="objective" required
                                        class="w-full bg-zinc-900/50 border border-zinc-800 focus:border-purple-500 rounded-lg px-4 py-3.5 text-sm text-white focus:outline-none focus:ring-1 focus:ring-purple-500 appearance-none transition-all duration-300 cursor-pointer">
                                    <option value="" disabled selected class="bg-zinc-950 text-zinc-600">{{ __('site.contact_objective_ph') }}</option>
                                    <option value="transmitir_profissionalismo" class="bg-zinc-950 text-white">{{ __('site.contact_o1') }}</option>
                                    <option value="vender_mais" class="bg-zinc-950 text-white">{{ __('site.contact_o2') }}</option>
                                    <option value="automatizar" class="bg-zinc-950 text-white">{{ __('site.contact_o3') }}</option>
                                    <option value="renovar" class="bg-zinc-950 text-white">{{ __('site.contact_o4') }}</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-zinc-500">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="message" class="text-xs font-bold tracking-wider text-zinc-400 uppercase">{{ __('site.contact_message') }}</label>
                        <textarea id="message" name="message" rows="3"
                                  class="w-full bg-zinc-900/50 border border-zinc-800 focus:border-purple-500 rounded-lg px-4 py-3.5 text-sm text-white placeholder-zinc-600 focus:outline-none focus:ring-1 focus:ring-purple-500 transition-all duration-300 resize-none"
                                  placeholder="{{ __('site.contact_message_ph') }}"></textarea>
                    </div>

                    <div class="pt-2">
                        <button type="submit"
                                class="w-full relative group overflow-hidden bg-gradient-to-r from-purple-600 to-purple-700 hover:from-purple-500 hover:to-purple-600 text-white font-bold text-xs uppercase tracking-[0.2em] py-4 px-6 rounded-lg transition-all duration-300 shadow-[0_4px_20px_rgba(147,51,234,0.25)] hover:shadow-[0_4px_30px_rgba(147,51,234,0.4)] cursor-pointer"
                                style="font-family: 'Orbitron', sans-serif;">
                            <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:animate-shine"></span>
                            {{ __('site.contact_submit') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</section>

<style>
    .scroll-reveal, .scroll-reveal-delay-1 {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.8s ease-out, transform 0.8s cubic-bezier(0.25, 1, 0.5, 1);
    }
    .reveal-visible { opacity: 1; transform: translateY(0); }
    @keyframes shine { 100% { transform: translateX(100%); } }
    .group-hover\:animate-shine { animation: shine 1.2s ease-in-out infinite; }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const revealElements = document.querySelectorAll('#agendamento .scroll-reveal, #agendamento .scroll-reveal-delay-1');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('reveal-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });
        revealElements.forEach(el => observer.observe(el));
    });
</script>
