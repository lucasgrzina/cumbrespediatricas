<template>
    <div>
        <header class="">
            <div class="top-header"></div>
        </header>        
        
        <section class="center-vertical">

            <div class="container" v-if="paso === 1">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-intro">
                            <img class="logo-01" src="img/abbottnight/logo.png" />
                            <span class="text-gold">Bienvenidos a 2 días llenos de ciencia</span>
                            <span class="text-white">EVENTO REGIONAL <span class="gold-color">|</span> MODO VIRTUAL</span>

                            <div class="row content-info">
                                <div class="col-md-6 pl-md-1 pr-md-1 first">
                                    <div class="row">
                                        <div class="col center-vertical icon p-1">
                                            <div class="calendar"></div>
                                        </div>
                                        <div class="col  center-vertical p-1">
                                            <div>
                                                <div class="date">
                                                    <span class="day">27 OCT.</span>
                                                    <span class="type">PEDIÁTRICO</span>
                                                </div>
                                                <div class="date">
                                                    <span class="day">03 NOV.</span>
                                                    <span class="type">ADULTOS</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6 pl-md-1 pr-md-1">
                                    <div class="row">
                                        <div class="col center-vertical icon p-1">
                                            <div class="watch"></div>
                                        </div>
                                        <div class="col center-vertical p-1">
                                            <p class="text-watch">Centro América: <span class="hour">6 pm</span><br>Panamá: <span class="hour">7 pm</span><br>Rep. Dominicana: <span class="hour">8 pm</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary mb-3" @click="mostrarDisc()">INGRESAR</button>
                        </div>

                        
                    </div>
                </div>
                

            
            </div>

            <div class="container paso-2" v-if="paso === 2">
                <div class="row pt-5">
                    <div class="col-md-12">
                        <div class="content-intro registro">
                            <img class="logo-01" src="img/abbottnight/logo.png" />
                            <span class="text-gold title">Registro</span>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12"><div class="line-divide"></div></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-container terminos">
                            <p class="text">
                                En cumplimiento de las políticas corporativas de Abbott, le informamos que este evento es exclusivo para profesionales de la salud. En caso de que esta invitación no esté acorde con su área de especialización/conocimiento y/o desarrollo profesional o, en caso de que usted sea un empleado del gobierno y su participación contravenga alguna ley, reglamento o norma interna de su institución y no cuente con las respectivas autorizaciones, le solicitamos nos informe a la brevedad posible.
                            </p>
                            <p class="text">
                                La información y/o datos brindados para el registro al evento serán utilizados únicamente durante su participación en el evento y envío de información relacionada al evento. Todos los datos serán manejados de acuerdo a nuestros procedimientos de manejo de datos y no podrán ser compartidos y/o utilizados para fines diferentes a su participación en este evento.
                            </p>
                            <br>
                            <p class="text text-center">
                                <a target="_blank" class="text-white" style="text-decoration:underline;" href="https://www.quimicavirtualevents.com/recorrido/avisodeprivacidad.html">Aviso de privacidad</a>
                            </p>

                            <button type="submit" class="btn btn-primary" @click="mostrarForm()">ACEPTO PROCEDER CON EL REGISTRO</button>
                        </form>
                    </div>
                </div>
            </div>         

            <div class="container" v-if="paso === 3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-intro registro">
                            <img class="logo-01" src="img/abbottnight/logo.png" />
                            <span class="text-gold title">Ingrese su usuario</span>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12"><div class="line-divide"></div></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
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

                            <button type="button" class="btn btn-primary btn-registro" @click="registrar()">INGRESAR</button>
                        </form>
                    </div>
                </div>
            </div>               

        </section>        

        <footer >
            <div class="container">
                <div class="row logos">
                    <div class="col pl-1 pr-1">
                        <a><img src="img/abbottnight/logo_3.png"></a>
                    </div>

                    <div class="col pl-1 pr-1">
                        <a><img src="img/abbottnight/logo_2.png"></a>
                    </div>

                    <div class="col pl-1 pr-1">
                        <a><img src="img/abbottnight/logo_1.png"></a>
                    </div>

                    <div class="col pl-1 pr-1">
                        <a><img src="img/abbottnight/logo_4.png"></a>
                    </div>

                    <div class="col pl-1 pr-1">
                        <a><img src="img/abbottnight/logo_5.png"></a>
                    </div>                    
                </div>
            </div>
        </footer>        
        
        
        <!--div class="container" v-if="paso === 1">
            <div class="row content-big-title">
                <div class="col-md-12 text-center">
                    <img class="img-fluid logo" src="img/abbottnight/similacmama/logo.png">
                    <a class="btn btn-inscribite" @click="mostrarDisc()">
                        <img class="img-fluid" src="img/abbottnight/similacmama/btn-inscribite-2.png">
                    </a>
                </div>
            </div>  
        </div>
        <template  v-else-if="paso === 2">
            <div class="row fondo-disc">
                    <div class="col-md-12">
                        <div class="modal-disc text-center">
                            <img class="img-fluid tit-registro" src="img/abbottnight/similacmama/titulo-registro.png">
                            <div class="container">
                                
                                <p class="modal-disc-texto">
                                    En cumplimiento de las políticas corporativas de Abbott, le informamos que este evento es exclusivo para profesionales de la salud. En caso de que esta invitación no esté acorde con su área de especialización/conocimiento y/o desarrollo profesional o, en caso de que usted sea un empleado del gobierno y su participación contravenga alguna ley, reglamento o norma interna de su institución y no cuente con las respectivas autorizaciones, le solicitamos nos informe a la brevedad posible.
                                    <br><br>
                                    La información y/o datos brindados para el registro al evento serán utilizados únicamente durante su participación en el evento y envío de información relacionada al evento. Todos los datos serán manejados de acuerdo a nuestros procedimientos de manejo de datos y no podrán ser compartidos y/o utilizados para fines diferentes a su participación en este evento.                        
                                </p>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="container text-center">
                <a class="modal-disc-btn btn" @click="mostrarForm()">
                    <img class="img-fluid" src="img/abbottnight/similacmama/btn-acepto-legales.png">
                </a>                
            </div>
        </template>
        <template v-else>      
            <div class="row fondo-disc">
                    <div class="col-md-12">
                        <div class="modal-disc text-center">
                            <img class="img-fluid tit-registro" src="img/abbottnight/similacmama/titulo-inscribirse.png">
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
                    <img class="img-fluid" src="img/abbottnight/similacmama/btn-ingresar.png">
                </a>                
            </div>
 
        </template-->  
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
            },
            evento: {
                type: Object,
                required: true
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
            var imgFondoDesk = new Image();
            
            //$('.navbar-nav-menu').style(this.alto);
            imgFondoDesk.onload = function(){
                console.debug('cargoooo');
                setTimeout(function () {
                    $('body').addClass('fondo-body');
                }, 1);
                
            };
            imgFondoDesk.src = 'public/img/abbottnight/background.jpg';            

        },
        methods: {
            mostrarBlur: function (val) {
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