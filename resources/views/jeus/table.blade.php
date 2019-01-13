<table class="table table-responsive" id="jeus-table">
    <thead>
        <tr>
            <th>Photo</th>
            <th>Libelle</th>
        <th>Description</th>
        <th>Max Joueur</th>
        <th>Min Joueur</th>
        <th>Mise Unitaire</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($jeus as $jeu)
        <tr>
        @if(!empty($jeu->photo))
            <td><img src="{!! asset("img/".$jeu->photo) !!}" class="img img-fluid" style="height:200px;width:200px" alt=""></td>
        @else
            <td><img src="{!! asset("img/logo256x256.png") !!}" class="img img-fluid" style="height:200px;width:200px" alt=""></td>
        @endif
            <td>{!! $jeu->libelle !!}</td>
            <td>{!! $jeu->description !!}</td>
            <td>{!! $jeu->max_joueur !!}</td>
            <td>{!! $jeu->min_joueur !!}</td>
            <td>{!! $jeu->mise_unitaire !!}</td>
            <td>
                {!! Form::open(['route' => ['jeus.destroy', $jeu->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('jeus.show', [$jeu->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('jeus.edit', [$jeu->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>