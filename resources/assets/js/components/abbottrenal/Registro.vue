<template>
  <div class="mb-5">
    <template v-if="paso === 1">
				<div class="row ">
					<div class="col-12 margin-top-home">
						<h3>Bienvenidos al evento:</h3>
					</div>
					<div class="col-12 mt-4 mb-4">
						<h1>Enfermedad Renal Crónica:<br>Retos y oportunidades en el manejo nutricional de los pacientes</h1>
					</div>
					<div class="col-12">
						<h3>a continuación proceda con el registro por favor </h3>
					</div>
				</div>
				<div class="row mt-5 mb-3">
					<div class="col-12">
						<button class="btn btn-primary ml-auto mr-auto d-table" @click="irAlPaso(2)">Registrese aquí</button>
					</div>
				</div> 
    </template>
    <template v-else-if="paso === 2">
        <div class="row align-items-center">
          <div class="col-12 margin-top-home">
            <h3>Términos y condiciones</h3>
          </div>

        </div>
				<div class="row mt-5 justify-content-center">
					<div class="col-sm-8 mt-4 text-center">
						<p>Este sitio web (en adelante, el "Sitio Web") es operado por <strong>Química</strong> International Services LLC (en adelante, "Química") y se sujeta a los presentes términos y condiciones (en adelante, los "Términos y Condiciones del Sitio Web").</p>
            <p>El Sitio Web está destinado a eventos virtuales, con presencia de stand y charlas de forma pregrabada y en vivo, conferencias, cursos, entre otros.</p>
					</div>
				</div>
				<div class="row mt-5 mb-3 justify-content-center" style="margin-bottom:50px;">
					<div class="col-sm-8 text-center">
            <p class="texto-acepto">Acepto los términos y condiciones para proceder con el registro</p>
						<button class="btn btn-primary ml-auto mr-auto d-table" @click="irAlPaso(3)">Aceptar y proceder</button>
					</div>
				</div> 
    </template>    
    <template v-else>
        <div class="row ">
					<div class="col-12 margin-top-home">
						<h2>Registro</h2>
					</div>
					<div class="col-12 mt-4 mb-4">
						<form>
							<div class="form-row margin-row-bottom">
							    <div class="col-md-12">	
							    	<input type="text" class="form-control" id="nombre" placeholder="Nombre y Apellido" v-model="registro.form.nombre">
							        <div class="invalid-feedback">
							          Ingrese un nombre y apellido.
							        </div>
							    </div>
						    </div>
						    <div class="form-row margin-row-bottom">
							    <div class="col-md-12">	
							    	<!--input type="text" class="form-control" id="mail" placeholder="Nacionalidad" required-->
                    <select class="custom-select" required v-model="registro.form.pais">
                      <option :value="null">Seleccione su país</option>
                      <option v-for="(item,index) in info.countries" :value="item" :key="index">{{item}}</option>
                    </select>                    

							    </div>
						    </div>
						    <div class="form-row margin-row-bottom">
							    <div class="col-md-12">	
							    	<input type="text" class="form-control" id="mail" placeholder="Especialidad" v-model="registro.form.especialidad">
							        <div class="invalid-feedback">
							          Ingrese especialidad.
							        </div>
							    </div>
						    </div>
						    <div class="form-row margin-row-bottom">
							    <div class="col-md-12">	
							    	<button class="btn btn-primary ml-auto mr-auto d-table" type="button" @click="registrar()" :disabled="registro.enviando">Ingresar</button>
							    </div>
						    </div>
						</form>
					</div>
				</div>      
    </template>
  </div>


</template>

<script>


export default {
        props : {
            keyRecaptcha: {
                type: String
            },
            urlRegistrar: {
                type: String,
                required: true
            },
            urlRedirect: {
                type: String,
                required: true
            }                           
        },
        data () {
            return {
                vista: 'registro',
                paso: 1,
                aviso: 'general',
                aceptoGeneral: false,
                registro: {
                    form: {
                        nombre: null,
                        apellido: null,
                        email: 'noemail@email.com',
                        pais: null,
                        institucion: null,
                        ciudad: null,
                        especialidad: null,
                        password: null,
                        adicional: {
                        }
                    },
                    enviado: false,
                    enviando: false
                },
                info: {
                    countries: ['Costa Rica','El Salvador','Guatemala','Honduras','Nicaragua','Panamá','República Dominicana','Otro']
                },
                errors: [],
            }
        },
        mounted () {
            console.debug('Registro mounted');
            $('body').addClass('home');
        },
        methods: {

            checkForm: function () {
                let vm = this;
                let form = vm.registro.form;
                let errors = [];
                let camposSimples = {
                  nombre: 'nombre',
                  especialidad: 'especialidad',
                  pais: 'nacionalidad'
                };
                let camposAdicionales = {
                };

                _.forEach(camposSimples, function(campo,key) {
                  if (!form[key]) {
                    errors.push('El campo ' + campo + ' es obligatorio.');
                  }
                });

                _.forEach(camposAdicionales, function(campo,key) {
                  if (!form.adicional[key]) {
                    errors.push('El campo ' + campo + ' es obligatorio.');
                  }
                });

                if (errors.length > 0) {
                  alert(errors[0]);
                  return false;
                }

                return true;
                
            },            
            registrar () {
                //e.preventDefault();
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
                                        document.location = vm.urlRedirect;
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
            irAlPaso: function (paso) {
              window.scrollTo(0, 0);
              $('body').removeClass('home');
              if (paso === 2) {
                this.aviso = 'general';
              }
              this.paso = paso;
            },
            mostrarAvisoPais: function (pais) {
              window.scrollTo(0, 0);
              this.aviso = 'pais';
              this.avisoPaisSeleccionado = _.find(this.avisoPaises, function(item) {
                return item.key === pais;
              });
            }
        }
    }
</script>
<style scoped>
.list-group-item-action {
  cursor: pointer;
}
</style>