<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Modal styling */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1000; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.5); /* Black w/ opacity */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
            max-width: 600px; /* Set a max width for larger screens */
        }
    </style>
</head>

<body class="bg-gray-100">

    <!-- Main Content -->
    <main class="container mx-auto my-8 px-4">

        <!-- Breadcrumb Navigation -->
        <header class="breadcrumb-container mb-6">
            <nav class="text-sm text-gray-600">
                <a href="/" class="text-blue-500 hover:underline">Home</a> / <span>Department Dashboard</span>
            </nav>
        </header>

        <div class="flex flex-col lg:flex-row">
            <!-- Left Department Cards -->
            <section class="w-full lg:w-1/2 p-3">
                <div class="grid grid-cols-1 gap-4">
                    <!-- Department Card 1 -->
                    <div class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-shadow duration-300 cursor-pointer department-card" data-department="Internet of Things">
                        <h3 class="font-semibold flex items-center">
                            <i class="fas fa-wifi mr-2"></i>Internet of Things
                        </h3>
                        <p>click to see details about Internet of Things.</p>
                    </div>
                    <!-- Department Card 2 -->
                    <div class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-shadow duration-300 cursor-pointer department-card" data-department="Cyber Security">
                        <h3 class="font-semibold flex items-center">
                            <i class="fas fa-lock mr-2"></i>Cyber Security
                        </h3>
                        <p>click to see details about Cyber Security.</p>
                    </div>
                    <!-- Department Card 3 -->
                    <div class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-shadow duration-300 cursor-pointer department-card" data-department="Data Science">
                        <h3 class="font-semibold flex items-center">
                            <i class="fas fa-database mr-2"></i>Data Science
                        </h3>
                        <p>click to see details about Data Science.</p>
                    </div>
                    <!-- Department Card 4 -->
                    <div class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-shadow duration-300 cursor-pointer department-card" data-department="Digital Learning">
                        <h3 class="font-semibold flex items-center">
                            <i class="fas fa-laptop-code mr-2"></i>Digital Learning
                        </h3>
                        <p>click to see details about Digital Learning.</p>
                    </div>
                    <!-- Department Card 5 -->
                    <div class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-shadow duration-300 cursor-pointer department-card" data-department="Outsourcing & Consulting">
                        <h3 class="font-semibold flex items-center">
                            <i class="fas fa-cogs mr-2"></i>Outsourcing & Consulting
                        </h3>
                        <p>click to see  details about Outsourcing & Consulting.</p>
                    </div>
                </div>
            </section>

            <!-- Right Department Cards -->
            <section class="w-full lg:w-1/2 p-3">
                <div class="grid grid-cols-1 gap-4">
                    <!-- Department Card 1 -->
                    <div class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-shadow duration-300 cursor-pointer department-card" data-department="eHealth">
                        <h3 class="font-semibold flex items-center">
                            <i class="fas fa-hospital mr-2"></i>eHealth
                        </h3>
                        <p>click to see details about eHealth.</p>
                    </div>
                    <!-- Department Card 2 -->
                    <div class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-shadow duration-300 cursor-pointer department-card" data-department="Cloud Computing">
                        <h3 class="font-semibold flex items-center">
                            <i class="fas fa-cloud mr-2"></i>Cloud Computing
                        </h3>
                        <p>click to see details about Cloud Computing.</p>
                    </div>
                    <!-- Department Card 3 -->
                    <div class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-shadow duration-300 cursor-pointer department-card" data-department="TAI Fintech">
                        <h3 class="font-semibold flex items-center">
                            <i class="fas fa-money-bill-wave mr-2"></i>TAI Fintech
                        </h3>
                        <p>click to see  details about TAI Fintech.</p>
                    </div>
                    <!-- Department Card 4 -->
                    <div class="bg-white shadow-lg rounded-lg p-4 hover:shadow-xl transition-shadow duration-300 cursor-pointer department-card" data-department="iBizAfrica Incubation Centre">
                        <h3 class="font-semibold flex items-center">
                            <i class="fas fa-briefcase mr-2"></i>@iBizAfrica Incubation Centre
                        </h3>
                        <p>click to see  details about iBizAfrica Incubation Centre.</p>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <!-- Modal -->
    <div id="departmentModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="modalTitle" class="text-xl font-semibold"></h2>
            <img id="modalImage" src="" alt="Department Image" class="mt-4 mb-4 w-1/3 mx-auto rounded-lg hidden"> <!-- Adjusted width -->
            <p id="modalDescription"></p>
        </div>
    </div>

    <script>
        // Department descriptions
        const departmentInfo = {
            "Internet of Things": {
                description: "This department works on connecting various devices to the internet to enable them to communicate and exchange data. Projects may include smart home technologies, wearable devices, and industrial IoT applications.",
                image: "/images/happy-businesswoman-reaching-hand-handshake.jpg" // Add appropriate image URL
            },
            "Cyber Security": {
                description: "The Cyber Security department is responsible for protecting systems, networks, and data from cyber threats, including risk assessment, security policy development, and incident response.",
                image: "path/to/cyber-security-image.jpg" // Add appropriate image URL
            },
            "Data Science": {
                description: "Data Science involves using statistical methods, algorithms, and machine learning techniques to analyze and interpret complex data for data-driven solutions.",
                image: "path/to/data-science-image.jpg" // Add appropriate image URL
            },
            "Digital Learning": {
                description: "The Digital Learning department enhances education through technology, developing online courses, e-learning platforms, and digital resources.",
                image: "path/to/digital-learning-image.jpg" // Add appropriate image URL
            },
            "Outsourcing & Consulting": {
                description: "This department provides consulting services and outsourcing solutions, advising clients on strategic decisions and managing outsourced functions.",
                image: "path/to/outsourcing-image.jpg" // Add appropriate image URL
            },
            "eHealth": {
                description: "The eHealth department works on integrating technology into healthcare services, including telemedicine and electronic health records.",
                image: "path/to/ehealth-image.jpg" // Add appropriate image URL
            },
            "Cloud Computing": {
                description: "Cloud Computing involves delivering computing services over the internet, focusing on cloud architecture and management for business scalability.",
                image: "path/to/cloud-computing-image.jpg" // Add appropriate image URL
            },
            "TAI Fintech": {
                description: "TAI Fintech focuses on financial technologies that enhance and automate the delivery of financial services, improving financial inclusion.",
                image: "path/to/tai-fintech-image.jpg" // Add appropriate image URL
            },
            "iBizAfrica Incubation Centre": {
                description: "The iBizAfrica Incubation Centre supports startups by providing resources like mentorship, networking opportunities, and access to funding.",
                image: "path/to/ibizafrica-image.jpg" // Add appropriate image URL
            },
        };

        // Get modal elements
        const modal = document.getElementById("departmentModal");
        const modalTitle = document.getElementById("modalTitle");
        const modalDescription = document.getElementById("modalDescription");
        const modalImage = document.getElementById("modalImage");
        const closeModal = document.querySelector(".close");

        // Event listener for department cards
        document.querySelectorAll('.department-card').forEach(card => {
            card.addEventListener('click', () => {
                const department = card.getAttribute('data-department');
                const info = departmentInfo[department];
                modalTitle.textContent = department;
                modalDescription.textContent = info.description;
                modalImage.src = info.image; // Set the image source
                modalImage.classList.remove("hidden"); // Show the image
                modal.style.display = "block"; // Show modal
            });
        });

        // Close modal when clicking on close button
        closeModal.addEventListener('click', () => {
            modal.style.display = "none";
        });

        // Close modal when clicking outside the modal
        window.addEventListener('click', (event) => {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        });
    </script>
</body>

</html>
