<!-- Registrado Id Field -->
<div class="form-group col-sm-6" :class="{'has-error': errors.has('registrado_id')}">
    {!! Form::label('registrado_id', 'Registrado Id') !!}
    {!! Form::text('registrado_id', null, ['class' => 'form-control','v-model' => 'selectedItem.registrado_id']) !!}
    <span class="help-block" v-show="errors.has('registrado_id')">(% errors.first('registrado_id') %)</span>
</div>

<!-- Pregunta Field -->
<div class="form-group col-sm-6" :class="{'has-error': errors.has('pregunta')}">
    {!! Form::label('pregunta', 'Pregunta') !!}
    {!! Form::text('pregunta', null, ['class' => 'form-control','v-model' => 'selectedItem.pregunta']) !!}
    <span class="help-block" v-show="errors.has('pregunta')">(% errors.first('pregunta') %)</span>
</div>

<!-- Respuesta Field -->
<div class="form-group col-sm-12 col-lg-12" :class="{'has-error': errors.has('respuesta')}">
    {!! Form::label('respuesta', 'Respuesta') !!}
    {!! Form::textarea('respuesta', null, ['class' => 'form-control','v-model' => 'selectedItem.respuesta']) !!}
    <span class="help-block" v-show="errors.has('respuesta')">(% errors.first('respuesta') %)</span>
</div>
<div class="clearfix"></div>