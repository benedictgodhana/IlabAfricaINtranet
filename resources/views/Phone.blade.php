<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

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

        body {
            background-color: #f5f5f5;
            margin: 0;
            overflow: hidden;
        }

        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 340px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: transform 0.3s ease-in-out;
            color: white;
        }

        .main-content {
            margin-left: 340px;
            padding: 1rem;
            overflow-y: auto;
            transition: margin-left 0.3s ease;
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
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex">

        <!-- Sidebar -->
        <aside id="sidebar" class="bg-blue-800">
            <div class="p-6 sidebar-logo">
                <img src="/images/iLab white vertical small Logo-01.png" style="height:250px;width:100%" alt="App Logo">
            </div>

            <div class="p-6 sidebar-logo">
                <img src="/images/33941-removebg-preview.png" style="height:240px" alt="App Logo">
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 bg-gray-100 relative main-content">
            <button class="toggle-button" id="sidebarCollapse">
                <span class="fa fa-bars"></span>
            </button>

            <!-- Page Content -->
            <main class="p-9 mt-16">
            <div class="filter-container">

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
<a href="https://chaka.strathmore.edu/phonebill/directory" class="ml-4 px-6 py-2 border-2 border-blue-600 text-blue-600 font-semibold rounded-lg shadow-md hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
    Go to Strathmore Phone Directory
</a>


</div>



    <!-- Phone Directory Table -->
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
</main>
        </div>
    </div>

    <!-- Sidebar Toggle Script -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleButton = document.getElementById('sidebarCollapse');
        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

        // Search and Filter Functionality
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
    </script>



</body>
</html>
