@extends('layouts.landing')

@section('title', 'Browse ' . ucfirst($category) . ' - Nyumba360')

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
                <a href="{{ url('/') }}#browse" class="text-sm font-semibold text-gray-600 hover:text-brand-600 transition-colors">Browse</a>
                <a href="{{ url('/') }}#featured" class="text-sm font-semibold text-gray-600 hover:text-brand-600 transition-colors">Featured</a>
                <div class="relative group">
                    <button class="flex items-center gap-1 text-sm font-semibold text-gray-600 hover:text-brand-600 transition-colors">
                        Properties
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div class="absolute left-0 top-full pt-2 invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-all duration-200">
                        <div class="bg-white rounded-xl shadow-xl border border-[#E6E0DA] py-2 w-48">
                            <a href="{{ route('category', 'houses') }}" class="flex items-center gap-2.5 px-4 py-2 text-sm text-gray-600 hover:bg-brand-50 hover:text-brand-600 transition-colors">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                Houses
                            </a>
                            <a href="{{ route('category', 'apartments') }}" class="flex items-center gap-2.5 px-4 py-2 text-sm text-gray-600 hover:bg-brand-50 hover:text-brand-600 transition-colors">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                Apartments
                            </a>
                            <a href="{{ route('category', 'studios') }}" class="flex items-center gap-2.5 px-4 py-2 text-sm text-gray-600 hover:bg-brand-50 hover:text-brand-600 transition-colors">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                                Studios
                            </a>
                            <a href="{{ route('category', 'maisonettes') }}" class="flex items-center gap-2.5 px-4 py-2 text-sm text-gray-600 hover:bg-brand-50 hover:text-brand-600 transition-colors">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 21V8l9-5 9 5v13M3 21h18M9 21V12h6v9"/></svg>
                                Maisonettes
                            </a>
                            <div class="border-t border-[#E6E0DA] my-1.5"></div>
                            <a href="{{ route('category', 'commercial') }}" class="flex items-center gap-2.5 px-4 py-2 text-sm text-gray-600 hover:bg-brand-50 hover:text-brand-600 transition-colors">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A48.774 48.774 0 0112 18c-2.292 0-4.535-.238-6.694-.686M5 20.5L3 15m18 5.5L21 15M3 15h18M3 15V8a2 2 0 012-2h14a2 2 0 012 2v7"/></svg>
                                Commercial
                            </a>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/') }}#request" class="text-sm font-semibold text-gray-600 hover:text-brand-600 transition-colors">Make a Request</a>
            </div>

            {{-- Right Side --}}
            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ url('/home') }}" class="hidden sm:block text-sm font-semibold text-gray-600 hover:text-brand-600 transition-colors">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="px-4 py-2 text-sm font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all shadow-sm">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hidden sm:block text-sm font-semibold text-gray-600 hover:text-brand-600 transition-colors">Sign in</a>
                    <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-bold text-white bg-gold-400 hover:bg-gold-500 rounded-lg transition-all shadow-sm">Get Started</a>
                @endauth
                <button id="mobileMenuBtn" class="md:hidden w-9 h-9 flex items-center justify-center rounded-lg hover:bg-gray-100 transition-colors">
                    <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
            </div>
        </div>
    </div>
    <div id="mobileMenu" class="md:hidden hidden bg-white border-t border-[#E6E0DA]">
        <div class="px-4 py-3 space-y-1">
            <a href="{{ url('/') }}" class="block px-3 py-2 text-sm font-semibold text-gray-600 hover:bg-brand-50 hover:text-brand-600 rounded-lg transition-colors">Home</a>
            <a href="{{ route('category', 'houses') }}" class="block px-3 py-2 text-sm font-semibold text-gray-600 hover:bg-brand-50 hover:text-brand-600 rounded-lg transition-colors">Houses</a>
            <a href="{{ route('category', 'apartments') }}" class="block px-3 py-2 text-sm font-semibold text-gray-600 hover:bg-brand-50 hover:text-brand-600 rounded-lg transition-colors">Apartments</a>
            <a href="{{ route('category', 'studios') }}" class="block px-3 py-2 text-sm font-semibold text-gray-600 hover:bg-brand-50 hover:text-brand-600 rounded-lg transition-colors">Studios</a>
            <a href="{{ route('category', 'maisonettes') }}" class="block px-3 py-2 text-sm font-semibold text-gray-600 hover:bg-brand-50 hover:text-brand-600 rounded-lg transition-colors">Maisonettes</a>
            <a href="{{ route('category', 'commercial') }}" class="block px-3 py-2 text-sm font-semibold text-gray-600 hover:bg-brand-50 hover:text-brand-600 rounded-lg transition-colors">Commercial</a>
            <a href="{{ url('/') }}#request" class="block px-3 py-2 text-sm font-semibold text-gray-600 hover:bg-brand-50 hover:text-brand-600 rounded-lg transition-colors">Make a Request</a>
            @auth
                <a href="{{ url('/home') }}" class="block px-3 py-2 text-sm font-semibold text-gray-600 hover:bg-brand-50 hover:text-brand-600 rounded-lg transition-colors">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="block px-3 py-2 text-sm font-semibold text-gray-600 hover:bg-brand-50 hover:text-brand-600 rounded-lg transition-colors">Sign in</a>
            @endauth
        </div>
    </div>
</nav>

{{-- ===== PAGE HEADER ===== --}}
<section class="relative pt-16 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute inset-0 bg-hero"></div>
        <div class="absolute inset-0 bg-brand-600/85"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-brand-950/60 via-brand-800/40 to-brand-600/60"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="fade-up">
            {{-- Breadcrumb --}}
            <div class="flex items-center gap-2 text-xs text-brand-100 mb-3">
                <a href="{{ url('/') }}" class="hover:text-white transition-colors">Home</a>
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="text-white font-semibold capitalize">{{ $category }}</span>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white mb-1 capitalize">{{ $category }} for Rent</h1>
            <p class="text-sm text-brand-100">Browse all available {{ $category }} across Tanzania</p>
        </div>
    </div>
</section>

{{-- ===== FILTER BAR ===== --}}
<section class="sticky top-16 z-40 bg-white border-b border-[#E6E0DA] shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <div class="flex flex-col sm:flex-row gap-2 sm:items-center">
            {{-- Search --}}
            <div class="flex-1 relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <input type="text" placeholder="Search by location..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm">
            </div>
            {{-- Sort --}}
            <select class="px-3 py-2 rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm bg-white cursor-pointer text-gray-700">
                <option>Sort: Newest</option>
                <option>Sort: Price Low-High</option>
                <option>Sort: Price High-Low</option>
                <option>Sort: Most Popular</option>
            </select>
            {{-- Price Range --}}
            <select class="px-3 py-2 rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm bg-white cursor-pointer text-gray-700">
                <option>Any Price</option>
                <option>Under 200K</option>
                <option>200K - 500K</option>
                <option>500K - 1M</option>
                <option>1M+</option>
            </select>
            {{-- Bedrooms --}}
            <select class="px-3 py-2 rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm bg-white cursor-pointer text-gray-700">
                <option>Any Beds</option>
                <option>1 Bed</option>
                <option>2 Beds</option>
                <option>3 Beds</option>
                <option>4+ Beds</option>
            </select>
        </div>
    </div>
</section>

{{-- ===== CATEGORY TABS ===== --}}
<section class="bg-cream border-b border-[#E6E0DA]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex gap-2 overflow-x-auto scrollbar-hide py-2.5">
            <a href="{{ route('category', 'houses') }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition-all {{ $category === 'houses' ? 'bg-brand-600 text-white' : 'bg-white text-gray-600 hover:bg-brand-50 hover:text-brand-600 border border-[#E6E0DA]' }}">Houses</a>
            <a href="{{ route('category', 'apartments') }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition-all {{ $category === 'apartments' ? 'bg-brand-600 text-white' : 'bg-white text-gray-600 hover:bg-brand-50 hover:text-brand-600 border border-[#E6E0DA]' }}">Apartments</a>
            <a href="{{ route('category', 'studios') }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition-all {{ $category === 'studios' ? 'bg-brand-600 text-white' : 'bg-white text-gray-600 hover:bg-brand-50 hover:text-brand-600 border border-[#E6E0DA]' }}">Studios</a>
            <a href="{{ route('category', 'maisonettes') }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition-all {{ $category === 'maisonettes' ? 'bg-brand-600 text-white' : 'bg-white text-gray-600 hover:bg-brand-50 hover:text-brand-600 border border-[#E6E0DA]' }}">Maisonettes</a>
            <a href="{{ route('category', 'commercial') }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition-all {{ $category === 'commercial' ? 'bg-brand-600 text-white' : 'bg-white text-gray-600 hover:bg-brand-50 hover:text-brand-600 border border-[#E6E0DA]' }}">Commercial</a>
            <a href="{{ route('category', 'office') }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition-all {{ $category === 'office' ? 'bg-brand-600 text-white' : 'bg-white text-gray-600 hover:bg-brand-50 hover:text-brand-600 border border-[#E6E0DA]' }}">Office</a>
            <a href="{{ route('category', 'shops') }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition-all {{ $category === 'shops' ? 'bg-brand-600 text-white' : 'bg-white text-gray-600 hover:bg-brand-50 hover:text-brand-600 border border-[#E6E0DA]' }}">Shops</a>
            <a href="{{ route('category', 'hostels') }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition-all {{ $category === 'hostels' ? 'bg-brand-600 text-white' : 'bg-white text-gray-600 hover:bg-brand-50 hover:text-brand-600 border border-[#E6E0DA]' }}">Hostels</a>
            <a href="{{ route('category', 'warehouse') }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition-all {{ $category === 'warehouse' ? 'bg-brand-600 text-white' : 'bg-white text-gray-600 hover:bg-brand-50 hover:text-brand-600 border border-[#E6E0DA]' }}">Warehouse</a>
            <a href="{{ route('category', 'land') }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold whitespace-nowrap transition-all {{ $category === 'land' ? 'bg-brand-600 text-white' : 'bg-white text-gray-600 hover:bg-brand-50 hover:text-brand-600 border border-[#E6E0DA]' }}">Land</a>
        </div>
    </div>
</section>

{{-- ===== HOUSES GRID ===== --}}
<section class="py-6 bg-cream min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Results count --}}
        <div class="flex items-center justify-between mb-4">
            <p class="text-xs text-gray-500">Showing <span class="font-bold text-gray-900">{{ $properties->total() }}</span> {{ $category }} available</p>
            <div class="flex items-center gap-2 text-xs text-gray-500">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                Grid View
            </div>
        </div>

        {{-- Grid --}}
        @if($properties->isEmpty())
            <div class="text-center py-16">
                <div class="w-16 h-16 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-3">
                    <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <p class="text-sm font-bold text-gray-700">No {{ $category }} found</p>
                <p class="text-xs text-gray-400">Check back soon or browse all properties</p>
                <a href="{{ route('properties.index') }}" class="inline-flex items-center gap-2 mt-3 px-4 py-2 text-xs font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all">Browse All</a>
            </div>
        @else
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-3">

            @foreach ($properties as $property)
            <a href="{{ route('properties.show', $property) }}" class="card-hover bg-white rounded-xl overflow-hidden border border-[#E6E0DA] hover:shadow-lg">
                <div class="relative h-32 overflow-hidden bg-gray-100">
                    @if($property->images->first())
                        <img src="{{ asset('storage/' . $property->images->first()->image_path) }}" alt="{{ $property->title }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center"><svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></div>
                    @endif
                    <div class="absolute top-2 left-2 flex gap-1">
                        <span class="px-1.5 py-0.5 bg-brand-600 text-white text-[8px] font-bold rounded-full">RENT</span>
                        @if($property->is_featured)
                        <span class="px-1.5 py-0.5 bg-gold-400 text-white text-[8px] font-bold rounded-full">FEATURED</span>
                        @endif
                    </div>
                    <div class="absolute bottom-2 left-2 px-2 py-0.5 bg-black/70 backdrop-blur-sm rounded">
                        <span class="text-white font-bold text-[10px]">TSh {{ number_format($property->rent_amount) }}</span>
                        <span class="text-gray-300 text-[8px]">/mo</span>
                    </div>
                </div>
                <div class="p-3">
                    <div class="flex items-center gap-1 text-[10px] text-gray-400 mb-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        {{ $property->region }}
                    </div>
                    <h3 class="font-bold text-gray-900 text-xs mb-2 truncate">{{ $property->title }}</h3>
                    <div class="flex items-center gap-2 text-[10px] text-gray-500 mb-2">
                        <span>{{ $property->bedrooms }} Beds</span>
                        <span>{{ $property->bathrooms }} Baths</span>
                    </div>
                    <span class="block w-full py-1.5 text-center text-[10px] font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all">View</span>
                </div>
            </a>
            @endforeach

        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $properties->links() }}
        </div>
        @endif
    </div>
</section>

@endsection

@section('scripts')
<script>
    document.getElementById('mobileMenuBtn')?.addEventListener('click', function() {
        document.getElementById('mobileMenu').classList.toggle('hidden');
    });
</script>
@endsection
