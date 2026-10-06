@extends('layouts.app')

@section('title', 'CoreMove Physiotherapy & Rehabilitation | Move Better. Live Without Limits.')
@section('meta_description', "Pain shouldn't decide how you live your life. CoreMove provides personalized, 1-on-1 evidence-informed physiotherapy in a warm, compassionate clinic setting.")

@section('content')

{{-- 1. HERO SECTION --}}
<section class="relative bg-gradient-to-b from-cream via-cream-light to-ivory/60 pt-10 sm:pt-16 pb-16 sm:pb-24 overflow-hidden">
    
    {{-- Decorative Background Radial Glows --}}
    <div class="absolute top-0 right-1/4 w-96 h-96 bg-sage-light/40 rounded-full blur-3xl pointer-events-none -z-10"></div>
    <div class="absolute bottom-10 left-10 w-80 h-80 bg-terracotta/5 rounded-full blur-3xl pointer-events-none -z-10"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-8 items-center">
            
            {{-- Left Content Column --}}
            <div class="lg:col-span-7 space-y-6 text-left">
                
                {{-- Top Badge --}}
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/80 backdrop-blur-md text-dark-green text-xs font-semibold border border-beige shadow-sm">
                    <span class="flex h-2 w-2 relative">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                    <span class="tracking-wide uppercase text-[11px] font-bold text-sage">Premium 1-on-1 Care</span>
                    <span class="text-charcoal-muted/40">•</span>
                    <span class="text-charcoal-muted">Physiotherapy & Rehab</span>
                </div>

                {{-- Editorial Headline --}}
                <h1 class="font-serif-editorial text-4xl sm:text-5xl lg:text-6xl font-bold tracking-tight text-dark-green leading-[1.12]">
                    Pain shouldn't decide <br class="hidden sm:inline" />
                    <span class="relative inline-block text-terracotta italic">
                        how you live
                        <svg class="absolute -bottom-1.5 left-0 w-full h-3 text-terracotta/25" viewBox="0 0 100 20" preserveAspectRatio="none"><path d="M0 15 Q 50 0 100 15" stroke="currentColor" stroke-width="4" fill="none"/></svg>
                    </span> 
                    your life.
                </h1>

                {{-- Supporting Copy --}}
                <p class="text-base sm:text-lg text-charcoal-muted leading-relaxed max-w-2xl font-normal">
                    From everyday stiffness to sports injuries and post-surgery recovery, we help you understand the root cause of your pain — and create a treatment roadmap built around you.
                </p>

                {{-- Quick Pain Selector Chips --}}
                <div class="pt-1 space-y-2">
                    <p class="text-xs font-bold text-dark-green uppercase tracking-wider">Tap what's bothering you for quick guidance:</p>
                    <div class="flex flex-wrap items-center gap-2">
                        @foreach(['Back Pain', 'Knee Stiffness', 'Neck & Headaches', 'Shoulder Pain', 'Sports Injury'] as $chip)
                            <button type="button" class="open-lead-modal px-3.5 py-1.5 rounded-full bg-white hover:bg-dark-green hover:text-white text-xs font-medium text-charcoal border border-beige shadow-sm transition-all duration-200" data-condition="{{ $chip }}">
                                {{ $chip }} <span class="text-sage group-hover:text-white">→</span>
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- Primary CTAs & Microcopy --}}
                <div class="pt-3 space-y-4">
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3.5">
                        <button class="open-lead-modal bg-terracotta hover:bg-terracotta-hover text-white text-base font-semibold px-8 py-4 rounded-full shadow-hover transition-all duration-200 transform hover:-translate-y-0.5 text-center flex items-center justify-center gap-2 group">
                            <span>Understand My Problem</span>
                            <span class="group-hover:translate-x-1 transition-transform">→</span>
                        </button>

                        <button class="open-appointment-modal border-2 border-dark-green hover:bg-dark-green hover:text-white text-dark-green text-base font-semibold px-7 py-4 rounded-full transition-all text-center flex items-center justify-center gap-2 bg-white/90 shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>Book Appointment</span>
                        </button>
                    </div>
                    
                    <div class="flex flex-wrap items-center gap-y-2 gap-x-4 text-xs text-charcoal-muted pt-1">
                        {{-- <a href="tel:+15550192834" class="hover:text-dark-green font-semibold flex items-center gap-1.5">
                            📞 Call Clinic Desk: (555) 019-2834
                        </a> --}}
                        <span class="hidden sm:inline text-beige-dark">•</span>
                        <span class="flex items-center gap-1.5"><strong class="text-sage">✓</strong> 60-Min Initial Assessment</span>
                        <span class="hidden sm:inline text-beige-dark">•</span>
                        <span class="flex items-center gap-1.5"><strong class="text-sage">✓</strong> Dedicated 1-on-1 Sessions</span>
                    </div>
                </div>


                {{-- Social Trust Metrics --}}
                <div class="pt-5 border-t border-beige flex items-center gap-5">
                    <div class="flex -space-x-2 overflow-hidden">
                        <div class="inline-block h-10 w-10 rounded-full ring-2 ring-cream bg-sage text-white text-xs font-bold flex items-center justify-center shadow-sm">SJ</div>
                        <div class="inline-block h-10 w-10 rounded-full ring-2 ring-cream bg-terracotta text-white text-xs font-bold flex items-center justify-center shadow-sm">DM</div>
                        <div class="inline-block h-10 w-10 rounded-full ring-2 ring-cream bg-dark-green text-white text-xs font-bold flex items-center justify-center shadow-sm">ER</div>
                    </div>
                    <div>
                        <div class="flex items-center text-amber-500 text-xs font-bold gap-1">
                            <span>★★★★★</span>
                            <span class="text-dark-green font-bold text-xs ml-1 bg-amber-500/10 px-2 py-0.5 rounded-md">4.9 / 5.0 Rating</span>
                        </div>
                        <p class="text-xs text-charcoal-muted mt-0.5">Trusted by 1,20+ recovering patients in our community</p>
                    </div>
                </div>

            </div>

            {{-- Right Multi-Layered Photo Column --}}
            <div class="lg:col-span-5 relative mt-6 lg:mt-0">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    
                    {{-- Main Image Card --}}
                    <div class="relative rounded-3xl overflow-hidden shadow-hover border-2 border-white bg-white group">
                        <img src="{{ asset('images/hero-patient.jpg') }}" alt="Patient receiving attentive care at CoreMove Physiotherapy" class="w-full h-[380px] sm:h-[480px] object-cover object-center group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-dark-green/75 via-dark-green/10 to-transparent"></div>
                        
                        {{-- Live Availability Tag --}}
                        <div class="absolute top-4 right-4 glass-nav px-3.5 py-1.5 rounded-full text-xs font-bold text-dark-green shadow-sm flex items-center gap-2 border border-beige">
                            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                            Appointments Open Today
                        </div>

                        {{-- Card Bottom Caption --}}
                        <div class="absolute bottom-5 left-5 right-5 glass-dark p-4 rounded-2xl border border-white/20 text-white">
                            <p class="text-[11px] font-bold text-sage-light uppercase tracking-widest">Our Care Guarantee</p>
                            <p class="font-serif-editorial text-lg font-semibold mt-0.5 leading-snug">Every session is 100% private & dedicated to your body.</p>
                        </div>
                    </div>

                    {{-- Floating Glass Badge 1 (Bottom Left) --}}
                    {{-- <div class="hidden sm:flex absolute -bottom-6 -left-6 glass-card p-4 rounded-2xl shadow-modal items-center gap-3.5 border border-white/80 max-w-xs animate-fade-in">
                        <div class="w-11 h-11 rounded-xl bg-terracotta/15 text-terracotta flex items-center justify-center font-bold text-xl shrink-0">
                            ⭐
                        </div>
                        <div>
                            <p class="text-xs font-bold text-dark-green">"Back to running pain-free!"</p>
                            <p class="text-[11px] text-charcoal-muted leading-tight mt-0.5">— Sarah M. (Patellar Knee Rehab)</p>
                        </div>
                    </div> --}}

                    {{-- Floating Glass Badge 2 (Top Left) --}}
                    <div class="hidden lg:flex absolute top-12 -left-8 glass-card py-2.5 px-4 rounded-2xl shadow-soft items-center gap-2.5 border border-white/80">
                        <span class="text-base">🩺</span>
                        <span class="text-xs font-bold text-dark-green">5+ Yrs Clinical Expertise</span>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


{{-- 2. "WHAT'S BOTHERING YOU?" INTERACTIVE SECTION --}}
<section class="py-16 md:py-24 bg-ivory/60 border-y border-beige">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs font-bold uppercase tracking-widest text-sage">Interactive Guidance</span>
            <h2 class="font-serif-editorial text-3xl sm:text-4xl font-bold text-dark-green mt-2">What's bothering you?</h2>
            <p class="text-sm text-charcoal-muted mt-3">Select your discomfort below to understand common causes and how targeted care helps.</p>
        </div>

        @php
            $problems = [
                'back' => [
                    'label' => 'Back Pain',
                    'title' => 'Lower Back Pain & Lumbar Stiffness',
                    'copy' => 'Back pain can have many root causes — spinal disc strain, postural muscle fatigue, or piriformis nerve compression. Understanding the precise mechanism is the first step toward lasting relief without relying on temporary painkillers.',
                    'symptoms' => ['Stiffness when getting out of bed', 'Aching after sitting at a desk', 'Difficulty bending forward'],
                    'cta_condition' => 'Back Pain'
                ],
                'neck' => [
                    'label' => 'Neck Pain',
                    'title' => 'Neck Pain & Cervical Tension',
                    'copy' => 'Forward head posture from desk work and stress compresses cervical vertebrae, tightens upper traps, and triggers tension headaches. Restoring cervical mobility quickly relieves upper body pressure.',
                    'symptoms' => ['Stiffness when turning head', 'Tension headaches', 'Pain radiating into shoulders'],
                    'cta_condition' => 'Neck Pain'
                ],
                'knee' => [
                    'label' => 'Knee Pain',
                    'title' => 'Knee Pain & Patellar Tendonitis',
                    'copy' => 'Knee pain often develops due to poor tracking of the kneecap, weak glutes, or wear on cartilage. Re-aligning lower leg mechanics takes compressive strain off your joints.',
                    'symptoms' => ['Clicking or grinding when walking', 'Pain climbing stairs', 'Swelling after activity'],
                    'cta_condition' => 'Knee Pain'
                ],
                'shoulder' => [
                    'label' => 'Shoulder Pain',
                    'title' => 'Shoulder Impingement & Rotator Cuff',
                    'copy' => 'As the body\'s most mobile joint, the shoulder relies heavily on rotator cuff stability. Gentle manual decompression and re-balancing allow overhead movement without pain.',
                    'symptoms' => ['Pain when reaching overhead', 'Inability to sleep on side', 'Weakness lifting objects'],
                    'cta_condition' => 'Shoulder Pain'
                ],
                'sports' => [
                    'label' => 'Sports Injury',
                    'title' => 'Sports Injuries & Muscle Strains',
                    'copy' => 'Sudden muscle tears or joint sprains require structured stage-by-stage load re-introduction so tissues heal strong and prevent recurrent injuries.',
                    'symptoms' => ['Localized swelling or bruising', 'Joint feeling unstable', 'Sharp pain during movement'],
                    'cta_condition' => 'Sports Injury'
                ],
                'surgery' => [
                    'label' => 'Post-Surgery Recovery',
                    'title' => 'Post-Surgical Joint Rehabilitation',
                    'copy' => 'Following ACL, meniscus, hip, or knee replacement surgery, structured 1-on-1 rehabilitation safely restores scar tissue flexibility, muscle tone, and walk symmetry.',
                    'symptoms' => ['Post-op joint stiffness', 'Muscle atrophy around incision', 'Gait imbalance'],
                    'cta_condition' => 'Post-Surgery Rehab'
                ]
            ];
        @endphp

        {{-- Problem Tabs --}}
        <div class="flex flex-wrap items-center justify-center gap-2.5 mb-8">
            @foreach($problems as $key => $prob)
                <button type="button" class="problem-tab-btn px-5 py-3 rounded-full text-xs font-semibold border transition-all duration-200 {{ $loop->first ? 'active-tab bg-dark-green text-white border-dark-green shadow-soft' : 'bg-white text-charcoal border-beige hover:border-sage' }}" data-problem="{{ $key }}">
                    {{ $prob['label'] }}
                </button>
            @endforeach
        </div>

        {{-- Detail Cards Container --}}
        <div class="max-w-4xl mx-auto">
            @foreach($problems as $key => $prob)
                <div class="problem-detail-card bg-white rounded-3xl p-6 sm:p-10 border border-beige shadow-soft {{ $loop->first ? '' : 'hidden' }}" data-problem-card="{{ $key }}">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                        <div class="md:col-span-8 space-y-4">
                            <span class="text-xs font-bold uppercase tracking-wider text-sage">Understanding Your Discomfort</span>
                            <h3 class="font-serif-editorial text-2xl sm:text-3xl font-bold text-dark-green">{{ $prob['title'] }}</h3>
                            <p class="text-sm text-charcoal-muted leading-relaxed">{{ $prob['copy'] }}</p>
                            
                            <div class="pt-2">
                                <p class="text-xs font-bold text-dark-green uppercase tracking-wider mb-2">Common Signs You May Recognize:</p>
                                <ul class="space-y-1.5 text-xs text-charcoal-muted">
                                    @foreach($prob['symptoms'] as $sym)
                                        <li class="flex items-center gap-2">
                                            <span class="text-sage font-bold">✓</span> {{ $sym }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="md:col-span-4 bg-cream p-6 rounded-2xl border border-beige text-center space-y-4">
                            <p class="text-xs font-medium text-charcoal-muted">Ready to address this problem with expert guidance?</p>
                            <button class="open-lead-modal w-full bg-terracotta hover:bg-terracotta-hover text-white text-xs font-semibold py-3.5 px-4 rounded-full shadow-soft transition-all" data-condition="{{ $prob['cta_condition'] }}">
                                Help Me Understand My Pain
                            </button>
                            <p class="text-[11px] text-sage font-medium">Free 4-step assessment intake</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

{{-- 3. TRUST & EXPERTISE PILLARS --}}
<section class="py-16 md:py-24 bg-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-xs font-bold uppercase tracking-widest text-sage">Why Patients Trust Us</span>
            <h2 class="font-serif-editorial text-3xl sm:text-4xl font-bold text-dark-green mt-2">Care that starts with understanding.</h2>
            <p class="text-sm text-charcoal-muted mt-3">We refuse high-volume assembly line treatments. Every patient receives dedicated, compassionate focus.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-white p-8 rounded-3xl border border-beige shadow-sm hover:shadow-soft transition-all">
                <div class="w-12 h-12 rounded-2xl bg-sage-light text-dark-green flex items-center justify-center text-xl font-bold mb-6">🔍</div>
                <h3 class="font-serif-editorial text-xl font-bold text-dark-green mb-2">Individual Assessment</h3>
                <p class="text-xs text-charcoal-muted leading-relaxed">We take 60 minutes to thoroughly evaluate your movement, spinal alignment, and joint mechanics before starting treatment.</p>
            </div>

            <div class="bg-white p-8 rounded-3xl border border-beige shadow-sm hover:shadow-soft transition-all">
                <div class="w-12 h-12 rounded-2xl bg-sage-light text-dark-green flex items-center justify-center text-xl font-bold mb-6">🤝</div>
                <h3 class="font-serif-editorial text-xl font-bold text-dark-green mb-2">One-to-One Attention</h3>
                <p class="text-xs text-charcoal-muted leading-relaxed">Your therapist works exclusively with you for your entire session — no juggling multiple patients or leaving you on machines.</p>
            </div>

            <div class="bg-white p-8 rounded-3xl border border-beige shadow-sm hover:shadow-soft transition-all">
                <div class="w-12 h-12 rounded-2xl bg-sage-light text-dark-green flex items-center justify-center text-xl font-bold mb-6">🔬</div>
                <h3 class="font-serif-editorial text-xl font-bold text-dark-green mb-2">Evidence-Informed</h3>
                <p class="text-xs text-charcoal-muted leading-relaxed">Combining clinical research, gentle manual mobilization, and progressive exercise protocols tailored specifically to your body.</p>
            </div>

            <div class="bg-white p-8 rounded-3xl border border-beige shadow-sm hover:shadow-soft transition-all">
                <div class="w-12 h-12 rounded-2xl bg-sage-light text-dark-green flex items-center justify-center text-xl font-bold mb-6">🌿</div>
                <h3 class="font-serif-editorial text-xl font-bold text-dark-green mb-2">Modern Environment</h3>
                <p class="text-xs text-charcoal-muted leading-relaxed">Clean, calm, natural-light consultation suites designed to make your treatment experience peaceful and reassuring.</p>
            </div>
        </div>

    </div>
</section>

{{-- 4. SERVICES SECTION --}}
<section class="py-16 md:py-24 bg-ivory/50 border-t border-beige">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
            <div>
                <span class="text-xs font-bold uppercase tracking-widest text-sage">Comprehensive Treatments</span>
                <h2 class="font-serif-editorial text-3xl sm:text-4xl font-bold text-dark-green mt-2">Tailored treatments for lasting mobility.</h2>
            </div>
            <a href="{{ route('treatments.index') }}" class="mt-4 md:mt-0 text-xs font-bold text-dark-green hover:text-terracotta flex items-center gap-1.5 transition-colors">
                View All Treatments →
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($services as $service)
                <div class="bg-white rounded-3xl overflow-hidden border border-beige shadow-sm hover:shadow-hover transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <div class="relative h-48 overflow-hidden bg-beige">
                            <img src="{{ asset($service->image_url ?? '/images/manual-care.jpg') }}" alt="{{ $service->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-6 sm:p-8 space-y-3">
                            <h3 class="font-serif-editorial text-2xl font-bold text-dark-green">{{ $service->name }}</h3>
                            <p class="text-xs text-charcoal-muted leading-relaxed">{{ $service->short_description }}</p>
                            
                            @if($service->benefit)
                                <div class="pt-2 text-xs font-medium text-dark-green bg-sage-light/40 p-3 rounded-xl border border-sage/20">
                                    💡 <strong class="font-semibold">Key Benefit:</strong> {{ $service->benefit }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="px-6 pb-6 pt-2">
                        <a href="{{ route('treatments.index') }}" class="inline-flex items-center text-xs font-semibold text-terracotta hover:text-terracotta-hover transition-colors">
                            Explore This Treatment →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

{{-- 5. CONDITIONS WE HELP --}}
<section class="py-16 md:py-24 bg-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-xs font-bold uppercase tracking-widest text-sage">Conditions Directory</span>
            <h2 class="font-serif-editorial text-3xl sm:text-4xl font-bold text-dark-green mt-2">We help you move through what is holding you back.</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($conditions as $cond)
                <a href="{{ route('conditions.show', $cond->slug) }}" class="bg-white p-6 rounded-2xl border border-beige hover:border-dark-green shadow-sm hover:shadow-soft transition-all group flex flex-col justify-between">
                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <span class="text-xs font-bold text-sage uppercase tracking-wider">Condition Care</span>
                            <span class="text-dark-green group-hover:translate-x-1 transition-transform">→</span>
                        </div>
                        <h3 class="font-serif-editorial text-xl font-bold text-dark-green group-hover:text-terracotta transition-colors">{{ $cond->title }}</h3>
                        <p class="text-xs text-charcoal-muted leading-relaxed line-clamp-3">{{ $cond->short_summary }}</p>
                    </div>
                    <div class="pt-4 border-t border-beige/60 text-[11px] font-medium text-dark-green">
                        Read symptoms & treatment approach →
                    </div>
                </a>
            @endforeach
        </div>

    </div>
</section>

{{-- 6. "WHY US" & PHYSIOTHERAPIST SPOTLIGHT --}}
<section class="py-16 md:py-24 bg-dark-green text-cream relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-5 relative">
                <div class="rounded-3xl overflow-hidden border border-white/20 shadow-2xl">
                    <img src="{{ asset('images/simran.jpeg') }}" alt="Dr. Marcus Vance - Lead Physiotherapist" class="w-full h-[450px] object-cover object-top">
                </div>
            </div>

            <div class="lg:col-span-7 space-y-6">
                <span class="text-xs font-bold uppercase tracking-widest text-sage">Because Your Recovery Deserves More Than A Routine</span>
                
                <h2 class="font-serif-editorial text-3xl sm:text-4xl lg:text-5xl font-bold text-cream leading-tight">
                    "My goal is not just to help you feel better today, but to help you understand your body and move with confidence again."
                </h2>

                <p class="text-sm text-cream/80 leading-relaxed">
                    At CoreMove, we believe pain is a sign that your body is asking for understanding — not just a quick temporary patch. Every patient receives a comprehensive physical evaluation, clear explanations in plain English, and direct hands-on care from a senior therapist.
                </p>

                <div class="pt-4 grid grid-cols-2 sm:grid-cols-3 gap-4 border-t border-forest/80 text-xs">
                    <div>
                        <p class="font-bold text-cream text-lg font-serif-editorial">5+ Years</p>
                        <p class="text-cream/60">Clinical Experience</p>
                    </div>
                    <div>
                        <p class="font-bold text-cream text-lg font-serif-editorial">120+</p>
                        <p class="text-cream/60">Patients Restored</p>
                    </div>
                    <div>
                        <p class="font-bold text-cream text-lg font-serif-editorial">100%</p>
                        <p class="text-cream/60">1-on-1 Dedicated Time</p>
                    </div>
                </div>

                <div class="pt-2">
                    <button class="open-lead-modal bg-terracotta hover:bg-terracotta-hover text-white text-xs font-semibold px-6 py-3.5 rounded-full shadow-soft transition-all">
                        Talk to Dr. Simran Tripathi
                    </button>
                </div>
            </div>

        </div>

    </div>
</section>

{{-- 7. PATIENT TESTIMONIALS --}}
<section class="py-16 md:py-24 bg-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-xs font-bold uppercase tracking-widest text-sage">Real Recovery Stories</span>
            <h2 class="font-serif-editorial text-3xl sm:text-4xl font-bold text-dark-green mt-2">Trusted by people who wanted their active life back.</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($testimonials as $t)
                <div class="bg-white p-8 rounded-3xl border border-beige shadow-sm flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <div class="text-amber-500 text-sm font-bold">★★★★★</div>
                        <p class="font-serif-editorial text-lg text-dark-green leading-snug font-medium italic">
                            "{{ $t->review }}"
                        </p>
                    </div>

                    <div class="pt-4 border-t border-beige flex items-center justify-between">
                        <div>
                            <p class="text-sm font-bold text-dark-green">{{ $t->patient_name }}</p>
                            <p class="text-xs text-sage font-medium">{{ $t->condition }}</p>
                        </div>
                        <span class="text-xs bg-sage-light text-dark-green px-2.5 py-1 rounded-full font-semibold">Verified Patient</span>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

{{-- 8. CLINIC ENVIRONMENT GALLERY --}}
<section class="py-16 md:py-24 bg-ivory/40 border-t border-beige">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs font-bold uppercase tracking-widest text-sage">Our Environment</span>
            <h2 class="font-serif-editorial text-3xl sm:text-4xl font-bold text-dark-green mt-2">A clinic designed for comfort and focus.</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($gallery as $g)
                <div class="group relative rounded-2xl overflow-hidden border border-beige bg-white shadow-sm h-64">
                    <img src="{{ asset($g->image_url) }}" alt="{{ $g->alt_text ?? $g->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-dark-green/80 via-transparent to-transparent opacity-90"></div>
                    <div class="absolute bottom-4 left-4 right-4 text-white">
                        <p class="text-[10px] uppercase font-bold text-sage-light tracking-wider">{{ $g->category }}</p>
                        <p class="font-serif-editorial text-base font-semibold">{{ $g->title }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

{{-- 9. ACTIVE SPECIAL OFFER SECTION --}}
@if($activeOffer)
<section class="py-16 bg-cream">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-br from-dark-green to-forest text-cream rounded-3xl p-8 sm:p-12 shadow-2xl relative overflow-hidden border border-forest">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center relative z-10">
                
                <div class="md:col-span-8 space-y-4">
                    <div class="inline-flex items-center gap-2 px-3 py-1 bg-terracotta text-white text-xs font-bold rounded-full">
                        🎁 Limited Assessment Package
                    </div>
                    <h3 class="font-serif-editorial text-3xl sm:text-4xl font-bold text-cream">{{ $activeOffer->title }}</h3>
                    <p class="text-sm text-cream/80 leading-relaxed">{{ $activeOffer->description }}</p>
                    
                    @if($activeOffer->value)
                        <div class="text-sm font-semibold text-sage-light">
                            ✓ {{ $activeOffer->value }}
                        </div>
                    @endif
                </div>

                <div class="md:col-span-4 text-center sm:text-right">
                    <button class="open-lead-modal w-full sm:w-auto bg-terracotta hover:bg-terracotta-hover text-white font-semibold text-sm px-8 py-4 rounded-full shadow-soft transition-all">
                        {{ $activeOffer->cta_text }}
                    </button>
                    @if($activeOffer->terms)
                        <p class="text-[10px] text-cream/50 mt-2">{{ $activeOffer->terms }}</p>
                    @endif
                </div>

            </div>
        </div>
    </div>
</section>
@endif

{{-- 10. FAQ ACCORDION --}}
<section class="py-16 md:py-24 bg-ivory/60 border-t border-beige">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs font-bold uppercase tracking-widest text-sage">Questions Answered</span>
            <h2 class="font-serif-editorial text-3xl sm:text-4xl font-bold text-dark-green mt-2">Frequently Asked Questions</h2>
        </div>

        <div class="space-y-4">
            @foreach($faqs as $faq)
                <div class="faq-accordion-item bg-white rounded-2xl border border-beige overflow-hidden shadow-sm">
                    <button type="button" class="faq-accordion-header w-full text-left p-6 flex items-center justify-between text-dark-green font-serif-editorial text-xl font-bold hover:text-terracotta transition-colors">
                        <span>{{ $faq->question }}</span>
                        <span class="faq-icon text-2xl text-sage font-sans ml-4">+</span>
                    </button>
                    <div class="faq-accordion-body hidden px-6 pb-6 text-xs text-charcoal-muted leading-relaxed border-t border-beige/40 pt-4">
                        {{ $faq->answer }}
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

{{-- 11. FINAL EMOTIONAL CTA --}}
<section class="py-20 md:py-28 bg-cream border-t border-beige relative">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
        
        <span class="text-xs font-bold uppercase tracking-widest text-sage">Take The First Step Today</span>

        <h2 class="font-serif-editorial text-4xl sm:text-5xl font-bold text-dark-green leading-tight">
            You don't have to keep adjusting your life around pain.
        </h2>

        <p class="text-base text-charcoal-muted max-w-2xl mx-auto leading-relaxed">
            Whether you've been dealing with discomfort for days or months, understanding what's causing it is a good place to start.
        </p>

        <div class="pt-4 flex flex-col sm:flex-row items-center justify-center gap-4">
            <button class="open-lead-modal w-full sm:w-auto bg-terracotta hover:bg-terracotta-hover text-white text-base font-semibold px-9 py-4 rounded-full shadow-soft hover:shadow-hover transition-all">
                Let's Understand What's Going On
            </button>
            
            {{-- <a href="tel:+15550192834" class="w-full sm:w-auto border border-dark-green text-dark-green text-base font-semibold px-8 py-4 rounded-full hover:bg-dark-green hover:text-white transition-all text-center">
                Call the Clinic: (555) 019-2834
            </a> --}}
        </div>

    </div>
</section>

@endsection
