<template>
    <div class="h-100">
        <nav class="navbar  navbar-dark menu-mobile px-0">
                <button class="navbar-toggler" type="button" @click="mostrarMenu()">
                    <img src="img/abbottnight/bars-solid.png" style="max-width: 25px;" width="25px">
                </button>
                <div class="navbar-collapse hidden" id="navbarNav">
                    

                    <ul class="navbar-nav navbar-nav-menu px-3 py-2" :style="{'height':alto+'px'}">
                        <li class="nav-item">
                            <img src="img/abbottnight/logo.png" style="max-width:150px;">
                            <button type="button" class="close btn-close-menu" aria-label="Close" @click="cerrarMenu()">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </li>
                        <li class="nav-item py-3"></li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" @click="mostrarSolapa(1)">Representantes de cada pais</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" @click="mostrarSolapa(2)">Conocea los Speakers</a>                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" @click="mostrarSolapa(3)">Ver agenda</a>
                        </li>   
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0);" @click="mostrarSolapa(4)">Trivia</a>
                        </li>                        
                        
                    </ul>
                </div>

        </nav>          
	  <section>
        <div class="modal" id="modal-solapas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <img src="img/abbottnight/modal-cerrar.png">
                        </button>
                    </div>
                    <div class="modal-body" v-if="solapa === 1">
                        <div class="row">
                            <div class="col-12 p-0">
                                <img src="img/abbottnight/representantes.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="modal-body" v-if="solapa === 2">
                        <div class="row">
                            <div class="col-12 p-0">
                                <img src="img/abbottnight/speakers.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="modal-body" v-if="solapa === 3">
                        <div class="row">
                            <div class="col-12 p-0">
                                <img src="img/abbottnight/agenda.jpg">
                            </div>
                        </div>
                        
                    </div>  
                    <div class="modal-body" v-if="solapa === 4">
                        <h2>TRIVIA</h2>
                        <div class="row p-3 trivia-bg-logo" v-for="(item,index) in trivia.contenido" :key="index">
                            <div class="col-12 text-center ">
                                <img :src="item.imagen">
                            </div>

                            <div class="col-12" v-for="(subitem, indexOpt) in item.preguntas" :key="indexOpt">
                                <h6><span class="trivia-nro-preg">{{subitem.key}}.</span>{{subitem.texto}}</h6>
                                <template v-for="(opcion, indexOpc) in subitem.opciones">
                                    <div class="form-check-inline" :key="'opt_' + indexOpc">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" :name="'g_'+item.key+'_p_'+subitem.key+'_r_'+ indexOpt" :value="opcion.key" v-model="subitem.keySeleccionada"> {{opcion.texto}} <span v-if="subitem.keySeleccionada === opcion.key && trivia.enviado" :class="{'badge':true,'badge-success': opcion.correcta,'badge-danger':!opcion.correcta}">{{opcion.correcta ? 'CORRECTO' : 'INCORRECTO'}}</span>
                                        </label>
                                    </div>
                                    <br :key="indexOpc">
                                </template> 
                                <div class="trivia-separador"></div>
                            </div>
                        </div>  
                        <div class="row px-3 mb-3">
                            <div class="col-12 text-center">
                                <button type="button" 
                                        class="btn btn-primary" 
                                        @click="enviarTrivia()">
                                    <i v-if="trivia.enviando" class="fa fa-spinner fa-spin fa-fw"></i> 
                                    <span> {{ trivia.enviando ? 'Enviando' : 'Enviar' }} </span>
                                </button>                                
                            </div>    
                        </div> 
                        <div class="row" v-if="trivia.enviado">
                            <div class="col-12">
                                <p class="p-sin-estilo text-center"><strong>Su trivia ya fue enviada. Muchas Gracias!</strong></p>    
                            </div>    
                        </div>                                                                        
                        <div class="row">
                            <div class="col-12 foot"></div>
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
                </div>
            </div>
        </div> 
        
	  	<div class="container-fluid h-100">
            <div id="video-ppal">
                <iframe width="838" height="470" src="https://www.youtube.com/embed/OjQ5FeDxNrA?enablejsapi=1" frameborder="0"></iframe>
            </div>
            
            <div class="banners-pub" id="banner-pub-1">
                <img src="img/abbottnight/banners/der.gif" loop="infinite">
            </div>
            <div class="banners-pub" id="banner-pub-2">
                <img src="img/abbottnight/banners/izq.gif" loop="infinite">
            </div>   
            <a class="lnk-cartel" id="lnk-cartel-1" href="javascript:void(0);" @click="mostrarSolapa(1)">
            </a>         
            <a class="lnk-cartel" id="lnk-cartel-2" href="javascript:void(0);" @click="mostrarSolapa(2)">
            </a>         
            <a class="lnk-mostrador" id="lnk-mostrador-1" href="javascript:void(0);" @click="mostrarSolapa(3)">
            </a>         
            <a class="lnk-mostrador" id="lnk-mostrador-2" href="javascript:void(0);" @click="mostrarSolapa(4)">
            </a>   
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
            evento: {
                type: Object,
                required: true
            },
            urlEnviarTrivia: {
                type: String
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
                trivia: {
                    contenido: [
                        {
                            key: 1,
                            imagen: 'img/abbottnight/logo_1.png',
                            titulo: 'SIMILAC',
                            preguntas: [
                                {
                                    key: 1,
                                    texto: '¿El HMO 2’- FL respalda el desarrollo del sistema inmune y apoya la disminución de problemas de tolerancia gastrointestinal por su efecto (s)?',
                                    opciones: [
                                        {key: 'a', texto:'De prevenir  la adhesión de patógenos, ayudando a reducir el riesgo de infecciones.',correcta: false},
                                        {key: 'b', texto:'De interactuar con el sistema inmune intestinal y a nivel sistémico, modulando su respuesta y favoreciendo su adecuada maduración.',correcta: false},
                                        {key: 'c', texto:'De promover el desarrollo de una microbiota saludable al actuar como prebiótico, reduciendo el riesgo de infecciones.',correcta: false},
                                        {key: 'd', texto:'Todas las anteriores',correcta: true},
                                    ],
                                    keySeleccionada: null,
                                }, {
                                    key: 2,
                                    texto: 'Todas las fórmulas parcialmente hidrolizadas del mercado comparten las mismas características de composición nutricional de macronutrientes',
                                    opciones: [
                                        {key: 'a', texto:'Verdadero',correcta: false},
                                        {key: 'b', texto:'Falso',correcta: true},
                                    ],
                                    keySeleccionada: null,
                                },
                            ]
                        },
                        {
                            key: 2,
                            imagen: 'img/abbottnight/logo_2.png',
                            titulo: 'PEDIASURE',
                            preguntas: [
                                {
                                    key: 1,
                                    texto: 'Los factores del entorno, como la nutrición juegan un rol clave que pueden impactar en el crecimiento y el desarrollo en un porcentaje cercano a',
                                    opciones: [
                                        {key: 'a', texto:'60%',correcta: true},
                                        {key: 'b', texto:'40%',correcta: false},
                                        {key: 'c', texto:'50%',correcta: false},
                                    ],
                                    keySeleccionada: null,
                                }, {
                                    key: 2,
                                    texto: 'La intervención nutricional temprana es una estrategia que permite evitar consecuencias a largo plazo',
                                    opciones: [
                                        {key: 'a', texto:'Pobre desarrollo cognitivo',correcta: false},
                                        {key: 'b', texto:'Pobre desarrollo cognitivo',correcta: false},
                                        {key: 'c', texto:'Baja autoestima',correcta: false},
                                        {key: 'd', texto:'Talla baja',correcta: false},
                                        {key: 'e', texto:'Todas las anteriores',correcta: true},
                                    ],
                                    keySeleccionada: null,
                                },
                            ]
                        },
                        {
                            key: 3,
                            imagen: 'img/abbottnight/logo_5.png',
                            titulo: 'PEDIALYTE',
                            preguntas: [
                                {
                                    key: 1,
                                    texto: 'Cuantos miliequivalentes mínimos de sodio se requieren para rehidratar en deshidratación causada por vómito o diarrea?',
                                    opciones: [
                                        {key: 'a', texto:'60',correcta: true},
                                        {key: 'b', texto:'40',correcta: false},
                                        {key: 'c', texto:'50',correcta: false},
                                        {key: 'd', texto:'90',correcta: false},
                                    ],
                                    keySeleccionada: null,
                                }, {
                                    key: 2,
                                    texto: 'Para rehidratación causada por sol y calor se recomiendan soluciones de:',
                                    opciones: [
                                        {key: 'a', texto:'60 mEq Sodio',correcta: false},
                                        {key: 'b', texto:'40 mEq Sodio',correcta: false},
                                        {key: 'c', texto:'30 mEq Sodio',correcta: true},
                                        {key: 'd', texto:'90 mEq Sodio',correcta: false},
                                    ],
                                    keySeleccionada: null,
                                },
                            ]
                        },
                        {
                            key: 4,
                            imagen: 'img/abbottnight/logo_3.png',
                            titulo: 'ENSURE ADVANCE',
                            preguntas: [
                                {
                                    key: 1,
                                    texto: 'Son los mecanismos de acción del HMB:',
                                    opciones: [
                                        {key: 'a', texto:'Incrementa la síntesis proteica',correcta: false},
                                        {key: 'b', texto:'Disminuye la degradación de proteína',correcta: false},
                                        {key: 'c', texto:'Estabiliza la membrana del músculo',correcta: false},
                                        {key: 'd', texto:'Todas son correctas',correcta: true},
                                    ],
                                    keySeleccionada: null,
                                }, {
                                    key: 2,
                                    texto: 'Ensure Advance aporta de HMB en una toma:',
                                    opciones: [
                                        {key: 'a', texto:'3 gramos',correcta: false},
                                        {key: 'b', texto:'1,5 gramos',correcta: true},
                                        {key: 'c', texto:'6 gramos',correcta: false},
                                    ],
                                    keySeleccionada: null,
                                },
                            ]
                        },
                        {
                            key: 5,
                            imagen: 'img/abbottnight/logo_4.png',
                            titulo: 'GLUCERNA',
                            preguntas: [
                                {
                                    key: 1,
                                    texto: '¿La suplementación nutricional complementaria con fórmulas específica para la diabetes son parte del tratamiento Integral de la Diabetes?',
                                    opciones: [
                                        {key: 'a', texto:'Verdadero',correcta: true},
                                        {key: 'b', texto:'Falso',correcta: false},
                                    ],
                                    keySeleccionada: null,
                                }, {
                                    key: 2,
                                    texto: '¿Algunos nutrientes estimulan de manera significativa una mayor secreción natural de GLP1?',
                                    opciones: [
                                        {key: 'a', texto:'Verdadero',correcta: true},
                                        {key: 'b', texto:'Falso',correcta: false},
                                    ],
                                    keySeleccionada: null,
                                },
                            ]
                        }                                                 

                    ],
                    enviando: false,
                    enviado: false,
                    errors: [],
                }
            }
        },
        mounted () {
            this.alto = $( window ).height(); 
            
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
                
                this.solapa = solapa;
                this.$nextTick(function () {
                    $('#modal-solapas').modal('show');
                    
                });
                
            },
            mostrarMenu () {
                $('.navbar-nav-menu').addClass('opened');
            },
            cerrarMenu() {
                $('.navbar-nav-menu').removeClass('opened');
            },
            alCerrarModal () {
                this.trivia.enviado = false;
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
            enviarTrivia: function () {
                let vm = this
                let incompleto = false;

                _.forEach(vm.trivia.contenido,function (item) {
                    _.forEach(item.preguntas, function(preg) {
                        if(!preg.keySeleccionada) {
                            incompleto = true;
                        }
                    })
                });


                if (incompleto) {
                    alert('Debe responder todas las preguntas');
                    return false;
                }
                

                if (!vm.trivia.enviando) {
                    vm.trivia.enviando = true;
                    axios.post(vm.urlEnviarTrivia, vm.trivia.contenido)
                        .then(response => {
                            vm.trivia.enviando = false;
                            alert('Gracias por responder la trivia');
                            vm.trivia.enviado = true;
                            //vm.mostrarModal(false);
                            // vm.form.pregunta = null;
                        }, error => {
                            vm.trivia.enviando = false;
                            vm.trivia.enviado = false;
                            alert(error.message);
                        });                    
                }
            },  
            obtenerOpcionesPorKey: function (key) {
                let vm = this
                let opciones = _.find(vm.trivia.opciones,{key:key})
                return opciones.valores
            }                      
        }
    }
</script>
<style scoped>
</style>