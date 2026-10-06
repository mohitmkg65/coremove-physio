@extends('layouts.admin')

@section('title', 'Offers & Promos')

@section('content')

<div class="space-y-8">
    
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-950 p-6 rounded-2xl border border-slate-800">
        <div>
            <h3 class="font-bold text-xl text-slate-100">Special Clinic Offers & Assessment Packages</h3>
            <p class="text-xs text-slate-400 mt-1">Manage promotional banners and assessment savings displayed on the website</p>
        </div>
        <button onclick="document.getElementById('createOfferModal').classList.remove('hidden')" class="px-5 py-2.5 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold text-xs rounded-xl shadow-lg transition-all">
            + Create New Offer
        </button>
    </div>

    {{-- Offers Table --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($offers as $offer)
            <div class="bg-slate-950 p-6 rounded-2xl border border-slate-800 space-y-4 relative">
                <div class="flex items-center justify-between">
                    <span class="px-2.5 py-1 text-[10px] font-bold uppercase rounded-full {{ $offer->is_active ? 'bg-emerald-950 text-emerald-400 border border-emerald-800' : 'bg-slate-800 text-slate-400' }}">
                        {{ $offer->is_active ? 'Active Display' : 'Disabled' }}
                    </span>

                    <form action="{{ route('admin.offers.toggle', $offer->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="text-xs font-semibold text-slate-400 hover:text-slate-200">
                            {{ $offer->is_active ? 'Deactivate ⏸' : 'Activate ▶' }}
                        </button>
                    </form>
                </div>

                <h4 class="font-bold text-lg text-slate-100">{{ $offer->title }}</h4>
                <p class="text-xs text-slate-400 leading-relaxed">{{ $offer->description }}</p>

                @if($offer->value)
                    <div class="text-xs font-semibold text-emerald-400 bg-slate-900 p-3 rounded-xl border border-slate-800">
                        🎁 {{ $offer->value }}
                    </div>
                @endif

                <div class="pt-4 border-t border-slate-800 flex items-center justify-between text-xs text-slate-400">
                    <span>End Date: {{ $offer->end_date ? $offer->end_date->format('M d, Y') : 'Ongoing' }}</span>
                    
                    <form action="{{ route('admin.offers.destroy', $offer->id) }}" method="POST" onsubmit="return confirm('Delete this offer?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-rose-400 hover:text-rose-300 font-semibold">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-span-2 text-center py-12 text-slate-500 text-xs">
                No special clinic offers created yet.
            </div>
        @endforelse
    </div>

    {{-- Create Offer Modal --}}
    <div id="createOfferModal" class="hidden fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-sm flex items-center justify-center p-4">
        <div class="bg-slate-900 p-8 rounded-3xl border border-slate-800 max-w-lg w-full space-y-6">
            <div class="flex items-center justify-between border-b border-slate-800 pb-4">
                <h3 class="font-bold text-slate-100">Create Special Clinic Offer</h3>
                <button onclick="document.getElementById('createOfferModal').classList.add('hidden')" class="text-slate-400 hover:text-slate-100">✕</button>
            </div>

            <form action="{{ route('admin.offers.store') }}" method="POST" class="space-y-4 text-xs">
                @csrf
                <div>
                    <label class="block text-slate-300 uppercase font-semibold mb-1">Offer Title *</label>
                    <input type="text" name="title" required placeholder="e.g. 60-Min Initial Assessment Special" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-700 text-slate-100 rounded-xl">
                </div>

                <div>
                    <label class="block text-slate-300 uppercase font-semibold mb-1">Offer Type *</label>
                    <input type="text" name="offer_type" required value="Special Assessment Package" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-700 text-slate-100 rounded-xl">
                </div>

                <div>
                    <label class="block text-slate-300 uppercase font-semibold mb-1">Description *</label>
                    <textarea name="description" required rows="3" placeholder="Briefly describe what is included..." class="w-full px-4 py-2.5 bg-slate-950 border border-slate-700 text-slate-100 rounded-xl"></textarea>
                </div>

                <div>
                    <label class="block text-slate-300 uppercase font-semibold mb-1">Savings / Value Badge</label>
                    <input type="text" name="value" placeholder="e.g. Save 40% on First Visit" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-700 text-slate-100 rounded-xl">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-slate-300 uppercase font-semibold mb-1">Start Date</label>
                        <input type="date" name="start_date" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-700 text-slate-100 rounded-xl">
                    </div>
                    <div>
                        <label class="block text-slate-300 uppercase font-semibold mb-1">End Date</label>
                        <input type="date" name="end_date" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-700 text-slate-100 rounded-xl">
                    </div>
                </div>

                <div>
                    <label class="block text-slate-300 uppercase font-semibold mb-1">CTA Button Label</label>
                    <input type="text" name="cta_text" value="See If This Is Right For Me" class="w-full px-4 py-2.5 bg-slate-950 border border-slate-700 text-slate-100 rounded-xl">
                </div>

                <div>
                    <label class="block text-slate-300 uppercase font-semibold mb-1">Terms & Conditions</label>
                    <input type="text" name="terms" placeholder="e.g. Valid for new patients only." class="w-full px-4 py-2.5 bg-slate-950 border border-slate-700 text-slate-100 rounded-xl">
                </div>

                <div class="flex items-center gap-2 pt-2">
                    <input type="checkbox" name="is_active" id="is_active_chk" checked class="rounded border-slate-700 bg-slate-950 text-emerald-500">
                    <label for="is_active_chk" class="text-slate-300 font-semibold">Activate immediately on public website</label>
                </div>

                <div class="pt-4 flex items-center justify-end space-x-3">
                    <button type="button" onclick="document.getElementById('createOfferModal').classList.add('hidden')" class="px-4 py-2 rounded-xl text-slate-400 hover:text-slate-200">Cancel</button>
                    <button type="submit" class="px-6 py-2.5 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold">Save Offer</button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection
