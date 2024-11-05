<!doctype html>
<html lang="en">
<head>
    <title>IlabAfrica Intranet - Forgot Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-cover bg-center min-h-screen flex items-center justify-center p-4"
      style="background-image: url('/images/small-business-worker-analyzing-merchandise-logistics.jpg');">

    <div class="w-full max-w-lg bg-white p-8 md:p-12 rounded-xl shadow-xl">
        <!-- Logo inside the form -->
        <div class="flex justify-center mb-8">
            <img src="/images/LOGO_2.png" alt="Logo" class="w-42 h-32 md:w-60 md:h-60 object-contain">
        </div>

        <h2 class="text-center text-2xl md:text-3xl font-semibold mb-6">Forgot Password</h2>
        <p class="text-center text-gray-600 mb-4">Enter your email address to receive a password reset link.</p>

        <form method="POST" action="{{ route('password.email') }}" onsubmit="showLoader()" class="space-y-6">
            @csrf
            <div class="relative z-0 w-full group">
                <input type="email" name="email" id="email"
                       class="block py-2 px-0 w-full text-sm md:text-base text-gray-900 border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required />
                <label for="email"
                       class="absolute text-sm md:text-base text-gray-500 transform scale-75 top-2 origin-[0] -translate-y-6 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Email
                </label>
                @if ($errors->has('email'))
                    <p class="text-red-500 mt-1 text-xs md:text-sm">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <button type="submit"
                    style="background: darkblue;"
                    class="w-full text-white font-semibold py-2 md:py-3 rounded-lg focus:outline-none focus:ring-4 focus:ring-orange-300">
                Send Password Reset Link
                <div class="loader hidden ml-2 inline-block" id="loader"></div>
            </button>

            <div class="flex justify-between items-center mt-4">
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline text-xs md:text-sm">Back to Login</a>
                <a href="{{ url('/') }}" class="text-blue-600 hover:underline text-xs md:text-sm">Back to Home</a>
            </div>
        </form>
    </div>

    <script>
        // Show loader on form submission
        function showLoader() {
            document.getElementById('loader').classList.remove('hidden');
        }
    </script>
</body>
</html>
