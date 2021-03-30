<template>
        <div class="container">

          <div class="row">

            <div class="col-md-12">

              <form>

                <div class="form-group row">

                  <label for="nombre_apellido" class="col-md col-12">NOMBRE Y APELLIDO</label>

                  <div class="col-md col-12">

                    <input type="text" name="nombre_apellido" class="form-control-plaintext" id="nombre_apellido" v-model="registro.form.nombre">

                  </div>

                </div>

                <div class="form-group row">

                  <label for="institucion_trabaja" class="col-md col-12">Institución donde trabaja</label>

                  <div class="col-md col-12">

                    <input type="text" name="institucion_trabaja" class="form-control-plaintext" id="institucion_trabaja" v-model="registro.form.institucion">

                  </div>

                </div>

                <div class="form-group row">

                  <label for="pais" class="col-md col-12">país</label>

                  <div class="col-md col-12">

                    <input type="text" name="pais" class="form-control-plaintext" id="pais" v-model="registro.form.pais">

                  </div>

                </div>

                <div class="form-group row">

                  <label for="mail" class="col-md col-12">correo electrónico</label>

                  <div class="col-md col-12">

                    <input type="text" name="mail" class="form-control-plaintext" id="mail"  v-model="registro.form.email">

                  </div>

                </div>

                <div class="form-group row">

                  <label for="inputPassword" class="col-md col-12">Contraseña</label>

                  <div class="col-md col-12">

                    <input type="password" class="form-control" id="inputPassword" placeholder="" v-model="registro.form.password">

                  </div>

                </div>

                

                <div class="row">

              <div class="col-12">

                <div class="content-buttons-form">

                  <button type="button" class="btn btn-primary" @click="registrar">inscribirse</button>

                  <a class="btn btn-light" href="#">Olvidé mi contraseña</a>

                </div>

              </div>

            </div>

              </form>

            

              



            </div>

            </div>

            

          </div>

</template>

<script>
    export default {
        props : {
            keyRecaptcha: {
                type: String
            },
            urlLogin: {
                type: String,
                required: true
            },
            urlRegistrar: {
                type: String,
                required: true
            },
            urlHome: {
                type: String,
                required: true
            }                           
        },
        data () {
            return {
                vista: 'registro',
                registro: {
                    form: {
                        nombre: null,
                        institucion: null,
                        pais: null,
                        email: null,
                        password: null
                    },
                    enviado: false,
                    enviando: false
                },
                info: {
                },
                errors: [],
            }
        },
        mounted () {
            console.debug('Registro mounted');
        },
        methods: {

            checkForm: function (e) {
                let vm = this;
                let form = vm.registro.form;
                this.errors = [];


                if (!form.nombre || !form.institucion || !form.email || !form.password || !form.pais ) {
                    alert('Todos los campos son obligatorios');
                    return false;
                }


                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                                
                if (!re.test(form.email)) {
                    alert('El formato del email es incorrecto.');
                    return false;
                }
                return true;
                
            },            
            registrar (e) {
                e.preventDefault();
                let vm = this
                let form = this.registro.form;
                if (form.enviando) {
                    return false;
                }
                if (this.checkForm()) {
                    form.enviando = true;
                    grecaptcha.ready(function() {
                        grecaptcha.execute(vm.keyRecaptcha, {action: 'submit'}).then(function(token) {
                            // Add your logic to submit to your backend server here.
                            if (token) {
                                axios.post(vm.urlRegistrar, form)
                                    .then(response => {
                                        console.debug(response);
                                        form.enviando = false;
                                        document.location = vm.urlHome;
                                    }, error => {
                                        form.enviando = false;
                                        console.debug(error.response.data.message);
                                        alert(error.response.data.message);

                                    });

                            }

                        });
                    });
                }
                
            }
        }
    }
</script>
<style scoped>
</style>