<!-- Libelle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle', 'Libelle:') !!}
    {!! Form::text('libelle', null, ['class' => 'form-control']) !!}
</div>

<!-- Mot Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('mot', 'Mot:') !!}
    {!! Form::textarea('mot', null, ['class' => 'form-control']) !!}
</div>

<!-- Compte Monetaire Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('compte_monetaire_id', 'Compte Monetaire Id:') !!}
    {!! Form::number('compte_monetaire_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}
    {!! Form::text('type', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('operations.index') !!}" class="btn btn-default">Cancel</a>
</div>
