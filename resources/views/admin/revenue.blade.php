@extends('layouts.dashboard')

@section('title', 'Revenue Report - Nyumba360')
@section('page_title', 'Revenue Analytics')

@section('content')
<div class="space-y-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-gradient-to-br from-brand-600 to-brand-700 rounded-2xl p-5 text-white">
            <p class="text-xs opacity-80">Total Revenue</p>
            <p class="text-2xl font-extrabold mt-1">TZS {{ number_format($totalRevenue) }}</p>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
            <p class="text-xs text-gray-400 font-semibold">Unlock Revenue</p>
            <p class="text-xl font-extrabold text-gold-500 mt-1">TZS {{ number_format($unlockRevenue) }}</p>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
            <p class="text-xs text-gray-400 font-semibold">Broker Pass Revenue</p>
            <p class="text-xl font-extrabold text-blue-500 mt-1">TZS {{ number_format($brokerRevenue) }}</p>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
            <p class="text-xs text-gray-400 font-semibold">Landlord Plan Revenue</p>
            <p class="text-xl font-extrabold text-green-600 mt-1">TZS {{ number_format($landlordRevenue) }}</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
        <h3 class="text-sm font-extrabold text-gray-900 mb-4 flex items-center gap-2">
            <div class="w-1 h-5 bg-green-500 rounded-full"></div>
            Recent Transactions
        </h3>
        <div class="overflow-x-auto">
            <table class="w-full text-xs">
                <thead>
                    <tr class="border-b border-[#E6E0DA]">
                        <th class="text-left py-2 px-3 font-bold text-gray-400">Receipt</th>
                        <th class="text-left py-2 px-3 font-bold text-gray-400">User</th>
                        <th class="text-left py-2 px-3 font-bold text-gray-400">Type</th>
                        <th class="text-left py-2 px-3 font-bold text-gray-400">Amount</th>
                        <th class="text-left py-2 px-3 font-bold text-gray-400">Provider</th>
                        <th class="text-left py-2 px-3 font-bold text-gray-400">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentPayments as $payment)
                        <tr class="border-b border-[#E6E0DA] hover:bg-gray-50">
                            <td class="py-2 px-3 font-mono font-bold text-gray-700">{{ $payment->receipt_number ?? $payment->reference }}</td>
                            <td class="py-2 px-3 text-gray-600">{{ $payment->user->name }}</td>
                            <td class="py-2 px-3 capitalize">{{ str_replace('_', ' ', $payment->type) }}</td>
                            <td class="py-2 px-3 font-bold text-gray-900">TZS {{ number_format($payment->amount) }}</td>
                            <td class="py-2 px-3 capitalize text-gray-600">{{ str_replace('_', ' ', $payment->provider) }}</td>
                            <td class="py-2 px-3 text-gray-400">{{ $payment->paid_at?->format('M d, Y') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center py-6 text-gray-400">No transactions yet</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
