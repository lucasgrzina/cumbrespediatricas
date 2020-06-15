<div class="table-responsive">
    <table class="table m-b-0" id="registrados-table">
        <thead>
            <tr>
                <th>Cuit</th>
                <th>Motivo</th>
                <th>Fecha</th>
                <!--th class="td-enabled td-actions">{{ trans('admin.table.enabled') }}</th-->
                <th class="td-actions">{{ trans('admin.table.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in list" v-if="paging.total > 0">
                <td>(% item.cuit %)</td>
                <td>(% item.motivo %)</td>
                <td>(% item.fecha | dateFormat  %)</td>
                <!--td class="td-enabled td-actions">
                    <switch-button v-model="item.enabled" theme="bootstrap" type-bold="true" @onChange="onChangeEnabled(item)"></switch-button>
                </td-->
                <td class="td-actions">
                    <button-type type="edit-list" @click="edit(item)"></button-type>
                    <button-type type="remove-list" @click="destroy(item)"></button-type>
                </td>            
            </tr>
        </tbody>
    </table>
</div>