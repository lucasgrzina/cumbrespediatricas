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
                        <div class="modal-body" v-if="solapa === 2">
                            <h2>SPEAKERS NACIONALES</h2>
                            <div class="row">
                                <div class="col-12 con-padding">
                                    <img src="img/forosas/speaker-gabriel.png">
                                </div>
                                <div class="col-12 con-padding">
                                    <p>En el año 1984 fundó la revista Apertura junto a su socio Gabriel Griffa, se retiro de ella 10 años mas tarde vendiendo su participación.</p>
                                    <p>Condujo importantes programas radiales en prestigiosas emisoras como FM del Plata, Radio Feeling, Radio América.</p>
                                    <p>En televisión condujo varios programas de noticias, en Canal 9, en horario central, también condujo “Fuego Cruzado”, en el mismo canal y luego en CVN, así como también “Punto Limite”, en América 24. Además, condujo el programa “Longobardi en vivo”, que se emitió los días martes, a las 22 horas, por el canal de cable C5N, hasta fines del año 2012.</p>
                                    <p>Actualmente conduce el programa “Cada mañana”, en Radio Mitre, de lunes a viernes de 6 a 10 horas, siendo el programa de mayor audiencia radial nacional desde el año 2001.</p>
                                    <p>Desde junio del año 2013, se encuentra en la web el nuevo sitio de opinión www.marcelolongobardi.com.</p>
                                    <p>Se destacó en importantes entrevistas especiales realizadas a políticos internacionales como Berlusconi, Aznar, Felipe González, entre otros destacados.</p>
                                    <p>En el año 2019 el programa que conduce en CNN fue reconocido con el premio PRODU Awards 2019 en la categoría “Mejor programa informativo”</p>
                                    <p>En el año 2020 fue nominado a los Premios Emmy. Competirá en el rubro "Reportaje sobresaliente en español" por una entrevista que hizo para su ciclo de televisión que se emite por CNN, “En diálogo con Longobardi”.<br>Este importante premio es otorgado por National Academy of Television, Arts & Sciences.</p>
                                    <p>Actualmente conduce el programa “En diálogo con Longobardi” en CNN en español, los días domingos a las 22 horas, para toda la comunidad de habla hispana”.</p>
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
                                    <img src="img/forosas/longobardi.png">
                                </div>
                                <div class="col-12 con-padding">
                                    <p>En el año 1984 fundó la revista Apertura junto a su socio Gabriel Griffa, se retiro de ella 10 años mas tarde vendiendo su participación.</p>
                                    <p>Condujo importantes programas radiales en prestigiosas emisoras como FM del Plata, Radio Feeling, Radio América.</p>
                                    <p>En televisión condujo varios programas de noticias, en Canal 9, en horario central, también condujo “Fuego Cruzado”, en el mismo canal y luego en CVN, así como también “Punto Limite”, en América 24. Además, condujo el programa “Longobardi en vivo”, que se emitió los días martes, a las 22 horas, por el canal de cable C5N, hasta fines del año 2012.</p>
                                    <p>Actualmente conduce el programa “Cada mañana”, en Radio Mitre, de lunes a viernes de 6 a 10 horas, siendo el programa de mayor audiencia radial nacional desde el año 2001.</p>
                                    <p>Desde junio del año 2013, se encuentra en la web el nuevo sitio de opinión www.marcelolongobardi.com.</p>
                                    <p>Se destacó en importantes entrevistas especiales realizadas a políticos internacionales como Berlusconi, Aznar, Felipe González, entre otros destacados.</p>
                                    <p>En el año 2019 el programa que conduce en CNN fue reconocido con el premio PRODU Awards 2019 en la categoría “Mejor programa informativo”</p>
                                    <p>En el año 2020 fue nominado a los Premios Emmy. Competirá en el rubro &quot;Reportaje sobresaliente en español&quot; por una entrevista que hizo para su ciclo de televisión que se emite por CNN, “En diálogo con Longobardi”. Este importante premio es otorgado por National Academy of Television, Arts &amp; Sciences.</p>
                                    <p>Actualmente conduce el programa “En diálogo con Longobardi” en CNN en español, los días domingos a las 22 horas, para toda la comunidad de habla hispana”.</p>
                                </div>
                            </div>
                            
                        </div>                        
                    </div>
                </div>
            </div> 

	  	<div class="container">
            <div class="control-audio">
                <img src="img/forosas/logo_ABBVIE.png" width="100">
                <button class="btn" @click="cambiarEstadoAudio()">
                    <img v-if="audio.muted" src="img/forosas/volume-mute-solid.png">
                    <img v-else src="img/forosas/volume-up-solid.png">
                </button>
            </div>

            <div class="circle-container" v-for="index in 200" :key="index">
                <div class="circle"></div>
            </div>
	  		<div class="solapa fondo counter">
	  				<p>PRÓXIMO VIVO</p>
	  				<span id="countdown" class="row timer">
	  					<div class="col block-time days">
	  						<span class="num"></span>
	  						<span class="text">Días</span>
	  					</div>
	  					<div class="col block-time hours">
	  						<span class="num"></span>
	  						<span class="text">Horas</span>
	  					</div>
	  					<div class="col block-time minutes">
	  						<span class="num"></span>
	  						<span class="text">Min.</span>
	  					</div>
	  					<div class="col block-time seconds">
	  						<span class="num"></span>
	  						<span class="text">Seg.</span>
	  					</div>
	  				</span>
  			</div>
            <div class="solapa fondo solapa2" @click="mostrarSolapa(2)">
                <p>Speakers nacionales & internacionales</p>
            </div>
            <div class="solapa fondo solapa3" @click="mostrarSolapa(3)">
                <p>Conducción</p>
            </div>

	  		<div class="row content-logo">
	  			<a><img src="img/forosas/logo.png"></a>
	  		</div>

	  		
            <div class="content-date">
                <img src="img/forosas/date.png">
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
            }
        },
        data () {
            return {
                solapa: null,
                seconds: this.segundosRestantes,
                countdownTimer: null,
                info: {
                },
                errors: [],
                audio: {
                    muted: false,
                    element: null
                }
            }
        },
        mounted () {
            var imgFondoDesk = new Image();
            imgFondoDesk.onload = function(){
                console.debug('cargoooo');
                setTimeout(function () {
                    console.debug('agregooo');
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
                console.debug(solapa);
                this.solapa = solapa;
                this.$nextTick(function () {
                    $('#modal-solapas').modal('show');
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
                
            }            
        }
    }
</script>
<style scoped>
</style>