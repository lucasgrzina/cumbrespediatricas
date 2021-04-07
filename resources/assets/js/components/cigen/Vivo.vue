<template>
<div>
        <!--div class="information-bar">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <p class="w-100 text-center"><b>Transmisión en VIVO</b></p>
              </div>
            </div>
          </div>
        </div-->
        <div class="container">
          <div class="row content-video" v-if="configEvento.etapa === 'R'">
            <div class="col-12">
              <div style="padding:52.73% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/447264182" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div>
            </div>
          </div>
            <div class="row mt-5 mb-5" v-else>

                <div class="col-12">

                <div class="proximamente">

                    <p>¡Próximamente!</p>

                </div>

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
                videoSeleccionado: 'ingles',
                form: {
                    pregunta: null
                },
                encuesta: {
                    preguntas: [
                        {key: 1,tit: '¿Habías escuchado hablar de Fundación Kaleidos?', preg: '', tipo: 'C', key_respuesta: 1},
                        {key: 2,tit: '¿Cómo evaluarías el contenido del webinario?', preg: '', tipo: 'C', key_respuesta: 2},
                        {key: 3,tit: '¿Cómo evaluarías la duración del webinario?', preg: '', tipo: 'C', key_respuesta: 2},
                        {key: 4,tit: '¿Cómo evaluarías la dinámica del webinario?', preg: '', tipo: 'C', key_respuesta: 2},
                        {key: 5,tit: '¿Sabías antes de comenzar el webinario que Fundación Kaleidos trabaja sobre estos temas?', preg: '', tipo: 'C', key_respuesta: 1},
                        {key: 6,tit: '¿Cuán útil es el Manual para tu trabajo?', preg: '', tipo: 'C', key_respuesta: 3},
                        {key: 7,tit: '¿Considerás importante que tus colegas conozcan esta problemática y les compartirías el Manual?', preg: '', tipo: 'C', key_respuesta: 1},
                        {key: 8,tit: '¿Te serviría un Manual sobre alguno de estos temas?', preg: '', tipo: 'C', key_respuesta: 4},


                        {key: 9,tit: 'En caso de haber seleccionado "Otro" en la pregunta anterior, ¿Sobre qué otro tema? ', preg: '', tipo: 'T'},
                        {key: 10,tit: '¿Hay otros comentarios que nos quieras hacer llegar?', preg: '', tipo: 'T'},


                    ],
                    opciones: [
                        {key: 1, 
                            valores: [
                                'Si', 'No'
                            ] 
                        },
                        {key: 2, 
                            valores: [
                                'Excelente', 'Bueno', 'Muy bueno', 'Regular','Malo'
                            ]
                        },
                        {key: 3, 
                            valores: [
                                'Alto', 'Medio', 'Bajo'
                            ]
                        },
                        {key: 4, 
                            valores: [
                                'Derechos de niños, niñas y adolescentes', 
                                'Derechos sexuales y (no) reproductivos', 
                                'Violencia de género',
                                'Educación sexual integral',
                                'Otro'
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
            }          
        }
    }
</script>
<style scoped>

</style>