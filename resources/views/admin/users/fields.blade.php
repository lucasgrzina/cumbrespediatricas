<div class="form-group col-sm-6" :class="{'has-error': errors.has('role')}">
    {!! Form::label('role', 'Rol*') !!}
    <select v-model="selectedItem.role_id" class="form-control" name="role" v-validate="'required'" data-vv-validate-on="'none'">
        <option :value="null"></option>
        <option v-for="item in info.roles" :value="item.id">(% item.name %)</option>
    </select>
    <span class="help-block" v-show="errors.has('role')">(% errors.first('role') %)</span>
</div>
<div class="form-group col-sm-6" :class="{'has-error': errors.has('enabled')}">
    {!! Form::label('enabled', 'Actividad*') !!}
    <select v-model="selectedItem.enabled" class="form-control" name="enabled" v-validate="'required'" data-vv-validate-on="'none'">
        <option :value="true">Usuario activo</option>
        <option :value="false">Usuario inactivo</option>
    </select>
    <span class="help-block" v-show="errors.has('enabled')">(% errors.first('enabled') %)</span>
</div>
<div class="clearfix"></div>
<!-- Name Field -->
<div class="form-group col-sm-6" :class="{'has-error': errors.has('nombre')}">
    {!! Form::label('nombre', 'Nombre*') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','v-model' => 'selectedItem.nombre','v-validate' => "'required'",'data-vv-validate-on' => 'none']) !!}
    <span class="help-block" v-show="errors.has('nombre')">(% errors.first('nombre') %)</span>
</div>

<div class="form-group col-sm-6" :class="{'has-error': errors.has('apellido')}">
    {!! Form::label('apellido', 'Apellido*') !!}
    {!! Form::text('apellido', null, ['class' => 'form-control','v-model' => 'selectedItem.apellido','v-validate' => "'required'",'data-vv-validate-on' => 'none']) !!}
    <span class="help-block" v-show="errors.has('apellido')">(% errors.first('apellido') %)</span>
</div>

<div class="clearfix"></div>


<div class="form-group col-sm-12" :class="{'has-error': errors.has('email')}">
    {!! Form::label('email', 'Email*') !!}
    {!! Form::email('email', null, ['class' => 'form-control','v-model' => 'selectedItem.email','v-validate' => "'required|email'",'data-vv-validate-on' => 'none']) !!}
    <span class="help-block" v-show="errors.has('email')">(% errors.first('email') %)</span>
</div>

<div class="clearfix"></div>

    <div class="form-group col-sm-6" :class="{'has-error': errors.has('password')}">
        {!! Form::label('password', 'Password*') !!}
        <template v-if="selectedItem.id == 0">
            {!! Form::password('password', ['class' => 'form-control','v-model' => 'selectedItem.password','v-validate' => "'required'",'data-vv-validate-on' => 'none']) !!}
        </template>
        <template v-else>
            {!! Form::password('password', ['class' => 'form-control','v-model' => 'selectedItem.password','data-vv-validate-on' => 'none']) !!}
        </template>
        <span class="help-block" v-show="errors.has('password')">(% errors.first('password') %)</span>
    </div>
<div class="clearfix"></div>