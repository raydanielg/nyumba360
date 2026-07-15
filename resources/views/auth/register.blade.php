@extends('layouts.auth')

@section('title', 'Register - Nyumba360')

@section('content')
<div class="w-full max-w-lg" style="animation: simpleFadeIn 0.4s ease-out both;">
    <div class="bg-white rounded-2xl shadow-2xl border border-white/20 overflow-hidden">

        {{-- Header --}}
        <div class="bg-gradient-to-br from-brand-600 to-brand-800 px-8 py-6 text-center relative overflow-hidden">
            <div class="absolute top-2 left-4 w-2 h-2 rounded-full bg-white/20"></div>
            <div class="absolute top-6 right-8 w-3 h-3 rounded-full bg-white/15"></div>
            <div class="absolute bottom-4 left-10 w-2 h-2 rounded-full bg-white/25"></div>
            <div class="absolute top-10 right-4 w-1.5 h-1.5 rounded-full bg-white/30"></div>

            <div class="w-14 h-14 mx-auto bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center mb-3 border border-white/20">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
            </div>
            <h2 class="text-2xl font-extrabold text-white">Join Nyumba360</h2>
            <p class="text-brand-100 text-sm mt-1">Let's get to know you better</p>
        </div>

        {{-- Progress Bar --}}
        <div class="px-8 pt-5">
            <div class="flex items-center gap-2 mb-2">
                <div class="flex-1 h-1.5 rounded-full bg-gray-200 overflow-hidden">
                    <div id="progressBar" class="h-full bg-gradient-to-r from-gold-400 to-gold-500 rounded-full transition-all duration-500" style="width: 25%;"></div>
                </div>
            </div>
            <div class="flex items-center justify-between text-[10px] font-semibold text-gray-400">
                <span id="stepLabel" class="text-brand-600">Step 1 of 4</span>
                <span id="stepTitle">Account Details</span>
            </div>
        </div>

        {{-- Form --}}
        <div class="p-8 pt-4">
            <form method="POST" action="{{ route('register') }}" id="registerForm" class="space-y-4">
                @csrf

                {{-- ===== STEP 1: Account DETAILS ===== --}}
                <div id="step1" class="step-section space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-1.5">Full Name</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            </div>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                class="w-full pl-11 pr-4 py-2.5 rounded-lg border @error('name') border-red-300 ring-2 ring-red-100 @else border-gray-200 @enderror focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm"
                                placeholder="John Doe">
                        </div>
                        @error('name')<p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                                class="w-full pl-11 pr-4 py-2.5 rounded-lg border @error('email') border-red-300 ring-2 ring-red-100 @else border-gray-200 @enderror focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm"
                                placeholder="name@example.com">
                        </div>
                        @error('email')<p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="phone" class="block text-sm font-semibold text-gray-700 mb-1.5">Phone Number</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <input id="phone" type="tel" name="phone" value="{{ old('phone') }}" required
                                class="w-full pl-11 pr-4 py-2.5 rounded-lg border @error('phone') border-red-300 ring-2 ring-red-100 @else border-gray-200 @enderror focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm"
                                placeholder="+255 7XX XXX XXX">
                        </div>
                        @error('phone')<p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-1.5">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                            </div>
                            <input id="password" type="password" name="password" required autocomplete="new-password" minlength="8"
                                class="w-full pl-11 pr-4 py-2.5 rounded-lg border @error('password') border-red-300 ring-2 ring-red-100 @else border-gray-200 @enderror focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm"
                                placeholder="Min. 8 characters">
                        </div>
                        @error('password')<p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="password-confirm" class="block text-sm font-semibold text-gray-700 mb-1.5">Confirm Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"
                                class="w-full pl-11 pr-4 py-2.5 rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm"
                                placeholder="Re-enter your password">
                        </div>
                    </div>

                    <button type="button" onclick="nextStep(1)" class="w-full py-3 text-sm font-bold text-white bg-gradient-to-r from-gold-400 to-gold-500 hover:from-gold-500 hover:to-gold-600 rounded-lg shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2">
                        Continue
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                </div>

                {{-- ===== STEP 2: ROLE SELECTION ===== --}}
                <div id="step2" class="step-section space-y-4 hidden">
                    <div class="text-center mb-2">
                        <p class="text-sm text-gray-500">I want to use Nyumba360 as a...</p>
                    </div>

                    <div class="grid grid-cols-1 gap-3">
                        {{-- Tenant --}}
                        <label class="cursor-pointer">
                            <input type="radio" name="role" value="tenant" class="peer sr-only" {{ old('role') === 'tenant' ? 'checked' : '' }} required>
                            <div class="flex items-center gap-3 p-4 rounded-xl border-2 border-gray-200 peer-checked:border-brand-500 peer-checked:bg-brand-50 transition-all hover:border-brand-300">
                                <div class="w-11 h-11 bg-brand-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-bold text-gray-900">Tenant / Renter</p>
                                    <p class="text-xs text-gray-500">I'm looking for a house to rent</p>
                                </div>
                                <svg class="w-5 h-5 text-brand-500 hidden peer-checked:block" fill="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke="currentColor" fill="none" stroke-width="2"/></svg>
                            </div>
                        </label>

                        {{-- Broker --}}
                        <label class="cursor-pointer">
                            <input type="radio" name="role" value="broker" class="peer sr-only" {{ old('role') === 'broker' ? 'checked' : '' }}>
                            <div class="flex items-center gap-3 p-4 rounded-xl border-2 border-gray-200 peer-checked:border-brand-500 peer-checked:bg-brand-50 transition-all hover:border-brand-300">
                                <div class="w-11 h-11 bg-gold-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-bold text-gray-900">Broker / Agent (Dalali)</p>
                                    <p class="text-xs text-gray-500">I help people find rental properties</p>
                                </div>
                            </div>
                        </label>

                        {{-- Owner --}}
                        <label class="cursor-pointer">
                            <input type="radio" name="role" value="landlord" class="peer sr-only" {{ old('role') === 'landlord' ? 'checked' : '' }}>
                            <div class="flex items-center gap-3 p-4 rounded-xl border-2 border-gray-200 peer-checked:border-brand-500 peer-checked:bg-brand-50 transition-all hover:border-brand-300">
                                <div class="w-11 h-11 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 21V8l9-5 9 5v13M3 21h18M9 21V12h6v9"/></svg>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-bold text-gray-900">Property Owner / Landlord (Mwenye Nyumba)</p>
                                    <p class="text-xs text-gray-500">I have properties to rent out</p>
                                </div>
                            </div>
                        </label>
                    </div>
                    @error('role')<p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>@enderror

                    <div class="flex gap-3">
                        <button type="button" onclick="prevStep(2)" class="px-5 py-3 text-sm font-bold text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-lg transition-all flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            Back
                        </button>
                        <button type="button" onclick="nextStep(2)" class="flex-1 py-3 text-sm font-bold text-white bg-gradient-to-r from-gold-400 to-gold-500 hover:from-gold-500 hover:to-gold-600 rounded-lg shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2">
                            Continue
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </div>
                </div>

                {{-- ===== STEP 3: LOCATION ===== --}}
                <div id="step3" class="step-section space-y-4 hidden">
                    <div class="text-center mb-2">
                        <p class="text-sm text-gray-500">Where are you based?</p>
                    </div>

                    <div>
                        <label for="region" class="block text-sm font-semibold text-gray-700 mb-1.5">Region (Mkoa)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <select id="region" name="region" required
                                class="w-full pl-11 pr-4 py-2.5 rounded-lg border @error('region') border-red-300 ring-2 ring-red-100 @else border-gray-200 @enderror focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm bg-white cursor-pointer">
                                <option value="">Select your region...</option>
                                <option value="dar_es_salaam" {{ old('region') === 'dar_es_salaam' ? 'selected' : '' }}>Dar es Salaam</option>
                                <option value="arusha" {{ old('region') === 'arusha' ? 'selected' : '' }}>Arusha</option>
                                <option value="mwanza" {{ old('region') === 'mwanza' ? 'selected' : '' }}>Mwanza</option>
                                <option value="dodoma" {{ old('region') === 'dodoma' ? 'selected' : '' }}>Dodoma</option>
                                <option value="tanga" {{ old('region') === 'tanga' ? 'selected' : '' }}>Tanga</option>
                                <option value="morogoro" {{ old('region') === 'morogoro' ? 'selected' : '' }}>Morogoro</option>
                                <option value="mbeya" {{ old('region') === 'mbeya' ? 'selected' : '' }}>Mbeya</option>
                                <option value="kilimanjaro" {{ old('region') === 'kilimanjaro' ? 'selected' : '' }}>Kilimanjaro</option>
                                <option value="zanzibar" {{ old('region') === 'zanzibar' ? 'selected' : '' }}>Zanzibar</option>
                                <option value="mara" {{ old('region') === 'mara' ? 'selected' : '' }}>Mara</option>
                                <option value="pwani" {{ old('region') === 'pwani' ? 'selected' : '' }}>Pwani</option>
                                <option value="kigoma" {{ old('region') === 'kigoma' ? 'selected' : '' }}>Kigoma</option>
                                <option value="rukwa" {{ old('region') === 'rukwa' ? 'selected' : '' }}>Rukwa</option>
                                <option value="songwe" {{ old('region') === 'songwe' ? 'selected' : '' }}>Songwe</option>
                                <option value="geita" {{ old('region') === 'geita' ? 'selected' : '' }}>Geita</option>
                                <option value="simiyu" {{ old('region') === 'simiyu' ? 'selected' : '' }}>Simiyu</option>
                                <option value="kagera" {{ old('region') === 'kagera' ? 'selected' : '' }}>Kagera</option>
                                <option value="rukwa" {{ old('region') === 'rukwa' ? 'selected' : '' }}>Rukwa</option>
                                <option value="iringa" {{ old('region') === 'iringa' ? 'selected' : '' }}>Iringa</option>
                                <option value="njombe" {{ old('region') === 'njombe' ? 'selected' : '' }}>Njombe</option>
                                <option value="ruvuma" {{ old('region') === 'ruvuma' ? 'selected' : '' }}>Ruvuma</option>
                                <option value="lindi" {{ old('region') === 'lindi' ? 'selected' : '' }}>Lindi</option>
                                <option value="mtwara" {{ old('region') === 'mtwara' ? 'selected' : '' }}>Mtwara</option>
                                <option value="rukwa" {{ old('region') === 'rukwa' ? 'selected' : '' }}>Rukwa</option>
                                <option value="katavi" {{ old('region') === 'katavi' ? 'selected' : '' }}>Katavi</option>
                                <option value="manyara" {{ old('region') === 'manyara' ? 'selected' : '' }}>Manyara</option>
                                <option value="shinyanga" {{ old('region') === 'shinyanga' ? 'selected' : '' }}>Shinyanga</option>
                                <option value="singida" {{ old('region') === 'singida' ? 'selected' : '' }}>Singida</option>
                                <option value="tabora" {{ old('region') === 'tabora' ? 'selected' : '' }}>Tabora</option>
                                <option value="kusini_pemba" {{ old('region') === 'kusini_pemba' ? 'selected' : '' }}>Kusini Pemba</option>
                                <option value="kusini_unguja" {{ old('region') === 'kusini_unguja' ? 'selected' : '' }}>Kusini Unguja</option>
                                <option value="kaskazini_pemba" {{ old('region') === 'kaskazini_pemba' ? 'selected' : '' }}>Kaskazini Pemba</option>
                                <option value="kaskazini_unguja" {{ old('region') === 'kaskazini_unguja' ? 'selected' : '' }}>Kaskazini Unguja</option>
                                <option value="mjini_magharibi" {{ old('region') === 'mjini_magharibi' ? 'selected' : '' }}>Mjini Magharibi</option>
                            </select>
                        </div>
                        @error('region')<p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label for="district" class="block text-sm font-semibold text-gray-700 mb-1.5">District (Wilaya)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5"/></svg>
                            </div>
                            <input id="district" type="text" name="district" value="{{ old('district') }}" required
                                class="w-full pl-11 pr-4 py-2.5 rounded-lg border @error('district') border-red-300 ring-2 ring-red-100 @else border-gray-200 @enderror focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm"
                                placeholder="e.g. Kinondoni, Ilala, Arusha CC">
                        </div>
                        @error('district')<p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>

                    <div class="flex gap-3">
                        <button type="button" onclick="prevStep(3)" class="px-5 py-3 text-sm font-bold text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-lg transition-all flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            Back
                        </button>
                        <button type="button" onclick="nextStep(3)" class="flex-1 py-3 text-sm font-bold text-white bg-gradient-to-r from-gold-400 to-gold-500 hover:from-gold-500 hover:to-gold-600 rounded-lg shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2">
                            Continue
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </button>
                    </div>
                </div>

                {{-- ===== STEP 4: PREFERENCES ===== --}}
                <div id="step4" class="step-section space-y-4 hidden">
                    <div class="text-center mb-2">
                        <p class="text-sm text-gray-500">Tell us about your preferences</p>
                    </div>

                    <div>
                        <label for="property_type_preference" class="block text-sm font-semibold text-gray-700 mb-1.5">Preferred Property Type</label>
                        <select id="property_type_preference" name="property_type_preference"
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm bg-white cursor-pointer">
                            <option value="">Any type</option>
                            <option value="house" {{ old('property_type_preference') === 'house' ? 'selected' : '' }}>House</option>
                            <option value="apartment" {{ old('property_type_preference') === 'apartment' ? 'selected' : '' }}>Apartment</option>
                            <option value="studio" {{ old('property_type_preference') === 'studio' ? 'selected' : '' }}>Studio</option>
                            <option value="maisonette" {{ old('property_type_preference') === 'maisonette' ? 'selected' : '' }}>Maisonette</option>
                            <option value="commercial" {{ old('property_type_preference') === 'commercial' ? 'selected' : '' }}>Commercial</option>
                            <option value="office" {{ old('property_type_preference') === 'office' ? 'selected' : '' }}>Office</option>
                            <option value="shop" {{ old('property_type_preference') === 'shop' ? 'selected' : '' }}>Shop</option>
                            <option value="warehouse" {{ old('property_type_preference') === 'warehouse' ? 'selected' : '' }}>Warehouse</option>
                            <option value="land" {{ old('property_type_preference') === 'land' ? 'selected' : '' }}>Land</option>
                        </select>
                    </div>

                    <div>
                        <label for="budget_range" class="block text-sm font-semibold text-gray-700 mb-1.5">Budget Range (TSh/month)</label>
                        <select id="budget_range" name="budget_range"
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm bg-white cursor-pointer">
                            <option value="">Any budget</option>
                            <option value="under_200k" {{ old('budget_range') === 'under_200k' ? 'selected' : '' }}>Under 200,000</option>
                            <option value="200k_500k" {{ old('budget_range') === '200k_500k' ? 'selected' : '' }}>200,000 - 500,000</option>
                            <option value="500k_1m" {{ old('budget_range') === '500k_1m' ? 'selected' : '' }}>500,000 - 1,000,000</option>
                            <option value="1m_2m" {{ old('budget_range') === '1m_2m' ? 'selected' : '' }}>1,000,000 - 2,000,000</option>
                            <option value="above_2m" {{ old('budget_range') === 'above_2m' ? 'selected' : '' }}>Above 2,000,000</option>
                        </select>
                    </div>

                    <div>
                        <label for="bio" class="block text-sm font-semibold text-gray-700 mb-1.5">Short Bio (Optional)</label>
                        <textarea id="bio" name="bio" rows="3" maxlength="500"
                            class="w-full px-4 py-2.5 rounded-lg border border-gray-200 focus:border-brand-500 focus:ring-2 focus:ring-brand-200 outline-none transition-all text-sm resize-none"
                            placeholder="Tell us a bit about yourself...">{{ old('bio') }}</textarea>
                    </div>

                    <div class="flex gap-3">
                        <button type="button" onclick="prevStep(4)" class="px-5 py-3 text-sm font-bold text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-lg transition-all flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                            Back
                        </button>
                        <button type="submit" class="flex-1 py-3 text-sm font-bold text-white bg-gradient-to-r from-brand-600 to-brand-700 hover:from-brand-700 hover:to-brand-800 rounded-lg shadow-md hover:shadow-lg transition-all flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                            Create Account
                        </button>
                    </div>
                </div>

            </form>

            {{-- Divider --}}
            <div class="relative my-5">
                <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-200"></div></div>
                <div class="relative flex justify-center text-sm"><span class="px-3 bg-white text-gray-400">or</span></div>
            </div>

            {{-- Login link --}}
            <p class="text-center text-sm text-gray-500">
                Already have an account?
                <a href="{{ route('login') }}" class="font-semibold text-brand-600 hover:text-brand-700 transition-colors">Sign in</a>
            </p>
        </div>
    </div>

    <p class="mt-6 text-center text-xs text-gray-400">&copy; {{ date('Y') }} Nyumba360. All rights reserved.</p>
</div>

<script>
    let currentStep = 1;
    const totalSteps = 4;
    const stepTitles = ['Account Details', 'Your Role', 'Location', 'Preferences'];

    function updateProgress() {
        const pct = (currentStep / totalSteps) * 100;
        document.getElementById('progressBar').style.width = pct + '%';
        document.getElementById('stepLabel').textContent = `Step ${currentStep} of ${totalSteps}`;
        document.getElementById('stepTitle').textContent = stepTitles[currentStep - 1];
    }

    function showStep(step) {
        document.querySelectorAll('.step-section').forEach(s => s.classList.add('hidden'));
        document.getElementById('step' + step).classList.remove('hidden');
        currentStep = step;
        updateProgress();
    }

    function validateStep(step) {
        const section = document.getElementById('step' + step);
        const inputs = section.querySelectorAll('input[required], select[required], textarea[required]');
        let valid = true;
        inputs.forEach(input => {
            if (!input.value.trim()) {
                input.classList.add('border-red-300', 'ring-2', 'ring-red-100');
                valid = false;
            } else {
                input.classList.remove('border-red-300', 'ring-2', 'ring-red-100');
            }
        });
        if (step === 1) {
            const pwd = document.getElementById('password');
            const pwdConfirm = document.getElementById('password-confirm');
            if (pwd.value && pwdConfirm.value && pwd.value !== pwdConfirm.value) {
                pwdConfirm.classList.add('border-red-300', 'ring-2', 'ring-red-100');
                valid = false;
            }
        }
        if (step === 2) {
            const roleSelected = section.querySelector('input[name="role"]:checked');
            if (!roleSelected) {
                valid = false;
                if (typeof window.showToast === 'function') {
                    window.showToast('warning', 'Selection Required', 'Please select your role to continue');
                }
            }
        }
        return valid;
    }

    function nextStep(step) {
        if (!validateStep(step)) return;
        if (step < totalSteps) showStep(step + 1);
    }

    function prevStep(step) {
        if (step > 1) showStep(step - 1);
    }

    document.addEventListener('DOMContentLoaded', function() {
        @if($errors->any())
            @if($errors->has('role')) showStep(2);
            @elseif($errors->has('region') || $errors->has('district')) showStep(3);
            @elseif($errors->has('property_type_preference') || $errors->has('budget_range')) showStep(4);
            @else showStep(1);
            @endif
        @else
            showStep(1);
        @endif
    });
</script>
@endsection
