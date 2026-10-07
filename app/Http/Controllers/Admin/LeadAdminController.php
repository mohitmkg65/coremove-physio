<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\LeadNote;
use App\Models\Appointment;
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
            'appointment_date' => 'nullable|date',
            'appointment_time' => 'nullable|string|max:100',
        ]);

        $oldStatus = $lead->status;
        $lead->status = $request->status;
        if ($request->filled('follow_up_date')) {
            $lead->follow_up_date = $request->follow_up_date;
        }
        $lead->save();

        $message = 'Lead status updated successfully.';

        if ($oldStatus !== $request->status) {
            $noteText = "Status changed from '{$oldStatus}' to '{$request->status}'";

            if ($request->status === 'Appointment Scheduled') {
                $apptDate = $request->filled('appointment_date') ? $request->appointment_date : ($lead->follow_up_date ? $lead->follow_up_date->format('Y-m-d') : now()->today()->toDateString());
                $apptTime = $request->filled('appointment_time') ? $request->appointment_time : 'Morning (9 AM - 12 PM)';

                Appointment::create([
                    'name' => $lead->name,
                    'phone' => $lead->phone,
                    'email' => $lead->email,
                    'service_id' => $lead->condition ?? 'Physiotherapy Consultation',
                    'preferred_date' => $apptDate,
                    'preferred_time' => $apptTime,
                    'message' => "Appointment scheduled from Lead #" . $lead->id . " (Condition: " . ($lead->condition ?? 'General') . ")",
                    'status' => 'Confirmed',
                ]);

                $noteText .= " — Synced to Appointments module for {$apptDate} ({$apptTime})";
                $message = "Lead status updated to 'Appointment Scheduled' and synced to Appointments module!";
            }

            LeadNote::create([
                'lead_id' => $lead->id,
                'note' => $noteText,
                'author_name' => auth()->user()->name ?? 'Admin',
            ]);
        }

        return back()->with('success', $message);
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
