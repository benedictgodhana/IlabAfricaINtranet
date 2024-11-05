<x-app-layout>
    <div class="p-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Create New Package</h2>

            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Package Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                               class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                    </div>

                    <div class="mb-4">
                        <label for="duration" class="block text-sm font-medium text-gray-700">Duration (in days)</label>
                        <input type="number" name="duration" id="duration" value="{{ old('duration') }}" required
                               class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4" required
                              class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">{{ old('description') }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="tour_id" class="block text-sm font-medium text-gray-700">Select Tour</label>
                    <select name="tour_id" id="tour_id" required
                            class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                        <option value="">-- Select a Tour --</option>
                        @foreach ($tours as $tour)
                            <option value="{{ $tour->id }}">{{ $tour->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Upload Image (optional)</label>
                    <input type="file" name="image" id="image" accept="image/*"
                           class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                </div>

                <div class="flex items-center">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                        Create Package
                    </button>
                    <a href="{{ route('packages.index') }}" class="ml-4 text-gray-500 hover:text-blue-600 transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
