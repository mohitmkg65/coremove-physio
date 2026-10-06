<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Appointment::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('service_id', 'like', "%{$search}%");
            });
        }


        $appointments = $query->paginate(15);
        $statuses = ['Pending', 'Confirmed', 'Rescheduled', 'Completed', 'Cancelled'];

        return view('admin.appointments.index', compact('appointments', 'statuses'));
    }

    public function updateStatus(Request $request, Appointment $appointment)
    {
        $request->validate([
            'status' => 'required|in:Pending,Confirmed,Rescheduled,Completed,Cancelled',
        ]);

        $appointment->update(['status' => $request->status]);

        return back()->with('success', 'Appointment status updated.');
    }
}
