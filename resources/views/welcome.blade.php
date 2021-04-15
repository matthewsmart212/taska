<x-guest-layout>

        @if ($_SERVER['HTTP_HOST'] == "localhost" || $_SERVER['HTTP_HOST'] == "170491f6ce34.ngrok.io")
            @include('landing-pages.central')
        @else
            @php
                header("Location: http://". $_SERVER['HTTP_HOST'] ."/welcome");
                die();
            @endphp
        @endif

</x-guest-layout>
