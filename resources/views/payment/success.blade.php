@extends('layouts.dashboard')

@section('title', 'Payment Success - Nyumba360')
@section('page_title', 'Payment Successful')

@section('content')
<div class="max-w-lg mx-auto">
    <div class="bg-white rounded-2xl p-8 border border-[#E6E0DA] text-center">
        <div class="w-20 h-20 mx-auto bg-green-100 rounded-full flex items-center justify-center mb-4">
            <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
        </div>
        <h2 class="text-xl font-extrabold text-gray-900 mb-1">Contact Unlocked!</h2>
        <p class="text-sm text-gray-400 mb-6">You now have permanent access to this property's contact details</p>

        <div class="bg-gray-50 rounded-xl p-4 text-left space-y-2 mb-6">
            <div class="flex justify-between text-xs">
                <span class="text-gray-400">Property</span>
                <span class="font-bold text-gray-900">{{ $property->title }}</span>
            </div>
            <div class="flex justify-between text-xs">
                <span class="text-gray-400">Amount Paid</span>
                <span class="font-bold text-gray-900">TZS {{ number_format($payment->amount) }}</span>
            </div>
            <div class="flex justify-between text-xs">
                <span class="text-gray-400">Receipt No.</span>
                <span class="font-mono font-bold text-brand-600">{{ $payment->receipt_number }}</span>
            </div>
            <div class="flex justify-between text-xs">
                <span class="text-gray-400">Payment Method</span>
                <span class="font-bold text-gray-900 capitalize">{{ str_replace('_', ' ', $payment->provider) }}</span>
            </div>
            <div class="flex justify-between text-xs">
                <span class="text-gray-400">Date</span>
                <span class="font-bold text-gray-900">{{ $payment->paid_at->format('M d, Y H:i') }}</span>
            </div>
        </div>

        <div class="bg-brand-50 border border-brand-200 rounded-xl p-4 mb-6">
            <p class="text-xs font-bold text-brand-700 mb-2">Owner Contact Details</p>
            <p class="text-sm font-bold text-gray-900">{{ $property->user->name }}</p>
            <p class="text-sm text-brand-600 font-bold">{{ $property->user->phone }}</p>
            <p class="text-xs text-gray-500 mt-1">{{ $property->region }}, {{ $property->district }}{{ $property->street ? ', ' . $property->street : '' }}</p>
        </div>

        <div class="flex gap-3">
            <a href="tel:{{ $property->user->phone }}" class="flex-1 py-3 text-sm font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-xl transition-all flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                Call Now
            </a>
            <a href="{{ route('properties.show', $property) }}" class="flex-1 py-3 text-sm font-bold text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-xl transition-all">View Property</a>
        </div>
    </div>
</div>
@endsection
