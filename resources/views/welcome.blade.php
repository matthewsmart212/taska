<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">

        <!-- Scripts -->
        <script src="/js/app.js" defer></script>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script src="http://unpkg.com/turbolinks"></script>
    </head>
    <body class="antialiased">



            @if ($_SERVER['HTTP_HOST'] == "localhost")

                <div class="container mx-auto px-x mt-10" style="width:400px;">
                    <div class="bg-gray-600 rounded-lg text-white p-6">
                        <h1 class="text-xl">Welcome</h1>
                        <form method="POST" action="/register-company">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                            <div class="mt-3">
                                <label>Company Name:
                                    <input type="text" name="company_name" class="mt-2 block rounded-md w-full text-black" required />
                                </label>
                            </div>
                            <div class="mt-3">
                                <label>Your Name:
                                    <input type="text" name="name" class="mt-2 block rounded-md w-full text-black" required />
                                </label>
                            </div>
                            <div class="mt-3">
                                <label>Your Email:
                                    <input type="email" name="email" class="mt-2 block rounded-md w-full text-black" required />
                                </label>
                            </div>
                            <div class="mt-3">
                                <label>Password:
                                    <input type="password" name="password" class="mt-2 block rounded-md w-full text-black" required />
                                </label>
                            </div>
                            <div class="mt-3">
                                <label>Confirm Password:
                                    <input type="password" name="password_confirmation" class="mt-2 block rounded-md w-full text-black" required />
                                </label>
                            </div>
                            <div class="mt-6">
                                <button class="bg-white text-gray-800 p-2">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            @else
                <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                    @if (Route::has('login'))
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif

                    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                        <h1>Welcome to Taska</h1>
                    </div>
                </div>
            @endif

    </body>
</html>
