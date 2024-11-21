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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
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
<nav class="w-full bg-white bg-opacity-90 fixed top-0 left-0 backdrop-blur-lg backdrop-saturate-150 shadow-xl z-[9999]" style="background:white;">
  <div class="container flex flex-wrap items-center justify-between mx-auto text-white ">
    <!-- Logo Section -->
    <a href="#" class="mr-4 block cursor-pointer py-1.5 text-base font-semibold">
      <img src="/images/LOGO_2.png" alt="Logo" style="height:80px" />
    </a>

    <!-- Nav Links -->
    <div class="hidden lg:block">
      <ul class="flex flex-col gap-2 mt-2 mb-4 lg:mb-0 lg:mt-0 lg:flex-row lg:items-center lg:gap-6">
        <li class="flex items-center p-1 text-sm gap-x-2">
          <a href="/" class="flex items-center" style="color:black">Home</a>
        </li>
        <li class="flex items-center p-1 text-sm gap-x-2">
          <a href="/login" class="flex items-center" style="color:black">Account</a>
        </li>
        <li class="flex items-center p-1 text-sm gap-x-2">
          <a href="/forms" class="flex items-center" style="color:black">Forms</a>
        </li>
      </ul>
    </div>

    <!-- Mobile Menu Button -->
    <button class="relative ml-auto h-6 max-h-[40px] w-6 max-w-[40px] select-none rounded-lg text-center align-middle text-xs font-medium uppercase text-inherit transition-all hover:bg-transparent focus:bg-transparent active:bg-transparent disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:hidden" type="button">
      <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </span>
    </button>
  </div>
</nav>


<div class="flex min-h-screen mt-10">

 <!-- Left Sidebar (Notices & Birthdays) -->
<div class="w-1/6 white-900 text-white p-6 space-y-6 rounded-lg shadow-lg mt-10">
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


  <!-- Birthdays Section -->
<div>
  <h3 class="text-lg text-center font-semibold text-gray-200" style="color:navy">Birthdays</h3>
  <ul class="space-y-4 mt-2">
    @forelse($birthdaysToday as $birthday)
      <li class="bg-blue-800 p-4 rounded-lg shadow-md hover:bg-blue-700 transition">
        <span class="font-bold text-white">{{ $birthday->name }} has a birthday today!</span>
        <a href="mailto:{{ $birthday->email }}?subject=Happy Birthday {{ $birthday->name }}&body=Dear {{ $birthday->name }},%0A%0A%20Wishing%20you%20a%20very%20Happy%20Birthday!%20May%20your%20day%20be%20filled%20with%20joy%20and%20blessings.%0A%0ACheers!"
           class="mt-4 bg-orange-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 inline-block" style="width:100%">
          Send Wishes
        </a>
      </li>
    @empty
      <li class="bg-blue-800 p-4 rounded-lg shadow-md hover:bg-blue-700 transition">
        <span class="font-bold text-white">No Birthday Today</span>
      </li>
    @endforelse
  </ul>
</div>
</div>


  <!-- Center Content (Systems & Calendar) -->
  <div class="flex-1 p-6 bg-gray-100 grid grid-cols-3 gap-6 mt-16">

    <!-- Link Cards Section -->
    <div class="col-span-3 ">
    <h3 class="text-lg font-semibold text-gray-200 text-center" style="color:navy">Quick Links</h3>
    <br>

      <div class="grid grid-cols-3 gap-6">
        <div class="bg-blue-800 p-6 rounded-lg text-center shadow-lg  transition" >
        <a href="https://shaba.strathmore.edu/" >
    <span style="color:white">  <span class="text-lg mr-2">🏨</span> <!-- Room emoji for room booking -->
Room Bookings</span>
  </a>
        </div>
        <div class="bg-blue-800 p-6 rounded-lg text-center shadow-lg  transition" >
        <a href="https://sabuk.strathmore.edu/" >

<span style="color:white">    <span class="text-lg mr-2">📝</span> <!-- Notepad emoji for feedback -->Feedback System</span>
</a>
        </div>
        <div class="bg-blue-800 p-6 rounded-lg text-center shadow-lg  transition" >
        <a href="https://pnc-pm.strathmore.edu/" >

<span style="color:white">    <span class="text-lg mr-2">📊</span> <!-- Bar chart emoji for performance evaluation -->Performance Evaluation</span>
</a>
        </div>
        <div class="bg-blue-800 p-6 rounded-lg text-center shadow-lg transition">
        <a href="http://tsavo.strathmore.edu/login" >

<span style="color:white">    <span class="text-lg mr-2">📦</span> <!-- Package emoji for inventory -->Inventory System</span>
</a>
        </div>
        <div class="bg-blue-800 p-6 rounded-lg text-center shadow-lg  transition">
        <a href="https://ilabafrica.strathmore.edu/" >

<span  style="color:white">    <span class="text-lg mr-2">🌐</span> <!-- Globe emoji for website -->ILab Website</span>
</a>
        </div>
        <div class="bg-blue-800 p-6 rounded-lg text-center shadow-lg  transition">
        <a href="/phone_directory" >
    <span style="color:white">
        <span class="text-lg mr-2">📞</span> <!-- Phone emoji for directory -->
        Phone Directory
    </span>
</a>
        </div>

        <div class="bg-blue-800 p-6 rounded-lg text-center shadow-lg transition" >
        <a href="https://tudor.strathmore.edu/payroll/d56b699830e77ba53855679cb1d252da/" >
    <span style="color:white">
        <span class="text-lg mr-2">💵</span> <!-- Money emoji for payroll -->
        Payroll
    </span>
</a>
        </div>
        <div class="bg-blue-800 p-6 rounded-lg text-center shadow-lg  transition" >
        <a href="http://printers.strathmore.edu:8080/" >
    <span style="color:white">
        <span class="text-lg mr-2">🖨️</span> <!-- Printer emoji for printers -->
        Printers
    </span>
</a>
        </div>
        <div class="bg-blue-800 p-6 rounded-lg text-center shadow-lg  transition" >
        <a href="https://tudor.strathmore.edu/hrm/symfony/web/index.php/auth/login" >
    <span style="color:white">
        <span class="text-lg mr-2">🧑‍💼</span> <!-- HR emoji for human resources -->
        HR
    </span>
</a>
        </div>
      </div>
    </div>

    <!-- Calendar Section (Placed below the link cards) -->
    <div class="col-span-3 mb-8 ">
  <h3 class="text-lg font-semibold text-center">Calendar of Events</h3>
  <div id="calendar" class="mt-4 bg-white rounded-lg shadow-lg p-3 max-h-[400px] overflow-auto"></div>
</div>

</div>


 <!-- Right Sidebar (Document Directory) -->
<div class="w-1/5 bg-white-900 text-white p-6 mt-16" >
  <div class="mt-8">
  <h3 class="text-lg font-semibold text-gray-200 text-center" style="color:navy">Documents</h3>

    <p class="text-sm mt-2"  style="color:navy">Explore our extensive collection of documents at iLabAfrica!</p>
    <ul class="mt-4 space-y-2">
      <li> <a href="/reports" class="flex items-center p-4 bg-white  shadow-md hover:bg-gray-100 transition duration-200" >
    <span class="text-lg mr-2">📁</span>
      <span class="text-gray-800">Reports</span>
    </a></li>
    <a href="/policies" class="flex items-center p-4 bg-white  shadow-md hover:bg-gray-100 transition duration-200" >
    <span class="text-lg mr-2">📁</span>
      <span class="text-gray-800">Policies</span>
    </a>
    <a href="/forms" class="flex items-center p-4 bg-white  shadow-md hover:bg-gray-100 transition duration-200">
    <span class="text-lg mr-2">📁</span>
      <span class="text-gray-800">Forms</span>
    </a>
    <a href="/templates" class="flex items-center p-4 bg-white  shadow-md hover:bg-gray-100 transition duration-200">
    <span class="text-lg mr-2">📁</span>
      <span class="text-gray-800">Templates</span>
    </a>

    <a href="#" class="flex items-center p-4 bg-white  shadow-md hover:bg-gray-100 transition duration-200" >
    <span class="text-lg mr-2">📁</span>
      <span class="text-gray-800">Presentations</span>
    </a>
    </ul>
  </div>
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
</body>
</html>
