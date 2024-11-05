<x-app-layout>
    <div class="">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Edit Package</h2>

            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="name" class="block text-sm font-semibold mb-2">Package Name:</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $package->name) }}" class="border rounded-md w-full p-2" required>
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="duration" class="block text-sm font-semibold mb-2">Duration (in days):</label>
                        <input type="number" id="duration" name="duration" value="{{ old('duration', $package->duration) }}" class="border rounded-md w-full p-2" required>
                        @error('duration')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-semibold mb-2">Description:</label>
                        <textarea id="description" name="description" rows="4" class="border rounded-md w-full p-2" required>{{ old('description', $package->description) }}</textarea>
                        @error('description')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    

                    <div>
                        <label for="tour_id" class="block text-sm font-semibold mb-2">Tour:</label>
                        <select id="tour_id" name="tour_id" class="border rounded-md w-full p-2" required>
                            @foreach ($tours as $tour)
                                <option value="{{ $tour->id }}" {{ old('tour_id', $package->tour_id) == $tour->id ? 'selected' : '' }}>{{ $tour->name }}</option>
                            @endforeach
                        </select>
                        @error('tour_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label for="image" class="block text-sm font-semibold mb-2">Package Image:</label>
                        <input type="file" id="image" name="image" class="border rounded-md w-full p-2">
                        @error('image')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                        @if ($package->image)
                            <p class="text-sm text-gray-500 mt-2">Current Image:</p>
                            <img src="{{ asset('storage/' . $package->image) }}" alt="{{ $package->name }}" class="object-cover rounded w-32 h-32 mt-1">
                        @endif
                    </div>
                </div>

                <div class="flex space-x-4 mt-6">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                        Update Package
                    </button>
                    <a href="{{ route('packages.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
