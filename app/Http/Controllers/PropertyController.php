<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\PropertyVideo;
use App\Models\PlatformSetting;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::with('images', 'user')
            ->where('approval_status', 'approved')
            ->where('status', 'available');

        if ($request->filled('region')) {
            $query->where('region', $request->region);
        }
        if ($request->filled('district')) {
            $query->where('district', $request->district);
        }
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        if ($request->filled('min_bedrooms')) {
            $query->where('bedrooms', '>=', $request->min_bedrooms);
        }
        if ($request->filled('min_price')) {
            $query->where('rent_amount', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('rent_amount', '<=', $request->max_price);
        }
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%')
                  ->orWhere('ward', 'like', '%' . $request->search . '%');
            });
        }

        $properties = $query->latest()->paginate(12);
        return view('properties.index', compact('properties'));
    }

    public function show(Property $property)
    {
        if ($property->approval_status !== 'approved' && (!auth()->check() || auth()->id() !== $property->user_id && !auth()->user()->isAdmin())) {
            abort(404);
        }

        $property->load('images', 'videos', 'user');
        $property->incrementViews();

        $isUnlocked = auth()->check() && auth()->user()->hasUnlocked($property);
        $isFavorited = auth()->check() && auth()->user()->hasFavorited($property);
        $unlockFee = PlatformSetting::get('unlock_fee', 1000);

        return view('properties.show', compact('property', 'isUnlocked', 'isFavorited', 'unlockFee'));
    }

    public function create()
    {
        return view('properties.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:single_room,self_contained,apartment,full_house,maisonette,commercial,office,shop,warehouse,land',
            'region' => 'required|string',
            'district' => 'required|string',
            'ward' => 'required|string',
            'street' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'rent_amount' => 'required|numeric|min:0',
            'deposit_amount' => 'nullable|numeric|min:0',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'area_sqm' => 'nullable|numeric|min:0',
            'amenities' => 'nullable|array',
            'images.*' => 'image|max:5120',
            'video' => 'nullable|mimes:mp4,mov,avi|max:51200',
        ]);

        $property = Property::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . Str::random(6),
            'description' => $validated['description'],
            'type' => $validated['type'],
            'region' => $validated['region'],
            'district' => $validated['district'],
            'ward' => $validated['ward'],
            'street' => $validated['street'] ?? null,
            'latitude' => $validated['latitude'] ?? null,
            'longitude' => $validated['longitude'] ?? null,
            'rent_amount' => $validated['rent_amount'],
            'deposit_amount' => $validated['deposit_amount'] ?? null,
            'bedrooms' => $validated['bedrooms'],
            'bathrooms' => $validated['bathrooms'],
            'area_sqm' => $validated['area_sqm'] ?? null,
            'amenities' => $validated['amenities'] ?? [],
            'approval_status' => 'pending',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('properties', 'public');
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image_path' => $path,
                    'is_primary' => $index === 0,
                    'sort_order' => $index,
                ]);
            }
        }

        if ($request->hasFile('video')) {
            $path = $request->file('video')->store('property-videos', 'public');
            PropertyVideo::create([
                'property_id' => $property->id,
                'video_path' => $path,
            ]);
        }

        AuditLog::log('property_created', 'property', "Created property: {$property->title}");

        return redirect()->route('dashboard')->with('success', 'Property listed! Waiting for admin approval.');
    }

    public function edit(Property $property)
    {
        if (auth()->id() !== $property->user_id && !auth()->user()->isAdmin()) {
            abort(403);
        }
        $property->load('images', 'videos');
        return view('properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        if (auth()->id() !== $property->user_id && !auth()->user()->isAdmin()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string',
            'region' => 'required|string',
            'district' => 'required|string',
            'ward' => 'required|string',
            'street' => 'nullable|string',
            'rent_amount' => 'required|numeric|min:0',
            'deposit_amount' => 'nullable|numeric|min:0',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'area_sqm' => 'nullable|numeric|min:0',
            'status' => 'required|in:available,taken,maintenance',
            'amenities' => 'nullable|array',
        ]);

        $property->update($validated);
        AuditLog::log('property_updated', 'property', "Updated property: {$property->title}");

        return redirect()->route('dashboard')->with('success', 'Property updated successfully.');
    }

    public function destroy(Property $property)
    {
        if (auth()->id() !== $property->user_id && !auth()->user()->isAdmin()) {
            abort(403);
        }
        $property->delete();
        AuditLog::log('property_deleted', 'property', "Deleted property: {$property->title}");
        return redirect()->route('dashboard')->with('success', 'Property deleted.');
    }

    public function toggleFavorite(Property $property)
    {
        $user = auth()->user();
        if ($user->hasFavorited($property)) {
            $user->favorites()->where('property_id', $property->id)->delete();
            return back()->with('success', 'Removed from favorites.');
        }
        $user->favorites()->create(['property_id' => $property->id]);
        return back()->with('success', 'Added to favorites!');
    }
}
