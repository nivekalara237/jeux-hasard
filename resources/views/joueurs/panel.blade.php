@extends('layouts.app')


@section("css")
<style>
    td{
        font-size:12px!important;
    }
</style>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Page reservée aux joueurs
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        @include('flash::message')
        <div class="row">
            <div class="container-fluid">
                <div class="col-md-6">
                    <div class="box box-solid box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Toutes mes participations</h3>
                            <div class="box-tools pull-right">
                            <!-- Buttons, labels, and many other things can be placed here! -->
                            <!-- Here is a label for example -->
                            <span class="label label-primary">{{$participations->count()+(($participations->currentPage()-1) * $participations->perPage())}}/{{$participations->total()}}</span>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-responsive" id="parties-table">
                                <thead>
                                    <tr>
                                    <th>Jeu</th>
                                    <th>Ma mise</th>
                                    <th>Mise min(jeu)</th>
                                    <th>Superviseur</th>
                                    <th>Etat</th>
                                    <th colspan="2">Date et heure</th>
                                    <th>win/lost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($participations as $partie)
                                    <tr>
                                        <td>{!! $partie->partie->jeu->libelle !!}</td>
                                        <td>{!! $partie->mise !!}</td>
                                        <td>{!! $partie->partie->jeu->mise_unitaire !!}</td>
                                        <td>{!! $partie->partie->user->name !!}</td>
                                        <td>{!! $partie->statut==1?"en cour...":"terminée!!" !!}</td>
                                        <td colspan="2">{!! $partie->created_at !!}</td>
                                        <td>
                                            <span class="label label-danger">{{"perdu"}}</span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                        <div class="text-center">
                                @include('adminlte-templates::common.paginate', ['records' => $participations])
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box box-solid box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title">Operations effectuées sur votre compte Monetaire</h3>
                            <div class="box-tools pull-right">
                            <!-- Buttons, labels, and many other things can be placed here! -->
                            <!-- Here is a label for example -->
                            <span class="label label-primary">{{$operations->count()+(($operations->currentPage()-1) * $operations->perPage())}}/{{$operations->total()}}</span>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            @include('operations.table')
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="text-center">
                                @include('adminlte-templates::common.paginate', ['records' => $operations])
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box box-solid box-primary">
                        <div class="box-header  with-border">
                            <h3 class="box-title">Créditer/debiter votre compte</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                {!! Form::open(['route' => ['operation.sur.compte',"id"=>auth()->user()->firstCM()->id]]) !!}

                                    @include('operations.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    {!! Form::model(auth()->user(), ['route' => ['user.updateProfile', auth()->user()->id], 'method' => 'patch','enctype' => 'multipart/form-data']) !!}
                    <div class="box box-solid box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Votre profile</h3>
                            <div class="box-tools pull-right">
                            <!-- Buttons, labels, and many other things can be placed here! -->
                            <!-- Here is a label for example -->
                            <span class="label label-default">last: {{auth()->user()->updated_at}}</span>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <!-- Name Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('name', 'Username:') !!}
                                    {!! Form::text('name', auth()->user()->name, ['class' => 'form-control']) !!}
                                </div>

                                <!-- Telephone Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('telephone', 'Telephone:') !!}
                                    {!! Form::text('telephone', auth()->user()->telephone, ['class' => 'form-control']) !!}
                                </div>

                                <!-- Email Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('email', 'Email:') !!}
                                    {!! Form::email('email', auth()->user()->email, ['class' => 'form-control']) !!}
                                </div>

                                <!-- Password Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('password', 'Password:') !!}
                                    {!! Form::password('password', ['class' => 'form-control']) !!}
                                </div>
                                
                                <!-- Password Field -->
                                <div class="form-group col-sm-6">
                                    {!! Form::label('avatar', 'Avatar:') !!}
                                    <input type="file" name="avatar" id="avatar" class="form-control">
                                </div>
                            
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <!-- Submit Field -->
                            <div class="form-group col-sm-12">
                                {!! Form::submit('Mise a jouter', ['class' => 'btn btn-success']) !!}
                    
                            </div>
                        </div>
                        <!-- box-footer -->
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
