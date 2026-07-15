@extends('layouts.dashboard')

@section('title', 'Pending Properties - Nyumba360')
@section('page_title', 'Pending Property Approvals')

@section('content')
<div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
    @if($properties->isEmpty())
        <div class="text-center py-12">
            <p class="text-sm text-gray-400">No pending property approvals.</p>
        </div>
    @else
        <div class="space-y-4">
            @foreach($properties as $property)
                <div class="border border-[#E6E0DA] rounded-xl p-4 flex gap-4">
                    <div class="w-24 h-24 bg-gray-100 rounded-lg overflow-hidden flex-shrink-0">
                        @if($property->images->first())
                            <img src="{{ asset('storage/' . $property->images->first()->image_path) }}" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <div class="flex-1">
                        <div class="flex items-start justify-between">
                            <div>
                                <p class="text-sm font-bold text-gray-900">{{ $property->title }}</p>
                                <p class="text-xs text-gray-400">{{ $property->user->name }} ({{ $property->user->role }}) - {{ $property->region }}, {{ $property->district }}</p>
                                <p class="text-xs text-gray-500 mt-1">TZS {{ number_format($property->rent_amount) }}/mo - {{ $property->bedrooms }} beds, {{ $property->bathrooms }} baths</p>
                                <p class="text-[10px] text-gray-400 mt-1">{{ $property->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="flex gap-2">
                                <form method="POST" action="{{ route('admin.properties.approve', $property) }}">
                                    @csrf
                                    <button type="submit" class="px-3 py-1.5 text-xs font-bold text-white bg-green-600 hover:bg-green-700 rounded-lg transition-all">Approve</button>
                                </form>
                                <form method="POST" action="{{ route('admin.properties.reject', $property) }}">
                                    @csrf
                                    <button type="submit" class="px-3 py-1.5 text-xs font-bold text-white bg-red-500 hover:bg-red-600 rounded-lg transition-all" onclick="return confirm('Reject this property?')">Reject</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">{{ $properties->links() }}</div>
    @endif
</div>
@endsection
