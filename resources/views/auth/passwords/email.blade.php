@extends('layouts.auth')

@section('title', 'Reset Password - Nyumba360')

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
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
            </div>
            <h2 class="text-2xl font-extrabold text-white">Reset Password</h2>
            <p class="text-brand-100 text-sm mt-1">We will send you a reset link</p>
        </div>

        {{-- Form --}}
        <div class="p-8">
            @if (session('status'))
                <div class="mb-6 p-4 rounded-xl bg-brand-50 border border-brand-200 text-brand-700 text-sm flex items-center gap-2">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            class="w-full pl-11 pr-4 py-2.5 rounded-lg border @error('email') border-red-300 ring-2 ring-red-100 @else border-gray-200 @enderror focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm"
                            placeholder="you@example.com">
                    </div>
                    @error('email')
                        <p class="mt-1.5 text-sm text-red-600 flex items-center gap-1"><svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit --}}
                <button type="submit" class="w-full py-3 text-sm font-bold text-white bg-gradient-to-r from-gold-400 to-gold-500 hover:from-gold-500 hover:to-gold-600 rounded-lg shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/></svg>
                    Send Reset Link
                </button>
            </form>

            {{-- Back to login --}}
            <div class="mt-6 text-center">
                <a href="{{ route('login') }}" class="inline-flex items-center gap-1 text-sm font-medium text-brand-600 hover:text-brand-700 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Back to Login
                </a>
            </div>
        </div>
    </div>

    <p class="mt-6 text-center text-xs text-gray-400">&copy; {{ date('Y') }} Nyumba360. All rights reserved.</p>
</div>
@endsection
