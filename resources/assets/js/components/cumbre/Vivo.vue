<template>
    <div style="position:relative;">
            <header>

                <div class="top-background"></div>      
              
            </header>           
            <section>
                <div class="container center-elements-vertical show-video">
                    <div class="row">
                        <div class="col-12">
                            <div class="box-container" style="width: 100%;">
                                <div class="wrapper--box-container">
                                    <div class="row hide-video" v-if="paso === 1">
                                        <div class="col-12">
                                            <h2>Evento virtual</h2>
                                        </div>
                                        <div class="col-12">
                                            <h1>Bienvenidos<br>a cumbre NASA</h1>	
                                        </div>					
                                    </div>					

                                    <div class="row mt-2 mb-5 hide-video" v-if="paso === 1">
                                        <div class="col-12">
                                            <a class="btn btn-play ml-auto mr-auto d-table">TRANSMISIÓN EN VIVO <img width="35" src="img/nasa/play.png"></a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-5 offset-sm-1 col-lg-4 offset-lg-2">
                                            <button class="btn btn-primary ml-auto mr-auto d-table btn-idioma mb-2 mb-md-0" video="266356599" @click="verVideo('esp')">AUDIO ESPAÑOL</button>
                                        </div>
                                        <div class="col-sm-5 col-lg-4">
                                            <button class="btn btn-primary ml-auto mr-auto d-table btn-idioma" video="530943595" @click="verVideo('ingles')">AUDIO INGLÉS</button>
                                        </div>
                                    </div>	

                                    <div class="row show-video" v-if="paso === 2">
                                        <div class="col-12">
                                            <p class="text-sonido">Recuerde activar el sonido del reproductor</p>
                                        </div>
                                    </div>

                                    <div class="row show-video reproductor mt-4"  v-if="paso === 2">
                                        <div class="col-12">
                                            <div class="load-video" style="padding:56.25% 0 0 0;position:relative;">
                                                <iframe v-if="videoSeleccionado === 'ingles'" src="https://player.vimeo.com/video/547634490" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                                                <iframe v-else src="https://player.vimeo.com/video/547632700" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                                            </div>
                                            
                                        </div>
                                    </div>	
                               
                                </div>	
                            </div>
                        </div>
                    </div>
                        
                    <div class="row" style="margin-bottom:80px;"   v-if="paso === 2">
                        <div class="col-12 ">
                            <form class="show-video" onkeydown="return event.keyCode != 13;">
                                <div class="form-group">
                                    <label for="pregunta">Escriba su pregunta aquí: </label>
                                    <input type="text" class="form-control" id="pregunta" name="pregunta" v-model="form.pregunta">
                                </div>
                                <div class="form-group buttons-form text-center">
                                    <button 
                                        type="button"
                                        class="btn btn-primary" 
                                        @click="enviarPregunta()"
                                        :disabled="!form.pregunta"
                                    >
                                        <i v-if="enviando" class="fa fa-spinner fa-spin fa-fw"></i> 
                                        <span v-if="!enviando">ENVIAR</span>
                                    </button>
                                </div>
                                <div class="form-group buttons-form text-center mb-5">
                                    <button type="button" class="btn btn-primary" @click="certificadoDisponible()">Certificado</button>
                                    <button type="button" class="btn btn-primary" @click="encuestaDisponible()">Encuesta</button>
                                </div>
                                <div class="form-group buttons-form text-center mb-5">
                                    <a href="https://www.quimicavirtualevents.com/cumbrenasa" class="btn btn-primary">Volver al recorrido</a>
                                </div>                                
                            </form>
                        </div>
                    </div>	
                </div>
            </section>
            <footer class="">
                <a class="logo-footer logo-footer-desktop"><img src="img/nasa/abbott-logo.png"></a>
                <div class="bottom-background"></div>
            
            </footer>
            <div class="center-elements-vertical disc-sitio">
                <div class="row">
                    <div class="col-12">
                        <div class="mt-2">
                            <a class="logo-footer logo-footer-mobile"><img src="img/nasa/abbott-logo.png"></a>
                            Sitio web optimizado para Navegadores Google Chrome y Firefox (PC/Mac).<br>
                            Se recomienda tener actualizado el sistema operativo a la última actualización.<br>
                            Para una correcta visualización del evento en vivo,  usar el modo pantalla completa y activar el sonido en el reproductor.<br>
                            Ante cualquier duda o inconveniente escriba al <a href="https://api.whatsapp.com/send?phone=5491133003516&text=Hola" target="_blank"><img style="width:25px;" src="img/nasa/whatsapp.png"/></a> 0054 9 11  3300-3516
                        </div>
                    </div>
                </div>
            </div>

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
                                    @click="enviarEncuesta()">
                                <i v-if="encuesta.enviando" class="fa fa-spinner fa-spin fa-fw"></i> 
                                <span> {{ encuesta.enviando ? 'Enviando' : 'Enviar' }} </span>
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
            registrado: {
                type: Object,
                required: true
            },
            urlSitioPpal: {
                type: String,
                required:true
            },   
            urlEnviarSalidaUsuario: {
                type: String,
                required:true
            },         
            evento: {
                type: Object,
                required: true
            },
        },
        data () {
            return {
                paso: 1,
                videoSeleccionado: null,
                form: {
                    pregunta: null
                },
                encuesta: {
                    titulo: '',
                    subtitulo: '',
                    bloques: [
                        {
                            titulo: 'Después de participar en este Webinar, ¿qué tan de acuerdo está con las siguientes declaraciones?',
                            secciones: [
                                {
                                    titulo: '',
                                    preguntas: [
                                        {key: 1,tit: 'El contenido del webinar es relevante para mi práctica', preg: 'pre1', tipo: 'C', key_respuesta: 1},
                                        {key: 2,tit: 'Los expositores y el contenido son interesantes', preg: 'pre1', tipo: 'C', key_respuesta: 1},
                                        {key: 3,tit: 'La transmisión audiovisual es fluida y de alta calidad', preg: '', tipo: 'C', key_respuesta: 1},
                                        {key: 4,tit: 'Es probable que participe en futuros eventos virtuales de Abbott Nutrición', preg: '', tipo: 'C', key_respuesta: 1},
                                        {key: 5,tit: 'Es probable que recomiende este evento virtual a mis colegas', preg: '', tipo: 'C', key_respuesta: 1},
                                    ]
                                }
                            ]

                        },
                        {
                            titulo: '¿Qué tanto más está de acuerdo con las siguientes declaraciones después de participar en el webinario comparado con antes de participar?',
                            secciones: [
                                {
                                    titulo: 'Primera Charla',
                                    preguntas: [
                                        {key: 6,tit: 'HMB es un ingrediente comprobado que se enfoca en la recuperar, preservar y aumentar la masa muscular', preg: 'pre1', tipo: 'C', key_respuesta: 2},
                                        {key: 7,tit: 'La pérdida de masa muscular debería abordarse temprano para impactar de manera positiva los resultados clínicos', preg: 'pre1', tipo: 'C', key_respuesta: 2},
                                        {key: 8,tit: 'Los suplementos nutricionales orales han demostrado que contribuyen a prevenir la pérdida de masa muscular y mejoran los resultados clínicos', preg: '', tipo: 'C', key_respuesta: 2},
                                        {key: 9,tit: 'Minimizar la pérdida de masa muscular es importante en el manejo de pacientes con COVID-19 para mantener el estado funcional', preg: '', tipo: 'C', key_respuesta: 2},
                                        {key: 10,tit: 'La evidencia reciente en las guías ESPEN COVID-19 indica un posible impacto positivo de la actividad física en conjunto con suplementación con aminoácidos o sus metabolitos como el HMB', preg: '', tipo: 'C', key_respuesta: 2},
                                    ]
                                },
                                {
                                    titulo: 'Segunda Charla',
                                    preguntas: [
                                        {key: 11,tit: 'Las fórmulas nutricionales específicas para diabéticos, utilizadas como sustituto de comidas, han demostrado reducir significativamente la respuesta de glucosa en sangre postprandial ', preg: 'pre1', tipo: 'C', key_respuesta: 2},
                                        {key: 12,tit: 'Se ha demostrado que las fórmulas nutricionales específicas para diabéticos, como parte de un plan de intervención de estilo de vida, reducen significativamente la A1C', preg: 'pre1', tipo: 'C', key_respuesta: 2},
                                        {key: 13,tit: 'Se ha demostrado que las Fórmulas de nutrición específicas para diabéticos compuestas de carbohidratos de digestión lenta, fibras dietéticas y MUFA estimulan la secreción de GLP-1.', preg: '', tipo: 'C', key_respuesta: 2},
                                        {key: 14,tit: 'Se ha demostrado que las fórmulas de nutrición específicas para diabéticos pueden ayudar a complementar el objetivo de los medicamentos para la diabetes para ayudar a controlar los niveles de glucosa en sangre', preg: '', tipo: 'C', key_respuesta: 2},
                                        {key: 15,tit: 'Las fórmulas nutricionales específicas para diabéticos, como parte de una intervención integral de estilo de vida, mejoran múltiples resultados de salud (por ejemplo, control glucémico, peso corporal, presión arterial)', preg: '', tipo: 'C', key_respuesta: 2},
                                        {key: 16,tit: 'La terapia de nutrición médica se ha asociado con una mejor calidad de vida', preg: '', tipo: 'C', key_respuesta: 2},
                                    ]
                                },
                                {
                                    titulo: 'Proporcione su retroalimentación acerca de lo siguiente:',
                                    preguntas: [
                                        {key: 17,tit: 'Qué temas son de mayor interés para usted, relacionados con la nutrición y el impacto de COVID-19', preg: '', tipo: 'T'},
                                        {key: 18,tit: 'A medida que las restricciones relacionadas con COVID-19 comienzan a disminuir, ¿le interesaría algún tema adicional sobre el manejo nutricional de pacientes diabéticos?', preg: '', tipo: 'T'},
                                        {key: 19,tit: 'Comparta con nosotros sus conocimientos sobre el tratamiento de pacientes diabéticos durante COVID-19.', preg: '', tipo: 'T'},
                                        {key: 20,tit: '¿Cuál es el aprendizaje más importante en este evento que podría traducirse en su práctica clínica?', preg: '', tipo: 'T'},
                                        {key: 21,tit: '¿Alguna sugerencia para que el webinar sea más efectivo?', preg: '', tipo: 'T'},
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
                        },
                        {key: 2, 
                            valores: [
                                'Igual que antes', 'Ligeramente más que antes', 'Moderadamente más que antes', 'Mucho más que antes','Significativamente más que antes'
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
                enviandoEncuesta: false
            }
        },
        mounted () {
            var vm = this;
            var csrfToken = $('[name=csrf-token]').attr('content');
            var isOnIOS = navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPhone/i);
            var eventName = isOnIOS ? "pagehide" : "beforeunload";    
            var usarSendBeacon = "sendBeacon" in navigator;
            var urlSalidaUsuario = vm.urlEnviarSalidaUsuario;
            
            console.debug(vm.evento);
            console.debug(isOnIOS,eventName,usarSendBeacon,urlSalidaUsuario);
                   
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
        
        },

        methods: {
            verVideo (video) {
                this.videoSeleccionado = video;
                this.paso = 2;
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
                            alert(error.message);
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
            enviarEncuesta: function () {
                let vm = this
                let faltanContestar = false

                for(let i = 1; i <= 21; i++) {
                    if (!vm.encuesta.form['resp_'+i]) {
                        faltanContestar = true
                    }
                } 

                if (faltanContestar) {
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
                            };
                            alert('Gracias por responder la encuesta');
                            vm.mostrarModal(false);
                            // vm.form.pregunta = null;
                        }, error => {
                            vm.encuesta.enviando = false;
                            alert('Gracias por responder la encuesta');
                            vm.mostrarModal(false);
                            //alert(error.message);
                        });                    
                }
            },
            mostrarModal: function(valor) {
                this.showModal = valor;
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
            enviarSalidaUsuario: function() {
                let vm = this
                return axios.post(vm.urlEnviarSalidaUsuario,{});
            },
            obtenerOpcionesPorKey: function (key) {
                let vm = this
                let opciones = _.find(vm.encuesta.opciones,{key:key})
                return opciones.valores
            }
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

</style>