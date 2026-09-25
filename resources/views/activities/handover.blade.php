<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daily Handover Log - ' . date('d M Y')) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="mb-6 flex justify-between items-center">
                    <p class="text-gray-600">This log shows all activity updates made today to facilitate shift hand-overs.</p>
                    <a href="{{ route('activities.index') }}" class="text-blue-500 hover:underline">Back to Dashboard</a>
                </div>

                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-100">
                        <tr class="text-sm font-medium text-gray-700">
                            <th class="p-3 border">Time</th>
                            <th class="p-3 border">Activity</th>
                            <th class="p-3 border">Personnel</th>
                            <th class="p-3 border">Status Change</th>
                            <th class="p-3 border">Remark</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @forelse($todaysUpdates as $update)
                            <tr class="hover:bg-gray-50">
                                <td class="p-3 border font-mono">{{ $update->created_at->format('h:i A') }}</td>
                                <td class="p-3 border font-semibold">{{ $update->activity->description }}</td>
                                <td class="p-3 border">{{ $update->user->first_name }} {{ $update->user->last_name }}</td>
                                <td class="p-3 border">
                                    <span class="px-2 py-1 rounded text-xs font-bold {{ $update->status == 'done' ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }}">
                                        {{ ucfirst($update->status) }}
                                    </span>
                                </td>
                                <td class="p-3 border italic">{{ $update->remark ?? 'No remark' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-6 text-center text-gray-500">
                                    No activity updates recorded for today yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>