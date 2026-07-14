@extends('layouts.auth')

@section('title', 'Verify Email - Nyumba360')

@section('content')
<div class="w-full max-w-md" style="animation: simpleFadeIn 0.4s ease-out both;">
    <div class="bg-white rounded-2xl shadow-2xl border border-white/20 overflow-hidden">
        {{-- Header --}}
        <div class="bg-gradient-to-br from-brand-600 to-brand-800 px-8 py-8 text-center relative overflow-hidden">
            <div class="absolute top-2 left-4 w-2 h-2 rounded-full bg-white/20"></div>
            <div class="absolute top-6 right-8 w-3 h-3 rounded-full bg-white/15"></div>
            <div class="absolute bottom-4 left-10 w-2 h-2 rounded-full bg-white/25"></div>
            <div class="absolute top-10 right-4 w-1.5 h-1.5 rounded-full bg-white/30"></div>

            <div class="w-16 h-16 mx-auto bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-4 border border-white/20">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <h2 class="text-2xl font-extrabold text-white">Verify Email</h2>
            <p class="text-brand-100 text-sm mt-1">One more step to get started</p>
        </div>

        {{-- Content --}}
        <div class="p-8 text-center">
            @if (session('resent'))
                <div class="mb-6 p-4 rounded-xl bg-brand-50 border border-brand-200 text-brand-700 text-sm flex items-center gap-2">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    A fresh verification link has been sent to your email address.
                </div>
            @endif

            <div class="w-20 h-20 mx-auto bg-gold-50 rounded-full flex items-center justify-center mb-5">
                <svg class="w-10 h-10 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
            </div>

            <p class="text-gray-600 mb-2">Before proceeding, please check your email for a verification link.</p>
            <p class="text-gray-500 text-sm mb-6">If you did not receive the email, click the button below to request another.</p>

            <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <button type="submit" class="w-full py-3 text-sm font-bold text-white bg-gradient-to-r from-gold-400 to-gold-500 hover:from-gold-500 hover:to-gold-600 rounded-lg shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    Resend Verification Link
                </button>
            </form>
        </div>
    </div>

    <p class="mt-6 text-center text-xs text-gray-400">&copy; {{ date('Y') }} Nyumba360. All rights reserved.</p>
</div>
@endsection
