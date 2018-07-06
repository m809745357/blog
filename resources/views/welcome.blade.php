<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="particles-js"></div> 
        <div id="app" v-if="loading" class="flex-center tw-relative tw-h-screen">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('topics.index') }}">Home</a>
                        <a href="{{ route('users.show', auth()->id()) }}">Me</a>
                    @else
                        <a href="{{ route('login') }}">登录</a>
                    @endauth
                </div>
            @endif

            <div class="tw-text-center">
                <div class="title m-b-md text-white">
                    {{ config('app.name', 'Laravel') }}
                </div>

                <div class="links">
                    <a v-for="(link, index) in links" :href="link.url" v-html="link.name"></a>
                </div>
            </div>
        </div>
    <!-- Scripts -->
    <script src="{{ asset('js/home.js') }}" defer></script>
    </body>
</html>
