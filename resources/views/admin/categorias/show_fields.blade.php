<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>(% selectedItem.id %)</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>(% selectedItem.nombre %)</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>(% selectedItem.email %)</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('asunto', 'Asunto:') !!}
    <p>(% selectedItem.asunto %)</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('mensaje', 'Mensaje:') !!}
    <p>(% selectedItem.mensaje %)</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Fecha:') !!}
    <p>(% selectedItem.created_at | formatoFecha %)</p>
</div>

