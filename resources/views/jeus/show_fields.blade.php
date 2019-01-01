<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $jeu->id !!}</p>
</div>

<!-- Libelle Field -->
<div class="form-group">
    {!! Form::label('libelle', 'Libelle:') !!}
    <p>{!! $jeu->libelle !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $jeu->description !!}</p>
</div>

<!-- Max Joueur Field -->
<div class="form-group">
    {!! Form::label('max_joueur', 'Max Joueur:') !!}
    <p>{!! $jeu->max_joueur !!}</p>
</div>

<!-- Min Joueur Field -->
<div class="form-group">
    {!! Form::label('min_joueur', 'Min Joueur:') !!}
    <p>{!! $jeu->min_joueur !!}</p>
</div>

<!-- Mise Unitaire Field -->
<div class="form-group">
    {!! Form::label('mise_unitaire', 'Mise Unitaire:') !!}
    <p>{!! $jeu->mise_unitaire !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $jeu->created_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $jeu->deleted_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $jeu->updated_at !!}</p>
</div>

