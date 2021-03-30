<template>
        <div class="container">

          <div class="row">

            <div class="col-12">

              <p class="text-big">VII Curso Internacional de Gastroenterología y Endoscopía Digestiva. CIGEN 2021</p>

            </div>

          </div>

          <div class="row">

            <div class="col-12">

              <a class="btn btn-primary" href="/login">Login</a>

              <a class="btn btn-primary" href="/registro">Registro</a>

            </div>

          </div>

        </div>
</template>

<script>
    export default {
        props : {
            ahora: {
                type: String
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