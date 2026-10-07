@extends('layouts.admin')

@section('title', 'Overview Dashboard')

@section('content')

<div class="space-y-8">
    
    {{-- Metric Stat Widgets --}}
    <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-7 gap-4">
        
        <div class="bg-white dark:bg-slate-950 p-5 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-xs space-y-1">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Total Leads</span>
            <p class="text-3xl font-extrabold text-slate-900 dark:text-slate-100">{{ $totalLeads }}</p>
        </div>

        <div class="bg-white dark:bg-slate-950 p-5 rounded-2xl border border-emerald-200 dark:border-emerald-900/50 shadow-xs space-y-1">
            <span class="text-[11px] font-bold uppercase tracking-wider text-emerald-600 dark:text-emerald-400">New Leads</span>
            <p class="text-3xl font-extrabold text-emerald-600 dark:text-emerald-400">{{ $newLeads }}</p>
        </div>

        <div class="bg-white dark:bg-slate-950 p-5 rounded-2xl border border-blue-200 dark:border-blue-900/50 shadow-xs space-y-1">
            <span class="text-[11px] font-bold uppercase tracking-wider text-blue-600 dark:text-blue-400">Contacted</span>
            <p class="text-3xl font-extrabold text-blue-600 dark:text-blue-400">{{ $contactedLeads }}</p>
        </div>

        <div class="bg-white dark:bg-slate-950 p-5 rounded-2xl border border-amber-200 dark:border-amber-900/50 shadow-xs space-y-1">
            <span class="text-[11px] font-bold uppercase tracking-wider text-amber-600 dark:text-amber-400">Converted</span>
            <p class="text-3xl font-extrabold text-amber-600 dark:text-amber-400">{{ $convertedLeads }}</p>
        </div>

        <div class="bg-white dark:bg-slate-950 p-5 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-xs space-y-1">
            <span class="text-[11px] font-bold uppercase tracking-wider text-slate-500 dark:text-slate-400">Today Enquiries</span>
            <p class="text-3xl font-extrabold text-slate-900 dark:text-slate-100">{{ $todayEnquiries }}</p>
        </div>

        <div class="bg-white dark:bg-slate-950 p-5 rounded-2xl border border-purple-200 dark:border-purple-900/50 shadow-xs space-y-1">
            <span class="text-[11px] font-bold uppercase tracking-wider text-purple-600 dark:text-purple-400">Active Offers</span>
            <p class="text-3xl font-extrabold text-purple-600 dark:text-purple-400">{{ $activeOffersCount }}</p>
        </div>

        <div class="bg-white dark:bg-slate-950 p-5 rounded-2xl border border-teal-200 dark:border-teal-900/50 shadow-xs space-y-1">
            <span class="text-[11px] font-bold uppercase tracking-wider text-teal-600 dark:text-teal-400">Appointments</span>
            <p class="text-3xl font-extrabold text-teal-600 dark:text-teal-400">{{ $upcomingAppointmentsCount }}</p>
        </div>

    </div>

    {{-- Minimal Recent Leads Table --}}
    <div class="bg-white dark:bg-slate-950 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-xs overflow-hidden">
        <div class="p-6 border-b border-slate-200 dark:border-slate-800 flex items-center justify-between">
            <div>
                <h3 class="font-bold text-lg text-slate-900 dark:text-slate-100">Recent Patient Leads</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400">Multi-step assessment intakes from public website</p>
            </div>
            <a href="{{ route('admin.leads.index') }}" class="text-xs font-semibold text-emerald-600 dark:text-emerald-400 hover:underline">
                View All Leads →
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
                <thead class="bg-slate-50 dark:bg-slate-900 text-slate-500 dark:text-slate-400 uppercase tracking-wider font-semibold border-b border-slate-200 dark:border-slate-800">
                    <tr>
                        <th class="py-4 px-6">Patient</th>
                        <th class="py-4 px-6">Condition</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6">Date</th>
                        <th class="py-4 px-6 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/60 text-slate-700 dark:text-slate-300 font-medium">
                    @forelse($recentLeads as $lead)
                        <tr class="hover:bg-slate-50/80 dark:hover:bg-slate-900/50 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 rounded-full bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 font-bold text-xs flex items-center justify-center">
                                        {{ strtoupper(substr($lead->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <span class="font-bold text-slate-900 dark:text-slate-100 text-sm block">{{ $lead->name }}</span>
                                        <span class="font-mono text-slate-500 dark:text-slate-400 text-[11px] block">{{ $lead->phone }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-semibold bg-slate-100 dark:bg-slate-800 text-slate-800 dark:text-slate-200 border border-slate-200 dark:border-slate-700">
                                    {{ $lead->condition ?? 'General' }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider
                                    @if($lead->status === 'New') bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-400 border border-emerald-300 dark:border-emerald-800
                                    @elseif($lead->status === 'Contacted') bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-400 border border-blue-300 dark:border-blue-800
                                    @elseif($lead->status === 'Converted') bg-amber-100 dark:bg-amber-950 text-amber-700 dark:text-amber-400 border border-amber-300 dark:border-amber-800
                                    @else bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-700 @endif">
                                    {{ $lead->status }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-slate-500 dark:text-slate-400 text-xs">{{ $lead->created_at->format('M d, H:i') }}</td>
                            <td class="py-4 px-6 text-right">
                                <a href="{{ route('admin.leads.show', $lead->id) }}" class="inline-flex items-center gap-1 px-3 py-1.5 rounded-xl bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 hover:bg-emerald-500/20 font-bold transition-colors text-xs">
                                    View Lead →
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-slate-400">No leads recorded yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Grid for Recent Enquiries & Appointments --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        {{-- Enquiries --}}
        <div class="bg-white dark:bg-slate-950 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 space-y-4 shadow-xs">
            <div class="flex items-center justify-between border-b border-slate-200 dark:border-slate-800 pb-4">
                <h3 class="font-bold text-slate-900 dark:text-slate-100">Recent Contact Enquiries</h3>
                <a href="{{ route('admin.enquiries.index') }}" class="text-xs text-emerald-600 dark:text-emerald-400 hover:underline">View All</a>
            </div>

            <div class="space-y-3">
                @forelse($recentEnquiries as $enq)
                    <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-xs space-y-1">
                        <div class="flex items-center justify-between font-bold text-slate-900 dark:text-slate-200">
                            <a href="{{ route('admin.enquiries.show', $enq->id) }}" class="hover:underline">{{ $enq->name }} ({{ $enq->phone }})</a>
                            <span class="text-[10px] px-2 py-0.5 rounded bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-400">{{ $enq->status }}</span>
                        </div>
                        <p class="text-slate-500 dark:text-slate-400 italic">"{{ Str::limit($enq->message, 90) }}"</p>
                    </div>
                @empty
                    <p class="text-xs text-slate-400 py-4 text-center">No contact enquiries yet.</p>
                @endforelse
            </div>
        </div>

        {{-- Appointments --}}
        <div class="bg-white dark:bg-slate-950 rounded-2xl border border-slate-200 dark:border-slate-800 p-6 space-y-4 shadow-xs">
            <div class="flex items-center justify-between border-b border-slate-200 dark:border-slate-800 pb-4">
                <h3 class="font-bold text-slate-900 dark:text-slate-100">Recent Appointment Requests</h3>
                <a href="{{ route('admin.appointments.index') }}" class="text-xs text-emerald-600 dark:text-emerald-400 hover:underline">View All</a>
            </div>

            <div class="space-y-3">
                @forelse($recentAppointments as $appt)
                    <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-xs space-y-1">
                        <div class="flex items-center justify-between font-bold text-slate-900 dark:text-slate-200">
                            <a href="{{ route('admin.appointments.show', $appt->id) }}" class="hover:underline">{{ $appt->name }}</a>
                            <span class="text-[10px] px-2 py-0.5 rounded bg-teal-100 dark:bg-teal-950 text-teal-700 dark:text-teal-400 border border-teal-300 dark:border-teal-800">{{ $appt->status }}</span>
                        </div>
                        <p class="text-slate-500 dark:text-slate-400">Phone: {{ $appt->phone }} | Date: {{ $appt->preferred_date ? $appt->preferred_date->format('M d, Y') : 'Flex' }}</p>
                    </div>
                @empty
                    <p class="text-xs text-slate-400 py-4 text-center">No appointment requests yet.</p>
                @endforelse
            </div>
        </div>

    </div>

</div>

@endsection
