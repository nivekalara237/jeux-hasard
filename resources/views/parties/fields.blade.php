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

<!-- Jeu Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('jeu_id', 'Jeu Id:') !!}
    {!! Form::number('jeu_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Statut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('statut', 'Statut:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('statut', false) !!}
        {!! Form::checkbox('statut', '1', null) !!} 1
    </label>
</div>

<!-- Superviseur Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('superviseur_id', 'Superviseur Id:') !!}
    {!! Form::number('superviseur_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('parties.index') !!}" class="btn btn-default">Cancel</a>
</div>
