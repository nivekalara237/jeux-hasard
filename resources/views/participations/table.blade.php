<table class="table table-responsive" id="participations-table">
    <thead>
        <tr>
            <th>Mise</th>
        <th>Joueur Id</th>
        <th>Partie Id</th>
        <th>Upated At</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($participations as $participation)
        <tr>
            <td>{!! $participation->mise !!}</td>
            <td>{!! $participation->joueur_id !!}</td>
            <td>{!! $participation->partie_id !!}</td>
            <td>{!! $participation->upated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['participations.destroy', $participation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('participations.show', [$participation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('participations.edit', [$participation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>