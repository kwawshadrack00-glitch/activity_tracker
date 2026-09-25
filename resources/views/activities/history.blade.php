<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update History: ') }} {{ $activity->description }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-4">
                    <a href="{{ route('activities.index') }}" class="text-blue-500 hover:underline">&larr; Back to Dashboard</a>
                </div>

                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 border">Personnel (Bio)</th>
                            <th class="p-3 border">Status</th>
                            <th class="p-3 border">Remark</th>
                            <th class="p-3 border">Time of Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($updates as $update)
                            <tr>
                                <td class="p-3 border">
                                    <strong>{{ $update->user->first_name }} {{ $update->user->last_name }}</strong><br>
                                    <span class="text-xs text-gray-500">Username: {{ $update->user->username }}</span>
                                </td>
                                <td class="p-3 border">
                                    <span class="px-2 py-1 rounded text-xs font-bold {{ $update->status == 'done' ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }}">
                                        {{ ucfirst($update->status) }}
                                    </span>
                                </td>
                                <td class="p-3 border">{{ $update->remark ?? 'No remark' }}</td>
                                <td class="p-3 border text-sm">{{ $update->created_at->format('d M Y, h:i A') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>