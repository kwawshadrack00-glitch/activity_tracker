<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Activity History Report') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <!-- Date Filter Form -->
                <form method="GET" action="{{ route('activities.reports') }}" class="mb-8 flex items-end gap-4 p-4 bg-gray-50 rounded-lg border">
                    <div>
                        <x-input-label for="start_date" value="Start Date" />
                        <input type="date" name="start_date" id="start_date" value="{{ $startDate }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                    </div>
                    <div>
                        <x-input-label for="end_date" value="End Date" />
                        <input type="date" name="end_date" id="end_date" value="{{ $endDate }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                    </div>
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                        Filter Report
                    </button>
                    @if($startDate)
                        <a href="{{ route('activities.reports') }}" class="text-sm text-gray-600 underline">Clear</a>
                    @endif
                </form>

                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-100">
                        <tr class="text-sm font-medium text-gray-700">
                            <th class="p-3 border">Date & Time</th>
                            <th class="p-3 border">Activity</th>
                            <th class="p-3 border">Personnel</th>
                            <th class="p-3 border">Status</th>
                            <th class="p-3 border">Remark</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @forelse($reportData as $update)
                            <tr class="hover:bg-gray-50">
                                <td class="p-3 border">{{ $update->created_at->format('d M Y, h:i A') }}</td>
                                <td class="p-3 border">{{ $update->activity->description }}</td>
                                <td class="p-3 border">{{ $update->user->first_name }} {{ $update->user->last_name }}</td>
                                <td class="p-3 border">
                                    <span class="px-2 py-1 rounded text-xs font-bold {{ $update->status == 'done' ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }}">
                                        {{ ucfirst($update->status) }}
                                    </span>
                                </td>
                                <td class="p-3 border">{{ $update->remark ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-6 text-center text-gray-500">
                                    {{ $startDate ? 'No records found for this duration.' : 'Please select a date range to generate the report.' }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>