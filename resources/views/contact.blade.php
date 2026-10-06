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
                        <div>
                            <strong class="block text-dark-green text-sm">CoreMove Physiotherapy & Rehab</strong>
                            <p>142 Wellness Boulevard, Suite 300</p>
                            <p>Healthcare District, CA 90210</p>
                        </div>

                        <div class="pt-2 border-t border-beige">
                            <strong class="block text-dark-green mb-1">Direct Phone & WhatsApp</strong>
                            <p><a href="tel:+15550192834" class="text-terracotta font-semibold hover:underline">(555) 019-2834</a></p>
                            <p><a href="https://wa.me/15550192834" target="_blank" class="text-emerald-700 font-semibold hover:underline">WhatsApp Clinic Desk →</a></p>
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
                    <a href="tel:+15550192834" class="inline-block bg-dark-green text-white text-xs font-semibold px-6 py-3 rounded-full hover:bg-forest transition-colors">
                        Call (555) 019-2834
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
