<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferAdminController extends Controller
{
    public function index()
    {
        $offers = Offer::latest()->get();
        return view('admin.offers.index', compact('offers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'banner_url' => 'nullable|string|max:255',
            'offer_type' => 'required|string|max:255',
            'value' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'cta_text' => 'required|string|max:255',
            'terms' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $data['is_active'] = $request->has('is_active');
        Offer::create($data);

        return back()->with('success', 'Special offer created successfully.');
    }

    public function update(Request $request, Offer $offer)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'banner_url' => 'nullable|string|max:255',
            'offer_type' => 'required|string|max:255',
            'value' => 'nullable|string|max:255',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'cta_text' => 'required|string|max:255',
            'terms' => 'nullable|string',
        ]);

        $data['is_active'] = $request->has('is_active');
        $offer->update($data);

        return back()->with('success', 'Offer updated successfully.');
    }

    public function toggle(Offer $offer)
    {
        $offer->is_active = !$offer->is_active;
        $offer->save();

        return back()->with('success', 'Offer status toggled.');
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();
        return back()->with('success', 'Offer deleted.');
    }
}
