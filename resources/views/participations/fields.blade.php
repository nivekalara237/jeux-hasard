<!-- Mise Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mise', 'Mise:') !!}
    {!! Form::number('mise', null, ['class' => 'form-control']) !!}
</div>

<!-- Joueur Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('joueur_id', 'Joueur Id:') !!}
    {!! Form::number('joueur_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Partie Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('partie_id', 'Partie Id:') !!}
    {!! Form::number('partie_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Upated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('upated_at', 'Upated At:') !!}
    {!! Form::date('upated_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('participations.index') !!}" class="btn btn-default">Cancel</a>
</div>
