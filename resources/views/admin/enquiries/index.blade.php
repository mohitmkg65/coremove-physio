@extends('layouts.admin')

@section('title', 'General Enquiries')

@section('content')

<div class="space-y-6">
    
    <div class="flex items-center justify-between bg-slate-950 p-6 rounded-2xl border border-slate-800">
        <div>
            <h3 class="font-bold text-xl text-slate-100">General Contact Enquiries</h3>
            <p class="text-xs text-slate-400 mt-1">Direct contact form submissions from website visitors</p>
        </div>
    </div>

    <div class="bg-slate-950 rounded-2xl border border-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-slate-900 text-slate-400 uppercase tracking-wider font-semibold border-b border-slate-800">
                    <tr>
                        <th class="p-4">ID</th>
                        <th class="p-4">Name</th>
                        <th class="p-4">Contact Details</th>
                        <th class="p-4">Subject</th>
                        <th class="p-4">Message</th>
                        <th class="p-4">Status</th>
                        <th class="p-4">Received</th>
                        <th class="p-4 text-right">Update Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60 text-slate-300">
                    @forelse($enquiries as $enq)
                        <tr class="hover:bg-slate-900/50 transition-colors">
                            <td class="p-4 font-mono text-slate-400">#{{ $enq->id }}</td>
                            <td class="p-4 font-bold text-slate-100">{{ $enq->name }}</td>
                            <td class="p-4 font-mono">
                                <div>{{ $enq->phone }}</div>
                                <div class="text-slate-400 text-[11px]">{{ $enq->email ?? '-' }}</div>
                            </td>
                            <td class="p-4 text-slate-200">{{ $enq->subject ?? 'General' }}</td>
                            <td class="p-4 text-slate-300 max-w-xs truncate" title="{{ $enq->message }}">{{ $enq->message }}</td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-bold uppercase bg-slate-800 text-slate-200">
                                    {{ $enq->status }}
                                </span>
                            </td>
                            <td class="p-4 text-slate-400">{{ $enq->created_at->format('M d, H:i') }}</td>
                            <td class="p-4 text-right">
                                <form action="{{ route('admin.enquiries.status', $enq->id) }}" method="POST" class="inline-flex items-center gap-2">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()" class="px-2.5 py-1 bg-slate-900 border border-slate-700 text-slate-200 text-xs rounded-lg">
                                        @foreach($statuses as $s)
                                            <option value="{{ $s }}" {{ $enq->status === $s ? 'selected' : '' }}>{{ $s }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="p-8 text-center text-slate-500">No enquiries recorded yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-slate-800">
            {{ $enquiries->links() }}
        </div>
    </div>

</div>

@endsection
