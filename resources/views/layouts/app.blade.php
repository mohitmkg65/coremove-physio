<!DOCTYPE html>
<html lang="en" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO Metadata --}}
    <title>@yield('title', 'CoreMove Physiotherapy & Rehabilitation | Move Better. Live Without Limits.')</title>
    <meta name="description" content="@yield('meta_description', 'CoreMove Physiotherapy offers evidence-informed, patient-first physical therapy, sports rehabilitation, and pain management in a modern, caring environment.')">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- OpenGraph & Social Cards --}}
    <meta property="og:site_name" content="CoreMove Physiotherapy">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'CoreMove Physiotherapy & Rehabilitation')">
    <meta property="og:description" content="@yield('meta_description', 'Evidence-informed 1-on-1 physiotherapy tailored to your body and lifestyle.')">
    <meta property="og:image" content="{{ asset('images/hero-patient.jpg') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'CoreMove Physiotherapy & Rehabilitation')">
    <meta name="twitter:description" content="@yield('meta_description', 'Evidence-informed 1-on-1 physiotherapy tailored to your body and lifestyle.')">
    <meta name="twitter:image" content="{{ asset('images/hero-patient.jpg') }}">

    {{-- JSON-LD MedicalBusiness Schema --}}
    <script type="application/ld+json">
    {
      "{{ '@context' }}": "https://schema.org",
      "@type": "MedicalClinic",
      "name": "CoreMove Physiotherapy & Rehabilitation",
      "image": "{{ asset('images/hero-patient.jpg') }}",
      "url": "{{ url('/') }}",
      "telephone": "+1-555-019-2834",
      "priceRange": "$$",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "142 Wellness Boulevard, Suite 300",
        "addressLocality": "Healthcare District",
        "addressRegion": "CA",
        "postalCode": "90210",
        "addressCountry": "US"
      },
      "openingHoursSpecification": [
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
          "opens": "07:30",
          "closes": "19:00"
        },
        {
          "@type": "OpeningHoursSpecification",
          "dayOfWeek": ["Saturday"],
          "opens": "08:30",
          "closes": "14:00"
        }
      ],
      "medicalSpecialty": "Physiotherapy"
    }
    </script>
    @yield('extra_schema')

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-cream text-charcoal flex flex-col min-h-screen selection:bg-sage/20 selection:text-dark-green">

    {{-- Header Navigation --}}
    @include('components.navbar')

    {{-- Main Content Viewport --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

    {{-- Floating Mobile Sticky Action Bar --}}
    @include('components.sticky-mobile-cta')

    {{-- 4-Step Interactive Lead Flow Modal --}}
    @include('components.lead-modal')

    {{-- Desktop Exit Intent Modal --}}
    @include('components.exit-intent-modal')

    {{-- Functional Appointment Booking Modal --}}
    @include('components.appointment-modal')

    {{-- Floating WhatsApp Corner Button --}}
    @include('components.whatsapp-float')

</body>

</html>
