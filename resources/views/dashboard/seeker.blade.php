@extends('layouts.dashboard')

@section('title', 'My Dashboard - Nyumba360')
@section('page_title', 'My Dashboard')

@section('content')
<div class="space-y-6">
    {{-- Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
            <div class="flex items-center justify-between mb-2">
                <div class="w-10 h-10 bg-gold-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/></svg>
                </div>
            </div>
            <p class="text-xs text-gray-400 font-semibold">Unlocked Houses</p>
            <p class="text-2xl font-extrabold text-gold-500 mt-1">{{ $unlocks->count() }}</p>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
            <div class="flex items-center justify-between mb-2">
                <div class="w-10 h-10 bg-red-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                </div>
            </div>
            <p class="text-xs text-gray-400 font-semibold">Favorites</p>
            <p class="text-2xl font-extrabold text-red-500 mt-1">{{ $favorites->count() }}</p>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
            <div class="flex items-center justify-between mb-2">
                <div class="w-10 h-10 bg-brand-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/></svg>
                </div>
            </div>
            <p class="text-xs text-gray-400 font-semibold">Total Spent</p>
            <p class="text-2xl font-extrabold text-brand-600 mt-1">TZS {{ number_format($payments->sum('amount')) }}</p>
        </div>
    </div>

    {{-- Unlocked Houses --}}
    <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
        <h3 class="text-sm font-extrabold text-gray-900 mb-4 flex items-center gap-2">
            <div class="w-1 h-5 bg-gold-400 rounded-full"></div>
            My Unlocked Houses
        </h3>
        @if($unlocks->isEmpty())
            <div class="text-center py-8">
                <p class="text-sm text-gray-400">You haven't unlocked any houses yet.</p>
                <a href="{{ route('properties.index') }}" class="inline-flex items-center gap-2 mt-3 px-4 py-2 text-xs font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all">Browse Properties</a>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($unlocks as $unlock)
                    <div class="border border-[#E6E0DA] rounded-xl overflow-hidden hover:shadow-md transition-all">
                        <div class="relative h-28 bg-gray-100">
                            @if($unlock->property->images->first())
                                <img src="{{ asset('storage/' . $unlock->property->images->first()->image_path) }}" class="w-full h-full object-cover">
                            @endif
                            <span class="absolute top-2 left-2 px-2 py-0.5 bg-green-500 text-white text-[8px] font-bold rounded-full">UNLOCKED</span>
                        </div>
                        <div class="p-3">
                            <p class="text-xs font-bold text-gray-900 truncate">{{ $unlock->property->title }}</p>
                            <p class="text-[10px] text-gray-400">{{ $unlock->property->region }}, {{ $unlock->property->district }}</p>
                            <p class="text-[10px] font-mono text-gray-500 mt-1">Receipt: {{ $unlock->receipt_number }}</p>
                            <a href="{{ route('properties.show', $unlock->property) }}" class="block w-full mt-2 py-1.5 text-center text-[10px] font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Favorites --}}
    <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
        <h3 class="text-sm font-extrabold text-gray-900 mb-4 flex items-center gap-2">
            <div class="w-1 h-5 bg-red-400 rounded-full"></div>
            My Favorites
        </h3>
        @if($favorites->isEmpty())
            <p class="text-sm text-gray-400 text-center py-8">No favorites yet. Click the heart icon on any property to save it.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                @foreach($favorites as $favorite)
                    <a href="{{ route('properties.show', $favorite->property) }}" class="border border-[#E6E0DA] rounded-xl overflow-hidden hover:shadow-md transition-all">
                        <div class="h-24 bg-gray-100">
                            @if($favorite->property->images->first())
                                <img src="{{ asset('storage/' . $favorite->property->images->first()->image_path) }}" class="w-full h-full object-cover">
                            @endif
                        </div>
                        <div class="p-2">
                            <p class="text-xs font-bold text-gray-900 truncate">{{ $favorite->property->title }}</p>
                            <p class="text-[10px] text-gray-400">{{ $favorite->property->region }}</p>
                            <p class="text-xs font-bold text-brand-600 mt-1">TZS {{ number_format($favorite->property->rent_amount) }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Recent Notifications --}}
    @if($notifications->isNotEmpty())
    <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
        <h3 class="text-sm font-extrabold text-gray-900 mb-4 flex items-center gap-2">
            <div class="w-1 h-5 bg-blue-400 rounded-full"></div>
            Recent Notifications
        </h3>
        <div class="space-y-2">
            @foreach($notifications as $notification)
                <div class="flex items-start gap-3 p-3 rounded-lg {{ $notification->is_read ? 'bg-gray-50' : 'bg-blue-50 border border-blue-100' }}">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    </div>
                    <div class="flex-1">
                        <p class="text-xs font-bold text-gray-900">{{ $notification->title }}</p>
                        <p class="text-[10px] text-gray-500">{{ $notification->body }}</p>
                        <p class="text-[9px] text-gray-400 mt-0.5">{{ $notification->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
