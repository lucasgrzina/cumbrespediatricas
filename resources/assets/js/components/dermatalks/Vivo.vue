<template>
    <div class="container">



        <div class="content-video">

            <div class="reactions"></div>

            <iframe src="https://player.vimeo.com/video/70615841" width="840" height="400" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>

            <div class="content-reactions">
                <a @click="enviarReaccion('care')"><i class="icon-care"></i></a>
                <a @click="enviarReaccion('haha')"><i class="icon-haha"></i></a>
                <a @click="enviarReaccion('like')"><i class="icon-like"></i></a>
                <a @click="enviarReaccion('love')"><i class="icon-love"></i></a>
                <a @click="enviarReaccion('sad')"><i class="icon-sad"></i></a>
                <a @click="enviarReaccion('wow')"><i class="icon-wow"></i></a>
                <a @click="enviarReaccion('aplauso')"><i class="icon-aplauso"></i></a>
            </div>



        </div>

        <div class="content-video">
            <div class="row content-vimeo-chat" v-if="videoSeleccionado">
                <div class="col-sm-10 form-container">
                    <input type="text" class="form-control form-control-pregunta" id="pregunta" name="pregunta" placeholder="Haga su comentario aquí" v-model="form.pregunta">
                </div>
                <div class="col-sm-2 text-center">
                    <button type="button" 
                            class="btn btn-primary" 
                            @click="enviarPregunta()"
                            :disabled="!form.pregunta"
                    >
                        <i v-if="enviando" class="fa fa-spinner fa-spin fa-fw"></i> 
                        <span v-if="!enviando">ENVIAR</span>
                    </button>                    
                </div>
            </div>
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
            urlEnviarMensajeChat: {
                type: String,
                required:true
            },  
            pusherAppKey: {
                type: String,
                default: false
            }          
        },
        data () {
            return {
                actualAnimation: 0,
                videoSeleccionado: true,
                form: {
                    pregunta: null
                },
                chat: {
                    mensajes: [],
                    form: {
                        mensaje: null,
                        reaccion: false,
                        emoticon: null
                    },
                    enviando: false
                },
                encuesta: {
                    preguntas: [
                        {key: 1,tit: 'El contenido del programa es relevante para mi consultorio', preg: '', tipo: 'C', key_respuesta: 1},
                        {key: 2,tit: 'Los oradores y contenido son interesantes', preg: '', tipo: 'C', key_respuesta: 1},
                        {key: 3,tit: 'Logística y experiencia del evento: calidad audiovisual y de la transmisión son buenas y sin interrupciones', preg: '', tipo: 'C', key_respuesta: 1},
                        {key: 4,tit: 'Probablemente participaré en las ofertas visuales futuras de Abbott Nutrición', preg: '', tipo: 'C', key_respuesta: 1},
                        {key: 5,tit: 'Probablemente recomendaré este webinario a mis colegas', preg: '', tipo: 'C', key_respuesta: 1},
                        {key: 6,tit: '¿Qué temas son de mayor interés para usted relacionados con la nutrición?', preg: '', tipo: 'T'},
                        {key: 7,tit: '¿Cuál es el aprendizaje más importante en este programa que pudiera traducirse a su consultorio clínico?', preg: '', tipo: 'T'},
                        {key: 8,tit: '¿Alguna sugerencia para hacer este webinar más efectivo?', preg: '', tipo: 'T'},


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
                enviandoEncuesta: false,
                enviandoMensajeChat: false,
            }
        },
        mounted () {

            var vm = this;
            var csrfToken = $('[name=csrf-token]').attr('content');
            var isOnIOS = navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPhone/i);
            var eventName = isOnIOS ? "pagehide" : "beforeunload";    
            var usarSendBeacon = "sendBeacon" in navigator;
            var urlSalidaUsuario = vm.urlEnviarSalidaUsuario;
            
            Pusher.logToConsole = true;

            var pusher = new Pusher(this.pusherAppKey, {
                cluster: 'us2'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                console.debug(data.message);
                vm.animateIcon(data.message.reaccion);
                vm.chat.mensajes.push({
                    reaccion: data.message.reaccion
                });

            });

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
            enviarMensajeChat: function () {
                let vm = this
                if (vm.chat.form.mensaje && !vm.chat.enviando) {
                    vm.chat.enviando = true;
                    axios.post(vm.urlEnviarMensajeChat, vm.chat.form)
                        .then(response => {
                            vm.chat.enviando = false;
                            vm.chat.form.mensaje = null;
                        }, error => {
                            vm.chat.enviando = false;
                            alert(error.message);
                        });                    
                }
            },
            enviarReaccion: function (reaccion) {
                let vm = this
                let msj = _.assign({
                    mensaje: 'a',
                    reaccion: reaccion,
                    emoticon: null                    
                });

                if (!vm.chat.enviando) {
                    vm.chat.enviando = true;
                    axios.post(vm.urlEnviarMensajeChat, msj)
                        .then(response => {
                            vm.chat.enviando = false;
                            // vm.chat.form.mensaje = null;
                        }, error => {
                            vm.chat.enviando = false;
                            //alert(error.message);
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

                if (!vm.encuesta.form.resp_1 || !vm.encuesta.form.resp_2 || !vm.encuesta.form.resp_3 || !vm.encuesta.form.resp_4 || !vm.encuesta.form.resp_5 || !vm.encuesta.form.resp_6 || !vm.encuesta.form.resp_7 || !vm.encuesta.form.resp_8) {
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
            },
            animateIcon: function (icon){
                let animations = ['animate_1', 'animate_2'];

                let newElement = $('<div class="animate"><i class="icon-'+icon+'"  style="animation-name: '+animations[this.actualAnimation]+';"></i></div>');

                this.actualAnimation++;

                if (this.actualAnimation >= animations.length){
                    this.actualAnimation = 0;
                }

                console.log('actualAnimation: '+this.actualAnimation);

                $('.content-video').find('.reactions').append(newElement);

                setTimeout(function(){ 
                    newElement.remove();
                }, 3800);

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

.emoji {
  font-size: 48px;
  position: absolute;
  animation-name: surfing;
  animation-duration: 1s;
  animation-timing-function: linear;
  z-index: 9;
  right: 0;
  bottom: 0;
}

@keyframes surfing {
  from {  
    transform: translateY(0px); opacity: 1;
  }
  to {
    transform: translateY(-300px); opacity: 0;    
  }
}

</style>