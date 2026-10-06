<footer class="bg-dark-green text-cream pt-16 pb-24 md:pb-12 border-t border-forest">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-forest/60">
            
            {{-- Brand Column --}}
            <div class="lg:col-span-2 space-y-4">
                {{-- <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-xl bg-cream text-dark-green flex items-center justify-center font-serif-editorial font-bold text-xl">C</div>
                    <span class="font-serif-editorial text-2xl font-bold text-cream">CoreMove</span>
                </div>--}}

                <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                    <div class="w-10 h-10 rounded-xl bg-cream text-dark-green flex items-center justify-center font-serif-editorial font-bold text-xl">C</div>
                    <div class="flex flex-col">
                        <span class="font-serif-editorial text-2xl font-bold tracking-tight text-cream leading-none">CoreMove</span>
                        <span class="text-[10px] uppercase tracking-widest text-sage font-semibold mt-0.5">Physiotherapy & Rehab</span>
                    </div>
                </a>
                <p class="text-sm text-cream/70 leading-relaxed max-w-sm">
                    Evidence-informed physiotherapy built around your individual body and lifestyle. We help you move freely, understand your pain, and regain total physical confidence.
                </p>

                {{-- Social Links --}}
                <div class="pt-2 flex items-center space-x-3">
                    <a href="https://www.instagram.com/coremove_physiotherapy/" target="_blank" rel="noopener noreferrer" title="Follow us on Instagram" class="w-9 h-9 rounded-full bg-forest/80 hover:bg-terracotta text-cream flex items-center justify-center transition-all duration-300 hover:scale-110">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="https://www.linkedin.com/in/simran-tripathi-028568298/" target="_blank" rel="noopener noreferrer" title="Connect on LinkedIn" class="w-9 h-9 rounded-full bg-forest/80 hover:bg-[#0A66C2] text-cream flex items-center justify-center transition-all duration-300 hover:scale-110">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.239-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                    <a href="https://wa.me/919058764970?text=Hello%20CoreMove%20Physiotherapy%2C%20I%20would%20like%20to%20inquire%20about%20an%20appointment." target="_blank" rel="noopener noreferrer" title="Message on WhatsApp" class="w-9 h-9 rounded-full bg-forest/80 hover:bg-[#25D366] text-cream flex items-center justify-center transition-all duration-300 hover:scale-110">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.705 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-1.157 4.228 4.397-1.139zm12.189-7.237c-.309-.155-1.826-.901-2.109-1.004-.284-.103-.491-.155-.698.155-.207.31-.8 1.004-.981 1.211-.181.207-.362.233-.671.078-.309-.155-1.306-.481-2.487-1.534-.919-.82-1.539-1.834-1.719-2.144-.18-.31-.019-.478.135-.632.139-.139.309-.362.464-.543.155-.181.207-.31.31-.517.103-.207.052-.388-.026-.543-.078-.155-.698-1.681-.956-2.302-.251-.606-.506-.524-.698-.534-.181-.01-.388-.01-.595-.01-.207 0-.543.078-.827.388-.284.31-1.085 1.061-1.085 2.587 0 1.526 1.111 2.998 1.266 3.205.155.207 2.187 3.34 5.297 4.682.74.32 1.317.51 1.767.653.743.236 1.42.203 1.954.123.596-.089 1.826-.747 2.084-1.47.258-.723.258-1.343.181-1.47-.078-.127-.284-.207-.593-.362z"/></svg>
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="font-serif-editorial text-lg font-semibold text-cream mb-4">Navigation</h4>
                <ul class="space-y-2.5 text-sm text-cream/70">
                    <li><a href="{{ route('home') }}" class="hover:text-cream transition-colors">Home</a></li>
                    <li><a href="{{ route('treatments.index') }}" class="hover:text-cream transition-colors">All Treatments</a></li>
                    <li><a href="{{ route('conditions.index') }}" class="hover:text-cream transition-colors">Conditions We Help</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-cream transition-colors">About Our Clinic</a></li>
                    <li><a href="{{ route('offers') }}" class="hover:text-cream transition-colors">Special Offers</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-cream transition-colors">Contact & Directions</a></li>
                </ul>
            </div>

            {{-- Conditions Shortcuts --}}
            <div>
                <h4 class="font-serif-editorial text-lg font-semibold text-cream mb-4">Common Problems</h4>
                <ul class="space-y-2.5 text-sm text-cream/70">
                    <li><a href="{{ route('conditions.show', 'back-pain') }}" class="hover:text-cream transition-colors">Lower Back Pain</a></li>
                    <li><a href="{{ route('conditions.show', 'knee-pain') }}" class="hover:text-cream transition-colors">Knee Stiffness & Tendonitis</a></li>
                    <li><a href="{{ route('conditions.show', 'neck-pain') }}" class="hover:text-cream transition-colors">Neck Pain & Headaches</a></li>
                    <li><a href="{{ route('conditions.show', 'sciatica') }}" class="hover:text-cream transition-colors">Sciatica Nerve Relief</a></li>
                    <li><a href="{{ route('conditions.show', 'shoulder-pain') }}" class="hover:text-cream transition-colors">Shoulder Impingement</a></li>
                </ul>
            </div>

            {{-- Clinic Location & Contact --}}
            <div>
                <h4 class="font-serif-editorial text-lg font-semibold text-cream mb-4">Clinic Location</h4>
                <div class="text-sm text-cream/75 space-y-3 mb-5">
                    {{-- Address with Location Icon --}}
                    <div class="flex items-start space-x-2.5">
                        <svg class="w-5 h-5 text-sage shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span class="leading-snug">Andhava House, Katra Fateh Mahmood Khan, Etawah, Uttar Pradesh, 206128</span>
                    </div>

                    {{-- Phone with Phone Icon --}}
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-sage shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        <a href="tel:+919058764970" class="hover:text-cream transition-colors font-medium">
                            +91 9058764970
                        </a>
                    </div>

                    {{-- Email with Mail Icon (Just Below Phone) --}}
                    <div class="flex items-center space-x-3">
                        <svg class="w-5 h-5 text-sage shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <a href="mailto:info@coremovephysio.com" class="hover:text-cream transition-colors font-medium">
                            info@coremovephysio.com
                        </a>
                    </div>
                </div>

                {{-- <button class="open-lead-modal text-xs font-semibold bg-terracotta text-white px-4 py-2.5 rounded-lg hover:bg-terracotta-hover transition-colors shadow-soft">
                    Tell Us What's Bothering You
                </button> --}}
            </div>

        </div>

        {{-- Legal Disclaimer & Copyright --}}
        <div class="pt-8 flex flex-col md:flex-row items-center justify-between text-xs text-cream/50 gap-4">
            <p>© {{ date('Y') }} CoreMove Physiotherapy & Rehabilitation. All rights reserved.</p>
            <p class="text-center md:text-right max-w-xl">
                Educational content isn’t medical advice, consult a doctor or physiotherapist.
            </p>
        </div>
    </div>
</footer>

