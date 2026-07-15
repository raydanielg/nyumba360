@extends('layouts.dashboard')

@section('title', 'Landlord Dashboard - Nyumba360')
@section('page_title', 'Landlord Dashboard')

@section('content')
<div class="space-y-6">
    {{-- KYC Warning --}}
    @if(!auth()->user()->isKycVerified())
        <div class="bg-gold-50 border border-gold-200 rounded-2xl p-4 flex items-center gap-3">
            <svg class="w-6 h-6 text-gold-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            <div class="flex-1">
                <p class="text-sm font-bold text-gold-800">KYC Verification Required</p>
                <p class="text-xs text-gold-700">Complete your KYC to publish listings and receive unlock payments.</p>
            </div>
            <a href="{{ route('kyc.create') }}" class="px-4 py-2 text-xs font-bold text-white bg-gold-500 hover:bg-gold-600 rounded-lg transition-all">Verify Now</a>
        </div>
    @endif

    {{-- Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
            <p class="text-xs text-gray-400 font-semibold">Total Listings</p>
            <p class="text-2xl font-extrabold text-brand-600 mt-1">{{ $properties->count() }}</p>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
            <p class="text-xs text-gray-400 font-semibold">Total Unlocks</p>
            <p class="text-2xl font-extrabold text-gold-500 mt-1">{{ $totalUnlocks }}</p>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
            <p class="text-xs text-gray-400 font-semibold">Total Views</p>
            <p class="text-2xl font-extrabold text-blue-500 mt-1">{{ number_format($totalViews) }}</p>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
            <p class="text-xs text-gray-400 font-semibold">Active Plan</p>
            <p class="text-lg font-extrabold {{ $subscription ? 'text-green-600' : 'text-red-500' }} mt-1">{{ $subscription ? $subscription->plan_name : 'None' }}</p>
        </div>
    </div>

    {{-- Subscription Info --}}
    @if($subscription)
        <div class="bg-gradient-to-r from-brand-600 to-brand-700 rounded-2xl p-5 text-white flex items-center justify-between">
            <div>
                <p class="text-xs opacity-80">Active Subscription</p>
                <p class="text-lg font-extrabold">{{ $subscription->plan_name }} Plan</p>
                <p class="text-xs opacity-80 mt-1">Expires: {{ $subscription->expires_at->format('M d, Y') }}</p>
            </div>
            <a href="{{ route('payment.landlord-plans') }}" class="px-4 py-2 text-xs font-bold bg-white/20 hover:bg-white/30 rounded-lg transition-all">Manage Plan</a>
        </div>
    @else
        <div class="bg-gradient-to-r from-gold-400 to-gold-500 rounded-2xl p-5 text-white flex items-center justify-between">
            <div>
                <p class="text-xs opacity-90">No Active Subscription</p>
                <p class="text-lg font-extrabold">Subscribe to list properties</p>
            </div>
            <a href="{{ route('payment.landlord-plans') }}" class="px-4 py-2 text-xs font-bold bg-white/20 hover:bg-white/30 rounded-lg transition-all">View Plans</a>
        </div>
    @endif

    {{-- Listings --}}
    <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-sm font-extrabold text-gray-900 flex items-center gap-2">
                <div class="w-1 h-5 bg-brand-600 rounded-full"></div>
                My Listings
            </h3>
            <a href="{{ route('properties.create') }}" class="px-3 py-1.5 text-xs font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                Add Property
            </a>
        </div>

        @if($properties->isEmpty())
            <div class="text-center py-12">
                <div class="w-16 h-16 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-3">
                    <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                </div>
                <p class="text-sm font-bold text-gray-700 mb-1">No listings yet</p>
                <p class="text-xs text-gray-400 mb-4">Start by adding your first property</p>
                <a href="{{ route('properties.create') }}" class="inline-flex items-center gap-2 px-4 py-2 text-xs font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    List Your First Property
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($properties as $property)
                    <div class="border border-[#E6E0DA] rounded-xl overflow-hidden hover:shadow-md transition-all">
                        <div class="relative h-32 bg-gray-100">
                            @if($property->images->first())
                                <img src="{{ asset('storage/' . $property->images->first()->image_path) }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center"><svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></div>
                            @endif
                            <div class="absolute top-2 left-2 flex gap-1">
                                @if($property->approval_status === 'approved')
                                    <span class="px-2 py-0.5 bg-green-500 text-white text-[8px] font-bold rounded-full">APPROVED</span>
                                @elseif($property->approval_status === 'pending')
                                    <span class="px-2 py-0.5 bg-gold-400 text-white text-[8px] font-bold rounded-full">PENDING</span>
                                @else
                                    <span class="px-2 py-0.5 bg-red-500 text-white text-[8px] font-bold rounded-full">REJECTED</span>
                                @endif
                                @if($property->status === 'available')
                                    <span class="px-2 py-0.5 bg-green-100 text-green-700 text-[8px] font-bold rounded-full">AVAILABLE</span>
                                @elseif($property->status === 'taken')
                                    <span class="px-2 py-0.5 bg-red-100 text-red-700 text-[8px] font-bold rounded-full">TAKEN</span>
                                @else
                                    <span class="px-2 py-0.5 bg-yellow-100 text-yellow-700 text-[8px] font-bold rounded-full">MAINTENANCE</span>
                                @endif
                            </div>
                        </div>
                        <div class="p-3">
                            <p class="text-xs font-bold text-gray-900 truncate">{{ $property->title }}</p>
                            <p class="text-[10px] text-gray-400">{{ $property->region }}, {{ $property->district }}</p>
                            <div class="flex items-center gap-3 mt-2 text-[10px] text-gray-500">
                                <span>{{ $property->views_count }} views</span>
                                <span>{{ $property->unlocks_count }} unlocks</span>
                            </div>
                            <div class="flex gap-2 mt-3">
                                <a href="{{ route('properties.edit', $property) }}" class="flex-1 py-1.5 text-center text-[10px] font-bold text-brand-600 bg-brand-50 hover:bg-brand-100 rounded-lg transition-all">Edit</a>
                                <form method="POST" action="{{ route('properties.destroy', $property) }}" class="flex-1" onsubmit="return confirm('Delete this property?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="w-full py-1.5 text-center text-[10px] font-bold text-red-500 bg-red-50 hover:bg-red-100 rounded-lg transition-all">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
