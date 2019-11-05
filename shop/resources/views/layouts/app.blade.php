<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KNStore</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        body {
            background-image: url("/admin/dist/img/background.jpg");
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="text-center">
            <img src="/admin/dist/img/logo.png" alt="KNStore" style="max-height: 250px;">
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
