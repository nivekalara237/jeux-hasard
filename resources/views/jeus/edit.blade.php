@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Jeu
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($jeu, ['route' => ['jeus.update', $jeu->id], 'method' => 'patch']) !!}

                        @include('jeus.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection