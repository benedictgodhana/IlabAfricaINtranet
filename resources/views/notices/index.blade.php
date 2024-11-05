<x-app-layout>
    <div class="p-6">
        @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Notices</h2>

            <!-- Button to create a new notice -->
            <a href="{{ route('notices.create') }}"
               class="px-4 py-2 bg-blue-500 text-white rounded-md mb-4 inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Create New Notice
            </a>

            <div class="overflow-x-auto mt-4">
                <table id="notices-table" class="min-w-full bg-white border rounded-lg">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Content</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($notices as $notice)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $notice->title }}</td>
                                <td class="px-6 py-4">{{ $notice->user->name }}</td>
                                <td class="px-6 py-4">
    @if ($notice->image)
        <img src="{{ asset($notice->image) }}" alt="Notice Image" class="w-16 h-16 object-cover">
    @else
        No Image
    @endif
</td>

                                <td class="px-6 py-4">{{ \Illuminate\Support\Str::limit(strip_tags($notice->content), 50) }}</td> <!-- Display a limited view of content without HTML tags -->
                                <td class="px-6 py-4">
                                    <a href="{{ route('notices.edit', $notice->id) }}"
                                       class="px-4 py-2 bg-yellow-500 text-white rounded-md inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232a2.828 2.828 0 114 4L7.5 21H3v-4.5L15.232 5.232z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('notices.destroy', $notice->id) }}" method="POST" class="inline-block">
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
        </div>
    </div>

    <!-- Modal for creating new notice (existing modal code) -->
    <div id="modal" class="fixed inset-0 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <h2 class="text-xl font-semibold mb-4">Create New Notice</h2>
            <form action="{{ route('notices.store') }}" method="POST" enctype="multipart/form-data"> <!-- Added enctype for file upload -->
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
                    <input type="text" name="author" id="author" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                    <textarea name="content" id="content" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="flex justify-end">
                    <button type="button" id="close-modal" class="px-4 py-2 bg-gray-500 text-white rounded-md mr-2">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Create</button>
                </div>
            </form>
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
            $('#notices-table').DataTable();
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

        // Modal functionality
        $('#open-modal').on('click', function() {
            $('#modal').removeClass('hidden');
        });

        $('#close-modal').on('click', function() {
            $('#modal').addClass('hidden');
        });
    </script>

    <style>
        /* Add border to the table cells */
        #notices-table td {
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
