<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>(% selectedItem.id %)</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>(% selectedItem.name %)</p>
</div>

<!-- Enabled Field -->
<div class="form-group">
    {!! Form::label('enabled', 'Enabled:') !!}
    <p>(% selectedItem.enabled %)</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>(% selectedItem.created_at %)</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>( %selectedItem.updated_at %)</p>
</div>

