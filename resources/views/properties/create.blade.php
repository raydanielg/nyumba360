@extends('layouts.dashboard')

@section('title', 'List Property - Nyumba360')
@section('page_title', 'List New Property')

@section('content')
<div class="max-w-3xl mx-auto">
    <form method="POST" action="{{ route('properties.store') }}" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <div class="bg-white rounded-2xl p-6 border border-[#E6E0DA]">
            <h3 class="text-sm font-extrabold text-gray-900 mb-4 flex items-center gap-2">
                <div class="w-1 h-5 bg-brand-600 rounded-full"></div>
                Basic Information
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-gray-700 mb-1">Title *</label>
                    <input type="text" name="title" required class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500 focus:border-brand-500" placeholder="e.g. 3 Bedroom House in Mikocheni">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Property Type *</label>
                    <select name="type" required class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500">
                        <option value="">Select type</option>
                        <option value="single_room">Single Room</option>
                        <option value="self_contained">Self Contained</option>
                        <option value="apartment">Apartment</option>
                        <option value="full_house">Full House</option>
                        <option value="maisonette">Maisonette</option>
                        <option value="commercial">Commercial</option>
                        <option value="office">Office</option>
                        <option value="shop">Shop</option>
                        <option value="warehouse">Warehouse</option>
                        <option value="land">Land</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Rent Amount (TZS) *</label>
                    <input type="number" name="rent_amount" required min="0" class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500" placeholder="e.g. 450000">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Deposit Amount (TZS)</label>
                    <input type="number" name="deposit_amount" min="0" class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500" placeholder="e.g. 900000">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Area (sqm)</label>
                    <input type="number" name="area_sqm" min="0" step="0.01" class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500" placeholder="e.g. 250">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Bedrooms *</label>
                    <input type="number" name="bedrooms" required min="0" class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500" value="0">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Bathrooms *</label>
                    <input type="number" name="bathrooms" required min="0" class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500" value="0">
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
                    <select name="region" required class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500">
                        <option value="">Select region</option>
                        <option>Dar es Salaam</option><option>Arusha</option><option>Mwanza</option><option>Dodoma</option>
                        <option>Tanga</option><option>Morogoro</option><option>Mbeya</option><option>Kilimanjaro</option>
                        <option>Zanzibar</option><option>Mara</option><option>Pwani</option><option>Kigoma</option>
                        <option>Iringa</option><option>Ruvuma</option><option>Manyara</option><option>Shinyanga</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">District *</label>
                    <input type="text" name="district" required class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500" placeholder="e.g. Kinondoni">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Ward *</label>
                    <input type="text" name="ward" required class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500" placeholder="e.g. Mikocheni">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Street (hidden until unlock)</label>
                    <input type="text" name="street" class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500" placeholder="e.g. Ali Hassan Mwinyi Rd">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Latitude</label>
                    <input type="number" name="latitude" step="0.0000001" class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500" placeholder="-6.7660000">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Longitude</label>
                    <input type="number" name="longitude" step="0.0000001" class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500" placeholder="39.2740000">
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
                    <textarea name="description" required rows="4" class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500" placeholder="Describe the property..."></textarea>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-2">Amenities</label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                        @foreach(['Fenced Compound','Parking','Water Supply','Electricity','Garden','Security Guard','Air Conditioning','Borehole','Servants Quarter','WiFi','Furnished','Pet Friendly'] as $amenity)
                            <label class="flex items-center gap-2 text-xs text-gray-700 cursor-pointer">
                                <input type="checkbox" name="amenities[]" value="{{ $amenity }}" class="rounded border-gray-300 text-brand-600 focus:ring-brand-500">
                                {{ $amenity }}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl p-6 border border-[#E6E0DA]">
            <h3 class="text-sm font-extrabold text-gray-900 mb-4 flex items-center gap-2">
                <div class="w-1 h-5 bg-green-400 rounded-full"></div>
                Photos & Video
            </h3>
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Property Photos (max 5MB each)</label>
                    <input type="file" name="images[]" multiple accept="image/*" class="w-full text-sm border border-[#E6E0DA] rounded-lg p-2">
                    <p class="text-[10px] text-gray-400 mt-1">First image will be used as the primary photo.</p>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Property Video (max 50MB, optional)</label>
                    <input type="file" name="video" accept="video/*" class="w-full text-sm border border-[#E6E0DA] rounded-lg p-2">
                </div>
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('dashboard') }}" class="px-5 py-2.5 text-sm font-bold text-gray-600 bg-gray-100 hover:bg-gray-200 rounded-lg transition-all">Cancel</a>
            <button type="submit" class="px-5 py-2.5 text-sm font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all shadow-sm">Submit for Approval</button>
        </div>
    </form>
</div>
@endsection
