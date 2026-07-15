@extends('layouts.dashboard')

@section('title', 'Edit Property - Nyumba360')
@section('page_title', 'Edit Property')

@section('content')
<div class="max-w-3xl mx-auto">
    <form method="POST" action="{{ route('properties.update', $property) }}" enctype="multipart/form-data" class="space-y-5">
        @csrf @method('PUT')
        <div class="bg-white rounded-2xl p-6 border border-[#E6E0DA]">
            <h3 class="text-sm font-extrabold text-gray-900 mb-4 flex items-center gap-2">
                <div class="w-1 h-5 bg-brand-600 rounded-full"></div>
                Basic Information
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-gray-700 mb-1">Title *</label>
                    <input type="text" name="title" value="{{ $property->title }}" required class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Type *</label>
                    <select name="type" required class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500">
                        @foreach(['single_room'=>'Single Room','self_contained'=>'Self Contained','apartment'=>'Apartment','full_house'=>'Full House','maisonette'=>'Maisonette','commercial'=>'Commercial','office'=>'Office','shop'=>'Shop','warehouse'=>'Warehouse','land'=>'Land'] as $val=>$label)
                            <option value="{{ $val }}" {{ $property->type === $val ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Status *</label>
                    <select name="status" required class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500">
                        <option value="available" {{ $property->status === 'available' ? 'selected' : '' }}>Available</option>
                        <option value="taken" {{ $property->status === 'taken' ? 'selected' : '' }}>Taken</option>
                        <option value="maintenance" {{ $property->status === 'maintenance' ? 'selected' : '' }}>Under Maintenance</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Rent (TZS) *</label>
                    <input type="number" name="rent_amount" value="{{ $property->rent_amount }}" required min="0" class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Deposit (TZS)</label>
                    <input type="number" name="deposit_amount" value="{{ $property->deposit_amount }}" min="0" class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Bedrooms *</label>
                    <input type="number" name="bedrooms" value="{{ $property->bedrooms }}" required min="0" class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Bathrooms *</label>
                    <input type="number" name="bathrooms" value="{{ $property->bathrooms }}" required min="0" class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Area (sqm)</label>
                    <input type="number" name="area_sqm" value="{{ $property->area_sqm }}" min="0" step="0.01" class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500">
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-[#E6E0DA]">
            <h3 class="text-sm font-extrabold text-gray-900 mb-4 flex items-center gap-2">
                <div class="w-1 h-5 bg-gold-400 rounded-full"></div>
                Location
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Region *</label>
                    <input type="text" name="region" value="{{ $property->region }}" required class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">District *</label>
                    <input type="text" name="district" value="{{ $property->district }}" required class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Ward *</label>
                    <input type="text" name="ward" value="{{ $property->ward }}" required class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Street</label>
                    <input type="text" name="street" value="{{ $property->street }}" class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500">
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-[#E6E0DA]">
            <h3 class="text-sm font-extrabold text-gray-900 mb-4 flex items-center gap-2">
                <div class="w-1 h-5 bg-blue-400 rounded-full"></div>
                Description & Amenities
            </h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Description *</label>
                    <textarea name="description" required rows="4" class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500">{{ $property->description }}</textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2">Amenities</label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                        @foreach(['Fenced Compound','Parking','Water Supply','Electricity','Garden','Security Guard','Air Conditioning','Borehole','Servants Quarter','WiFi','Furnished','Pet Friendly'] as $amenity)
                            <label class="flex items-center gap-2 text-xs text-gray-700 cursor-pointer">
                                <input type="checkbox" name="amenities[]" value="{{ $amenity }}" {{ is_array($property->amenities) && in_array($amenity, $property->amenities) ? 'checked' : '' }} class="rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                                {{ $amenity }}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @if($property->images->isNotEmpty())
        <div class="bg-white rounded-2xl p-6 border border-[#E6E0DA]">
            <h3 class="text-sm font-extrabold text-gray-900 mb-4">Current Photos</h3>
            <div class="grid grid-cols-3 sm:grid-cols-5 gap-2">
                @foreach($property->images as $img)
                    <div class="relative aspect-square rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $img->image_path) }}" class="w-full h-full object-cover">
                        @if($img->is_primary)
                            <span class="absolute bottom-1 left-1 px-1.5 py-0.5 bg-brand-600 text-white text-[8px] font-bold rounded">PRIMARY</span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        <div class="flex justify-end gap-3">
            <a href="{{ route('dashboard') }}" class="px-5 py-2.5 text-sm font-bold text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-lg transition-all">Cancel</a>
            <button type="submit" class="px-5 py-2.5 text-sm font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all shadow-sm">Update Property</button>
        </div>
    </form>
</div>
@endsection
