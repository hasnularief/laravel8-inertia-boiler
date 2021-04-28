<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="{{ url('plugins/fontawesome/css/all.min.css') }}" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ url(mix('css/app.css')) }}">

        <!-- Scripts -->
        @routes
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
        <script src="{{ url(mix('js/app.js')) }}" defer></script>
        <script>
            window._HOST = "{{url('/')}}";
            const url = (val) => _HOST + val;
        </script>
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
