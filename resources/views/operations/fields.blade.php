<!-- Libelle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('montant', 'Montant:') !!}
    {!! Form::number('montant', null, ['class' => 'form-control',"required" => "on"]) !!}
</div>
<div class="form-group col-sm-6">
    <label for="type">Type Operation:</label>
    <select class="form-control" name="type" required id="type">
        <option value="credit" selected> Credit </option>
        <option value="debit" > Debit </option>
    </select>
</div>

<div class="form-group col-sm-6">
    <label for="type">Moyen de paiement:</label>
    <select class="form-control" name="moyen"id="type">
        <option value="OM" selected> Orange Money </option>
        <option value="momo" > MTN mobile money </option>
        <option value="espece" > Par Espèce </option>
    </select>
</div>
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('current', 'Solde current:') !!}
    {!! Form::text('current', auth()->user()->firstCM()->solde, ['class' => 'form-control',"readonly"]) !!}
</div>
<!-- Mot Field -->
{{--<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('mot', 'Un Mot:') !!}
    {!! Form::textarea('mot', null, ['class' => 'form-control']) !!}
</div>--}}



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('operations.index') !!}" class="btn btn-default">Cancel</a>
</div>
