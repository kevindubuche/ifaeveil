<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>I.F.A</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-image: linear-gradient(#b89f12, #ffffff);
                /* background-color: #fff;
                color: #636b6f; */
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
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            /* kev */
                .button {
                transition-duration: 0.4s;
                box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
                
                }

                .button:hover {
                color: white;
                }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" style="color: white" ><strong>Accueil</strong></a>
                    @else
                        <a href="{{ route('login') }}" style="color: white"><strong>Connexion</strong></a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <img src={{asset('logo.png')}} alt="logo" style="width: 110px; height: 100px">
                <div class="title m-b-md">
                    Institution Frère André
                    Foyer Eveil
                </div>
                <div class="links">
                    <a >Bienvenue dans votre école en ligne !
                        Connectez-vous pour commencer.</a>
                </div>

                @if (Route::has('login'))               
                    @auth
                        <a href="{{ url('/home') }}" class="button"><h1><strong>Accueil</strong></h1></a>
                   @else
                        <a href="{{ route('login') }}" class="button"><h1><strong>Connexion</strong></h1></a>
                    @endauth
               
            @endif
                
                <div class="links">
                    33, Route des Dalles Carrefour Feuille
                    +509 3867 2526 | +509 2227 6816 | +509 3107 8119
                </div>
            </div>
        </div>
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            Copyright © 2020 <span>Tout droit reservé | Institution Frère André _ Foyer Eveil</span>.
        </footer>
    </body>
</html>
