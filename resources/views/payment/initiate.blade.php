@extends('layouts.dashboard')

@section('title', 'Unlock Property - Nyumba360')
@section('page_title', 'Unlock Contact')

@section('content')
<div class="max-w-lg mx-auto">
    <div class="bg-white rounded-2xl p-6 border border-[#E6E0DA]">
        <div class="text-center mb-6">
            <div class="w-16 h-16 mx-auto bg-gold-50 rounded-full flex items-center justify-center mb-3">
                <svg class="w-8 h-8 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            </div>
            <h2 class="text-lg font-extrabold text-gray-900">Unlock Contact Details</h2>
            <p class="text-xs text-gray-400 mt-1">{{ $property->title }}</p>
            <p class="text-2xl font-extrabold text-gold-500 mt-3">TZS {{ number_format($unlockFee) }}</p>
        </div>

        <div class="bg-gray-50 rounded-xl p-4 mb-5 space-y-2">
            <div class="flex items-center gap-2 text-xs text-gray-600">
                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Exact location with map pin
            </div>
            <div class="flex items-center gap-2 text-xs text-gray-600">
                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Owner's phone number (call & WhatsApp)
            </div>
            <div class="flex items-center gap-2 text-xs text-gray-600">
                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Permanent access - never pay again for this house
            </div>
            <div class="flex items-center gap-2 text-xs text-gray-600">
                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                PDF receipt issued instantly
            </div>
        </div>

        <form method="POST" action="{{ route('unlock.process', $property) }}" class="space-y-4">
            @csrf
            <input type="hidden" name="payment_id" value="{{ $payment->id }}">
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-2">Choose Payment Method</label>
                <div class="grid grid-cols-3 gap-2">
                    <label class="cursor-pointer">
                        <input type="radio" name="provider" value="mpesa" checked class="peer sr-only">
                        <div class="p-3 border-2 border-[#E6E0DA] rounded-xl text-center peer-checked:border-green-500 peer-checked:bg-green-50 transition-all">
                            <p class="text-xs font-bold text-gray-900">M-Pesa</p>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="provider" value="airtel_money" class="peer sr-only">
                        <div class="p-3 border-2 border-[#E6E0DA] rounded-xl text-center peer-checked:border-red-500 peer-checked:bg-red-50 transition-all">
                            <p class="text-xs font-bold text-gray-900">Airtel</p>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="provider" value="mixx_by_yas" class="peer sr-only">
                        <div class="p-3 border-2 border-[#E6E0DA] rounded-xl text-center peer-checked:border-purple-500 peer-checked:bg-purple-50 transition-all">
                            <p class="text-xs font-bold text-gray-900">Mixx</p>
                        </div>
                    </label>
                </div>
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 mb-1">Phone Number</label>
                <input type="text" name="phone" required class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500" placeholder="e.g. 0712345678" value="{{ auth()->user()->phone ?? '' }}">
            </div>
            <button type="submit" class="w-full py-3 text-sm font-extrabold text-white bg-gradient-to-r from-gold-400 to-gold-500 hover:from-gold-500 hover:to-gold-600 rounded-xl shadow-lg transition-all">
                Pay TZS {{ number_format($unlockFee) }} & Unlock
            </button>
        </form>

        <p class="text-[10px] text-gray-400 text-center mt-4">By unlocking, you agree to our terms. Payment is non-refundable unless the property is marked taken within 24 hours.</p>
    </div>
</div>
@endsection
