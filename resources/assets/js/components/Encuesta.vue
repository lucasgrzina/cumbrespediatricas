<template>
    <div>
            <div class="row content-title">
                <div class="col-md-12">
                    <div class="line line--left"></div>
                    <h1>Encuesta de satisfacción</h1>
                    <div class="line line--right"></div>
                </div>
            </div>
            
            <div class="container-encuesta">
                <div class="row" v-for="(item,index) in preguntas" :key="index">
                    <div class="col-12">
                        <h5>{{item.key}}) {{item.tit}}</h5>
                        <p>{{item.preg}}</p>
                    </div>
                    <div class="col-12">
                        <template v-if="item.tipo === 'C'">
                            <div class="form-check-inline" v-for="subitem in opciones" :key="subitem.key">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" :name="'p_'+item.key+'_r_'+subitem.key" :value="subitem.key" v-model="form['resp_' + item.key]"> {{subitem.texto}}
                                </label>
                            </div>
                        </template>
                        <template v-else>
                            <textarea class="form-control" :name="'p_'+item.key" v-model="form['resp_' + item.key]"></textarea>
                        </template>
                    </div>
                </div>

                <div class="text-right">
                    <button type="button" 
                            class="btn btn-primary" 
                            @click="enviar()">
                        <i v-if="enviando" class="fa fa-spinner fa-spin fa-fw"></i> 
                        <span> {{ enviando ? 'ENVIANDO' : 'ENVIAR' }} </span>
                    </button>
                </div>
                <i class="fa fa-spinner fa-spin fa-fw" style="opacity:0;"></i>
            </div>      
 
    </div>
</template>

<script>
    export default {
        props : {
            urlEnviar: {
                type: String,
                required:true
            }
        },
        data () {
            return {
                preguntas: [
                    {key: 1,tit: 'Mensaje (s): Contenido y claridad', preg: 'El mensaje fue claro y en términos que los puedo entender y aplicar', tipo: 'C'},
                    {key: 2,tit: 'Abbott en la Nutrición', preg: 'Puedo utilizar el conocimiento compartido utilizando  los productos de Abbott.', tipo: 'C'},
                    {key: 3,tit: 'Evaluación del evento', preg: '¿Qué le pareció la logística y experiencia de este webinar?', tipo: 'C'},
                    {key: 4,tit: '¿Qué otros temas serían de su interés?', preg: '', tipo: 'T'},
                ],
                opciones: [
                    {key: 5, texto: 'Excelente'},
                    {key: 4, texto: 'Bueno'},
                    {key: 3, texto: 'Regular'},
                    {key: 2, texto: 'Malo'},
                    {key: 1, texto: 'Muy malo'},
                ],
                form: {
                    resp_1: null,
                    resp_2: null,
                    resp_3: null,
                    resp_4: null,
                },
                enviando: false,
                errors: [],
            }
        },
        mounted () {
            console.debug('Encuesta mounted');
        },
        methods: {
            enviar: function () {
                let vm = this

                if (!vm.form.resp_1 || !vm.form.resp_2 || !vm.form.resp_3 || !vm.form.resp_4) {
                    alert('Debe responder todas las preguntas');
                    return false;
                }

                if (!vm.enviando) {
                    vm.enviando = true;
                    axios.post(vm.urlEnviar, vm.form)
                        .then(response => {
                            vm.enviando = false;
                            vm.form = {
                                resp_1: null,
                                resp_2: null,
                                resp_3: null,
                                resp_4: null,
                            };
                            alert('Gracias por responder la encuesta');
                            // vm.form.pregunta = null;
                        }, error => {
                            vm.enviando = false;
                            
                            alert(error.message);
                        });                    
                }
            }
        }
    }
</script>
<style scoped>
</style>