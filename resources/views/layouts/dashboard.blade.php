<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard - Nyumba360')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link href="https://fonts.bunny.net/css?family=Nunito:400,500,600,700,800,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: { 50:'#FBEDEF',100:'#F5D5DA',200:'#E8AAB5',300:'#C55B6E',400:'#8E2035',500:'#7C1528',600:'#5A0917',700:'#4A0712',800:'#3A050E',900:'#2A040A',950:'#1A0306' },
                        gold: { 50:'#FEF5EB',100:'#FDE6CC',200:'#FBC499',300:'#F9A54E',400:'#F6891F',500:'#D66F0E',600:'#B05A0A',700:'#8A4708',800:'#7A3D05',900:'#5C2E04',950:'#3D1E02' },
                        cream: '#F7F4F1'
                    }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Nunito', sans-serif; }
        .sidebar-link { transition: all 0.2s; }
        .sidebar-link:hover { background-color: rgba(90,9,23,0.08); }
        .sidebar-link.active { background-color: #5A0917; color: white; }
    </style>
</head>
<body class="bg-cream min-h-screen">

<div class="flex min-h-screen">
    {{-- Sidebar --}}
    <aside class="w-64 bg-white border-r border-[#E6E0DA] fixed inset-y-0 left-0 z-30 flex flex-col {{ request()->is('admin/*') ? '' : '' }}">
        <div class="p-5 border-b border-[#E6E0DA]">
            <a href="{{ route('landing') }}" class="flex items-center gap-2.5">
                <img src="{{ asset('logowhite.png') }}" alt="Nyumba360" class="w-9 h-9 object-contain">
                <span class="text-lg font-extrabold text-brand-600">Nyumba<span class="text-gold-400">360</span></span>
            </a>
        </div>

        <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
            <a href="{{ route('dashboard') }}" class="sidebar-link {{ request()->routeIs('dashboard') || request()->routeIs('home') ? 'active' : '' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold text-gray-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Dashboard
            </a>

            @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.properties.pending') }}" class="sidebar-link {{ request()->routeIs('admin.properties.*') ? 'active' : '' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold text-gray-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Property Approvals
                </a>
                <a href="{{ route('admin.kyc.pending') }}" class="sidebar-link {{ request()->routeIs('admin.kyc.*') ? 'active' : '' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold text-gray-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    KYC Review
                </a>
                <a href="{{ route('admin.revenue') }}" class="sidebar-link {{ request()->routeIs('admin.revenue') ? 'active' : '' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold text-gray-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Revenue
                </a>
                <a href="{{ route('admin.users') }}" class="sidebar-link {{ request()->routeIs('admin.users') ? 'active' : '' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold text-gray-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    Users
                </a>
                <a href="{{ route('admin.settings') }}" class="sidebar-link {{ request()->routeIs('admin.settings') ? 'active' : '' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold text-gray-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Pricing Settings
                </a>
                <a href="{{ route('admin.audit') }}" class="sidebar-link {{ request()->routeIs('admin.audit') ? 'active' : '' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold text-gray-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Audit Log
                </a>
            @endif

            @if(auth()->user()->isLandlord() || auth()->user()->isBroker())
                <a href="{{ route('properties.create') }}" class="sidebar-link {{ request()->routeIs('properties.create') ? 'active' : '' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold text-gray-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    List Property
                </a>
                @if(auth()->user()->isLandlord())
                    <a href="{{ route('payment.landlord-plans') }}" class="sidebar-link {{ request()->routeIs('payment.landlord-plans') ? 'active' : '' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold text-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                        Subscription Plans
                    </a>
                @endif
                @if(auth()->user()->isBroker())
                    <a href="{{ route('payment.broker-pass') }}" class="sidebar-link {{ request()->routeIs('payment.broker-pass') ? 'active' : '' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold text-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Broker Pass
                    </a>
                @endif
            @endif

            @if(auth()->user()->isSeeker())
                <a href="{{ route('properties.index') }}" class="sidebar-link {{ request()->routeIs('properties.index') ? 'active' : '' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold text-gray-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    Browse Properties
                </a>
            @endif

            <a href="{{ route('payment.history') }}" class="sidebar-link {{ request()->routeIs('payment.history') ? 'active' : '' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold text-gray-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                Payment History
            </a>

            @if(auth()->user()->isLandlord() || auth()->user()->isBroker())
                <a href="{{ route('kyc.create') }}" class="sidebar-link {{ request()->routeIs('kyc.*') ? 'active' : '' }} flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold text-gray-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                    KYC Verification
                    @if(!auth()->user()->isKycVerified())
                        <span class="ml-auto w-2 h-2 bg-red-500 rounded-full"></span>
                    @endif
                </a>
            @endif
        </nav>

        <div class="p-3 border-t border-[#E6E0DA]">
            <div class="flex items-center gap-3 px-2 py-2">
                <div class="w-9 h-9 bg-brand-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs font-bold text-gray-900 truncate">{{ auth()->user()->name }}</p>
                    <p class="text-[10px] text-gray-400 capitalize">{{ auth()->user()->role }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full mt-2 flex items-center gap-2 px-3 py-2 text-xs font-semibold text-gray-500 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Sign Out
                </button>
            </form>
        </div>
    </aside>

    {{-- Main Content --}}
    <div class="flex-1 ml-64">
        {{-- Top Bar --}}
        <header class="bg-white border-b border-[#E6E0DA] px-6 py-3 flex items-center justify-between sticky top-0 z-20">
            <h1 class="text-lg font-extrabold text-gray-900">@yield('page_title', 'Dashboard')</h1>
            <div class="flex items-center gap-3">
                <a href="{{ route('landing') }}" class="text-xs font-semibold text-gray-500 hover:text-brand-600 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Back to Site
                </a>
            </div>
        </header>

        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="mx-6 mt-4 p-3 bg-green-50 border border-green-200 rounded-lg text-sm text-green-700 font-semibold flex items-center gap-2">
                <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mx-6 mt-4 p-3 bg-red-50 border border-red-200 rounded-lg text-sm text-red-700 font-semibold flex items-center gap-2">
                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                {{ session('error') }}
            </div>
        @endif
        @if(session('info'))
            <div class="mx-6 mt-4 p-3 bg-blue-50 border border-blue-200 rounded-lg text-sm text-blue-700 font-semibold flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                {{ session('info') }}
            </div>
        @endif

        {{-- Page Content --}}
        <main class="p-6">
            @yield('content')
        </main>
    </div>
</div>

@yield('scripts')
</body>
</html>
