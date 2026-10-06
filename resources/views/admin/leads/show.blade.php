@extends('layouts.admin')

@section('title', 'Lead Detail #' . $lead->id)

@section('content')

<div class="space-y-8">
    
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.leads.index') }}" class="text-xs text-slate-400 hover:text-slate-200">
            ← Back to Leads Directory
        </a>
        <div class="flex items-center space-x-3">
            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $lead->phone) }}" class="px-4 py-2 rounded-xl bg-emerald-500 text-slate-950 font-bold text-xs hover:bg-emerald-400">
                📞 Call Patient
            </a>
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $lead->phone) }}?text=Hi%20{{ urlencode($lead->name) }},%20this%20is%20CoreMove%20Physiotherapy%20following%20up%20on%20your%20{{ urlencode($lead->condition ?? 'assessment') }}%20request." target="_blank" class="px-4 py-2 rounded-xl bg-emerald-950 text-emerald-400 border border-emerald-800 font-bold text-xs hover:bg-emerald-900">
                💬 WhatsApp Message
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        {{-- Patient Profile & Intake Details --}}
        <div class="lg:col-span-7 space-y-6">
            
            <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800 space-y-6">
                <div class="flex items-center justify-between pb-4 border-b border-slate-800">
                    <div>
                        <h2 class="text-2xl font-bold text-slate-100">{{ $lead->name }}</h2>
                        <p class="text-xs text-slate-400">Submitted on {{ $lead->created_at->format('M d, Y \a\t H:i A') }}</p>
                    </div>
                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase bg-emerald-950 text-emerald-400 border border-emerald-800">
                        {{ $lead->status }}
                    </span>
                </div>

                <div class="grid grid-cols-2 gap-4 text-xs">
                    <div>
                        <span class="text-slate-500 block uppercase font-mono">Mobile Number</span>
                        <span class="text-slate-100 font-mono text-sm font-bold">{{ $lead->phone }}</span>
                    </div>
                    <div>
                        <span class="text-slate-500 block uppercase font-mono">Email Address</span>
                        <span class="text-slate-100 text-sm font-medium">{{ $lead->email ?? 'Not provided' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-500 block uppercase font-mono">Primary Concern</span>
                        <span class="text-emerald-400 font-bold text-sm">{{ $lead->condition ?? 'General' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-500 block uppercase font-mono">Pain Duration</span>
                        <span class="text-slate-100 font-medium text-sm">{{ $lead->duration ?? 'Unspecified' }}</span>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-800">
                    <span class="text-xs font-bold text-slate-400 block mb-2">Impact On Daily Life Activities:</span>
                    <div class="flex flex-wrap gap-2">
                        @if(is_array($lead->impact))
                            @foreach($lead->impact as $imp)
                                <span class="px-3 py-1 bg-slate-900 border border-slate-700 text-slate-200 rounded-lg text-xs font-medium">
                                    ✓ {{ $imp }}
                                </span>
                            @endforeach
                        @else
                            <span class="text-xs text-slate-500">None specified</span>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Marketing Attribution Card --}}
            <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800 space-y-4">
                <h3 class="font-bold text-slate-100 text-sm flex items-center gap-2">
                    <span>📈</span> Marketing & Technical Lead Attribution
                </h3>

                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 text-xs font-mono">
                    <div>
                        <span class="text-slate-500 block">UTM Source</span>
                        <span class="text-slate-200">{{ $lead->utm_source ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-500 block">UTM Medium</span>
                        <span class="text-slate-200">{{ $lead->utm_medium ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-500 block">UTM Campaign</span>
                        <span class="text-slate-200">{{ $lead->utm_campaign ?? '-' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-500 block">Landing Page</span>
                        <span class="text-slate-200">{{ $lead->landing_page ?? '/' }}</span>
                    </div>
                    <div>
                        <span class="text-slate-500 block">Device / Browser</span>
                        <span class="text-slate-200">{{ $lead->device_type }} ({{ $lead->browser }})</span>
                    </div>
                    <div>
                        <span class="text-slate-500 block">IP Address</span>
                        <span class="text-slate-200">{{ $lead->ip_address ?? '127.0.0.1' }}</span>
                    </div>
                </div>
            </div>

        </div>

        {{-- Status Control & Lead Notes Timeline --}}
        <div class="lg:col-span-5 space-y-6">
            
            {{-- Status & Follow-Up Form --}}
            <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800 space-y-4">
                <h3 class="font-bold text-slate-100 text-sm">Update Lead Status</h3>

                <form action="{{ route('admin.leads.status', $lead->id) }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label for="status" class="block text-xs text-slate-400 mb-1">Lead Stage</label>
                        <select id="status" name="status" class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 text-slate-100 text-xs rounded-xl focus:outline-none focus:border-emerald-500">
                            @foreach(['New', 'Contacted', 'Interested', 'Appointment Scheduled', 'Visited', 'Converted', 'Not Interested'] as $st)
                                <option value="{{ $st }}" {{ $lead->status === $st ? 'selected' : '' }}>{{ $st }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="follow_up_date" class="block text-xs text-slate-400 mb-1">Next Follow-Up Date</label>
                        <input type="date" id="follow_up_date" name="follow_up_date" value="{{ $lead->follow_up_date ? $lead->follow_up_date->format('Y-m-d') : '' }}" class="w-full px-4 py-2.5 bg-slate-900 border border-slate-700 text-slate-100 text-xs rounded-xl focus:outline-none focus:border-emerald-500">
                    </div>

                    <button type="submit" class="w-full bg-emerald-500 text-slate-950 font-bold text-xs py-3 rounded-xl hover:bg-emerald-400 transition-colors">
                        Save Status & Date
                    </button>
                </form>
            </div>

            {{-- Notes Timeline --}}
            <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800 space-y-4">
                <h3 class="font-bold text-slate-100 text-sm">Clinical Follow-Up Notes</h3>

                <form action="{{ route('admin.leads.notes', $lead->id) }}" method="POST" class="space-y-3">
                    @csrf
                    <textarea name="note" required rows="3" placeholder="Add follow-up notes (e.g., Called patient, scheduled initial assessment for Thursday)..." class="w-full px-4 py-3 bg-slate-900 border border-slate-700 text-slate-100 text-xs rounded-xl focus:outline-none focus:border-emerald-500"></textarea>
                    <button type="submit" class="bg-slate-800 hover:bg-slate-700 text-slate-200 text-xs font-semibold px-4 py-2 rounded-xl">
                        Add Note
                    </button>
                </form>

                <div class="space-y-3 pt-4 border-t border-slate-800">
                    @forelse($lead->notes as $n)
                        <div class="p-3.5 bg-slate-900 rounded-xl border border-slate-800 text-xs space-y-1">
                            <div class="flex items-center justify-between text-slate-400 text-[11px]">
                                <span class="font-bold text-emerald-400">{{ $n->author_name }}</span>
                                <span>{{ $n->created_at->format('M d, H:i') }}</span>
                            </div>
                            <p class="text-slate-200 leading-relaxed">{{ $n->note }}</p>
                        </div>
                    @empty
                        <p class="text-xs text-slate-500">No notes recorded yet for this lead.</p>
                    @endforelse
                </div>
            </div>

        </div>

    </div>

</div>

@endsection
