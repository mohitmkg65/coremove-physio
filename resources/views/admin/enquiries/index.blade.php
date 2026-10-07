@extends('layouts.admin')

@section('title', 'General Enquiries')

@section('content')

<div class="space-y-6">
    
    {{-- Header & Filters --}}
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white dark:bg-slate-950 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-xs">
        <div>
            <div class="flex items-center space-x-3">
                <h3 class="font-bold text-xl text-slate-900 dark:text-slate-100">General Contact Form Messages</h3>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-400 border border-blue-200 dark:border-blue-800">
                    {{ $enquiries->total() }} Messages
                </span>
            </div>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Review inquiries submitted via the public contact page. Click eye icon to view details.</p>
        </div>

        {{-- Filter Form --}}
        <form method="GET" action="{{ route('admin.enquiries.index') }}" class="flex items-center gap-3">
            <select name="status" onchange="this.form.submit()" class="px-3.5 py-2 bg-slate-50 dark:bg-slate-900 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-200 text-xs rounded-xl focus:outline-none focus:border-emerald-500 font-medium">
                <option value="">All Statuses</option>
                @foreach($statuses as $st)
                    <option value="{{ $st }}" {{ request('status') == $st ? 'selected' : '' }}>{{ $st }}</option>
                @endforeach
            </select>
        </form>
    </div>

    {{-- Minimal Responsive Enquiries Table --}}
    <div class="bg-white dark:bg-slate-950 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-xs overflow-hidden">
        <div class="w-full overflow-x-auto no-scrollbar">
            <table class="w-full min-w-[640px] text-left border-collapse text-xs">
                <thead class="bg-slate-50 dark:bg-slate-900 text-slate-500 dark:text-slate-400 uppercase tracking-wider font-semibold border-b border-slate-200 dark:border-slate-800">
                    <tr>
                        <th class="py-4 px-6">Sender Details</th>
                        <th class="py-4 px-6">Subject / Topic</th>
                        <th class="py-4 px-6">Status</th>
                        <th class="py-4 px-6">Received Date</th>
                        <th class="py-4 px-6 text-right">View Detail</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800/60 text-slate-700 dark:text-slate-300 font-medium">
                    @forelse($enquiries as $enq)
                        <tr class="hover:bg-slate-50/80 dark:hover:bg-slate-900/50 transition-colors">
                            {{-- Sender --}}
                            <td class="py-4 px-6">
                                <div class="flex items-center space-x-3">
                                    <div class="w-9 h-9 rounded-full bg-blue-500/10 text-blue-600 dark:text-blue-400 font-bold text-sm flex items-center justify-center shrink-0">
                                        {{ strtoupper(substr($enq->name, 0, 1)) }}
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.enquiries.show', $enq->id) }}" class="font-bold text-slate-900 dark:text-slate-100 hover:text-blue-600 dark:hover:text-blue-400 text-sm block">
                                            {{ $enq->name }}
                                        </a>
                                        <span class="font-mono text-slate-500 dark:text-slate-400 text-[11px] block">{{ $enq->phone }}</span>
                                    </div>
                                </div>
                            </td>

                            {{-- Subject --}}
                            <td class="py-4 px-6">
                                <span class="font-semibold text-slate-900 dark:text-slate-100 text-xs block truncate max-w-xs">
                                    {{ $enq->subject ?? 'General Inquiry' }}
                                </span>
                            </td>

                            {{-- Status --}}
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider
                                    @if($enq->status === 'New') bg-emerald-100 dark:bg-emerald-950 text-emerald-700 dark:text-emerald-400 border border-emerald-300 dark:border-emerald-800
                                    @elseif($enq->status === 'Contacted') bg-blue-100 dark:bg-blue-950 text-blue-700 dark:text-blue-400 border border-blue-300 dark:border-blue-800
                                    @elseif($enq->status === 'Resolved') bg-amber-100 dark:bg-amber-950 text-amber-700 dark:text-amber-400 border border-amber-300 dark:border-amber-800
                                    @else bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-700 @endif">
                                    {{ $enq->status }}
                                </span>
                            </td>

                            {{-- Received Date --}}
                            <td class="py-4 px-6 text-slate-500 dark:text-slate-400 text-xs">
                                {{ $enq->created_at->format('M d, Y H:i') }}
                            </td>

                            {{-- Eye Icon Action --}}
                            <td class="py-4 px-6 text-right">
                                <a href="{{ route('admin.enquiries.show', $enq->id) }}" title="View Enquiry Details" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl bg-blue-500/10 text-blue-600 dark:text-blue-400 hover:bg-blue-500/20 font-bold transition-colors text-xs">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <span>Details</span>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-slate-400">
                                No contact enquiries found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-200 dark:border-slate-800">
            {{ $enquiries->links() }}
        </div>
    </div>

</div>

@endsection
