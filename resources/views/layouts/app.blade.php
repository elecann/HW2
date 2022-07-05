<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond&display=swap" rel="stylesheet">
        <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>
        <script>
            const FOTO="{{url('/')}}/";
            const csrf_token="{{csrf_token() }}"
        </script>
        @yield('css')
        @yield('js')

        
    </head>

    <body>
        <header>
        @yield('header')
        </header>
    @yield('body')

    </body>
</html>