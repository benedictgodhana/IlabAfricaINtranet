<x-app-layout>
    <div class="p-6">
        @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Birthday Notices</h2>

            <a href="{{ route('birthdays.create') }}"
               class="px-4 py-2 bg-blue-500 text-white  mb-4 inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Create New Notice
            </a>

            <div class="overflow-x-auto mt-4">
                <table id="birthdays-table" class="min-w-full bg-white border rounded-lg">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Birth Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created By</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($birthdays as $birthday)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $birthday->name }}</td>
                                <td class="px-6 py-4">{{ $birthday->email }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($birthday->birth_date)->format('M d, Y') }}</td>
                                <td class="px-6 py-4">{{ $birthday->user->name }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('birthdays.edit', $birthday->id) }}"
                                       class="px-4 py-2 bg-yellow-500 text-white rounded-md inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232a2.828 2.828 0 114 4L7.5 21H3v-4.5L15.232 5.232z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="{{ route('birthdays.destroy', $birthday->id) }}" method="POST" class="inline-block">
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

    <!-- Modal for creating new birthday notice -->
    <div id="modal" class="fixed inset-0 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
            <h2 class="text-xl font-semibold mb-4">Create New Birthday Notice</h2>
            <form action="{{ route('birthdays.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label for="birth_date" class="block text-sm font-medium text-gray-700">Birth Date</label>
                    <input type="date" name="birth_date" id="birth_date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                    <textarea name="content" id="content" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required></textarea>
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
            $('#birthdays-table').DataTable();
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
        #birthdays-table td {
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
