<template>
    <div>
        <section class="text-center" v-if="paso === 1">
            <div class="container view-01">
                <div class="row">
                    <div class="col-12">
                        <img class="logo" src="img/danoneday/logo.png" />
                        <a class="btn btn-primary btn-lg btn-registrarse" @click="mostrarForm()"><span class="text">Registrarse</span><span class="brush"></span></a>
                    </div>
                </div>
            </div>
        </section>        
        <section v-else class="text-center center-v">
            <div class="lines-bg lines-top"></div>
            <div class="lines-bg lines-bottom"></div>
            
            <div class="container view-02">
                
                <div class="row">
                    <div class="col-12">
                        <img class="logo" src="img/danoneday/logo.png" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <form class="form-container" id="frm-registro">                                
                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="text" class="form-control" placeholder="Nombre" v-model="form.nombre">
                                </div>                                        
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="text" class="form-control" placeholder="Apellido" v-model="form.apellido">
                                </div>                                        
                            </div> 
                            <div class="form-group row">
                                <div class="col-12">
                                    <input type="text" class="form-control" placeholder="Email" v-model="form.email">
                                </div>                                        
                            </div>  
                            <button type="button" class="btn btn-primary btn-enviar" @click="registrar()"><span class="text">Enviar</span><span class="brush"></span></button>
                        </form>                        
                        
                    </div>
                </div>
            </div>
            
            
            
        </section>


    </div>
</template>

<script>
    export default {
        props : {
            urlRegistrar: {
                type: String,
                required:true
            },
            recaptcha: {
                type: Object,
                default: null
            }
        },
        data () {
            return {
                paso: 1,
                lnk_blur: false,
                info: {
                    countries: ['Costa Rica','El Salvador','Guatemala','Honduras','Nicaragua','Panamá','República Dominicana','Otro']
                },
                form: {
                    nombre: null,
                    apellido: null,
                    email: null
                },
                guardando: false,
                errors: [],
            }
        },
        mounted () {
            console.debug('Registro mounted');
        },
        methods: {
            mostrarBlur: function (val) {
                console.debug('mostrar blur');
                this.lnk_blur = val;
            },
            mostrarDisc () {
                this.paso = 2;
            },            
            mostrarForm () {
                this.paso = 3;
                $('#body').removeClass("home").addClass("registro");
            },
            checkForm: function (e) {

                this.errors = [];

                if (!this.form.nombre || !this.form.apellido || !this.form.email ) {
                    alert('Todos los campos son obligatorios');
                    return false;
                }

                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                                
                if (!re.test(this.form.email)) {
                    alert('El formato del email es incorrecto.');
                    return false;
                }
                return true;
                
            },            
            registrar () {

                let vm = this
                if (this.guardando) {
                    return false;
                }
                if (this.checkForm()) {
                    this.guardando = true;

                    grecaptcha.ready(function() {
                        grecaptcha.execute(vm.recaptcha.key, {action: 'submit'}).then(function(token) {
                            // Add your logic to submit to your backend server here.
                            if (token) {
                                axios.post(vm.urlRegistrar, vm.form)
                                    .then(response => {
                                        vm.guardando = false;
                                        location.reload();
                                    }, error => {
                                        vm.guardando = false;
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