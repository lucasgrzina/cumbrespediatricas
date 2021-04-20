<template>
<div class="home">
        <div class="container">

          <div class="row">

            <div class="col-12">

              <p class="text-big home">VII Curso Internacional de Gastroenterología y Endoscopía Digestiva. CIGEN 2021</p>

            </div>

          </div>
          <div class="row" v-if="loggedIn">
            <div class="col-12">
              <p class="text-big home">Viernes 16</p>
              <iframe src="https://player.vimeo.com/video/538784805" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>              
            </div>
            <div class="col-12">
              <p class="text-big home">Sábado 17</p>
              <iframe src="https://player.vimeo.com/video/538926311" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>              
            </div>

          </div>
          <div class="row" v-if="!loggedIn">

            <div class="col-12">

              <a class="btn btn-primary" href="/login">Login</a>

              <a class="btn btn-primary" href="/registro">Registro</a>

            </div>

          </div>

        </div>
        <div style="margin-bottom:100px;" v-if="!loggedIn"></div>    
</div>
</template>

<script>
    export default {
        props : {
            ahora: {
                type: String
            },
            loggedIn: {
              type: Boolean
            }
        },
        data () {
            return {
                alto: 100,
                solapa: null,
                countdownTimer: null,
                info: {
                },
                errors: [],
            }
        },
        mounted () {
        },
        methods: {
          
        }
    }
</script>
<style scoped>
</style>