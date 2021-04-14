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
        <link rel="stylesheet" href="/css/app.css">

        <!-- Scripts -->
        <script src="/js/app.js" defer></script>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script src="http://unpkg.com/turbolinks"></script>

        <!-- style to tilt task cards when moved between groups -->
        <style>.tilt {transform: rotate(3deg);-moz-transform: rotate(3deg);-webkit-transform: rotate(3deg);}</style>

        <style>
            .search-bar {
                position: relative;
            }

            .search-bar.active .input-text {
                max-width: 100%;
                border: 1px solid #ccc;
                background: #eee;
            }

            .search-bar .icon {
                cursor: pointer;
                position: absolute;
                top: 47%;
                left: 0;
                transform: translateY(-50%);
                padding: 13px 15px 13px 11px;
            }

            .search-bar .input-text {
                max-width: 0;
                border: 0;
                border-color: #ccc;
                height: 20px;
                padding: 15px 6px 15px 35px;
                -webkit-transition: all 0.4s ease-in-out;
                transition: all 0.4s ease-in-out;
            }
        </style>
    </head>
    <body class="font-sans antialiased">

            <aside class="inline-block bg-gray-500 h-screen fixed" style="width:50px;z-index:1000000000000;">
                @include('components.sidebar')
            </aside>

            <section class="inline-block" style="width:calc(100% - 50px); margin-left:50px;">
                @include('layouts.navigation')
                @include('components.errors')

                    {{ $slot }}

            </section>

            <script src="/js/card.js" ></script>

    </body>
</html>
