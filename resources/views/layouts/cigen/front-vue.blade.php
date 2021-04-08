<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!--meta http-equiv="ScreenOrientation" content="autoRotate:disabled"-->
        <!--meta http-equiv="x-ua-compatible" content="IE=9" -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--link rel="icon" type="image/png" href="public/img/forosas/favicon-16x16.png" sizes="16x16"-->

        <!--link rel="icon" type="image/png" href="public/img/forosas/favicon-32x32.png" sizes="32x32"-->
        
        <link rel="icon" type="image/vnd.microsoft.icon" href="public/favicon.ico">
        <title>Cigen</title>

        <link href="{{ url(mix('/css/cigen.css')) }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
        <!-- Minified version of `es6-promise-auto` below. -->
        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
        <script src="https://player.vimeo.com/api/player.js"></script>
        <script>
            window.App = {!! json_encode([
            ]) !!};
        </script>   
        <link rel="shortcut icon" href="public/favicon.ico">
        @yield('head')
      
    </head>
    <body id="body">
        <header>

            <div class="content-title">
      
              <div class="container">
      
                <div class="row info-content">
      
                  <div class="col-md col-12">
      
                    <div class="row height-row-header">
      
                      <div class="col-md-12">
      
                        <?php if(isset($headerData) && $headerData): ?>
      
                          <button class="btn btn-secondary btn-evento-virtual">Evento Virtual</button>
      
                        <?php else: ?>
      
                          <div class="line-header"></div>
      
                        <?php endif; ?>
      
                      </div>
      
                    </div>
      
      
      
                    <div class="row">
      
                      <div class="col-md-12">
      
                        <h1><?php echo($title);?></h1>
      
                      </div>
      
                    </div>
      
                    
      
                  </div>
      
                  <?php if((isset($headerData) && $headerData) || isset($fechaEventoData)): ?>
      
                  <div class="col-md col-12">
      
                    
      
                    <div class="row height-100">
      
                      <div class="col-md-12">
      
                        <div class="center-date float-md-right float-left">
      
                          <ul class="list-dates">
                            @if(!isset($fechaEventoData) || (isset($fechaEventoData) && $fechaEventoData == 'viernes'))
                            <li>
      
                              <div class="date-info ">
      
                                <div class="icon">
          
                                  <img src="img/cigen/date.svg">
          
                                </div>
          
                                <div class="text">
          
                                  <p><b>Viernes 16 ABRIL</b><br>14.00 A 19.30hs</p>
          
                                </div>
      
                              </div>
      
                            </li>
                            @endif
                            @if(!isset($fechaEventoData) || (isset($fechaEventoData) && $fechaEventoData == 'sabado'))
                            <li>
      
                              <div class="date-info ">
      
                                <div class="icon">
          
                                  <img src="img/cigen/date.svg">
          
                                </div>
          
                                <div class="text">
          
                                  <p><b>Sábado 17 ABRIL</b><br>10.00 A 14.30hs</p>
          
                                </div>
      
                              </div>
      
                            </li>
                            @endif
                          </ul>
      
                        </div>
      
      
      
                      </div>
      
                    </div>
      
                  </div>
      
                  <?php endif; ?>
      
                  
      
                </div>
      
              
      
              <div class="background-image"></div>
      
            </div>
      
        </header>  
          @if(\Auth::guard('web')->check())
          <div class="container">
            <div class="menu-header">
              <div class="row ">
                <div class="col-lg-3 col-md-4 col-6 mb-2"><a class="btn btn-tertiary" href="/vivo">transmisión en vivo</a></div>
                <div class="col-lg-3 col-md-4 col-6 mb-2"><a class="btn btn-tertiary" href="/quienes-somos">¿Quiénes somos?</a></div>
                <div class="col-lg-3 col-md-4 col-6 mb-2"><a class="btn btn-tertiary" href="/agenda-viernes">agenda viernes</a></div>
                <div class="col-lg-3 col-md-4 col-6 mb-2"><a class="btn btn-tertiary" href="/agenda-sabado">agenda sábado</a></div>
                <div class="col-lg-3 col-md-4 col-6 mb-2"><a class="btn btn-tertiary" href="/speakers-nacionales">speakers nacionales</a></div>
                <div class="col-lg-3 col-md-4 col-6 mb-2"><a class="btn btn-tertiary" href="/speakers-internacionales">speakers internacionales</a></div>
                <div class="col-lg-3 col-md-4 col-6 mb-2"><a class="btn btn-tertiary" href="/eventos-previos">eventos previos</a></div>
                <div class="col-lg-3 col-md-4 col-6 mb-2"><a class="btn btn-tertiary" href="/sponsors">sponsors</a></div>
              </div>
            </div>
          </div>                
          @endif
        <!--div id="app" v-cloak-->
            <main id="app" v-cloak>
                <section>
                    @yield('content')
                </section>
            </main>
        <!--/div-->
        <footer>
          <div class="container">
            <div class="row ">
                  <div class="col-md-4 info-content">
                    <p>VII Curso Internacional de Gastroenterología y Endoscopía Digestiva. <b>CIGEN 2021</b></p>
                  </div>
        
                  <div class="col-md-4 info-logos">
                    <p class="organizan"><b>Organiza: Servicio de Gastroenterología - Clinica Cmic - Neuquén - Patagonia - Argentina</b></p>
                  </div>
                  <div class="col-md-4 info-logos">
                    <p class="auspicia"><b style="color: #666666;">Auspicia</b></p>
                    <ul class="content-logos">
                      <li><img src="img/cigen/cmic.png?1" style="max-height: 80px;"></li>
                      <li><img src="img/cigen/griensu.png" style="max-height: 50px;margin-top: 15px;"></li>
                      <li><img src="img/cigen/fujifilm.png" style="max-height: 40px;margin-top: 15px;"></li>       		
                      
                    </ul>
                  </div>
            </div>
          </div>
          <div class="background-footer">
            <div class="color-left"></div>
            <div class="color-right"></div>
          </div>
        </footer>   
        <script src="{{ url(mix('/js/cigen.js')) }}"></script>
        
        <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
        
    </body>
</html>