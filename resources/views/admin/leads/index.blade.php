@extends('layouts.admin')

@section('title', 'Leads Management')

@section('content')

<div class="space-y-6">
    
    {{-- Header & Filters --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white dark:bg-slate-950 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-xs">
        <div>
            <div class="flex items-center space-x-3">
                <h3 class="font-bold text-xl text-slate-900 dark:text-slate-100">Patient Lead Intake Log</h3>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800">
                    {{ $leads->total() }} Total
                </span>
            </div>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Minimal overview of patient leads. Click "View Details" for clinical intake notes & marketing attribution.</p>
        </div>

        {{-- Filter Form --}}
        <form method="GET" action="{{ route('admin.leads.index') }}" class="flex flex-wrap items-center gap-3">
            <select name="status" onchange="this.form.submit()" class="px-3.5 py-2 bg-slate-50 dark:bg-slate-900 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-200 text-xs rounded-xl focus:outline-none focus:border-emerald-500">
                <option value="">All Statuses</option>
                @foreach($statuses as $st)
                    <option value="{{ $st }}" {{ request('status') == $st ? 'selected' : '' }}>{{ $st }}</option>
                @endforeach
            </select>

            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name, phone, condition..." class="px-4 py-2 bg-slate-50 dark:bg-slate-900 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-200 text-xs rounded-xl focus:outline-none focus:border-emerald-500">
            
            <button type="submit" class="px-4 py-2 bg-emerald-500 text-slate-950 text-xs font-bold rounded-xl hover:bg-emerald-400 transition-colors">Filter</button>
        </form>
    </div>

    {{-- Minimal Clean Leads Table --}}
    <div class="bg-white dark:bg-slate-950 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-xs overflow-hidden">
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
                    @forelse($leads as $lead)
                        <tr class="hover:bg-slate-50/80 dark:hover:bg-slate-900/50 transition-colors">
                            {{-- Patient Info --}}
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-3">
                                    <div class="w-9 h-9 rounded-full bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 font-bold text-sm flex items-center justify-center shrink-0">
                                        {{ strtoupper(substr($lead->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.leads.show', $lead->id) }}" class="font-bold text-slate-900 dark:text-slate-100 hover:text-emerald-600 dark:hover:text-emerald-400 text-sm block">
                                            {{ $lead->name }}
                                        </a>
                                        <span class="font-mono text-slate-500 dark:text-slate-400 text-[11px] block">{{ $lead->phone }}</span>
                                    </div>
                                </div>
                            </td>

                            {{-- Condition --}}
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-[11px] font-semibold bg-slate-100 dark:bg-slate-800 text-slate-800 dark:text-slate-200 border border-slate-200 dark:border-slate-700">
                                    {{ $lead->condition ?? 'General Intake' }}
                                </span>
                            </td>

                            {{-- Status --}}
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider
                                    @if($lead->status === 'New') bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-400 border border-emerald-300 dark:border-emerald-800
                                    @elseif($lead->status === 'Contacted') bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-400 border border-blue-300 dark:border-blue-800
                                    @elseif($lead->status === 'Appointment Scheduled') bg-purple-100 dark:bg-purple-950 text-purple-700 dark:text-purple-400 border border-purple-300 dark:border-purple-800
                                    @elseif($lead->status === 'Converted') bg-amber-100 dark:bg-amber-950 text-amber-700 dark:text-amber-400 border border-amber-300 dark:border-amber-800
                                    @else bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-700 @endif">
                                    {{ $lead->status }}
                                </span>
                            </td>

                            {{-- Date --}}
                            <td class="py-4 px-6 text-slate-500 dark:text-slate-400 text-xs">
                                {{ $lead->created_at->format('M d, Y') }}
                            </td>

                            {{-- Action --}}
                            <td class="py-4 px-6 text-right">
                                <a href="{{ route('admin.leads.show', $lead->id) }}" class="inline-flex items-center gap-1 px-3.5 py-1.5 rounded-xl bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 hover:bg-emerald-500/20 font-bold transition-colors text-xs">
                                    View Details →
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-slate-400">
                                No patient leads found matching your criteria.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-200 dark:border-slate-800">
            {{ $leads->links() }}
        </div>
    </div>

</div>

@endsection
