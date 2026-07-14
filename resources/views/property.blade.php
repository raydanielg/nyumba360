@extends('layouts.landing')

@section('title', 'Property Details - Nyumba360')

@section('content')

{{-- ===== NAVBAR ===== --}}
<nav class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md border-b border-[#E6E0DA] shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <a href="{{ url('/') }}" class="flex items-center gap-2.5 flex-shrink-0">
                <img src="{{ asset('logowhite.png') }}" alt="Nyumba360" class="w-9 h-9 object-contain">
                <span class="text-xl font-extrabold text-brand-600 tracking-tight hidden sm:block">Nyumba<span class="text-gold-400">360</span></span>
            </a>
            <div class="hidden md:flex items-center gap-6">
                <a href="{{ url('/') }}" class="text-sm font-semibold text-gray-600 hover:text-brand-600 transition-colors">Home</a>
                <a href="{{ url('/') }}#browse" class="text-sm font-semibold text-gray-600 hover:text-brand-600 transition-colors">Browse</a>
                <a href="{{ url('/') }}#featured" class="text-sm font-semibold text-gray-600 hover:text-brand-600 transition-colors">Featured</a>
                <a href="{{ url('/') }}#regions" class="text-sm font-semibold text-gray-600 hover:text-brand-600 transition-colors">Regions</a>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ url('/') }}" class="flex items-center gap-1.5 text-sm font-semibold text-gray-600 hover:text-brand-600 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    <span class="hidden sm:block">Back</span>
                </a>
                @auth
                    <a href="{{ url('/home') }}" class="px-4 py-2 text-sm font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all shadow-sm">Dashboard</a>
                @else
                    <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-bold text-white bg-gold-400 hover:bg-gold-500 rounded-lg transition-all shadow-sm">Get Started</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

{{-- ===== PROPERTY DETAILS ===== --}}
<section class="pt-16 bg-cream min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-xs text-gray-400 mb-4">
            <a href="{{ url('/') }}" class="hover:text-brand-600 transition-colors">Home</a>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <a href="{{ url('/') }}#featured" class="hover:text-brand-600 transition-colors">Featured</a>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-gray-700 font-semibold">3 Bedroom House - Mikocheni</span>
        </div>

        {{-- Title + Price --}}
        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3 mb-5">
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <span class="px-2.5 py-1 bg-brand-600 text-white text-[10px] font-bold rounded-full">FOR RENT</span>
                    <span class="px-2.5 py-1 bg-gold-400 text-white text-[10px] font-bold rounded-full">FEATURED</span>
                    <span class="px-2.5 py-1 bg-green-100 text-green-700 text-[10px] font-bold rounded-full">VERIFIED</span>
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 leading-tight">3 Bedroom House in Mikocheni</h1>
                <div class="flex items-center gap-1.5 text-sm text-gray-500 mt-1">
                    <svg class="w-4 h-4 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Mikocheni, Kinondoni, Dar es Salaam
                </div>
            </div>
            <div class="text-left sm:text-right">
                <p class="text-3xl font-extrabold text-brand-600">TSh 450K<span class="text-sm font-normal text-gray-400">/mo</span></p>
                <p class="text-xs text-gray-400 mt-0.5">Negotiable</p>
            </div>
        </div>

        {{-- ===== GALLERY: Photos + Videos ===== --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 mb-6">

            {{-- Main Image / Video Display --}}
            <div class="lg:col-span-2 relative rounded-2xl overflow-hidden bg-gray-900" style="height: 400px;">
                {{-- Photo display --}}
                <img id="mainMedia" src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=1200&q=80" alt="Property" class="w-full h-full object-cover cursor-pointer">
                {{-- Video display (hidden by default) --}}
                <video id="mainVideo" controls class="w-full h-full object-cover hidden" poster="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=1200&q=80">
                    <source src="" type="video/mp4">
                    Your browser does not support the video tag.
                </video>

                {{-- Media type badge --}}
                <div id="mediaBadge" class="absolute top-3 left-3 px-2.5 py-1 bg-black/70 backdrop-blur-sm rounded-full text-white text-[10px] font-bold flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Photo 1 of 8
                </div>

                {{-- Navigation arrows --}}
                <button onclick="navigateMedia(-1)" class="absolute left-3 top-1/2 -translate-y-1/2 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg hover:bg-white transition-all z-10">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button onclick="navigateMedia(1)" class="absolute right-3 top-1/2 -translate-y-1/2 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg hover:bg-white transition-all z-10">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>

                {{-- Fullscreen button --}}
                <button onclick="openFullscreen()" class="absolute top-3 right-3 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg hover:bg-white transition-all">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>
                </button>
            </div>

            {{-- Thumbnails Column --}}
            <div class="flex flex-col gap-2">
                <div class="bg-white rounded-xl p-3 border border-[#E6E0DA]">
                    <p class="text-xs font-bold text-gray-700 mb-2 flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        Gallery (8 photos + 1 video)
                    </p>
                    <div class="grid grid-cols-4 gap-1.5 max-h-[340px] overflow-y-auto">
                        <button onclick="selectMedia(0, 'photo')" class="media-thumb relative rounded-lg overflow-hidden border-2 border-brand-500 aspect-square group">
                            <img src="https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=200&q=80" class="w-full h-full object-cover">
                        </button>
                        <button onclick="selectMedia(1, 'photo')" class="media-thumb relative rounded-lg overflow-hidden border-2 border-transparent hover:border-brand-300 aspect-square group">
                            <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c650?w=200&q=80" class="w-full h-full object-cover">
                        </button>
                        <button onclick="selectMedia(2, 'photo')" class="media-thumb relative rounded-lg overflow-hidden border-2 border-transparent hover:border-brand-300 aspect-square group">
                            <img src="https://images.unsplash.com/photo-1600596542815-05585f0aee67?w=200&q=80" class="w-full h-full object-cover">
                        </button>
                        <button onclick="selectMedia(3, 'photo')" class="media-thumb relative rounded-lg overflow-hidden border-2 border-transparent hover:border-brand-300 aspect-square group">
                            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=200&q=80" class="w-full h-full object-cover">
                        </button>
                        <button onclick="selectMedia(4, 'photo')" class="media-thumb relative rounded-lg overflow-hidden border-2 border-transparent hover:border-brand-300 aspect-square group">
                            <img src="https://images.unsplash.com/photo-1493809842364-78817add7ffb?w=200&q=80" class="w-full h-full object-cover">
                        </button>
                        <button onclick="selectMedia(5, 'photo')" class="media-thumb relative rounded-lg overflow-hidden border-2 border-transparent hover:border-brand-300 aspect-square group">
                            <img src="https://images.unsplash.com/photo-1583608205776-bfd35f0d9f83?w=200&q=80" class="w-full h-full object-cover">
                        </button>
                        <button onclick="selectMedia(6, 'photo')" class="media-thumb relative rounded-lg overflow-hidden border-2 border-transparent hover:border-brand-300 aspect-square group">
                            <img src="https://images.unsplash.com/photo-1568605114967-8130f81a6abd?w=200&q=80" class="w-full h-full object-cover">
                        </button>
                        <button onclick="selectMedia(7, 'photo')" class="media-thumb relative rounded-lg overflow-hidden border-2 border-transparent hover:border-brand-300 aspect-square group">
                            <img src="https://images.unsplash.com/photo-1480074055461-7ab1a82d0782?w=200&q=80" class="w-full h-full object-cover">
                        </button>
                        {{-- Video thumbnail --}}
                        <button onclick="selectMedia(8, 'video')" class="media-thumb relative rounded-lg overflow-hidden border-2 border-transparent hover:border-gold-400 aspect-square group">
                            <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c650?w=200&q=80" class="w-full h-full object-cover opacity-70">
                            <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                                <div class="w-7 h-7 bg-gold-400 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                                    <svg class="w-4 h-4 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                            </div>
                            <span class="absolute bottom-0.5 right-0.5 px-1 py-0.5 bg-black/80 rounded text-[7px] text-white font-bold">VIDEO</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- ===== MAIN CONTENT GRID ===== --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Left: Details --}}
            <div class="lg:col-span-2 space-y-5">

                {{-- Quick Stats --}}
                <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <div class="text-center">
                            <div class="w-12 h-12 mx-auto bg-brand-50 rounded-xl flex items-center justify-center mb-2">
                                <svg class="w-6 h-6 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                            </div>
                            <p class="text-xs text-gray-400">Type</p>
                            <p class="text-sm font-bold text-gray-900">House</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 mx-auto bg-gold-50 rounded-xl flex items-center justify-center mb-2">
                                <svg class="w-6 h-6 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V5a2 2 0 012-2h4a2 2 0 012 2v2"/></svg>
                            </div>
                            <p class="text-xs text-gray-400">Bedrooms</p>
                            <p class="text-sm font-bold text-gray-900">3</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 mx-auto bg-blue-50 rounded-xl flex items-center justify-center mb-2">
                                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10h6M9 14h6"/></svg>
                            </div>
                            <p class="text-xs text-gray-400">Bathrooms</p>
                            <p class="text-sm font-bold text-gray-900">2</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 mx-auto bg-green-50 rounded-xl flex items-center justify-center mb-2">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5M4 16v4m0 0h4m-4 0l5-5m11 5l-5-5m5 5v-4m0 4h-4"/></svg>
                            </div>
                            <p class="text-xs text-gray-400">Area</p>
                            <p class="text-sm font-bold text-gray-900">250 sqm</p>
                        </div>
                    </div>
                </div>

                {{-- Description --}}
                <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
                    <h2 class="text-base font-extrabold text-gray-900 mb-3 flex items-center gap-2">
                        <div class="w-1 h-5 bg-brand-600 rounded-full"></div>
                        Description
                    </h2>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        This beautiful 3 bedroom house located in the heart of Mikocheni offers spacious living areas, modern amenities, and a serene environment. The house features a large living room, dining area, modern kitchen with fitted cabinets, and a master bedroom with an en-suite bathroom. The compound is fully fenced with a gated entrance, ample parking space, and a well-maintained garden. Located just minutes away from shopping centers, schools, and main roads. Perfect for families looking for comfort and convenience.
                    </p>
                </div>

                {{-- Amenities --}}
                <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
                    <h2 class="text-base font-extrabold text-gray-900 mb-3 flex items-center gap-2">
                        <div class="w-1 h-5 bg-gold-400 rounded-full"></div>
                        Amenities & Features
                    </h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <div class="w-8 h-8 bg-green-50 rounded-lg flex items-center justify-center"><svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div>
                            Fenced Compound
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <div class="w-8 h-8 bg-green-50 rounded-lg flex items-center justify-center"><svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div>
                            Parking Space
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <div class="w-8 h-8 bg-green-50 rounded-lg flex items-center justify-center"><svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div>
                            Water Supply
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <div class="w-8 h-8 bg-green-50 rounded-lg flex items-center justify-center"><svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div>
                            Electricity (TANESCO)
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <div class="w-8 h-8 bg-green-50 rounded-lg flex items-center justify-center"><svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div>
                            Garden
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <div class="w-8 h-8 bg-green-50 rounded-lg flex items-center justify-center"><svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div>
                            Security Guard
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <div class="w-8 h-8 bg-green-50 rounded-lg flex items-center justify-center"><svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div>
                            Air Conditioning
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <div class="w-8 h-8 bg-green-50 rounded-lg flex items-center justify-center"><svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div>
                            Borehole Water
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-700">
                            <div class="w-8 h-8 bg-green-50 rounded-lg flex items-center justify-center"><svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div>
                            Servants Quarter
                        </div>
                    </div>
                </div>

                {{-- Location Map --}}
                <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
                    <h2 class="text-base font-extrabold text-gray-900 mb-3 flex items-center gap-2">
                        <div class="w-1 h-5 bg-brand-600 rounded-full"></div>
                        Location
                    </h2>
                    <div class="rounded-xl overflow-hidden border border-[#E6E0DA] relative" style="height: 280px;">
                        <iframe src="https://www.openstreetmap.org/export/embed.html?bbox=39.2640%2C-6.7760%2C39.2840%2C-6.7560&layer=mapnik&marker=-6.7660%2C39.2740" class="w-full h-full" style="border:0;"></iframe>
                        <div class="absolute top-3 left-3 bg-white rounded-lg shadow-lg px-3 py-2">
                            <p class="text-xs font-bold text-gray-900">Mikocheni, Kinondoni</p>
                            <p class="text-[10px] text-gray-400">Dar es Salaam, Tanzania</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right: Contact + Sidebar --}}
            <div class="space-y-5">

                {{-- Contact Card --}}
                <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA] sticky top-20">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-brand-500 to-brand-700 rounded-full flex items-center justify-center text-white font-extrabold text-lg">
                            JD
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-bold text-gray-900">John Doe</p>
                            <p class="text-xs text-gray-400">Property Owner</p>
                            <div class="flex items-center gap-1 mt-0.5">
                                <svg class="w-3 h-3 text-gold-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                                <span class="text-[10px] text-gray-500 font-semibold">4.9 (124 reviews)</span>
                            </div>
                        </div>
                    </div>

                    {{-- Contact Buttons --}}
                    <div class="space-y-2.5">
                        <a href="tel:+255712345678" class="w-full py-3 text-sm font-bold text-white bg-gradient-to-r from-brand-600 to-brand-700 hover:from-brand-700 hover:to-brand-800 rounded-xl shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            Call: +255 712 345 678
                        </a>
                        <a href="https://wa.me/255712345678" target="_blank" class="w-full py-3 text-sm font-bold text-white bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 rounded-xl shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            WhatsApp Chat
                        </a>
                        <a href="sms:+255712345678" class="w-full py-3 text-sm font-bold text-brand-600 bg-brand-50 hover:bg-brand-100 border border-brand-200 rounded-xl transition-all flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                            Send SMS
                        </a>
                    </div>

                    {{-- Quick Info --}}
                    <div class="mt-4 pt-4 border-t border-[#E6E0DA] space-y-2">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-400 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Available
                            </span>
                            <span class="font-bold text-green-600">Immediately</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-400 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Verified
                            </span>
                            <span class="font-bold text-green-600">Yes</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-400 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                Listed
                            </span>
                            <span class="font-bold text-gray-700">5 days ago</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-400 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                Views
                            </span>
                            <span class="font-bold text-gray-700">1,847</span>
                        </div>
                    </div>

                    {{-- Favorite + Share --}}
                    <div class="mt-4 flex gap-2">
                        <button class="flex-1 py-2.5 text-xs font-bold text-gray-600 bg-gray-100 hover:bg-red-50 hover:text-red-500 rounded-lg transition-all flex items-center justify-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                            Save
                        </button>
                        <button class="flex-1 py-2.5 text-xs font-bold text-gray-600 bg-gray-100 hover:bg-blue-50 hover:text-blue-500 rounded-lg transition-all flex items-center justify-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
                            Share
                        </button>
                    </div>
                </div>

                {{-- Similar Properties --}}
                <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
                    <h3 class="text-sm font-extrabold text-gray-900 mb-3 flex items-center gap-2">
                        <div class="w-1 h-4 bg-gold-400 rounded-full"></div>
                        Similar Properties
                    </h3>
                    <div class="space-y-3">
                        <a href="#" class="flex gap-3 group">
                            <img src="https://images.unsplash.com/photo-1512917774080-9991f1c4c650?w=200&q=80" class="w-20 h-16 rounded-lg object-cover flex-shrink-0">
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-bold text-gray-900 truncate group-hover:text-brand-600 transition-colors">2 Bedroom Apartment</p>
                                <p class="text-[10px] text-gray-400">Kigamboni, Dar es Salaam</p>
                                <p class="text-xs font-bold text-brand-600 mt-0.5">TSh 350K/mo</p>
                            </div>
                        </a>
                        <a href="#" class="flex gap-3 group">
                            <img src="https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?w=200&q=80" class="w-20 h-16 rounded-lg object-cover flex-shrink-0">
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-bold text-gray-900 truncate group-hover:text-brand-600 transition-colors">Studio Apartment</p>
                                <p class="text-[10px] text-gray-400">Sinza, Dar es Salaam</p>
                                <p class="text-xs font-bold text-brand-600 mt-0.5">TSh 180K/mo</p>
                            </div>
                        </a>
                        <a href="#" class="flex gap-3 group">
                            <img src="https://images.unsplash.com/photo-1600596542815-05585f0aee67?w=200&q=80" class="w-20 h-16 rounded-lg object-cover flex-shrink-0">
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-bold text-gray-900 truncate group-hover:text-brand-600 transition-colors">4 Bedroom Maisonette</p>
                                <p class="text-[10px] text-gray-400">Masaki, Dar es Salaam</p>
                                <p class="text-xs font-bold text-brand-600 mt-0.5">TSh 850K/mo</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== FULLSCREEN GALLERY MODAL ===== --}}
<div id="fullscreenModal" class="fixed inset-0 z-[100] bg-black/95 hidden items-center justify-center" onclick="closeFullscreen()">
    <button class="absolute top-4 right-4 w-12 h-12 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all z-10" onclick="closeFullscreen()">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
    </button>
    <img id="fullscreenImg" src="" class="max-w-full max-h-full object-contain" onclick="event.stopPropagation()">
    <button onclick="event.stopPropagation(); navigateMedia(-1)" class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
    </button>
    <button onclick="event.stopPropagation(); navigateMedia(1)" class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/10 hover:bg-white/20 rounded-full flex items-center justify-center transition-all">
        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </button>
    <div id="fullscreenCounter" class="absolute bottom-4 left-1/2 -translate-x-1/2 px-4 py-1.5 bg-white/10 rounded-full text-white text-xs font-bold"></div>
</div>

@endsection

@section('scripts')
<script>
    const mediaItems = [
        { type: 'photo', url: 'https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=1200&q=80' },
        { type: 'photo', url: 'https://images.unsplash.com/photo-1512917774080-9991f1c4c650?w=1200&q=80' },
        { type: 'photo', url: 'https://images.unsplash.com/photo-1600596542815-05585f0aee67?w=1200&q=80' },
        { type: 'photo', url: 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?w=1200&q=80' },
        { type: 'photo', url: 'https://images.unsplash.com/photo-1493809842364-78817add7ffb?w=1200&q=80' },
        { type: 'photo', url: 'https://images.unsplash.com/photo-1583608205776-bfd35f0d9f83?w=1200&q=80' },
        { type: 'photo', url: 'https://images.unsplash.com/photo-1568605114967-8130f81a6abd?w=1200&q=80' },
        { type: 'photo', url: 'https://images.unsplash.com/photo-1480074055461-7ab1a82d0782?w=1200&q=80' },
        { type: 'video', url: '', poster: 'https://images.unsplash.com/photo-1512917774080-9991f1c4c650?w=1200&q=80' },
    ];

    let currentMediaIndex = 0;

    function selectMedia(index, type) {
        currentMediaIndex = index;
        updateMainMedia();
        // Update thumbnail borders
        document.querySelectorAll('.media-thumb').forEach((thumb, i) => {
            if (i === index) {
                thumb.classList.remove('border-transparent', 'hover:border-brand-300', 'hover:border-gold-400');
                if (type === 'video') {
                    thumb.classList.add('border-gold-400');
                } else {
                    thumb.classList.add('border-brand-500');
                }
            } else {
                thumb.classList.remove('border-brand-500', 'border-gold-400');
                thumb.classList.add('border-transparent');
            }
        });
    }

    function updateMainMedia() {
        const item = mediaItems[currentMediaIndex];
        const mainImg = document.getElementById('mainMedia');
        const mainVideo = document.getElementById('mainVideo');
        const badge = document.getElementById('mediaBadge');

        if (item.type === 'video') {
            mainImg.classList.add('hidden');
            mainVideo.classList.remove('hidden');
            mainVideo.poster = item.poster;
            badge.innerHTML = '<svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg> Video Tour';
        } else {
            mainVideo.classList.add('hidden');
            mainImg.classList.remove('hidden');
            mainImg.src = item.url;
            const photoNum = currentMediaIndex + 1;
            badge.innerHTML = '<svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg> Photo ' + photoNum + ' of ' + (mediaItems.length - 1);
        }
    }

    function navigateMedia(direction) {
        currentMediaIndex = (currentMediaIndex + direction + mediaItems.length) % mediaItems.length;
        const item = mediaItems[currentMediaIndex];
        selectMedia(currentMediaIndex, item.type);
        if (!document.getElementById('fullscreenModal').classList.contains('hidden')) {
            updateFullscreen();
        }
    }

    function openFullscreen() {
        const modal = document.getElementById('fullscreenModal');
        const img = document.getElementById('fullscreenImg');
        const item = mediaItems[currentMediaIndex];
        if (item.type === 'photo') {
            img.src = item.url;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            updateFullscreen();
        }
    }

    function closeFullscreen() {
        const modal = document.getElementById('fullscreenModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    function updateFullscreen() {
        const item = mediaItems[currentMediaIndex];
        const img = document.getElementById('fullscreenImg');
        const counter = document.getElementById('fullscreenCounter');
        if (item.type === 'photo') {
            img.src = item.url;
            counter.textContent = (currentMediaIndex + 1) + ' / ' + mediaItems.length;
        }
    }

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') navigateMedia(-1);
        if (e.key === 'ArrowRight') navigateMedia(1);
        if (e.key === 'Escape') closeFullscreen();
    });
</script>
@endsection
