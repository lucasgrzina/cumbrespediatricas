<div class="table-responsive">
    <table class="table m-b-0" id="encuestas-table">
        <thead>
            <tr>
                <th @click="orderBy('id')" class="td-id" :class="cssOrderBy('id')">ID</th>
                <th v-for="index in 30">Preg (% (index) %)</th>
                <!--th>Registrado Id</th-->
                <th class="td-actions">{{ trans('admin.table.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="item in list" v-if="paging.total > 0">
                <td>(% item.id %)</td>
                <td v-for="index in 30">(% item['resp_' +  (index)] %)</td>
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