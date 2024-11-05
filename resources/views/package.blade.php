<!doctype html>
<html lang="en">
<head>
    <title>Archer's Tours and Travel - Packages</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font Poppins -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <!-- Other Stylesheets -->
    <link rel="stylesheet" href="{{ asset('Template/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Template/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('Template/css/style.css') }}">

    <style>
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
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background:orange">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="/images/logo_medium_3-removebg-preview.png" alt="Archer's Tours Logo" style="height: 50px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/destination">Destinations</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Packages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blog">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Description Section -->
<div>
    <div class="container mt-16">
        <div class="row">
            <div class="col-md-12 text-center description-text" style="margin-top:33px;text-transform:uppercase">
                <strong style="font-size: 30px; color: #003399;">
                    Explore our amazing packages for trips across {{$tours->name}}!
                </strong>
            </div>
        </div>
    </div>
</div>

<!-- Packages Section -->
<section class="container">
    <div class="card-grid">
        @foreach ($packages as $package)
        <a class="card" href="/package/{{ $package->id }}">
            <div class="background" style="background-image: url('{{ asset('storage/' . $package->image) }}');"></div>
            <div class="content">
                <p class="category">{{ $package->tour->name }}</p>
                <h3 class="heading">{{ $package->name }}</h3>

                <!-- Display the start and end dates -->
                <p class="dates" style="color:orange">
                    <strong>Start Date:</strong> {{ \Carbon\Carbon::parse($package->start_date)->format('F j, Y') }} <br>
                    <strong>End Date:</strong> {{ \Carbon\Carbon::parse($package->end_date)->format('F j, Y') }} <br>
                    <strong>Duration:</strong> {{ $package->duration }} days
                </p>

                <button class="btn btn-secondary" style="border-radius: 30px; margin-top: 20px">Inquire More</button>
            </div>
        </a>
        @endforeach
    </div>
</section>

<br>

<!-- Footer Section -->
<footer class="bg-dark text-light py-5">
    <div class="container">
        <div class="row">
            <!-- Logo and Description -->
            <div class="col-md-4">
                <img src="/images/logo_medium_3-removebg-preview.png" alt="Archer's Tours Logo" style="height: 50px;">
                <p class="mt-3">Archer's Tours and Travel offers the best travel experiences across Africa, where your adventure begins!</p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-4">
                <h5 class="text-light">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="/" class="text-light">Home</a></li>
                    <li><a href="/about.html" class="text-light">About</a></li>
                    <li><a href="/destination" class="text-light">Destinations</a></li>
                    <li><a href="#" class="text-light">Packages</a></li>
                    <li><a href="#" class="text-light">Contact</a></li>
                </ul>
            </div>

            <!-- Contact and Location -->
            <div class="col-md-4">
                <h5 class="text-light">Location & Contact</h5>
                <p>123 Safari Drive, Nairobi, Kenya</p>
                <p>Email: info@archerstours.com</p>
                <p>Phone: +254 712 345 678</p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <p>&copy; 2024 Archer's Tours and Travel. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('Template/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('Template/js/main.js') }}"></script>

<script>
    // Show the modal after 2 seconds
    $(document).ready(function() {
        setTimeout(function() {
            $('#welcomeModal').modal('show');
        }, 2000);
    });

    // Change navbar background on scroll
    window.addEventListener('scroll', function() {
        var navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) { // If scrolled 50px from the top
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>

</body>
</html>
