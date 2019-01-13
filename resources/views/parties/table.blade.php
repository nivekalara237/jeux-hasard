<table class="table table-responsive" id="parties-table">
    <thead>
        <tr>
            <th>Libelle</th>
        <th>Participants</th>
        <th>Jeu Id</th>
        <th>Statut</th>
        <th>Superviseur</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($parties as $partie)
        <tr>
            <td>{!! $partie->libelle !!}</td>
            <td>
                <ol>
                
                @foreach($partie->participations as $pa)
                    <li>{{$pa->user->name}} &nbsp;  [<span style="color:green">mise = {{$pa->mise}}</span>]</li>
                @endforeach
                
                </ol>
            </td>
            <td>{!! $partie->jeu->libelle !!}</td>
            <td>{!! $partie->statut==1?"en cour...":"finie!!" !!}</td>
            <td>{!! $partie->user->name !!}</td>
            <td>
                {!! Form::open(['route' => ['parties.destroy', $partie->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! url('partie/demarrer/'.$partie->id) !!}" class='btn btn-primary btn-xs'>Demarrer</a>&nbsp;
                    <a href="{!! url('partie/arreter/'.$partie->id) !!}" class='btn btn-default btn-xs'>Arreter</a>&nbsp;
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>