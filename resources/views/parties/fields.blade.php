<!-- Libelle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle', 'Libelle:') !!}
    {!! Form::text('libelle', null, ['class' => 'form-control']) !!}
</div>

<!-- Jeu Id Field -->
<div class="form-group col-sm-6">
    <label for="jeu_id">Jeux:</label>
    <select class="form-control" name="jeu_id" required id="jeu_id">
        @foreach($jeux as $jeu)
            <option value="{{$jeu->id}}" selected> {{$jeu->libelle}} | mise_min = {{$jeu->mise_unitaire}} </option>
        @endforeach
    </select>
    <span id="data1" data1="0.00"></span>
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control',"max"=>3]) !!}
</div>
<br>
<hr class="clearfx"/>
<br>

<div class="row">
    <div class="multiform-template col-sm-12" data-prefix="participant">
        <div class="form-group col-sm-3 col-lg-3">
            <label for="joueur_id">Joueur:</label>
            <select name="joueur_id" onchange="x();" class="form-control" required id="joueur_id">
                @foreach($joueur as $j)
                    <option value="{{$j->id}}" selected> {{$j->name}} | [sole = {{$j->firstCM()->solde}}] </option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-sm-3 col-lg-3">
            {!! Form::label('nom_joueur', 'Nom joueur:') !!}
            {!! Form::number('nom_joueur', null, ['class' => 'form-control nom_joueur']) !!}
        </div>
        <div class="form-group col-sm-2 col-lg-2">
            {!! Form::label('mise', 'Mise:') !!}
            {!! Form::number('mise', null, ['class' => 'form-control mise_joueur',"required"=>"on"]) !!}
        </div>
        <div class="form-group col-sm-2 col-lg-2">
            <label for="jeu_mise">Minimum de la mise du jeux</label>
            <input class="form-control" type="number" id="jeu_mise" readonly>
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('parties.index') !!}" class="btn btn-default">Cancel</a>
</div>


