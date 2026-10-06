@extends('layouts.app')

@section('title', 'Why Us & Clinic Story | CoreMove Physiotherapy')
@section('meta_description', 'Learn about CoreMove Physiotherapy\'s patient-first philosophy, 1-on-1 care model, and experienced physiotherapy team.')

@section('content')

{{-- Hero --}}
<section class="bg-cream pt-16 pb-20 border-b border-beige">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-4">
        <span class="text-xs font-bold uppercase tracking-widest text-sage">Our Clinical Philosophy</span>
        <h1 class="font-serif-editorial text-4xl sm:text-5xl font-bold text-dark-green leading-tight">
            Because your recovery deserves more than a routine.
        </h1>
        <p class="text-base text-charcoal-muted leading-relaxed max-w-2xl mx-auto">
            We founded CoreMove to eliminate the rush, assembly-line care, and impersonal treatments that frustrate patients seeking real physical healing.
        </p>
    </div>
</section>

{{-- Philosophy Pillars --}}
<section class="py-16 md:py-24 bg-ivory/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            
            <div class="space-y-6">
                <span class="text-xs font-bold uppercase tracking-widest text-sage">The CoreMove Difference</span>
                <h2 class="font-serif-editorial text-3xl font-bold text-dark-green">100% Dedicated 1-on-1 Attention</h2>
                <p class="text-sm text-charcoal-muted leading-relaxed">
                    In traditional physical therapy clinics, therapists are often required to manage 3 to 4 patients simultaneously. At CoreMove, your therapist is with you for every single minute of your 60-minute session.
                </p>
                
                <ul class="space-y-3 text-xs text-dark-green font-medium">
                    <li class="flex items-center gap-2">✓ Thorough movement diagnostics without being rushed</li>
                    <li class="flex items-center gap-2">✓ Hands-on spinal & joint mobilizations tailored each visit</li>
                    <li class="flex items-center gap-2">✓ Clear patient education on why your discomfort occurs</li>
                    <li class="flex items-center gap-2">✓ Direct progression tracking to ensure continuous recovery</li>
                </ul>
            </div>

            <div class="rounded-3xl overflow-hidden shadow-hover border border-beige">
                <img src="{{ asset('images/hero-patient.jpg') }}" alt="Patient consultation session" class="w-full h-96 object-cover">
            </div>

        </div>
    </div>
</section>

{{-- Specialist Profile --}}
<section class="py-16 md:py-24 bg-cream">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl p-8 sm:p-12 border border-beige shadow-soft">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                <div class="md:col-span-4">
                    <img src="{{ asset('images/simran.jpeg') }}" alt="Dr. Simran Tripathi" class="w-full h-80 object-cover rounded-2xl">
                </div>
                <div class="md:col-span-8 space-y-4">
                    <span class="text-xs font-bold text-sage uppercase tracking-wider">Lead Physiotherapist</span>
                    <h3 class="font-serif-editorial text-3xl font-bold text-dark-green">Dr. Simran Tripathi, BPT</h3>
                    <p class="text-xs font-semibold text-charcoal-muted">Doctor of Physical Therapy • Board-Certified Orthopedic Specialist</p>
                    <p class="text-xs text-charcoal-muted leading-relaxed">
                        With over 5+ years of clinical experience specializing in spine health, sports rehabilitation, and joint restoration, Dr. Simran has helped over 1,20 individuals return to painless, active living.
                    </p>
                    <blockquote class="text-sm font-serif-editorial font-semibold italic text-dark-green border-l-2 border-terracotta pl-4 py-1">
                        "Real physical therapy isn't about giving you a generic sheet of exercises. It's about helping you understand how your body moves so you feel empowered and pain-free for the long term."
                    </blockquote>
                    <div class="pt-2">
                        <button class="open-lead-modal bg-terracotta hover:bg-terracotta-hover text-white text-xs font-semibold px-6 py-3 rounded-full transition-all">
                            Talk to Dr. Simran Tripathi
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
