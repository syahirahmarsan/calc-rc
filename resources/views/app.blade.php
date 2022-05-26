<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'RunCloud Calculator') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Icon -->
        <link rel="icon" href="images/runcloud_icon.png" type="image/x-icon" style="border-radius: 50%;">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
        @inertiaHead
    </head>
    <body class="antialiased" style="font-family: 'Montserrat'; color: #ffffff; background-color: #204361; height: 100vh">
        @inertia
        
    </body>
</html>
