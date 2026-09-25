<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daily Activity Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-3 border">Activity</th>
                            <th class="p-3 border">Current Status</th>
                            <th class="p-3 border">Last Remark</th>
                            <th class="p-3 border">Updated By</th>
                            <th class="p-3 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($activities as $activity)
                            @php $lastUpdate = $activity->updates->first(); @endphp
                            <tr>
                                <td class="p-3 border">{{ $activity->description }}</td>
                                <td class="p-3 border">
                                    <span class="px-2 py-1 rounded text-xs font-bold {{ $lastUpdate && $lastUpdate->status == 'done' ? 'bg-green-200 text-green-800' : 'bg-yellow-200 text-yellow-800' }}">
                                        {{ $lastUpdate ? ucfirst($lastUpdate->status) : 'Pending' }}
                                    </span>
                                </td>
                                <td class="p-3 border">{{ $lastUpdate->remark ?? 'No remark' }}</td>
                                <td class="p-3 border">
                                    @if($lastUpdate)
                                        {{ $lastUpdate->user->first_name }} {{ $lastUpdate->user->last_name }}
                                        <br>
                                        <a href="{{ route('activities.history', $activity->id) }}" class="text-xs text-blue-500 hover:underline">View Full History</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="p-3 border">
                                    <form action="{{ route('activities.update', $activity->id) }}" method="POST" class="flex gap-2">
                                        @csrf
                                        <select name="status" class="border rounded p-1 text-sm w-32">
                                            <option value="pending">Pending</option>
                                            <option value="done">Done</option>
                                        </select>
                                        <input type="text" name="remark" placeholder="Add remark..." class="border rounded p-1 text-sm">
                                        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded text-sm hover:bg-blue-600">Update</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>