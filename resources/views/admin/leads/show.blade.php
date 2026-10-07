@extends('layouts.admin')

@section('title', 'Lead Detail #' . $lead->id)

@section('content')

<div class="space-y-8">
    
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.leads.index') }}" class="text-xs font-semibold text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 flex items-center gap-2">
            ← Back to Leads Directory
        </a>
        <div class="flex items-center space-x-3">
            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $lead->phone) }}" class="px-4 py-2 rounded-xl bg-emerald-500 text-slate-950 font-bold text-xs hover:bg-emerald-400 shadow-sm transition-colors">
                📞 Call Patient
            </a>
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $lead->phone) }}?text=Hi%20{{ urlencode($lead->name) }},%20this%20is%20CoreMove%20Physiotherapy%20following%20up%20on%20your%20{{ urlencode($lead->condition ?? 'assessment') }}%20request." target="_blank" class="px-4 py-2 rounded-xl bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-400 border border-emerald-300 dark:border-emerald-800 font-bold text-xs hover:bg-emerald-200 dark:hover:bg-emerald-900 transition-colors">
                💬 WhatsApp Message
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        {{-- Patient Profile & Intake Details --}}
        <div class="lg:col-span-7 space-y-6">
            
            <div class="bg-white dark:bg-slate-950 p-6 sm:p-8 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-xs space-y-6">
                <div class="flex items-center justify-between pb-6 border-b border-slate-200 dark:border-slate-800">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 font-bold text-xl flex items-center justify-center">
                            {{ strtoupper(substr($lead->name, 0, 1)) }}
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-slate-900 dark:text-slate-100">{{ $lead->name }}</h2>
                            <p class="text-xs text-slate-500 dark:text-slate-400">Submitted on {{ $lead->created_at->format('M d, Y \a\t H:i A') }}</p>
                        </div>
                    </div>
                    <span class="px-3.5 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-400 border border-emerald-300 dark:border-emerald-800">
                        {{ $lead->status }}
                    </span>
                </div>

                <div class="grid grid-cols-2 gap-4 text-xs">
                    <div class="p-3.5 rounded-xl bg-slate-50 dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800">
                        <span class="text-slate-500 dark:text-slate-400 block uppercase font-mono mb-0.5">Mobile Number</span>
                        <span class="text-slate-900 dark:text-slate-100 font-mono text-sm font-bold">{{ $lead->phone }}</span>
                    </div>
                    <div class="p-3.5 rounded-xl bg-slate-50 dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800">
                        <span class="text-slate-500 dark:text-slate-400 block uppercase font-mono mb-0.5">Email Address</span>
                        <span class="text-slate-900 dark:text-slate-100 text-sm font-medium">{{ $lead->email ?? 'Not provided' }}</span>
                    </div>
                    <div class="p-3.5 rounded-xl bg-slate-50 dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800">
                        <span class="text-slate-500 dark:text-slate-400 block uppercase font-mono mb-0.5">Primary Concern</span>
                        <span class="text-emerald-600 dark:text-emerald-400 font-bold text-sm">{{ $lead->condition ?? 'General Intake' }}</span>
                    </div>
                    <div class="p-3.5 rounded-xl bg-slate-50 dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800">
                        <span class="text-slate-500 dark:text-slate-400 block uppercase font-mono mb-0.5">Pain Duration</span>
                        <span class="text-slate-900 dark:text-slate-100 font-medium text-sm">{{ $lead->duration ?? 'Unspecified' }}</span>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-200 dark:border-slate-800">
                    <span class="text-xs font-bold text-slate-500 dark:text-slate-400 block mb-2">Impact On Daily Life Activities:</span>
                    <div class="flex flex-wrap gap-2">
                        @if(is_array($lead->impact))
                            @foreach($lead->impact as $imp)
                                <span class="px-3 py-1 bg-slate-100 dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-slate-800 dark:text-slate-200 rounded-lg text-xs font-medium">
                                    ✓ {{ $imp }}
                                </span>
                            @endforeach
                        @else
                            <span class="text-xs text-slate-400">None specified</span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Marketing Attribution Card --}}
            <div class="bg-white dark:bg-slate-950 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-xs space-y-4">
                <h3 class="font-bold text-slate-900 dark:text-slate-100 text-sm flex items-center gap-2">
                    <span>📈</span> Marketing & Technical Lead Attribution
                </h3>

                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 text-xs font-mono">
                    <div>
                        <span class="text-slate-400 block">UTM Source</span>
                        <span class="text-slate-900 dark:text-slate-200 font-semibold">{{ $lead->utm_source ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block">UTM Medium</span>
                        <span class="text-slate-900 dark:text-slate-200 font-semibold">{{ $lead->utm_medium ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block">UTM Campaign</span>
                        <span class="text-slate-900 dark:text-slate-200 font-semibold">{{ $lead->utm_campaign ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block">Landing Page</span>
                        <span class="text-slate-900 dark:text-slate-200 font-semibold">{{ $lead->landing_page ?? '/' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block">Device / Browser</span>
                        <span class="text-slate-900 dark:text-slate-200 font-semibold">{{ $lead->device_type }} ({{ $lead->browser }})</span>
                    </div>
                    <div>
                        <span class="text-slate-400 block">IP Address</span>
                        <span class="text-slate-900 dark:text-slate-200 font-semibold">{{ $lead->ip_address ?? '127.0.0.1' }}</span>
                    </div>
                </div>
            </div>

        </div>

        {{-- Status Control & Lead Notes Timeline --}}
        <div class="lg:col-span-5 space-y-6">
            
            {{-- Status & Follow-Up Form --}}
            <div class="bg-white dark:bg-slate-950 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-xs space-y-4">
                <h3 class="font-bold text-slate-900 dark:text-slate-100 text-sm">Update Lead Status</h3>

                <form action="{{ route('admin.leads.status', $lead->id) }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label for="statusSelect" class="block text-xs text-slate-500 dark:text-slate-400 mb-1 font-semibold">Lead Stage</label>
                        <select id="statusSelect" name="status" onchange="toggleAppointmentFields(this.value)" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-900 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-xs rounded-xl focus:outline-none focus:border-emerald-500 font-medium">
                            @foreach(['New', 'Contacted', 'Interested', 'Appointment Scheduled', 'Visited', 'Converted', 'Not Interested'] as $st)
                                <option value="{{ $st }}" {{ $lead->status === $st ? 'selected' : '' }}>{{ $st }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Appointment Schedule Sync Fields (shown if status is Appointment Scheduled) --}}
                    <div id="appointmentFields" class="{{ $lead->status === 'Appointment Scheduled' ? '' : 'hidden' }} p-4 rounded-xl bg-purple-50 dark:bg-purple-950/40 border border-purple-200 dark:border-purple-800 space-y-3">
                        <span class="text-xs font-bold text-purple-700 dark:text-purple-300 block">📅 Appointment Schedule Sync</span>
                        
                        <div>
                            <label class="block text-[11px] text-purple-600 dark:text-purple-400 font-semibold mb-1">Appointment Date *</label>
                            <input type="date" name="appointment_date" value="{{ now()->today()->toDateString() }}" class="w-full px-3 py-2 bg-white dark:bg-slate-900 border border-purple-300 dark:border-purple-700 text-slate-900 dark:text-slate-100 text-xs rounded-lg">
                        </div>

                        <div>
                            <label class="block text-[11px] text-purple-600 dark:text-purple-400 font-semibold mb-1">Appointment Time Slot *</label>
                            <select name="appointment_time" class="w-full px-3 py-2 bg-white dark:bg-slate-900 border border-purple-300 dark:border-purple-700 text-slate-900 dark:text-slate-100 text-xs rounded-lg">
                                <option value="Morning (9 AM - 12 PM)">Morning (9 AM - 12 PM)</option>
                                <option value="Afternoon (12 PM - 4 PM)">Afternoon (12 PM - 4 PM)</option>
                                <option value="Evening (4 PM - 7 PM)">Evening (4 PM - 7 PM)</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="follow_up_date" class="block text-xs text-slate-500 dark:text-slate-400 mb-1 font-semibold">Next Follow-Up Date</label>
                        <input type="date" id="follow_up_date" name="follow_up_date" value="{{ $lead->follow_up_date ? $lead->follow_up_date->format('Y-m-d') : '' }}" class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-900 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-xs rounded-xl focus:outline-none focus:border-emerald-500 font-medium">
                    </div>

                    <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold text-xs py-3 rounded-xl shadow-xs transition-colors">
                        Save Status & Sync Schedule
                    </button>
                </form>
            </div>

            {{-- Notes Timeline --}}
            <div class="bg-white dark:bg-slate-950 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-xs space-y-4">
                <h3 class="font-bold text-slate-900 dark:text-slate-100 text-sm">Clinical Follow-Up Notes</h3>

                <form action="{{ route('admin.leads.notes', $lead->id) }}" method="POST" class="space-y-3">
                    @csrf
                    <textarea name="note" required rows="3" placeholder="Add follow-up notes (e.g., Called patient, scheduled initial assessment)..." class="w-full px-4 py-3 bg-slate-50 dark:bg-slate-900 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-xs rounded-xl focus:outline-none focus:border-emerald-500"></textarea>
                    <button type="submit" class="bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 text-slate-800 dark:text-slate-200 text-xs font-semibold px-4 py-2 rounded-xl border border-slate-200 dark:border-slate-700 transition-colors">
                        Add Note
                    </button>
                </form>

                <div class="space-y-3 pt-4 border-t border-slate-200 dark:border-slate-800">
                    @forelse($lead->notes as $n)
                        <div class="p-3.5 bg-slate-50 dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 text-xs space-y-1">
                            <div class="flex items-center justify-between text-slate-400 text-[11px]">
                                <span class="font-bold text-emerald-600 dark:text-emerald-400">{{ $n->author_name }}</span>
                                <span>{{ $n->created_at->format('M d, H:i') }}</span>
                            </div>
                            <p class="text-slate-800 dark:text-slate-200 leading-relaxed">{{ $n->note }}</p>
                        </div>
                    @empty
                        <p class="text-xs text-slate-400">No notes recorded yet for this lead.</p>
                    @endforelse
                </div>
            </div>

        </div>

    </div>

</div>

<script>
    function toggleAppointmentFields(val) {
        const fields = document.getElementById('appointmentFields');
        if (val === 'Appointment Scheduled') {
            fields.classList.remove('hidden');
        } else {
            fields.classList.add('hidden');
        }
    }
</script>

@endsection
