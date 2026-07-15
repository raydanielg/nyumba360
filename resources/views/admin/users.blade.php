@extends('layouts.dashboard')

@section('title', 'Users - Nyumba360')
@section('page_title', 'Platform Users')

@section('content')
<div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
    <div class="overflow-x-auto">
        <table class="w-full text-xs">
            <thead>
                <tr class="border-b border-[#E6E0DA]">
                    <th class="text-left py-2 px-3 font-bold text-gray-400">Name</th>
                    <th class="text-left py-2 px-3 font-bold text-gray-400">Email</th>
                    <th class="text-left py-2 px-3 font-bold text-gray-400">Role</th>
                    <th class="text-left py-2 px-3 font-bold text-gray-400">Properties</th>
                    <th class="text-left py-2 px-3 font-bold text-gray-400">Unlocks</th>
                    <th class="text-left py-2 px-3 font-bold text-gray-400">Payments</th>
                    <th class="text-left py-2 px-3 font-bold text-gray-400">Joined</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr class="border-b border-[#E6E0DA] hover:bg-gray-50">
                        <td class="py-2 px-3 font-bold text-gray-900">{{ $user->name }}</td>
                        <td class="py-2 px-3 text-gray-600">{{ $user->email }}</td>
                        <td class="py-2 px-3"><span class="capitalize px-2 py-0.5 rounded-full text-[10px] font-bold {{ $user->role === 'admin' ? 'bg-brand-50 text-brand-600' : ($user->role === 'landlord' ? 'bg-green-50 text-green-600' : ($user->role === 'broker' ? 'bg-blue-50 text-blue-600' : 'bg-gray-100 text-gray-600')) }}">{{ $user->role }}</span></td>
                        <td class="py-2 px-3 text-gray-600">{{ $user->properties_count }}</td>
                        <td class="py-2 px-3 text-gray-600">{{ $user->unlocks_count }}</td>
                        <td class="py-2 px-3 text-gray-600">{{ $user->payments_count }}</td>
                        <td class="py-2 px-3 text-gray-400">{{ $user->created_at->format('M d, Y') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="7" class="text-center py-6 text-gray-400">No users found</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $users->links() }}</div>
</div>
@endsection
