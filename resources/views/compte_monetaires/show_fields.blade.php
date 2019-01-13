<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $compteMonetaire->id !!}</p>
</div>

<!-- Solde Field -->
<div class="form-group">
    {!! Form::label('solde', 'Solde:') !!}
    <p>{!! $compteMonetaire->solde !!}</p>
</div>

<!-- Type Paiement Field -->
<div class="form-group">
    {!! Form::label('type_paiement', 'Type Paiement:') !!}
    <p>{!! $compteMonetaire->type_paiement !!}</p>
</div>

<!-- Joueur Id Field -->
<div class="form-group">
    {!! Form::label('joueur_id', 'Joueur Id:') !!}
    <p>{!! $compteMonetaire->joueur_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $compteMonetaire->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $compteMonetaire->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $compteMonetaire->deleted_at !!}</p>
</div>

