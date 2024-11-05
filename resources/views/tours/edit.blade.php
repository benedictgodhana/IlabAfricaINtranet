<x-app-layout>
    <div class="p-2">

        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold mb-4">Edit Tour: {{ $tour->name }}</h2>

            <form action="{{ route('tours.update', $tour->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Tour Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $tour->name) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">{{ old('description', $tour->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="destination_id" class="block text-sm font-medium text-gray-700">Destination</label>
                    <select name="destination_id" id="destination_id" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                        <option value="">Select a destination</option>
                        @foreach ($destinations as $destination)
                            <option value="{{ $destination->id }}" {{ $tour->destination_id == $destination->id ? 'selected' : '' }}>{{ $destination->name }}</option>
                        @endforeach
                    </select>
                </div>



                <div class="mb-4">
                    <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                    <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $tour->start_date) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                    <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $tour->end_date) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>

                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Tour Image (Optional)</label>
                    <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                    @if ($tour->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $tour->image) }}" alt="{{ $tour->name }}" class="w-32 h-32 object-cover rounded-md">
                        </div>
                    @endif
                </div>

                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">
                        Update Tour
                    </button>
                    <a href="{{ route('tours.index') }}" class="px-4 py-2 bg-gray-300 text-black rounded-md ml-2">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>