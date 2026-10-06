@extends('layouts.admin')

@section('title', 'Overview Dashboard')

@section('content')

<div class="space-y-8">
    
    {{-- Metric Stat Widgets --}}
    <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-7 gap-4">
        
        <div class="bg-slate-950 p-5 rounded-2xl border border-slate-800 space-y-1">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Total Leads</span>
            <p class="text-3xl font-extrabold text-slate-100">{{ $totalLeads }}</p>
        </div>

        <div class="bg-slate-950 p-5 rounded-2xl border border-emerald-900/50 space-y-1">
            <span class="text-[11px] font-bold uppercase tracking-wider text-emerald-400">New Leads</span>
            <p class="text-3xl font-extrabold text-emerald-400">{{ $newLeads }}</p>
        </div>

        <div class="bg-slate-950 p-5 rounded-2xl border border-blue-900/50 space-y-1">
            <span class="text-[11px] font-bold uppercase tracking-wider text-blue-400">Contacted</span>
            <p class="text-3xl font-extrabold text-blue-400">{{ $contactedLeads }}</p>
        </div>

        <div class="bg-slate-950 p-5 rounded-2xl border border-amber-900/50 space-y-1">
            <span class="text-[11px] font-bold uppercase tracking-wider text-amber-400">Converted</span>
            <p class="text-3xl font-extrabold text-amber-400">{{ $convertedLeads }}</p>
        </div>

        <div class="bg-slate-950 p-5 rounded-2xl border border-slate-800 space-y-1">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400">Today Enquiries</span>
            <p class="text-3xl font-extrabold text-slate-100">{{ $todayEnquiries }}</p>
        </div>

        <div class="bg-slate-950 p-5 rounded-2xl border border-purple-900/50 space-y-1">
            <span class="text-[11px] font-bold uppercase tracking-wider text-purple-400">Active Offers</span>
            <p class="text-3xl font-extrabold text-purple-400">{{ $activeOffersCount }}</p>
        </div>

        <div class="bg-slate-950 p-5 rounded-2xl border border-teal-900/50 space-y-1">
            <span class="text-[11px] font-bold uppercase tracking-wider text-teal-400">Appointments</span>
            <p class="text-3xl font-extrabold text-teal-400">{{ $upcomingAppointmentsCount }}</p>
        </div>

    </div>

    {{-- Recent Leads Table --}}
    <div class="bg-slate-950 rounded-2xl border border-slate-800 overflow-hidden">
        <div class="p-6 border-b border-slate-800 flex items-center justify-between">
            <div>
                <h3 class="font-bold text-lg text-slate-100">Recent Patient Leads</h3>
                <p class="text-xs text-slate-400">Multi-step assessment intakes from public website</p>
            </div>
            <a href="{{ route('admin.leads.index') }}" class="text-xs font-semibold text-emerald-400 hover:text-emerald-300">
                View All Leads →
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-900 text-slate-400 uppercase tracking-wider font-semibold border-b border-slate-800">
                    <tr>
                        <th class="p-4">Patient Name</th>
                        <th class="p-4">Phone</th>
                        <th class="p-4">Condition</th>
                        <th class="p-4">Duration</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Source / Campaign</th>
                        <th class="p-4">Date</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60 text-slate-300">
                    @forelse($recentLeads as $lead)
                        <tr class="hover:bg-slate-900/50 transition-colors">
                            <td class="p-4 font-bold text-slate-100">{{ $lead->name }}</td>
                            <td class="p-4 font-mono text-slate-300">{{ $lead->phone }}</td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-semibold bg-slate-800 text-slate-200">
                                    {{ $lead->condition ?? 'General' }}
                                </span>
                            </td>
                            <td class="p-4 text-slate-400">{{ $lead->duration ?? '-' }}</td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase
                                    @if($lead->status === 'New') bg-emerald-950 text-emerald-400 border border-emerald-800
                                    @elseif($lead->status === 'Contacted') bg-blue-950 text-blue-400 border border-blue-800
                                    @elseif($lead->status === 'Converted') bg-amber-950 text-amber-400 border border-amber-800
                                    @else bg-slate-800 text-slate-300 @endif">
                                    {{ $lead->status }}
                                </span>
                            </td>
                            <td class="p-4 text-slate-400 text-[11px]">
                                {{ $lead->utm_source ? $lead->utm_source . ' / ' . ($lead->utm_campaign ?? 'direct') : $lead->source }}
                            </td>
                            <td class="p-4 text-slate-400">{{ $lead->created_at->format('M d, H:i') }}</td>
                            <td class="p-4 text-right">
                                <a href="{{ route('admin.leads.show', $lead->id) }}" class="px-3 py-1.5 rounded-lg bg-emerald-500/10 text-emerald-400 hover:bg-emerald-500/20 font-semibold transition-colors">
                                    View Lead →
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="p-6 text-center text-slate-500">No leads recorded yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Grid for Recent Enquiries & Appointments --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        {{-- Enquiries --}}
        <div class="bg-slate-950 rounded-2xl border border-slate-800 p-6 space-y-4">
            <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                <h3 class="font-bold text-slate-100">Recent Contact Enquiries</h3>
                <a href="{{ route('admin.enquiries.index') }}" class="text-xs text-emerald-400 hover:underline">View All</a>
            </div>

            <div class="space-y-3">
                @forelse($recentEnquiries as $enq)
                    <div class="p-4 rounded-xl bg-slate-900 border border-slate-800 text-xs space-y-1">
                        <div class="flex items-center justify-between font-bold text-slate-200">
                            <span>{{ $enq->name }} ({{ $enq->phone }})</span>
                            <span class="text-[10px] px-2 py-0.5 rounded bg-slate-800 text-slate-400">{{ $enq->status }}</span>
                        </div>
                        <p class="text-slate-400 italic">"{{ Str::limit($enq->message, 90) }}"</p>
                    </div>
                @empty
                    <p class="text-xs text-slate-500">No contact enquiries yet.</p>
                @endforelse
            </div>
        </div>

        {{-- Appointments --}}
        <div class="bg-slate-950 rounded-2xl border border-slate-800 p-6 space-y-4">
            <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                <h3 class="font-bold text-slate-100">Recent Appointment Requests</h3>
                <a href="{{ route('admin.appointments.index') }}" class="text-xs text-emerald-400 hover:underline">View All</a>
            </div>

            <div class="space-y-3">
                @forelse($recentAppointments as $appt)
                    <div class="p-4 rounded-xl bg-slate-900 border border-slate-800 text-xs space-y-1">
                        <div class="flex items-center justify-between font-bold text-slate-200">
                            <span>{{ $appt->name }}</span>
                            <span class="text-[10px] px-2 py-0.5 rounded bg-teal-950 text-teal-400 border border-teal-800">{{ $appt->status }}</span>
                        </div>
                        <p class="text-slate-400">Phone: {{ $appt->phone }} | Date: {{ $appt->preferred_date ? $appt->preferred_date->format('M d, Y') : 'Flex' }}</p>
                    </div>
                @empty
                    <p class="text-xs text-slate-500">No appointment requests yet.</p>
                @endforelse
            </div>
        </div>

    </div>

</div>

@endsection
