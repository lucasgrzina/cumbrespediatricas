<template>
    <div>
	  <section>
	  	<div class="container">
            <div class="control-audio">
                <img src="img/forosas/logo_ABBVIE.png" width="180" style="right: 70px;bottom: 30px; position: absolute;">
            </div>
	  		<div class="row content-logo-login">
	  			<a><img src="img/forosas/logo.png"></a>
	  		</div>

	  		
            <div class="content-form text-center">
                <template v-if="vista === 'login'">
                    <form data-vv-scope="frm-login" autocomplete="off" @submit="loguear">
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="email" autocomplete="off" class="form-control" id="login-email" placeholder="Email" v-model="login.form.email">
                            </div>
                        </div>
                        <!--a target="_blank" href="https://event.on24.com/wcc/r/2632769/787C82066C458E0F4A85C67FFDAD910D" class="btn btn-ingresar btn-ingresar-evento">
                            <img src="img/forosas/btn-ingresar-EVENTO.png">
                        </a-->                        
                        <button type="submit" class="btn btn-ingresar">
                            <img src="img/forosas/btn-ingresar.png">
                        </button>
                    </form>
                    <a @click="mostrarVista('registro')" class="lnk-registrate">Si aún no te registraste, <strong>haz clic aquí.</strong></a>
                </template>
                <template v-else>
                    <form data-vv-scope="frm-registro" autocomplete="off" @submit="registrar">
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Nombre" v-model="registro.form.nombre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Apellido" v-model="registro.form.apellido">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="email" class="form-control" placeholder="Email" v-model="registro.form.email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="Clave" v-model="registro.form.codigo">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-ingresar">
                            <img src="img/forosas/btn-ingresar.png">
                        </button>
                        
                    </form>
                </template>
            </div>
	  	
	  	</div>
	  </section>

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
                vista: 'login',
                registro: {
                    form: {
                        nombre: null,
                        apellido: null,
                        email: null,
                        codigo: null
                    },
                    enviado: false,
                    enviando: false
                },
                login : {
                    form: {
                        email: null,
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

            this.countdownTimer = setInterval(this.timer, 1000);
        },
        methods: {
            mostrarVista (vista) {
                let vm = this;
                if (vista === 'login') {
                    vm.login.form = _.assign({
                        nombre: null,
                        apellido: null,
                        email: null,
                        codigo: null,
                    });
                    vm.login.enviando = false;
                    vm.login.enviado = false;

                } else {
                    vm.registro.form = _.assign({
                        nombre: null,
                        apellido: null,
                        email: null,
                        codigo: null,
                    });
                    vm.registro.enviando = false;
                    vm.registro.enviado = false;
                }
                vm.vista = vista;
            },
            checkForm: function (e) {
                let vm = this;
                let form = vm.vista === 'login' ? vm.login.form : vm.registro.form;
                this.errors = [];

                if (vm.vista === 'login') {
                    if (!form.email) {
                        alert('Todos los campos son obligatorios');
                        return false;
                    }
                } else {
                    if (!form.nombre || !form.apellido || !form.email || !form.codigo ) {
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
            }
        }
    }
</script>
<style scoped>
</style>