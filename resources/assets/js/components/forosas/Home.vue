<template>
    <div>
	  <section>
        <div class="modal" id="modal-solapas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="img/forosas/modal-cerrar.png">
                        </button>
                    </div>
                    <div class="modal-body" v-if="solapa === 1">
                        <h2 class="text-uppercase">Día Nacional</h2>
                        <div class="row">
                            <div class="col-12">
                                <div class="embed-container">
                                    <iframe src="https://player.vimeo.com/video/473988487" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                                </div>
                            </div>                            
                        </div>
                        <h2 class="text-uppercase">Día Internacional</h2>
                        <div class="row">
                            <div class="col-12">
                                <div class="embed-container">
                                    <iframe src="https://player.vimeo.com/video/474026333" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="modal-body" v-if="solapa === 2">
                        <h2>SPEAKERS NACIONALES</h2>
                        <div class="row">
                            <div class="col-12 con-padding">
                                <img src="img/forosas/speaker-flavio.png">
                            </div>
                            <div class="col-12 con-padding">
                                <p>Gerente General de AbbVie Región Sur desde 2015.</p>
                                <p>Médico graduado en la Universidad de Buenos Aires especialista en Farmacología Clínica.</p>
                                <p>Master en Administración de Empresas en IDEA.</p>
                                <p>Realizó estudios de postgrado en IAE Business School de Universidad Austral y en la escuela de negocios de Harvard.</p>
                                <p>En abril 2019 fue reelecto como presidente de la Cámara Argentina de Especialidades Medicinales (CAEME).</p>
                                <p>Previamente a su rol en AbbVie, Flavio Devoto se ha desempeñado durante 8 años como gerente general de Novo Nordisk, y cuenta con más de 20 años de trayectoria en la industria farmacéutica.</p>
                            </div>
                            <div class="col-12 con-padding">
                                <img src="img/forosas/speaker-gabriel.png">
                            </div>
                            <div class="col-12 con-padding">
                                <p>Gerente Médico de la Obra Social de los Empleados de Comercio y Actividades Civiles.</p>
                                <p>Master en Gestión de Calidad de Servicios Socio Sanitarios de la Universidad de Murcia.</p>
                                <p>Presidente del Instituto de Investigación Sanitaria de la Seguridad Social.</p>
                                <p>Miembro de CETSA, Centro de evaluación de tecnologías sanitarias de la Universidad ISALUD.</p>
                            </div>
                            <div class="col-12 con-padding">
                                <img src="img/forosas/speaker-luciana.png">
                            </div>
                            <div class="col-12 con-padding">
                                <p>Presidenta y fundadora de Fundación Más Vida (FMV) de Crohn & Colitis Ulcerosa (FMV)</p>
                                <p>Miembro fundador de la Federación Argentina de Enfermedades Poco Frecuentes (FADEPOF) organización en la que actualmente ocupa la Dirección Ejecutiva y de la que fue Presidente (2014/ 2016) y Secretaria de Comisión Directiva (2012/ 2014).</p>
                                <p>Ha sido asesora y posteriormente planta de gabinete de la Presidencia de la Comisión para la Plena Participación e Inclusión de las Personas con Discapacidad (COPIDIS) del Gobierno de CABA.</p>
                                <p>A través de las instituciones que lidera, es miembro de la Federación Europea de Asociaciones de Crohn y Colitis (EFCCA), la Alianza Internacional de Organizaciones de Pacientes (IAPO), la Alianza Iberoamericana de Enfermedades Raras (ALIBER) y Rare Diseases International (RDI).</p>
                            </div>
                            <div class="col-12 con-padding">
                                <img src="img/forosas/speaker-fernan.png">
                            </div>
                            <div class="col-12 con-padding">
                                <p>A cargo del Ministerio de Salud de la Ciudad de Buenos Aires desde el 10 de diciembre de 2019.</p>
                                <p>Médico graduado con diploma de honor en la Universidad de Buenos Aires, especialista en medicina interna.</p>
                                <p>Máster en Gobierno y Dirección de Sistemas de Salud de la Universidad Abierta de Cataluña.</p>
                                <p>Se desempeñó como Vicedirector Médico de Planeamiento Estratégico del Hospital Italiano y como profesor titular y jefe del departamento de Fisiología Humana del Instituto Universitario de ese hospital.</p>
                            </div>                            
                        </div>
                        <h2>SPEAKERS INTERNACIONALES</h2>
                        <div class="row">
                            <div class="col-12 con-padding">
                                <img src="img/forosas/speaker-vicente.png">
                            </div>
                            <div class="col-12 con-padding">
                                <p>Catedrático emérito y ex-decano de la Facultad de Ciencias Económicas y Empresariales de la Universidad Pompeu Fabra de Barcelona (UPF).</p>
                                <p>Fundador e investigador principal del Centro de Investigación en Economía y Salud (CRES-UPF).</p>
                                <p>Miembro del Consejo Rector del Parque de Salud Mar, y delegado de la UPF en TecnoCampus (Empresa, Ingeniería y Salud).</p>
                                <p>MBA ESADE, Master of Science de Purdue University.</p>
                                <p>Licenciado y Doctor en Economía por la Universitat de Barcelona. Estudios de doctorado en Salud Pública en la Universidad Johns Hopkins y Visiting Scholar en el Departamento de Economía del Massachusetts Institute of Technology (MIT).</p>
                                <p>Ex presidente de la Sociedad Española de Salud Pública y Administración Sanitaria (SESPAS), ex presidente de la Asociación de Economía de la Salud (AES), ex secretario de la Asociación Europea de Salud Pública (EUPHA) y miembro meritorio de CAMFiC.</p>
                            </div>
                            <div class="col-12 con-padding">
                                <img src="img/forosas/speaker-andre.png">
                            </div>
                            <div class="col-12 con-padding">
                                <p>Fue hasta hace unos meses Economista Senior en Salud del Banco Mundial (Washington DC).</p> 
                                <p>Participó del movimiento de construcción del Sistema Único de Salud de Brasil.</p>
                                <p>Actuó como consultor en organismos multilaterales (BID y luego Banco Mundial).</p> 
                                <p>Cuenta con más de diez libros y 200 trabajos publicados en diversos idiomas y campos del conocimiento.</p>
                                <p>Graduado en Administración en la fundación Getulio Vargas (FGV), con maestría en economía en la Universidad Estadual de Campinas (UNICAMP).</p>
                                <p>Doctorado en Historia Económica en la Universidad de San Pablo (USP) y cursos de especialización en Seguridad Social en la Universidad Harvard (USA).</p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-body" v-if="solapa === 3">
                        <h2>CONDUCCIÓN</h2>
                        <div class="row">
                            <div class="col-12 con-padding">
                                <img src="img/forosas/plager.png">
                            </div>
                            <div class="col-12 con-padding">
                                <p>Es una periodista y conductora Argentina</p>
                                <p>Actualmente, forma parte de los programas Involucrados e Intratables, por América TV.</p>
                            </div>                             
                        </div>
                        <div class="row">
                            <div class="col-12 con-padding">
                                <img src="img/forosas/longobardi.png">
                            </div>
                            <div class="col-12 con-padding">
                                <p>En el año 1984 fundó la revista Apertura junto a su socio Gabriel Griffa vendiendo su participación 10 años más tarde.</p>
                                <p>Condujo importantes programas radiales en emisoras como FM del Plata, Radio Feeling, Radio América.</p>
                                <p>En televisión condujo varios programas de noticias, “Fuego Cruzado”, “Punto Límite”, “Longobardi en vivo”, entre otros.</p>
                                <p>Actualmente conduce el programa “Cada mañana”, en Radio Mitre, de lunes a viernes de 6 a 10 horas, siendo el programa de mayor audiencia radial nacional desde el año 2001.</p>
                                <p>Desde junio del año 2013, se encuentra en la web el nuevo sitio de opinión www.marcelolongobardi.com.</p>
                                <p>Se destacó en importantes entrevistas especiales realizadas a políticos internacionales como Berlusconi, Aznar, Felipe González, entre otros destacados.</p>
                                <p>En el año 2019 el programa que conduce en CNN fue reconocido con el premio PRODU Awards 2019 en la categoría “Mejor programa informativo”</p>
                                <p>En el año 2020 fue nominado a los Premios Emmy. Competirá en el rubro &quot;Reportaje sobresaliente en español&quot; por una entrevista que hizo para su ciclo de televisión que se emite por CNN, “En diálogo con Longobardi”. Este importante premio es otorgado por National Academy of Television, Arts &amp; Sciences.</p>
                                <p>Actualmente conduce el programa “En diálogo con Longobardi” en CNN en español, los días domingos a las 22 horas, para toda la comunidad de habla hispana”.</p>
                            </div>
                        </div>
                        
                    </div>  
                    <div class="modal-body" v-if="solapa === 4">
                        <h2>HISTORIA DEL FORO DE SALUD SUSTENTABLE (SaS)</h2>
                        <div class="row">
                            <div class="col-12 pt-3">
                                <p class="p-sin-estilo">Como cada año, AbbVie organiza el Foro de Salud Sustentable (SaS), un evento dirigido principalmente a los financiadores y tomadores de decisión del sistema de salud argentino en donde se tratan las temáticas sanitarias más relevantes de interés actual.</p>
                                <p class="p-sin-estilo">El Foro SaS nació en 2014 como un proyecto educativo cuya misión se orientaba a fomentar el trabajo conjunto entre los referentes de patologías crónicas y los tomadores de decisión con el fin de optimizar el tratamiento del paciente teniendo un manejo adecuado de los recursos disponibles.</p>
                                <p class="p-sin-estilo">Motivado por la posibilidad de un sistema de salud sustentable que promueva prácticas de prevención, el diagnóstico temprano, el tratamiento óptimo de enfermedades y el acceso a verdadera innovación que sea sostenible y financieramente viable, el Foro se ha convertido en un reconocido espacio de actualización y reunión de los principales sanitaristas del país.</p>
                                <p class="p-sin-estilo">En esta 7ma edición, además de abordar las dificultades habituales que presenta el sistema sanitario argentino, el Foro brindará especial atención al impacto provocado por la pandemia a nivel nacional e internacional.</p>
                                <p class="p-sin-estilo">Es en este desafiante contexto que AbbVie llevará a cabo el <strong>Foro SaS en la modalidad virtual el 27 y 29 de octubre</strong> buscando reinventar el espacio históricamente presencial.</p>
                                
                            </div>
                            <div class="col-12">
                                <div class="embed-container">
                                    <iframe id="video-historia" src="https://player.vimeo.com/video/466148940" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                                </div>
                            </div>
                        </div>
                        
                    </div>   
                    <div class="modal-body" v-if="solapa === 5">
                        <h2>PREGUNTAS A SPEAKERS</h2>
                        <div class="row">
                            <div class="col-12">
                                <p class="p-sin-estilo">Hágale una pregunta al speaker que desee y la tendremos en cuenta durante el vivo del 7mo Foro SaS.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 col-md-8 mx-auto">
                                <div class="form-group">
                                    <label for="speaker">Speaker</label>
                                    <select class="form-control" id="speaker" name="speaker" v-model="form.speaker">
                                        <option :value="null">Seleccione</option>
                                        <option value="Dr. Flavio Devoto">Dr. Flavio Devoto</option>
                                        <option value="Dr. Gabriel Lebersztein">Dr. Gabriel Lebersztein</option>
                                        <option value="Luciana Escati Peñaloza">Luciana Escati Peñaloza</option>
                                        <option value="Dr. Fernán Quirós">Dr. Fernán Quirós</option>
                                        <option value="Vicente Ortún Rubio">Vicente Ortún Rubio</option>
                                        <option value="André Medici">André Medici</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="pregunta">Pregunta</label>
                                    <textarea class="form-control" id="pregunta" name="pregunta" placeholder="Escriba su pregunta aquí" v-model="form.pregunta"></textarea>
                                </div>
                                <div class="form-group text-center">
                                    <button type="button" 
                                            class="btn btn-primary btn-enviar-pregunta" 
                                            @click="enviarPregunta()"
                                            
                                    >
                                        
                                        <span v-if="!form.enviando">ENVIAR</span>
                                        <span v-else>ENVIANDO...</span>
                                    </button>                    
                                </div>
                                
                            </div>
                        </div>
                        <div class="row" v-if="form.enviado">
                            <div class="col-12">
                                <p class="p-sin-estilo text-center"><strong>Su pregunta ya fue enviada. Muchas Gracias!</strong></p>    
                            </div>    
                        </div>   
                        
                    </div> 
                    <div class="modal-body" v-if="solapa === 6">
                        <h2>AGENDA <strong>27 DE OCTUBRE | NACIONAL</strong></h2>
                        <div class="agenda-separador">
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="p-sin-estilo"><span class="agenda-texto-hora">18:00 a 18:10 hs.</span></p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="p-sin-estilo">
                                        <span class="agenda-texto-azul d-block">Apertura y Bienvenida al 7º Foro de Salud Sustentable (SaS)</span>
                                        <span class="agenda-texto-negro d-block"><strong>Débora Plager | Marcelo Longobardi | Dr. Flavio Devoto</strong></span>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="p-sin-estilo"><span class="agenda-texto-hora">18:10 a 18:40 hs.</span></p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="p-sin-estilo">
                                        <span class="agenda-texto-azul d-block">Editorial: Análisis político, económico y sanitario.</span>
                                        <span class="agenda-texto-negro d-block"><strong>Marcelo Longobardi</strong></span>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="p-sin-estilo"><span class="agenda-texto-hora">18:40 a 19:25 hs.</span></p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="p-sin-estilo">
                                        <span class="agenda-texto-azul d-block">¿Crisis sanitaria = Oportunidad de mejora para el sistema sanitario argentino?</span>
                                        <span class="agenda-texto-negro d-block">
                                            <strong>Dr. Gabriel Lebersztein</strong> - Gerente Médico OSECAC
                                        </span>
                                        <span class="agenda-texto-negro d-block">
                                            <strong>Luciana Escati Peñalosa</strong> - Presidenta Asociación de Pacientes Fundación Más Vida
                                        </span>

                                    </p>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="p-sin-estilo"><span class="agenda-texto-hora">19:25 a 19:35 hs.</span></p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="p-sin-estilo">
                                        <span class="agenda-texto-azul d-block">Compartiendo Buenas Prácticas de Salud Sustentable</span>
                                        <span class="agenda-texto-negro d-block">
                                            <strong>Decisores en salud</strong>
                                        </span>
                                    </p>
                                </div>
                            </div>                                                    
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="p-sin-estilo"><span class="agenda-texto-hora">19:35 a 19:45 hs.</span></p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="p-sin-estilo">
                                        <span class="agenda-texto-azul d-block">Cierre Día Nacional</span>
                                        <span class="agenda-texto-negro d-block">
                                            <strong>Débora Plager | Marcelo Longobardi | Dr. Flavio Devoto</strong>
                                        </span>
                                    </p>
                                </div>
                            </div>                                                    

                        </div>
                        <h2>AGENDA <strong>29 DE OCTUBRE | INTERNACIONAL</strong></h2>
                        <div class="agenda-separador">
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="p-sin-estilo"><span class="agenda-texto-hora">18:00 a 18:05 hs.</span></p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="p-sin-estilo">
                                        <span class="agenda-texto-azul d-block">Apertura y Bienvenida Día Internacional</span>
                                        <span class="agenda-texto-negro d-block"><strong>Débora Plager | Marcelo Longobardi | Dr. Flavio Devoto</strong></span>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="p-sin-estilo"><span class="agenda-texto-hora">18:05 a 18:50 hs.</span></p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="p-sin-estilo">
                                        <span class="agenda-texto-azul d-block">¿Pasaron la prueba los sistemas de salud ante la pandemia? La experiencia de Estados Unidos, Brasil y Europa.</span>
                                        <span class="agenda-texto-negro d-block">
                                            <strong>Vicente Ortún Rubio</strong> - Fundador del Centro de Investigación en Economía y Salud (CRES) y ex decano de Universidad Pompeu Fabra.
                                        </span>
                                        <span class="agenda-texto-negro d-block">
                                            <strong>André Medici</strong> - Ex Economista de Salud del Banco Mundial
                                        </span>

                                    </p>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="p-sin-estilo"><span class="agenda-texto-hora">18:50 a 19:35 hs.</span></p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="p-sin-estilo">
                                        <span class="agenda-texto-azul d-block">Evaluación institucional y personal sobre la gestión de la pandemia en CABA</span>
                                        <span class="agenda-texto-negro d-block">
                                            <strong>Dr. Fernán Quirós</strong> - Ministro de Salud de la Ciudad de Bs. As.
                                        </span>
                                    </p>
                                </div>
                            </div>                                                         
                            <div class="row">
                                <div class="col-sm-4">
                                    <p class="p-sin-estilo"><span class="agenda-texto-hora">19:35 a 19:45 hs.</span></p>
                                </div>
                                <div class="col-sm-8">
                                    <p class="p-sin-estilo">
                                        <span class="agenda-texto-azul d-block">Cierre del 7º Foro de Salud Sustentable (SaS)</span>
                                        <span class="agenda-texto-negro d-block">
                                            <strong>Débora Plager | Marcelo Longobardi | Daniel Diminutto</strong>
                                        </span>
                                    </p>
                                </div>
                            </div>                                                         

                        </div>                        
                    </div>  
                    <div class="modal-body" v-if="solapa === 7">
                        <h2>Buenas Prácticas de Salud Sustentable</h2>
                        <div class="row">
                            <div class="col-12" v-for="(item,key) in videosPracticas" :key="key">
                                <div class="embed-container">
                                    <iframe id="video-historia" :src="item" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                                </div>
                            </div>                            
                        </div>
                        
                    </div>                       
                                                                                   
                </div>
            </div>
        </div> 
        <nav class="navbar navbar-expand-lg navbar-dark menu-mobile px-0">
                <button class="navbar-toggler" type="button" @click="mostrarMenu()">
                    <img src="img/forosas/bars-solid.png" style="max-width: 25px;" width="25px">
                </button>
                <div class="navbar-collapse hidden" id="navbarNav">
                    

                    <ul class="navbar-nav navbar-nav-menu px-3 py-2" :style="{'height':alto+'px'}">
                        <li class="nav-item">
                            <img src="img/forosas/logo.png" style="max-width:150px;">
                            <button type="button" class="close btn-close-menu" aria-label="Close" @click="cerrarMenu()">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </li>
                        <li class="nav-item py-3"></li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" @click="mostrarSolapa(3)">Conducción</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" @click="mostrarSolapa(2)">Speakers nacionales & internacionales</a>                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" @click="mostrarSolapa(5)">Preguntas a Speakers</a>
                        </li>                        
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" @click="mostrarSolapa(4)">Historia</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" @click="mostrarSolapa(6)">Agenda</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" @click="mostrarSolapa(7)">Buenas Prácticas de Salud Sustentable</a>
                        </li>                                                   
                        
                    </ul>
                </div>

        </nav>
	  	<div class="container">


            <div class="circle-container" v-for="index in 200" :key="index">
                <div class="circle"></div>
            </div>
	  		<div class="solapa fondo solapa1" @click="mostrarSolapa(1)">
                <p>Reviví el 7° Foro</p>
  			</div>
            <div class="solapa fondo solapa2" @click="mostrarSolapa(2)">
                <p>Speakers nacionales & internacionales</p>
            </div>
            <div class="solapa fondo solapa3" @click="mostrarSolapa(3)">
                <p>Conducción</p>
            </div>
            <div class="solapa fondo solapa2 solapa4" @click="mostrarSolapa(4)">
                <p>Historia</p>
            </div>
            <div class="solapa fondo solapa5" @click="mostrarSolapa(5)">
                <p>Preguntas a Speakers</p>
            </div>                        
            <div class="solapa fondo solapa6" @click="mostrarSolapa(6)">
                <p>Agenda</p>
            </div>
            <div class="solapa fondo solapa2 solapa7" @click="mostrarSolapa(7)">
                <p>Buenas Prácticas de Salud Sustentable</p>
            </div>
            <!--div class="solapa fondo solapa-evento" @click="ingresarAEvento()">
                <p>Ingrese al vivo</p>
            </div-->                        
	  		<div class="row content-logo">
	  			<a><img src="img/forosas/logo.png"></a><br>
	  		</div>


	  		
            <div class="content-date">
                <!--button type="button" class="btn btn-ingrese-evento" @click="ingresarAEvento()">Ingrese al vivo</button-->

                <img src="img/forosas/date2.png" style="width:100%;">
                <div class="control-audio">
                    <img src="img/forosas/logo_ABBVIE.png" width="140">
                    <button class="btn" @click="cambiarEstadoAudio()">
                        <img v-if="audio.muted" src="img/forosas/volume-mute-solid.png">
                        <img v-else src="img/forosas/volume-up-solid.png">
                    </button>
                </div>
            </div>
            

            <audio autoplay preload="auto" id="audio" muted loop>
                <source src="public/audio/foro-sas.ogg" type="audio/ogg">
                <source src="public/audio/foro-sas.mp3" type="audio/mpeg">
            </audio>            


	  	</div>
	  </section>

    </div>
</template>

<script>
    export default {
        props : {
            segundosRestantes: {
                type: Number,
                default: 0
            },
            ahora: {
                type: String
            },
            urlEnviarPregunta: {
                type: String,
                required: true
            }
        },
        data () {
            return {
                alto: 100,
                solapa: null,
                seconds: this.segundosRestantes,
                countdownTimer: null,
                info: {
                },
                errors: [],
                audio: {
                    muted: false,
                    element: null,
                    estadoAlAbrirModal:null
                },
                form: {
                    speaker: null,
                    pregunta: null,
                    enviando: false,
                    enviado: false
                },
                videosPracticas: [
                    'https://player.vimeo.com/video/471194181',
                    'https://player.vimeo.com/video/471195135',
                    'https://player.vimeo.com/video/471196049',
                    'https://player.vimeo.com/video/471197183',
                    'https://player.vimeo.com/video/471198267',
                    'https://player.vimeo.com/video/471199470',
                    'https://player.vimeo.com/video/471200494',
                    'https://player.vimeo.com/video/471201435',
                    'https://player.vimeo.com/video/471202437',
                    'https://player.vimeo.com/video/471203575',
                    'https://player.vimeo.com/video/471204409',

                ]
            }
        },
        mounted () {
            var imgFondoDesk = new Image();
            this.alto = $( document ).height(); 
            
            //$('.navbar-nav-menu').style(this.alto);
            imgFondoDesk.onload = function(){
                setTimeout(function () {
                    $('body').addClass('animado');
                }, 1);
                
            };
            imgFondoDesk.src = 'public/img/forosas/bg-blue.gif';            


            this.countdownTimer = setInterval(this.timer, 1000);

            this.audio.element = document.getElementById("audio");
            
            this.$nextTick(function() {
                if (this.audio.element.paused) {
                    this.audio.element.play();
                    this.audio.element.muted = false;
                }
                this.audio.muted = this.audio.element.paused;
            });
            $("#modal-solapas").on("hidden.bs.modal", this.alCerrarModal);                    
        },
        methods: {
            timer () {
                
                var days        = Math.floor(this.seconds/24/60/60);
                var hoursLeft   = Math.floor((this.seconds) - (days*86400));
                var hours       = Math.floor(hoursLeft/3600);
                var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
                var minutes     = Math.floor(minutesLeft/60);
                var remainingSeconds = this.seconds % 60;
                function pad(n) {
                return (n < 10 ? "0" + n : n);
                }
                const $count = $('#countdown');
                $count.find('.days .num').html(days);
                $count.find('.hours .num').html(hours);
                $count.find('.minutes .num').html(minutes);
                $count.find('.seconds .num').html(remainingSeconds);
                //document.getElementById('countdown').innerHTML = pad(days) + ":" + pad(hours) + ":" + pad(minutes) + ":" + pad(remainingSeconds);
                if (this.seconds == 0) {
                    clearInterval(this.countdownTimer);
                } else {
                    this.seconds--;
                }
            },
            mostrarSolapa (solapa) {
                var vm = this;
                this.solapa = solapa;
                vm.audio.estadoAlAbrirModal = vm.audio.muted ? 'muted' : 'play'; 
                this.$nextTick(function () {
                    $('#modal-solapas').modal('show');
                    if (solapa === 4 || solapa === 7 || solapa === 1) {
                        if (!vm.audio.muted) {
                            this.setearEstadoAudio('muted');
                        }
                    }
                    
                });
                
            },
            cambiarEstadoAudio () {
                if (this.audio.muted) {
                    this.audio.element.play();
                } else {
                    this.audio.element.pause();
                }

                this.$nextTick(function() {
                    this.audio.muted = this.audio.element.paused;
                });
                
            },
            mostrarMenu () {
                $('.navbar-nav-menu').addClass('opened');
            },
            cerrarMenu() {
                $('.navbar-nav-menu').removeClass('opened');
            },
            alCerrarModal () {
                var url = $('#video-historia').attr('src');
                $('#video-historia').attr('src', '');
                $('#video-historia').attr('src', url);
                if (this.audio.estadoAlAbrirModal !== 'muted') {
                    this.setearEstadoAudio('play');
                }
                
                this.form.enviado = false;

            },
            enviarPregunta: function () {
                let vm = this
                if (!vm.form.pregunta || !vm.form.speaker) {
                    alert('Debe seleccionar al speaker e ingresar la pregunta');
                    return false;
                }
                if (vm.form.pregunta && vm.form.speaker && !vm.form.enviando) {
                    vm.form.enviando = true;
                    vm.form.enviado = false;
                    axios.post(vm.urlEnviarPregunta, vm.form)
                        .then(response => {
                            vm.form.enviando = false;
                            vm.form.enviado = true;
                            vm.form.pregunta = null;
                            vm.form.speaker = null;
                        }, error => {
                            vm.form.enviando = false;
                            
                            alert(error.message);
                        });                    
                }
            },

            setearEstadoAudio (estado) {
                if (estado === 'muted') {
                    this.audio.element.pause();
                } else {
                    this.audio.element.play();
                }

                this.$nextTick(function() {
                    this.audio.muted = this.audio.element.paused;
                });
                
            },
            ingresarAEvento () {
                document.location = 'https://event.on24.com/wcc/r/2632769/787C82066C458E0F4A85C67FFDAD910D';
            }            
        }
    }
</script>
<style scoped>
</style>