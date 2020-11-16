<template>
    <div>
            <!--div class="row content-title">
                <div class="col-md-12 text-center">
                    <button type="button" class="btn btn-primary violeta" @click="verVideo('ingles')">Audio Original Ingles</button>
                    <button type="button" class="btn btn-primary violeta" @click="verVideo('esp')">Audio Español</button>                    
                </div>
            </div-->
            <div class="row content-encuesta" v-if="videoSeleccionado">
                <div class="col-sm-12 text-center">
                    <button type="button" 
                            class="btn btn-primary violeta" 
                            @click="encuestaDisponible()"
                    >
                        <span>Encuesta</span>
                    </button>                    
                </div>
                <!--div class="col-sm-12 text-center">
                    <button type="button" 
                            class="btn btn-primary violeta" 
                            @click="linkGuatemalaDisponible()"
                            v-if="registrado && registrado.pais === 'Guatemala'"
                    >
                        <span>Si es Médico de Guatemala, esta actividad cuenta con horas crédito, haga click aquí.</span>
                    </button>                    
                </div-->

            </div>
            <div class="row content-vimeo">
                <div class="col-md-12" v-if="videoSeleccionado">
                    <span style="color:#b26fa7;text-align:center;width:100%;margin-top: 20px;display: block;"><i class="fa fa-volume-up" aria-hidden="true"></i>Por favor, activar el sonido del reproductor</span>
                    <!--div class="wraper_video"-->
                        <div class="embed-container" v-if="videoSeleccionado === 'ingles'">
                            <div class="overlay"></div>
                            <!--iframe v-if="evento.key === 'similacmama169'" src="https://player.vimeo.com/video/457475164" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                            <iframe v-else-if="evento.key === 'similacmama179'" src="https://player.vimeo.com/video/457475561" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                            <iframe v-else-if="evento.key === 'similacmama229'" src="https://player.vimeo.com/video/460540053" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe-->
                            <iframe src="https://player.vimeo.com/video/479842544" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                        </div>                    
                        <div class="embed-container" v-else>
                            <iframe src="https://player.vimeo.com/video/455802173" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                        </div>                    
                    <!--/div-->
                </div>
                <div class="col-md-12" v-else>
                    <span class="disc-video">
                        <i class="fa fa-arrow-up" aria-hidden="true"></i> 
                        Para ver el evento, seleccione en los botones de arriba la opción de audio
                    </span>
                </div>                
            </div>
            <div class="row content-vimeo-chat" v-if="videoSeleccionado">
                <div class="col-sm-9 form-container">
                    <input type="text" class="form-control input-pregunta" id="pregunta" name="pregunta" placeholder="Escriba su pregunta aquí" v-model="form.pregunta">
                </div>
                <div class="col-sm-3 text-center">
                    <button type="button" 
                            class="btn btn-primary dorado" 
                            @click="enviarPregunta()"
                            :disabled="!form.pregunta"
                    >
                        <i v-if="enviando" class="fa fa-spinner fa-spin fa-fw"></i> 
                        <span v-if="!enviando">ENVIAR</span>
                    </button>                    
                </div>
            </div>

            <i class="fa fa-spinner fa-spin fa-fw" style="opacity:0;"></i>
            
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
                                <div class="row" v-for="(item,index) in encuesta.preguntas" :key="index">
                                    <div class="col-12">
                                        <h5>{{item.key}}) {{item.tit}}</h5>
                                        <p>{{item.preg}}</p>
                                    </div>
                                    <div class="col-12">
                                        <template v-if="item.tipo === 'C'">
                                            <template v-for="(subitem, indexOpt) in encuesta.opciones[index].valores">
                                            <div class="form-check-inline" :key="'opt_' + indexOpt">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" :name="'p_'+item.key+'_r_'+ indexOpt" :value="subitem" v-model="encuesta.form['resp_' + item.key]"> {{subitem}}
                                                </label>
                                            </div>
                                            <br :key="indexOpt">
                                            </template>
                                            
                                        </template>
                                        <template v-else>
                                            <textarea class="form-control" :name="'p_'+item.key" v-model="encuesta.form['resp_' + item.key]"></textarea>
                                        </template>
                                    </div>
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
            }          

        },
        data () {
            return {
                videoSeleccionado: 'ingles',
                form: {
                    pregunta: null
                },
                encuesta: {
                    preguntas: [
                        {key: 1,tit: 'El contenido del programa es relevante para mi consultorio', preg: '', tipo: 'C'},
                        {key: 2,tit: 'Los oradores y contenido son interesantes', preg: '', tipo: 'C'},
                        {key: 3,tit: 'Logística y experiencia del evento: calidad audiovisual y de la transmisión son buenas y sin interrupciones', preg: '', tipo: 'C'},
                        {key: 4,tit: 'Probablemente participaré en las ofertas visuales futuras de Abbott Nutrición', preg: '', tipo: 'C'},
                        {key: 5,tit: 'Probablemente recomendaré este webinario a mis colegas', preg: '', tipo: 'C'},
                        {key: 6,tit: '¿Qué temas son de mayor interés para usted relacionados con la nutrición?', preg: '', tipo: 'T'},
                        {key: 7,tit: '¿Cuál es el aprendizaje más importante en este programa que pudiera traducirse a su consultorio clínico?', preg: '', tipo: 'T'},
                        {key: 8,tit: '¿Alguna sugerencia para hacer este webinar más efectivo?', preg: '', tipo: 'T'},

                    ],
                    opciones: [
                        {key: 1, 
                            valores: [
                                'Totalmente de acuerdo', 'De acuerdo', 'Ni en desacuerdo ni de acuerdo', 'En desacuerdo','Totalmente en desacuerdo'
                            ] 
                        },
                        {key: 2, 
                            valores: [
                                'Totalmente de acuerdo', 'De acuerdo', 'Ni en desacuerdo ni de acuerdo', 'En desacuerdo','Totalmente en desacuerdo'
                            ]
                        },                        
                        {key: 3, 
                            valores: [
                                'Totalmente de acuerdo', 'De acuerdo', 'Ni en desacuerdo ni de acuerdo', 'En desacuerdo','Totalmente en desacuerdo'
                            ]
                        },
                        {key: 4, 
                            valores: [
                                'Totalmente de acuerdo', 'De acuerdo', 'Ni en desacuerdo ni de acuerdo', 'En desacuerdo','Totalmente en desacuerdo'
                            ]
                        },      
                        {key: 5, 
                            valores: [
                                'Totalmente de acuerdo', 'De acuerdo', 'Ni en desacuerdo ni de acuerdo', 'En desacuerdo','Totalmente en desacuerdo'
                            ]
                        },                                            
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
            console.debug(vm.evento);
            var csrfToken = $('[name=csrf-token]').attr('content');
            var isOnIOS = navigator.userAgent.match(/iPad/i)|| navigator.userAgent.match(/iPhone/i);
            var eventName = isOnIOS ? "pagehide" : "beforeunload";    
            var usarSendBeacon = "sendBeacon" in navigator;
            var urlSalidaUsuario = vm.urlEnviarSalidaUsuario;
            
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
                            };
                            alert('Gracias por responder la encuesta');
                            vm.mostrarModal(false);
                            // vm.form.pregunta = null;
                        }, error => {
                            vm.encuesta.enviando = false;
                            
                            alert(error.message);
                        });                    
                }
            },
            mostrarModal: function(valor) {
                this.showModal = valor;
            },
            enviarSalidaUsuario: function() {
                let vm = this
                return axios.post(vm.urlEnviarSalidaUsuario,{});
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
    background-color: #4e2149;
    border-radius: 2px;
    box-shadow: 0 2px 8px #7c666c;
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
    background: #4e2149;
    border-top-color: #4e2149;    
}

</style>