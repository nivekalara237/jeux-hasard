@extends('layouts.app')


@section("css")
<style>
    #test_prefix-multiform_controls{
        margin-left: 30px!important;
        margin-bottom: 20px!important;
    }

    .btn-success{
        padding-left: 30px!important;
        padding-right: 30px!important;
    }
    .btn-danger{
        padding-left: 30px!important;
        padding-right: 30px!important;
        margin-top:26px!important;
    }
</style>
@endsection

@section('content')
    <section class="content-header">
        <h1>
            Partie
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'parties.store']) !!}
                        @include('parties.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script src="{{asset('js/multiform.js')}}"></script>
    <script>
        $(".multiform-template").multiFormTemplate({
            postAddFunction: function() {
                console.log($);
            }
        });
        //console.log({!! $joueurs_json !!});
        window.joueurs= {{ $joueurs_json }};
        window.jeux = {{ $jeux_json }};

        $("#jeu_id").on("change",function(){
            $("span#data1").attr("data1",$(this).val());
        });


        function x() {
            window.jeu_seleted = $(this).val();
            console.log(jeu_selected);
        }

    </script>
@endsection
