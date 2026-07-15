@extends('layouts.landing')

@section('title', $property->title . ' - Nyumba360')

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
                    <a href="{{ route('register') }}" class="px-4 py-2 text-sm font-bold text-white bg-gold-400 hover:bg-gold-500 rounded-lg transition-all">Get Started</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<section class="pt-16 bg-cream min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-xs text-gray-400 mb-4">
            <a href="{{ route('landing') }}" class="hover:text-brand-600">Home</a>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <a href="{{ route('properties.index') }}" class="hover:text-brand-600">Properties</a>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-gray-700 font-semibold truncate">{{ $property->title }}</span>
        </div>

        {{-- Title + Price --}}
        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3 mb-5">
            <div>
                <div class="flex items-center gap-2 mb-2">
                    <span class="px-2.5 py-1 bg-brand-600 text-white text-[10px] font-bold rounded-full">FOR RENT</span>
                    <span class="px-2.5 py-1 {{ $property->status === 'available' ? 'bg-green-100 text-green-700' : ($property->status === 'taken' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-700') }} text-[10px] font-bold rounded-full">{{ strtoupper(str_replace('_', ' ', $property->status)) }}</span>
                    @if($property->user->isKycVerified())
                        <span class="px-2.5 py-1 bg-blue-100 text-blue-700 text-[10px] font-bold rounded-full">VERIFIED OWNER</span>
                    @endif
                </div>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-gray-900 leading-tight">{{ $property->title }}</h1>
                <div class="flex items-center gap-1.5 text-sm text-gray-500 mt-1">
                    <svg class="w-4 h-4 text-brand-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    {{ $property->region }}, {{ $property->district }}{{ $isUnlocked ? ', ' . $property->ward . ($property->street ? ' - ' . $property->street : '') : '' }}
                </div>
            </div>
            <div class="text-left sm:text-right">
                <p class="text-3xl font-extrabold text-brand-600">TZS {{ number_format($property->rent_amount) }}<span class="text-sm font-normal text-gray-400">/mo</span></p>
                @if($property->deposit_amount)
                    <p class="text-xs text-gray-400 mt-0.5">Deposit: TZS {{ number_format($property->deposit_amount) }}</p>
                @endif
            </div>
        </div>

        {{-- Gallery --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 mb-6">
            <div class="lg:col-span-2 relative rounded-2xl overflow-hidden bg-gray-900" style="height: 400px;">
                @if($property->images->isNotEmpty())
                    <img id="mainMedia" src="{{ asset('storage/' . $property->images->first()->image_path) }}" alt="{{ $property->title }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full flex items-center justify-center"><svg class="w-16 h-16 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></div>
                @endif
            </div>
            <div class="bg-white rounded-xl p-3 border border-[#E6E0DA]">
                <p class="text-xs font-bold text-gray-700 mb-2">Gallery ({{ $property->images->count() }} photos)</p>
                <div class="grid grid-cols-4 gap-1.5 max-h-[340px] overflow-y-auto">
                    @foreach($property->images as $img)
                        <button onclick="document.getElementById('mainMedia').src='{{ asset('storage/' . $img->image_path) }}'" class="rounded-lg overflow-hidden border-2 border-transparent hover:border-brand-300 aspect-square">
                            <img src="{{ asset('storage/' . $img->image_path) }}" class="w-full h-full object-cover">
                        </button>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Main Content Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Left --}}
            <div class="lg:col-span-2 space-y-5">
                {{-- Quick Stats --}}
                <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                        <div class="text-center">
                            <div class="w-12 h-12 mx-auto bg-brand-50 rounded-xl flex items-center justify-center mb-2">
                                <svg class="w-6 h-6 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                            </div>
                            <p class="text-xs text-gray-400">Type</p>
                            <p class="text-sm font-bold text-gray-900 capitalize">{{ str_replace('_', ' ', $property->type) }}</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 mx-auto bg-gold-50 rounded-xl flex items-center justify-center mb-2">
                                <svg class="w-6 h-6 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/></svg>
                            </div>
                            <p class="text-xs text-gray-400">Bedrooms</p>
                            <p class="text-sm font-bold text-gray-900">{{ $property->bedrooms }}</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 mx-auto bg-blue-50 rounded-xl flex items-center justify-center mb-2">
                                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"/></svg>
                            </div>
                            <p class="text-xs text-gray-400">Bathrooms</p>
                            <p class="text-sm font-bold text-gray-900">{{ $property->bathrooms }}</p>
                        </div>
                        <div class="text-center">
                            <div class="w-12 h-12 mx-auto bg-green-50 rounded-xl flex items-center justify-center mb-2">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8V4m0 0h4M4 4l5 5m11-1V4m0 0h-4m4 0l-5 5"/></svg>
                            </div>
                            <p class="text-xs text-gray-400">Area</p>
                            <p class="text-sm font-bold text-gray-900">{{ $property->area_sqm ?? 'N/A' }} sqm</p>
                        </div>
                    </div>
                </div>

                {{-- Description --}}
                <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
                    <h2 class="text-base font-extrabold text-gray-900 mb-3 flex items-center gap-2">
                        <div class="w-1 h-5 bg-brand-600 rounded-full"></div>
                        Description
                    </h2>
                    <p class="text-sm text-gray-600 leading-relaxed">{{ $property->description }}</p>
                </div>

                {{-- Amenities --}}
                @if(is_array($property->amenities) && count($property->amenities) > 0)
                <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
                    <h2 class="text-base font-extrabold text-gray-900 mb-3 flex items-center gap-2">
                        <div class="w-1 h-5 bg-gold-400 rounded-full"></div>
                        Amenities & Features
                    </h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                        @foreach($property->amenities as $amenity)
                            <div class="flex items-center gap-2 text-sm text-gray-700">
                                <div class="w-8 h-8 bg-green-50 rounded-lg flex items-center justify-center"><svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg></div>
                                {{ $amenity }}
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Location --}}
                <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
                    <h2 class="text-base font-extrabold text-gray-900 mb-3 flex items-center gap-2">
                        <div class="w-1 h-5 bg-brand-600 rounded-full"></div>
                        Location
                    </h2>
                    @if($isUnlocked)
                        @if($property->latitude && $property->longitude)
                            <div class="rounded-xl overflow-hidden border border-[#E6E0DA]" style="height: 280px;">
                                <iframe src="https://www.openstreetmap.org/export/embed.html?bbox={{ $property->longitude - 0.01 }}%2C{{ $property->latitude - 0.01 }}%2C{{ $property->longitude + 0.01 }}%2C{{ $property->latitude + 0.01 }}&layer=mapnik&marker={{ $property->latitude }}%2C{{ $property->longitude }}" class="w-full h-full" style="border:0;"></iframe>
                            </div>
                            <p class="text-xs text-gray-500 mt-2">Exact location: {{ $property->ward }}{{ $property->street ? ', ' . $property->street : '' }}</p>
                        @else
                            <p class="text-sm text-gray-600">{{ $property->region }}, {{ $property->district }}, {{ $property->ward }}{{ $property->street ? ', ' . $property->street : '' }}</p>
                        @endif
                    @else
                        <div class="rounded-xl bg-gray-100 border border-[#E6E0DA] flex items-center justify-center" style="height: 200px;">
                            <div class="text-center">
                                <svg class="w-12 h-12 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                <p class="text-sm font-bold text-gray-500">Exact location locked</p>
                                <p class="text-xs text-gray-400">Unlock for TZS {{ number_format($unlockFee) }} to see the map pin</p>
                            </div>
                        </div>
                        <p class="text-xs text-gray-400 mt-2">Approximate area: {{ $property->region }}, {{ $property->district }}</p>
                    @endif
                </div>
            </div>

            {{-- Right: Contact / Unlock --}}
            <div class="space-y-5">
                <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA] sticky top-20">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-brand-500 to-brand-700 rounded-full flex items-center justify-center text-white font-extrabold text-lg">
                            {{ strtoupper(substr($property->user->name, 0, 1)) }}
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-bold text-gray-900">{{ $property->user->name }}</p>
                            <p class="text-xs text-gray-400 capitalize">{{ $property->user->role }}</p>
                            @if($property->user->isKycVerified())
                                <span class="inline-flex items-center gap-1 text-[10px] font-bold text-green-600 mt-0.5">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    Verified
                                </span>
                            @endif
                        </div>
                    </div>

                    @if($isUnlocked)
                        {{-- Contact Info Revealed --}}
                        <div class="space-y-2.5">
                            <a href="tel:{{ $property->user->phone }}" class="w-full py-3 text-sm font-bold text-white bg-gradient-to-r from-brand-600 to-brand-700 hover:from-brand-700 hover:to-brand-800 rounded-xl shadow-md transition-all flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                Call: {{ $property->user->phone }}
                            </a>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $property->user->phone) }}" target="_blank" class="w-full py-3 text-sm font-bold text-white bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 rounded-xl shadow-md transition-all flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                WhatsApp Chat
                            </a>
                        </div>
                        <div class="mt-4 p-3 bg-green-50 border border-green-200 rounded-lg text-center">
                            <p class="text-xs font-bold text-green-700 flex items-center justify-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                Contact Unlocked
                            </p>
                            <p class="text-[10px] text-green-600 mt-0.5">You have permanent access to this property</p>
                        </div>
                    @else
                        {{-- Locked: Unlock Button --}}
                        @if($property->isAvailable())
                            @auth
                                <a href="{{ route('unlock.initiate', $property) }}" class="w-full py-4 text-sm font-extrabold text-white bg-gradient-to-r from-gold-400 to-gold-500 hover:from-gold-500 hover:to-gold-600 rounded-xl shadow-lg transition-all flex items-center justify-center gap-2 animate-pulse">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                    Unlock Contact - TZS {{ number_format($unlockFee) }}
                                </a>
                                <p class="text-[10px] text-gray-400 text-center mt-2">Reveal exact location, phone number & map pin</p>
                            @else
                                <a href="{{ route('register') }}" class="w-full py-4 text-sm font-extrabold text-white bg-gradient-to-r from-brand-600 to-brand-700 hover:from-brand-700 hover:to-brand-800 rounded-xl shadow-lg transition-all flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                                    Sign Up to Unlock - TZS {{ number_format($unlockFee) }}
                                </a>
                            @endauth
                        @else
                            <button disabled class="w-full py-4 text-sm font-extrabold text-gray-400 bg-gray-100 rounded-xl cursor-not-allowed flex items-center justify-center gap-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                                Not Available
                            </button>
                            <p class="text-[10px] text-red-400 text-center mt-2">This property is {{ $property->status === 'taken' ? 'taken' : 'under maintenance' }}</p>
                        @endif
                    @endif

                    {{-- Favorite --}}
                    @auth
                        <form method="POST" action="{{ route('properties.favorite', $property) }}" class="mt-3">
                            @csrf
                            <button type="submit" class="w-full py-2.5 text-xs font-bold {{ $isFavorited ? 'text-red-500 bg-red-50 hover:bg-red-100' : 'text-gray-600 bg-gray-100 hover:bg-red-50 hover:text-red-500' }} rounded-lg transition-all flex items-center justify-center gap-1.5">
                                <svg class="w-4 h-4 {{ $isFavorited ? 'fill-red-500' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                {{ $isFavorited ? 'Favorited' : 'Add to Favorites' }}
                            </button>
                        </form>
                    @endauth

                    {{-- Stats --}}
                    <div class="mt-4 pt-4 border-t border-[#E6E0DA] space-y-2">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-400">Views</span>
                            <span class="font-bold text-gray-700">{{ number_format($property->views_count) }}</span>
                        </div>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-gray-400">Unlocks</span>
                            <span class="font-bold text-gray-700">{{ $property->unlocks_count }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
