<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">


            <aside class="inline-block bg-gray-500 h-screen fixed" style="width:200px;">

                <div class="bg-gray-700 p-4">
                    <h1 class="text-white">Tasky</h1>
                </div>

                <ul class="p-4 text-gray-200">
                    <li class="mb-2"><a href="/dashboard">Dashboard</a></li>
                    <li><a href="/projects">Projects</a></li>
                </ul>

            </aside>
            <section class="inline-block" style="width:calc(100% - 200px); margin-left:200px;">

                @include('layouts.navigation')

                <main class="bg-gray-100 pt-12 px-7" style="min-height: calc(100vh - 58px);">
                    {{ $slot }}
                </main>

            </section>
    </body>
</html>
