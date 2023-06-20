<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body id="main-box">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark ">
            @include('partials.navbar')
        </nav>
        <main class="">
            @yield('content')
        </main>
    </div>
    <script>
        document.getElementById('delete-form').addEventListener('submit', function (event) {
            event.preventDefault();
    
    
            if (confirm('Sei sicuro sicuro di eliminare il PROGETTO? Questa azione è irreversibile!')) {
                this.submit();
            }
        });
    </script>
</body>
</html>