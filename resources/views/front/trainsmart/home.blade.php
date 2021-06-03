@extends('front.trainsmart.template')
@section('menu')
    @include('front.trainsmart.includes.menu')
@endsection
@section('content')
<div class="row mb-3 pagina-home">

    <div class="titulo-gracias">

        <div class="col-md-6 col-12">					



        </div>

        <div class="col-md-6 col-12">

            <span class="logo-gracias">

                <img class="w-100" src="{{asset('public/assets/trainsmart/img/logo.svg')}}">						

            </span>

        </div>

    </div>

</div>



<div class="row mb-3">

    <div class="col-md-12">

        <div class="card">

            <img class="card-img" src="{{asset('public/assets/trainsmart/img/julio-motta-pensabene.png')}}">

            <h5 class="card-title">Dr. Julio Motta Pensabene, MD, MSc, MBA</h5>

            <p><span>MÉDICO Y CIRUJANO</span><br>Universidad de San Carlos de Guatemala</p>

            <p><span>ESPECIALIDAD EN MEDICINA DEL DEPORTE Y TRAUMATOLOGÍA DEPORTIVA </span>Instituto Politécnico Nacional de México</p>

            <p>Director del Comité Olímpico Guatemalteco</p>

        </div>

    </div>

</div>



<div class="row mb-3">

    <div class="calendario">

        <div class="col-md col-12 fecha">

            <div class="media ">

                <div class="media-left"><img src="{{asset('public/assets/trainsmart/img/calendario.svg')}}"></div>

                <div class="media-body">

                    <span class="dia">10</span>

                    <span class="mes">de junio</span>

                </div>

            </div>

        </div>

        <div class="col-md col-12 divider-col">

            <div class="divider"></div>

        </div>

        <div class="col horario pr-md-0">

            <div class="media ">

                <div class="media-left"><img src="{{asset('public/assets/trainsmart/img/reloj.svg')}}"></div>

                <div class="media-body">

                    <div class="hora"><span class="numero">10:00 hs - </span><span class="texto">CENTROAMÉRICA</span></div>

                    <div class="hora"><span class="numero">11:00 hs - </span><span class="texto">PANAMÁ</span></div>

                    <div class="hora"><span class="numero">12:00 hs - </span><span class="texto">REP. DOMINICANA</span></div>

                </div>

            </div>

        </div>

    </div>

</div>


@endsection