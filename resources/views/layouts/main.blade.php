<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary container">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('post.index')}}">Посты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('post.create')}}">Создать пост</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('contact.index')}}">Контакты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about.index')}}">О нас</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="app" class="container">
    @yield('content')
</div>
</body>
</html>
