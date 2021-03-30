<template>
        <div class="container">

          <div class="row" v-if="vista === 'login'">

            <div class="col-md-12">

              <form>

                <div class="form-group row">

                  <label for="usuario" class="col-md col-12">Usuario</label>

                  <div class="col-md col-12">

                    <input type="text" name="usuario" class="form-control-plaintext" id="usuario" v-model="login.form.email">

                  </div>

                </div>

                <div class="form-group row">

                  <label for="inputPassword" class="col-md col-12">Contraseña</label>

                  <div class="col-md col-12">

                    <input type="password" class="form-control" id="inputPassword" placeholder="" v-model="login.form.password">

                  </div>

                </div>

                <div class="row">

                  <div class="col-12">

                    <div class="content-buttons-form">

                      <button type="button" class="btn btn-primary" @click="loguear">Iniciar Sesión</button>

                      <button type="button" class="btn btn-light"  @click="mostrarVista('recuperar')">Olvidé mi contraseña</button>

                    </div>

                  </div>

                </div>

              </form>


            </div>

          </div>
          <div class="row" v-else>

            <div class="col-md-12">

              <form>

                <div class="form-group row">

                  <label for="usuario" class="col-md col-12">Usuario</label>

                  <div class="col-md col-12">

                    <input type="text" name="usuario" class="form-control-plaintext" id="usuario" v-model="recuperar.form.email">

                  </div>

                </div>

                <div class="row">

                  <div class="col-12">

                    <div class="content-buttons-form">

                      <button type="button" class="btn btn-primary" @click="recuperarPassword">Recuperar</button>

                      <button type="button" class="btn btn-light" @click="mostrarVista('login')">Iniciar Sesión</button>

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
            urlHome: {
                type: String,
                required: true
            },
            urlRecuperar: {
                type: String,
                required: true                
            }                          
        },
        data () {
            return {
                vista: 'login',
                login : {
                    form: {
                        email: null,
                        password: null
                    },
                    enviado: false,
                    enviando: false
                },
                recuperar : {
                    form: {
                        email: null
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
            console.debug('Login mounted');
        },
        methods: {
            mostrarVista (vista) {
                let vm = this;
                if (vista === 'login') {
                    vm.login.form = _.assign({
                        email: null,
                        password: null
                    });
                    vm.login.enviando = false;
                    vm.login.enviado = false;

                } else {
                    vm.recuperar.form = _.assign({
                        email: null,
                    });
                    vm.recuperar.enviando = false;
                    vm.recuperar.enviado = false;
                }
                vm.vista = vista;
            },
            checkForm: function (e) {
                let vm = this;
                let form = vm.vista === 'login' ? vm.login.form : vm.recuperar.form;
                this.errors = [];

                if (vm.vista === 'login') {
                    if (!form.email || !form.password) {
                        alert('Todos los campos son obligatorios');
                        return false;
                    }
                } else {
                    if (!form.email) {
                        alert('Todos los campos son obligatorios');
                        return false;
                    }

                }


                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                                
                if (!re.test(form.email)) {
                    alert('El formato del email es incorrecto.');
                    return false;
                }
                return true;
                
            },            

            loguear (e) {
                e.preventDefault();
                let vm = this
                let form = this.login.form;
                if (form.enviando) {
                    return false;
                }
                if (this.checkForm()) {
                    form.enviando = true;
                    axios.post(vm.urlLogin, form)
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
            },
            recuperarPassword (e) {
                e.preventDefault();
                let vm = this
                let form = this.recuperar.form;
                if (form.enviando) {
                    return false;
                }
                if (this.checkForm()) {
                    form.enviando = true;
                    axios.post(vm.urlRecuperar, form)
                        .then(response => {
                            console.debug(response);
                            form.enviando = false;
                            alert('Recibirás un email con tu contraseña');
                            vm.mostrarVista('login');
                            //document.location = vm.urlHome;
                        }, error => {
                            form.enviando = false;
                            console.debug(error.response.data.message);
                            alert(error.response.data.message);
                        });
                }                
            }
        }
    }
</script>
<style scoped>
</style>