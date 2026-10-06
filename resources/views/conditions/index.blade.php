@extends('layouts.app')

@section('title', 'Condition Finder & Patient Pain Guide | CoreMove Physio')
@section('meta_description', 'Understand your physical symptoms and discover how targeted 1-on-1 physiotherapy helps relieve back pain, knee pain, neck tension, sciatica, and sports injuries.')

@section('content')

{{-- Header --}}
<section class="bg-cream pt-16 pb-20 border-b border-beige">
    <div class="max-w-4xl mx-auto px-4 text-center space-y-4">
        <span class="text-xs font-bold uppercase tracking-widest text-sage">Patient Education</span>
        <h1 class="font-serif-editorial text-4xl sm:text-5xl font-bold text-dark-green">
            Understand What Is Holding You Back
        </h1>
        <p class="text-base text-charcoal-muted leading-relaxed max-w-2xl mx-auto">
            Select a condition below to explore common causes, symptoms, and our evidence-informed clinical approach to lasting relief.
        </p>
    </div>
</section>

{{-- Conditions Grid --}}
<section class="py-16 md:py-24 bg-ivory/40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($conditions as $cond)
                <div class="bg-white rounded-3xl p-8 border border-beige shadow-sm hover:shadow-soft transition-all flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <div class="w-full h-44 rounded-2xl overflow-hidden border border-beige">
                            <img src="{{ asset($cond->image_url ?? '/images/manual-care.jpg') }}" alt="{{ $cond->title }}" class="w-full h-full object-cover">
                        </div>

                        <h2 class="font-serif-editorial text-2xl font-bold text-dark-green">{{ $cond->title }}</h2>
                        
                        <p class="text-xs text-charcoal-muted leading-relaxed line-clamp-3">{{ $cond->short_summary }}</p>
                    </div>

                    <div class="pt-4 border-t border-beige flex items-center justify-between">
                        <a href="{{ route('conditions.show', $cond->slug) }}" class="text-xs font-bold text-dark-green hover:text-terracotta transition-colors flex items-center gap-1">
                            Read Pain Guide →
                        </a>
                        <button class="open-lead-modal text-[11px] font-semibold bg-sage-light text-dark-green px-3 py-1.5 rounded-full hover:bg-sage/30 transition-colors" data-condition="{{ $cond->title }}">
                            Get Help
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

@endsection
