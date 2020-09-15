<template>
    <div>
<section class="text-center">
	  	<div class="container h-auto">
		    <div class="row">
		    	<div class="col-12">
		    		<div class=" view-03">
				  		<div class="row">
					    	<div class="col-12">
								<div class="video-content" v-if="videoSeleccionado === 'ingles'">
									<iframe v-if="evento.key === 'danonedaytest'" src="https://player.vimeo.com/video/457472926?transparent=0" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                                    <iframe v-else src="https://player.vimeo.com/video/457473449?transparent=0" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
								</div>
					    	</div>
				    	</div>
				  		
				  	</div>
		    	</div>
		    </div>
	    </div>        
	    <div class="container container-extended h-auto">
	    	<div class="row">
		    	<div class="col-12 mb-0">
		    		<div class="row">
		    			<div class="col-lg-7 bg-form-video pt-4 pb-2">
				    		<form class="d-flex align-items-center">
			    				<div class="form-group mb-0 mt-2 mt-md-2">
								    <input type="text" class="form-control" placeholder="Escribí tu respuesta acá..." name="pregunta" v-model="form.pregunta">
								</div>
							  	<button type="button" class="btn btn-secondary" @click="enviarPregunta()" :disabled="enviando"><img :src="evento.key === 'danonedaytest' ? '../img/danoneday/arrow.png' : 'img/danoneday/arrow.png'"></button>
							</form>
						</div>
						<div class="col-lg-5 text-right pr-0">
							<img :src="evento.key === 'danonedaytest' ? '../img/danoneday/logo-2.png' : 'img/danoneday/logo-2.png'">
						</div>
					</div>

		    	</div>
	    	</div>
	    </div>
	    
	    
	    
	  </section>
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
                        {key: 5, texto: 'Totalmente de acuerdo'},
                        {key: 4, texto: 'De acuerdo'},
                        {key: 3, texto: 'Ni en desacuerdo ni de acuerdo'},
                        {key: 2, texto: 'En desacuerdo'},
                        {key: 1, texto: 'Totalmente en desacuerdo'},
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
            $('#body').removeClass("home").addClass("video");
            var vm = this;
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
                            alert(error.response.data.message);
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