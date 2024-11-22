<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PhoneDirectory</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body, a, button {
            font-family: 'Poppins', sans-serif;
        }

        .main-content {
            padding: 1rem;
            overflow-y: auto;
            transition: margin-left 0.3s ease;
            margin-top: 40px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 12px;
        }

        th {
            background-color: #f5f5f5;
            color: #333;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table-container {
            overflow-x: auto;
            padding: 20px;
        }

        .filter-container {
            margin-bottom: 1rem;
        }

        .filter-container input {
            padding: 8px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 200px;
        }

        .filter-container select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        nav {
    background-color: #333;
    padding: 1rem;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 10;
}

nav ul {
    display: flex;
    gap: 20px;
    list-style-type: none;
    color: white;
    justify-content: center;
}

nav ul li {
    display: inline-block;
}

nav ul li a {
    color: black;
    text-decoration: none;
    font-size: 16px;
}

nav ul li a:hover {
    color: #ff6600;
}

body {
    margin-top: 70px; /* To prevent content from hiding behind the fixed nav */
}


    </style>
</head>
<body style="background:white">

    <!-- Navigation Bar -->
    <nav class="w-full bg-white fixed top-0 left-0 shadow ">
  <div class="container flex flex-wrap items-center justify-between mx-auto">
    <!-- Logo Section -->
    <a href="/" class="mr-4 block py-1.5 text-base font-semibold">
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
      <a href="https://chaka.strathmore.edu/phonebill/directory" class="text-sm p-1 text-black hover:text-blue-600">SU PhoneDirectory</a>
    </li>
  </ul>
</div>


    <!-- Mobile Menu Button -->

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


    <div class="min-h-screen flex mt-16">
        <!-- Sidebar (If needed, add your sidebar here) -->

        <!-- Main Content -->
        <div class="flex-1 bg-gray-100 relative main-content mt-16">


            <!-- Page Content -->
            <div class="p-9 mt-16">

                <div class="filter-container ms-4 mt-16">
                    <!-- Search Input -->
                    <input type="text" id="searchInput" placeholder="Search by name or extension">

                    <!-- Department Filter -->
                    <select id="departmentFilter">
                        <option value="">Filter by Department</option>
                        @foreach($departments as $department)
                            <option value="{{ $department }}">{{ $department }}</option>
                        @endforeach
                    </select>

                    <!-- Redirect Button -->

                </div>

                <!-- Phone Directory Table Container -->
                <div class="table-container">
                    <table class="border border-gray-300 text-gray-700 bg-white shadow-md rounded-lg" id="dataTable">
                        <thead>
                            <tr class="bg-gray-200">
                                <th>Name</th>
                                <th>Extension</th>
                                <th>Department</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($phones as $phone)
                                <tr>
                                    <td>{{ $phone->name }}</td>
                                    <td>{{ $phone->extension }}</td>
                                    <td>{{ $phone->department }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- Sidebar Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const departmentFilter = document.getElementById('departmentFilter');
    const table = document.getElementById('dataTable').getElementsByTagName('tbody')[0];

    function filterTable() {
        const searchValue = searchInput.value.toLowerCase();
        const departmentValue = departmentFilter.value;

        for (const row of table.rows) {
            const name = row.cells[0].textContent.toLowerCase();
            const extension = row.cells[1].textContent.toLowerCase();
            const department = row.cells[2].textContent;

            const matchesSearch = name.includes(searchValue) || extension.includes(searchValue);
            const matchesDepartment = departmentValue === "" || department === departmentValue;

            row.style.display = matchesSearch && matchesDepartment ? "" : "none";
        }
    }

    searchInput.addEventListener('input', filterTable);
    departmentFilter.addEventListener('change', filterTable);
});

    </script>

</body>
</html>
