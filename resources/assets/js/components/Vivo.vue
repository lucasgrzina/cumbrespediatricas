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
                <div class="col-sm-9" v-if="videoSeleccionado">
                    <div class="contenedor_vimeo" v-if="videoSeleccionado === 'ingles'">
                        <iframe src="https://player.vimeo.com/video/430745761" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                    </div>                    
                    <div class="contenedor_vimeo" v-else>
                        <iframe src="https://player.vimeo.com/video/260952455" frameborder="0" allow="autoplay; fullscreen" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                    </div>                    
                </div>
                <div class="col-sm-3" v-if="videoSeleccionado">
                    <div class="contenedor_vimeo vimeo_chat">
                        <iframe src="https://vimeo.com/live-chat/430745761/1995d3f56a" width="400" height="600" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
                
    </div>
</template>

<script>
    export default {
        props : {
        },
        data () {
            return {
                videoSeleccionado: null
            }
        },
        mounted () {
            console.debug('Vivo mounted');
        },
        methods: {
            verVideo (video) {
                this.videoSeleccionado = video;
            }
        }
    }
</script>
<style scoped>
</style>