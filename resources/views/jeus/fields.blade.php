<!-- Libelle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle', 'Libelle:') !!}
    {!! Form::text('libelle', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Max Joueur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('max_joueur', 'Max Joueur:') !!}
    {!! Form::number('max_joueur', null, ['class' => 'form-control']) !!}
</div>

<!-- Min Joueur Field -->
<div class="form-group col-sm-6">
    {!! Form::label('min_joueur', 'Min Joueur:') !!}
    {!! Form::number('min_joueur', null, ['class' => 'form-control']) !!}
</div>

<!-- Mise Unitaire Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mise_unitaire', 'Mise Unitaire:') !!}
    {!! Form::number('mise_unitaire', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Une Photo du jeux:') !!}
    <input type="file" name="photo" id="photo" class="form-control">
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('jeus.index') !!}" class="btn btn-default">Cancel</a>
</div>
