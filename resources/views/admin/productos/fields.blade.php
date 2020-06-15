<!-- Seccion Id Field -->
<div class="form-group col-sm-6" :class="{'has-error': errors.has('seccion_id')}">
    {!! Form::label('seccion_id', 'Seccion') !!}
    <select v-model="selectedItem.seccion_id" class="form-control" name="seccion_id" v-validate="'required'" data-vv-validate-on="'none'">
        <option :value="null">Seleccione</option>
        <option v-for="item in info.secciones" :value="item.id">(% item.nombre.concat('/').concat(item.categoria.nombre) %)</option>
    </select>    
    <span class="help-block" v-show="errors.has('seccion_id')">(% errors.first('seccion_id') %)</span>
</div>


<!-- Nombre Field -->
<div class="form-group col-sm-6" :class="{'has-error': errors.has('nombre')}">
    {!! Form::label('nombre', 'Nombre') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','v-model' => 'selectedItem.nombre','v-validate' => "'required'",'data-vv-validate-on' => '"none"']) !!}
    <span class="help-block" v-show="errors.has('nombre')">(% errors.first('nombre') %)</span>
</div>
<div class="clearfix"></div>
<!-- Imagen Field -->
<div class="form-group col-sm-6" :class="{'has-error': errors.has('imagen')}">
    {!! Form::label('imagen', 'Imagen') !!}
    <div class="thumb-wrap">
        <button-type v-if="selectedItem.imagen" type="remove-list" @click="removeImagen()"></button-type>
        <file-upload
            
            :multiple="false"
            :headers="_fuHeader"
            ref="uploadImagen"
            extensions="gif,jpg,jpeg,png,webp,svg"
            accept="image/png,image/gif,image/jpeg,image/webp,image/svg"            
            input-id="imagen"
            v-model="files.imagen"
            post-action="{{ route('uploads.store-file') }}"
            @input-file="inputImagen"
            class="thumbnail">
                <img class="img-responsive" src="{{ asset('admin/img/generic-upload.png') }}" v-if="!selectedItem.imagen_url">
                <img class="img-responsive" :src="selectedItem.imagen_url" v-else>
                <div class="progress m-t-5 m-b-0" v-if="files.imagen.length > 0">
                    <div class="progress-bar" :style="{ width: files.imagen[0].progress+'%' }"></div>
                </div>
        </file-upload>
    </div>    
    <span class="help-block" v-show="errors.has('imagen')">(% errors.first('imagen') %)</span>
</div>



<!-- Codigo Field -->
<div class="form-group col-sm-6" :class="{'has-error': errors.has('codigo')}">
    {!! Form::label('codigo', 'Codigo') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control','v-model' => 'selectedItem.codigo','v-validate' => "'required'",'data-vv-validate-on' => '"none"']) !!}
    <span class="help-block" v-show="errors.has('codigo')">(% errors.first('codigo') %)</span>
</div>
<div class="clearfix"></div>
<!-- Precio Field -->
<div class="form-group col-sm-6" :class="{'has-error': errors.has('precio')}">
    {!! Form::label('precio', 'Precio') !!}
    {!! Form::number('precio', null, ['class' => 'form-control','v-model' => 'selectedItem.precio','v-validate' => "'required'",'data-vv-validate-on' => '"none"']) !!}
    <span class="help-block" v-show="errors.has('precio')">(% errors.first('precio') %)</span>
</div>

<!-- Enabled Field -->
<div class="form-group col-sm-6" :class="{'has-error': errors.has('enabled')}">
    {!! Form::label('enabled', 'Activo') !!}<br>
    <switch-button v-model="selectedItem.enabled" theme="bootstrap" type-bold="true"></switch-button>
    <span class="help-block" v-show="errors.has('enabled')">(% errors.first('enabled') %)</span>
</div>
<div class="clearfix"></div>