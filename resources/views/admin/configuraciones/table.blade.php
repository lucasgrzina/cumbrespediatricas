<div class="table-responsive">
    <table class="table m-b-0" id="preguntas-table">
        <thead>
            <tr>
                <th @click="orderBy('id')" class="td-id" :class="cssOrderBy('id')">ID</th>
                <th>Item</th>
                <th>Valor</th>
                <th class="td-actions">{{ trans('admin.table.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(item,index) in list" v-if="paging.total > 0">
                <td>(% item.id %)</td>
                <td>(% item.clave %)</td>
                <td>
                    <template v-if="item.clave === 'etapa'">
                        <select class="form-control" v-model="selectedItem.valor" v-if="item.modo_edicion">
                            <option :value="'I'">Inicio (JPG)</option>
                            <option :value="'R'">Registro/Vivo</option>
                            <option :value="'F'">Fin (Placa)</option>
                        </select>
                        <span class="label label-info" v-else>(% descEtapa(item) %)</span>    
                    </template>
                    <template v-else-if="['encuesta','respuestas'].indexOf(item.clave) > -1">
                        <select class="form-control" v-model="selectedItem.valor" v-if="item.modo_edicion">
                            <option :value="1">SI</option>
                            <option :value="0">NO</option>
                        </select>
                        <span class="label" :class="{'label-success':item.valor == 1,'label-danger':item.valor == 0}" v-else>
                            (% item.valor == 1 ? 'SI' : 'NO' %)
                        </span>                        

                    </template>
                    <template v-else>
                        <input type="text" v-model="selectedItem.valor" v-if="item.modo_edicion" class="form-control">
                        <span v-else>(% item.valor %)</span>
                        
                    </template>
                </td>
                <!--td>(% item.registrado_id %)</td-->
                <td class="td-actions">
                    @if(auth()->user()->hasRole('Superadmin') || auth()->user()->can('editar-'.$data['action_perms']))
                        <button-type type="edit-list" @click="edit(index)" v-if="!item.modo_edicion"></button-type>
                        <div v-else>
                            <button-type type="save-list" @click="save()"></button-type>
                            <button-type type="close-list" @click="close(index)"></button-type>
                        </div>
                    @endif
                </td>            
            </tr>
        </tbody>
    </table>
</div>