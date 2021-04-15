<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Taska</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;900&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">

        <!-- Scripts -->
        <script src="/js/app.js" defer></script>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script src="http://unpkg.com/turbolinks"></script>
        <style>
            body{
                font-family: 'Nunito Sans', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        @if ($_SERVER['HTTP_HOST'] == "localhost")
            @include('landing-pages.central')
        @else
            @include('landing-pages.tenant')
        @endif
    </body>
</html>
