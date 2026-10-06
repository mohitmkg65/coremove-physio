<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login | CoreMove Physiotherapy</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 text-slate-100 flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-md bg-slate-900 rounded-3xl p-8 border border-slate-800 shadow-2xl space-y-6">
        
        <div class="text-center space-y-2">
            <div class="w-12 h-12 rounded-2xl bg-emerald-500 text-slate-950 font-bold flex items-center justify-center font-serif-editorial text-2xl mx-auto">C</div>
            <h1 class="font-serif-editorial text-2xl font-bold text-slate-100">CoreMove Clinic Admin</h1>
            <p class="text-xs text-slate-400">Sign in to manage patient leads, enquiries, and offers</p>
        </div>

        @if($errors->any())
            <div class="bg-rose-950/60 border border-rose-800 text-rose-200 text-xs p-3 rounded-xl">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Email Address</label>
                <input type="email" id="email" name="email" required value="{{ old('email', 'admin@coremovephysio.com') }}" class="w-full px-4 py-3 rounded-xl border border-slate-700 bg-slate-800 text-slate-100 focus:outline-none focus:border-emerald-500 text-sm">
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold text-slate-300 uppercase tracking-wider mb-1">Password</label>
                <input type="password" id="password" name="password" required value="password" class="w-full px-4 py-3 rounded-xl border border-slate-700 bg-slate-800 text-slate-100 focus:outline-none focus:border-emerald-500 text-sm">
            </div>

            <div class="flex items-center justify-between text-xs">
                <label class="flex items-center gap-2 text-slate-400 cursor-pointer">
                    <input type="checkbox" name="remember" checked class="rounded border-slate-700 bg-slate-800 text-emerald-500 focus:ring-0">
                    <span>Remember session</span>
                </label>
            </div>

            <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-semibold text-sm py-3.5 rounded-xl transition-all shadow-lg">
                Sign In to Dashboard
            </button>
        </form>

        <div class="text-center pt-2 text-[11px] text-slate-500">
            Default Demo Credentials: <strong class="text-slate-300">admin@coremovephysio.com</strong> / <strong class="text-slate-300">password</strong>
        </div>

    </div>

</body>
</html>
