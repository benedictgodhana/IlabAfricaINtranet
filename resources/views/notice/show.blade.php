<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $notice->title }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">


<link rel="stylesheet" href="{{ asset('pacific-main/css/animate.css') }}">
<link rel="stylesheet" href="{{ asset('pacific-main/css/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('pacific-main/css/owl.theme.default.min.css') }}">
<link rel="stylesheet" href="{{ asset('pacific-main/css/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('pacific-main/css/bootstrap-datepicker.css') }}">
<link rel="stylesheet" href="{{ asset('pacific-main/css/jquery.timepicker.css') }}">
<link rel="stylesheet" href="{{ asset('pacific-main/css/flaticon.css') }}">
<link rel="stylesheet" href="{{ asset('pacific-main/css/style.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Custom Styles */
        body {
            background-color: white;
            font-family: 'Poppins', sans-serif;
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding-top: 60px; /* Adjust for fixed navbar */
            max-width: 1500px;
            width:100%;
        }

        .notice-content {
            width: 40%; /* Center the notice content */
            margin-right: 30px;
            position: fixed;
        }

        .comments-container {
            position: fixed;
            right: 20px;
            top: 80px; /* Adjust according to navbar height */
            width: 30%;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .transparent-form {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .comment-box {
            margin-top: 10px;
        }

        .comment-box .name {
            font-weight: bold;
        }

        .comment-box .date {
            color: gray;
            font-size: 0.875rem;
        }

        .reply-button {
            color: #4c6ef5;
            cursor: pointer;
            font-size: 0.875rem;
        }

        .reply-form {
            margin-top: 10px;
            display: none;
        }

        .reply-form textarea {
            width: 100%;
            height: 60px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="w-full bg-white fixed top-0 left-0 shadow-sm ">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <!-- Logo Section -->
            <a href="/" class="mr-4 block py-1.5 text-base font-semibold">
                <img src="/images/LOGO_2.png" alt="Logo" style="height:80px" />
            </a>

            <!-- Nav Links -->
            <div class="lg:block">
                <ul class="flex flex-row items-center gap-6">
                    <li><a href="/" class="text-sm p-1 text-black hover:text-blue-600">Home</a></li>
                    <li><a href="/login" class="text-sm p-1 text-black hover:text-blue-600">Account</a></li>
                    <li><a href="https://chaka.strathmore.edu/phonebill/directory" class="text-sm p-1 text-black hover:text-blue-600">SU PhoneDirectory</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main-container mt-16">
    <div class="notice-content">
    <h1 class="blog-content" style="font-weight:900;font-size:24px">{{ $notice->title }}</h1>
    <br>
    <p class="blog-content">{!! strip_tags($notice->content) !!}</p>
</div>

        <!-- Fixed Comments Section -->
        <div class="comments-container mt-10">
            <h2 class="text-2xl font-semibold text-gray-800">Comments</h2>

            <div class="comment-box">
                @foreach($comments->take(5) as $comment)
                <div class="border-b border-gray-200 py-4">
                    <p class="name">{{ $comment->name }}</p>
                    <p class="text-gray-600">{{ $comment->comment }}</p>
                    <p class="date">{{ $comment->created_at->diffForHumans() }}</p>

                    <button class="reply-button" onclick="toggleReplyForm('reply-form-{{ $comment->id }}')">
                        <i class="fas fa-reply mr-1"></i> Reply
                    </button>
                    <div id="reply-form-{{ $comment->id }}" class="reply-form">
                        <form action="{{ route('comments.store', $notice->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="notice_id" value="{{ $notice->id }}">
                            <input type="text" name="name" class="w-full border rounded-lg p-2 focus:outline-none focus:ring focus:ring-indigo-500" placeholder="Your Name" required>
                            <input type="email" name="email" class="w-full border rounded-lg p-2 mt-2 focus:outline-none focus:ring focus:ring-indigo-500" placeholder="Your Email" required>
                            <textarea name="comment" rows="2" class="w-full border rounded-lg p-2 mt-2 focus:outline-none focus:ring focus:ring-indigo-500" placeholder="Leave a reply..." required></textarea>
                            <button type="submit" class="mt-2 bg-indigo-600 text-white rounded-lg px-4 py-2">Submit Reply</button>
                        </form>
                    </div>
                </div>
                @endforeach
                {{ $comments->links() }}
            </div>

            <form action="{{ route('comments.store', $notice->id) }}" method="POST" class="mt-4 transparent-form">
                @csrf
                <input type="hidden" name="notice_id" value="{{ $notice->id }}">
                <input type="text" name="name" class="w-full border rounded-lg p-3 focus:outline-none focus:ring focus:ring-indigo-500" placeholder="Your Name" required>
                <input type="email" name="email" class="w-full border rounded-lg p-3 mt-2 focus:outline-none focus:ring focus:ring-indigo-500" placeholder="Your Email" required>
                <textarea name="comment" rows="4" class="w-full border rounded-lg p-3 mt-2 focus:outline-none focus:ring focus:ring-indigo-500" placeholder="Leave a comment..." required></textarea>
                <button type="submit" class="mt-2  text-white rounded-lg px-6 py-2" style="width:100%;background:darkblue"> <i class="fas fa-paper-plane mr-2"></i> Submit</button>
            </form>
        </div>
    </div>

    <!-- Sidebar Toggle Script (If needed) -->
    <script>
        function toggleReplyForm(formId) {
            const form = document.getElementById(formId);
            form.classList.toggle('hidden');
        }
    </script>

</body>
</html>
