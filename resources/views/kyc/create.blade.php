@extends('layouts.dashboard')

@section('title', 'KYC Verification - Nyumba360')
@section('page_title', 'KYC Verification')

@section('content')
<div class="max-w-2xl mx-auto">
    @if($kyc ?? false)
        @if($kyc->status === 'pending')
            <div class="bg-gold-50 border border-gold-200 rounded-2xl p-4 mb-5 flex items-center gap-3">
                <svg class="w-6 h-6 text-gold-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <div>
                    <p class="text-sm font-bold text-gold-800">KYC Under Review</p>
                    <p class="text-xs text-gold-700">Your documents are being reviewed. We'll notify you once approved.</p>
                </div>
            </div>
        @elseif($kyc->status === 'rejected')
            <div class="bg-red-50 border border-red-200 rounded-2xl p-4 mb-5 flex items-center gap-3">
                <svg class="w-6 h-6 text-red-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
                <div>
                    <p class="text-sm font-bold text-red-800">KYC Rejected</p>
                    <p class="text-xs text-red-700">{{ $kyc->admin_notes ?? 'Please resubmit your documents.' }}</p>
                </div>
            </div>
        @endif
    @endif

    <form method="POST" action="{{ route('kyc.store') }}" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <div class="bg-white rounded-2xl p-6 border border-[#E6E0DA]">
            <h3 class="text-sm font-extrabold text-gray-900 mb-4 flex items-center gap-2">
                <div class="w-1 h-5 bg-brand-600 rounded-full"></div>
                Identity Verification
            </h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">NIDA Number *</label>
                    <input type="text" name="nida_number" required class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500" placeholder="e.g. 1990-123456-12345-12345678">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">NIDA Card / Passport Photo *</label>
                    <input type="file" name="id_card" required accept="image/*" class="w-full text-sm border border-[#E6E0DA] rounded-lg p-2">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Selfie (for liveness match) *</label>
                    <input type="file" name="selfie" required accept="image/*" class="w-full text-sm border border-[#E6E0DA] rounded-lg p-2">
                </div>
            </div>
        </div>

        @if(auth()->user()->isLandlord())
            <div class="bg-white rounded-2xl p-6 border border-[#E6E0DA]">
                <h3 class="text-sm font-extrabold text-gray-900 mb-4 flex items-center gap-2">
                    <div class="w-1 h-5 bg-gold-400 rounded-full"></div>
                    Proof of Ownership
                </h3>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Title Deed / Utility Bill / Local Government Letter *</label>
                    <input type="file" name="proof_of_ownership" required accept="image/*" class="w-full text-sm border border-[#E6E0DA] rounded-lg p-2">
                    <p class="text-[10px] text-gray-400 mt-1">Upload any document that proves ownership or authority over the property.</p>
                </div>
            </div>
        @endif

        @if(auth()->user()->isBroker())
            <div class="bg-white rounded-2xl p-6 border border-[#E6E0DA]">
                <h3 class="text-sm font-extrabold text-gray-900 mb-4 flex items-center gap-2">
                    <div class="w-1 h-5 bg-blue-400 rounded-full"></div>
                    Business Information
                </h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Business Name *</label>
                        <input type="text" name="business_name" required class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500" placeholder="e.g. Dar Properties Ltd">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Operating Area(s) *</label>
                        <input type="text" name="operating_area" required class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500" placeholder="e.g. Dar es Salaam - Kinondoni & Ilala">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 mb-1">Business Licence (optional, boosts ranking)</label>
                        <input type="file" name="business_licence" accept="image/*" class="w-full text-sm border border-[#E6E0DA] rounded-lg p-2">
                    </div>
                </div>
            </div>
        @endif

        <div class="flex justify-end gap-3">
            <a href="{{ route('dashboard') }}" class="px-5 py-2.5 text-sm font-bold text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-lg transition-all">Cancel</a>
            <button type="submit" class="px-5 py-2.5 text-sm font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all shadow-sm">Submit KYC</button>
        </div>
    </form>
</div>
@endsection
