<div class="table-responsive">
    <table class="table m-b-0" id="productos-table">
        <thead>
            <tr>
                <th @click="orderBy('id')" class="td-id" :class="cssOrderBy('id')">ID</th>
                <th>Imagen</th>
                <th>Seccion/Cat</th>
                <th>Nombre</th>
                <th>Codigo</th>
                <th>Precio</th>
                <th class="td-enabled">Activo</th>
                <th class="td-actions">{{ trans('admin.table.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in list" v-if="paging.total > 0">
                <td>(% item.id %)</td>
                <td width="50"><img :src="item.imagen_url" class="img-responsive"></td>
                <td>(% item.seccion.nombre.concat('/').concat(item.seccion.categoria.nombre) %)</td>
                <td>(% item.nombre %)</td>                
                <td>(% item.codigo %)</td>
                <td>(% item.precio %)</td>
                <td class="td-enabled">
                    <switch-button v-model="item.enabled" theme="bootstrap" type-bold="true" @onChange="onChangeEnabled(item)"></switch-button>
                </td>                
                <td class="td-actions">
                    @if(auth()->user()->hasRole('Superadmin') || auth()->user()->can('ver-'.$data['action_perms']))
                        <!--button-type type="show-list" @click="show(item)"></button-type-->
                    @endif
                    @if(auth()->user()->hasRole('Superadmin') || auth()->user()->can('editar-'.$data['action_perms']))
                        <button-type type="edit-list" @click="edit(item)"></button-type>
                        <button-type type="remove-list" @click="destroy(item)"></button-type>
                    @endif
                </td>            
            </tr>
        </tbody>
    </table>
</div>