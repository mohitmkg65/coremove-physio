@extends('layouts.admin')

@section('title', 'Enquiry #' . $enquiry->id . ' Details')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">
    
    <div class="flex items-center justify-between">
        <a href="{{ route('admin.enquiries.index') }}" class="text-xs font-semibold text-slate-400 hover:text-slate-100 dark:text-slate-400 dark:hover:text-slate-100 flex items-center gap-2">
            ← Back to Enquiries List
        </a>

        <div class="flex items-center gap-3">
            <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider
                @if($enquiry->status === 'New') bg-emerald-500/10 text-emerald-500 border border-emerald-500/30
                @elseif($enquiry->status === 'Contacted') bg-blue-500/10 text-blue-500 border border-blue-500/30
                @elseif($enquiry->status === 'Resolved') bg-amber-500/10 text-amber-500 border border-amber-500/30
                @else bg-slate-500/10 text-slate-500 border border-slate-500/30 @endif">
                {{ $enquiry->status }}
            </span>
        </div>
    </div>

    {{-- Main Detail Card --}}
    <div class="bg-white dark:bg-slate-950 p-6 sm:p-8 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm space-y-6">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-6 border-b border-slate-200 dark:border-slate-800 gap-4">
            <div class="flex items-center space-x-4">
                <div class="w-12 h-12 rounded-xl bg-blue-500/10 text-blue-600 dark:text-blue-400 font-bold text-xl flex items-center justify-center">
                    {{ strtoupper(substr($enquiry->name, 0, 1)) }}
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-slate-900 dark:text-slate-100">{{ $enquiry->name }}</h2>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Enquiry #{{ $enquiry->id }} • Received {{ $enquiry->created_at->format('M d, Y \a\t H:i') }}</p>
                </div>
            </div>

            <div class="flex items-center space-x-2">
                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $enquiry->phone) }}" class="px-4 py-2 bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 font-semibold text-xs rounded-xl hover:bg-emerald-500/20 transition-colors">
                    📞 Call {{ $enquiry->phone }}
                </a>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $enquiry->phone) }}?text=Hello%20{{ urlencode($enquiry->name) }},%20this%20is%20CoreMove%20Physiotherapy%20replying%20to%20your%20message." target="_blank" class="px-4 py-2 bg-emerald-500 text-slate-950 font-bold text-xs rounded-xl hover:bg-emerald-400 transition-colors">
                    💬 WhatsApp
                </a>
            </div>
        </div>

        {{-- Details Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
            <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800 space-y-1">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider block">Subject</span>
                <span class="font-bold text-slate-900 dark:text-slate-100 text-base">{{ $enquiry->subject ?? 'General Clinic Inquiry' }}</span>
            </div>

            <div class="p-4 rounded-xl bg-slate-50 dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800 space-y-1">
                <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider block">Sender Contact</span>
                <span class="font-mono font-semibold text-slate-900 dark:text-slate-100 block">{{ $enquiry->phone }}</span>
                <span class="font-mono text-xs text-slate-500 dark:text-slate-400 block">{{ $enquiry->email ?? 'No email provided' }}</span>
            </div>
        </div>

        {{-- Message Body --}}
        <div class="p-5 rounded-xl bg-slate-50 dark:bg-slate-900/50 border border-slate-200 dark:border-slate-800 space-y-2">
            <h4 class="text-xs font-bold uppercase tracking-wider text-slate-400">Message Content</h4>
            <p class="text-slate-700 dark:text-slate-300 text-sm leading-relaxed whitespace-pre-line">{{ $enquiry->message }}</p>
        </div>

        {{-- Status Update Form --}}
        <div class="pt-6 border-t border-slate-200 dark:border-slate-800 flex items-center justify-between">
            <span class="text-xs text-slate-500 dark:text-slate-400">Update Enquiry Status:</span>

            <form action="{{ route('admin.enquiries.status', $enquiry->id) }}" method="POST" class="flex items-center gap-3">
                @csrf
                <select name="status" class="px-4 py-2 bg-slate-100 dark:bg-slate-900 border border-slate-300 dark:border-slate-700 text-slate-900 dark:text-slate-100 text-xs rounded-xl focus:outline-none focus:border-emerald-500">
                    <option value="New" {{ $enquiry->status === 'New' ? 'selected' : '' }}>New Message</option>
                    <option value="Contacted" {{ $enquiry->status === 'Contacted' ? 'selected' : '' }}>Contacted</option>
                    <option value="Resolved" {{ $enquiry->status === 'Resolved' ? 'selected' : '' }}>Resolved</option>
                    <option value="Closed" {{ $enquiry->status === 'Closed' ? 'selected' : '' }}>Closed</option>
                </select>
                <button type="submit" class="px-5 py-2 bg-emerald-500 hover:bg-emerald-400 text-slate-950 text-xs font-bold rounded-xl transition-colors">
                    Save Status
                </button>
            </form>
        </div>

    </div>

</div>

@endsection
