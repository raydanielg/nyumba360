@extends('layouts.dashboard')

@section('title', 'Admin Dashboard - Nyumba360')
@section('page_title', 'Admin Dashboard')

@section('content')
<div class="space-y-6">
    {{-- Revenue Summary --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-brand-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/></svg>
                </div>
                <span class="text-[10px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded-full">TOTAL</span>
            </div>
            <p class="text-xs text-gray-400 font-semibold">Total Revenue</p>
            <p class="text-2xl font-extrabold text-gray-900 mt-1">TZS {{ number_format($stats['total_revenue']) }}</p>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-gold-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/></svg>
                </div>
                <span class="text-[10px] font-bold text-gold-600 bg-gold-50 px-2 py-0.5 rounded-full">UNLOCKS</span>
            </div>
            <p class="text-xs text-gray-400 font-semibold">Unlock Revenue</p>
            <p class="text-2xl font-extrabold text-gray-900 mt-1">TZS {{ number_format($stats['unlock_revenue']) }}</p>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <span class="text-[10px] font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded-full">BROKER</span>
            </div>
            <p class="text-xs text-gray-400 font-semibold">Broker Pass Revenue</p>
            <p class="text-2xl font-extrabold text-gray-900 mt-1">TZS {{ number_format($stats['broker_revenue']) }}</p>
        </div>
        <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 bg-green-50 rounded-xl flex items-center justify-center">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                </div>
                <span class="text-[10px] font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded-full">LANDLORD</span>
            </div>
            <p class="text-xs text-gray-400 font-semibold">Landlord Plan Revenue</p>
            <p class="text-2xl font-extrabold text-gray-900 mt-1">TZS {{ number_format($stats['landlord_revenue']) }}</p>
        </div>
    </div>

    {{-- Quick Stats --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3">
        <div class="bg-white rounded-xl p-4 border border-[#E6E0DA] text-center">
            <p class="text-2xl font-extrabold text-brand-600">{{ $stats['total_properties'] }}</p>
            <p class="text-[10px] text-gray-400 font-semibold mt-1">Total Properties</p>
        </div>
        <div class="bg-white rounded-xl p-4 border border-[#E6E0DA] text-center">
            <p class="text-2xl font-extrabold text-gold-500">{{ $stats['pending_approvals'] }}</p>
            <p class="text-[10px] text-gray-400 font-semibold mt-1">Pending Approvals</p>
        </div>
        <div class="bg-white rounded-xl p-4 border border-[#E6E0DA] text-center">
            <p class="text-2xl font-extrabold text-blue-500">{{ $stats['pending_kyc'] }}</p>
            <p class="text-[10px] text-gray-400 font-semibold mt-1">Pending KYC</p>
        </div>
        <div class="bg-white rounded-xl p-4 border border-[#E6E0DA] text-center">
            <p class="text-2xl font-extrabold text-green-600">{{ $stats['total_users'] }}</p>
            <p class="text-[10px] text-gray-400 font-semibold mt-1">Total Users</p>
        </div>
        <div class="bg-white rounded-xl p-4 border border-[#E6E0DA] text-center">
            <p class="text-2xl font-extrabold text-purple-500">{{ $stats['total_unlocks'] }}</p>
            <p class="text-[10px] text-gray-400 font-semibold mt-1">Total Unlocks</p>
        </div>
        <div class="bg-white rounded-xl p-4 border border-[#E6E0DA] text-center">
            <p class="text-2xl font-extrabold text-orange-500">{{ $stats['active_brokers'] }}</p>
            <p class="text-[10px] text-gray-400 font-semibold mt-1">Active Brokers</p>
        </div>
    </div>

    {{-- Pending Approvals + KYC --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-extrabold text-gray-900 flex items-center gap-2">
                    <div class="w-1 h-5 bg-brand-600 rounded-full"></div>
                    Pending Property Approvals
                </h3>
                <a href="{{ route('admin.properties.pending') }}" class="text-xs font-semibold text-brand-600 hover:text-brand-700">View All</a>
            </div>
            @if($pendingProperties->isEmpty())
                <p class="text-xs text-gray-400 text-center py-6">No pending approvals</p>
            @else
                <div class="space-y-3">
                    @foreach($pendingProperties->take(5) as $property)
                        <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50">
                            <div class="w-12 h-12 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                                @if($property->images->first())
                                    <img src="{{ asset('storage/' . $property->images->first()->image_path) }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center"><svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></div>
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-bold text-gray-900 truncate">{{ $property->title }}</p>
                                <p class="text-[10px] text-gray-400">{{ $property->user->name }} - {{ $property->region }}</p>
                            </div>
                            <span class="text-[10px] font-bold text-gold-600 bg-gold-50 px-2 py-0.5 rounded-full">PENDING</span>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-extrabold text-gray-900 flex items-center gap-2">
                    <div class="w-1 h-5 bg-gold-400 rounded-full"></div>
                    Pending KYC Reviews
                </h3>
                <a href="{{ route('admin.kyc.pending') }}" class="text-xs font-semibold text-brand-600 hover:text-brand-700">View All</a>
            </div>
            @if($pendingKyc->isEmpty())
                <p class="text-xs text-gray-400 text-center py-6">No pending KYC reviews</p>
            @else
                <div class="space-y-3">
                    @foreach($pendingKyc->take(5) as $kyc)
                        <div class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50">
                            <div class="w-10 h-10 bg-brand-600 rounded-full flex items-center justify-center text-white font-bold text-xs">
                                {{ strtoupper(substr($kyc->user->name, 0, 1)) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-xs font-bold text-gray-900 truncate">{{ $kyc->user->name }}</p>
                                <p class="text-[10px] text-gray-400 capitalize">{{ $kyc->user->role }} - NIDA: {{ $kyc->nida_number }}</p>
                            </div>
                            <span class="text-[10px] font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded-full">REVIEW</span>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    {{-- Recent Payments --}}
    <div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
        <h3 class="text-sm font-extrabold text-gray-900 mb-4 flex items-center gap-2">
            <div class="w-1 h-5 bg-green-500 rounded-full"></div>
            Recent Payments
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
                        <th class="text-left py-2 px-3 font-bold text-gray-400">Status</th>
                        <th class="text-left py-2 px-3 font-bold text-gray-400">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentPayments as $payment)
                        <tr class="border-b border-[#E6E0DA] hover:bg-gray-50">
                            <td class="py-2 px-3 font-mono font-bold text-gray-700">{{ $payment->receipt_number ?? $payment->reference }}</td>
                            <td class="py-2 px-3 text-gray-600">{{ $payment->user->name }}</td>
                            <td class="py-2 px-3"><span class="capitalize px-2 py-0.5 rounded-full text-[10px] font-bold {{ $payment->type === 'unlock' ? 'bg-gold-50 text-gold-600' : ($payment->type === 'broker_pass' ? 'bg-blue-50 text-blue-600' : 'bg-green-50 text-green-600') }}">{{ str_replace('_', ' ', $payment->type) }}</span></td>
                            <td class="py-2 px-3 font-bold text-gray-900">TZS {{ number_format($payment->amount) }}</td>
                            <td class="py-2 px-3 capitalize text-gray-600">{{ str_replace('_', ' ', $payment->provider) }}</td>
                            <td class="py-2 px-3"><span class="px-2 py-0.5 rounded-full text-[10px] font-bold {{ $payment->status === 'completed' ? 'bg-green-50 text-green-600' : 'bg-yellow-50 text-yellow-600' }}">{{ $payment->status }}</span></td>
                            <td class="py-2 px-3 text-gray-400">{{ $payment->paid_at?->format('M d, Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="text-center py-6 text-gray-400">No payments yet</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
