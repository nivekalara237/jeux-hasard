<li class="{{ Request::is('jeus*') ? 'active' : '' }}">
    <a href="{!! route('jeus.index') !!}"><i class="fa fa-edit"></i><span>Jeus</span></a>
</li>

<li class="{{ Request::is('operations*') ? 'active' : '' }}">
    <a href="{!! route('operations.index') !!}"><i class="fa fa-edit"></i><span>Operations</span></a>
</li>

<li class="{{ Request::is('participations*') ? 'active' : '' }}">
    <a href="{!! route('participations.index') !!}"><i class="fa fa-edit"></i><span>Participations</span></a>
</li>

<li class="{{ Request::is('parties*') ? 'active' : '' }}">
    <a href="{!! route('parties.index') !!}"><i class="fa fa-edit"></i><span>Parties</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>


<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>

<li class="{{ Request::is('permissions*') ? 'active' : '' }}">
    <a href="{!! route('permissions.index') !!}"><i class="fa fa-edit"></i><span>Permissions</span></a>
</li>

