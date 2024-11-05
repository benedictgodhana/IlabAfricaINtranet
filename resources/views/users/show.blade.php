<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-6">User Details</h2>

        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="mb-4">
                <strong>Name:</strong> {{ $user->name }}
            </div>
            <br>
            <hr class="border-gray-300 my-2" />
            <br>
            <div class="mb-4">
                <strong>Email:</strong> {{ $user->email }}
            </div>
            <br>
            <hr class="border-gray-300 my-2" />
            <div class="mb-4">
                <strong>Added By:</strong> {{ $user->added_by }}
            </div>
            <br>

            <a href="{{ route('users.index') }}" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                Back to Users
            </a>
        </div>
    </div>
</x-app-layout>
