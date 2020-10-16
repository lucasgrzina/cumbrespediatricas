<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--meta http-equiv="ScreenOrientation" content="autoRotate:disabled"-->
        <!--meta http-equiv="x-ua-compatible" content="IE=9" -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--link rel="icon" type="image/png" href="public/img/forosas/favicon-16x16.png" sizes="16x16">

        <link rel="icon" type="image/png" href="public/img/forosas/favicon-32x32.png" sizes="32x32">
        
        <link rel="icon" type="image/vnd.microsoft.icon" href="public/img/forosas/favicon.ico"-->
        <title>Abbott Night</title>

        <link href="{{ url(mix('/css/abbottnight.css')) }}" rel="stylesheet" type="text/css">
        <!-- Minified version of `es6-promise-auto` below. -->
        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
        <script src="https://player.vimeo.com/api/player.js"></script>
        <script>
            window.App = {!! json_encode([
            ]) !!};
        </script>   
        <!--link rel="shortcut icon" href="#" /-->
        @yield('head')
      
    </head>
    <body id="body" class="">
        <div id="app" v-cloak>
            <main>
                @yield('content')
            </main>
        </div>
        <script src="{{ url(mix('/js/abbottnight.js')) }}"></script>
    </body>
</html>