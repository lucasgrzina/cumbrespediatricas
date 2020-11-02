<template>
    <div>
        <header class="">
            <div class="top-header"></div>
        </header>        
        <section class="">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <div class="row video-content">
                            <div class="col-12">
                                <p>Por favor active el sonido del reproductor <span class="icon-sound"></span></p>
                            </div>
                            <div class="col-12">
                                <div class="video">
                                    <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/474661599" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="row mb-video video-footer">
                    <div class="col-12 mt-3">
                        <div class="row">
                            <div class="col-md-5 bg-form-video ">
                                <form class="d-flex align-items-center">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Escribe tu pregunta aqui" name="pregunta" v-model="form.pregunta">
                                    </div>
                                    <button 
                                        type="button" 
                                        class="btn btn-secondary"
                                        @click="enviarPregunta()"
                                        :disabled="!form.pregunta"
                                        >
                                        <span class="icon-send"></span>
                                    </button>
                                   
                                </form>
                            </div>
                            <div class="col col-md-4 bg-form-video d-flex align-items-center">
                                <button 
                                    type="button" 
                                    class="btn btn-primary btn-certificado"
                                    v-if="registrado"
                                    @click="certificadoDisponible()">
                                    DESCARGA TU CERTIFICADO
                                </button>
                            </div>
                            <div class="col-md-3 text-right pr-0 logo d-flex align-items-center">
                                <button 
                                    type="button" 
                                    class="btn btn-primary btn-certificado"
                                    @click="encuestaDisponible()">
                                    ENCUESTA
                                </button>
                            </div>
                            
                            <div class="col-md-12 text-center pr-0 logo">
                                <img class="logo-img" src="/img/abbottnight/logo.png" style="max-width:200px">
                            </div>
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
                                <div class="row" v-for="(item,index) in encuesta.preguntas" :key="index">
                                    <div class="col-12">
                                        <h5>{{item.key}}) {{item.tit}}</h5>
                                        <p>{{item.preg}}</p>
                                    </div>
                                    <div class="col-12">
                                        <template v-if="item.tipo === 'C'">
                                            <template v-for="(subitem, indexOpt) in obtenerOpcionesPorKey(item.key_respuesta)">
                                                <pretty-radio class="p-default p-color p-round" :name="'p_'+item.key+'_r_'+ indexOpt" :value="subitem" v-model="encuesta.form['resp_' + item.key]" :key="'opt_' + indexOpt">{{subitem}}</pretty-radio>
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
        </section>
        <footer >
            <div class="container">
                <div class="row logos">
                    <div class="col pl-1 pr-1">
                        <a><img src="/img/abbottnight/logo_3.png"></a>
                    </div>

                    <div class="col pl-1 pr-1">
                        <a><img src="/img/abbottnight/logo_2.png"></a>
                    </div>

                    <div class="col pl-1 pr-1">
                        <a><img src="/img/abbottnight/logo_1.png"></a>
                    </div>

                    <div class="col pl-1 pr-1">
                        <a><img src="/img/abbottnight/logo_4.png"></a>
                    </div>

                    <div class="col pl-1 pr-1">
                        <a><img src="/img/abbottnight/logo_5.png"></a>
                    </div>                    
                </div>
            </div>
        </footer>    
    </div>
    
</template>

<script>
    import PrettyRadio from 'pretty-checkbox-vue/radio';
    export default {
        components: {
            PrettyRadio
        },
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
            urlEnviarSalidaUsuario: {
                type: String,
                required:true
            },         
            evento: {
                type: Object,
                required: true
            },
            urlDescargarCertificado : {
                type: String,
                required:true                
            }
        },
        data () {
            return {
                videoSeleccionado: null,
                form: {
                    pregunta: null
                },
                encuesta: {
                    preguntas: [
                        /*{key: 1,tit: 'El contenido del programa es relevante para mi consultorio', preg: '', tipo: 'C', key_respuesta: 1},
                        {key: 2,tit: 'Los oradores y contenido son interesantes', preg: '', tipo: 'C', key_respuesta: 1},
                        {key: 3,tit: 'Logística y experiencia del evento: calidad audiovisual y de la transmisión son buenas y sin interrupciones', preg: '', tipo: 'C', key_respuesta: 1},
                        {key: 4,tit: 'Probablemente participaré en las ofertas visuales futuras de Abbott Nutrición', preg: '', tipo: 'C', key_respuesta: 1},
                        {key: 5,tit: 'Probablemente recomendaré este webinario a mis colegas', preg: '', tipo: 'C', key_respuesta: 1},
                        {key: 6,tit: '¿Qué temas son de mayor interés para usted relacionados con la nutrición?', preg: '', tipo: 'T'},
                        {key: 7,tit: '¿Cuál es el aprendizaje más importante en este programa que pudiera traducirse a su consultorio clínico?', preg: '', tipo: 'T'},
                        {key: 8,tit: '¿Alguna sugerencia para hacer este webinar más efectivo?', preg: '', tipo: 'T'},*/
                        {key: 1,tit: 'El contenido del webinar es relevante para mi práctica', preg: '', tipo: 'C', key_respuesta: 1},
                        {key: 2,tit: 'Los expositores y el contenido son interesantes', preg: '', tipo: 'C', key_respuesta: 1},
                        {key: 3,tit: 'La transmisión audiovisual es fluida y de alta calidad', preg: '', tipo: 'C', key_respuesta: 1},
                        {key: 4,tit: 'Es probable que participe en futuros eventos virtuales de Abbott Nutrición', preg: '', tipo: 'C', key_respuesta: 1},
                        {key: 5,tit: 'Es probable que recomiende este evento virtual a mis colegas', preg: '', tipo: 'C', key_respuesta: 1},

                        {key: 6,tit: 'HMB es un ingrediente comprobado que se enfoca en la recuperar, preservar y aumentar la masa muscular', preg: '', tipo: 'C', key_respuesta: 2},
                        {key: 7,tit: 'La pérdida de masa muscular debería abordarse temprano para impactar de manera positiva los resultados clínicos', preg: '', tipo: 'C', key_respuesta: 2},
                        {key: 8,tit: 'Los suplementos nutricionales orales han demostrado que contribuyen a prevenir la pérdida de masa muscular y mejoran los resultados clínicos', preg: '', tipo: 'C', key_respuesta: 2},
                        {key: 9,tit: 'Minimizar la pérdida de masa muscular es importante en el manejo de pacientes con COVID-19 para mantener el estado funcional', preg: '', tipo: 'C', key_respuesta: 2},
                        {key: 10,tit: 'La evidencia reciente en las guías ESPEN COVID-19 indica un posible impacto positivo de la actividad física en conjunto con suplementación con aminoácidos o sus metabolitos como el HMB', preg: '', tipo: 'C', key_respuesta: 2},

                        {key: 11,tit: 'Las fórmulas nutricionales específicas para diabéticos, utilizadas como sustituto de comidas, han demostrado reducir significativamente la respuesta de glucosa en sangre postprandial ', preg: '', tipo: 'C', key_respuesta: 2},
                        {key: 12,tit: 'Se ha demostrado que las fórmulas nutricionales específicas para diabéticos, como parte de un plan de intervención de estilo de vida, reducen significativamente la A1C', preg: '', tipo: 'C', key_respuesta: 2},
                        {key: 13,tit: 'Se ha demostrado que las Fórmulas de nutrición específicas para diabéticos compuestas de carbohidratos de digestión lenta, fibras dietéticas y MUFA estimulan la secreción de GLP-1.', preg: '', tipo: 'C', key_respuesta: 2},
                        {key: 14,tit: 'Se ha demostrado que las fórmulas de nutrición específicas para diabéticos pueden ayudar a complementar el objetivo de los medicamentos para la diabetes para ayudar a controlar los niveles de glucosa en sangre', preg: '', tipo: 'C', key_respuesta: 2},
                        {key: 15,tit: 'Las fórmulas nutricionales específicas para diabéticos, como parte de una intervención integral de estilo de vida, mejoran múltiples resultados de salud (por ejemplo, control glucémico, peso corporal, presión arterial)', preg: '', tipo: 'C', key_respuesta: 2},
                        {key: 16,tit: 'La terapia de nutrición médica se ha asociado con una mejor calidad de vida', preg: '', tipo: 'C', key_respuesta: 2},


                        {key: 17,tit: '¿Qué temas son de mayor interés para usted, relacionados con la nutrición y el impacto de COVID-19?', preg: '', tipo: 'T'},
                        {key: 18,tit: 'A medida que las restricciones relacionadas con COVID-19 comienzan a disminuir, ¿le interesaría algún tema adicional sobre el manejo nutricional de pacientes diabéticos?', preg: '', tipo: 'T'},
                        {key: 19,tit: 'Comparta con nosotros sus conocimientos sobre el tratamiento de pacientes diabéticos durante COVID-19.', preg: '', tipo: 'T'},
                        {key: 20,tit: '¿Cuál es el aprendizaje más importante en este evento que podría traducirse en su práctica clínica?', preg: '', tipo: 'T'},
                        {key: 21,tit: '¿Alguna sugerencia para que el webinar sea más efectivo? ', preg: '', tipo: 'T'},



                    ],
                    opciones: [
                        /*{key: 1, 
                            valores: [
                                'Totalmente en desacuerdo', 'En desacuerdo', 'Ni en desacuerdo ni de acuerdo', 'De acuerdo','Totalmente de acuerdo'
                            ] 
                        },
                        {key: 2, 
                            valores: [
                                'Igual que antes', 'Ligeramente más que antes', 'Moderadamente más que antes', 'Mucho más que antes','Significativamente más que antes'
                            ]
                        }*/
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
            
            var imgFondoDesk = new Image();
            
            //$('.navbar-nav-menu').style(this.alto);
            imgFondoDesk.onload = function(){
                
                setTimeout(function () {
                    $('body').addClass('fondo-body');
                }, 1);
                
            };
            imgFondoDesk.src = '/public/img/abbottnight/background.jpg';            

                   
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
            enviarEncuesta: function () {
                let vm = this
                let contestoAlMenosUna = false;

                for (var i=1; i<=21; i++) {
                    if (vm.encuesta.form['resp_' + i]) {
                        contestoAlMenosUna = true;
                    }
                }

                if (!contestoAlMenosUna) {
                    alert('Debe responder al menos una pregunta');
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
            certificadoDisponible: function() {
                let vm = this
                if (!vm.enviandoEncuesta) {
                    vm.enviandoEncuesta = true;
                    axios.get(vm.urlEncuestaDisponible)
                        .then(response => {
                            vm.enviandoEncuesta = false;
                            document.location = vm.urlDescargarCertificado;
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

</style>