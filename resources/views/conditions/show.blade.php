@extends('layouts.app')

@section('title', $condition->title . ' | CoreMove Physiotherapy Guide')
@section('meta_description', Str::limit($condition->short_summary, 155))

@section('extra_schema')
@if(!empty($condition->faqs))
<script type="application/ld+json">
{
  "{{ '@context' }}": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    @foreach($condition->faqs as $faq)
    {
      "@type": "Question",
      "name": "{{ $faq['q'] }}",
      "acceptedAnswer": {
        "@type": "Answer",
        "text": "{{ $faq['a'] }}"
      }
    }{{ $loop->last ? '' : ',' }}
    @endforeach
  ]
}
</script>
@endif
@endsection


@section('content')

{{-- Hero Section --}}
<section class="bg-cream pt-14 pb-20 border-b border-beige">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-4">
        <a href="{{ route('conditions.index') }}" class="inline-flex items-center text-xs font-semibold text-sage hover:text-dark-green transition-colors mb-2">
            ← Back to All Conditions
        </a>
        <h1 class="font-serif-editorial text-4xl sm:text-5xl font-bold text-dark-green leading-tight">
            {{ $condition->title }}
        </h1>
        <p class="text-base text-charcoal-muted leading-relaxed max-w-2xl mx-auto">
            {{ $condition->short_summary }}
        </p>
        <div class="pt-2">
            <button class="open-lead-modal bg-terracotta hover:bg-terracotta-hover text-white text-xs font-semibold px-7 py-3.5 rounded-full shadow-soft transition-all" data-condition="{{ $condition->title }}">
                Help Me Understand My Pain
            </button>
        </div>
    </div>
</section>

{{-- Content Grid --}}
<section class="py-16 md:py-24 bg-ivory/40">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        {{-- Image --}}
        <div class="rounded-3xl overflow-hidden shadow-soft border border-beige h-80 sm:h-96">
            <img src="{{ asset($condition->image_url ?? '/images/manual-care.jpg') }}" alt="{{ $condition->title }}" class="w-full h-full object-cover">
        </div>

        {{-- Causes --}}
        @if($condition->causes)
        <div class="bg-white rounded-3xl p-8 border border-beige shadow-sm space-y-3">
            <span class="text-xs font-bold uppercase tracking-wider text-sage">Root Mechanisms</span>
            <h2 class="font-serif-editorial text-2xl font-bold text-dark-green">What May Be Causing The Problem?</h2>
            <p class="text-xs text-charcoal-muted leading-relaxed">{{ $condition->causes }}</p>
        </div>
        @endif

        {{-- Symptoms --}}
        @if($condition->symptoms)
        <div class="bg-white rounded-3xl p-8 border border-beige shadow-sm space-y-3">
            <span class="text-xs font-bold uppercase tracking-wider text-sage">Clinical Indications</span>
            <h2 class="font-serif-editorial text-2xl font-bold text-dark-green">Common Symptoms You May Experience</h2>
            <p class="text-xs text-charcoal-muted leading-relaxed">{{ $condition->symptoms }}</p>
        </div>
        @endif

        {{-- Therapy Approach --}}
        @if($condition->therapy_approach)
        <div class="bg-white rounded-3xl p-8 border border-beige shadow-sm space-y-3">
            <span class="text-xs font-bold uppercase tracking-wider text-sage">Targeted Care</span>
            <h2 class="font-serif-editorial text-2xl font-bold text-dark-green">How Physiotherapy Helps</h2>
            <p class="text-xs text-charcoal-muted leading-relaxed">{{ $condition->therapy_approach }}</p>
        </div>
        @endif

        {{-- When to Seek Care --}}
        @if($condition->when_to_seek_care)
        <div class="bg-sage-light/50 rounded-3xl p-8 border border-sage/30 space-y-3">
            <span class="text-xs font-bold uppercase tracking-wider text-dark-green">Clinical Advice</span>
            <h2 class="font-serif-editorial text-2xl font-bold text-dark-green">When Should You Seek Professional Care?</h2>
            <p class="text-xs text-charcoal-muted leading-relaxed">{{ $condition->when_to_seek_care }}</p>
        </div>
        @endif

        {{-- Condition FAQs --}}
        @if(!empty($condition->faqs))
        <div class="bg-white rounded-3xl p-8 border border-beige shadow-sm space-y-6">
            <h2 class="font-serif-editorial text-2xl font-bold text-dark-green">Questions Patients Ask About {{ $condition->title }}</h2>
            <div class="space-y-4">
                @foreach($condition->faqs as $faq)
                    <div class="p-4 rounded-xl bg-cream border border-beige space-y-1">
                        <h4 class="font-serif-editorial text-lg font-bold text-dark-green">Q: {{ $faq['q'] }}</h4>
                        <p class="text-xs text-charcoal-muted leading-relaxed">A: {{ $faq['a'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Final Lead Trigger --}}
        <div class="bg-gradient-to-br from-dark-green to-forest text-cream rounded-3xl p-8 text-center space-y-4 shadow-xl">
            <h3 class="font-serif-editorial text-3xl font-bold text-cream">Take the first step toward relief.</h3>
            <p class="text-xs text-cream/80 max-w-lg mx-auto">
                Tell us about your {{ strtolower($condition->title) }}. Our clinical team will reach out to help you explore your options.
            </p>
            <button class="open-lead-modal bg-terracotta hover:bg-terracotta-hover text-white text-xs font-semibold px-8 py-3.5 rounded-full transition-all" data-condition="{{ $condition->title }}">
                Tell Us What's Bothering You
            </button>
        </div>

    </div>
</section>

@endsection
