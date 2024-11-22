<x-app-layout>
    <div class="p-6">
        <div class="bg-white shadow-md rounded-lg p-6  mx-auto">
            <h2 class="text-2xl font-semibold mb-4  items-center">
               
                Create New Event
            </h2>

            <form action="{{ route('events.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-gray-700">Title</label>

                        <input type="text" id="title" name="title" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-200" placeholder="Event Title" required>
                </div>
                <div class="mb-4">
                    <label for="date" class="block text-gray-700">Date</label>

                        <input type="date" id="date" name="date" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-200" required>
                </div>
                <div class="mb-4">
                    <label for="start_time" class="block text-gray-700">Start Time</label>

                        <input type="time" id="start_time" name="start_time" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-200" required>
                </div>
                <div class="mb-4">
                    <label for="end_time" class="block text-gray-700">End Time</label>

                        <input type="time" id="end_time" name="end_time" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-200" required>
                </div>
                <div class="mb-4">
                    <label for="organizers" class="block text-gray-700">Organizers</label>

                        <input type="text" id="organizers" name="organizers" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-200" placeholder="Event Organizers" required>
                </div>
                <div class="mb-4">
                    <label for="venue" class="block text-gray-700">Venue</label>

                        <input type="text" id="venue" name="venue" class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-200" placeholder="Event Venue" required>
                </div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-200">
                    Create Event
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
