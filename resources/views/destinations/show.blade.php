<x-app-layout>
    <div class="p-6">

        @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6">

        <h2 class="text-2xl font-semibold mb-4">{{ $destination->name }}</h2>

            <div class="mb-4">
                @if ($destination->image)
                    <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}" class="w-32 h-32 object-cover rounded-md">
                @else
                    <span>No Image Available</span>
                @endif
            </div>

            <div class="mb-4">
                <h3 class="text-lg font-semibold">Description</h3>
                <p class="mt-2">{{ $destination->description }}</p>
            </div>

            <div class="mb-4">
                <h3 class="text-lg font-semibold">Author</h3>
                <p class="mt-2">{{ $destination->user->name ?? 'Unknown' }}</p>
            </div>

            <div class="mt-4">
                <a href="{{ route('destinations.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md">
                    Back to Destinations
                </a>
                <a href="{{ route('destinations.edit', $destination->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md ml-2">
                    Edit
                </a>
                <form action="{{ route('destinations.destroy', $destination->id) }}" method="POST" class="inline-block ml-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md">
                        Delete
                    </button>
                </form>
            </div>
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
