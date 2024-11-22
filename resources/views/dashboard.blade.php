<x-app-layout>
    <div class="h-screen flex flex-col overflow-auto">
        <div class="flex-1 p-4 md:p-6 lg:p-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-9">

                <!-- Analytical Card 1: Total Notices -->
                <div class="bg-gradient-to-r from-green-500 to-green-700 text-white shadow-lg rounded-lg p-6 hover:scale-105 transition-transform duration-300">
                        <h3 class="text-lg font-semibold flex items-center">
                            <i class="fa fa-bell mr-2"></i>Total Notices
                        </h3>
                        <p class="text-3xl font-bold mt-4">{{ $noticesCount }}</p>

                    <p class="mt-2">View and manage all posted notices.</p>
                    <a href="{{ route('notices.index') }}" class="mt-4 inline-block  text-orange-700 rounded-lg px-4 py-2 hover:bg-orange-100">Go to Notices</a>
                </div>

                <!-- Analytical Card 2: Total Birthdays -->
                <div class="bg-gradient-to-r from-red-500 to-red-700 text-white shadow-lg rounded-lg p-6 hover:scale-105 transition-transform duration-300">
                        <h3 class="text-lg font-semibold flex items-center">
                            <i class="fa fa-calendar-alt mr-2"></i>Total Birthdays
                        </h3>
                        <p class="text-3xl font-bold mt-4">{{ $birthdaysCount }}</p>

                    <p class="mt-2">Check and manage all birthdays.</p>
                    <a href="{{ route('birthdays.index') }}" class="mt-4 inline-block bg-blue   px-4 py-2 hover:bg-teal-100">Go to Birthdays</a>
                </div>

                <!-- Analytical Card 3: Total Users -->
                <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white shadow-lg rounded-lg p-6 hover:scale-105 transition-transform duration-300">
                        <h3 class="text-lg font-semibold flex items-center">
                            <i class="fa fa-users mr-2"></i>Total Users
                        </h3>
                        <p class="text-3xl font-bold mt-4">{{ $usersCount }}</p>
                    <p class="mt-2">View and manage all registered users.</p>
                    <a href="{{ route('users.index') }}" class="mt-4 inline-block  text-white-700 rounded-lg px-4 py-2">Go to Users</a>
                </div>

                <!-- Analytical Card 4: Total Events -->
                <div class="bg-gradient-to-r from-purple-500 to-purple-700 text-white shadow-lg rounded-lg p-6 hover:scale-105 transition-transform duration-300">
                        <h3 class="text-lg font-semibold flex items-center">
                            <i class="fa fa-calendar mr-2"></i>Total Events
                        </h3>
                        <p class="text-3xl font-bold mt-4">{{ $eventsCount }}</p>
                    <p class="mt-2">View and manage all scheduled events.</p>
                    <a href="{{ route('events.index') }}" class="mt-4 inline-block  text-white-700 rounded-lg px-4 py-2 ">Go to Events</a>
                </div>

            </div>

            <!-- Event Calendar -->
            <div class="mt-10">
                <div class="bg-white rounded-lg shadow-md p-4 overflow-hidden" style="max-width: 100%; margin: 10 auto;">
                    <h2 class="text-xl font-semibold mb-4">Event Calendar</h2>
                    <div id="calendar" class="rounded-lg" style="max-height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Adding/Editing Events -->
    <div id="eventModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg w-11/12 md:w-1/3 lg:w-1/4">
            <div class="modal-header flex justify-between items-center p-4 border-b">
                <h5 class="text-lg font-semibold" id="modalTitle">Add Event</h5>
                <button type="button" class="text-gray-500 hover:text-gray-700" id="closeModal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <form id="eventForm">
                    <input type="hidden" id="eventId">
                    <div class="form-group mb-4">
                        <label for="eventName" class="block text-sm font-medium text-gray-700">Event Name</label>
                        <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md p-2" id="eventName" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="eventDates" class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="date" class="mt-1 block w-full border border-gray-300 rounded-md p-2" id="eventDates" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="eventStartTime" class="block text-sm font-medium text-gray-700">Start Time</label>
                        <input type="time" class="mt-1 block w-full border border-gray-300 rounded-md p-2" id="eventStartTime" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="eventEndTime" class="block text-sm font-medium text-gray-700">End Time</label>
                        <input type="time" class="mt-1 block w-full border border-gray-300 rounded-md p-2" id="eventEndTime" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="eventOrganizers" class="block text-sm font-medium text-gray-700">Organizers</label>
                        <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md p-2" id="eventOrganizers" required>
                    </div>
                    <div class="form-group mb-4">
                        <label for="eventVenue" class="block text-sm font-medium text-gray-700">Venue</label>
                        <input type="text" class="mt-1 block w-full border border-gray-300 rounded-md p-2" id="eventVenue" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer flex justify-between p-4 border-t">
                <button type="button" class="bg-gray-300 text-gray-700 rounded-md px-4 py-2" id="closeModalFooter">Close</button>
                <button type="button" class="bg-blue-500 text-white rounded-md px-4 py-2" id="saveEvent">Save Event</button>
            </div>
        </div>
    </div>
    <script>
   document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar');
    const modal = document.getElementById('eventModal');

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },


        events: [
    @foreach ($events as $event)
    {
        id: '{{ $event->id }}',
        title: '{{ $event->title }}',
        start: '{{ $event->start_time }}',
        end: '{{ $event->end_time }}',
        backgroundColor: '#007bff',
        borderColor: '#007bff',
        extendedProps: {
            organizers: '{{ $event->organizers }}',
            venue: '{{ $event->venue }}',
        }
    } @if (!$loop->last), @endif
    @endforeach
],

        editable: true,
        selectable: true,
        select: handleDateSelect,
        eventClick: handleEventClick,
    });

    calendar.render();

    document.getElementById('saveEvent').addEventListener('click', handleSaveEvent);
    document.getElementById('closeModal').addEventListener('click', closeModal);

    function handleEventClick(info) {
        populateEventForm(info.event);
        modal.classList.remove('hidden');
    }

    function populateEventForm(event) {
        document.getElementById('eventId').value = event.id;
        document.getElementById('eventName').value = event.title;
        document.getElementById('eventDates').value = event.startStr.split('T')[0];
        document.getElementById('eventStartTime').value = event.startStr.split('T')[1];
        document.getElementById('eventEndTime').value = event.endStr.split('T')[1];

        // Populate additional event details: organizers and venue
        document.getElementById('eventOrganizers').value = event.extendedProps.organizers || '';
        document.getElementById('eventVenue').value = event.extendedProps.venue || '';
    }

    function handleDateSelect(info) {
        clearEventForm();
        document.getElementById('eventDates').value = info.startStr.split('T')[0];
        document.getElementById('eventStartTime').value = info.startStr.split('T')[1];
        document.getElementById('eventEndTime').value = info.endStr.split('T')[1];
        modal.classList.remove('hidden');
        calendar.unselect();
    }

    function clearEventForm() {
        document.getElementById('eventId').value = '';
        document.getElementById('eventName').value = '';
        document.getElementById('eventDates').value = '';
        document.getElementById('eventStartTime').value = '';
        document.getElementById('eventEndTime').value = '';
        document.getElementById('eventOrganizers').value = '';
        document.getElementById('eventVenue').value = '';
    }

    function closeModal() {
        modal.classList.add('hidden');
        clearEventForm();
    }
});

</script>

</x-app-layout>
