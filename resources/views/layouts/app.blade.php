<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

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

        <style>

            .tilt {
                transform: rotate(3deg);
                -moz-transform: rotate(3deg);
                -webkit-transform: rotate(3deg);
            }

        </style>
    </head>
    <body class="font-sans antialiased">


            <aside class="inline-block bg-gray-500 h-screen fixed" style="width:200px;">

                <div class="bg-gray-700 p-4">
                    <h1 class="text-white">Tasky</h1>
                </div>

                <ul class="p-4 text-gray-200">
                    <li class="mb-4 mt-4 block"><a href="/dashboard"><i class="fas fa-home mr-2"></i> Dashboard</a></li>
                    <li class="mb-4 mt-4 block"><a href="/projects"><i class="fas fa-th-list mr-2"></i> Projects</a></li>
                </ul>

            </aside>
            <section class="inline-block" style="width:calc(100% - 200px); margin-left:200px;">

                @include('layouts.navigation')

                @if (session('errors'))
                    <div class="bg-red-400 fixed bottom-5 right-0 text-white p-4">
                        {{ session('errors') }}
                    </div>
                @endif

                <main class="bg-gray-100 pt-12 px-7" style="min-height: calc(100vh - 58px);">
                    {{ $slot }}
                </main>

            </section>

            <script>
                $(onPageLoad);

                function onPageLoad()
                {
                    $( ".column" ).sortable({
                        connectWith: ".column",
                        handle: ".portlet-header",
                        start: function (event, ui) {
                            ui.item.addClass('tilt');
                            console.log('moving');
                        },
                        stop: function (event, ui) {
                            ui.item.removeClass('tilt');
                            console.log('moved');
                        }
                    });
                }

                $('.create-new-group').click(function(){
                    $(this).next().show();
                });
            </script>
    </body>
</html>
