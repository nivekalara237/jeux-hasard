<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Telephone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telephone', 'Telephone:') !!}
    {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
    {!! Form::label('roles', 'Roles:') !!}
    [<a href='#' id='select-all'>sélectionner tout</a> | 
    <a href='#' id='deselect-all'>désélectionner tout</a>]
    <select id="roles" name="roles[]" class="form-control" multiple="multiple">
        <option disabled>-------------</option>
        @if(isset($user_roles))
            @foreach($roles as $role)
                <option value='{{$role->id}}' <?php echo $user_roles->contains('id',$role->id)?"selected":""?>> {{$role->name}}</option>
            @endforeach
        @else
            @foreach($roles as $role)
                <option value='{{$role->id}}'> {{$role->name}}</option>
            @endforeach
        @endif
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
