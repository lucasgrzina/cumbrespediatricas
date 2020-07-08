<template>
    <div>
            <div class="row content-title">
                <div class="col-md-12 text-center">
                    <!--div class="line line--left"></div-->
                    <button type="button" class="btn btn-primary" @click="verVideo('ingles')">Audio Original Ingles</button>
                    <button type="button" class="btn btn-primary" @click="verVideo('esp')">Audio Español</button>                    

                    <!--div class="line line--right"></div-->
                </div>
            </div>
            <div class="row content-encuesta" v-if="videoSeleccionado">
                <div class="col-12 text-center">
                    <button type="button" 
                            class="btn btn-primary" 
                            @click="encuestaDisponible()"
                    >
                        <span>Encuesta</span>
                    </button>                    
                </div>

            </div>
            <div class="row content-vimeo">
                <div class="col-md-12" v-if="videoSeleccionado">
                    <span style="color:#fff;text-align:center;width:100%;margin-top: 20px;display: block;"><i class="fa fa-volume-up" aria-hidden="true"></i>Por favor, activar el sonido del reproductor</span>
                    <div class="contenedor_vimeo" v-if="videoSeleccionado === 'ingles'">
                        <iframe src="https://player.vimeo.com/video/436507223" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                    </div>                    
                    <div class="contenedor_vimeo" v-else>
                        <iframe src="https://player.vimeo.com/video/436508397" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                    </div>                    
                </div>
            </div>
            <div class="row content-vimeo-chat" v-if="videoSeleccionado">
                <div class="col-sm-9 form-container">
                    <input type="text" class="form-control" id="pregunta" name="pregunta" placeholder="Escriba su pregunta aquí" v-model="form.pregunta">
                </div>
                <div class="col-sm-3 text-center">
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

            <i class="fa fa-spinner fa-spin fa-fw" style="opacity:0;"></i>
            
            <div v-if="showModal">
                <transition name="modal">
                    <div class="modal-mask">
                    <div class="modal-wrapper">
                        <div class="modal-container">

                        <!--div class="modal-header">
                            <slot name="header">
                            default header
                            </slot>
                        </div-->

                        <div class="modal-body">
                            <div class="container-encuesta">
                                <div class="row" v-for="(item,index) in encuesta.preguntas" :key="index">
                                    <div class="col-12">
                                        <h5>{{item.key}}) {{item.tit}}</h5>
                                        <p>{{item.preg}}</p>
                                    </div>
                                    <div class="col-12">
                                        <template v-if="item.tipo === 'C'">
                                            <div class="form-check-inline" v-for="subitem in encuesta.opciones" :key="subitem.key">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" :name="'p_'+item.key+'_r_'+subitem.key" :value="subitem.key" v-model="encuesta.form['resp_' + item.key]"> {{subitem.texto}}
                                                </label>
                                            </div>
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

        },
        data () {
            return {
                videoSeleccionado: null,
                form: {
                    pregunta: null
                },
                encuesta: {
                    preguntas: [
                        {key: 1,tit: 'Mensaje (s): Contenido y claridad', preg: 'El mensaje fue claro y en términos que los puedo entender y aplicar', tipo: 'C'},
                        {key: 2,tit: 'Abbott en la Nutrición', preg: 'Puedo utilizar el conocimiento compartido utilizando  los productos de Abbott.', tipo: 'C'},
                        {key: 3,tit: 'Evaluación del evento', preg: '¿Qué le pareció la logística y experiencia de este webinar?', tipo: 'C'},
                        {key: 4,tit: '¿Qué otros temas serían de su interés?', preg: '', tipo: 'T'},
                    ],
                    opciones: [
                        {key: 5, texto: 'Excelente'},
                        {key: 4, texto: 'Bueno'},
                        {key: 3, texto: 'Regular'},
                        {key: 2, texto: 'Malo'},
                        {key: 1, texto: 'Muy malo'},
                    ],
                    form: {
                        resp_1: null,
                        resp_2: null,
                        resp_3: null,
                        resp_4: null,
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
            console.debug('Vivo mounted');
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
            enviarEncuesta: function () {
                let vm = this

                if (!vm.encuesta.form.resp_1 || !vm.encuesta.form.resp_2 || !vm.encuesta.form.resp_3 || !vm.encuesta.form.resp_4) {
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

</style>