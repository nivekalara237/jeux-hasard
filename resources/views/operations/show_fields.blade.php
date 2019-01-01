<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $operation->id !!}</p>
</div>

<!-- Libelle Field -->
<div class="form-group">
    {!! Form::label('libelle', 'Libelle:') !!}
    <p>{!! $operation->libelle !!}</p>
</div>

<!-- Mot Field -->
<div class="form-group">
    {!! Form::label('mot', 'Mot:') !!}
    <p>{!! $operation->mot !!}</p>
</div>

<!-- Compte Monetaire Id Field -->
<div class="form-group">
    {!! Form::label('compte_monetaire_id', 'Compte Monetaire Id:') !!}
    <p>{!! $operation->compte_monetaire_id !!}</p>
</div>

<!-- Type Field -->
<div class="form-group">
    {!! Form::label('type', 'Type:') !!}
    <p>{!! $operation->type !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $operation->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $operation->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $operation->deleted_at !!}</p>
</div>

