<div class="table-responsive">
    <table class="table m-b-0" id="registrados-table">
        <thead>
            <tr>
                <th @click="orderBy('id')" class="td-id" :class="cssOrderBy('id')">ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Especialidad</th>
                <th>Institución</th>
                <th>Pais</th>
                <th>Email</th>
                <th class="td-actions">{{ trans('admin.table.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in list" v-if="paging.total > 0">
                <td>(% item.id %)</td>
                <td>(% item.nombre %)</td>
                <td>(% item.apellido %)</td>
                <td>(% item.especialidad %)</td>
                <td>(% item.institucion %)</td>
                <td>(% item.pais %)</td>
                <td>(% item.email %)</td>
                <td class="td-actions">
                    @if(auth()->user()->hasRole('Superadmin') || auth()->user()->can('ver-'.$data['action_perms']))
                        <button-type type="show-list" @click="show(item)"></button-type>
                    @endif
                    @if(auth()->user()->hasRole('Superadmin') || auth()->user()->can('editar-'.$data['action_perms']))
                        <!--button-type type="edit-list" @click="edit(item)"></button-type>
                        <button-type type="remove-list" @click="destroy(item)"></button-type-->
                    @endif
                </td>            
            </tr>
        </tbody>
    </table>
</div>