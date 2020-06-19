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
            <div class="row content-vimeo">
                <div class="col-12" v-if="videoSeleccionado">
                    <div class="contenedor_vimeo" v-if="videoSeleccionado === 'ingles'">
                        <iframe src="https://player.vimeo.com/video/430745761" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                    </div>                    
                    <div class="contenedor_vimeo" v-else>
                        <iframe src="https://player.vimeo.com/video/430757476" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                    </div>                    
                </div>
            </div>
            <div class="row content-vimeo-chat" v-if="videoSeleccionado">
                <div class="col-sm-9 form-container">
                    <input type="text" class="form-control" id="name" placeholder="Escriba su pregunta aquí" v-model="form.pregunta">
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
            <div class="row content-encuesta" v-if="videoSeleccionado">
                <div class="col-12 text-center">
                    <button type="button" 
                            class="btn btn-primary" 
                            @click="encuesta()"
                    >
                        <span>Encuesta</span>
                    </button>                    
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
            encuesta: function() {
                let vm = this
                if (!vm.enviandoEncuesta) {
                    vm.enviandoEncuesta = true;
                    axios.get(vm.urlEncuestaDisponible)
                        .then(response => {
                            //vm.enviandoEncuesta = false;
                            document.location = vm.urlEncuesta;
                        }, error => {
                            vm.enviandoEncuesta = false;
                            alert('La encuesta no se encuentra disponible por el momento.');
                        });                    
                }
            }
        }
    }
</script>
<style scoped>
</style>