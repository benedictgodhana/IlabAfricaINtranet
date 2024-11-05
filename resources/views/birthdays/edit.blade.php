<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-4">Edit Birthday Notice</h2>

        @if (session('success'))
            <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('birthdays.update', $birthday->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $birthday->name) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label for="birth_date" class="block text-sm font-medium text-gray-700">Birth Date</label>
                    <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date', $birthday->birth_date) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $birthday->email) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('birthdays.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md mr-2">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Hide success message after 4 seconds -->
    <script>
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
