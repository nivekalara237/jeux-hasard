<table class="table table-responsive" id="parties-table">
    <thead>
        <tr>
            <th>Libelle</th>
        <th>Description</th>
        <th>Jeu Id</th>
        <th>Statut</th>
        <th>Superviseur Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($parties as $partie)
        <tr>
            <td>{!! $partie->libelle !!}</td>
            <td>{!! $partie->description !!}</td>
            <td>{!! $partie->jeu_id !!}</td>
            <td>{!! $partie->statut !!}</td>
            <td>{!! $partie->superviseur_id !!}</td>
            <td>
                {!! Form::open(['route' => ['parties.destroy', $partie->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('parties.show', [$partie->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('parties.edit', [$partie->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>