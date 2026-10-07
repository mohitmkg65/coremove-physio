@extends('layouts.app')

@section('title', 'Special Assessment Packages & Clinic Offers | CoreMove Physio')
@section('meta_description', 'Discover current physiotherapy evaluation offers and special packages at CoreMove Physiotherapy Clinic.')

@section('content')

<section class="bg-cream pt-16 pb-20 border-b border-beige">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-4">
        <span class="text-xs font-bold uppercase tracking-widest text-sage">Special Clinic Programs</span>
        <h1 class="font-serif-editorial text-4xl sm:text-5xl font-bold text-dark-green">
            A Better Time to Start Caring For Yourself
        </h1>
        <p class="text-base text-charcoal-muted leading-relaxed max-w-2xl mx-auto">
            We periodically offer special assessment packages to help new patients take the first step toward understanding their physical health.
        </p>
    </div>
</section>

<section class="py-16 md:py-24 bg-ivory/40">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        
        @forelse($offers as $offer)
            <div class="bg-white rounded-3xl p-8 sm:p-12 border border-beige shadow-soft space-y-6">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <span class="px-3.5 py-1.5 bg-terracotta/10 text-terracotta text-xs font-bold rounded-full">
                        {{ $offer->offer_type }}
                    </span>
                    @if($offer->end_date)
                        <span class="text-xs font-semibold text-sage">Valid until {{ $offer->end_date->format('M d, Y') }}</span>
                    @endif
                </div>

                @if($offer->banner_url)
                    <div class="rounded-2xl overflow-hidden shadow-sm border border-beige">
                        <img src="{{ asset($offer->banner_url) }}" alt="{{ $offer->title }}" class="w-full h-48 sm:h-64 object-cover">
                    </div>
                @endif

                <h2 class="font-serif-editorial text-3xl font-bold text-dark-green">{{ $offer->title }}</h2>
                <p class="text-xs text-charcoal-muted leading-relaxed">{{ $offer->description }}</p>

                @if($offer->value)
                    <div class="p-4 bg-sage-light/40 rounded-2xl border border-sage/30 text-xs font-semibold text-dark-green">
                        🎉 {{ $offer->value }}
                    </div>
                @endif

                @if($offer->terms)
                    <p class="text-[11px] text-charcoal-muted font-normal">Terms: {{ $offer->terms }}</p>
                @endif

                <div>
                    <button class="open-lead-modal bg-terracotta hover:bg-terracotta-hover text-white text-xs font-semibold px-8 py-3.5 rounded-full shadow-soft transition-all">
                        {{ $offer->cta_text }}
                    </button>
                </div>
            </div>
        @empty
            <div class="text-center py-16 text-charcoal-muted text-sm">
                No active promotional packages at this time. Please check back soon or call our clinic directly!
            </div>
        @endforelse

    </div>
</section>

@endsection
