<x-app-layout>
    <div class="p-6" >
        @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6" style="width:100%">
            <h2 class="text-2xl font-semibold mb-4">Destinations</h2>

            <a href="{{ route('destinations.create') }}"
               class="px-4 py-2 bg-blue-500 text-white rounded-md mb-4 inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Create New Destination
            </a>

            <div class="overflow-x-auto mt-4 hidden md:block"> <!-- Table for larger screens -->
                <table id="destinations-table" class="min-w-full bg-white border rounded-lg">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($destinations as $destination)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    @if ($destination->image)
                                        <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}" class="w-16 h-16 object-cover rounded">
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">{{ $destination->name }}</td>
                                <td class="px-6 py-4">{{ \Illuminate\Support\Str::limit($destination->description, 50) }}</td>
                                <td class="px-6 py-4">{{ $destination->user->name ?? 'Unknown' }}</td> <!-- Assuming the author is the user -->
                                <td class="px-6 py-4">
                                    <a href="{{ route('destinations.show', $destination->id) }}"
                                       class="px-4 py-2 bg-green-500 text-white rounded-md inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 12h4m-2-2v4m0 4a10 10 0 100-20 10 10 0 000 20z" />
                                        </svg>
                                        View
                                    </a>
                                    <a href="{{ route('destinations.edit', $destination->id) }}"
                                       class="px-4 py-2 bg-yellow-500 text-white rounded-md inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232a2.828 2.828 0 114 4L7.5 21H3v-4.5L15.232 5.232z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('destinations.destroy', $destination->id) }}" method="POST" class="inline-block">
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
                @foreach ($destinations as $destination)
                    <div class="bg-white border rounded-lg shadow p-4">
                        <div class="flex items-center">
                            @if ($destination->image)
                                <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}" class="w-16 h-16 object-cover rounded">
                            @else
                                <span>No Image</span>
                            @endif
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold">{{ $destination->name }}</h3>
                                <p class="text-gray-500">{{ \Illuminate\Support\Str::limit($destination->description, 50) }}</p>
                                <p class="text-gray-400">Author: {{ $destination->user->name ?? 'Unknown' }}</p>
                                <div class="mt-2">
                                    <a href="{{ route('destinations.show', $destination->id) }}"
                                       class="px-2 py-1 bg-green-500 text-white rounded-md inline-flex items-center text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 12h4m-2-2v4m0 4a10 10 0 100-20 10 10 0 000 20z" />
                                        </svg>
                                        View
                                    </a>
                                    <a href="{{ route('destinations.edit', $destination->id) }}"
                                       class="px-2 py-1 bg-yellow-500 text-white rounded-md inline-flex items-center text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232a2.828 2.828 0 114 4L7.5 21H3v-4.5L15.232 5.232z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('destinations.destroy', $destination->id) }}" method="POST" class="inline-block">
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
        // Initialize DataTables
        $(document).ready(function() {
            $('#destinations-table').DataTable();
        });

        // Hide the success message after 4 seconds
        setTimeout(() => {
            const message = document.getElementById('success-message');
            if (message) {
                message.style.transition = 'opacity 0.5s';
                message.style.opacity = '0';

                setTimeout(() => message.remove(), 500); // Remove after fade-out
            }
        }, 4000);
    </script>

    <style>
        /* Add border to the table cells */
        #destinations-table td {
            border: 1px solid #e5e7eb; /* Light gray border */
        }

        /* Styling the search input */
        .dataTables_filter {
            margin-bottom: 20px; /* Spacing below the search input */
        }

        .dataTables_filter input {
            height: 40px; /* Height of the search input */
            padding: 10px; /* Padding inside the search input */
            border-radius: 4px; /* Rounded corners */
            border: 1px solid #ddd; /* Border color */
        }

        .dataTables_length {
            margin-bottom: 20px; /* Space below the length select */
        }
    </style>
</x-app-layout>
