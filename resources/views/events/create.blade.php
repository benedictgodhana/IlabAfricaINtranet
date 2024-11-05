<x-app-layout>
    <div class="p-6">
        <div class="bg-white shadow-md rounded-lg p-6  mx-auto">
            <h2 class="text-2xl font-semibold mb-4  items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Create New Event
            </h2>

            <form action="{{ route('events.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700">Title</label>
                    <div class="flex items-center border border-gray-300 rounded-md shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <input type="text" id="title" name="title" class="mt-1 block w-full border-0 focus:ring-0" placeholder="Event Title" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="date" class="block text-gray-700">Date</label>
                    <div class="flex items-center border border-gray-300 rounded-md shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V4m8 3V4m-8 0h8a2 2 0 012 2v14a2 2 0 01-2 2H6a2 2 0 01-2-2V6a2 2 0 012-2z" />
                        </svg>
                        <input type="date" id="date" name="date" class="mt-1 block w-full border-0 focus:ring-0" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="start_time" class="block text-gray-700">Start Time</label>
                    <div class="flex items-center border border-gray-300 rounded-md shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2" />
                        </svg>
                        <input type="time" id="start_time" name="start_time" class="mt-1 block w-full border-0 focus:ring-0" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="end_time" class="block text-gray-700">End Time</label>
                    <div class="flex items-center border border-gray-300 rounded-md shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2" />
                        </svg>
                        <input type="time" id="end_time" name="end_time" class="mt-1 block w-full border-0 focus:ring-0" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="organizers" class="block text-gray-700">Organizers</label>
                    <div class="flex items-center border border-gray-300 rounded-md shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4m8 0h1a2 2 0 012 2v1M4 20a2 2 0 002-2v-1m0-2H2" />
                        </svg>
                        <input type="text" id="organizers" name="organizers" class="mt-1 block w-full border-0 focus:ring-0" placeholder="Event Organizers" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="venue" class="block text-gray-700">Venue</label>
                    <div class="flex items-center border border-gray-300 rounded-md shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4H3v-4h2zm0-2H3V7h2l4 4zm9 8h-2v-4l4-4h-2v8zm0-8h-2l-4 4h2l4-4z" />
                        </svg>
                        <input type="text" id="venue" name="venue" class="mt-1 block w-full border-0 focus:ring-0" placeholder="Event Venue" required>
                    </div>
                </div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-200">
                    Create Event
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
