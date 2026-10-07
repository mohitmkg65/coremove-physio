<!DOCTYPE html>
<html lang="en" class="h-full dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') | CoreMove Clinic</title>

    <script>
        // Inline theme initialization to avoid flash
        (function() {
            const savedTheme = localStorage.getItem('admin_theme') || 'dark';
            if (savedTheme === 'light') {
                document.documentElement.classList.remove('dark');
            } else {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    {{-- Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 dark:bg-slate-900 text-slate-900 dark:text-slate-100 flex min-h-screen transition-colors duration-200">

    {{-- Fixed-Width Admin Sidebar Navigation --}}
    <aside class="w-64 min-w-[16rem] shrink-0 bg-white dark:bg-slate-950 border-r border-slate-200 dark:border-slate-800 flex flex-col justify-between hidden md:flex">
        <div>
            <div class="p-4 border-b border-slate-200 dark:border-slate-800 flex items-center space-x-3 h-20">
                <div class="w-10 h-10 rounded-xl bg-dark-green text-cream flex items-center justify-center font-serif-editorial font-bold text-xl shadow-soft group-hover:scale-105 transition-transform">
                    C
                </div>
                <div class="flex flex-col">
                    <span class="font-serif-editorial text-2xl font-bold tracking-tight text-dark-green leading-none">CoreMove</span>
                    <span class="text-[10px] uppercase tracking-widest text-sage font-semibold mt-0.5">Physiotherapy & Rehab</span>
                </div>
            </div>

            <nav class="p-4 space-y-1 text-sm font-medium">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-slate-200 dark:bg-slate-800 text-emerald-600 dark:text-emerald-400 font-semibold shadow-sm' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100 dark:hover:bg-slate-900' }}">
                    <span>📊</span> <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.leads.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.leads.*') ? 'bg-slate-200 dark:bg-slate-800 text-emerald-600 dark:text-emerald-400 font-semibold shadow-sm' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100 dark:hover:bg-slate-900' }}">
                    <span>🎯</span> <span>Leads Management</span>
                </a>

                <a href="{{ route('admin.enquiries.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.enquiries.*') ? 'bg-slate-200 dark:bg-slate-800 text-emerald-600 dark:text-emerald-400 font-semibold shadow-sm' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100 dark:hover:bg-slate-900' }}">
                    <span>💬</span> <span>General Enquiries</span>
                </a>

                <a href="{{ route('admin.appointments.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.appointments.*') ? 'bg-slate-200 dark:bg-slate-800 text-emerald-600 dark:text-emerald-400 font-semibold shadow-sm' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100 dark:hover:bg-slate-900' }}">
                    <span>📅</span> <span>Appointments</span>
                </a>

                <a href="{{ route('admin.offers.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.offers.*') ? 'bg-slate-200 dark:bg-slate-800 text-emerald-600 dark:text-emerald-400 font-semibold shadow-sm' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100 hover:bg-slate-100 dark:hover:bg-slate-900' }}">
                    <span>🎁</span> <span>Offers & Promos</span>
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-slate-200 dark:border-slate-800 space-y-3">
            <a href="{{ route('home') }}" target="_blank" class="block w-full text-center text-xs font-semibold text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-200 py-2.5 rounded-xl bg-slate-100 dark:bg-slate-900 border border-slate-200 dark:border-slate-800 transition-colors">
                🌐 View Public Website ↗
            </a>

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-xs font-semibold text-rose-600 dark:text-rose-400 hover:text-rose-700 dark:hover:text-rose-300 py-2.5 rounded-xl bg-rose-50 dark:bg-rose-950/30 border border-rose-200 dark:border-rose-900/50 transition-colors">
                    Sign Out
                </button>
            </form>
        </div>
    </aside>

    {{-- Main Workspace --}}
    <div class="flex-grow flex flex-col min-w-0 overflow-hidden">
        
        {{-- Admin Header Bar --}}
        <header class="bg-white dark:bg-slate-950 border-b border-slate-200 dark:border-slate-800 p-4 flex items-center justify-between shadow-xs h-20">
            <div class="flex items-center space-x-4">
                {{-- <span class="text-xs font-mono bg-slate-100 dark:bg-slate-800 text-emerald-600 dark:text-emerald-400 px-2.5 py-1 rounded-md border border-slate-200 dark:border-slate-700">Laravel 13 Admin</span> --}}
                <h2 class="text-lg font-bold text-slate-900 dark:text-slate-100">@yield('title', 'Dashboard')</h2>
            </div>

            <div class="flex items-center space-x-5 text-xs">
                {{-- Theme Switcher Button --}}
                <button id="themeToggleBtn" onclick="toggleAdminTheme()" class="px-3 py-1.5 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-slate-700 hover:bg-slate-200 dark:hover:bg-slate-700 transition-all font-semibold flex items-center gap-2 cursor-pointer shadow-xs">
                    <span id="themeToggleIcon">🌙</span>
                    <span id="themeToggleText">Dark Mode</span>
                </button>

                <div class="hidden sm:block border-l border-slate-200 dark:border-slate-800 h-4"></div>

                <span class="text-slate-600 dark:text-slate-400">Logged in: <strong class="text-slate-900 dark:text-slate-100">{{ auth()->user()->name ?? 'Admin' }}</strong></span>
            </div>
        </header>

        {{-- Main Content Container --}}
        <main class="flex-grow p-6 sm:p-8 overflow-y-auto">
            @if(session('success'))
                <div class="mb-6 bg-emerald-50 dark:bg-emerald-950/60 border border-emerald-200 dark:border-emerald-800 text-emerald-800 dark:text-emerald-200 p-4 rounded-xl text-sm flex items-center justify-between shadow-xs">
                    <span>✓ {{ session('success') }}</span>
                </div>
            @endif

            @yield('content')
        </main>

    </div>

    {{-- Dark / Light Theme Toggle Script --}}
    <script>
        function toggleAdminTheme() {
            const isDark = document.documentElement.classList.contains('dark');
            if (isDark) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('admin_theme', 'light');
                updateThemeUI('light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('admin_theme', 'dark');
                updateThemeUI('dark');
            }
        }

        function updateThemeUI(theme) {
            const icon = document.getElementById('themeToggleIcon');
            const text = document.getElementById('themeToggleText');
            if (icon && text) {
                if (theme === 'light') {
                    icon.textContent = '☀️';
                    text.textContent = 'Light Mode';
                } else {
                    icon.textContent = '🌙';
                    text.textContent = 'Dark Mode';
                }
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const currentTheme = localStorage.getItem('admin_theme') || 'dark';
            updateThemeUI(currentTheme);
        });
    </script>

</body>
</html>
