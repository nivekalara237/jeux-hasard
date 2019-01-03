<table class="table table-responsive" id="users-table">
    <thead>
        <tr>
            <th>Username</th>
        <th>Telephone</th>
        <th>Email</th>
        <th>Password</th>
        <th>Email Verified At</th>
        <th>Roles</th>
        <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->name !!}</td>
            <td>{!! $user->telephone !!}</td>
            <td>{!! $user->email !!}</td>
            <td>*****************</td>
            <td style="color:green">{!! empty($user->email_verified_at)?"en attente":$user->email_verified_at !!}</td>
            <td><?php 
                //if(count($user->roles)){
                    $r = $user->roles->map(function($role){
                        return $role->name;
                    });

                    //$r = $user->getRoleNames();
                    //dd($r);
                    echo implode(", ",$r->toArray());
                //}
                
            ?></td>
            <td>
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>