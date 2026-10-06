@extends('layouts.admin')

@section('title', 'Appointments Module')

@section('content')

<div class="space-y-6">
    
    {{-- Header & Filter Bar --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-950 p-6 rounded-2xl border border-slate-800">
        <div>
            <div class="flex items-center space-x-3">
                <h3 class="font-bold text-xl text-slate-100">Patient Appointment Requests</h3>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-950 text-emerald-400 border border-emerald-800">
                    {{ $appointments->total() }} Total
                </span>
            </div>
            <p class="text-xs text-slate-400 mt-1">Manage direct patient schedule requests, preferred time slots, and status updates</p>
        </div>

        {{-- Filters --}}
        <form method="GET" action="{{ route('admin.appointments.index') }}" class="flex flex-wrap items-center gap-3">
            <select name="status" onchange="this.form.submit()" class="px-3 py-2 bg-slate-900 border border-slate-700 text-slate-200 text-xs rounded-xl focus:outline-none">
                <option value="">All Statuses</option>
                @foreach($statuses as $st)
                    <option value="{{ $st }}" {{ request('status') == $st ? 'selected' : '' }}>{{ $st }}</option>
                @endforeach
            </select>

            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search patient name, phone..." class="px-4 py-2 bg-slate-900 border border-slate-700 text-slate-200 text-xs rounded-xl focus:outline-none">

            <button type="submit" class="px-4 py-2 bg-emerald-500 text-slate-950 text-xs font-bold rounded-xl hover:bg-emerald-400">
                Filter
            </button>
        </form>
    </div>

    {{-- Appointments Table --}}
    <div class="bg-slate-950 rounded-2xl border border-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-900 text-slate-400 uppercase tracking-wider font-semibold border-b border-slate-800">
                    <tr>
                        <th class="p-4">ID</th>
                        <th class="p-4">Patient Details</th>
                        <th class="p-4">Phone / Actions</th>
                        <th class="p-4">Service Requested</th>
                        <th class="p-4">Preferred Slot</th>
                        <th class="p-4">Patient Notes</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Requested Date</th>
                        <th class="p-4 text-right">Update Stage</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60 text-slate-300">
                    @forelse($appointments as $appt)
                        <tr class="hover:bg-slate-900/50 transition-colors">
                            <td class="p-4 font-mono text-slate-400">#{{ $appt->id }}</td>
                            
                            <td class="p-4">
                                <span class="block font-bold text-slate-100 text-sm">{{ $appt->name }}</span>
                                <span class="block text-[11px] text-slate-400">{{ $appt->email ?? 'No email provided' }}</span>
                            </td>

                            <td class="p-4">
                                <span class="block font-mono text-slate-200 font-bold mb-1">{{ $appt->phone }}</span>
                                <div class="flex items-center gap-2">
                                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $appt->phone) }}" class="text-[10px] text-emerald-400 hover:underline">📞 Call</a>
                                    <span class="text-slate-600">•</span>
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $appt->phone) }}?text=Hi%20{{ urlencode($appt->name) }},%20this%20is%20CoreMove%20Physiotherapy%20confirming%20your%20appointment%20request." target="_blank" class="text-[10px] text-emerald-400 hover:underline">💬 WhatsApp</a>
                                </div>
                            </td>

                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-semibold bg-slate-800 text-emerald-400 border border-slate-700">
                                    {{ $appt->service_id ?? '60-Min Assessment' }}
                                </span>
                            </td>

                            <td class="p-4">
                                <div class="font-bold text-slate-100">
                                    {{ $appt->preferred_date ? $appt->preferred_date->format('D, M d, Y') : 'Flexible Date' }}
                                </div>
                                <div class="text-[11px] text-slate-400 mt-0.5">
                                    🕒 {{ $appt->preferred_time ?? 'Anytime' }}
                                </div>
                            </td>

                            <td class="p-4 text-slate-400 max-w-xs truncate" title="{{ $appt->message }}">
                                {{ $appt->message ?? 'No notes provided' }}
                            </td>

                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase
                                    @if($appt->status === 'Pending') bg-amber-950 text-amber-400 border border-amber-800
                                    @elseif($appt->status === 'Confirmed') bg-emerald-950 text-emerald-400 border border-emerald-800
                                    @elseif($appt->status === 'Completed') bg-blue-950 text-blue-400 border border-blue-800
                                    @elseif($appt->status === 'Cancelled') bg-rose-950 text-rose-400 border border-rose-800
                                    @else bg-slate-800 text-slate-300 @endif">
                                    {{ $appt->status }}
                                </span>
                            </td>

                            <td class="p-4 text-slate-400 text-[11px]">{{ $appt->created_at->format('M d, Y H:i') }}</td>

                            <td class="p-4 text-right">
                                <form action="{{ route('admin.appointments.status', $appt->id) }}" method="POST" class="inline-flex items-center gap-2">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()" class="px-2.5 py-1 bg-slate-900 border border-slate-700 text-slate-200 text-xs rounded-xl focus:outline-none focus:border-emerald-500">
                                        @foreach($statuses as $s)
                                            <option value="{{ $s }}" {{ $appt->status === $s ? 'selected' : '' }}>{{ $s }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="p-8 text-center text-slate-500">
                                No appointment requests found matching your criteria.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-800">
            {{ $appointments->links() }}
        </div>
    </div>

</div>

@endsection
