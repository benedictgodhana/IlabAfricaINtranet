<x-app-layout>
    <div class="p-2 max-w-8xl mx-auto"> <!-- Center the content -->

        @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded-lg shadow-lg mb-4 transition-opacity duration-500">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-lg rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Edit Destination: {{ $destination->name }}</h2>

            <form action="{{ route('destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Destination Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $destination->name) }}" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="5" required
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">{{ old('description', $destination->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" name="image" id="image" accept="image/*"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-semibold">Current Image</h3>
                    @if ($destination->image)
                        <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}" class="w-32 h-32 object-cover rounded-lg border border-gray-300 shadow mt-2">
                    @else
                        <span class="text-gray-500 mt-2">No Image Available</span>
                    @endif
                </div>

                <div class="mb-4">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 transition duration-200">
                        Update Destination
                    </button>
                    <a href="{{ route('destinations.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg shadow hover:bg-gray-400 transition duration-200 ml-2">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
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
</x-app-layout>
