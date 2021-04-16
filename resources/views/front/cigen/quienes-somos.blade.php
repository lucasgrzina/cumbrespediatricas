@extends('layouts.cigen.front-vue')
@section('head')
<link href="{{ url('/css/cigen/speakers.css') }}" rel="stylesheet" type="text/css">
<style>
  .img-quienes-somos {
    max-width: 100%;
    max-height: 200px;
  }
  .img-quienes-somos-grande {
    max-width: 100%;
    max-height: 400px;

  }
</style>
@endsection
@section('content')
<div class="container">

  <div class="row mt-5 mb-5">

    <div class="col-12">

      <p>Los integrantes del Servicio de Gastroenterología de Clínica CMIC formamos parte organización comprometida con la salud de las personas, orientado a la prevención, diagnóstico precoz y tratamiento de las enfermedades digestivas. Somos un equipo médico, constituido por profesionales con experiencia en Gastroenterología y distintas subespecialidades relacionadas con la misma. Trabajamos continuamente para brindar una prestación médica de calidad. Consideramos que la clave es la integración entre la idoneidad profesional, la vinculación con la docencia y capacitación continua, la inversión y utilización de tecnología de última generación.<br>Para nosotros es prioritaria la aplicación de protocolos de calidad que aseguren la protección, seguridad y respeto de la intimidad del paciente.</p>


      <div class="text-center">
      <p><b>Staff Servicio de Gastroenterología Clínica CMIC<br>(Neuquén – Patagonia – Argentina)</b></p>
      
        <img src="{{asset('img/cigen/quienes-somos/IMG_10.jpg')}}" class="img-quienes-somos-grande">
      </div>
      
      
      <h4>Jefe de Servicio</h4>

      <img src="{{asset('img/cigen/quienes-somos/IMG_3.jpg')}}" class="img-quienes-somos">
      <p><b>Dr Esteves Sebastián</b> <br>Gastroenterología Clínica – Endoscopia Digestiva Diagnóstica y Terapéutica – Ecoendoscopia – Colangiografia Retrograda Endoscopica.</p>
      
    </div>



    <div class="col-md-12">

      <h4>Staff Médico</h4>

    </div>



    <div class="col-md-4">
      <img src="{{asset('img/cigen/quienes-somos/IMG_1.jpg')}}" class="img-quienes-somos">
      <p><b>Alarcón Guillermo</b><br>Gastroenterología Infantil – Endoscopia Digestiva Infantil</p>
    </div>

    <div class="col-md-4">
      <img src="{{asset('img/cigen/quienes-somos/IMG_2.jpg')}}" class="img-quienes-somos">
      <p><b>Dr Barril Sergio</b><br>Gastroenterología Clínica – Endoscopia Digestiva – Estudios Funcionales</p>
    </div>

    <div class="col-md-4">
      <img src="{{asset('img/cigen/quienes-somos/IMG_6.jpg')}}" class="img-quienes-somos">
      <p><b>Dra Chiappero Ana Laura</b><br>Gastroenterología Clínica – Endoscopia Digestiva – Videoendoscápsula</p>
    </div>

    <div class="col-md-4">
      <img src="{{asset('img/cigen/quienes-somos/IMG_7.jpg')}}" class="img-quienes-somos">
      <p><b>Dra Espiñeira Silvina</b><br>Gastroenterología Clínica– Estudios Funcionales</p>
    </div>

    <div class="col-md-4">
      <img src="{{asset('img/cigen/quienes-somos/IMG_4.jpg')}}" class="img-quienes-somos">
      <p><b>Dr Lamot Juan Manuel</b><br>Cirujano – Endoscopia Digestiva – Intervencionismo Percutáneo</p>
    </div>

    <div class="col-md-4">
      <!--img src="{{asset('img/cigen/quienes-somos/IMG_111.jpg')}}" class="img-quienes-somos"-->
      <p><b>Dra Masci Evelina</b><br>Médica Clínica – Soporte Nutricional y Enfermedades Malabsortivas</p>
    </div>

    <div class="col-md-4">
      <img src="{{asset('img/cigen/quienes-somos/IMG_8.jpg')}}" class="img-quienes-somos">
      <p><b>Dra Martínez Emiliana</b><br>Gastroenterología Clínica – Endoscopia Digestiva – Ecoendoscopia</p>
    </div>

    <div class="col-md-4">
      <img src="{{asset('img/cigen/quienes-somos/IMG_9.jpg')}}" class="img-quienes-somos">
      <p><b>Dra Moretti Norma</b><br>Gastroenterología Clínica – Endoscopia Digestiva</p>
    </div>

    <div class="col-md-4">
      <img src="{{asset('img/cigen/quienes-somos/IMG_5.jpg')}}" class="img-quienes-somos">
      <p><b>Dr Sánchez Andrés</b><br>Gastroenterología Clínica – Endoscopia Digestiva</p>
    </div>



    <div class="col-md-12">
      <h4>Unidad de Endoscopia Digestiva</h4>
      <ul>

        <li>Video Endoscopia Digestiva Alta Diagnóstica y Terapéutica</li>

        <li>Videocolonoscopia Diagnóstica y Terapéutica</li>

        <li>Colangiografia Retrograda Endoscópica</li>

        <li>Ecoendoscopia Diagnóstica e Intervencionista</li>

        <li>Video Endocápsula</li>

      </ul>



      <h4>Unidad de Estudios Funcionales</h4>



      <ul>

        <li>PH/Impedanciometría</li>

        <li>Manometría de Alta Resolución</li>

        <li>Biofeedback</li>

        <li>Test de Intolerancia a Lactosa y Fructosa</li>

        <li>Test de Sobrecrecimiento Bacteriano (SIBO).</li>

      </ul>



      <p><b>Unidad Multidisciplinaria de Enfermedad Inflamatoria Intestinal</b></p>



      <p><b>Unidad Multidisciplinaria de Oncología Digestiva</b></p>





    </div>


    <div class="col-md-12">
      <iframe src="https://player.vimeo.com/video/536530206" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>      
    </div>
  </div>

</div>
@endsection