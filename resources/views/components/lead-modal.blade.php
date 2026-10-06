{{-- 4-Step Interactive Lead Flow Modal --}}
<div id="leadModal" class="hidden fixed inset-0 z-50 bg-charcoal/70 backdrop-blur-md flex items-center justify-center p-4 overflow-y-auto">
    <div class="relative w-full max-w-xl bg-cream rounded-3xl shadow-modal overflow-hidden animate-modal-pop border border-beige my-8">
        
        {{-- Header Bar --}}
        <div class="px-6 pt-6 pb-4 bg-white/60 border-b border-beige flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-lg bg-sage/20 text-dark-green flex items-center justify-center font-bold text-sm">
                    ✦
                </div>
                <div>
                    <h3 class="font-serif-editorial text-xl font-bold text-dark-green leading-tight">Patient Assessment Guide</h3>
                    <p class="text-xs text-charcoal-muted">Understand your pain & explore personalized care</p>
                </div>
            </div>
            <button class="close-lead-modal p-2 rounded-full text-charcoal-muted hover:text-dark-green hover:bg-beige transition-colors" aria-label="Close modal">
                ✕
            </button>
        </div>

        {{-- Step Progress Indicator --}}
        <div class="modal-progress-container px-6 pt-4 bg-white/30">
            <div class="flex items-center justify-between text-xs font-semibold text-charcoal-muted mb-2">
                <span class="step-number-text">Step 1 of 4</span>
                <span class="text-sage">No obligation • Confidential</span>
            </div>
            <div class="w-full bg-beige h-1.5 rounded-full overflow-hidden">
                <div class="step-indicator-bar bg-terracotta h-full w-1/4 transition-all duration-300"></div>
            </div>
        </div>

        {{-- Modal Content Body --}}
        <div class="p-6 md:p-8">
            
            {{-- STEP 1: Condition Selection --}}
            <div class="lead-step" data-step="1">
                <h4 class="font-serif-editorial text-2xl font-bold text-dark-green mb-2">What's bothering you most right now?</h4>
                <p class="text-sm text-charcoal-muted mb-6">Select your primary concern so we can tailor our guidance to your specific situation.</p>
                
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 mb-6">
                    @php
                        $modalConditions = [
                            'Back Pain', 'Neck Pain', 'Knee Pain', 
                            'Shoulder Pain', 'Sciatica', 'Sports Injury', 
                            'Post-Surgery Rehab', 'Joint Stiffness', 'Difficulty Walking'
                        ];
                    @endphp
                    @foreach($modalConditions as $cond)
                        <button type="button" class="modal-condition-btn text-left p-3.5 rounded-2xl border border-beige bg-white text-charcoal hover:border-dark-green hover:bg-sage-light/30 transition-all text-xs font-medium shadow-sm flex items-center justify-between group" data-condition="{{ $cond }}">
                            <span>{{ $cond }}</span>
                            <span class="text-sage group-hover:text-dark-green opacity-60">→</span>
                        </button>
                    @endforeach
                </div>

                <div class="flex items-center justify-end">
                    <button id="btnNextStep1" type="button" disabled class="bg-terracotta disabled:opacity-40 disabled:cursor-not-allowed hover:bg-terracotta-hover text-white text-sm font-medium px-6 py-3 rounded-full transition-all">
                        Continue to Step 2 →
                    </button>
                </div>
            </div>

            {{-- STEP 2: Duration --}}
            <div class="lead-step hidden" data-step="2">
                <h4 class="font-serif-editorial text-2xl font-bold text-dark-green mb-2">How long have you been dealing with this?</h4>
                <p class="text-sm text-charcoal-muted mb-6">Duration helps us understand whether your condition is acute or long-standing.</p>

                <div class="space-y-3 mb-6">
                    @php
                        $durations = [
                            'A few days' => 'Acute onset or recent twist/strain',
                            'A few weeks' => 'Sub-acute, persistent discomfort',
                            'A few months' => 'Recurrent stiffness or flare-ups',
                            'More than 6 months' => 'Long-standing chronic issue requiring structured care'
                        ];
                    @endphp
                    @foreach($durations as $dur => $desc)
                        <button type="button" class="modal-duration-btn w-full text-left p-4 rounded-2xl border border-beige bg-white text-charcoal hover:border-dark-green hover:bg-sage-light/30 transition-all shadow-sm flex items-center justify-between" data-duration="{{ $dur }}">
                            <div>
                                <span class="block text-sm font-semibold text-dark-green">{{ $dur }}</span>
                                <span class="block text-xs text-charcoal-muted mt-0.5">{{ $desc }}</span>
                            </div>
                            <span class="text-sage font-bold">✓</span>
                        </button>
                    @endforeach
                </div>

                <div class="flex items-center justify-between">
                    <button type="button" class="btn-prev-step text-xs font-semibold text-charcoal-muted hover:text-dark-green">
                        ← Back
                    </button>
                    <button id="btnNextStep2" type="button" disabled class="bg-terracotta disabled:opacity-40 disabled:cursor-not-allowed hover:bg-terracotta-hover text-white text-sm font-medium px-6 py-3 rounded-full transition-all">
                        Continue to Step 3 →
                    </button>
                </div>
            </div>

            {{-- STEP 3: Impact on Life --}}
            <div class="lead-step hidden" data-step="3">
                <h4 class="font-serif-editorial text-2xl font-bold text-dark-green mb-2">How is this affecting your daily life?</h4>
                <p class="text-sm text-charcoal-muted mb-6">Select all that apply so we know what activities matter most to you.</p>

                <div class="grid grid-cols-2 gap-3 mb-6">
                    @php
                        $impacts = ['Walking & Mobility', 'Working & Desk Sitting', 'Sleeping Peacefully', 'Exercise & Sports', 'Daily Household Tasks'];
                    @endphp
                    @foreach($impacts as $imp)
                        <button type="button" class="modal-impact-btn text-left p-4 rounded-2xl border border-beige bg-white text-charcoal hover:border-dark-green hover:bg-sage-light/30 transition-all text-xs font-medium shadow-sm flex items-center justify-between" data-impact="{{ $imp }}">
                            <span>{{ $imp }}</span>
                            <span class="w-4 h-4 rounded-full border border-sage flex items-center justify-center text-[10px] text-dark-green font-bold">+</span>
                        </button>
                    @endforeach
                </div>

                <div class="flex items-center justify-between">
                    <button type="button" class="btn-prev-step text-xs font-semibold text-charcoal-muted hover:text-dark-green">
                        ← Back
                    </button>
                    <button id="btnNextStep3" type="button" disabled class="bg-terracotta disabled:opacity-40 disabled:cursor-not-allowed hover:bg-terracotta-hover text-white text-sm font-medium px-6 py-3 rounded-full transition-all">
                        Continue to Final Step →
                    </button>
                </div>
            </div>

            {{-- STEP 4: Patient Details Intake --}}
            <div class="lead-step hidden" data-step="4">
                <h4 class="font-serif-editorial text-2xl font-bold text-dark-green mb-2">Let's help you figure out your next step.</h4>
                <p class="text-sm text-charcoal-muted mb-6">Our senior clinical team will review your answers and reach out with honest guidance tailored to your problem.</p>

                <form id="leadForm" class="space-y-4">
                    <div>
                        <label for="leadName" class="block text-xs font-semibold text-charcoal uppercase tracking-wider mb-1">Your Full Name *</label>
                        <input type="text" id="leadName" required placeholder="e.g. Eleanor Vance" class="w-full px-4 py-3 rounded-xl border border-beige bg-white focus:outline-none focus:border-dark-green text-sm">
                    </div>

                    <div>
                        <label for="leadPhone" class="block text-xs font-semibold text-charcoal uppercase tracking-wider mb-1">Mobile / WhatsApp Number *</label>
                        <input type="tel" id="leadPhone" required placeholder="e.g. (555) 234-5678" class="w-full px-4 py-3 rounded-xl border border-beige bg-white focus:outline-none focus:border-dark-green text-sm">
                    </div>

                    <div>
                        <label for="leadEmail" class="block text-xs font-semibold text-charcoal uppercase tracking-wider mb-1">Email Address (Optional)</label>
                        <input type="email" id="leadEmail" placeholder="e.g. eleanor@example.com" class="w-full px-4 py-3 rounded-xl border border-beige bg-white focus:outline-none focus:border-dark-green text-sm">
                    </div>

                    <p class="text-[11px] text-charcoal-muted leading-relaxed">
                        🔒 Your privacy is respected. We never spam or sell your information. A therapist will review your problem and call or WhatsApp you within 24 hours.
                    </p>

                    <div class="pt-2 flex items-center justify-between">
                        <button type="button" class="btn-prev-step text-xs font-semibold text-charcoal-muted hover:text-dark-green">
                            ← Back
                        </button>
                        <button id="btnSubmitLead" type="submit" class="bg-terracotta hover:bg-terracotta-hover text-white font-medium text-sm px-8 py-3.5 rounded-full shadow-soft transition-all">
                            Help Me With My Problem
                        </button>
                    </div>
                </form>
            </div>

            {{-- SUCCESS STATE --}}
            <div id="leadSuccessState" class="hidden text-center py-8">
                <div class="w-16 h-16 rounded-full bg-sage-light text-dark-green mx-auto flex items-center justify-center font-bold text-2xl mb-4">
                    ✓
                </div>
                <h4 class="font-serif-editorial text-3xl font-bold text-dark-green mb-3">Thank you.</h4>
                <p class="text-sm text-charcoal-muted max-w-md mx-auto leading-relaxed mb-6">
                    We've received your details. Our clinical team will get in touch with you shortly to understand your situation and help you choose the right next step toward recovery.
                </p>
                <button type="button" class="close-lead-modal bg-dark-green text-white text-xs font-semibold px-6 py-3 rounded-full hover:bg-forest transition-colors">
                    Return to Clinic Website
                </button>
            </div>

        </div>

    </div>
</div>
