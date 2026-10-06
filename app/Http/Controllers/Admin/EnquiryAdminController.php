<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Enquiry::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $enquiries = $query->paginate(15);
        $statuses = ['New', 'Contacted', 'Resolved', 'Closed'];

        return view('admin.enquiries.index', compact('enquiries', 'statuses'));
    }

    public function updateStatus(Request $request, Enquiry $enquiry)
    {
        $request->validate([
            'status' => 'required|in:New,Contacted,Resolved,Closed',
        ]);

        $enquiry->update(['status' => $request->status]);

        return back()->with('success', 'Enquiry status updated.');
    }
}
