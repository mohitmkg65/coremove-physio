<header class="sticky top-0 z-40 glass-nav transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                <div class="w-10 h-10 rounded-xl bg-dark-green text-cream flex items-center justify-center font-serif-editorial font-bold text-xl shadow-soft group-hover:scale-105 transition-transform">
                    C
                </div>
                <div class="flex flex-col">
                    <span class="font-serif-editorial text-2xl font-bold tracking-tight text-dark-green leading-none">CoreMove</span>
                    <span class="text-[10px] uppercase tracking-widest text-sage font-semibold mt-0.5">Physiotherapy & Rehab</span>
                </div>
            </a>

            {{-- Desktop Navigation Links --}}
            <nav class="hidden lg:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="text-sm font-medium text-charcoal hover:text-dark-green transition-colors {{ request()->routeIs('home') ? 'text-dark-green font-semibold' : '' }}">Home</a>
                <a href="{{ route('treatments.index') }}" class="text-sm font-medium text-charcoal hover:text-dark-green transition-colors {{ request()->routeIs('treatments.*') ? 'text-dark-green font-semibold' : '' }}">Treatments</a>
                <a href="{{ route('conditions.index') }}" class="text-sm font-medium text-charcoal hover:text-dark-green transition-colors {{ request()->routeIs('conditions.*') ? 'text-dark-green font-semibold' : '' }}">Conditions</a>
                <a href="{{ route('about') }}" class="text-sm font-medium text-charcoal hover:text-dark-green transition-colors {{ request()->routeIs('about') ? 'text-dark-green font-semibold' : '' }}">Why Us</a>
                {{-- <a href="{{ route('offers') }}" class="text-sm font-medium text-charcoal hover:text-dark-green transition-colors flex items-center gap-1.5 {{ request()->routeIs('offers') ? 'text-dark-green font-semibold' : '' }}">
                    Offers
                    <span class="px-2 py-0.5 text-[10px] font-bold bg-terracotta/10 text-terracotta rounded-full">Active</span>
                </a> --}}
                <a href="{{ route('contact') }}" class="text-sm font-medium text-charcoal hover:text-dark-green transition-colors {{ request()->routeIs('contact') ? 'text-dark-green font-semibold' : '' }}">Contact</a>
            </nav>

            {{-- Desktop Primary CTA & Phone --}}
            <div class="hidden lg:flex items-center space-x-5">
                {{-- <a href="tel:+15550192834" class="text-xs font-semibold text-charcoal-muted hover:text-dark-green transition-colors flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-sage" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    (555) 019-2834
                </a> --}}
                <button class="open-lead-modal bg-terracotta hover:bg-terracotta-hover text-white text-sm font-medium px-5 py-2.5 rounded-full shadow-soft hover:shadow-hover transition-all duration-200 transform hover:-translate-y-0.5">
                    Understand My Problem
                    <span class="group-hover:translate-x-1 transition-transform">→</span>
                </button>
            </div>

            {{-- Mobile Hamburger Button --}}
            <div class="flex lg:hidden items-center space-x-3">
                <button class="open-lead-modal bg-terracotta text-white text-xs font-medium px-3.5 py-2 rounded-full shadow-soft">
                    Get Help
                </button>
                <button id="mobileMenuBtn" type="button" class="p-2 rounded-xl text-charcoal hover:bg-beige transition-colors" aria-label="Toggle navigation menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Drawer Overlay --}}
    <div id="mobileNavDrawer" class="hidden fixed inset-0 z-50 bg-charcoal/60 backdrop-blur-sm animate-fade-in lg:hidden">
        <div class="fixed inset-y-0 right-0 max-w-xs w-full bg-cream shadow-2xl p-6 flex flex-col justify-between overflow-y-auto">
            <div>
                <div class="flex items-center justify-between pb-6 border-b border-beige">
                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 rounded-lg bg-dark-green text-cream flex items-center justify-center font-serif-editorial font-bold text-lg">C</div>
                        <span class="font-serif-editorial text-xl font-bold text-dark-green">CoreMove</span>
                    </div>
                    <button class="close-mobile-nav p-2 text-charcoal hover:text-dark-green" aria-label="Close menu">
                        ✕
                    </button>
                </div>

                <div class="py-6 space-y-4">
                    <a href="{{ route('home') }}" class="block text-base font-medium text-charcoal hover:text-dark-green">Home</a>
                    <a href="{{ route('treatments.index') }}" class="block text-base font-medium text-charcoal hover:text-dark-green">Treatments</a>
                    <a href="{{ route('conditions.index') }}" class="block text-base font-medium text-charcoal hover:text-dark-green">Conditions & Pain Guide</a>
                    <a href="{{ route('about') }}" class="block text-base font-medium text-charcoal hover:text-dark-green">Why CoreMove</a>
                    <a href="{{ route('offers') }}" class="block text-base font-medium text-charcoal hover:text-dark-green">Special Offers</a>
                    <a href="{{ route('contact') }}" class="block text-base font-medium text-charcoal hover:text-dark-green">Contact Clinic</a>
                </div>
            </div>

            <div class="space-y-3 pt-6 border-t border-beige">
                <button class="open-lead-modal w-full bg-terracotta text-white font-medium py-3 rounded-xl text-center shadow-soft">
                    Understand My Problem
                    <span class="group-hover:translate-x-1 transition-transform">→</span>
                </button>
                {{-- <a href="tel:+15550192834" class="block w-full text-center border border-dark-green text-dark-green font-medium py-3 rounded-xl text-sm">
                    Call (555) 019-2834
                </a> --}}
            </div>
        </div>
    </div>
</header>
