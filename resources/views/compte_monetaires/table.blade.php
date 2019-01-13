<table class="table table-responsive" id="compteMonetaires-table">
    <thead>
        <tr>
            <th>Solde</th>
        <th>Type Paiement</th>
        <th>Joueur Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($compteMonetaires as $compteMonetaire)
        <tr>
            <td>{!! $compteMonetaire->solde !!}</td>
            <td>{!! $compteMonetaire->type_paiement !!}</td>
            <td>{!! $compteMonetaire->joueur_id !!}</td>
            <td>
                {!! Form::open(['route' => ['compteMonetaires.destroy', $compteMonetaire->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('compteMonetaires.show', [$compteMonetaire->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('compteMonetaires.edit', [$compteMonetaire->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>