<template>
    <div>
        <div class="row content-big-title" v-if="paso === 1">
            <div class="col-md-12">
                <div class="line line--left"></div>
                <a class="btn btn-primary" @click="mostrarForm()">Registrarse para<br> ingresar al evento</a>
                <div class="line line--right"></div>
            </div>
        </div>  
        <template v-else>      
            <div class="row content-title">
                <div class="col-md-12">
                    <div class="line line--left"></div>
                    <h1>Registro</h1>
                    <div class="line line--right"></div>
                </div>
            </div>
            
            <form class="form-container">
                <div class="form-group row">
                    <div class="col-md-5">
                        <label for="name">Nombre</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="" v-model="form.nombre">
                    </div>
                    <div class="col-md-12">
                        <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-5">
                        <label for="name">Apellido</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="" v-model="form.apellido">
                    </div>
                    <div class="col-md-12">
                        <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-5">
                        <label for="name">Especialidad</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="" v-model="form.especialidad">
                    </div>
                    <div class="col-md-12">
                        <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-5">
                        <label for="name">Pais</label>
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="" v-model="form.pais">
                    </div>
                    <div class="col-md-12">
                        <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
    
                <div class="form-group row">
                    <div class="col-md-5">
                        <label for="exampleInputEmail1">Mail</label>
                    </div>
                    <div class="col-md-7">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="" v-model="form.email">
                    </div>
                    <div class="col-md-12">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
    

                <button type="button" class="btn btn-primary" @click="registrar()">ENVIAR</button>
            </form>      
        </template>  
    </div>
</template>

<script>
    export default {
        props : {
            urlRegistrar: {
                type: String,
                required:true
            }
        },
        data () {
            return {
                paso: 1,
                form: {
                    nombre: null,
                    apellido: null,
                    especialidad: null,
                    pais: 'Argentina',
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
            mostrarForm () {
                this.paso = 2;
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
                    console.debug(this.form);
                    this.guardando = true;
                    axios.post(vm.urlRegistrar, vm.form)
                        .then(response => {
                            console.debug(response);
                            vm.guardando = false;
                            location.reload();
                        }, error => {
                            vm.guardando = false;
                            alert(error.message);
                        });
                    
                    
                }
                
            }
        }
    }
</script>
<style scoped>
</style>