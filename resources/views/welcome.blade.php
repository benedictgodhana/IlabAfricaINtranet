<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intranet</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('Template/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Template/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('Template/css/style.css') }}">
    <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- jQuery and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>z
        .tooltip {
    position: absolute;
    z-index: 1000;
    background: #333;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 12px;
    pointer-events: none;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}


    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 flex flex-col">
<nav class="w-full bg-white fixed top-0 left-0 shadow-xl z-[9999]">
  <div class="container flex flex-wrap items-center justify-between mx-auto">
    <!-- Logo Section -->
    <a href="#" class="mr-4 block py-1.5 text-base font-semibold">
      <img src="/images/LOGO_2.png" alt="Logo" style="height:80px" />
    </a>

    <!-- Nav Links -->
    <div class="lg:block">
  <ul class="flex flex-row items-center gap-6">
    <li>
      <a href="/" class="text-sm p-1 text-black hover:text-blue-600">Home</a>
    </li>
    <li>
      <a href="/login" class="text-sm p-1 text-black hover:text-blue-600">Account</a>
    </li>
    <li>
      <a href="/phone_directory" class="text-sm p-1 text-black hover:text-blue-600">Phone Directory</a>
    </li>
  </ul>
</div>


    <!-- Mobile Menu Button -->
    <button id="mobileMenuToggle" class="relative lg:hidden">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden">
      <ul class="flex flex-col items-start gap-4 mt-4">
        <li>
          <a href="/" class="text-sm text-black hover:text-blue-600">Home</a>
        </li>
        <li>
          <a href="/login" class="text-sm text-black hover:text-blue-600">Account</a>
        </li>
        <li>
          <a href="/forms" class="text-sm text-black hover:text-blue-600">Forms</a>
        </li>
      </ul>
    </div>
  </div>
</nav>



<div class="flex flex-col lg:flex-row mt-16 px-4 space-y-6 lg:space-y-0 lg:space-x-6"> <!-- Left Sidebar (Notices & Birthdays) -->
<div class="w-full lg:w-1/4 white-900 text-white p-6 space-y-6 rounded-lg  mt-10">
  <!-- Categories Section (optional, add later if needed) -->

  <!-- Notice Board Section -->
  <div>
    <h3 class="text-lg font-semibold text-gray-200 text-center" style="color:navy">Notice Board</h3>
    <ul class="space-y-4 mt-2 max-h-58 overflow-y-scroll">
      @forelse($notices->take(2) as $notice) <!-- Display only the first 2 notices -->
        <li class="bg-blue-800 p-4 rounded-lg shadow-md hover:bg-blue-700 transition">
          <span class="font-bold text-white">{{ $notice['content'] }}</span>
          <p class="text-sm mt-2 text-white-500">{{ $notice['content'] }}</p>
          <br>
          <p class="text-xs text-white-400">By Benedict Godhana</p>
          <a href="{{ $notice['details_link'] }}" class="text-white-400 hover:text-white mt-2 text-center inline-block">View Notice</a>
        </li>
      @empty
        <li class="bg-blue-800 p-4 rounded-lg shadow-md hover:bg-blue-700 transition">
          <span class="font-bold text-white">No Notices Available</span>
        </li>
      @endforelse
    </ul>

    <!-- Display the remaining notices below -->
    @if($notices->count() > 2)
      <a href="#" class="text-blue-400 hover:text-white mt-4 block">View More Notices</a>
    @endif
</div>



</div>


  <!-- Center Content (Systems & Calendar) -->
  <div class="flex-1 p-6 bg-gray-100 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-16">
    <!-- Link Cards Section -->
    <div class="col-span-1 sm:col-span-2 lg:col-span-3 mt-10">
    <h3 class="text-lg font-semibold text-gray-200 text-center" style="color:navy">Quick Links</h3>
    <br>

    <div class="grid grid-cols-2 sm:grid-cols-3 gap-6">
       <a href="https://shaba.strathmore.edu/" class="block bg-blue-800 p-6 rounded-lg text-center shadow-lg transition hover:bg-blue-700">
  <span style="color:white">
    <span class="text-lg mr-2">🏨</span> <!-- Room emoji for room booking -->
    Room Bookings
  </span>
</a>

        <a href="https://sabuk.strathmore.edu/" class="block bg-blue-800 p-6 rounded-lg text-center shadow-lg transition hover:bg-blue-700" >

<span style="color:white">    <span class="text-lg mr-2">📝</span> <!-- Notepad emoji for feedback -->Feedback System</span>
</a>
        <a href="https://pnc-pm.strathmore.edu/" class="block bg-blue-800 p-6 rounded-lg text-center shadow-lg transition hover:bg-blue-700">

<span style="color:white">    <span class="text-lg mr-2">📊</span> <!-- Bar chart emoji for performance evaluation -->Performance</span>
</a>
        <a href="http://tsavo.strathmore.edu/login" class="block bg-blue-800 p-6 rounded-lg text-center shadow-lg transition hover:bg-blue-700" >

<span style="color:white">    <span class="text-lg mr-2">📦</span> <!-- Package emoji for inventory -->Inventory System</span>
</a>
        <a href="https://ilabafrica.strathmore.edu/" class="block bg-blue-800 p-6 rounded-lg text-center shadow-lg transition hover:bg-blue-700">

<span  style="color:white">    <span class="text-lg mr-2">🌐</span> <!-- Globe emoji for website -->ILab Website</span>
</a>
        <a href="/phone_directory" class="block bg-blue-800 p-6 rounded-lg text-center shadow-lg transition hover:bg-blue-700" >
    <span style="color:white">
        <span class="text-lg mr-2">📞</span> <!-- Phone emoji for directory -->
        Phone Directory
    </span>
</a>

        <a href="https://tudor.strathmore.edu/payroll/d56b699830e77ba53855679cb1d252da/" class="block bg-blue-800 p-6 rounded-lg text-center shadow-lg transition hover:bg-blue-700" >
    <span style="color:white">
        <span class="text-lg mr-2">💵</span> <!-- Money emoji for payroll -->
        Payroll
    </span>
</a>
        <a href="http://printers.strathmore.edu:8080/" class="block bg-blue-800 p-6 rounded-lg text-center shadow-lg transition hover:bg-blue-700">
    <span style="color:white">
        <span class="text-lg mr-2">🖨️</span> <!-- Printer emoji for printers -->
        Printers
    </span>
</a>
        <a href="https://tudor.strathmore.edu/hrm/symfony/web/index.php/auth/login" class="block bg-blue-800 p-6 rounded-lg text-center shadow-lg transition hover:bg-blue-700">
    <span style="color:white">
        <span class="text-lg mr-2">🧑‍💼</span> <!-- HR emoji for human resources -->
        HR
    </span>
</a>
      </div>
    </div>

    <!-- Calendar Section (Placed below the link cards) -->
    <div class="col-span-3 mb-16">
  <div class="mb-16">
    <h3 class="text-lg font-semibold text-gray-200 text-center" style="color:navy">Documents</h3>
    <p class="text-sm mt-2 text-center" style="color:navy">Explore our extensive collection of documents at iLabAfrica!</p>

    <div class="grid grid-cols-2 gap-4 mt-4">
      <!-- <a href="/reports" class="flex items-center p-4 bg-white shadow-md hover:bg-gray-100 transition duration-200">
        <span class="text-lg mr-2">📁</span>
        <span class="text-gray-800">Reports</span>
      </a> -->
      <a href="/policies" class="flex items-center p-4 bg-white shadow-md hover:bg-gray-100 transition duration-200">
        <span class="text-lg mr-2">📁</span>
        <span class="text-gray-800">Our Policies</span>
      </a>
      <a href="/forms" class="flex items-center p-4 bg-white shadow-md hover:bg-gray-100 transition duration-200">
        <span class="text-lg mr-2">📁</span>
        <span class="text-gray-800">Request Forms & Docs</span>
      </a>
      <a href="/templates" class="flex items-center p-4 bg-white shadow-md hover:bg-gray-100 transition duration-200">
        <span class="text-lg mr-2">📁</span>
        <span class="text-gray-800">Templates</span>
      </a>
      <a href="#" class="flex items-center p-4 bg-white shadow-md hover:bg-gray-100 transition duration-200">
        <span class="text-lg mr-2">📁</span>
        <span class="text-gray-800">Presentations</span>
      </a>
    </div>
  </div>
</div>


</div>


 <!-- Right Sidebar (Document Directory) -->
 <div class="w-full lg:w-1/4 text-gray-900 p-6 space-y-6 rounded-lg mt-10">
    <h3 class="text-lg font-semibold text-gray-200 text-center mt-10" style="color:navy">Birthday List</h3>
    <ul class="space-y-6 mt-2 max-h-56 overflow-y-scroll">
    @forelse($birthdaysToday as $birthday)
      <li class="bg-blue-800 p-4 rounded-lg shadow-md hover:bg-blue-700 transition">
        <span class="font-bold text-white">{{ $birthday->name }} has a birthday today!</span>
        <a href="mailto:{{ $birthday->email }}?subject=Happy Birthday {{ $birthday->name }}&body=Dear {{ $birthday->name }},%0A%0A%20Wishing%20you%20a%20very%20Happy%20Birthday!%20May%20your%20day%20be%20filled%20with%20joy%20and%20blessings.%0A%0ACheers!"
           class="mt-4 bg-orange-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 inline-block" style="width:100%;background:orange">
          Send Wishes
        </a>
      </li>
    @empty
      <li class="bg-blue-800 p-4 rounded-lg shadow-md hover:bg-blue-700 transition">
        <span class="font-bold text-white">No Birthdays Today</span>
      </li>
    @endforelse
  </ul>

  <!-- Events Section -->
  <h3 class="text-lg text-center font-semibold text-gray-200 mt-8" style="color:navy">Events</h3>
  <ul class="space-y-4 mt-2">
    @forelse($events as $event)
      <li class="bg-green-800 p-4 rounded-lg shadow-md hover:bg-green-700 transition">
        <span class="font-bold text-white">{{ $event->title }}</span>
        <p class="text-sm text-gray-200 mt-1">
          <strong>Time:</strong> {{ $event->start_time }} - {{ $event->end_time }}
        </p>
        <p class="text-sm text-gray-200">
          <strong>Venue:</strong> {{ $event->venue }}
        </p>
        <p class="text-sm text-gray-200">
          <strong>Organizers:</strong> {{ $event->organizers }}
        </p>
      </li>
    @empty
      <li class="bg-green-800 p-4 rounded-lg shadow-md hover:bg-green-700 transition">
        <span class="font-bold text-white">No Events Today</span>
      </li>
    @endforelse
  </ul>
</div>



</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth'
    });
    calendar.render();
  });
</script>
<script src="node_modules/@material-tailwind/html/scripts/collapse.js"></script>
<!-- from cdn -->
<script src="https://unpkg.com/@material-tailwind/html@latest/scripts/collapse.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const calendarEl = document.getElementById('calendar');
    const modal = document.getElementById('eventModal');

    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay',
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

        // Tooltip on hover
        eventMouseEnter: function (info) {
            const tooltip = document.createElement('div');
            tooltip.className = 'tooltip';
            tooltip.style.position = 'absolute';
            tooltip.style.zIndex = '1000';
            tooltip.style.background = '#333';
            tooltip.style.color = '#fff';
            tooltip.style.padding = '5px 10px';
            tooltip.style.borderRadius = '5px';
            tooltip.style.fontSize = '12px';
            tooltip.style.pointerEvents = 'none';
            tooltip.innerHTML = `
                <strong>${info.event.title}</strong><br>
                Organizers: ${info.event.extendedProps.organizers || 'N/A'}<br>
                Venue: ${info.event.extendedProps.venue || 'N/A'}
            `;

            document.body.appendChild(tooltip);

            const updateTooltipPosition = (event) => {
                tooltip.style.top = `${event.pageY + 10}px`;
                tooltip.style.left = `${event.pageX + 10}px`;
            };

            updateTooltipPosition(info.jsEvent);

            info.el.addEventListener('mousemove', updateTooltipPosition);

            info.el.addEventListener('mouseleave', function () {
                tooltip.remove();
                info.el.removeEventListener('mousemove', updateTooltipPosition);
            });
        },
    });

    calendar.render();

    // Other functions (handleEventClick, handleDateSelect, clearEventForm, closeModal)...

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

<script>
  const toggle = document.getElementById('mobileMenuToggle');
  const menu = document.getElementById('mobileMenu');

  toggle.addEventListener('click', () => {
    menu.classList.toggle('hidden');
  });
</script>
</body>
</html>
