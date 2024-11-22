<x-app-layout>
    <div class="bg-white container mx-auto p-6">
        <h1 class="my-4 text-3xl font-bold text-gray-800">Phone Directory</h1>

        <a href="{{ route('phones.create') }}" class="btn btn-primary bg-blue-500 text-white px-6 py-2 rounded-lg ">
            Add New Entry
        </a>
        <br><br>

        @if (session('success'))
            <div class="alert alert-success bg-green-500 text-white p-2 rounded-md mb-4">{{ session('success') }}</div>
        @endif

        <!-- Filter and Search Inputs -->
        <div class="mb-4 flex justify-between items-center">
            <div class="flex">
                <form method="GET" action="{{ route('phones.index') }}" class="flex space-x-4">
                    <!-- Search -->
                    <div class="flex">
                        <input type="text" id="search" name="search" value="{{ request('search') }}" class="mt-2 px-4 py-2 border border-gray-300 rounded-md" placeholder="Search phones...">
                    </div>

                    <!-- Department Filter -->
                    <div class="flex">
                        <select id="departmentFilter" name="department" class="mt-2 px-4 py-2 border border-gray-300 rounded-md">
                            <option value="">All</option>
                            @foreach($departments as $department)
                                <option value="{{ $department }}" {{ request('department') == $department ? 'selected' : '' }}>{{ $department }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded-md">Apply Filters</button>
                </form>
            </div>
        </div>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table id="phoneTable" class="min-w-full table-auto">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Name</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Department</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Extension</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Added By</th>
                        <th class="px-4 py-2 text-left text-sm font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse ($phones as $phone)
                        <tr class="border-t border-gray-200 hover:bg-gray-50">
                            <td class="px-4 py-2 text-sm">{{ $phone->name }}</td>
                            <td class="px-4 py-2 text-sm">{{ $phone->department }}</td>
                            <td class="px-4 py-2 text-sm">{{ $phone->extension }}</td>
                            <td class="px-4 py-2 text-sm">{{ $phone->user->name ?? 'N/A' }}</td>
                            <td class="px-4 py-2 text-sm">
                                <a href="{{ route('phones.show', $phone->id) }}" class="bg-blue-500 text-white py-1 px-3 rounded-md hover:bg-blue-600">View</a>
                                <a href="{{ route('phones.edit', $phone->id) }}" class="bg-yellow-500 text-white py-1 px-3 rounded-md hover:bg-yellow-600 ml-2">Edit</a>
                                <form action="{{ route('phones.destroy', $phone->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded-md hover:bg-red-600 ml-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-sm">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Include jQuery (required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!-- Include DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

</x-app-layout>
