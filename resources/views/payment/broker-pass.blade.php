@extends('layouts.dashboard')

@section('title', 'Broker Pass - Nyumba360')
@section('page_title', 'Broker Access Pass')

@section('content')
<div class="max-w-lg mx-auto">
    @if($activePass)
        <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-2xl p-6 text-white mb-5">
            <p class="text-xs opacity-80">Active Broker Pass</p>
            <p class="text-2xl font-extrabold mt-1">Expires in {{ $activePass->daysRemaining() }} days</p>
            <p class="text-xs opacity-80 mt-1">{{ $activePass->expires_at->format('M d, Y H:i') }}</p>
        </div>
    @endif

    <div class="bg-white rounded-2xl p-6 border border-[#E6E0DA]">
        <div class="text-center mb-6">
            <div class="w-16 h-16 mx-auto bg-blue-50 rounded-full flex items-center justify-center mb-3">
                <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8"/></svg>
            </div>
            <h2 class="text-lg font-extrabold text-gray-900">Broker Access Pass</h2>
            <p class="text-2xl font-extrabold text-brand-600 mt-2">TZS {{ number_format($price) }} / {{ $durationDays }} days</p>
        </div>

        <div class="bg-gray-50 rounded-xl p-4 mb-5 space-y-2">
            <div class="flex items-center gap-2 text-xs text-gray-600">
                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                List unlimited properties
            </div>
            <div class="flex items-center gap-2 text-xs text-gray-600">
                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Appear in search results
            </div>
            <div class="flex items-center gap-2 text-xs text-gray-600">
                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Receive unlock notifications
            </div>
            <div class="flex items-center gap-2 text-xs text-gray-600">
                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Instant activation
            </div>
        </div>

        <form method="POST" action="{{ route('payment.broker-pass.process') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-2">Payment Method</label>
                <div class="grid grid-cols-3 gap-2">
                    <label class="cursor-pointer">
                        <input type="radio" name="provider" value="mpesa" checked class="peer sr-only">
                        <div class="p-3 border-2 border-[#E6E0DA] rounded-xl text-center peer-checked:border-green-500 peer-checked:bg-green-50 transition-all">
                            <p class="text-xs font-bold">M-Pesa</p>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="provider" value="airtel_money" class="peer sr-only">
                        <div class="p-3 border-2 border-[#E6E0DA] rounded-xl text-center peer-checked:border-red-500 peer-checked:bg-red-50 transition-all">
                            <p class="text-xs font-bold">Airtel</p>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="provider" value="mixx_by_yas" class="peer sr-only">
                        <div class="p-3 border-2 border-[#E6E0DA] rounded-xl text-center peer-checked:border-purple-500 peer-checked:bg-purple-50 transition-all">
                            <p class="text-xs font-bold">Mixx</p>
                        </div>
                    </label>
                </div>
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Phone Number</label>
                <input type="text" name="phone" required class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500" placeholder="0712345678" value="{{ auth()->user()->phone ?? '' }}">
            </div>
            <button type="submit" class="w-full py-3 text-sm font-extrabold text-white bg-brand-600 hover:bg-brand-700 rounded-xl shadow-lg transition-all">
                {{ $activePass ? 'Renew Pass - TZS ' . number_format($price) : 'Activate Pass - TZS ' . number_format($price) }}
            </button>
        </form>
    </div>
</div>
@endsection
