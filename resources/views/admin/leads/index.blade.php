@extends('layouts.admin')

@section('title', 'Leads Management')

@section('content')

<div class="space-y-6">
    
    {{-- Header & Filters --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-950 p-6 rounded-2xl border border-slate-800">
        <div>
            <h3 class="font-bold text-xl text-slate-100">Patient Lead Intake Log</h3>
            <p class="text-xs text-slate-400 mt-1">Track patient problems, contact info, and marketing attribution</p>
        </div>

        {{-- Filter Form --}}
        <form method="GET" action="{{ route('admin.leads.index') }}" class="flex flex-wrap items-center gap-3">
            <select name="status" onchange="this.form.submit()" class="px-3 py-2 bg-slate-900 border border-slate-700 text-slate-200 text-xs rounded-xl focus:outline-none">
                <option value="">All Statuses</option>
                @foreach($statuses as $st)
                    <option value="{{ $st }}" {{ request('status') == $st ? 'selected' : '' }}>{{ $st }}</option>
                @endforeach
            </select>

            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name, phone, problem..." class="px-4 py-2 bg-slate-900 border border-slate-700 text-slate-200 text-xs rounded-xl focus:outline-none">
            
            <button type="submit" class="px-4 py-2 bg-emerald-500 text-slate-950 text-xs font-bold rounded-xl hover:bg-emerald-400">Filter</button>
        </form>
    </div>

    {{-- Leads Table --}}
    <div class="bg-slate-950 rounded-2xl border border-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-900 text-slate-400 uppercase tracking-wider font-semibold border-b border-slate-800">
                    <tr>
                        <th class="p-4">ID</th>
                        <th class="p-4">Patient Name</th>
                        <th class="p-4">Phone / Email</th>
                        <th class="p-4">Condition</th>
                        <th class="p-4">Duration</th>
                        <th class="p-4">Impact</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Source</th>
                        <th class="p-4">Created At</th>
                        <th class="p-4 text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60 text-slate-300">
                    @forelse($leads as $lead)
                        <tr class="hover:bg-slate-900/50 transition-colors">
                            <td class="p-4 font-mono text-slate-400">#{{ $lead->id }}</td>
                            <td class="p-4 font-bold text-slate-100">{{ $lead->name }}</td>
                            <td class="p-4">
                                <span class="block font-mono text-slate-200">{{ $lead->phone }}</span>
                                <span class="block text-[11px] text-slate-400">{{ $lead->email ?? 'No email' }}</span>
                            </td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-semibold bg-slate-800 text-slate-200">
                                    {{ $lead->condition ?? 'General' }}
                                </span>
                            </td>
                            <td class="p-4 text-slate-400">{{ $lead->duration ?? '-' }}</td>
                            <td class="p-4 text-slate-400">
                                @if(is_array($lead->impact))
                                    {{ implode(', ', array_slice($lead->impact, 0, 2)) }}
                                    @if(count($lead->impact) > 2) +{{ count($lead->impact) - 2 }} @endif
                                @else
                                    -
                                @endif
                            </td>
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
                                {{ $lead->utm_source ?? $lead->source }}
                            </td>
                            <td class="p-4 text-slate-400">{{ $lead->created_at->format('M d, Y H:i') }}</td>
                            <td class="p-4 text-right">
                                <a href="{{ route('admin.leads.show', $lead->id) }}" class="px-3 py-1.5 rounded-lg bg-emerald-500/10 text-emerald-400 hover:bg-emerald-500/20 font-semibold transition-colors">
                                    View Full Detail →
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="p-8 text-center text-slate-500">No leads found matching your criteria.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-800">
            {{ $leads->links() }}
        </div>
    </div>

</div>

@endsection
