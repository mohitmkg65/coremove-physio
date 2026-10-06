@extends('layouts.app')

@section('title', 'Contact CoreMove Physiotherapy | Schedule Your Assessment')
@section('meta_description', 'Get in touch with CoreMove Physiotherapy Clinic. Call (555) 019-2834, message us on WhatsApp, or send an enquiry.')

@section('content')

<section class="bg-cream pt-16 pb-20 border-b border-beige">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-4">
        <span class="text-xs font-bold uppercase tracking-widest text-sage">Get In Touch</span>
        <h1 class="font-serif-editorial text-4xl sm:text-5xl font-bold text-dark-green">
            We Are Here To Help You
        </h1>
        <p class="text-base text-charcoal-muted leading-relaxed max-w-2xl mx-auto">
            Have a question about a physical problem or want to inquire about a session? Contact our team today.
        </p>
    </div>
</section>

<section class="py-16 md:py-24 bg-ivory/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            {{-- Contact Information Column --}}
            <div class="lg:col-span-5 space-y-8">
                
                <div class="bg-white p-8 rounded-3xl border border-beige shadow-sm space-y-6">
                    <h3 class="font-serif-editorial text-2xl font-bold text-dark-green">Clinic Location</h3>
                    
                    <div class="space-y-4 text-xs text-charcoal-muted">
                        <div class="flex items-start space-x-3">
                            <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <div>
                                <strong class="block text-dark-green text-sm mb-0.5">CoreMove Physiotherapy & Rehab</strong>
                                <p class="text-charcoal leading-relaxed">Andhava House, Katra Fateh Mahmood Khan, Etawah, Uttar Pradesh, 206128</p>
                            </div>
                        </div>

                        <div class="pt-3 border-t border-beige space-y-2">
                            {{-- <strong class="block text-dark-green text-sm mb-1">Direct Phone & Email</strong> --}}
                            
                            <div class="flex items-center space-x-3">
                                <svg class="w-4 h-4 text-forest shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                <a href="tel:+919058764970" class="text-charcoal font-medium hover:underline text-sm">+91 9058764970</a>
                            </div>

                            <div class="flex items-center space-x-3">
                                <svg class="w-4 h-4 text-forest shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <a href="mailto:info@coremovephysio.com" class="text-charcoal font-medium hover:underline text-sm">info@coremovephysio.com</a>
                            </div>

                            <div class="flex items-center space-x-3">
                                <svg class="w-4 h-4 text-forest shrink-0" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.705 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-1.157 4.228 4.397-1.139zm12.189-7.237c-.309-.155-1.826-.901-2.109-1.004-.284-.103-.491-.155-.698.155-.207.31-.8 1.004-.981 1.211-.181.207-.362.233-.671.078-.309-.155-1.306-.481-2.487-1.534-.919-.82-1.539-1.834-1.719-2.144-.18-.31-.019-.478.135-.632.139-.139.309-.362.464-.543.155-.181.207-.31.31-.517.103-.207.052-.388-.026-.543-.078-.155-.698-1.681-.956-2.302-.251-.606-.506-.524-.698-.534-.181-.01-.388-.01-.595-.01-.207 0-.543.078-.827.388-.284.31-1.085 1.061-1.085 2.587 0 1.526 1.111 2.998 1.266 3.205.155.207 2.187 3.34 5.297 4.682.74.32 1.317.51 1.767.653.743.236 1.42.203 1.954.123.596-.089 1.826-.747 2.084-1.47.258-.723.258-1.343.181-1.47-.078-.127-.284-.207-.593-.362z"/>
                                </svg>
                                <a href="https://wa.me/919058764970?text=Hello%20CoreMove%20Physiotherapy%2C%20I%20would%20like%20to%20inquire%20about%20an%20appointment." target="_blank" rel="noopener noreferrer" class="text-charcoal font-medium hover:underline text-sm">WhatsApp Clinic Desk → </a>
                            </div>
                        </div>

                        <div class="pt-2 border-t border-beige">
                            <strong class="block text-dark-green mb-1">Clinic Operating Hours</strong>
                            <p>Monday – Friday: 7:30 AM – 7:00 PM</p>
                            <p>Saturday: 8:30 AM – 2:00 PM</p>
                            <p>Sunday: Closed for deep sanitization</p>
                        </div>
                    </div>
                </div>

                <div class="bg-sage-light/40 p-8 rounded-3xl border border-sage/30 space-y-3">
                    <h4 class="font-serif-editorial text-xl font-bold text-dark-green">Prefer To Call?</h4>
                    <p class="text-xs text-charcoal-muted leading-relaxed">
                        Our clinical desk staff are happy to answer your questions regarding appointment availability, insurance claims, or directions to our clinic.
                    </p>
                    <a href="tel:+919058764970" class="inline-block bg-dark-green text-white text-xs font-semibold px-6 py-3 rounded-full hover:bg-forest transition-colors">
                        Call +91 9058764970
                    </a>
                </div>

            </div>

            {{-- Contact Form Column --}}
            <div class="lg:col-span-7">
                <div class="bg-white p-8 sm:p-10 rounded-3xl border border-beige shadow-soft">
                    <h3 class="font-serif-editorial text-2xl font-bold text-dark-green mb-2">Send Us A Message</h3>
                    <p class="text-xs text-charcoal-muted mb-6">Fill out the form below and our clinic team will respond within 24 business hours.</p>

                    <form id="publicContactForm" class="space-y-4">
                        <div id="contactFormStatus" class="hidden"></div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label for="contactName" class="block text-xs font-semibold text-charcoal uppercase tracking-wider mb-1">Your Name *</label>
                                <input type="text" id="contactName" required placeholder="e.g. John Doe" class="w-full px-4 py-3 rounded-xl border border-beige bg-cream focus:outline-none focus:border-dark-green text-sm">
                            </div>
                            <div>
                                <label for="contactPhone" class="block text-xs font-semibold text-charcoal uppercase tracking-wider mb-1">Phone Number *</label>
                                <input type="tel" id="contactPhone" required placeholder="e.g. (555) 000-0000" class="w-full px-4 py-3 rounded-xl border border-beige bg-cream focus:outline-none focus:border-dark-green text-sm">
                            </div>
                        </div>

                        <div>
                            <label for="contactEmail" class="block text-xs font-semibold text-charcoal uppercase tracking-wider mb-1">Email Address</label>
                            <input type="email" id="contactEmail" placeholder="e.g. john@example.com" class="w-full px-4 py-3 rounded-xl border border-beige bg-cream focus:outline-none focus:border-dark-green text-sm">
                        </div>

                        <div>
                            <label for="contactSubject" class="block text-xs font-semibold text-charcoal uppercase tracking-wider mb-1">Subject / Condition</label>
                            <input type="text" id="contactSubject" placeholder="e.g. General assessment inquiry" class="w-full px-4 py-3 rounded-xl border border-beige bg-cream focus:outline-none focus:border-dark-green text-sm">
                        </div>

                        <div>
                            <label for="contactMessage" class="block text-xs font-semibold text-charcoal uppercase tracking-wider mb-1">What can we help you with? *</label>
                            <textarea id="contactMessage" required rows="4" placeholder="Briefly describe your symptoms or what you'd like to ask..." class="w-full px-4 py-3 rounded-xl border border-beige bg-cream focus:outline-none focus:border-dark-green text-sm"></textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="w-full sm:w-auto bg-terracotta hover:bg-terracotta-hover text-white text-sm font-semibold px-8 py-3.5 rounded-full shadow-soft transition-all">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
