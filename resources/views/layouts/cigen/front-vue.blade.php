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
      
                  <?php if(isset($headerData) && $headerData): ?>
      
                  <div class="col-md col-12">
      
                    
      
                    <div class="row height-100">
      
                      <div class="col-md-12">
      
                        <div class="center-date float-md-right float-left">
      
                          <ul class="list-dates">
      
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
      
                            <li>
      
                              <div class="date-info ">
      
                            <div class="icon">
      
                              <img src="img/cigen/date.svg">
      
                            </div>
      
                            <div class="text">
      
                              <p><b>Sábado 17 ABRIL</b><br>10.00 A 1430hs</p>
      
                            </div>
      
                          </div>
      
                            </li>
      
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
        
                    <div class="col-md-5 info-content">
        
                        <p>VII Curso Internacional de Gastroenterología y Endoscopía Digestiva. <b>CIGEN 2021</b></p>
        
                    </div>
        
        
        
                    <div class="col-md-7 info-logos">
        
                        <ul class="content-logos">
        
                            <li><img src="img/cigen/fujifilm.png"></li>
        
                            <li><img src="img/cigen/griensu.png"></li>
        
                            <li><img src="img/cigen/cmic.png"></li>
        
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
    </body>
</html>