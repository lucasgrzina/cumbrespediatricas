<template>
    <div>
        <div class="container" v-if="paso === 1">
            <div class="row content-big-title">
                <div class="col-md-12 text-center">
                    <img class="img-fluid logo" src="img/similacmama/logo.png">
                    <a class="btn btn-inscribite" @click="mostrarDisc()">
                        <img class="img-fluid" src="img/similacmama/btn-inscribite-2.png">
                    </a>
                </div>
            </div>  
        </div>
        <template  v-else-if="paso === 2">
            <div class="row fondo-disc">
                    <div class="col-md-12">
                        <div class="modal-disc text-center">
                            <img class="img-fluid tit-registro" src="img/similacmama/titulo-registro.png">
                            <div class="container">
                                
                                <p class="modal-disc-texto">
                                    En cumplimiento de las políticas corporativas de Abbott, le informamos que este evento es exclusivo para profesionales de la salud. En caso de que esta invitación no esté acorde con su área de especialización/conocimiento y/o desarrollo profesional o, en caso de que usted sea un empleado del gobierno y su participación contravenga alguna ley, reglamento o norma interna de su institución y no cuente con las respectivas autorizaciones, le solicitamos nos informe a la brevedad posible.
                                    <br><br>
                                    La información y/o datos brindados para el registro al evento serán utilizados únicamente durante su participación en el evento y envío de información relacionada al evento. Todos los datos serán manejados de acuerdo a nuestros procedimientos de manejo de datos y no podrán ser compartidos y/o utilizados para fines diferentes a su participación en este evento.                        

                                </p>
                                <p class="text text-center" style="margin-top:20px;">
                                    <a target="_blank" style="text-decoration:underline;color:rgb(178, 111, 167);" href="https://www.quimicavirtualevents.com/recorrido/avisodeprivacidad.html">Aviso de Privacidad</a>
                                </p>                                
                            </div>
                        </div>
                    </div>
            </div>
            <div class="container text-center">
                <a class="modal-disc-btn btn" @click="mostrarForm()">
                    <img class="img-fluid" src="img/similacmama/btn-acepto-legales.png">
                </a>                
            </div>
        </template>
        <template v-else>      
            <div class="row fondo-disc">
                    <div class="col-md-12">
                        <div class="modal-disc text-center">
                            <img class="img-fluid tit-registro" src="img/similacmama/titulo-inscribirse.png">
                            <div class="container">
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
                                            <input type="text" class="form-control" placeholder="Especialidad" v-model="form.especialidad">
                                        </div>                                        
                                    </div>                                                                                             
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <select v-model="form.pais" class="form-control">
                                                <option :value="null">Seleccione</option>
                                                <option v-for="(item,index) in info.countries" :value="item" :key="index">{{item}}</option>
                                            </select>                                            
                                        </div>                                        
                                    </div>                                                                                             
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <input type="text" class="form-control" placeholder="Mail" v-model="form.email">
                                        </div>                                        
                                    </div>  
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="container text-center">
                <a class="modal-disc-btn btn" @click="registrar()">
                    <img class="img-fluid" src="img/similacmama/btn-ingresar.png">
                </a>                
            </div>
 
        </template>  
        <div class="row">
            <div class="col-12">
                <div class="disc-sitio mt-2">
                    Sitio web optimizado para Navegadores Google Chrome y Firefox (PC/Mac).<br>
                    Se recomienda tener actualizado el sistema operativo a la última actualización.<br>
                    Para una correcta visualización del evento en vivo,  usar el modo pantalla completa y activar el sonido en el reproductor.<br><br>

                    Ante cualquier duda o inconveniente escriba al 00506 7014 6741 (Whatsapp)
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
                    especialidad: null,
                    pais: null,
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