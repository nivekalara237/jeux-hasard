<!-- Solde Field -->
<div class="form-group col-sm-12">
    {!! Form::label('solde', 'Solde:') !!}
    {!! Form::number('solde', null, ['class' => 'form-control',"required"=>"on"]) !!}
</div>

<!-- Type Paiement Field -->

<div class="form-group col-sm-12">
    <label for="type_paiement">Joueur:</label>
    <select name="type_paiement" data2="" class="form-control" required id="type_paiement">
        <option value="debit"> Debit </option>
        <option value="credit"> Crédit </option>
    </select>
</div>

<!-- Joueur Id Field -->
<div class="form-group col-sm-12">
    <label for="joueur_id">Joueur:</label>
    <select name="joueur_id" data2="" class="form-control" required id="joueur_id">
        @foreach($joueurs as $j)
            <option value="{{$j->id}}" selected> {{$j->name}}  [{{$j->email}}]</option>
        @endforeach
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('compteMonetaires.index') !!}" class="btn btn-default">Cancel</a>
</div>
