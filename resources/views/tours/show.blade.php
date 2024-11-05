<x-app-layout>
    <div class="p-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Tour Details</h2>

            <div class="mb-4">
                @if ($tour->image)
                    <img src="{{ asset('storage/' . $tour->image) }}" alt="{{ $tour->name }}" class="w-32 h-32 object-cover rounded">
                @else
                    <span>No Image Available</span>
                @endif
            </div>

            <div class="mb-4">
                <h3 class="text-xl font-semibold">Name:</h3>
                <p>{{ $tour->name }}</p>
            </div>

            <div class="mb-4">
                <h3 class="text-xl font-semibold">Description:</h3>
                <p>{{ $tour->description }}</p>
            </div>

            <div class="mb-4">
                <h3 class="text-xl font-semibold">Destination:</h3>
                <p>{{ $tour->destination->name ?? 'Unknown' }}</p>
            </div>

            <div class="mb-4">
                <h3 class="text-xl font-semibold">Created By:</h3>
                <p>{{ $tour->user->name ?? 'Unknown' }}</p> <!-- Assuming the author is the user -->
            </div>

            <div class="flex space-x-4 mt-6">
                <a href="{{ route('tours.edit', $tour->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md">
                    Edit
                </a>
                <form action="{{ route('tours.destroy', $tour->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md">
                        Delete
                    </button>
                </form>
                <a href="{{ route('tours.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md">
                    Back to Tours
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
