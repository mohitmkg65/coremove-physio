<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\LeadNote;
use Illuminate\Http\Request;

class LeadAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Lead::with('notes')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('condition', 'like', "%{$search}%");
            });
        }

        $leads = $query->paginate(15);
        $statuses = ['New', 'Contacted', 'Interested', 'Appointment Scheduled', 'Visited', 'Converted', 'Not Interested'];

        return view('admin.leads.index', compact('leads', 'statuses'));
    }

    public function show(Lead $lead)
    {
        $lead->load('notes');
        return view('admin.leads.show', compact('lead'));
    }

    public function updateStatus(Request $request, Lead $lead)
    {
        $request->validate([
            'status' => 'required|in:New,Contacted,Interested,Appointment Scheduled,Visited,Converted,Not Interested',
            'follow_up_date' => 'nullable|date',
        ]);

        $oldStatus = $lead->status;
        $lead->status = $request->status;
        if ($request->filled('follow_up_date')) {
            $lead->follow_up_date = $request->follow_up_date;
        }
        $lead->save();

        if ($oldStatus !== $request->status) {
            LeadNote::create([
                'lead_id' => $lead->id,
                'note' => "Status changed from '{$oldStatus}' to '{$request->status}'",
                'author_name' => auth()->user()->name ?? 'Admin',
            ]);
        }

        return back()->with('success', 'Lead status updated successfully.');
    }

    public function addNote(Request $request, Lead $lead)
    {
        $request->validate([
            'note' => 'required|string',
        ]);

        LeadNote::create([
            'lead_id' => $lead->id,
            'note' => $request->note,
            'author_name' => auth()->user()->name ?? 'Admin',
        ]);

        return back()->with('success', 'Note added to lead record.');
    }
}
