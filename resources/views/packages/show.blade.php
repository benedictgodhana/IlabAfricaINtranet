    <x-app-layout>
        <div class="p-6">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-semibold mb-4">Package Details</h2>

                <div class="mb-4">
                    @if ($package->image)
                        <img src="{{ asset('storage/' . $package->image) }}" alt="{{ $package->name }}" class="object-cover rounded w-32 h-32  shadow-md">
                    @else
                        <span class="text-gray-500">No Image Available</span>
                    @endif
                </div>

                <div class="mb-4">
                    <h3 class="text-xl font-semibold">Name:</h3>
                    <p class="text-gray-700">{{ $package->name }}</p>
                </div>

                <div class="mb-4">
                    <h3 class="text-xl font-semibold">Description:</h3>
                    <p class="text-gray-700">{{ $package->description }}</p>
                </div>

                <div class="mb-4">
                    <h3 class="text-xl font-semibold">Duration:</h3>
                    <p class="text-gray-700">{{ $package->duration }} days</p>
                </div>


                <div class="mb-4">
                    <h3 class="text-xl font-semibold">Tour:</h3>
                    <p class="text-gray-700">{{ $package->tour->name ?? 'Unknown' }}</p> <!-- Assuming the tour is related -->
                </div>

                <div class="flex space-x-4 mt-6">
                    <a href="{{ route('packages.edit', $package->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">
                        Edit
                    </a>
                    <form action="{{ route('packages.destroy', $package->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition">
                            Delete
                        </button>
                    </form>
                    <a href="{{ route('packages.index') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                        Back to Packages
                    </a>
                </div>
            </div>
        </div>
    </x-app-layout>
