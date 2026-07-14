@extends('layouts.landing')

@section('title', 'Nyumba360 - Find Your Perfect Rental Home')

@section('content')

{{-- ===== NAVBAR ===== --}}
<nav class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md border-b border-[#E6E0DA] shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex items-center gap-2.5 flex-shrink-0">
                <img src="{{ asset('logowhite.png') }}" alt="Nyumba360" class="w-9 h-9 object-contain">
                <span class="text-xl font-extrabold text-brand-600 tracking-tight hidden sm:block">Nyumba<span class="text-gold-400">360</span></span>
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden md:flex items-center gap-6">
                <a href="{{ url('/') }}" class="text-sm font-semibold text-gray-600 hover:text-brand-600 transition-colors">Home</a>
                <a href="#browse" class="text-sm font-semibold text-gray-600 hover:text-brand-600 transition-colors">Browse</a>
                <a href="#featured" class="text-sm font-semibold text-gray-600 hover:text-brand-600 transition-colors">Featured</a>

                {{-- Properties Dropdown --}}
                <div class="relative group">
                    <button class="flex items-center gap-1 text-sm font-semibold text-gray-600 hover:text-brand-600 transition-colors">
                        Properties
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="absolute left-0 top-full pt-2 invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-all duration-200">
                        <div class="bg-white rounded-xl shadow-xl border border-[#E6E0DA] py-2 w-48">
                            <a href="#" class="flex items-center gap-2.5 px-4 py-2 text-sm text-gray-600 hover:bg-brand-50 hover:text-brand-600 transition-colors">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                Houses
                            </a>
                            <a href="#" class="flex items-center gap-2.5 px-4 py-2 text-sm text-gray-600 hover:bg-brand-50 hover:text-brand-600 transition-colors">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                Apartments
                            </a>
                            <a href="#" class="flex items-center gap-2.5 px-4 py-2 text-sm text-gray-600 hover:bg-brand-50 hover:text-brand-600 transition-colors">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                                Studios
                            </a>
                            <a href="#" class="flex items-center gap-2.5 px-4 py-2 text-sm text-gray-600 hover:bg-brand-50 hover:text-brand-600 transition-colors">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21V8l9-5 9 5v13M3 21h18M9 21V12h6v9"/></svg>
                                Maisonettes
                            </a>
                            <div class="border-t border-[#E6E0DA] my-1.5"></div>
                            <a href="#" class="flex items-center gap-2.5 px-4 py-2 text-sm text-gray-600 hover:bg-brand-50 hover:text-brand-600 transition-colors">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A48.774 48.774 0 0112 18c-2.292 0-4.535-.238-6.694-.686M5 20.5L3 15m18 5.5L21 15M3 15h18M3 15V8a2 2 0 012-2h14a2 2 0 012 2v7"/></svg>
                                Commercial
                            </a>
                        </div>
                    </div>
                </div>

                <a href="#request" class="text-sm font-semibold text-gray-600 hover:text-brand-600 transition-colors">Make a Request</a>
                <a href="#" class="text-sm font-semibold text-gray-600 hover:text-brand-600 transition-colors">About</a>
                <a href="#" class="text-sm font-semibold text-gray-600 hover:text-brand-600 transition-colors">Contact</a>
            </div>

            {{-- Right Side: Language + Auth --}}
            <div class="flex items-center gap-3">
                {{-- Language Dropdown --}}
                <div class="relative group">
                    <button class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg hover:bg-gray-100 transition-colors">
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.6 9h16.8M3.6 15h16.8M11 3v18M3 5a16 16 0 0118 0M3 19a16 16 0 0018 0"/></svg>
                        <span class="text-xs font-semibold text-gray-600 hidden sm:block">EN</span>
                        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="absolute right-0 top-full pt-2 invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-all duration-200">
                        <div class="bg-white rounded-xl shadow-xl border border-[#E6E0DA] py-2 w-40">
                            <a href="#" class="flex items-center justify-between px-4 py-2 text-sm text-brand-600 bg-brand-50 font-semibold transition-colors">
                                <span class="flex items-center gap-2">
                                    <span class="text-base">🇬🇧</span> English
                                </span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </a>
                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-600 hover:bg-brand-50 hover:text-brand-600 transition-colors">
                                <span class="text-base">🇹🇿</span> Kiswahili
                            </a>
                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-600 hover:bg-brand-50 hover:text-brand-600 transition-colors">
                                <span class="text-base">🇫🇷</span> Français
                            </a>
                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-600 hover:bg-brand-50 hover:text-brand-600 transition-colors">
                                <span class="text-base">🇵🇹</span> Português
                            </a>
                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-600 hover:bg-brand-50 hover:text-brand-600 transition-colors">
                                <span class="text-base">🇸🇦</span> العربية
                            </a>
                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-600 hover:bg-brand-50 hover:text-brand-600 transition-colors">
                                <span class="text-base">🇨🇳</span> 中文
                            </a>
                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-600 hover:bg-brand-50 hover:text-brand-600 transition-colors">
                                <span class="text-base">🇩🇪</span> Deutsch
                            </a>
                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-600 hover:bg-brand-50 hover:text-brand-600 transition-colors">
                                <span class="text-base">🇪🇸</span> Español
                            </a>
                        </div>
                    </div>
                </div>

                @auth
                    <a href="{{ url('/home') }}" class="hidden sm:block text-sm font-semibold text-gray-600 hover:text-brand-600 transition-colors">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 text-sm font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all shadow-sm">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hidden sm:block text-sm font-semibold text-gray-600 hover:text-brand-600 transition-colors">Sign in</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-bold text-white bg-gold-400 hover:bg-gold-500 rounded-lg transition-all shadow-sm">
                        Get Started
                    </a>
                @endauth

                {{-- Mobile Menu Toggle --}}
                <button id="mobileMenuBtn" class="md:hidden w-9 h-9 flex items-center justify-center rounded-lg hover:bg-gray-100 transition-colors">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div id="mobileMenu" class="md:hidden hidden bg-white border-t border-[#E6E0DA]">
        <div class="px-4 py-3 space-y-1">
            <a href="{{ url('/') }}" class="block px-3 py-2 text-sm font-semibold text-gray-600 hover:bg-brand-50 hover:text-brand-600 rounded-lg transition-colors">Home</a>
            <a href="#browse" class="block px-3 py-2 text-sm font-semibold text-gray-600 hover:bg-brand-50 hover:text-brand-600 rounded-lg transition-colors">Browse</a>
            <a href="#featured" class="block px-3 py-2 text-sm font-semibold text-gray-600 hover:bg-brand-50 hover:text-brand-600 rounded-lg transition-colors">Featured</a>
            <a href="#request" class="block px-3 py-2 text-sm font-semibold text-gray-600 hover:bg-brand-50 hover:text-brand-600 rounded-lg transition-colors">Make a Request</a>
            <a href="#" class="block px-3 py-2 text-sm font-semibold text-gray-600 hover:bg-brand-50 hover:text-brand-600 rounded-lg transition-colors">About</a>
            <a href="#" class="block px-3 py-2 text-sm font-semibold text-gray-600 hover:bg-brand-50 hover:text-brand-600 rounded-lg transition-colors">Contact</a>
            @auth
                <a href="{{ url('/home') }}" class="block px-3 py-2 text-sm font-semibold text-gray-600 hover:bg-brand-50 hover:text-brand-600 rounded-lg transition-colors">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="block px-3 py-2 text-sm font-semibold text-gray-600 hover:bg-brand-50 hover:text-brand-600 rounded-lg transition-colors">Sign in</a>
            @endauth
        </div>
    </div>
</nav>

{{-- ===== HERO SECTION ===== --}}
<section class="relative pt-16 overflow-hidden">
    {{-- Background --}}
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-hero"></div>
        <div class="absolute inset-0 bg-brand-600/85"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-brand-950/60 via-brand-800/40 to-brand-600/60"></div>
    </div>

    {{-- Content --}}
    <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-center">
        <div class="fade-up">
            <h1 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight mb-2">
                Find Your Perfect
                <span class="bg-gradient-to-r from-gold-300 to-gold-500 bg-clip-text text-transparent">Rental Home</span>
            </h1>
            <p class="text-sm text-brand-100 max-w-xl mx-auto mb-6">
                Browse thousands of verified houses, apartments, and studios for rent across Tanzania.
            </p>

            {{-- Search Bar --}}
            <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-2xl p-3 border border-white/20">
                <div class="flex flex-col sm:flex-row gap-3">
                    {{-- Location --}}
                    <div class="flex-1 relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <input type="text" placeholder="Search by location (e.g. Kigamboni, Mikocheni)" class="w-full pl-11 pr-4 py-3 rounded-xl border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm">
                    </div>
                    {{-- Type --}}
                    <div class="sm:w-44 relative">
                        <select class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm text-gray-700 appearance-none bg-white cursor-pointer">
                            <option value="">All Types</option>
                            <option value="house">House</option>
                            <option value="apartment">Apartment</option>
                            <option value="studio">Studio</option>
                            <option value="maisonette">Maisonette</option>
                        </select>
                        <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                    </div>
                    {{-- Search Button --}}
                    <button class="px-6 py-3 text-sm font-bold text-white bg-gold-400 hover:bg-gold-500 rounded-xl transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2 whitespace-nowrap">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        Search
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== BROWSE BY CATEGORY ===== --}}
<section id="browse" class="py-6 bg-cream border-y border-[#E6E0DA]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-3 mb-4">
            <h2 class="text-sm font-extrabold text-gray-900">Browse by Category</h2>
            <div class="flex-1 h-px bg-[#E6E0DA]"></div>
        </div>

        {{-- Horizontal scroll on mobile, flex on desktop --}}
        <div class="flex gap-2.5 overflow-x-auto scrollbar-hide pb-1 sm:justify-between">

            {{-- House --}}
            <a href="{{ route('category', 'houses') }}" class="card-hover group flex flex-col items-center gap-1.5 bg-white rounded-lg p-3 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20 sm:w-auto">
                <div class="w-9 h-9 bg-brand-50 rounded-lg flex items-center justify-center group-hover:bg-brand-100 transition-colors">
                    <svg class="w-4.5 h-4.5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </div>
                <span class="text-[11px] font-semibold text-gray-700 group-hover:text-brand-600 transition-colors whitespace-nowrap">Houses</span>
            </a>

            {{-- Apartment --}}
            <a href="{{ route('category', 'apartments') }}" class="card-hover group flex flex-col items-center gap-1.5 bg-white rounded-lg p-3 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20 sm:w-auto">
                <div class="w-9 h-9 bg-brand-50 rounded-lg flex items-center justify-center group-hover:bg-brand-100 transition-colors">
                    <svg class="w-4.5 h-4.5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <span class="text-[11px] font-semibold text-gray-700 group-hover:text-brand-600 transition-colors whitespace-nowrap">Apartments</span>
            </a>

            {{-- Studio --}}
            <a href="{{ route('category', 'studios') }}" class="card-hover group flex flex-col items-center gap-1.5 bg-white rounded-lg p-3 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20 sm:w-auto">
                <div class="w-9 h-9 bg-brand-50 rounded-lg flex items-center justify-center group-hover:bg-brand-100 transition-colors">
                    <svg class="w-4.5 h-4.5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                </div>
                <span class="text-[11px] font-semibold text-gray-700 group-hover:text-brand-600 transition-colors whitespace-nowrap">Studios</span>
            </a>

            {{-- Maisonette --}}
            <a href="{{ route('category', 'maisonettes') }}" class="card-hover group flex flex-col items-center gap-1.5 bg-white rounded-lg p-3 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20 sm:w-auto">
                <div class="w-9 h-9 bg-brand-50 rounded-lg flex items-center justify-center group-hover:bg-brand-100 transition-colors">
                    <svg class="w-4.5 h-4.5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 21V8l9-5 9 5v13M3 21h18M9 21V12h6v9"/></svg>
                </div>
                <span class="text-[11px] font-semibold text-gray-700 group-hover:text-brand-600 transition-colors whitespace-nowrap">Maisonettes</span>
            </a>

            {{-- Commercial --}}
            <a href="{{ route('category', 'commercial') }}" class="card-hover group flex flex-col items-center gap-1.5 bg-white rounded-lg p-3 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20 sm:w-auto">
                <div class="w-9 h-9 bg-brand-50 rounded-lg flex items-center justify-center group-hover:bg-brand-100 transition-colors">
                    <svg class="w-4.5 h-4.5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A48.774 48.774 0 0112 18c-2.292 0-4.535-.238-6.694-.686M5 20.5L3 15m18 5.5L21 15M3 15h18M3 15V8a2 2 0 012-2h14a2 2 0 012 2v7"/></svg>
                </div>
                <span class="text-[11px] font-semibold text-gray-700 group-hover:text-brand-600 transition-colors whitespace-nowrap">Commercial</span>
            </a>

            {{-- Office --}}
            <a href="{{ route('category', 'office') }}" class="card-hover group flex flex-col items-center gap-1.5 bg-white rounded-lg p-3 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20 sm:w-auto">
                <div class="w-9 h-9 bg-brand-50 rounded-lg flex items-center justify-center group-hover:bg-brand-100 transition-colors">
                    <svg class="w-4.5 h-4.5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A48.774 48.774 0 0112 18c-2.292 0-4.535-.238-6.694-.686M5 20.5L3 15m18 5.5L21 15M3 15h18M3 15V8a2 2 0 012-2h14a2 2 0 012 2v7"/></svg>
                </div>
                <span class="text-[11px] font-semibold text-gray-700 group-hover:text-brand-600 transition-colors whitespace-nowrap">Office</span>
            </a>

            {{-- Shop --}}
            <a href="{{ route('category', 'shops') }}" class="card-hover group flex flex-col items-center gap-1.5 bg-white rounded-lg p-3 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20 sm:w-auto">
                <div class="w-9 h-9 bg-brand-50 rounded-lg flex items-center justify-center group-hover:bg-brand-100 transition-colors">
                    <svg class="w-4.5 h-4.5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <span class="text-[11px] font-semibold text-gray-700 group-hover:text-brand-600 transition-colors whitespace-nowrap">Shops</span>
            </a>

            {{-- Hostel --}}
            <a href="{{ route('category', 'hostels') }}" class="card-hover group flex flex-col items-center gap-1.5 bg-white rounded-lg p-3 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20 sm:w-auto">
                <div class="w-9 h-9 bg-brand-50 rounded-lg flex items-center justify-center group-hover:bg-brand-100 transition-colors">
                    <svg class="w-4.5 h-4.5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
                <span class="text-[11px] font-semibold text-gray-700 group-hover:text-brand-600 transition-colors whitespace-nowrap">Hostels</span>
            </a>

            {{-- Warehouse --}}
            <a href="{{ route('category', 'warehouse') }}" class="card-hover group flex flex-col items-center gap-1.5 bg-white rounded-lg p-3 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20 sm:w-auto">
                <div class="w-9 h-9 bg-brand-50 rounded-lg flex items-center justify-center group-hover:bg-brand-100 transition-colors">
                    <svg class="w-4.5 h-4.5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
                </div>
                <span class="text-[11px] font-semibold text-gray-700 group-hover:text-brand-600 transition-colors whitespace-nowrap">Warehouse</span>
            </a>

            {{-- Land --}}
            <a href="{{ route('category', 'land') }}" class="card-hover group flex flex-col items-center gap-1.5 bg-white rounded-lg p-3 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20 sm:w-auto">
                <div class="w-9 h-9 bg-brand-50 rounded-lg flex items-center justify-center group-hover:bg-brand-100 transition-colors">
                    <svg class="w-4.5 h-4.5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5h16M4 5v14a2 2 0 002 2h12a2 2 0 002-2V5M4 5l4-2h8l4 2M9 9h6M9 13h6"/></svg>
                </div>
                <span class="text-[11px] font-semibold text-gray-700 group-hover:text-brand-600 transition-colors whitespace-nowrap">Land</span>
            </a>

        </div>
    </div>
</section>

{{-- ===== BROWSE BY REGION (MIKOA) ===== --}}
<section id="regions" class="py-6 bg-white border-b border-[#E6E0DA]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-1.5 h-5 bg-brand-600 rounded-full"></div>
            <h2 class="text-sm font-extrabold text-gray-900">Browse by Region (Mikoa)</h2>
            <div class="flex-1 h-px bg-[#E6E0DA]"></div>
            <span class="text-[10px] text-gray-400 hidden sm:block">31 regions across Tanzania</span>
        </div>

        {{-- Regions scroll --}}
        <div class="flex gap-2 overflow-x-auto scrollbar-hide pb-1">
            <a href="#" data-region="dar_es_salaam" class="region-chip card-hover group flex flex-col items-center gap-1 bg-gradient-to-br from-brand-50 to-white rounded-lg p-2.5 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20">
                <div class="w-8 h-8 bg-brand-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-700 group-hover:text-brand-600 transition-colors text-center leading-tight">Dar es<br>Salaam</span>
                <span class="text-[8px] text-gray-400">1,240</span>
            </a>
            <a href="#" data-region="arusha" class="region-chip card-hover group flex flex-col items-center gap-1 bg-gradient-to-br from-brand-50 to-white rounded-lg p-2.5 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20">
                <div class="w-8 h-8 bg-gold-400 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-700 group-hover:text-brand-600 transition-colors text-center">Arusha</span>
                <span class="text-[8px] text-gray-400">420</span>
            </a>
            <a href="#" data-region="mwanza" class="region-chip card-hover group flex flex-col items-center gap-1 bg-gradient-to-br from-brand-50 to-white rounded-lg p-2.5 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20">
                <div class="w-8 h-8 bg-brand-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-700 group-hover:text-brand-600 transition-colors text-center">Mwanza</span>
                <span class="text-[8px] text-gray-400">380</span>
            </a>
            <a href="#" data-region="dodoma" class="region-chip card-hover group flex flex-col items-center gap-1 bg-gradient-to-br from-brand-50 to-white rounded-lg p-2.5 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20">
                <div class="w-8 h-8 bg-gold-400 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-700 group-hover:text-brand-600 transition-colors text-center">Dodoma</span>
                <span class="text-[8px] text-gray-400">310</span>
            </a>
            <a href="#" data-region="tanga" class="region-chip card-hover group flex flex-col items-center gap-1 bg-gradient-to-br from-brand-50 to-white rounded-lg p-2.5 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20">
                <div class="w-8 h-8 bg-brand-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-700 group-hover:text-brand-600 transition-colors text-center">Tanga</span>
                <span class="text-[8px] text-gray-400">250</span>
            </a>
            <a href="#" data-region="morogoro" class="region-chip card-hover group flex flex-col items-center gap-1 bg-gradient-to-br from-brand-50 to-white rounded-lg p-2.5 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20">
                <div class="w-8 h-8 bg-gold-400 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-700 group-hover:text-brand-600 transition-colors text-center">Morogoro</span>
                <span class="text-[8px] text-gray-400">230</span>
            </a>
            <a href="#" data-region="mbeya" class="region-chip card-hover group flex flex-col items-center gap-1 bg-gradient-to-br from-brand-50 to-white rounded-lg p-2.5 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20">
                <div class="w-8 h-8 bg-brand-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-700 group-hover:text-brand-600 transition-colors text-center">Mbeya</span>
                <span class="text-[8px] text-gray-400">290</span>
            </a>
            <a href="#" data-region="kilimanjaro" class="region-chip card-hover group flex flex-col items-center gap-1 bg-gradient-to-br from-brand-50 to-white rounded-lg p-2.5 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20">
                <div class="w-8 h-8 bg-gold-400 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-700 group-hover:text-brand-600 transition-colors text-center">Kili-<br>manjaro</span>
                <span class="text-[8px] text-gray-400">340</span>
            </a>
            <a href="#" data-region="zanzibar" class="region-chip card-hover group flex flex-col items-center gap-1 bg-gradient-to-br from-brand-50 to-white rounded-lg p-2.5 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20">
                <div class="w-8 h-8 bg-brand-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-700 group-hover:text-brand-600 transition-colors text-center">Zanzibar</span>
                <span class="text-[8px] text-gray-400">520</span>
            </a>
            <a href="#" data-region="mara" class="region-chip card-hover group flex flex-col items-center gap-1 bg-gradient-to-br from-brand-50 to-white rounded-lg p-2.5 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20">
                <div class="w-8 h-8 bg-gold-400 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-700 group-hover:text-brand-600 transition-colors text-center">Mara</span>
                <span class="text-[8px] text-gray-400">180</span>
            </a>
            <a href="#" data-region="pwani" class="region-chip card-hover group flex flex-col items-center gap-1 bg-gradient-to-br from-brand-50 to-white rounded-lg p-2.5 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20">
                <div class="w-8 h-8 bg-brand-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-700 group-hover:text-brand-600 transition-colors text-center">Pwani</span>
                <span class="text-[8px] text-gray-400">210</span>
            </a>
            <a href="#" data-region="kigoma" class="region-chip card-hover group flex flex-col items-center gap-1 bg-gradient-to-br from-brand-50 to-white rounded-lg p-2.5 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20">
                <div class="w-8 h-8 bg-gold-400 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-700 group-hover:text-brand-600 transition-colors text-center">Kigoma</span>
                <span class="text-[8px] text-gray-400">150</span>
            </a>
            <a href="#" data-region="iringa" class="region-chip card-hover group flex flex-col items-center gap-1 bg-gradient-to-br from-brand-50 to-white rounded-lg p-2.5 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20">
                <div class="w-8 h-8 bg-brand-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-700 group-hover:text-brand-600 transition-colors text-center">Iringa</span>
                <span class="text-[8px] text-gray-400">170</span>
            </a>
            <a href="#" data-region="ruvuma" class="region-chip card-hover group flex flex-col items-center gap-1 bg-gradient-to-br from-brand-50 to-white rounded-lg p-2.5 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20">
                <div class="w-8 h-8 bg-gold-400 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-700 group-hover:text-brand-600 transition-colors text-center">Ruvuma</span>
                <span class="text-[8px] text-gray-400">140</span>
            </a>
            <a href="#" data-region="manyara" class="region-chip card-hover group flex flex-col items-center gap-1 bg-gradient-to-br from-brand-50 to-white rounded-lg p-2.5 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20">
                <div class="w-8 h-8 bg-brand-600 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-700 group-hover:text-brand-600 transition-colors text-center">Manyara</span>
                <span class="text-[8px] text-gray-400">130</span>
            </a>
            <a href="#" data-region="shinyanga" class="region-chip card-hover group flex flex-col items-center gap-1 bg-gradient-to-br from-brand-50 to-white rounded-lg p-2.5 border border-[#E6E0DA] hover:border-brand-300 hover:shadow-sm flex-shrink-0 w-20">
                <div class="w-8 h-8 bg-gold-400 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <span class="text-[10px] font-bold text-gray-700 group-hover:text-brand-600 transition-colors text-center">Shinyanga</span>
                <span class="text-[8px] text-gray-400">120</span>
            </a>
        </div>
    </div>
</section>

{{-- ===== FILTER BAR ===== --}}
<section id="filterBar" class="sticky top-16 z-40 bg-white border-b border-[#E6E0DA] shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2.5">
        <div class="flex flex-col sm:flex-row gap-2 sm:items-center">
            <div class="flex items-center gap-1.5 text-xs font-bold text-gray-700 hidden sm:flex">
                <svg class="w-4 h-4 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                Filter:
            </div>
            <select id="filterRegion" class="flex-1 px-3 py-2 rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-xs bg-white cursor-pointer text-gray-700">
                <option value="">All Regions</option>
                <option value="dar_es_salaam">Dar es Salaam</option>
                <option value="arusha">Arusha</option>
                <option value="mwanza">Mwanza</option>
                <option value="dodoma">Dodoma</option>
                <option value="tanga">Tanga</option>
                <option value="morogoro">Morogoro</option>
                <option value="mbeya">Mbeya</option>
                <option value="kilimanjaro">Kilimanjaro</option>
                <option value="zanzibar">Zanzibar</option>
                <option value="mara">Mara</option>
                <option value="pwani">Pwani</option>
                <option value="kigoma">Kigoma</option>
                <option value="iringa">Iringa</option>
                <option value="ruvuma">Ruvuma</option>
                <option value="manyara">Manyara</option>
                <option value="shinyanga">Shinyanga</option>
            </select>
            <select id="filterPrice" class="flex-1 px-3 py-2 rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-xs bg-white cursor-pointer text-gray-700">
                <option value="">Any Price</option>
                <option value="0-200000">Under 200K</option>
                <option value="200000-500000">200K - 500K</option>
                <option value="500000-1000000">500K - 1M</option>
                <option value="1000000-2000000">1M - 2M</option>
                <option value="2000000-99999999">Above 2M</option>
            </select>
            <select id="filterType" class="flex-1 px-3 py-2 rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-xs bg-white cursor-pointer text-gray-700">
                <option value="">All Types</option>
                <option value="house">House</option>
                <option value="apartment">Apartment</option>
                <option value="studio">Studio</option>
                <option value="maisonette">Maisonette</option>
                <option value="villa">Villa</option>
            </select>
            <select id="filterBeds" class="flex-1 px-3 py-2 rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-xs bg-white cursor-pointer text-gray-700">
                <option value="">Any Beds</option>
                <option value="1">1 Bed</option>
                <option value="2">2 Beds</option>
                <option value="3">3 Beds</option>
                <option value="4">4 Beds</option>
                <option value="5">5+ Beds</option>
            </select>
            <button id="clearFilters" class="px-3 py-2 text-xs font-bold text-gray-500 hover:text-brand-600 bg-gray-100 hover:bg-brand-50 rounded-lg transition-all flex items-center justify-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                Clear
            </button>
        </div>
        <div id="filterResults" class="text-[10px] text-gray-400 mt-1.5 hidden">
            Showing <span id="resultCount" class="font-bold text-brand-600">0</span> properties matching your filters
        </div>
    </div>
</section>

{{-- ===== FEATURED HOUSES ===== --}}
<section id="featured" class="py-10 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-5">
            <div class="flex items-center gap-2">
                <div class="w-1.5 h-7 bg-gold-400 rounded-full"></div>
                <div>
                    <h2 class="text-lg font-extrabold text-gray-900">Featured Houses</h2>
                    <p class="text-[11px] text-gray-400">Handpicked premium rentals</p>
                </div>
            </div>
            <a href="#" class="inline-flex items-center gap-1 text-xs font-semibold text-brand-600 hover:text-brand-700 transition-colors">
                View All
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        {{-- Cards Grid --}}
        <div class="grid grid-cols-2 lg:grid-cols-6 gap-3">

            {{-- Card 1 --}}
            <div class="house-card card-hover bg-white rounded-xl overflow-hidden border border-[#E6E0DA] hover:shadow-lg" data-region="dar_es_salaam" data-price="450000" data-type="house" data-beds="3">
                <div class="relative h-32 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=400&q=80" alt="House" class="w-full h-full object-cover">
                    <div class="absolute top-2 left-2 flex gap-1">
                        <span class="px-1.5 py-0.5 bg-brand-600 text-white text-[8px] font-bold rounded-full">RENT</span>
                        <span class="px-1.5 py-0.5 bg-gold-400 text-white text-[8px] font-bold rounded-full">FEATURED</span>
                    </div>
                    <button class="absolute top-2 right-2 w-7 h-7 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-sm hover:bg-white transition-all group">
                        <svg class="w-3.5 h-3.5 text-brand-500 group-hover:fill-brand-500 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </button>
                    <div class="absolute bottom-2 left-2 px-2 py-0.5 bg-black/70 backdrop-blur-sm rounded">
                        <span class="text-white font-bold text-[10px]">TSh 450K</span>
                        <span class="text-gray-300 text-[8px]">/mo</span>
                    </div>
                </div>
                <div class="p-3">
                    <div class="flex items-center gap-1 text-[10px] text-gray-400 mb-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Mikocheni
                    </div>
                    <h3 class="font-bold text-gray-900 text-xs mb-2 truncate">3 Bedroom House</h3>
                    <div class="flex items-center gap-2 text-[10px] text-gray-500 mb-2">
                        <span>3 Beds</span>
                        <span>2 Baths</span>
                    </div>
                    <a href="{{ route('property.show', 1) }}" class="block w-full py-1.5 text-center text-[10px] font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all">
                        View
                    </a>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="house-card card-hover bg-white rounded-xl overflow-hidden border border-[#E6E0DA] hover:shadow-lg" data-region="dar_es_salaam" data-price="350000" data-type="apartment" data-beds="2">
                <div class="relative h-32 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c650?w=400&q=80" alt="Apartment" class="w-full h-full object-cover">
                    <div class="absolute top-2 left-2 flex gap-1">
                        <span class="px-1.5 py-0.5 bg-brand-600 text-white text-[8px] font-bold rounded-full">RENT</span>
                        <span class="px-1.5 py-0.5 bg-green-500 text-white text-[8px] font-bold rounded-full">NEW</span>
                    </div>
                    <button class="absolute top-2 right-2 w-7 h-7 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-sm hover:bg-white transition-all group">
                        <svg class="w-3.5 h-3.5 text-brand-500 group-hover:fill-brand-500 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </button>
                    <div class="absolute bottom-2 left-2 px-2 py-0.5 bg-black/70 backdrop-blur-sm rounded">
                        <span class="text-white font-bold text-[10px]">TSh 350K</span>
                        <span class="text-gray-300 text-[8px]">/mo</span>
                    </div>
                </div>
                <div class="p-3">
                    <div class="flex items-center gap-1 text-[10px] text-gray-400 mb-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Kigamboni
                    </div>
                    <h3 class="font-bold text-gray-900 text-xs mb-2 truncate">2 Bedroom Apartment</h3>
                    <div class="flex items-center gap-2 text-[10px] text-gray-500 mb-2">
                        <span>2 Beds</span>
                        <span>2 Baths</span>
                    </div>
                    <a href="{{ route('property.show', 2) }}" class="block w-full py-1.5 text-center text-[10px] font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all">
                        View
                    </a>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="house-card card-hover bg-white rounded-xl overflow-hidden border border-[#E6E0DA] hover:shadow-lg" data-region="dar_es_salaam" data-price="180000" data-type="studio" data-beds="1">
                <div class="relative h-32 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=400&q=80" alt="Studio" class="w-full h-full object-cover">
                    <div class="absolute top-2 left-2 flex gap-1">
                        <span class="px-1.5 py-0.5 bg-brand-600 text-white text-[8px] font-bold rounded-full">RENT</span>
                    </div>
                    <button class="absolute top-2 right-2 w-7 h-7 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-sm hover:bg-white transition-all group">
                        <svg class="w-3.5 h-3.5 text-brand-500 group-hover:fill-brand-500 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </button>
                    <div class="absolute bottom-2 left-2 px-2 py-0.5 bg-black/70 backdrop-blur-sm rounded">
                        <span class="text-white font-bold text-[10px]">TSh 180K</span>
                        <span class="text-gray-300 text-[8px]">/mo</span>
                    </div>
                </div>
                <div class="p-3">
                    <div class="flex items-center gap-1 text-[10px] text-gray-400 mb-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Sinza
                    </div>
                    <h3 class="font-bold text-gray-900 text-xs mb-2 truncate">Studio Apartment</h3>
                    <div class="flex items-center gap-2 text-[10px] text-gray-500 mb-2">
                        <span>1 Bed</span>
                        <span>1 Bath</span>
                    </div>
                    <a href="{{ route('property.show', 3) }}" class="block w-full py-1.5 text-center text-[10px] font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all">
                        View
                    </a>
                </div>
            </div>

            {{-- Card 4 --}}
            <div class="house-card card-hover bg-white rounded-xl overflow-hidden border border-[#E6E0DA] hover:shadow-lg" data-region="dar_es_salaam" data-price="850000" data-type="maisonette" data-beds="4">
                <div class="relative h-32 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1600596542815-05585f0aee67?w=400&q=80" alt="House" class="w-full h-full object-cover">
                    <div class="absolute top-2 left-2 flex gap-1">
                        <span class="px-1.5 py-0.5 bg-brand-600 text-white text-[8px] font-bold rounded-full">RENT</span>
                        <span class="px-1.5 py-0.5 bg-gold-400 text-white text-[8px] font-bold rounded-full">FEATURED</span>
                    </div>
                    <button class="absolute top-2 right-2 w-7 h-7 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-sm hover:bg-white transition-all group">
                        <svg class="w-3.5 h-3.5 text-brand-500 group-hover:fill-brand-500 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </button>
                    <div class="absolute bottom-2 left-2 px-2 py-0.5 bg-black/70 backdrop-blur-sm rounded">
                        <span class="text-white font-bold text-[10px]">TSh 850K</span>
                        <span class="text-gray-300 text-[8px]">/mo</span>
                    </div>
                </div>
                <div class="p-3">
                    <div class="flex items-center gap-1 text-[10px] text-gray-400 mb-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Masaki
                    </div>
                    <h3 class="font-bold text-gray-900 text-xs mb-2 truncate">4 Bedroom Maisonette</h3>
                    <div class="flex items-center gap-2 text-[10px] text-gray-500 mb-2">
                        <span>4 Beds</span>
                        <span>3 Baths</span>
                    </div>
                    <a href="{{ route('property.show', 4) }}" class="block w-full py-1.5 text-center text-[10px] font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all">
                        View
                    </a>
                </div>
            </div>

            {{-- Card 5 --}}
            <div class="house-card card-hover bg-white rounded-xl overflow-hidden border border-[#E6E0DA] hover:shadow-lg" data-region="dar_es_salaam" data-price="600000" data-type="apartment" data-beds="3">
                <div class="relative h-32 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1493809842364-78817add7ffb?w=400&q=80" alt="Apartment" class="w-full h-full object-cover">
                    <div class="absolute top-2 left-2 flex gap-1">
                        <span class="px-1.5 py-0.5 bg-brand-600 text-white text-[8px] font-bold rounded-full">RENT</span>
                        <span class="px-1.5 py-0.5 bg-green-500 text-white text-[8px] font-bold rounded-full">NEW</span>
                    </div>
                    <button class="absolute top-2 right-2 w-7 h-7 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-sm hover:bg-white transition-all group">
                        <svg class="w-3.5 h-3.5 text-brand-500 group-hover:fill-brand-500 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </button>
                    <div class="absolute bottom-2 left-2 px-2 py-0.5 bg-black/70 backdrop-blur-sm rounded">
                        <span class="text-white font-bold text-[10px]">TSh 600K</span>
                        <span class="text-gray-300 text-[8px]">/mo</span>
                    </div>
                </div>
                <div class="p-3">
                    <div class="flex items-center gap-1 text-[10px] text-gray-400 mb-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Mbezi Beach
                    </div>
                    <h3 class="font-bold text-gray-900 text-xs mb-2 truncate">3 Bedroom Apartment</h3>
                    <div class="flex items-center gap-2 text-[10px] text-gray-500 mb-2">
                        <span>3 Beds</span>
                        <span>2 Baths</span>
                    </div>
                    <a href="{{ route('property.show', 5) }}" class="block w-full py-1.5 text-center text-[10px] font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all">
                        View
                    </a>
                </div>
            </div>

            {{-- Card 6 --}}
            <div class="house-card card-hover bg-white rounded-xl overflow-hidden border border-[#E6E0DA] hover:shadow-lg" data-region="dar_es_salaam" data-price="250000" data-type="house" data-beds="2">
                <div class="relative h-32 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1583608205776-bfd35f0d9f83?w=400&q=80" alt="House" class="w-full h-full object-cover">
                    <div class="absolute top-2 left-2 flex gap-1">
                        <span class="px-1.5 py-0.5 bg-brand-600 text-white text-[8px] font-bold rounded-full">RENT</span>
                    </div>
                    <button class="absolute top-2 right-2 w-7 h-7 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-sm hover:bg-white transition-all group">
                        <svg class="w-3.5 h-3.5 text-brand-500 group-hover:fill-brand-500 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </button>
                    <div class="absolute bottom-2 left-2 px-2 py-0.5 bg-black/70 backdrop-blur-sm rounded">
                        <span class="text-white font-bold text-[10px]">TSh 250K</span>
                        <span class="text-gray-300 text-[8px]">/mo</span>
                    </div>
                </div>
                <div class="p-3">
                    <div class="flex items-center gap-1 text-[10px] text-gray-400 mb-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Tabata
                    </div>
                    <h3 class="font-bold text-gray-900 text-xs mb-2 truncate">2 Bedroom House</h3>
                    <div class="flex items-center gap-2 text-[10px] text-gray-500 mb-2">
                        <span>2 Beds</span>
                        <span>1 Bath</span>
                    </div>
                    <a href="{{ route('property.show', 6) }}" class="block w-full py-1.5 text-center text-[10px] font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all">
                        View
                    </a>
                </div>
            </div>

        </div>

        {{-- View All Button --}}
        <div class="text-center mt-6">
            <a href="#" class="inline-flex items-center gap-2 px-5 py-2.5 text-xs font-bold text-brand-600 bg-brand-50 hover:bg-brand-100 border border-brand-200 rounded-xl transition-all">
                View All Listings
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        {{-- No Results Message --}}
        <div id="noResultsMsg" class="text-center py-12 hidden">
            <div class="w-16 h-16 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-3">
                <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <h3 class="text-sm font-bold text-gray-700 mb-1">No Properties Found</h3>
            <p class="text-xs text-gray-400 mb-4">Try adjusting your filters to see more results</p>
            <button onclick="document.getElementById('clearFilters').click()" class="inline-flex items-center gap-2 px-4 py-2 text-xs font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                Clear All Filters
            </button>
        </div>
    </div>
</section>

{{-- ===== FAVORITES SECTION ===== --}}
<section id="favorites" class="py-10 bg-cream border-y border-[#E6E0DA]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-5">
            <div class="flex items-center gap-2">
                <div class="w-1.5 h-7 bg-brand-600 rounded-full"></div>
                <div>
                    <h2 class="text-lg font-extrabold text-gray-900">Most Favorited</h2>
                    <p class="text-[11px] text-gray-400">Top picks loved by renters</p>
                </div>
            </div>
            <a href="#" class="inline-flex items-center gap-1 text-xs font-semibold text-brand-600 hover:text-brand-700 transition-colors">
                See More
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        {{-- Favorites Grid --}}
        <div class="grid grid-cols-2 lg:grid-cols-6 gap-3">

            {{-- Fav Card 1 --}}
            <div class="house-card card-hover bg-white rounded-xl overflow-hidden border border-[#E6E0DA] hover:shadow-lg" data-region="dar_es_salaam" data-price="1200000" data-type="villa" data-beds="5">
                <div class="relative h-32 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=400&q=80" alt="House" class="w-full h-full object-cover">
                    <div class="absolute top-2 left-2 flex gap-1">
                        <span class="px-1.5 py-0.5 bg-brand-600 text-white text-[8px] font-bold rounded-full">RENT</span>
                    </div>
                    <div class="absolute top-2 right-2 flex items-center gap-0.5 px-1.5 py-0.5 bg-white/90 backdrop-blur-sm rounded-full shadow-sm">
                        <svg class="w-3 h-3 text-red-500 fill-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        <span class="text-[8px] font-bold text-gray-700">124</span>
                    </div>
                    <div class="absolute bottom-2 left-2 px-2 py-0.5 bg-black/70 backdrop-blur-sm rounded">
                        <span class="text-white font-bold text-[10px]">TSh 1.2M</span>
                        <span class="text-gray-300 text-[8px]">/mo</span>
                    </div>
                </div>
                <div class="p-3">
                    <div class="flex items-center gap-1 text-[10px] text-gray-400 mb-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Masaki
                    </div>
                    <h3 class="font-bold text-gray-900 text-xs mb-2 truncate">5 Bedroom Villa</h3>
                    <div class="flex items-center gap-2 text-[10px] text-gray-500 mb-2">
                        <span>5 Beds</span><span>4 Baths</span>
                    </div>
                    <a href="{{ route('property.show', 7) }}" class="block w-full py-1.5 text-center text-[10px] font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all">View</a>
                </div>
            </div>

            {{-- Fav Card 2 --}}
            <div class="house-card card-hover bg-white rounded-xl overflow-hidden border border-[#E6E0DA] hover:shadow-lg" data-region="dar_es_salaam" data-price="750000" data-type="house" data-beds="4">
                <div class="relative h-32 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1568605114967-8130f81a6abd?w=400&q=80" alt="House" class="w-full h-full object-cover">
                    <div class="absolute top-2 left-2 flex gap-1">
                        <span class="px-1.5 py-0.5 bg-brand-600 text-white text-[8px] font-bold rounded-full">RENT</span>
                    </div>
                    <div class="absolute top-2 right-2 flex items-center gap-0.5 px-1.5 py-0.5 bg-white/90 backdrop-blur-sm rounded-full shadow-sm">
                        <svg class="w-3 h-3 text-red-500 fill-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        <span class="text-[8px] font-bold text-gray-700">98</span>
                    </div>
                    <div class="absolute bottom-2 left-2 px-2 py-0.5 bg-black/70 backdrop-blur-sm rounded">
                        <span class="text-white font-bold text-[10px]">TSh 750K</span>
                        <span class="text-gray-300 text-[8px]">/mo</span>
                    </div>
                </div>
                <div class="p-3">
                    <div class="flex items-center gap-1 text-[10px] text-gray-400 mb-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Oyster Bay
                    </div>
                    <h3 class="font-bold text-gray-900 text-xs mb-2 truncate">4 Bedroom House</h3>
                    <div class="flex items-center gap-2 text-[10px] text-gray-500 mb-2">
                        <span>4 Beds</span><span>3 Baths</span>
                    </div>
                    <a href="{{ route('property.show', 8) }}" class="block w-full py-1.5 text-center text-[10px] font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all">View</a>
                </div>
            </div>

            {{-- Fav Card 3 --}}
            <div class="house-card card-hover bg-white rounded-xl overflow-hidden border border-[#E6E0DA] hover:shadow-lg" data-region="dar_es_salaam" data-price="500000" data-type="apartment" data-beds="3">
                <div class="relative h-32 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1570129477492-45c14393aa41?w=400&q=80" alt="Apartment" class="w-full h-full object-cover">
                    <div class="absolute top-2 left-2 flex gap-1">
                        <span class="px-1.5 py-0.5 bg-brand-600 text-white text-[8px] font-bold rounded-full">RENT</span>
                    </div>
                    <div class="absolute top-2 right-2 flex items-center gap-0.5 px-1.5 py-0.5 bg-white/90 backdrop-blur-sm rounded-full shadow-sm">
                        <svg class="w-3 h-3 text-red-500 fill-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        <span class="text-[8px] font-bold text-gray-700">87</span>
                    </div>
                    <div class="absolute bottom-2 left-2 px-2 py-0.5 bg-black/70 backdrop-blur-sm rounded">
                        <span class="text-white font-bold text-[10px]">TSh 500K</span>
                        <span class="text-gray-300 text-[8px]">/mo</span>
                    </div>
                </div>
                <div class="p-3">
                    <div class="flex items-center gap-1 text-[10px] text-gray-400 mb-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Upanga
                    </div>
                    <h3 class="font-bold text-gray-900 text-xs mb-2 truncate">3 Bedroom Apartment</h3>
                    <div class="flex items-center gap-2 text-[10px] text-gray-500 mb-2">
                        <span>3 Beds</span><span>2 Baths</span>
                    </div>
                    <a href="{{ route('property.show', 9) }}" class="block w-full py-1.5 text-center text-[10px] font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all">View</a>
                </div>
            </div>

            {{-- Fav Card 4 --}}
            <div class="house-card card-hover bg-white rounded-xl overflow-hidden border border-[#E6E0DA] hover:shadow-lg" data-region="dar_es_salaam" data-price="400000" data-type="house" data-beds="2">
                <div class="relative h-32 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1480074055461-7ab1a82d0782?w=400&q=80" alt="House" class="w-full h-full object-cover">
                    <div class="absolute top-2 left-2 flex gap-1">
                        <span class="px-1.5 py-0.5 bg-brand-600 text-white text-[8px] font-bold rounded-full">RENT</span>
                    </div>
                    <div class="absolute top-2 right-2 flex items-center gap-0.5 px-1.5 py-0.5 bg-white/90 backdrop-blur-sm rounded-full shadow-sm">
                        <svg class="w-3 h-3 text-red-500 fill-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        <span class="text-[8px] font-bold text-gray-700">76</span>
                    </div>
                    <div class="absolute bottom-2 left-2 px-2 py-0.5 bg-black/70 backdrop-blur-sm rounded">
                        <span class="text-white font-bold text-[10px]">TSh 400K</span>
                        <span class="text-gray-300 text-[8px]">/mo</span>
                    </div>
                </div>
                <div class="p-3">
                    <div class="flex items-center gap-1 text-[10px] text-gray-400 mb-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Mbezi
                    </div>
                    <h3 class="font-bold text-gray-900 text-xs mb-2 truncate">2 Bedroom House</h3>
                    <div class="flex items-center gap-2 text-[10px] text-gray-500 mb-2">
                        <span>2 Beds</span><span>2 Baths</span>
                    </div>
                    <a href="{{ route('property.show', 10) }}" class="block w-full py-1.5 text-center text-[10px] font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all">View</a>
                </div>
            </div>

            {{-- Fav Card 5 --}}
            <div class="house-card card-hover bg-white rounded-xl overflow-hidden border border-[#E6E0DA] hover:shadow-lg" data-region="dar_es_salaam" data-price="300000" data-type="apartment" data-beds="2">
                <div class="relative h-32 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1516455590576-3a75f3e4e66b?w=400&q=80" alt="Apartment" class="w-full h-full object-cover">
                    <div class="absolute top-2 left-2 flex gap-1">
                        <span class="px-1.5 py-0.5 bg-brand-600 text-white text-[8px] font-bold rounded-full">RENT</span>
                    </div>
                    <div class="absolute top-2 right-2 flex items-center gap-0.5 px-1.5 py-0.5 bg-white/90 backdrop-blur-sm rounded-full shadow-sm">
                        <svg class="w-3 h-3 text-red-500 fill-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        <span class="text-[8px] font-bold text-gray-700">65</span>
                    </div>
                    <div class="absolute bottom-2 left-2 px-2 py-0.5 bg-black/70 backdrop-blur-sm rounded">
                        <span class="text-white font-bold text-[10px]">TSh 300K</span>
                        <span class="text-gray-300 text-[8px]">/mo</span>
                    </div>
                </div>
                <div class="p-3">
                    <div class="flex items-center gap-1 text-[10px] text-gray-400 mb-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Sinza
                    </div>
                    <h3 class="font-bold text-gray-900 text-xs mb-2 truncate">2 Bedroom Apartment</h3>
                    <div class="flex items-center gap-2 text-[10px] text-gray-500 mb-2">
                        <span>2 Beds</span><span>1 Bath</span>
                    </div>
                    <a href="{{ route('property.show', 11) }}" class="block w-full py-1.5 text-center text-[10px] font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all">View</a>
                </div>
            </div>

            {{-- Fav Card 6 --}}
            <div class="house-card card-hover bg-white rounded-xl overflow-hidden border border-[#E6E0DA] hover:shadow-lg" data-region="dar_es_salaam" data-price="200000" data-type="studio" data-beds="1">
                <div class="relative h-32 overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1416339306562-f3d12fefd36f?w=400&q=80" alt="Studio" class="w-full h-full object-cover">
                    <div class="absolute top-2 left-2 flex gap-1">
                        <span class="px-1.5 py-0.5 bg-brand-600 text-white text-[8px] font-bold rounded-full">RENT</span>
                    </div>
                    <div class="absolute top-2 right-2 flex items-center gap-0.5 px-1.5 py-0.5 bg-white/90 backdrop-blur-sm rounded-full shadow-sm">
                        <svg class="w-3 h-3 text-red-500 fill-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        <span class="text-[8px] font-bold text-gray-700">52</span>
                    </div>
                    <div class="absolute bottom-2 left-2 px-2 py-0.5 bg-black/70 backdrop-blur-sm rounded">
                        <span class="text-white font-bold text-[10px]">TSh 200K</span>
                        <span class="text-gray-300 text-[8px]">/mo</span>
                    </div>
                </div>
                <div class="p-3">
                    <div class="flex items-center gap-1 text-[10px] text-gray-400 mb-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Kariakoo
                    </div>
                    <h3 class="font-bold text-gray-900 text-xs mb-2 truncate">Modern Studio</h3>
                    <div class="flex items-center gap-2 text-[10px] text-gray-500 mb-2">
                        <span>1 Bed</span><span>1 Bath</span>
                    </div>
                    <a href="{{ route('property.show', 12) }}" class="block w-full py-1.5 text-center text-[10px] font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all">View</a>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ===== MAKE A REQUEST SECTION ===== --}}
<section id="request" class="py-16 bg-gradient-to-br from-brand-950 via-brand-900 to-brand-800 relative overflow-hidden">
    {{-- Decorative circles --}}
    <div class="absolute top-10 left-10 w-72 h-72 bg-gold-400/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 right-10 w-96 h-96 bg-brand-500/10 rounded-full blur-3xl"></div>

    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-white/10 backdrop-blur-sm rounded-full border border-white/20 text-white text-xs font-semibold mb-3">
                <svg class="w-4 h-4 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Can't find what you need?
            </span>
            <h2 class="text-2xl font-extrabold text-white mb-2">Make a Request</h2>
            <p class="text-brand-100 text-sm max-w-xl mx-auto">Tell us what you're looking for and we'll match you with the perfect rental. Our team will get back to you within 24 hours.</p>
        </div>

        {{-- Request Form --}}
        <div class="bg-white rounded-2xl shadow-2xl p-6 sm:p-8 border border-white/10">
            <form class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Your Name</label>
                        <input type="text" placeholder="John Doe" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Phone Number</label>
                        <input type="tel" placeholder="+255 7XX XXX XXX" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm">
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Email</label>
                        <input type="email" placeholder="you@example.com" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Preferred Location</label>
                        <input type="text" placeholder="e.g. Mikocheni, Kigamboni" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm">
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Property Type</label>
                        <select class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm bg-white cursor-pointer">
                            <option value="">Any Type</option>
                            <option value="house">House</option>
                            <option value="apartment">Apartment</option>
                            <option value="studio">Studio</option>
                            <option value="maisonette">Maisonette</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Bedrooms</label>
                        <select class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm bg-white cursor-pointer">
                            <option value="">Any</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4+">4+</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1.5">Max Budget (TSh/mo)</label>
                        <input type="number" placeholder="e.g. 500000" class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1.5">Additional Notes</label>
                    <textarea rows="3" placeholder="Tell us about any specific requirements..." class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm resize-none"></textarea>
                </div>
                <button type="submit" class="w-full py-3 text-sm font-bold text-white bg-gradient-to-r from-gold-400 to-gold-500 hover:from-gold-500 hover:to-gold-600 rounded-xl shadow-lg hover:shadow-xl transition-all flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                    Submit Request
                </button>
            </form>
        </div>
    </div>
</section>

{{-- ===== DOWNLOAD MOBILE APP SECTION ===== --}}
<section class="py-16 bg-gradient-to-br from-brand-950 via-brand-900 to-brand-800 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-96 h-96 bg-gold-400/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 bg-brand-500/15 rounded-full blur-3xl"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">

            {{-- Left: Text --}}
            <div class="text-center lg:text-left">
                <span class="inline-flex items-center gap-2 px-4 py-1.5 bg-white/10 backdrop-blur-sm rounded-full border border-white/20 text-white text-xs font-semibold mb-4">
                    <svg class="w-4 h-4 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                    Mobile App Available Now
                </span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-3 leading-tight">
                    Find Your Home
                    <span class="bg-gradient-to-r from-gold-300 to-gold-500 bg-clip-text text-transparent">On The Go</span>
                </h2>
                <p class="text-brand-100 text-sm mb-6 max-w-md mx-auto lg:mx-0">
                    Download the Nyumba360 app and browse thousands of rental properties right from your phone. Save favorites, contact landlords, and get instant alerts.
                </p>

                {{-- Feature badges --}}
                <div class="grid grid-cols-2 gap-3 mb-6 max-w-md mx-auto lg:mx-0">
                    <div class="flex items-center gap-2.5 bg-white/5 backdrop-blur-sm rounded-xl p-3 border border-white/10">
                        <div class="w-9 h-9 bg-gold-400/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                        </div>
                        <div>
                            <p class="text-white text-xs font-bold">Instant Alerts</p>
                            <p class="text-brand-200 text-[10px]">New listings notify</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2.5 bg-white/5 backdrop-blur-sm rounded-xl p-3 border border-white/10">
                        <div class="w-9 h-9 bg-gold-400/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-white text-xs font-bold">Save Favorites</p>
                            <p class="text-brand-200 text-[10px]">Bookmark homes</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2.5 bg-white/5 backdrop-blur-sm rounded-xl p-3 border border-white/10">
                        <div class="w-9 h-9 bg-gold-400/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <p class="text-white text-xs font-bold">Direct Contact</p>
                            <p class="text-brand-200 text-[10px]">Call landlords</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2.5 bg-white/5 backdrop-blur-sm rounded-xl p-3 border border-white/10">
                        <div class="w-9 h-9 bg-gold-400/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                        </div>
                        <div>
                            <p class="text-white text-xs font-bold">Map View</p>
                            <p class="text-brand-200 text-[10px]">Explore areas</p>
                        </div>
                    </div>
                </div>

                {{-- Download Buttons --}}
                <div class="flex flex-col sm:flex-row gap-3 justify-center lg:justify-start">
                    <a href="#" class="inline-flex items-center gap-3 px-5 py-3 bg-white hover:bg-gray-100 rounded-xl transition-all shadow-lg">
                        <svg class="w-7 h-7 text-brand-900" fill="currentColor" viewBox="0 0 24 24"><path d="M17.05 20.283c-.98.9-2.05.8-3.08.4-1.09-.41-2.09-.42-3.24 0-1.44.56-2.19.4-3.06-.4C2.46 15.6 3.38 7.58 9.05 7.31c1.35.07 2.29.74 3.08.8 1.18-.24 2.31-.93 3.57-.8 1.51.12 2.65.72 3.4 1.8-3.12 1.87-2.38 5.98.48 7.13-.57 1.5-1.31 2.99-2.54 4.04zM12.03 7.25c-.15-2.23 1.66-4.07 3.74-4.25.29 2.58-2.34 4.5-3.74 4.25z"/></svg>
                        <div class="text-left">
                            <p class="text-[9px] text-gray-500 font-medium">Download on the</p>
                            <p class="text-sm font-bold text-gray-900 -mt-0.5">App Store</p>
                        </div>
                    </a>
                    <a href="#" class="inline-flex items-center gap-3 px-5 py-3 bg-white hover:bg-gray-100 rounded-xl transition-all shadow-lg">
                        <svg class="w-7 h-7" viewBox="0 0 24 24"><path fill="#34A853" d="M3.609 1.814L13.792 12 3.61 22.186a.996.996 0 01-.61-.92V2.734a1 1 0 01.609-.92z"/><path fill="#FBBC04" d="M17.222 8.184L13.792 12l3.43 3.816 3.815-2.193a1 1 0 000-2.246l-3.815-2.193z"/><path fill="#EA4335" d="M3.609 22.186L13.792 12l3.43 3.816-9.815 5.623a1 1 0 01-1.198-.253z"/><path fill="#4285F4" d="M3.609 1.814L13.792 12l3.43-3.816L7.407 2.561a1 1 0 00-1.198.253z"/></svg>
                        <div class="text-left">
                            <p class="text-[9px] text-gray-500 font-medium">GET IT ON</p>
                            <p class="text-sm font-bold text-gray-900 -mt-0.5">Google Play</p>
                        </div>
                    </a>
                </div>
            </div>

            {{-- Right: Phone Mockup --}}
            <div class="flex justify-center lg:justify-end">
                <div class="relative">
                    <div class="w-64 h-[520px] bg-brand-950 rounded-[2.5rem] border-4 border-gray-800 shadow-2xl overflow-hidden relative">
                        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-24 h-5 bg-gray-800 rounded-b-2xl z-20"></div>
                        <div class="w-full h-full bg-cream overflow-hidden pt-6">
                            <div class="bg-brand-600 px-4 py-3 flex items-center justify-between">
                                <div class="flex items-center gap-1.5">
                                    <img src="{{ asset('logowhite.png') }}" alt="Nyumba360" class="w-6 h-6 object-contain">
                                    <span class="text-white text-xs font-extrabold">Nyumba360</span>
                                </div>
                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5"/></svg>
                            </div>
                            <div class="px-3 py-2.5 bg-white border-b border-[#E6E0DA]">
                                <div class="flex items-center gap-2 bg-gray-100 rounded-lg px-2.5 py-1.5">
                                    <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                    <span class="text-[10px] text-gray-400">Search location...</span>
                                </div>
                            </div>
                            <div class="p-2.5 space-y-2.5">
                                <div class="bg-white rounded-lg overflow-hidden shadow-sm border border-[#E6E0DA]">
                                    <div class="relative h-20">
                                        <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=300&q=80" alt="" class="w-full h-full object-cover">
                                        <div class="absolute top-1.5 left-1.5 px-1.5 py-0.5 bg-brand-600 text-white text-[7px] font-bold rounded-full">RENT</div>
                                        <div class="absolute bottom-1.5 left-1.5 px-1.5 py-0.5 bg-black/70 rounded"><span class="text-white font-bold text-[8px]">TSh 450K</span></div>
                                    </div>
                                    <div class="p-2"><p class="text-[9px] font-bold text-gray-900 truncate">3 Bedroom House</p><p class="text-[8px] text-gray-400">Mikocheni</p></div>
                                </div>
                                <div class="bg-white rounded-lg overflow-hidden shadow-sm border border-[#E6E0DA]">
                                    <div class="relative h-20">
                                        <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c650?w=300&q=80" alt="" class="w-full h-full object-cover">
                                        <div class="absolute top-1.5 left-1.5 px-1.5 py-0.5 bg-brand-600 text-white text-[7px] font-bold rounded-full">RENT</div>
                                        <div class="absolute bottom-1.5 left-1.5 px-1.5 py-0.5 bg-black/70 rounded"><span class="text-white font-bold text-[8px]">TSh 350K</span></div>
                                    </div>
                                    <div class="p-2"><p class="text-[9px] font-bold text-gray-900 truncate">2 Bedroom Apartment</p><p class="text-[8px] text-gray-400">Kigamboni</p></div>
                                </div>
                                <div class="bg-white rounded-lg overflow-hidden shadow-sm border border-[#E6E0DA]">
                                    <div class="relative h-20">
                                        <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=300&q=80" alt="" class="w-full h-full object-cover">
                                        <div class="absolute top-1.5 left-1.5 px-1.5 py-0.5 bg-brand-600 text-white text-[7px] font-bold rounded-full">RENT</div>
                                        <div class="absolute bottom-1.5 left-1.5 px-1.5 py-0.5 bg-black/70 rounded"><span class="text-white font-bold text-[8px]">TSh 180K</span></div>
                                    </div>
                                    <div class="p-2"><p class="text-[9px] font-bold text-gray-900 truncate">Studio Apartment</p><p class="text-[8px] text-gray-400">Sinza</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -top-3 -right-3 bg-gold-400 text-white text-[10px] font-bold px-3 py-1.5 rounded-full shadow-lg flex items-center gap-1">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                        4.9 Rating
                    </div>
                    <div class="absolute -bottom-3 -left-3 bg-white text-brand-600 text-[10px] font-bold px-3 py-1.5 rounded-full shadow-lg flex items-center gap-1">
                        <svg class="w-3 h-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        10K+ Downloads
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ===== FOOTER ===== --}}
<footer class="bg-brand-950 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 mb-8">
            {{-- Brand --}}
            <div>
                <div class="flex items-center gap-2.5 mb-4">
                    <img src="{{ asset('logowhite.png') }}" alt="Nyumba360" class="w-9 h-9 object-contain">
                    <span class="text-xl font-extrabold tracking-tight">Nyumba<span class="text-gold-400">360</span></span>
                </div>
                <p class="text-sm text-brand-200 leading-relaxed">Find your perfect rental home across Tanzania. Verified listings, no agents, no hassle.</p>
            </div>
            {{-- Quick Links --}}
            <div>
                <h4 class="font-bold text-sm mb-4 text-gold-400 uppercase tracking-wide">Quick Links</h4>
                <ul class="space-y-2">
                    <li><a href="#browse" class="text-sm text-brand-200 hover:text-white transition-colors">Browse</a></li>
                    <li><a href="#featured" class="text-sm text-brand-200 hover:text-white transition-colors">Featured</a></li>
                    <li><a href="#request" class="text-sm text-brand-200 hover:text-white transition-colors">Make a Request</a></li>
                    <li><a href="{{ route('login') }}" class="text-sm text-brand-200 hover:text-white transition-colors">Sign in</a></li>
                </ul>
            </div>
            {{-- Categories --}}
            <div>
                <h4 class="font-bold text-sm mb-4 text-gold-400 uppercase tracking-wide">Categories</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-sm text-brand-200 hover:text-white transition-colors">Houses</a></li>
                    <li><a href="#" class="text-sm text-brand-200 hover:text-white transition-colors">Apartments</a></li>
                    <li><a href="#" class="text-sm text-brand-200 hover:text-white transition-colors">Studios</a></li>
                    <li><a href="#" class="text-sm text-brand-200 hover:text-white transition-colors">Maisonettes</a></li>
                </ul>
            </div>
            {{-- Contact --}}
            <div>
                <h4 class="font-bold text-sm mb-4 text-gold-400 uppercase tracking-wide">Contact</h4>
                <ul class="space-y-2">
                    <li class="flex items-center gap-2 text-sm text-brand-200">
                        <svg class="w-4 h-4 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        +255 7XX XXX XXX
                    </li>
                    <li class="flex items-center gap-2 text-sm text-brand-200">
                        <svg class="w-4 h-4 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        info@nyumba360.co.tz
                    </li>
                    <li class="flex items-center gap-2 text-sm text-brand-200">
                        <svg class="w-4 h-4 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Dar es Salaam, Tanzania
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-white/10 pt-6 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-xs text-brand-300">&copy; {{ date('Y') }} Nyumba360. All rights reserved.</p>
            <div class="flex items-center gap-4">
                <a href="#" class="text-brand-300 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                </a>
                <a href="#" class="text-brand-300 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>
                <a href="#" class="text-brand-300 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                </a>
            </div>
        </div>
    </div>
</footer>

@endsection

@section('scripts')
<script>
    document.getElementById('mobileMenuBtn')?.addEventListener('click', function() {
        document.getElementById('mobileMenu').classList.toggle('hidden');
    });

    // ===== Filtering Logic =====
    const filterRegion = document.getElementById('filterRegion');
    const filterPrice = document.getElementById('filterPrice');
    const filterType = document.getElementById('filterType');
    const filterBeds = document.getElementById('filterBeds');
    const clearFilters = document.getElementById('clearFilters');
    const filterResults = document.getElementById('filterResults');
    const resultCount = document.getElementById('resultCount');
    const houseCards = document.querySelectorAll('.house-card');
    const noResultsMsg = document.getElementById('noResultsMsg');

    function applyFilters() {
        const region = filterRegion.value;
        const priceVal = filterPrice.value;
        const type = filterType.value;
        const beds = filterBeds.value;

        let [minPrice, maxPrice] = priceVal ? priceVal.split('-').map(Number) : [0, Infinity];
        let visibleCount = 0;

        houseCards.forEach(card => {
            const cardRegion = card.dataset.region;
            const cardPrice = parseInt(card.dataset.price);
            const cardType = card.dataset.type;
            const cardBeds = parseInt(card.dataset.beds);

            const regionMatch = !region || cardRegion === region;
            const priceMatch = cardPrice >= minPrice && cardPrice <= maxPrice;
            const typeMatch = !type || cardType === type;
            const bedsMatch = !beds || (beds === '5' ? cardBeds >= 5 : cardBeds === parseInt(beds));

            if (regionMatch && priceMatch && typeMatch && bedsMatch) {
                card.style.display = '';
                card.classList.remove('opacity-30', 'pointer-events-none');
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        // Show/hide result count
        const hasFilters = region || priceVal || type || beds;
        if (hasFilters) {
            filterResults.classList.remove('hidden');
            resultCount.textContent = visibleCount;
        } else {
            filterResults.classList.add('hidden');
        }

        // Show/hide no results message
        if (noResultsMsg) {
            noResultsMsg.style.display = visibleCount === 0 ? 'block' : 'none';
        }
    }

    filterRegion.addEventListener('change', applyFilters);
    filterPrice.addEventListener('change', applyFilters);
    filterType.addEventListener('change', applyFilters);
    filterBeds.addEventListener('change', applyFilters);

    clearFilters.addEventListener('click', function() {
        filterRegion.value = '';
        filterPrice.value = '';
        filterType.value = '';
        filterBeds.value = '';
        applyFilters();
    });

    // Region chip click -> set filter and scroll to featured
    document.querySelectorAll('.region-chip').forEach(chip => {
        chip.addEventListener('click', function(e) {
            e.preventDefault();
            filterRegion.value = this.dataset.region;
            applyFilters();
            document.getElementById('featured').scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });
</script>
@endsection
