<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Laravel') - {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('layouts._header')
        <main class="py-4">
            @include('layouts._message')
            @yield('content')
        </main>
        @include('layouts._footer')
    </div>
    <script src="//cdn.webfont.youziku.com/wwwroot/js/wf/youziku.api.min.js"></script>
    <script>
        $youziku.load('body', '6e22bf1b5634469c9b6ac8ddb521e8c6', 'HaTian-SuiXing');
        $youziku.draw();
    </script>
     @yield('script')
</body>
</html>
