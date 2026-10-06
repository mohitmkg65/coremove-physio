<footer class="bg-dark-green text-cream pt-16 pb-24 md:pb-12 border-t border-forest">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-10 pb-12 border-b border-forest/60">
            
            {{-- Brand Column --}}
            <div class="lg:col-span-2 space-y-4">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-xl bg-cream text-dark-green flex items-center justify-center font-serif-editorial font-bold text-xl">C</div>
                    <span class="font-serif-editorial text-2xl font-bold text-cream">CoreMove</span>
                </div>
                <p class="text-sm text-cream/70 leading-relaxed max-w-sm">
                    Evidence-informed physiotherapy built around your individual body and lifestyle. We help you move freely, understand your pain, and regain total physical confidence.
                </p>
                {{-- <div class="pt-2 flex items-center space-x-4 text-xs text-sage">
                    <span class="inline-flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span> Open Today</span>
                    <span>•</span>
                    <span>1-on-1 Dedicated Sessions</span>
                </div> --}}
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

            {{-- Clinic Hours & Contact --}}
            <div>
                <h4 class="font-serif-editorial text-lg font-semibold text-cream mb-4">Clinic Location</h4>
                <address class="not-italic text-sm text-cream/70 space-y-2 mb-4">
                    <p>Andhava House, Katra Fateh Mahmood Khan, Etawah, Uttar Pradesh, 206128</p>
                    <a href="tel:+919058764970" class="pt-2 text-cream/70 hover:text-cream transition-colors">
                        <strong class="text-cream">Phone:</strong> 9058764970
                    </a>
                    {{-- <p><strong class="text-cream">Mon – Fri:</strong> 7:30 AM – 7:00 PM</p>
                    <p><strong class="text-cream">Saturday:</strong> 8:30 AM – 2:00 PM</p> --}}
                </address>
                <button class="open-lead-modal text-xs font-semibold bg-terracotta text-white px-4 py-2 rounded-lg hover:bg-terracotta-hover transition-colors">
                    Tell Us What's Bothering You
                </button>
            </div>

        </div>

        {{-- Legal Disclaimer & Copyright --}}
        <div class="pt-8 flex flex-col md:flex-row items-center justify-between text-xs text-cream/50 gap-4">
            <p>© {{ date('Y') }} CoreMove Physiotherapy & Rehabilitation. All rights reserved.</p>
            <p class="text-center md:text-right max-w-xl">
                Information provided on this website is for educational purposes and should not replace professional medical diagnosis. Consult a qualified physical therapist or doctor for personal care.
            </p>
        </div>
    </div>
</footer>
