@extends('front.trainsmart.template')
@section('menu')
    @include('front.trainsmart.includes.menu')
@endsection
@section('content')
<div class="row mb-3 header-condiciones">

				

    <div class="col-md-6 col-12 order-2 order-md-1">					

        <h2 class="titulo-seccion">Agenda:</h2>

        <ul class="list-agenda">

            <li>
                <span class="horario">10:00 hs</span> Ingreso participantes
            </li>

            <li>
                <span class="horario">10:05 hs</span> Bienvenida e introducción
                <span  class="nombre">Dra. Yumaira Chacón</span>
            </li>

            <li>
                <span class="horario">10:10 hs</span> Conferencia
                <span  class="nombre">Dr. Julio Motta Pensabene</span>
            </li>

            <li>
                <span class="horario">10:50 hs</span> Preguntas y respuestas
                <span  class="nombre">Dr. Julio Motta Pensabene - Dra. Yumaira Chacón</span>
            </li>

            <li>
                <span class="horario">11:10 hs</span> Cierre
                <span class="nombre">Dra. Yumaira Chacón</span>
            </li>

        </ul>

    </div>

    <div class="col-md-6 col-12 logo-agenda order-1 order-md-2">

        <span class="logo-img">

            <img class="w-100 " src="{{asset('public/assets/trainsmart/img/logo.svg')}}">						

        </span>

        <span class="logo-text">

            <p>Importancia de la Hidratación<br>en el Rendimiento del Deportista</p>						

        </span>

    </div>



</div>


@endsection