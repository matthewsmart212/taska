<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Taska</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <script src="https://kit.fontawesome.com/f4e16f164b.js" crossorigin="anonymous"></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

        <!-- style to tilt task cards when moved between groups -->
        <style>.tilt {transform: rotate(3deg);-moz-transform: rotate(3deg);-webkit-transform: rotate(3deg);}</style>
    </head>
    <body class="font-sans antialiased">

            <aside class="inline-block bg-gray-500 h-screen fixed" style="width:200px;">
                @include('components.sidebar')
            </aside>

            <section class="inline-block" style="width:calc(100% - 200px); margin-left:200px;">
                @include('layouts.navigation')
                @include('components.errors')

                <main class="bg-gray-100 pt-12 px-7" style="min-height: calc(100vh - 58px);">
                    {{ $slot }}
                </main>
            </section>

            <script src="/js/card.js" ></script>
    </body>
</html>
