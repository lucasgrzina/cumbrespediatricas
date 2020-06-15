<!-- Nombre Field -->
<div class="form-group col-sm-6" :class="{'has-error': errors.has('nombre')}">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','v-model' => 'selectedItem.nombre','v-validate' => "'required'",'data-vv-validate-on' => '"none"']) !!}
    <span class="help-block" v-show="errors.has('nombre')">(% errors.first('nombre') %)</span>
</div>

<!-- Categoria Id Field -->
<div class="form-group col-sm-6" :class="{'has-error': errors.has('categoria_id')}">
    {!! Form::label('categoria_id', 'Categoria') !!}
    <select v-model="selectedItem.categoria_id" class="form-control" name="categoria_id" v-validate="'required'" data-vv-validate-on="'none'">
        <option :value="null">Seleccione</option>
        <option v-for="item in info.categorias" :value="item.id">(% item.nombre %)</option>
    </select>    
    <span class="help-block" v-show="errors.has('categoria_id')">(% errors.first('categoria_id') %)</span>
</div>
<div class="clearfix"></div>
<!-- Orden Field -->
<div class="form-group col-sm-6" :class="{'has-error': errors.has('orden')}">
    {!! Form::label('orden', 'Orden') !!}
    {!! Form::text('orden', null, ['class' => 'form-control','v-model' => 'selectedItem.orden']) !!}
    <span class="help-block" v-show="errors.has('orden')">(% errors.first('orden') %)</span>
</div>

<!-- Enabled Field -->
<div class="clearfix"></div>