<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Condition;
use App\Models\Testimonial;
use App\Models\Faq;
use App\Models\Offer;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();
        $conditions = Condition::where('is_featured', true)->orderBy('sort_order')->get();
        $testimonials = Testimonial::where('is_featured', true)->orderBy('sort_order')->get();
        $faqs = Faq::orderBy('sort_order')->get();
        $activeOffer = Offer::active()->first();
        $gallery = Gallery::orderBy('sort_order')->get();

        return view('home', compact(
            'services',
            'conditions',
            'testimonials',
            'faqs',
            'activeOffer',
            'gallery'
        ));
    }

    public function about()
    {
        return view('about');
    }

    public function treatments()
    {
        $services = Service::orderBy('sort_order')->get();
        return view('treatments.index', compact('services'));
    }

    public function conditions()
    {
        $conditions = Condition::orderBy('sort_order')->get();
        return view('conditions.index', compact('conditions'));
    }

    public function conditionDetail(string $slug)
    {
        $condition = Condition::where('slug', $slug)->firstOrFail();
        return view('conditions.show', compact('condition'));
    }

    public function offers()
    {
        $offers = Offer::active()->latest()->get();
        return view('offers', compact('offers'));
    }

    public function contact()
    {
        return view('contact');
    }
}
