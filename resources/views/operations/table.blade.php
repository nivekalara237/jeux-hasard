<table class="table table-responsive" id="operations-table">
    <thead>
        <tr>
        <th>Type</th>
        <th>Moyen paiment</th>
        <th>Montant</th>
        <th>Date et heure</th>
        <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($operations as $operation)
        <tr>
            <td><span class="label label-{{$operation->type=='credit'?'primary':'danger'}}">{!! $operation->type !!}</span></td>
            @if($operation->type=='credit')
            <td> {!! $operation->moyen !!}</td>
            @else
            <td> ---------- </td>
            @endif
            <td>{!! $operation->montant !!}</td>
            <td>{!! $operation->created_at !!}</td>
            <td>
                {!! Form::open(['route' => ['operations.destroy', $operation->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('operations.show', [$operation->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>