@extends('layouts.cigen.front-vue')
@section('head')
<link href="{{ url('/css/cigen/speakers.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="container">

    <div class="row mt-5 mb-5">

      @for ($i = 1; $i <= 46; $i++)
        <div class="col-md-4 col-lg-3 mb-4">

          <a data-fancybox="gallery" href="img/cigen/eventos-previos-new/IMG_{{$i}}.jpg">

            <div class="image-gallery" style="background-image: url('img/cigen/eventos-previos-new/IMG_{{$i}}.jpg');"></div>

          </a>

        </div>
          
      @endfor

    </div>

  </div>
@endsection