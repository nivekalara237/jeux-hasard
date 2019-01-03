<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Guard Name Field -->
{{--<div class="form-group col-sm-6">
    {!! Form::label('guard_name', 'Guard Name:') !!}
    {!! Form::text('guard_name', null, ['class' => 'form-control']) !!}
</div>--}}
<input type="hidden" name="guard_name" value="web" id="">
<div class="form-group col-sm-6">
    {!! Form::label('permissions', 'Permissions:') !!}
    [<a href='#' id='select-all'>sélectionner tout</a> | 
    <a href='#' id='deselect-all'>désélectionner tout</a>]
    <select id="permissions" name="permissions[]" class="form-control" multiple="multiple" data-toggle="select">
        <option disabled>-------------</option>
        @foreach($perms as $perm)
            <option value='{{$perm->id}}' <?php echo $role_perms->contains('id',$perm->id)?"selected":""?>> {{$perm->name}}</option>
        @endforeach
    </select>
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('roles.index') !!}" class="btn btn-default">Cancel</a>
</div>
