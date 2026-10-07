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
            We periodically offer special assessment packages to help new patients take the first step toward understanding their physical health and living without pain.
        </p>
    </div>
</section>

<section class="py-16 md:py-24 bg-ivory/40">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-10">
        
        @forelse($offers as $offer)
            <div class="bg-white rounded-3xl overflow-hidden border border-beige shadow-soft hover:shadow-hover transition-all duration-300">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-0">
                    
                    @if($offer->banner_url)
                        <div class="lg:col-span-5 relative h-64 lg:h-auto overflow-hidden bg-beige">
                            <img src="{{ asset($offer->banner_url) }}" alt="{{ $offer->title }}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-dark-green/60 via-transparent to-transparent lg:hidden"></div>
                        </div>
                    @endif

                    <div class="{{ $offer->banner_url ? 'lg:col-span-7' : 'lg:col-span-12' }} p-8 sm:p-12 space-y-6 flex flex-col justify-between">
                        <div class="space-y-4">
                            <div class="flex flex-wrap items-center justify-between gap-3">
                                <span class="px-3.5 py-1 bg-terracotta/10 text-terracotta text-xs font-bold uppercase tracking-wider rounded-full">
                                    {{ $offer->offer_type }}
                                </span>
                                @if($offer->end_date)
                                    <span class="text-xs font-semibold text-sage">⌛ Valid until {{ $offer->end_date->format('M d, Y') }}</span>
                                @endif
                            </div>

                            <h2 class="font-serif-editorial text-3xl sm:text-4xl font-bold text-dark-green leading-tight">
                                {{ $offer->title }}
                            </h2>
                            
                            <p class="text-sm text-charcoal-muted leading-relaxed">
                                {{ $offer->description }}
                            </p>

                            @if($offer->value)
                                <div class="p-4 bg-sage-light/50 rounded-2xl border border-sage/30 text-xs font-semibold text-dark-green flex items-center gap-2">
                                    <span class="text-base">🎉</span>
                                    <span>{{ $offer->value }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="pt-4 border-t border-beige space-y-3">
                            <button class="open-lead-modal bg-terracotta hover:bg-terracotta-hover text-white text-xs font-bold px-8 py-4 rounded-full shadow-soft hover:shadow-hover transition-all duration-200">
                                {{ $offer->cta_text }} →
                            </button>

                            @if($offer->terms)
                                <p class="text-[11px] text-charcoal-muted font-normal block">* {{ $offer->terms }}</p>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        @empty
            <div class="bg-white rounded-3xl p-16 text-center text-charcoal-muted border border-beige shadow-sm space-y-3">
                <span class="text-3xl">🎁</span>
                <p class="text-base font-semibold text-dark-green">No active promotional packages at this moment.</p>
                <p class="text-xs text-charcoal-muted">Please call our clinic directly at <strong>+91 9058764970</strong> or check back soon!</p>
            </div>
        @endforelse

    </div>
</section>

@endsection
