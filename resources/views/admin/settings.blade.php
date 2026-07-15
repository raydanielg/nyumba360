@extends('layouts.dashboard')

@section('title', 'Platform Settings - Nyumba360')
@section('page_title', 'Pricing Control Panel')

@section('content')
<form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-5">
    @csrf
    @foreach($settings as $groupName => $groupSettings)
        <div class="bg-white rounded-2xl p-6 border border-[#E6E0DA]">
            <h3 class="text-sm font-extrabold text-gray-900 mb-4 flex items-center gap-2">
                <div class="w-1 h-5 bg-brand-600 rounded-full"></div>
                {{ ucfirst($groupName) }} Settings
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($groupSettings as $setting)
                    <div>
                        <label class="block text-[10px] font-bold text-gray-500 mb-1 uppercase">{{ str_replace('_', ' ', $setting->key) }}</label>
                        <input type="text" name="settings[{{ $setting->key }}]" value="{{ $setting->value }}" class="w-full px-3 py-2 text-sm border border-[#E6E0DA] rounded-lg focus:ring-2 focus:ring-brand-500">
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
    <div class="flex justify-end">
        <button type="submit" class="px-6 py-2.5 text-sm font-bold text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-all shadow-sm">Save All Settings</button>
    </div>
</form>
@endsection
