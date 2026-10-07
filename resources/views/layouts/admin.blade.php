<!DOCTYPE html>
<html lang="en" class="h-full dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') | CoreMove Clinic</title>

    <script>
        // Inline theme initialization to prevent flash of wrong theme
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

    {{-- Desktop Fixed-Width Admin Sidebar --}}
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

    {{-- Mobile Admin Slide-Over Drawer --}}
    <div id="adminMobileDrawer" class="hidden fixed inset-0 z-50 bg-slate-950/80 backdrop-blur-sm md:hidden animate-fade-in">
        <div class="fixed inset-y-0 left-0 max-w-xs w-full bg-white dark:bg-slate-950 p-6 flex flex-col justify-between overflow-y-auto shadow-2xl border-r border-slate-200 dark:border-slate-800">
            <div>
                <div class="flex items-center justify-between pb-6 border-b border-slate-200 dark:border-slate-800">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 rounded-lg bg-emerald-500 text-slate-950 font-bold flex items-center justify-center font-serif-editorial text-lg">C</div>
                        <span class="font-serif-editorial text-xl font-bold text-slate-900 dark:text-slate-100">CoreMove Admin</span>
                    </div>
                    <button onclick="toggleAdminMobileDrawer()" class="p-2 text-slate-500 dark:text-slate-400 hover:text-slate-900 dark:hover:text-slate-100">✕</button>
                </div>

                <nav class="py-6 space-y-2 text-sm font-medium">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-900">
                        <span>📊</span> <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.leads.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-900">
                        <span>🎯</span> <span>Leads Management</span>
                    </a>
                    <a href="{{ route('admin.enquiries.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-900">
                        <span>💬</span> <span>General Enquiries</span>
                    </a>
                    <a href="{{ route('admin.appointments.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-900">
                        <span>📅</span> <span>Appointments</span>
                    </a>
                    <a href="{{ route('admin.offers.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-800 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-slate-900">
                        <span>🎁</span> <span>Offers & Promos</span>
                    </a>
                </nav>
            </div>

            <div class="space-y-3 pt-6 border-t border-slate-200 dark:border-slate-800">
                <a href="{{ route('home') }}" target="_blank" class="block w-full text-center text-xs font-semibold text-slate-700 dark:text-slate-300 py-3 rounded-xl bg-slate-100 dark:bg-slate-900">
                    🌐 View Public Website ↗
                </a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-xs font-semibold text-rose-600 dark:text-rose-400 py-3 rounded-xl bg-rose-50 dark:bg-rose-950/30">
                        Sign Out
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- Main Workspace --}}
    <div class="flex-grow flex flex-col min-w-0 overflow-hidden">
        
        {{-- Admin Header Bar --}}
        <header class="bg-white dark:bg-slate-950 border-b border-slate-200 dark:border-slate-800 px-4 sm:px-6 py-4 flex items-center justify-between shadow-xs h-20">
            <div class="flex items-center space-x-3 sm:space-x-4">
                {{-- Mobile Menu Hamburger Button --}}
                <button onclick="toggleAdminMobileDrawer()" class="p-2 rounded-xl bg-slate-100 dark:bg-slate-900 text-slate-700 dark:text-slate-200 md:hidden hover:bg-slate-200 dark:hover:bg-slate-800">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>

                <h2 class="text-base sm:text-lg font-bold text-slate-900 dark:text-slate-100 truncate">@yield('title', 'Dashboard')</h2>
            </div>

            <div class="flex items-center space-x-3 sm:space-x-4 text-xs">
                {{-- Theme Switcher Button --}}
                <button id="themeToggleBtn" onclick="toggleAdminTheme()" class="px-3 py-1.5 rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-slate-700 hover:bg-slate-200 dark:hover:bg-slate-700 transition-all font-semibold flex items-center gap-1.5 cursor-pointer">
                    <span id="themeToggleIcon">🌙</span>
                    {{-- <span id="themeToggleText" class="hidden sm:inline">Dark Mode</span> --}}
                </button>

                <span class="hidden md:inline text-slate-600 dark:text-slate-400">Logged in: <strong class="text-slate-900 dark:text-slate-100">{{ auth()->user()->name ?? 'Admin' }}</strong></span>
            </div>
        </header>

        {{-- Main Content Container --}}
        <main class="flex-grow p-4 sm:p-6 lg:p-8 overflow-y-auto">
            @if(session('success'))
                <div class="mb-6 bg-emerald-50 dark:bg-emerald-950/60 border border-emerald-200 dark:border-emerald-800 text-emerald-800 dark:text-emerald-200 p-4 rounded-xl text-sm flex items-center justify-between shadow-xs">
                    <span>✓ {{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 bg-rose-50 dark:bg-rose-950/60 border border-rose-200 dark:border-rose-800 text-rose-800 dark:text-rose-200 p-4 rounded-xl text-sm">
                    <strong class="block font-bold mb-1">Please fix the following validation errors:</strong>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>

    </div>

    {{-- Dark / Light Theme & Drawer Scripts --}}
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

        function toggleAdminMobileDrawer() {
            const drawer = document.getElementById('adminMobileDrawer');
            if (drawer) {
                drawer.classList.toggle('hidden');
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const currentTheme = localStorage.getItem('admin_theme') || 'dark';
            updateThemeUI(currentTheme);
        });
    </script>

</body>
</html>
