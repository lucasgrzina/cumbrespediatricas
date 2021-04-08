@extends('layouts.cigen.front-vue')
@section('head')
<link href="{{ url('/css/cigen/agenda.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="container container-agenda mb-5">
  <div class="row mb-2">

    <div class="col-lg col-12">

    <img src="img/cigen/agenda-viernes-min.png" style="max-width: 100%;">            

    </div>
  </div>
    <!--div class="row mb-2">

      <div class="col-md-12 ">

        <div class="titulo-agenda">

          <p>MÓDULO 1 - <b>“Profesionalismo y Calidad en Gastroenterología y Endoscopia Digestiva”</b></p>

        </div>              

      </div>

    </div> 

    <div class="row mb-2">

      <div class="col-lg col-12 col-agenda-1 pr-lg-1">

        <div class="hour"><span>14:00 - 14:05</span></div>              

      </div>

      <div class="col-lg col-12 col-agenda-2 pl-lg-1 pr-lg-1">

        <div class="text-agenda text-1"><p>Apertura del curso</p></div>       

      </div>

      <div class="col-lg col-12 col-agenda-3 pl-lg-1">

        <div class="text-agenda text-2"><p>Dr. Esteves Sebastián</p></div>        

      </div>

    </div>

    <div class="row mb-2">

      <div class="col-lg col-12 col-agenda-1 pr-lg-1">

        <div class="hour"><span>14:05 - 14:20</span></div>              

      </div>

      <div class="col-lg col-12 col-agenda-2 pl-lg-1 pr-lg-1">

        <div class="text-agenda text-1"><p>“Profesionalismo Médico”</p></div>       

      </div>

      <div class="col-lg col-12 col-agenda-3 pl-lg-1">

        <div class="text-agenda text-2"><p>Dr. José María Sanguinetti</p></div>        

      </div>

    </div>

    <div class="row mb-2">

      <div class="col-lg col-12 col-agenda-1 pr-lg-1">

        <div class="hour"><span>14:20 - 14:35</span></div>              

      </div>

      <div class="col-lg col-12 col-agenda-2 pl-lg-1 pr-lg-1">

        <div class="text-agenda text-1"><p>De “publicar o desaparecer” A: “leer, revisar, editar y publicar para permanecer</p></div>       

      </div>

      <div class="col-lg col-12 col-agenda-3 pl-lg-1">

        <div class="text-agenda text-2"><p>Dr. Diego Aponte</p></div>        

      </div>

    </div>

    <div class="row mb-2">

      <div class="col-lg col-12 col-agenda-1 pr-lg-1">

        <div class="hour"><span>14:35 - 14:50</span></div>              

      </div>

      <div class="col-lg col-12 col-agenda-2 pl-lg-1 pr-lg-1">

        <div class="text-agenda text-1"><p>Calidad en Endoscopia. Reto para el Siglo 21</p></div>       

      </div>

      <div class="col-lg col-12 col-agenda-3 pl-lg-1">

        <div class="text-agenda text-2"><p>Dr. John Ospina</p></div>        

      </div>

    </div>

    <div class="row mb-2">

      <div class="col-lg col-12 col-agenda-1 pr-lg-1">

        <div class="hour"><span>14:50 - 15:00</span></div>              

      </div>

      <div class="col-lg col-12 col-agenda-4 pl-lg-1">

        <div class="text-agenda text-3"><p>Comentarios - Preguntas y respuestas </p></div>       

      </div>

    </div> 



    <div class="row mb-2">

      <div class="col-lg col-12 col-agenda-1 pr-lg-1">

        <div class="hour"><span>15:00 - 15:20</span></div>              

      </div>

      <div class="col-lg col-12 col-agenda-2 pl-lg-1 pr-lg-1">

        <div class="text-agenda text-1"><p>Calidad en Endoscopia Alta</p></div>       

      </div>

      <div class="col-lg col-12 col-agenda-3 pl-lg-1">

        <div class="text-agenda text-2"><p>Dr. Andrés Donoso</p></div>        

      </div>

    </div> 

    <div class="row mb-2">

      <div class="col-lg col-12 col-agenda-1 pr-lg-1">

        <div class="hour"><span>15:20 - 15:40</span></div>              

      </div>

      <div class="col-lg col-12 col-agenda-2 pl-lg-1 pr-lg-1">

        <div class="text-agenda text-1"><p>Calidad en Colonoscopia</p></div>       

      </div>

      <div class="col-lg col-12 col-agenda-3 pl-lg-1">

        <div class="text-agenda text-2"><p>Dr. Pablo Rodríguez</p></div>        

      </div>

    </div>  

    <div class="row">

      <div class="col-lg col-12 col-agenda-1 pr-lg-1">

        <div class="hour"><span>10:00 - 11:30</span></div>              

      </div>

      <div class="col-lg col-12 col-agenda-4 pl-lg-1">

        <div class="text-agenda text-3"><p>BREAK -  LOOP AUSPICIANTES</p></div>       

      </div>

    </div>           

  </div>



  



  <div class="container container-agenda mb-5">

    <div class="row mb-2">

      <div class="col-md-12 ">

        <div class="titulo-agenda">

          <p>MÓDULO 2 - <b>“Desafíos en Enfermedad Inflamatoria Intestinal”</b></p>

        </div>              

      </div>

    </div> 

    <div class="row mb-2">

      <div class="col-lg col-12 col-agenda-1 pr-lg-1">

        <div class="hour"><span>15:45 - 16:00</span></div>              

      </div>

      <div class="col-lg col-12 col-agenda-2 pl-lg-1 pr-lg-1">

        <div class="text-agenda text-1"><p>El camino al Diagnóstico a la Enfermedad Inflamatoria Intestinal</p></div>       

      </div>

      <div class="col-lg col-12 col-agenda-3 pl-lg-1">

        <div class="text-agenda text-2"><p>Dra. Astrid Rausch</p></div>        

      </div>

    </div> 

    <div class="row mb-2">

      <div class="col-lg col-12 col-agenda-1 pr-lg-1">

        <div class="hour"><span>16:05 - 16:20</span></div>              

      </div>

      <div class="col-lg col-12 col-agenda-2 pl-lg-1 pr-lg-1">

        <div class="text-agenda text-1"><p>¿Cuándo y cómo estudiar el Intestino Delgado en pacientes con EII?</p></div>       

      </div>

      <div class="col-lg col-12 col-agenda-3 pl-lg-1">

        <div class="text-agenda text-2"><p>Dra. Laura Garb</p></div>        

      </div>

    </div> 

    <div class="row mb-2">

      <div class="col-lg col-12 col-agenda-1 pr-lg-1">

        <div class="hour"><span>16:20 - 16:40</span></div>              

      </div>

      <div class="col-lg col-12 col-agenda-2 pl-lg-1 pr-lg-1">

        <div class="text-agenda text-1"><p>Tamizaje de CCR en EII” + 5 min de video </p></div>       

      </div>

      <div class="col-lg col-12 col-agenda-3 pl-lg-1">

        <div class="text-agenda text-2"><p>Dr. Lisandro Pereyra</p></div>        

      </div>

    </div>

    <div class="row mb-2">

      <div class="col-lg col-12 col-agenda-1 pr-lg-1">

        <div class="hour"><span>16:40 - 16:55</span></div>              

      </div>

      <div class="col-lg col-12 col-agenda-2 pl-lg-1 pr-lg-1">

        <div class="text-agenda text-1"><p>El desafio de nutrir correctamente nuestros pacientes con EII </p></div>       

      </div>

      <div class="col-lg col-12 col-agenda-3 pl-lg-1">

        <div class="text-agenda text-2"><p>Dra. Adriana Crivelli</p></div>        

      </div>

    </div> 

    <div class="row mb-2">

      <div class="col-lg col-12 col-agenda-1 pr-lg-1">

        <div class="hour"><span>17:00 - 17:20</span></div>              

      </div>

      <div class="col-lg col-12 col-agenda-2 pl-lg-1 pr-lg-1">

        <div class="text-agenda text-1"><p>Mesalazina en la era de las Terapias Biológicas </p></div>       

      </div>

      <div class="col-lg col-12 col-agenda-3 pl-lg-1">

        <div class="text-agenda text-2"><p>Dr. Gustavo Correa</p></div>        

      </div>

    </div>  

    <div class="row">

      <div class="col-lg col-12 col-agenda-1 pr-lg-1">

        <div class="hour"><span>17:20 - 17:30</span></div>              

      </div>

      <div class="col-lg col-12 col-agenda-4 pl-lg-1">

        <div class="text-agenda text-3"><p>BREAK -  LOOP AUSPICIANTES</p></div>       

      </div>

    </div>  

  </div>



  <div class="container container-agenda mb-5">

    <div class="row mb-2">

      <div class="col-md-12 ">

        <div class="titulo-agenda">

          <p>MÓDULO 3 - <b>“Desafíos en Pancreatología”</b></p>

        </div>              

      </div>

    </div>  

    <div class="row mb-2">

      <div class="col-lg col-12 col-agenda-1 pr-lg-1">

        <div class="hour"><span>17:30 - 17:50</span></div>              

      </div>

      <div class="col-lg col-12 col-agenda-2 pl-lg-1 pr-lg-1">

        <div class="text-agenda text-1"><p>El desafío diagnóstico de la Pancreatitis Crónica en Argentina</p></div>       

      </div>

      <div class="col-lg col-12 col-agenda-3 pl-lg-1">

        <div class="text-agenda text-2"><p>Dr. Juan Ignacio Telechea</p></div>        

      </div>

    </div> 

    <div class="row mb-2">

      <div class="col-lg col-12 col-agenda-1 pr-lg-1">

        <div class="hour"><span>17:50 - 18:10</span></div>              

      </div>

      <div class="col-lg col-12 col-agenda-2 pl-lg-1 pr-lg-1">

        <div class="text-agenda text-1"><p>Pancreatitis Crónica: ¿cómo y cuándo tratar correctamente a nuestros pacientes?</p></div>       

      </div>

      <div class="col-lg col-12 col-agenda-3 pl-lg-1">

        <div class="text-agenda text-2"><p>Dra. Analia Pasqua</p></div>        

      </div>

    </div>

    <div class="row mb-2">

      <div class="col-lg col-12 col-agenda-1 pr-lg-1">

        <div class="hour"><span>18:10 - 18:30</span></div>              

      </div>

      <div class="col-lg col-12 col-agenda-2 pl-lg-1 pr-lg-1">

        <div class="text-agenda text-1"><p>¿Cómo disminuir el riesgo de pancreatitis aguda Post-CPRE?</p></div>       

      </div>

      <div class="col-lg col-12 col-agenda-3 pl-lg-1">

        <div class="text-agenda text-2"><p>Dr. Martín Guidi</p></div>        

      </div>

    </div> 

    <div class="row ">

      <div class="col-lg col-12 col-agenda-1 pr-lg-1">

        <div class="hour"><span>18:30 - 18:50</span></div>              

      </div>

      <div class="col-lg col-12 col-agenda-2 pl-lg-1 pr-lg-1">

        <div class="text-agenda text-1"><p>¿Cómo aumentar el rédito diagnóstico en las punciones de lesiones sólidas de páncreas?</p></div>       

      </div>

      <div class="col-lg col-12 col-agenda-3 pl-lg-1">

        <div class="text-agenda text-2"><p>Dr. Mella José</p></div>        

      </div>

    </div> 

  </div>



  <div class="container container-agenda mb-5">

    <div class="row mb-2">

      <div class="col-md-12 ">

        <div class="titulo-agenda">

          <p>MÓDULO 4 - <b>“SIMPOSIO FUJIFILM”</b></p>

        </div>              

      </div>

    </div> 

    <div class="row mb-2">

      <div class="col-lg col-12 col-agenda-1 pr-lg-1">

        <div class="hour"><span>19:00 - 19:30</span></div>              

      </div>

      <div class="col-lg col-12 col-agenda-2 pl-lg-1 pr-lg-1">

        <div class="text-agenda text-1"><p>Simposio fujimil</p></div>       

      </div>

      <div class="col-lg col-12 col-agenda-3 pl-lg-1">

        <div class="text-agenda text-2"><p>Dr. Herbert Burgos</p></div>        

      </div>

    </div-->    

  </div>
@endsection