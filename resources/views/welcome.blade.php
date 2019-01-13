<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config("app.name")}}</title>
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="img/favicon.ico" type="image/x-icon">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                /*padding: 0 25px;
                font-size: 13px;*/
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                /*text-transform: uppercase;*/
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .button {
                background-color: #4CAF50; /* Green */
                border: none;
                color: white!important;
                padding: 16px 62px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 14px 12px;
                -webkit-transition-duration: 0.4s; /* Safari */
                transition-duration: 0.4s;
                cursor: pointer;
            }

            .button2 {
                background-color: #008CBA; 
                color: white; 
                border: 2px solid #008CBA;
            }

            .button2:hover {
                background-color: white;
                color: #008CBA!important;
            }

            .button3 {
                background-color: #f44336; 
                color: white; 
                border: 2px solid #f44336;
            }

            .button3:hover {
                background-color: white;
                color: #f44336!important;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height bg-image">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        {{--<a href="{{ url('/home') }}">Accueil</a>--}}
                    @else
                        <a href="{{ route('login') }}">Connexion</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">S'enregistrer</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div style="display:none" class="title m-b-md">
                    Casino
                </div>

                <div class="links">
                @auth
                    @if(auth()->user()->hasRole('admin|chef d\'agence'))
                        <a class="button button2" href="{{url("admin/panel")}}">Administration</a>
                    @else
                        @if(auth()->user()->hasRole("joueur"))
                            <a class="button button3" href="{{url('joueur_panel')}}">Mon Compte</a>
                        @endif
                    @endif
                    @if(auth()->user()->hasRole('responsable des jeux'))
                        <a class="button button3" href="{{url('responsable_jeu')}}">Demarrer une activité</a>
                    @endif
                @else 
                    <a class="button button3" href="{{route('login')}}">connexion</a>
                @endauth
                </div>
            </div>
        </div>
    </body>
</html>
