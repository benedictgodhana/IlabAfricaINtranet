<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iLabAfrica Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
* {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    /* Breadcrumb */
    .breadcrumb-container {
      padding: 10px 0;
    }

    .breadcrumb-container nav {
      font-size: 14px;
      color: #6c757d;
    }

    .breadcrumb-container nav a {
      color: #007bff;
    }


    body {
      background-color: #f4f4f4;
      color: #333;
    }


    </style>

</head>
<body >

<!-- Main Content -->
<main class="container mx-auto my-8 px-4">


<header class="breadcrumb-container">
      <nav>
        <a href="/" style="color:darkblue">Home</a> / <span>Reports</span>
      </nav>
    </header>
    <!-- Report Overview Section -->
    <section class="mb-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Report Overview</h2>
            <p class="text-gray-600">This section provides an overview of the latest iLabAfrica research initiatives, trends, and findings. Explore interactive charts and download detailed reports.</p>
        </div>
    </section>

    <!-- Interactive Charts Section -->
    <section class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Research Funding Distribution</h3>
            <div style="position: relative; ">
                <canvas id="fundingChart" style="height:250px"></canvas>
            </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Project Impact Metrics</h3>
            <div style="position: relative;">
                <canvas id="impactChart"  style="height:250px"></canvas>
            </div>
        </div>
    </section>

    <!-- Downloadable Reports Section -->
    <section class="mb-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Downloadable Reports</h2>
            <ul class="list-disc list-inside text-gray-600">
                <li><a href="/reports/annual_report_2024.pdf" class="text-blue-500 hover:underline">Annual Report 2024</a></li>
                <li><a href="/reports/innovation_report_2024.pdf" class="text-blue-500 hover:underline">Innovation Report 2024</a></li>
                <li><a href="/reports/quarterly_research_q1_2024.pdf" class="text-blue-500 hover:underline">Quarterly Research Report Q1 2024</a></li>
            </ul>
        </div>
    </section>

    <!-- Upload Reports Section -->
    <section class="mb-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Upload Reports and Research Papers</h2>
            <form action="/upload-report" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="report" class="block text-gray-700">Select Report/Paper:</label>
                    <input type="file" id="report" name="report" class="mt-2 block w-full border border-gray-300 p-2 rounded" required>
                </div>
                <button type="submit" class="mt-2 text-white rounded-lg px-6 py-2" style="width:100%; background: darkblue;">Upload</button>
            </form>
        </div>
    </section>
</main>

<!-- Footer -->
<footer class=" text-white py-4" style="background:darkblue">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 iLabAfrica. All Rights Reserved.</p>
    </div>
</footer>

<script>
// Funding Chart
var fundingCtx = document.getElementById('fundingChart').getContext('2d');
var fundingChart = new Chart(fundingCtx, {
    type: 'doughnut',
    data: {
        labels: ['Government', 'Private Sector', 'International', 'Internal Funding'],
        datasets: [{
            data: [30, 25, 20, 25],
            backgroundColor: ['#1c9aee', '#ff8c00', '#4caf50', '#e57373'],
        }]
    },
    options: {
        responsive: false, // Set this to false to prevent resizing
        maintainAspectRatio: false,
    }
});

// Impact Chart
var impactCtx = document.getElementById('impactChart').getContext('2d');
var impactChart = new Chart(impactCtx, {
    type: 'bar',
    data: {
        labels: ['2021', '2022', '2023', '2024'],
        datasets: [{
            label: 'Impact Score',
            data: [70, 85, 95, 100],
            backgroundColor: '#1c9aee',
        }]
    },
    options: {
        responsive: false, // Set this to false to prevent resizing
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

</body>
</html>
