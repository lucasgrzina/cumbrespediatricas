<div class="table-responsive">
    <table class="table m-b-0" id="encuestas-table">
        <thead>
            <tr>
                <th @click="orderBy('id')" class="td-id" :class="cssOrderBy('id')">ID</th>
                <th>Preg 1</th>
                <th>Preg 2</th>
                <th>Preg 3</th>
                <th>Preg 4</th>
                <th>Preg 5</th>
                <th>Preg 6</th>
                <th>Preg 7</th>
                <th>Preg 8</th>
                <!--th>Registrado Id</th-->
                <th class="td-actions">{{ trans('admin.table.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in list" v-if="paging.total > 0">
                <td>(% item.id %)</td>
                <td>(% item.valor_resp_1 %)</td>
                <td>(% item.valor_resp_2 %)</td>
                <td>(% item.valor_resp_3 %)</td>
                <td>(% item.valor_resp_4 %)</td>
                <td>(% item.valor_resp_5 %)</td>
                <td>(% item.resp_6 %)</td>
                <td>(% item.resp_7 %)</td>
                <td>(% item.resp_8 %)</td>
                <!--td>(% item.registrado_id %)</td-->
                <td class="td-actions">
                    @if(auth()->user()->hasRole('Superadmin') || auth()->user()->can('ver-'.$data['action_perms']))
                        <button-type type="show-list" @click="show(item)"></button-type>
                    @endif
                </td>            
            </tr>
        </tbody>
    </table>
</div>