@extends('layouts.landing')

@section('title', 'Browse Properties - Nyumba360')

@section('content')
<nav class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md border-b border-[#E6E0DA] shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <a href="{{ route('landing') }}" class="flex items-center gap-2.5">
                <img src="{{ asset('logowhite.png') }}" alt="Nyumba360" class="w-9 h-9 object-contain">
                <span class="text-xl font-extrabold text-brand-600 tracking-tight hidden sm:block">Nyumba<span class="text-gold-400">360</span></span>
            </a>
            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ route('dashboard') }}" class="px-4 py-2 text-sm font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-600 hover:text-brand-600">Sign In</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-bold text-white bg-gold-400 hover:bg-gold-500 rounded-lg transition-all">Get Started</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<section class="pt-20 pb-10 bg-cream min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-extrabold text-gray-900 mb-1">Browse Properties</h1>
        <p class="text-sm text-gray-400 mb-6">Find your next home across Tanzania</p>

        {{-- Filter Bar --}}
        <div class="bg-white rounded-2xl p-4 border border-[#E6E0DA] mb-6">
            <form method="GET" action="{{ route('properties.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                <select name="region" class="px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500">
                    <option value="">All Regions</option>
                    @foreach(['Dar es Salaam','Arusha','Mwanza','Dodoma','Tanga','Morogoro','Mbeya','Kilimanjaro','Zanzibar','Mara','Pwani','Kigoma','Iringa','Ruvuma','Manyara','Shinyanga'] as $r)
                        <option value="{{ $r }}" {{ request('region') === $r ? 'selected' : '' }}>{{ $r }}</option>
                    @endforeach
                </select>
                <select name="type" class="px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500">
                    <option value="">All Types</option>
                    @foreach(['single_room'=>'Single Room','self_contained'=>'Self Contained','apartment'=>'Apartment','full_house'=>'Full House','maisonette'=>'Maisonette','commercial'=>'Commercial','office'=>'Office','shop'=>'Shop','warehouse'=>'Warehouse','land'=>'Land'] as $val=>$label)
                        <option value="{{ $val }}" {{ request('type') === $val ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                <div class="flex gap-2">
                    <input type="number" name="min_price" placeholder="Min TZS" value="{{ request('min_price') }}" class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500">
                    <input type="number" name="max_price" placeholder="Max TZS" value="{{ request('max_price') }}" class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500">
                </div>
                <div class="flex gap-2">
                    <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}" class="flex-1 px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500">
                    <button type="submit" class="px-4 py-2 text-sm font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all">Filter</button>
                </div>
            </form>
        </div>

        {{-- Results --}}
        @if($properties->isEmpty())
            <div class="text-center py-16">
                <div class="w-16 h-16 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-3">
                    <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <p class="text-sm font-bold text-gray-700">No properties found</p>
                <p class="text-xs text-gray-400">Try adjusting your filters</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach($properties as $property)
                    <a href="{{ route('properties.show', $property) }}" class="bg-white rounded-2xl overflow-hidden border border-[#E6E0DA] hover:shadow-lg transition-all group">
                        <div class="relative h-48 bg-gray-100 overflow-hidden">
                            @if($property->images->first())
                                <img src="{{ asset('storage/' . $property->images->first()->image_path) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center"><svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></div>
                            @endif
                            <div class="absolute top-3 left-3 flex gap-1">
                                <span class="px-2 py-1 bg-brand-600 text-white text-[10px] font-bold rounded-full">FOR RENT</span>
                                @if($property->is_featured)
                                    <span class="px-2 py-1 bg-gold-400 text-white text-[10px] font-bold rounded-full">FEATURED</span>
                                @endif
                            </div>
                            <div class="absolute top-3 right-3 px-2 py-1 bg-black/70 backdrop-blur-sm rounded-full">
                                <span class="text-white font-bold text-xs">TZS {{ number_format($property->rent_amount) }}/mo</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 text-sm mb-1 truncate group-hover:text-brand-600 transition-colors">{{ $property->title }}</h3>
                            <div class="flex items-center gap-1 text-xs text-gray-400 mb-3">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                {{ $property->region }}, {{ $property->district }}
                            </div>
                            <div class="flex items-center gap-3 text-xs text-gray-500">
                                <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/></svg>{{ $property->bedrooms }} Beds</span>
                                <span class="flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"/></svg>{{ $property->bathrooms }} Baths</span>
                                <span class="ml-auto px-2 py-0.5 {{ $property->status === 'available' ? 'bg-green-50 text-green-600' : 'bg-red-50 text-red-600' }} rounded-full text-[10px] font-bold">{{ ucfirst($property->status) }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $properties->withQueryString()->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
