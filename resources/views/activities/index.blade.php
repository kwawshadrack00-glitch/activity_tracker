<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daily Activity Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6 border-l-4 border-indigo-500">
                <h3 class="text-lg font-medium mb-4">Add New Activity</h3>
                <form action="{{ route('activities.store') }}" method="POST" class="flex gap-4">
                    @csrf
                    <input type="text" name="description" placeholder="e.g. Monthly Server Audit" class="flex-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition font-semibold">
                        + Add Activity
                    </button>
                </form>
            </div>
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
                                    <div class="flex items-center gap-2">
                                        <span class="h-2 w-2 rounded-full {{ $lastUpdate && $lastUpdate->status == 'done' ? 'bg-green-500' : 'bg-yellow-500' }}"></span>
                                        <span class="text-sm font-medium {{ $lastUpdate && $lastUpdate->status == 'done' ? 'text-green-700' : 'text-yellow-700' }}">
                                            {{ $lastUpdate ? ucfirst($lastUpdate->status) : 'Pending' }}
                                        </span>
                                    </div>
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