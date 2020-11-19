<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=9">
        <!--meta http-equiv="x-ua-compatible" content="IE=9" -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Derma Talks</title>

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <link href="{{ url(mix('/css/dermatalks.css')) }}" rel="stylesheet" type="text/css">
        <!-- Minified version of `es6-promise-auto` below. -->
        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
        <script>
            window.App = {!! json_encode([
            ]) !!};
        </script>   
        <!--link rel="shortcut icon" href="#" /-->
        @yield('head')
      
    </head>
    <body>
        <div id="app" v-cloak>
            <header></header>           
            <main>
                
                    @yield('content')
                    <img class="derma-logo-1" src="/img/dermatalks/derma-talk.png">
                    <img class="derma-logo-2" src="/img/dermatalks/cosentyx.png">                
            <!--div class="row">
                <div class="col-12">
                    <div class="disc-sitio mt-2">
                        Sitio web optimizado para Navegadores Google Chrome y Firefox (PC/Mac).<br>
                        Se recomienda tener actualizado el sistema operativo a la última actualización.<br>
                        Para una correcta visualización del evento en vivo,  usar el modo pantalla completa y activar el sonido en el reproductor.<br><br>

                        Ante cualquier duda o inconveniente escriba al 0054 9 11 3300 3516 (Whatsapp)
                    </div>
                </div>
            </div-->                    
            </main>
            <footer>
                <div class="line-footer"></div>
                <div class="container">
                   <div class="row info">
                      <div class="col col-content-logo">
                         <div class="row">
                            <div class="col-12">
                               <img class="logo" src="/img/dermatalks/logo.svg">
                               <p class="address"><b>Novartis Argentina S.A.</b><br>Ramallo 1851 - C1429DUC Buenos Aires - Argentina<br>Tel. +54 (11) 4703-7000 / 0800-777-1111</p>
                            </div>
                            <div class="col-12">
                               <p class="last-line">Material para uso exclusivo del profesional. Prohibida su exhibición y/o entrega a pacientes, consumidores y/o al público en general. Fecha de elaboración: Noviembre 2020.</p>
                            </div>
                         </div>
                      </div>
                      <div class="col-lg-3">
                         <div class="content-qr">
                            <p class="text-lg-right">Para acceder a la
                               información del producto,
                               escanee el código QR.
                               También puede solicitarlo
                               al 0800-777-1111
                            </p>
                            <div class="image-qr"><img src="/img/dermatalks/qr.jpg"></div>
                         </div>
                      </div>
                   </div>
                </div>
            </footer>       
        </div>
        <script src="{{ url(mix('/js/dermatalks.js')) }}"></script>
    </body>
</html>