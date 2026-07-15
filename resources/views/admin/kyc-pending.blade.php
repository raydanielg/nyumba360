@extends('layouts.dashboard')

@section('title', 'KYC Review - Nyumba360')
@section('page_title', 'Pending KYC Reviews')

@section('content')
<div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
    @if($kycs->isEmpty())
        <div class="text-center py-12">
            <p class="text-sm text-gray-400">No pending KYC reviews.</p>
        </div>
    @else
        <div class="space-y-4">
            @foreach($kycs as $kyc)
                <div class="border border-[#E6E0DA] rounded-xl p-4">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 bg-brand-600 rounded-full flex items-center justify-center text-white font-bold">
                                {{ strtoupper(substr($kyc->user->name, 0, 1)) }}
                            </div>
                            <div>
                                <p class="text-sm font-bold text-gray-900">{{ $kyc->user->name }}</p>
                                <p class="text-xs text-gray-400 capitalize">{{ $kyc->user->role }} - {{ $kyc->user->email }}</p>
                                <p class="text-xs text-gray-500 mt-1">NIDA: {{ $kyc->nida_number }}</p>
                                @if($kyc->business_name)
                                    <p class="text-xs text-gray-500">Business: {{ $kyc->business_name }} - {{ $kyc->operating_area }}</p>
                                @endif
                            </div>
                        </div>
                        <span class="text-[10px] font-bold text-gold-600 bg-gold-50 px-2 py-0.5 rounded-full">PENDING</span>
                    </div>
                    <div class="flex gap-2 mt-3">
                        <form method="POST" action="{{ route('admin.kyc.approve', $kyc) }}">
                            @csrf
                            <button type="submit" class="px-4 py-2 text-xs font-bold text-white bg-green-600 hover:bg-green-700 rounded-lg transition-all">Approve KYC</button>
                        </form>
                        <form method="POST" action="{{ route('admin.kyc.reject', $kyc) }}" class="flex gap-2">
                            @csrf
                            <input type="text" name="notes" required placeholder="Rejection reason" class="px-3 py-2 text-xs border border-[#E6E0DA] rounded-lg flex-1">
                            <button type="submit" class="px-4 py-2 text-xs font-bold text-white bg-red-500 hover:bg-red-600 rounded-lg transition-all">Reject</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">{{ $kycs->links() }}</div>
    @endif
</div>
@endsection
