<template>
<div style="position:relative;">
    <div v-if="configEvento.etapa === 'R'">

	  		<div class="step" id="step-1" v-if="paso === 1">

				<div class="container">

					<a class="logo"><img src="public/assets/mentesinlimites/img/logo.png"></a>

					<div class="row ">

						<div class="col-12 text-top">

							<p><span class="text-01">BIENVENIDOS</span><span class="text-02">AL LANZAMIENTO VIRTUAL</span></p>

						</div>

						<div class="col-12 title">

							<h1>Por una mente<br><span class="big">sin límites</span></h1>

							<h2>La correcta nutrición desde el inicio, marca la diferencia</h2>

						</div>

						<div class="col-12 transion-vivo-msg">

							<div class="divider"></div>

							<p>TRANSMISIÓN EN VIVO</p>

						</div>

					</div>

					<div class="row mb-5 mt-1">

						<div class="col-12">

							<div class="content-buttons">

								<button class="btn btn-primary ml-auto mr-auto d-table go-to-consejos" @click="verVideo('E')">Audio en español</button>

								<button class="btn btn-primary ml-auto mr-auto d-table go-to-consejos" @click="verVideo('I')">Audio en inglés</button>

							</div>

						</div>

					</div>

				</div>

			</div>

			<div class="step" id="step-2" v-if="paso === 2">

				<div class="container container-general " >

					<div class="row ">					

						<div class="col-md-8 title order-2 order-md-1">

							<p class="text-top"><span class="text-02">LANZAMIENTO VIRTUAL</span></p>

							<h1>Por una mente sin límites</h1>

							<h2>La correcta nutrición desde el inicio, marca la diferencia</h2>

						</div>



						<div class="col-md-4 order-1 order-md-2">

							<a class="logo"><img src="public/assets/mentesinlimites/img/logo.png"></a>

						</div>

					</div>



					<div class="row">

						<div class="col-12 subtitule">

							<h1>CONSEJOS ÚTILES</h1>

							<h2>Sigue estas recomendaciones para una mejor visualización del contenido</h2>

						</div>

					</div>



					





				</div>



				<div class="container consejos">

					<div class="row mt-2">

						<div class="col-md-4 col-consejo">

							

							<p>Si desea ver la presentación únicamente, puede agrandar la pantalla haciendo click en el ícono</p>

							<img src="public/assets/mentesinlimites/img/fullscreen-2.svg" class="icon">

							<div class="divider"></div>

						</div>

						<div class="col-md-4 col-consejo">

							

							<p>Utilice auriculares/audífonos para reducir sonido ambiente.</p>

							<img src="public/assets/mentesinlimites/img/headphones.svg" class="icon">

							<div class="divider"></div>

						</div>

						<div class="col-md-4 col-consejo">

							

							<p>Evite utilizar otras plataformas como Netflix, Amazon Prime o Youtube, que pueden ocupar ancho de banda durante la transmisión.</p>

							<img src="public/assets/mentesinlimites/img/devices.svg" class="icon">	

							<div class="divider"></div>						

						</div>

					</div>

					<div class="row">

						<div class="col-md-4 col-consejo">

							

							<p>Si la transmisión es lenta debido a Internet, baje la calidad del video desde la pantalla, en este ícono</p>

							<img src="public/assets/mentesinlimites/img/settings.svg" class="icon">

							<div class="divider"></div>

							

						</div>

						<div class="col-md-4 col-consejo">

							

							<p>Conecte el dispositivo directo al modem si posee un cable de red, esto asegurará un mejor envío de datos. Es suficiente con tener una conexión de al menos 5 Mbps descargados para ver el contenido en HD.</p>

							<div class="divider"></div>

						</div>

						<div class="col-md-4 col-consejo">

							

							<p>Si su problema persiste, por favor contáctese mediante el botón de whatsapp que se encuentra abajo a la derecha.</p>

							<img src="public/assets/mentesinlimites/img/whatsapp.svg" class="icon">

							<div class="divider last"></div>

						</div>

					</div>



					<div class="row">

						<div class="col-12">

                            <button class="btn btn-primary ml-auto mr-auto d-table  mt-2 mb-2 btn-sm" type="button" @click="irAlPaso(3)">Continuar</button>
							<!--h3 class="gracias go-to-video" @click="irAlPaso(3)">¡MUCHAS GRACIAS!</h3-->

						</div>

					</div>

				</div>

			</div>



			<div class="step" id="step-3" v-if="paso === 3">



				<div class="container ">

					<div class="row mt-3 mb-3">

							



						<div class="col-md-12">

							<div class="content-top-video">

								<div class="d-block d-sm-flex">

									<button class="btn btn-primary btn-sm" @click="verVideo('E')">

									audio español

									</button>

									<button class="btn btn-primary btn-sm" @click="verVideo('I')">

										audio inglés

									</button>



									<div class="mensaje">

										<span>Recuerde activar el <br>sonido del reproductor</span>

									</div>

								</div>

								

							</div>

						</div>				

					</div>

				</div>



				<div class="container">

					<div class="row mb-3 mb-2">

						<div class="col-12">

							<div class="video" style="margin:0 auto;padding:45% 0 0 0;position:relative;">
                                <iframe v-if="videoSeleccionado" :src="videoSeleccionado" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                            </div>

						</div>					

					</div>

				</div>



				<div class="container ">

					<div class="row mb-3">

						<div class="col-md-7">

							<div class="form-pregunta">						

								<input class="w-100" type="text" name="pregunta" placeholder="Escriba su pregunta aquí:" v-model="form.pregunta">

								<input class="btn-submit" type="image" name="submit" src="public/assets/mentesinlimites/img/play-2.svg" @click="enviarPregunta()" :disabled="!form.pregunta">

							</div>

						</div>	



						<div class="col-md-5">

							<div class="content-buttons video">

								<button class="btn btn-primary btn-sm"  @click="certificadoDisponible()">

									certificado

								</button>

								<button class="btn btn-primary btn-sm"  @click="encuestaDisponible()">

									Encuesta

								</button>

							</div>

						</div>				

					</div>

				</div>

			</div>

    </div>
    
    <template v-else>
			<div class="container container-general">

				<div class="row ">

					

					<div class="col-md-8 title order-2 order-md-1">

						<p class="text-top"><span class="text-02">LANZAMIENTO VIRTUAL</span></p>

						<h1>Por una mente sin límites</h1>

						<h2>La correcta nutrición desde el inicio, marca la diferencia</h2>

					</div>



					<div class="col-md-4 order-1 order-md-2">

						<a class="logo"><img src="public/assets/mentesinlimites/img/logo.png"></a>

					</div>

				</div>

			</div>

			<div class="container container-general">

				<div class="row ">

					<div class="col-12 mensaje-full">

						<div class="inner">

							<h2 class="title-section">MUCHAS GRACIAS POR INSCRIBIRTE</h2>

							<h3 class="subtitle-section">TE ESPERAMOS EL <span>14 DE JULIO</span> A LAS <span>7:00 PM</span></h3>

								<div class="line-separate"></div>

						</div>

						

					</div>

				</div>

			</div>

    </template>

    <div v-if="showModal">
        <transition name="modal">
            <div class="modal-mask">
            <div class="modal-wrapper">
                <div class="modal-container">

                <div class="modal-header" style="color: #fff;padding: 0px 0px 10px;">
                    <slot name="header">
                    Encuesta de satisfacción
                    </slot>
                </div>

                <div class="modal-body">
                    
                    <div class="container-encuesta">
                        <div class="row" v-for="(itemBloque,indexBloque) in encuesta.bloques" :key="'bloque_' + indexBloque">
                            <div class="col-12" v-if="itemBloque.titulo">
                                <span class="tit-bloque">{{itemBloque.titulo}}</span>
                            </div>
                            <template v-for="(itemSeccion,indexSeccion) in itemBloque.secciones">
                                <div class="col-12" v-if="itemBloque.titulo" :key="'titSeccion_' + indexSeccion">
                                    <span class="tit-seccion">{{itemSeccion.titulo}}</span>
                                </div>
                                <template v-for="(itemPregunta,indexPregunta) in itemSeccion.preguntas">
                                    <div class="col-12" :key="'titPregunta_' + indexSeccion + '_' + indexPregunta">
                                        <span class="tit-pregunta">{{itemPregunta.key}}) {{itemPregunta.tit}}</span>
                                    </div>
                                    <div class="col-12 opc-pregunta"  :key="'contPregunta_' + indexSeccion + '_' + indexPregunta">
                                        <template v-if="itemPregunta.tipo === 'C'">
                                            <template v-for="(subitem, indexOpt) in obtenerOpcionesPorKey(itemPregunta.key_respuesta)">
                                            <div class="form-check-inline" :key="'opt_' + indexOpt">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" :name="'p_'+itemPregunta.key+'_r_'+ indexOpt" :value="subitem" v-model="encuesta.form['resp_' + itemPregunta.key]"> {{subitem}}
                                                </label>
                                            </div>
                                            <br :key="indexOpt">
                                            </template>
                                            
                                        </template>
                                        <template v-else>
                                            <textarea class="form-control" :name="'p_'+itemPregunta.key" v-model="encuesta.form['resp_' + itemPregunta.key]"></textarea>
                                        </template>
                                    </div>

                                </template>
                            </template>
                        </div>

                        <div class="text-right">

                        </div>
                        <i class="fa fa-spinner fa-spin fa-fw" style="opacity:0;"></i>
                    </div>                        
                </div>

                <div class="modal-footer">
                    <slot name="footer">
                    <button type="button" 
                            class="btn btn-primary" 
                            :disabled="encuesta.enviando"
                            @click="enviarEncuesta()">
                            Enviar
                    </button>                            
                    <button type="button" class="btn btn-primary" @click="mostrarModal(false)">
                        Cerrar
                    </button>
                    </slot>
                </div>
                </div>
            </div>
            </div>
        </transition>
    </div>      
</div>

</template>

<script>
    
    export default {
        props : {
            urlEnviar: {
                type: String,
                required:true
            },
            urlEnviarEncuesta: {
                type: String,
                required:true
            },            
            urlEncuestaDisponible: {
                type: String,
                required:true
            },
            urlEncuesta: {
                type: String,
                required:true
            },
            urlEnviarSalidaUsuario: {
                type: String,
                required:true
            },
            registrado : {
                type: Object,
                required: true
            },
            evento : {
                type: Object,
                required: true
            },
            configEvento : {
                type: Object,
                required: true
            }            

        },
        data () {
            return {
                
                videoSeleccionado: this.evento.urlVimeoVideoEng,
                form: {
                    pregunta: null
                },
                encuesta: {
                    titulo: '',
                    subtitulo: '',
                    bloques: [
                        {
                            titulo: '',
                            secciones: [
                                {
                                    titulo: 'Después de participar en este lanzamiento, ¿qué tan de acuerdo está con las siguientes declaraciones?',
                                    preguntas: [
                                        {key: 1,tit: 'El contenido del programa es relevante para mi consultorio', preg: 'pre1', tipo: 'C', key_respuesta: 1},
                                        {key: 2,tit: 'Los expositores y el contenido son interesantes', preg: 'pre1', tipo: 'C', key_respuesta: 1},
                                        {key: 3,tit: 'Logística y experiencia del evento: calidad audiovisual y de la transmisión son buenas y sin interrupciones', preg: '', tipo: 'C', key_respuesta: 1},
                                        {key: 4,tit: 'Probablemente participaré en las ofertas visuales futuras de Abbott Nutrición', preg: '', tipo: 'C', key_respuesta: 1},
                                        {key: 5,tit: 'Probablemente recomendaré este webinar a mis colegas ', preg: '', tipo: 'C', key_respuesta: 1},
                                        {key: 6,tit: '¿Qué temas son de mayor interés para usted relacionados con la nutrición?', preg: '', tipo: 'T'},
                                        {key: 7,tit: '¿Cuál es el aprendizaje más importante en este programa que pudiera traducirse a su consultorio clínico?', preg: '', tipo: 'T'},
                                        {key: 8,tit: '¿Alguna sugerencia para hacer este webinar más efectivo?', preg: '', tipo: 'T'},

                                    ]
                                }
                            ]

                        }
                    ],
                    opciones: [
                        {key: 1, 
                            valores: [
                                'Totalmente en desacuerdo', 'En desacuerdo', 'Ni en desacuerdo ni de acuerdo', 'De acuerdo','Totalmente de acuerdo'
                            ] 
                        }
                    ],
                    form: {
                        resp_1: null,
                        resp_2: null,
                        resp_3: null,
                        resp_4: null,
                        resp_5: null,
                        resp_6: null,
                        resp_7: null,
                        resp_8: null,
                        resp_9: null,
                        resp_10: null,
                        resp_11: null,
                        resp_12: null,
                        resp_13: null,
                        resp_14: null,
                        resp_15: null,
                        resp_16: null,
                        resp_17: null,
                        resp_18: null,
                        resp_19: null,
                        resp_20: null,
                        resp_21: null,
                    },
                    enviando: false,
                    errors: [],
                },  
                showModal: false,
                enviando: false,
                enviandoEncuesta: false,
                paso: 1,
            }
        },
        mounted () {
            var vm = this;
            vm.videoSeleccionado = vm.evento.urlVimeoVideoEng;

            //console.debug(vm.videoSeleccionado);
            var csrfToken = $('[name=csrf-token]').attr('content');
            var isOnIOS = navigator.userAgent.match(/iPad/i)|| navigator.userAgent.match(/iPhone/i);
            var eventName = isOnIOS ? "pagehide" : "beforeunload";    
            var usarSendBeacon = "sendBeacon" in navigator;
            var urlSalidaUsuario = vm.urlEnviarSalidaUsuario;
            
            //console.debug(isOnIOS,eventName,usarSendBeacon,urlSalidaUsuario);
            if (this.configEvento.etapa === 'R') {
                $('body').addClass('home');
                window.addEventListener(eventName, function(e){
                    var data = new FormData();
                    data.append('_token', csrfToken);                

                    if(usarSendBeacon)
                    {
                        navigator.sendBeacon(urlSalidaUsuario, data);
                    }
                    else
                    {
                        var request = new XMLHttpRequest();
                        
                        request.open('post', urlSalidaUsuario, false);
                        request.send(data);

                        if (request.status === 200) {
                            console.debug('termino');
                        }

                    }                
                    
                }, false);  
            } else {
                $('body').addClass('general').addClass('registro');
            }
        
        },
        methods: {
            irAlPaso: function (paso) {
              window.scrollTo(0, 0);
              
              if (paso === 2) {
                $('body').removeClass('home');  
                $('body').addClass('general');
                //$('#container-gral').addClass('container-general');
              }
              this.paso = paso;
            },            
            verVideo (video) {
                if (video === 'I') {
                    this.videoSeleccionado = this.evento.urlVimeoVideoEng;
                } else {
                    this.videoSeleccionado = this.evento.urlVimeoVideoEsp;
                }
                if (this.paso < 3) {
                    this.irAlPaso(2);
                }
                console.debug(this.videoSeleccionado)
                
            },
            enviarPregunta: function () {
                let vm = this
                if (vm.form.pregunta && !vm.enviando) {
                    vm.enviando = true;
                    axios.post(vm.urlEnviar, vm.form)
                        .then(response => {
                            vm.enviando = false;
                            vm.form.pregunta = null;
                        }, error => {
                            vm.enviando = false;
                            // alert(error.message);
                        });                    
                }
            },
            encuestaDisponible: function() {
                let vm = this
                if (!vm.enviandoEncuesta) {
                    vm.enviandoEncuesta = true;
                    axios.get(vm.urlEncuestaDisponible)
                        .then(response => {
                            vm.enviandoEncuesta = false;
                            //document.location = vm.urlEncuesta;
                            vm.mostrarModal(true);
                        }, error => {
                            vm.enviandoEncuesta = false;
                            alert('La encuesta no se encuentra disponible por el momento.');
                        });                    
                }
            },
            linkGuatemalaDisponible: function() {
                let vm = this
                if (!vm.enviandoEncuesta) {
                    vm.enviandoEncuesta = true;
                    axios.get(vm.urlEncuestaDisponible)
                        .then(response => {
                            vm.enviandoEncuesta = false;
                            window.open('https://forms.gle/CG16pRgLH7uRThg97');
                        }, error => {
                            vm.enviandoEncuesta = false;
                            alert('El acceso no se encuentra disponible por el momento.');
                        });                    
                }
            },
            enviarEncuesta: function () {
                let vm = this
                let _incompleto = false;
                _.forEach(vm.encuesta.preguntas, function (item) {
                    if (!vm.encuesta.form['resp_' + item.key]) {
                        _incompleto = true;
                    }
                });
                if (_incompleto) {
                    alert('Debe responder todas las preguntas');
                    return false;
                }

                if (!vm.encuesta.enviando) {
                    vm.encuesta.enviando = true;
                    axios.post(vm.urlEnviarEncuesta, vm.encuesta.form)
                        .then(response => {
                            vm.encuesta.enviando = false;
                            vm.encuesta.form = {
                                resp_1: null,
                                resp_2: null,
                                resp_3: null,
                                resp_4: null,
                                resp_5: null,
                                resp_6: null,
                                resp_7: null,
                                resp_8: null,
                                resp_9: null,
                                resp_10: null,
                            };
                            alert('Gracias por responder la encuesta');
                            vm.mostrarModal(false);
                            // vm.form.pregunta = null;
                        }, error => {
                            vm.encuesta.enviando = false;
                            alert('Gracias por responder la encuesta');
                            // alert(error.message);
                        });                    
                }
            },
            mostrarModal: function(valor) {
                this.showModal = valor;
            },
            enviarSalidaUsuario: function() {
                let vm = this
                return axios.post(vm.urlEnviarSalidaUsuario,{});
            },
            obtenerOpcionesPorKey: function (key) {
                let vm = this
                let opciones = _.find(vm.encuesta.opciones,{key:key})
                return opciones.valores
            },
            certificadoDisponible: function() {
                let vm = this
                if (!vm.enviandoEncuesta) {
                    vm.enviandoEncuesta = true;
                    axios.get(vm.urlEncuestaDisponible)
                        .then(response => {
                            vm.enviandoEncuesta = false;
                            document.location = vm.evento.urlCertificado.replace('_ID_',vm.registrado.id_externo).replace('_TOKEN_',vm.registrado.token);
                            //vm.mostrarModal(true);
                        }, error => {
                            vm.enviandoEncuesta = false;
                            alert('El certificado no se encuentra disponible por el momento.');
                        });                    
                }
            },         
        }
    }
</script>
<style scoped>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}

.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
    width: 90%;
    max-width: 630px;
    margin: 0px auto;
    padding: 10px;
    background-color: #061422;
    border-radius: 2px;
    box-shadow: 0 2px 8px #e7a249;
    transition: all 0.3s ease;
    border: 1px solid #9E9E9E;
}

.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}

.modal-body {
  margin: 0;
  padding: 0;
  max-height: 500px;
  overflow-y: auto;
  background: #ccc;
}

.modal-default-button {
  float: right;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
.modal-footer {
    justify-content: center;
    padding: 0;
    background: #061422;
    border-top-color: #061422;    
}
.modal-body {
    padding: 10px;
}
.modal-body .tit-bloque {
    font-size: 20px;
    margin: 15px 0;
    display: block;
}
.modal-body .tit-seccion {
    font-size: 16px;    
    margin: 10px 0;
    display: block;    
    text-decoration: underline;
}
.modal-body .tit-pregunta {
    font-size: 14px;
    display: block;
    margin: 10px 0;    
}
.modal-body .opc-pregunta {
    font-size: 12px;    
}

.no-disponible {
    background-color: #07193d;
    /* height: 131px; */
    padding: 63px 0;
    text-align: center;
    border: 2px solid #0f3177;
}

.go-to-video {
    cursor: pointer;
    display: block;
}
</style>