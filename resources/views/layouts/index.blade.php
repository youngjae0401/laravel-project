<!DOCTYPE html>
<html lang="ko">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('css')
    </head>

    <body>
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
        @stack('js')
    </body>
</html>