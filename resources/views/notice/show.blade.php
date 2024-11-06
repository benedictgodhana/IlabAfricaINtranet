<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $notice->title }}</title>
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

    <style>
        .transparent-form {
            background-color: rgba(255, 255, 255, 0.8);
            /* White background with 80% opacity */
            padding: 20px;
            /* Add some padding */
            border-radius: 10px;
            /* Optional: Add rounded corners */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            /* Optional: Add shadow for depth */
        }

        .title-wrapper {
            overflow: hidden;
            /* Ensures the text doesn't overflow */
            white-space: nowrap;
            /* Prevents the text from wrapping */
            width: 100%;
            /* Set a width as per your layout */
        }

        .animate-title {
            display: inline-block;
            /* Allows for smooth transitions */
            animation: typing 4s steps(30, end) infinite alternate;
            /* Adjust duration and steps */
            font-variant: all-small-caps;
            /* Ensures text appears in uppercase */
        }

        @keyframes typing {
            from {
                width: 0;
                /* Start with no width */
            }

            to {
                width: 100%;
                /* End with full width */
            }
        }

        @keyframes typing-out {
            from {
                width: 100%;
                /* Start with full width */
            }

            to {
                width: 0;
                /* End with no width */
            }
        }
    </style>



    @vite(['resources/css/app.css', 'resources/js/app.js'])


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
                            <a href="/" class="rounded-md  px-3 py-2 text-sm font-medium text-white mt-16">Home</a>
                            <!-- <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Team</a>
            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a> -->
                            <div class="relative" x-data="{ open: false }">
                                <button type="button" class="inline-flex items-center gap-x-1 text-sm font-semibold text-gray-900" @click="open = !open" aria-expanded="open">
                                    <span style="color:white" class="py-2">Solutions</span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="color:white">
                                        <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                    </svg>
                                </button>

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
                                                    <path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 0 1 3.5 2h1.148a1.5 1.5 0 0 1 1.465 1.175l.716 3.223a1.5 1.5 0 0 1-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 0 0 6.254 6.254c.395.163.833-.07..." />
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
            <p class="text-sm/6 text-gray-900  p-2 rounded">
                <strong class="font-semibold">Notice: {{ \Illuminate\Support\Str::limit(strip_tags($notice->content), 50) }}</strong>
                <svg viewBox="0 0 2 2" class="mx-2 inline h-0.5 w-0.5 fill-current" aria-hidden="true">
                    <circle cx="1" cy="1" r="1" />
                </svg>
                <span id="notice-text"></span> <!-- Placeholder for dynamic notice content -->
            </p>

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





    <div class="bg-white transparent-form">
        <div class="mx-auto max-w-7xl py-24 sm:px-6 sm:py-3 lg:px-8">
            <div class="relative isolate overflow-hidden bg-gray-900 px-6 pt-16 shadow-2xl sm:rounded-3xl sm:px-16 md:pt-24 lg:flex lg:gap-x-20 lg:px-24 lg:pt-0">
                <svg viewBox="0 0 1024 1024" class="absolute left-1/2 top-1/2 -z-10 h-[64rem] w-[64rem] -translate-y-1/2 [mask-image:radial-gradient(closest-side,white,transparent)] sm:left-full sm:-ml-80 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2 lg:translate-y-0" aria-hidden="true">
                    <circle cx="512" cy="512" r="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)" fill-opacity="0.7" />
                    <defs>
                        <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641">
                            <stop stop-color="darkblue" />
                            <stop offset="1" stop-color="#E935C1" />
                        </radialGradient>
                    </defs>
                </svg>
                <div class="mx-auto max-w-md text-center lg:mx-0 lg:flex-auto lg:py-32 lg:text-left">
                    <div class="title-wrapper">
                        <h1 style="color: white; font-size: 3rem;">📢 Notice</h1>
                        <br>

                        <h2 class="text-balance text-3xl font-semibold tracking-tight text-white sm:text-4xl animate-title">
                            {{ strtoupper($notice->title) }}
                        </h2>
                    </div>
                    <p class="mt-6 text-pretty text-lg/8 text-gray-300">{{ \Illuminate\Support\Str::limit(strip_tags($notice->content), 50) }}</p>

                    <p class="mt-6 text-pretty text-lg/8 text-gray-300">
                        Created on {{ \Carbon\Carbon::parse($notice->created_at)->format('F j, Y \a\t h:i A') }}
                    </p>

                </div>

                <div class="transparent-form max-w-2xl mx-auto p-6 rounded-lg shadow-md ">
                    <h2 class="text-2xl font-semibold text-gray-800">Comments</h2>
                    <form action="{{ route('comments.store', $notice->id) }}" method="POST" class="mt-4 transparent-form">
                        @csrf
                        <input type="hidden" name="notice_id" value="{{ $notice->id }}">
                        <input type="text" name="name" class="w-full border rounded-lg p-3 focus:outline-none focus:ring focus:ring-indigo-500" placeholder="Your Name" required>
                        <input type="email" name="email" class="w-full border rounded-lg p-3 mt-2 focus:outline-none focus:ring focus:ring-indigo-500" placeholder="Your Email" required>
                        <textarea name="comment" rows="4" class="w-full border rounded-lg p-3 mt-2 focus:outline-none focus:ring focus:ring-indigo-500" placeholder="Leave a comment..." required></textarea>
                        <button type="submit" class="mt-2  text-white rounded-lg px-6 py-2" style="width:100%;background:darkblue"> <i class="fas fa-paper-plane mr-2"></i> Submit</button>
                    </form>

                    <div class="mt-6">
                        @foreach($comments->take(5) as $comment)
                        <div class="border-b border-gray-200 py-4">
                            <p class="font-semibold text-gray-800">{{ $comment->name }}</p>
                            <p class="text-gray-600">{{ $comment->comment }}</p>
                            <p class="text-gray-500 text-sm">{{ $comment->created_at->diffForHumans() }}</p>

                            <button class="mt-2 text-indigo-600 flex items-center" onclick="toggleReplyForm('reply-form-{{ $comment->id }}')">
                                <i class="fas fa-reply mr-1"></i> Reply
                            </button>
                            <div id="reply-form-{{ $comment->id }}" class="hidden mt-2">
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
                        {{ $comments->links() }} <!-- This generates the pagination links -->
                    </div>
                </div>

            </div>
        </div>
    </div>







    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="Template/js/owl.carousel.min.js"></script>
    <script src="Template/js/script.js"></script>


    </script>



    <script>
        let commentsLoaded = 5;
        const loadMoreBtn = document.getElementById('load-more');

        if (loadMoreBtn) {
            loadMoreBtn.addEventListener('click', function() {
                commentsLoaded += 5;
                const comments = document.querySelectorAll('.border-b');
                for (let i = commentsLoaded - 5; i < commentsLoaded && i < comments.length; i++) {
                    comments[i].classList.remove('hidden');
                }

                if (commentsLoaded >= comments.length) {
                    loadMoreBtn.classList.add('hidden');
                }
            });
        }

        function toggleReplyForm(id) {
            const replyForm = document.getElementById(id);
            replyForm.classList.toggle('hidden');
        }
    </script>


</body>

</html>
