<!-- Resp 1 Field -->
<div class="form-group col-sm-6" :class="{'has-error': errors.has('resp_1')}">
    {!! Form::label('resp_1', 'Resp 1') !!}
    {!! Form::text('resp_1', null, ['class' => 'form-control','v-model' => 'selectedItem.resp_1']) !!}
    <span class="help-block" v-show="errors.has('resp_1')">(% errors.first('resp_1') %)</span>
</div>

<!-- Resp 2 Field -->
<div class="form-group col-sm-6" :class="{'has-error': errors.has('resp_2')}">
    {!! Form::label('resp_2', 'Resp 2') !!}
    {!! Form::text('resp_2', null, ['class' => 'form-control','v-model' => 'selectedItem.resp_2']) !!}
    <span class="help-block" v-show="errors.has('resp_2')">(% errors.first('resp_2') %)</span>
</div>

<!-- Resp 3 Field -->
<div class="form-group col-sm-6" :class="{'has-error': errors.has('resp_3')}">
    {!! Form::label('resp_3', 'Resp 3') !!}
    {!! Form::text('resp_3', null, ['class' => 'form-control','v-model' => 'selectedItem.resp_3']) !!}
    <span class="help-block" v-show="errors.has('resp_3')">(% errors.first('resp_3') %)</span>
</div>

<!-- Resp 4 Field -->
<div class="form-group col-sm-6" :class="{'has-error': errors.has('resp_4')}">
    {!! Form::label('resp_4', 'Resp 4') !!}
    {!! Form::text('resp_4', null, ['class' => 'form-control','v-model' => 'selectedItem.resp_4']) !!}
    <span class="help-block" v-show="errors.has('resp_4')">(% errors.first('resp_4') %)</span>
</div>

<!-- Registrado Id Field -->
<div class="form-group col-sm-6" :class="{'has-error': errors.has('registrado_id')}">
    {!! Form::label('registrado_id', 'Registrado Id') !!}
    {!! Form::text('registrado_id', null, ['class' => 'form-control','v-model' => 'selectedItem.registrado_id']) !!}
    <span class="help-block" v-show="errors.has('registrado_id')">(% errors.first('registrado_id') %)</span>
</div>
<div class="clearfix"></div>