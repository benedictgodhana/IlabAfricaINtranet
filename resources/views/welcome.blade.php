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
<link rel="stylesheet" href="{{ asset('Template/css/style.css') }}">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>





@vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }


        /* Add custom styles */
        .navbar {
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .navbar.scrolled {
            background-color: rgba(255, 165, 0, 0.9); /* Semi-transparent orange */
            transform: translateY(-2px);
        }

        .description-text {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 1s forwards;
            animation-delay: 0.5s;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .btn-primary {
            transition: transform 0.3s ease;
        }

        .btn-primary:hover {
            transform: scale(1.05);
            animation: pulse 0.5s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }


        .card-grid {
        display: grid;
        grid-template-columns: repeat(1, 1fr); /* Default: 1 column */
        gap: 20px;
    }

    /* For medium screens and up (768px and above) */
    @media (min-width: 768px) {
        .card-grid {
            grid-template-columns: repeat(2, 1fr); /* 2 columns */
        }
    }

    /* For large screens and up (992px and above) */
    @media (min-width: 992px) {
        .card-grid {
            grid-template-columns: repeat(3, 1fr); /* 3 columns */
        }
    }

    /* Card Styles */
    .card {
        opacity: 0;
        transform: translateY(20px);
        animation: fadeIn 1s forwards;
        border-radius:50px;
    }

    /* Apply delay between cards for a cascading effect */
    .card:nth-child(1) {
        animation-delay: 0.2s;
    }
    .card:nth-child(2) {
        animation-delay: 0.4s;
    }
    .card:nth-child(3) {
        animation-delay: 0.6s;
    }
    .card:nth-child(4) {
        animation-delay: 0.8s;
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    /* Background Image */
    .card-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        z-index: 1;
        filter: brightness(70%);
    }

    /* Content Overlay */
    .card-content {
        position: absolute;
        bottom: 20px;
        left: 20px;
        z-index: 2;
        color: white;
    }

    .card-title {
        font-size: 24px;
        font-weight: 600;
        margin: 0;
    }

    .card-description {
        font-size: 14px;
        margin-top: 5px;
    }


    .bg-darkblue-800 {
    background-color: #1E3A8A; /* Adjust this value to match your design */
  }
  .bg-darkblue-700 {
    background-color: #1E40AF; /* Adjust this value to match your design */
  }
  .text-orange-500 {
    color: #FBBF24; /* Adjust this value to match your design */
  }
    </style>
</head>
<body class="bg-gray-100   flex-col">

<nav class="bg-gray-800" style="background:darkblue">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only">Open main menu</span>
          <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center mt-3">
          <img class="h-12 w-auto" src="/images/iLab white Logo-01.png" alt="Your Company" style="max-width:250px;height:170px">
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <!-- <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a> -->
            <div class="relative" x-data="{ open: false }">
    <!-- <button type="button" class="inline-flex items-center gap-x-1 text-sm font-semibold text-gray-900" @click="open = !open" aria-expanded="open">
        <span style="color:white" class="py-2">Solutions</span>
        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="color:white">
        <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
        </svg>
    </button> -->

  <div x-show="open" @click.away="open = false" class="absolute left-1/2 z-10 mt-5 flex w-screen max-w-max -translate-x-1/2 px-4">
    <div class="w-screen max-w-md flex-auto overflow-hidden rounded-3xl bg-white text-sm shadow-lg ring-1 ring-gray-900/5">
      <div class="p-4">
        <div class="group relative flex gap-x-6 rounded-lg p-4 hover:bg-gray-50">
          <div class="mt-1 flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
            <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
            </svg>
          </div>
          <div>
            <a href="#" class="font-semibold text-gray-900">
              Analytics
              <span class="absolute inset-0"></span>
            </a>
            <p class="mt-1 text-gray-600">Get a better understanding of your traffic</p>
          </div>
        </div>
        <!-- Repeat for other menu items... -->
      </div>
      <div class="grid grid-cols-2 divide-x divide-gray-900/5 bg-gray-50">
        <a href="#" class="flex items-center justify-center gap-x-2.5 p-3 font-semibold text-gray-900 hover:bg-gray-100">
          <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm6.39-2.908a.75.75 0 0 1 .766.027l3.5 2.25a.75.75 0 0 1 0 1.262l-3.5 2.25A.75.75 0 0 1 8 12.25v-4.5a.75.75 0 0 1 .39-.658Z" clip-rule="evenodd" />
          </svg>
          Watch demo
        </a>
        <a href="#" class="flex items-center justify-center gap-x-2.5 p-3 font-semibold text-gray-900 hover:bg-gray-100">
          <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 0 1 3.5 2h1.148a1.5 1.5 0 0 1 1.465 1.175l.716 3.223a1.5 1.5 0 0 1-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 0 0 6.254 6.254c.395.163.833-.07..."/>
          </svg>
          Get started
        </a>
      </div>
    </div>
  </div>
</div>



          </div>
        </div>
      </div>
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0 mb-2">



                    <a href="/login" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white"><strong>Login</strong></a>



                </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="sm:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
      <a href="/" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white" aria-current="page">Home</a>
      <a href="/login" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Login</a>
    </div>
  </div>
</nav>
<div class="relative isolate flex items-center gap-x-6 overflow-hidden bg-gray-50 px-6 py-2.5 sm:px-3.5">
  <div class="absolute left-0 top-1/2 -translate-y-1/2 transform-gpu blur-2xl" aria-hidden="true">
    <div class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)"></div>
  </div>

  <div class="flex flex-1 flex-wrap justify-center items-center gap-x-4 gap-y-2">
    <p class="text-sm/6 text-gray-900 bg-green-100 p-2 rounded">
      <strong class="font-semibold">Notice:</strong>
      <svg viewBox="0 0 2 2" class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true">
        <circle cx="1" cy="1" r="1" />
      </svg>
      <span id="notice-text"></span> <!-- Placeholder for dynamic notice content -->
    </p>
    <a id="details-link" href="#" class="flex-none rounded-full bg-gray-900 px-3.5 py-1 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-900">
      View Details <span aria-hidden="true">&rarr;</span>
    </a>
    <div class="flex flex-1 justify-end">
      <button type="button" class="-m-3 p-3 focus-visible:outline-offset-[-4px]" onclick="dismissNotice()">
        <span class="sr-only">Dismiss</span>
        <svg class="h-5 w-5 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
        </svg>
      </button>
    </div>
  </div>
</div>




<div class="bg-gray-50 py-24 sm:py-3">

  <div class="mx-auto max-w-2xl px-6 lg:max-w-7xl lg:px-8">
    <div class="grid gap-4 sm:mt-16 lg:grid-cols-3 ">

    <div class="p-6">
    <h2 class="text-2xl font-bold text-blue-600 mb-4">IlabAfrica Systems</h2> <!-- Title -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
  <a href="https://shaba.strathmore.edu/" class="flex items-center p-4 bg-darkblue-800 rounded-lg shadow-md hover:bg-darkblue-700 transition duration-200">
    <span class="text-orange-500">  <span class="text-lg mr-2">🏨</span> <!-- Room emoji for room booking -->
Room Bookings</span>
  </a>
  <a href="https://sabuk.strathmore.edu/" class="flex items-center p-4 bg-darkblue-800 rounded-lg shadow-md hover:bg-darkblue-700 transition duration-200">

    <span class="text-orange-500">    <span class="text-lg mr-2">📝</span> <!-- Notepad emoji for feedback -->Feedback System</span>
  </a>
  <a href="https://support.ilabafrica.ac.ke" class="flex items-center p-4 bg-darkblue-800 rounded-lg shadow-md hover:bg-darkblue-700 transition duration-200">
    <span class="text-orange-500">    <span class="text-lg mr-2">🎟️</span> <!-- Ticket emoji for ticketing system -->Ticketing System</span>
  </a>
  <a href="https://pnc-pm.strathmore.edu/" class="flex items-center p-4 bg-darkblue-800 rounded-lg shadow-md hover:bg-darkblue-700 transition duration-200">

    <span class="text-orange-500">    <span class="text-lg mr-2">📊</span> <!-- Bar chart emoji for performance evaluation -->Performance Evaluation</span>
  </a>
  <a href="http://tsavo.strathmore.edu/login" class="flex items-center p-4 bg-darkblue-800 rounded-lg shadow-md hover:bg-darkblue-700 transition duration-200">

    <span class="text-orange-500">    <span class="text-lg mr-2">📦</span> <!-- Package emoji for inventory -->Inventory System</span>
  </a>
  <a href="https://ilabafrica.strathmore.edu/" class="flex items-center text-center p-4 bg-darkblue-800 rounded-lg shadow-md hover:bg-darkblue-700 transition duration-200">

    <span class="text-orange-500">    <span class="text-lg mr-2">🌐</span> <!-- Globe emoji for website -->ILab Website</span>
  </a>
  <a href="https://dashboard.strathmore.edu/login" class="flex items-center text-center p-4 bg-darkblue-800 rounded-lg shadow-md hover:bg-darkblue-700 transition duration-200">

    <span class="text-orange-500">    <span class="text-lg mr-2">🌐</span> <!-- Globe emoji for website -->University Dashboard</span>
  </a>

  <a href="https://chaka.strathmore.edu/phonebill/directory" class="flex items-center text-center p-4 bg-darkblue-800 rounded-lg shadow-md hover:bg-darkblue-700 transition duration-200">
    <span class="text-orange-500">
        <span class="text-lg mr-2">📞</span> <!-- Phone emoji for directory -->
        Phone Directory
    </span>
</a>
<a href="https://tudor.strathmore.edu/payroll/d56b699830e77ba53855679cb1d252da/" class="flex items-center text-center p-4 bg-darkblue-800 rounded-lg shadow-md hover:bg-darkblue-700 transition duration-200">
    <span class="text-orange-500">
        <span class="text-lg mr-2">💵</span> <!-- Money emoji for payroll -->
        Payroll
    </span>
</a>
<a href="http://printers.strathmore.edu:8080/" class="flex items-center text-center p-4 bg-darkblue-800 rounded-lg shadow-md hover:bg-darkblue-700 transition duration-200">
    <span class="text-orange-500">
        <span class="text-lg mr-2">🖨️</span> <!-- Printer emoji for printers -->
        Printers
    </span>
</a>

<a href="https://tudor.strathmore.edu/hrm/symfony/web/index.php/auth/login" class="flex items-center text-center p-4 bg-darkblue-800 rounded-lg shadow-md hover:bg-darkblue-700 transition duration-200">
    <span class="text-orange-500">
        <span class="text-lg mr-2">🧑‍💼</span> <!-- HR emoji for human resources -->
        HR
    </span>
</a>




</div>
    </div>
    <div class="relative max-lg:row-start-1 mt-4">
    <h3 class="text-lg font-semibold text-center ">IlabAfrica Departments</h3>
    <canvas id="statusChart" class="mb-16"></canvas>
    <div class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start">
    <a href="/departments" class="rounded-md px-3.5 py-2.5 text-sm font-semibold text-gray-900 shadow-sm" style="border-radius:30px;background:darkblue;color:white;">Kindly Click to find more about our Departments </a>

    </div>
</div>


<div class="relative lg:row-span-2">
      <div class="p-6">
  <h2 class="text-2xl font-bold text-blue-600 mb-4">Documents</h2> <!-- Title -->
  <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <a href="/reports" class="flex items-center p-4 bg-white  shadow-md hover:bg-gray-100 transition duration-200" >
    <span class="text-lg mr-2">📁</span>
      <span class="text-gray-800">Reports</span>
    </a>
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
  </div>
</div>


    </div>
  </div>

</div>
<div class="container mx-auto relative max-lg:row-start-3 lg:col-start-2 lg:row-start-2 overflow-hidden" style="border-radius:30px;">
  <div id="birthdayCarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
    <div class="carousel-inner">
      @foreach($birthdaysToday->chunk(3) as $index => $chunk)
        <div class="carousel-item @if($index === 0) active @endif">
          <div class="flex flex-wrap justify-center gap-4">
            @foreach($chunk as $birthday)
              <div class="relative flex flex-col my-6 bg-white shadow-sm border border-slate-200 w-96" style="border-radius:30px;">
                <div class="relative h-56 m-2.5 overflow-hidden rounded-lg">
                  <img src="https://images.unsplash.com/photo-1540553016722-983e48a2cd10?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="birthday-image" class="object-cover w-full h-full" style="border-radius:30px;" />
                </div>
                <div class="p-4">
                  <h6 class="mb-2 text-slate-800 text-xl font-semibold">
                    Happy Birthday, {{ $birthday->name }}!
                  </h6>
                  <p class="text-slate-600 leading-normal font-light">
                    Wishing you a fantastic day filled with joy and happiness!
                  </p>
                </div>
                <div class="px-4 pb-4 pt-0 mt-2">
                  <button class="bg-slate-800 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-md hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button" style="width:100%;border-radius:30px;">
                    Send Wishes
                  </button>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      @endforeach
    </div>
    <!-- Carousel controls -->
    <a class="carousel-control-prev" href="#birthdayCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#birthdayCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>


<div class="modal fade" id="welcomeModal" tabindex="-1" role="dialog" aria-labelledby="welcomeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width:800px; width:100%; border-radius:30px;">
    <div class="modal-content">
      <div class="modal-header" style="background-color:darkblue; color: white;">
        <h5 class="modal-title" id="welcomeModalLabel" style="text-align:center;"><strong>Welcome to IlabAfrica</strong></h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center mt-3">
          <img src="/images/LOGO_2.png" alt="IlabAfrica Logo" style="max-width: 100%; height: auto;">
        </div>
        <br>
        <p style="font-size: 18px; color:black;">Thank you for visiting IlabAfrica Intranet! Explore our innovative solutions and services that empower communities through technology and creativity. We're here to help you realize your ideas and make a difference.</p>
      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-primary" data-dismiss="modal" style="background-color: #003399; border-radius:30px; width:100%;">Start Exploring</button>
      </div>
    </div>
  </div>
</div>
</div>


<!-- Footer -->
<footer class=" text-white py-4" style="background:darkblue">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 iLabAfrica. All Rights Reserved.</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="Template/js/owl.carousel.min.js"></script>
<script src="Template/js/script.js"></script>
<script>
    function sendWishes(email, name) {
        // Implement the function to send birthday wishes via email.
        alert('Sending wishes to ' + name + ' at ' + email);
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: [
                @foreach($events as $event)
                {
                    title: '{{ $event->title }}',
                    start: '{{ $event->start_date }}',
                    description: '{{ $event->description }}',
                },
                @endforeach
            ],
            dateClick: function(info) {
                $('#eventTitle').text('Event on ' + info.dateStr);
                $('#eventDescription').text('No events scheduled for this date.');
                $('#eventDate').text(info.dateStr);
                $('#eventModal').css('display', 'block');
            }
        });

        calendar.render();

        // Modal functionality
        var modal = document.getElementById("eventModal");
        var span = document.getElementsByClassName("close")[0];

        span.onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    });
    function sendWishes(email, name) {
    const subject = encodeURIComponent("Wishing you all the best, " + name + "!");
    const body = encodeURIComponent(
        `Hi ${name},\n\n` +
        "I just wanted to take a moment to send my best wishes your way.\n" +
        "Have a fantastic day ahead!\n\n" +
        "Best regards,\n[Your Name]"
    );

    const mailtoLink = `mailto:${email}?subject=${subject}&body=${body}`;

    // Open email client with pre-filled subject and body
    window.location.href = mailtoLink;
}


const ctx2 = document.getElementById('statusChart').getContext('2d');
        const statusChart = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['Internet of Things', 'Cyber Security', 'Data Science', 'Digital Learning', 'Outsourcing & Consulting', 'eHealth', 'Cloud Computing', 'TAI Fintech', 'iBizAfrica Incubation Centre'],
                datasets: [{
                    label: 'Department Distribution',
                    data: [30, 20, 15, 10, 10, 5, 5, 3, 2],
                    backgroundColor: ['#4CAF50', '#FFC107', '#F44336', '#2196F3', '#9C27B0', '#FF9800', '#3F51B5', '#FF5722', '#00BCD4'],
                }]
            }
        });

</script>


<script>
//   $(document).ready(function() {
//     $('#welcomeModal').modal('show');

//     $('.close-modal').on('click', function() {
//         $('#welcomeModal').modal('hide');
//     });
// });


$(document).ready(function(){
  $('#birthdayCarousel').carousel({
    interval: 5000 // Optional: change the interval for automatic sliding
  });
});


</script>


<script>
  // Fetch notices from the PHP backend and convert them into a JavaScript array
  const notices = @json($notices); // Use Blade's json function to convert PHP array to JS array

  let currentIndex = 0;

  function updateNotice() {
    const noticeTextElement = document.getElementById('notice-text');
    const detailsLinkElement = document.getElementById('details-link');

    if (notices.length === 0) {
      noticeTextElement.innerText = "No notices available.";
      detailsLinkElement.href = "#";
      return;
    }

    const currentNotice = notices[currentIndex];

    noticeTextElement.innerText = currentNotice.content;
    detailsLinkElement.href = currentNotice.details_link; // Update link for the current notice

    currentIndex = (currentIndex + 1) % notices.length; // Cycle through notices
  }

  // Function to dismiss the notice
  function dismissNotice() {
    document.getElementById('notice-text').innerText = "";
    document.getElementById('details-link').href = "#";
  }

  // Initial display
  updateNotice();
  setInterval(updateNotice, 5000); // Change notice every 5 seconds
</script>


<!--
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('#welcomeModal').modal('show');
        }, 5000);
    });
</script> -->
</body>
</html>
