<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>DecoGhor</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Faviicon -->
    <link rel="icon" type="image/png" href="{{ asset('images\favicon.ico') }}" />

    <!-- Main -->
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">

    <!-- Main -->

    <link rel="stylesheet" href="{{ asset('css/custom.css')}}">
    
    <!-- icon-->
    <link href="{{ asset('fonts/themify-icons.css')}}" rel="stylesheet">

    <!-- Google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700;900&display=swap" rel="stylesheet">
</head>
<body>
    <div id="app">
        @yield('content')
    </div>
    <script src="{{ asset('js/app.js')}}" defer></script>
</body>
</html>
