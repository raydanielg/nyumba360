@extends('layouts.dashboard')

@section('title', 'Payment History - Nyumba360')
@section('page_title', 'Payment History')

@section('content')
<div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
    @if($payments->isEmpty())
        <div class="text-center py-12">
            <p class="text-sm text-gray-400">No payments yet.</p>
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-xs">
                <thead>
                    <tr class="border-b border-[#E6E0DA]">
                        <th class="text-left py-2 px-3 font-bold text-gray-400">Receipt</th>
                        <th class="text-left py-2 px-3 font-bold text-gray-400">Type</th>
                        <th class="text-left py-2 px-3 font-bold text-gray-400">Amount</th>
                        <th class="text-left py-2 px-3 font-bold text-gray-400">Provider</th>
                        <th class="text-left py-2 px-3 font-bold text-gray-400">Status</th>
                        <th class="text-left py-2 px-3 font-bold text-gray-400">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                        <tr class="border-b border-[#E6E0DA] hover:bg-gray-50">
                            <td class="py-2 px-3 font-mono font-bold text-gray-700">{{ $payment->receipt_number ?? $payment->reference }}</td>
                            <td class="py-2 px-3"><span class="capitalize px-2 py-0.5 rounded-full text-[10px] font-bold {{ $payment->type === 'unlock' ? 'bg-gold-50 text-gold-600' : ($payment->type === 'broker_pass' ? 'bg-blue-50 text-blue-600' : 'bg-green-50 text-green-600') }}">{{ str_replace('_', ' ', $payment->type) }}</span></td>
                            <td class="py-2 px-3 font-bold text-gray-900">TZS {{ number_format($payment->amount) }}</td>
                            <td class="py-2 px-3 capitalize text-gray-600">{{ str_replace('_', ' ', $payment->provider) }}</td>
                            <td class="py-2 px-3"><span class="px-2 py-0.5 rounded-full text-[10px] font-bold {{ $payment->status === 'completed' ? 'bg-green-50 text-green-600' : 'bg-yellow-50 text-yellow-600' }}">{{ $payment->status }}</span></td>
                            <td class="py-2 px-3 text-gray-400">{{ $payment->paid_at?->format('M d, Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">{{ $payments->links() }}</div>
    @endif
</div>
@endsection
