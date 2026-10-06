{{-- Functional Appointment Booking Modal --}}
<div id="appointmentModal" class="hidden fixed inset-0 z-50 bg-charcoal/70 backdrop-blur-md flex items-center justify-center p-4 overflow-y-auto">
    <div class="relative w-full max-w-xl bg-cream rounded-3xl shadow-modal overflow-hidden animate-modal-pop border border-beige my-8">
        
        {{-- Header Bar --}}
        <div class="px-6 pt-6 pb-4 bg-white/60 border-b border-beige flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-lg bg-emerald-100 text-dark-green flex items-center justify-center font-bold text-sm">
                    📅
                </div>
                <div>
                    <h3 class="font-serif-editorial text-xl font-bold text-dark-green leading-tight">Book A Physiotherapy Session</h3>
                    <p class="text-xs text-charcoal-muted">Choose your preferred date, time & treatment service</p>
                </div>
            </div>
            <button class="close-appointment-modal p-2 rounded-full text-charcoal-muted hover:text-dark-green hover:bg-beige transition-colors" aria-label="Close modal">
                ✕
            </button>
        </div>

        {{-- Form Container --}}
        <div class="p-6 md:p-8">
            <form id="appointmentModalForm" class="space-y-4">
                <div id="appointmentModalStatus" class="hidden"></div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="modalApptName" class="block text-xs font-semibold text-charcoal uppercase tracking-wider mb-1">Your Full Name *</label>
                        <input type="text" id="modalApptName" required placeholder="e.g. David Miller" class="w-full px-4 py-3 rounded-xl border border-beige bg-white focus:outline-none focus:border-dark-green text-sm">
                    </div>

                    <div>
                        <label for="modalApptPhone" class="block text-xs font-semibold text-charcoal uppercase tracking-wider mb-1">Phone / WhatsApp Number *</label>
                        <input type="tel" id="modalApptPhone" required placeholder="e.g. (555) 019-2834" class="w-full px-4 py-3 rounded-xl border border-beige bg-white focus:outline-none focus:border-dark-green text-sm">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="modalApptEmail" class="block text-xs font-semibold text-charcoal uppercase tracking-wider mb-1">Email Address</label>
                        <input type="email" id="modalApptEmail" placeholder="e.g. david@example.com" class="w-full px-4 py-3 rounded-xl border border-beige bg-white focus:outline-none focus:border-dark-green text-sm">
                    </div>

                    <div>
                        <label for="modalApptService" class="block text-xs font-semibold text-charcoal uppercase tracking-wider mb-1">Treatment Service</label>
                        <select id="modalApptService" class="w-full px-4 py-3 rounded-xl border border-beige bg-white focus:outline-none focus:border-dark-green text-sm">
                            <option value="60-Min Comprehensive Assessment">60-Min Initial Assessment & Care Plan</option>
                            <option value="Orthopedic Physiotherapy">Orthopedic Physiotherapy</option>
                            <option value="Sports Rehabilitation">Sports Rehabilitation</option>
                            <option value="Pain Management Therapy">Pain Management Therapy</option>
                            <option value="Post-Surgical Rehabilitation">Post-Surgical Rehabilitation</option>
                            <option value="Joint & Mobility Therapy">Joint & Mobility Therapy</option>
                            <option value="Senior Mobility & Fall Prevention">Senior Mobility & Fall Prevention</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="modalApptDate" class="block text-xs font-semibold text-charcoal uppercase tracking-wider mb-1">Preferred Date *</label>
                        <input type="date" id="modalApptDate" required min="{{ date('Y-m-d') }}" value="{{ date('Y-m-d', strtotime('+1 day')) }}" class="w-full px-4 py-3 rounded-xl border border-beige bg-white focus:outline-none focus:border-dark-green text-sm">
                    </div>

                    <div>
                        <label for="modalApptTime" class="block text-xs font-semibold text-charcoal uppercase tracking-wider mb-1">Preferred Time Slot *</label>
                        <select id="modalApptTime" required class="w-full px-4 py-3 rounded-xl border border-beige bg-white focus:outline-none focus:border-dark-green text-sm">
                            <option value="Morning (7:30 AM - 12:00 PM)">Morning (7:30 AM - 12:00 PM)</option>
                            <option value="Afternoon (12:00 PM - 4:00 PM)" selected>Afternoon (12:00 PM - 4:00 PM)</option>
                            <option value="Evening (4:00 PM - 7:00 PM)">Evening (4:00 PM - 7:00 PM)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label for="modalApptMessage" class="block text-xs font-semibold text-charcoal uppercase tracking-wider mb-1">Notes or Symptoms (Optional)</label>
                    <textarea id="modalApptMessage" rows="2" placeholder="Tell us briefly about your symptoms or medical history..." class="w-full px-4 py-3 rounded-xl border border-beige bg-white focus:outline-none focus:border-dark-green text-sm"></textarea>
                </div>

                <p class="text-[11px] text-charcoal-muted leading-relaxed">
                    🔒 No upfront payment required. Our clinic coordinator will contact you within 2 hours during clinic hours to confirm your exact appointment time.
                </p>

                <div class="pt-3 flex items-center justify-between">
                    <button type="button" class="close-appointment-modal text-xs font-semibold text-charcoal-muted hover:text-dark-green">
                        Cancel
                    </button>
                    <button id="btnSubmitAppointment" type="submit" class="bg-dark-green hover:bg-forest text-white font-medium text-sm px-8 py-3.5 rounded-full shadow-soft transition-all">
                        Confirm Appointment Request
                    </button>
                </div>
            </form>

            {{-- SUCCESS STATE --}}
            <div id="appointmentSuccessState" class="hidden text-center py-6">
                <div class="w-16 h-16 rounded-full bg-emerald-100 text-dark-green mx-auto flex items-center justify-center font-bold text-2xl mb-4">
                    ✓
                </div>
                <h4 class="font-serif-editorial text-3xl font-bold text-dark-green mb-3">Appointment Requested!</h4>
                <p class="text-sm text-charcoal-muted max-w-md mx-auto leading-relaxed mb-6">
                    Thank you! We've received your appointment request. Our desk coordinator will reach out via call/WhatsApp to confirm your time slot.
                </p>
                <button type="button" class="close-appointment-modal bg-dark-green text-white text-xs font-semibold px-6 py-3 rounded-full hover:bg-forest transition-colors">
                    Back to Clinic Website
                </button>
            </div>
        </div>

    </div>
</div>
