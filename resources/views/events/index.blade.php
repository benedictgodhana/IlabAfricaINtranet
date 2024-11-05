<x-app-layout>
    <div class="p-6">
        @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6" style="width:100%">
            <h2 class="text-2xl font-semibold mb-4">Events</h2>

            <a href="{{ route('events.create') }}"
               class="px-4 py-2 bg-blue-500 text-white rounded-md mb-4 inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Create New Event
            </a>

            <div class="overflow-x-auto mt-4 hidden md:block"> <!-- Table for larger screens -->
                <table id="events-table" class="min-w-full bg-white border rounded-lg">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Time</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End Time</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Organizers</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Venue</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($events as $event)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $event->title }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($event->date)->format('Y-m-d') }}</td>
                                <td class="px-6 py-4">{{ $event->start_time }}</td>
                                <td class="px-6 py-4">{{ $event->end_time }}</td>
                                <td class="px-6 py-4">{{ $event->organizers }}</td>
                                <td class="px-6 py-4">{{ $event->venue }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('events.show', $event->id) }}"
                                       class="px-4 py-2 bg-green-500 text-white rounded-md inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 12h4m-2-2v4m0 4a10 10 0 100-20 10 10 0 000 20z" />
                                        </svg>
                                        View
                                    </a>
                                    <a href="{{ route('events.edit', $event->id) }}"
                                       class="px-4 py-2 bg-yellow-500 text-white rounded-md inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232a2.828 2.828 0 114 4L7.5 21H3v-4.5L15.232 5.232z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md inline-flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Cards for mobile screens -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:hidden gap-4 mt-4">
                @foreach ($events as $event)
                    <div class="bg-white border rounded-lg shadow p-4">
                        <h3 class="text-lg font-semibold">{{ $event->title }}</h3>
                        <p class="text-gray-500">Date: {{ \Carbon\Carbon::parse($event->date)->format('Y-m-d') }}</p>
                        <p class="text-gray-500">Start Time: {{ $event->start_time }}</p>
                        <p class="text-gray-500">End Time: {{ $event->end_time }}</p>
                        <p class="text-gray-500">Organizers: {{ $event->organizers }}</p>
                        <p class="text-gray-500">Venue: {{ $event->venue }}</p>
                        <div class="mt-2">
                            <a href="{{ route('events.show', $event->id) }}"
                               class="px-2 py-1 bg-green-500 text-white rounded-md inline-flex items-center text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 12h4m-2-2v4m0 4a10 10 0 100-20 10 10 0 000 20z" />
                                </svg>
                                View
                            </a>
                            <a href="{{ route('events.edit', $event->id) }}"
                               class="px-2 py-1 bg-yellow-500 text-white rounded-md inline-flex items-center text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232a2.828 2.828 0 114 4L7.5 21H3v-4.5L15.232 5.232z" />
                                </svg>
                                Edit
                            </a>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded-md inline-flex items-center text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <script>
        $(document).ready(function() {
            $('#events-table').DataTable();
            $('#success-message').delay(5000).fadeOut();
        });
    </script>
</x-app-layout>
