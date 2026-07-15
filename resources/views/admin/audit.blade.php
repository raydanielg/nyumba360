@extends('layouts.dashboard')

@section('title', 'Audit Log - Nyumba360')
@section('page_title', 'Audit Trail')

@section('content')
<div class="bg-white rounded-2xl p-5 border border-[#E6E0DA]">
    <div class="overflow-x-auto">
        <table class="w-full text-xs">
            <thead>
                <tr class="border-b border-[#E6E0DA]">
                    <th class="text-left py-2 px-3 font-bold text-gray-400">User</th>
                    <th class="text-left py-2 px-3 font-bold text-gray-400">Action</th>
                    <th class="text-left py-2 px-3 font-bold text-gray-400">Module</th>
                    <th class="text-left py-2 px-3 font-bold text-gray-400">Description</th>
                    <th class="text-left py-2 px-3 font-bold text-gray-400">Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($logs as $log)
                    <tr class="border-b border-[#E6E0DA] hover:bg-gray-50">
                        <td class="py-2 px-3 text-gray-600">{{ $log->user?->name ?? 'System' }}</td>
                        <td class="py-2 px-3"><span class="font-mono font-bold text-brand-600">{{ $log->action }}</span></td>
                        <td class="py-2 px-3 text-gray-600">{{ $log->module }}</td>
                        <td class="py-2 px-3 text-gray-500">{{ $log->description }}</td>
                        <td class="py-2 px-3 text-gray-400">{{ $log->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-6 text-gray-400">No audit logs</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">{{ $logs->links() }}</div>
</div>
@endsection
