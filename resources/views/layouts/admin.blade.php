<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-900">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') | CoreMove Clinic</title>

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-900 text-slate-100 flex min-h-screen">

    {{-- Admin Sidebar Navigation --}}
    <aside class="w-64 bg-slate-950 border-r border-slate-800 flex flex-col justify-between hidden md:flex">
        <div>
            <div class="p-6 border-b border-slate-800 flex items-center space-x-3">
                <div class="w-8 h-8 rounded-lg bg-emerald-500 text-slate-950 font-bold flex items-center justify-center font-serif-editorial text-lg">C</div>
                <span class="font-serif-editorial text-xl font-bold text-slate-100">CoreMove Admin</span>
            </div>

            <nav class="p-4 space-y-1 text-sm font-medium">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-slate-800 text-emerald-400 font-semibold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-900' }}">
                    <span>📊</span> <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.leads.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.leads.*') ? 'bg-slate-800 text-emerald-400 font-semibold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-900' }}">
                    <span>🎯</span> <span>Leads Management</span>
                </a>

                <a href="{{ route('admin.enquiries.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.enquiries.*') ? 'bg-slate-800 text-emerald-400 font-semibold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-900' }}">
                    <span>💬</span> <span>General Enquiries</span>
                </a>

                <a href="{{ route('admin.appointments.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.appointments.*') ? 'bg-slate-800 text-emerald-400 font-semibold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-900' }}">
                    <span>📅</span> <span>Appointments</span>
                </a>

                <a href="{{ route('admin.offers.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.offers.*') ? 'bg-slate-800 text-emerald-400 font-semibold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-900' }}">
                    <span>🎁</span> <span>Offers & Promos</span>
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-slate-800 space-y-3">
            <a href="{{ route('home') }}" target="_blank" class="block w-full text-center text-xs font-semibold text-slate-400 hover:text-slate-200 py-2 rounded-lg bg-slate-900 border border-slate-800">
                🌐 View Public Website ↗
            </a>

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-xs font-semibold text-rose-400 hover:text-rose-300 py-2 rounded-lg bg-rose-950/30 border border-rose-900/50">
                    Sign Out
                </button>
            </form>
        </div>
    </aside>

    {{-- Main Workspace --}}
    <div class="flex-grow flex flex-col min-w-0 overflow-hidden">
        
        {{-- Admin Header Bar --}}
        <header class="bg-slate-950 border-b border-slate-800 px-6 py-4 flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <span class="text-xs font-mono bg-slate-800 text-emerald-400 px-2.5 py-1 rounded">Laravel 13 Admin</span>
                <h2 class="text-lg font-bold text-slate-100">@yield('title', 'Dashboard')</h2>
            </div>

            <div class="flex items-center space-x-4 text-xs text-slate-300">
                <span>Logged in as: <strong class="text-slate-100">{{ auth()->user()->name ?? 'Admin' }}</strong></span>
            </div>
        </header>

        {{-- Main Content Container --}}
        <main class="flex-grow p-6 sm:p-8 overflow-y-auto">
            @if(session('success'))
                <div class="mb-6 bg-emerald-950/60 border border-emerald-800 text-emerald-200 p-4 rounded-xl text-sm flex items-center justify-between">
                    <span>✓ {{ session('success') }}</span>
                </div>
            @endif

            @yield('content')
        </main>

    </div>

</body>
</html>
