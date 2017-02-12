<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ mix("/css/app.css") }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        @yield('content')

        <div class="container-fluid">  
            <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-3">
                <div class="fi-createurs col-lg-8 col-lg-offset-2">
                    <div class="fi-createurs-border">Site créé à l'initiative<br/>de citoyen.ne.s insoumis.es</div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="fi-footer col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <p class="fi-footer-titre">Je m'implique&nbsp;:</p>
                    <p><a href="">J'agis</a></p>
                    <p><a href="">Je donne</a></p>
                    <p><a href="">Les parrainages</a></p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <p class="fi-footer-titre">Réseaux sociaux&nbsp;:</p>
                    <p><a href="">Facebook</a></p>
                    <p><a href="">Twitter</a></p>
                    <p><a href="">YouTube</a></p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <p class="fi-footer-titre">Groupes d'appui&nbsp;:</p>
                    <p><a href="">La carte des groupes</a></p>
                    <p><a href="">L'actu des groupes</a></p>
                    <p><a href="">Créer ou rejoindre un groupe</a></p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                    <p class="fi-footer-titre">Événements&nbsp;:</p>
                    <p><a href="">L'agenda de JLM</a></p>
                    <p><a href="">Événements locaux</a></p>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fi-footer-jlm2017">
                    <a href="http://www.jlm2017.fr">jlm2017.fr</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ mix("/js/app.js") }}"></script>
</body>
</html>
