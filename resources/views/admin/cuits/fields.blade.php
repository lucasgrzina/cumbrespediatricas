<!-- Name Field -->
<div class="form-group col-sm-6" :class="{'has-error': errors.has('cuit')}">
    {!! Form::label('cuit', 'Cuit') !!}
    {!! Form::text('cuit', null, ['class' => 'form-control','v-model' => 'selectedItem.cuit','v-validate' => "'required'",'data-vv-validate-on' => 'none']) !!}
    <span class="help-block" v-show="errors.has('cuit')">(% errors.first('cuit') %)</span>
</div>
<div class="form-group col-sm-6" :class="{'has-error': errors.has('motivo')}">
    {!! Form::label('motivo', 'Motivo') !!}
    {!! Form::text('motivo', null, ['class' => 'form-control','v-model' => 'selectedItem.motivo','v-validate' => "'required'",'data-vv-validate-on' => 'none']) !!}
    <span class="help-block" v-show="errors.has('motivo')">(% errors.first('motivo') %)</span>
</div>
<div class="form-group col-sm-6" :class="{'has-error': errors.has('fecha')}">
    {!! Form::label('fecha', 'Fecha') !!}
    {!! Form::date('fecha', null, ['class' => 'form-control','v-model' => 'selectedItem.fecha','v-validate' => "'required'",'data-vv-validate-on' => 'none']) !!}
    <span class="help-block" v-show="errors.has('fecha')">(% errors.first('fecha') %)</span>
</div>

<div class="clearfix"></div>
