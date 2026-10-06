@extends('layouts.app')

@section('title', 'Specialized Physiotherapy Treatments | CoreMove Clinic')
@section('meta_description', 'Explore CoreMove\'s evidence-informed physical therapy treatments including orthopedic care, sports rehab, pain management, and post-surgical rehabilitation.')

@section('content')

{{-- Header --}}
<section class="bg-cream pt-16 pb-20 border-b border-beige">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-4">
        <span class="text-xs font-bold uppercase tracking-widest text-sage">Clinical Services</span>
        <h1 class="font-serif-editorial text-4xl sm:text-5xl font-bold text-dark-green">
            Evidence-Informed Physiotherapy Services
        </h1>
        <p class="text-base text-charcoal-muted leading-relaxed max-w-2xl mx-auto">
            Every service begins with a thorough 60-minute movement consultation to pinpoint the underlying cause of discomfort and design a custom treatment plan.
        </p>
    </div>
</section>

{{-- Services List --}}
<section class="py-16 md:py-24 bg-ivory/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        @foreach($services as $s)
            <div class="bg-white rounded-3xl p-8 sm:p-10 border border-beige shadow-sm hover:shadow-soft transition-all">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                    
                    <div class="md:col-span-4 rounded-2xl overflow-hidden h-64 border border-beige">
                        <img src="{{ asset($s->image_url ?? '/images/manual-care.jpg') }}" alt="{{ $s->name }}" class="w-full h-full object-cover">
                    </div>

                    <div class="md:col-span-8 space-y-4">
                        <div class="flex items-center gap-2">
                            <span class="px-3 py-1 bg-sage-light text-dark-green text-xs font-bold rounded-full">Core Treatment</span>
                        </div>
                        
                        <h2 class="font-serif-editorial text-3xl font-bold text-dark-green">{{ $s->name }}</h2>
                        
                        <p class="text-xs text-charcoal-muted leading-relaxed">{{ $s->full_description ?? $s->short_description }}</p>

                        @if($s->benefit)
                            <div class="p-3 bg-cream rounded-xl border border-beige text-xs font-semibold text-dark-green">
                                💡 Expected Result: {{ $s->benefit }}
                            </div>
                        @endif

                        <div class="pt-2 flex items-center gap-4">
                            <button class="open-lead-modal bg-terracotta hover:bg-terracotta-hover text-white text-xs font-semibold px-6 py-3 rounded-full transition-all">
                                Explore This Treatment
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach

    </div>
</section>

@endsection
