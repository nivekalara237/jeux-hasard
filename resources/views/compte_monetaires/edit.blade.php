@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Compte Monetaire
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($compteMonetaire, ['route' => ['compteMonetaires.update', $compteMonetaire->id], 'method' => 'patch']) !!}

                        @include('compte_monetaires.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection