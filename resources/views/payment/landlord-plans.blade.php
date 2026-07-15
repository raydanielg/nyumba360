@extends('layouts.dashboard')

@section('title', 'Landlord Plans - Nyumba360')
@section('page_title', 'Subscription Plans')

@section('content')
<div class="max-w-4xl mx-auto">
    @if($activeSub)
        <div class="bg-gradient-to-r from-brand-600 to-brand-700 rounded-2xl p-5 text-white mb-6 flex items-center justify-between">
            <div>
                <p class="text-xs opacity-80">Active Plan</p>
                <p class="text-lg font-extrabold">{{ $activeSub->plan_name }}</p>
                <p class="text-xs opacity-80">Expires: {{ $activeSub->expires_at->format('M d, Y') }}</p>
            </div>
            <div class="text-right">
                <p class="text-xs opacity-80">Listing Limit</p>
                <p class="text-lg font-extrabold">{{ $activeSub->listing_limit > 99999 ? 'Unlimited' : $activeSub->listing_limit }}</p>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach($plans as $key => $plan)
            <div class="bg-white rounded-2xl p-5 border {{ $key === 'growth' ? 'border-brand-600 ring-2 ring-brand-200' : 'border-[#E6E0DA]' }} relative">
                @if($key === 'growth')
                    <span class="absolute -top-2 left-1/2 -translate-x-1/2 px-2 py-0.5 bg-brand-600 text-white text-[9px] font-bold rounded-full">POPULAR</span>
                @endif
                <h3 class="text-sm font-extrabold text-gray-900">{{ $plan['name'] }}</h3>
                <p class="text-2xl font-extrabold text-brand-600 mt-2">TZS {{ number_format($plan['price']) }}<span class="text-xs font-normal text-gray-400">/mo</span></p>
                <div class="mt-4 space-y-2 text-xs text-gray-600">
                    <p class="flex items-center gap-2"><svg class="w-3.5 h-3.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>{{ $plan['listings'] > 99999 ? 'Unlimited' : 'Up to ' . $plan['listings'] }} listings</p>
                    <p class="flex items-center gap-2"><svg class="w-3.5 h-3.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>{{ $plan['featured'] }} featured slots</p>
                    @if($key === 'portfolio' || $key === 'estate')
                        <p class="flex items-center gap-2"><svg class="w-3.5 h-3.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Priority in search</p>
                    @endif
                    @if($key === 'estate')
                        <p class="flex items-center gap-2"><svg class="w-3.5 h-3.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Dedicated support</p>
                        <p class="flex items-center gap-2"><svg class="w-3.5 h-3.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Analytics dashboard</p>
                    @endif
                </div>
                <form method="POST" action="{{ route('payment.landlord-plans.process') }}" class="mt-5">
                    @csrf
                    <input type="hidden" name="plan" value="{{ $key }}">
                    <input type="hidden" name="provider" value="mpesa">
                    <input type="hidden" name="phone" value="{{ auth()->user()->phone ?? '0712345678' }}">
                    <button type="submit" class="w-full py-2.5 text-xs font-bold {{ $key === 'growth' ? 'text-white bg-brand-600 hover:bg-brand-700' : 'text-brand-600 bg-brand-50 hover:bg-brand-100' }} rounded-lg transition-all">
                        {{ $activeSub && $activeSub->plan_name === $plan['name'] ? 'Current Plan' : 'Subscribe' }}
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
