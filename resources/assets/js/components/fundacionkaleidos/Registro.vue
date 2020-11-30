<template>
        <div class="container">

          <div class="row">

            <div class="col-12">

              <div class="form-content">

                <form id="frm-registro">

                  <div class="row form-group">
                    <div class="col-sm-12 col-md  pl-0 pr-0 col-label"><label for="inputNombre">Nombre</label></div>
                    <div class="col-sm-12 col-md  pl-0 pr-0">
                        <input type="text" class="form-control" placeholder="" v-model="form.nombre">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md col-sm-12 pl-0 pr-0 col-label"><label for="inputApellido">Apellido</label></div>
                    <div class="col-md col-sm-12 pl-0 pr-0">
                        <input type="text" class="form-control" placeholder="" v-model="form.apellido">
                    </div>
                  </div>

                  <div class="row form-group">
                    <div class="col-md col-sm-12 pl-0 pr-0 col-label"><label for="inputEmail">E-Mail</label></div>
                    <div class="col-md col-sm-12 pl-0 pr-0">
                        <input type="text" class="form-control" placeholder="" v-model="form.email">
                    </div>
                  </div>

                    <button type="button" class="btn btn-secondary" @click="registrar()">
                        Ingresar
                    </button>

                </form>

              </div>

            </div>

          </div>

            <div class="row mt-5">
                <div class="col-12">
                    <div class="disc-sitio mt-2">
                        Sitio web optimizado para Navegadores Google Chrome y Firefox (PC/Mac).<br>
                        Se recomienda tener actualizado el sistema operativo a la última actualización.<br>
                        Para una correcta visualización del evento en vivo,  usar el modo pantalla completa y activar el sonido en el reproductor.<br><br>

                        Ante cualquier duda o inconveniente escriba al (+5411) 3300 3516 (Whatsapp)
                    </div>
                </div>
            </div> 
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
                    especialidad: 'S/E',
                    pais: 'S/E',
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
            },
            checkForm: function (e) {

                this.errors = [];

                if (!this.form.nombre || !this.form.apellido || !this.form.especialidad || !this.form.pais || !this.form.email ) {
                    alert('Todos los campos son obligatorios');
                    return false;
                }

                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                                
                if (!re.test(this.form.email)) {
                    //alert('El formato del email es incorrecto.');
                    //return false;
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
                                        alert(error.message);
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