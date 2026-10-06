<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Enquiry;
use App\Models\Appointment;
use App\Models\Offer;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLeads = Lead::count();
        $newLeads = Lead::where('status', 'New')->count();
        $contactedLeads = Lead::where('status', 'Contacted')->count();
        $convertedLeads = Lead::where('status', 'Converted')->count();

        $todayEnquiries = Enquiry::whereDate('created_at', now()->today())->count();
        $activeOffersCount = Offer::active()->count();
        $upcomingAppointmentsCount = Appointment::whereIn('status', ['Pending', 'Confirmed'])->count();

        $recentLeads = Lead::latest()->take(5)->get();
        $recentEnquiries = Enquiry::latest()->take(5)->get();
        $recentAppointments = Appointment::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalLeads',
            'newLeads',
            'contactedLeads',
            'convertedLeads',
            'todayEnquiries',
            'activeOffersCount',
            'upcomingAppointmentsCount',
            'recentLeads',
            'recentEnquiries',
            'recentAppointments'
        ));
    }
}
