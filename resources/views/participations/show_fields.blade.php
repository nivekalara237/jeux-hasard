<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $participation->id !!}</p>
</div>

<!-- Mise Field -->
<div class="form-group">
    {!! Form::label('mise', 'Mise:') !!}
    <p>{!! $participation->mise !!}</p>
</div>

<!-- Joueur Id Field -->
<div class="form-group">
    {!! Form::label('joueur_id', 'Joueur Id:') !!}
    <p>{!! $participation->joueur_id !!}</p>
</div>

<!-- Partie Id Field -->
<div class="form-group">
    {!! Form::label('partie_id', 'Partie Id:') !!}
    <p>{!! $participation->partie_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $participation->created_at !!}</p>
</div>

<!-- Upated At Field -->
<div class="form-group">
    {!! Form::label('upated_at', 'Upated At:') !!}
    <p>{!! $participation->upated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $participation->deleted_at !!}</p>
</div>

