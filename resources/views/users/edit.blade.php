@extends('layouts.app')
@section("css")
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{{asset('css/multi-select.css')}}">
@endsection
@section('content')
    <section class="content-header">
        <h1>
            User
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'patch']) !!}

                        @include('users.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
@section("scripts")
<script src="{{asset("js/jquery.multi-select.js")}}"></script>
<script>
$('#roles').multiSelect();
$('#select-all').click(function(e){
    $('#roles').multiSelect('select_all');
    e.preventDefault();
    return false;
});
$('#deselect-all').click(function(e){
    $('#roles').multiSelect('deselect_all');
    e.preventDefault();
    return false;
});
</script>
@endsection