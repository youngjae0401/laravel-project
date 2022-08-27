<!DOCTYPE html>
<html lang="ko">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
        <link rel="stylesheet" href="{{ asset('css/common.css') }}">
        @stack('css')
    </head>

    <body>
        @include('layouts.header')
        <main>
            @yield('content')
        </main>
        @include('layouts.footer')
        @stack('js')
    </body>
</html>