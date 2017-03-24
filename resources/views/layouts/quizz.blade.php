<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Suis-je Insoumis ?</title>
    <meta name="description" content="Découvrez grâce à un tirage aléatoire les propositions du programme de la France Insoumise, représentée par son candidat Jean-Luc MÉLENCHON.">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">

    <meta property="og:title" content="Suis-je Insoumis ?" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://suisjeinsoumis.fr/" />
    <meta property="og:description" content="Découvrez grâce à un tirage aléatoire les propositions du programme de la France Insoumise, représentée par son candidat Jean-Luc MÉLENCHON." />

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/images/ico/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/images/ico/apple-touch-icon-152x152.png" />
    <link rel="icon" type="image/png" href="/images/ico/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="/images/ico/favicon-16x16.png" sizes="16x16" />
    <meta name="application-name" content="Suis-je Insoumis ?"/>
    <meta name="msapplication-TileColor" content="#0098B6" />
    <meta name="msapplication-TileImage" content="/images/ico/mstile-144x144.png" />
    <meta name="theme-color" content="#0098b6">
    <link rel="icon" href="/images/ico/favicon.ico">


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
        <div class="container-fluid" style="margin-top: 30px; margin-bottom: 80px; ">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <div class="row bottom-margin" style="background: rgba(255,255,255,0.85); padding: 1em;">
                <div class="col-sm-3"><strong>Je m’implique&nbsp;:</strong><br>
                    <a target="_blank" href="http://www.jlm2017.fr/agir">J’agis</a><br>
                    <a target="_blank" href="http://www.jlm2017.fr/donner">Je donne</a><br>
                    <a target="_blank" href="http://www.jlm2017.fr/inscription_detail">J’en dis plus sur moi</a><br>
                    <a target="_blank" href="http://www.jlm2017.fr/signup">Je crée un compte</a><br>
                    <a target="_blank" href="http://www.jlm2017.fr/parrainages">Les parrainages</a>
                </div>

                <div class="col-sm-3"><strong>Réseaux sociaux&nbsp;:</strong><br>
                    <a target="_blank" href="https://www.facebook.com/JLMelenchon/">Facebook</a><br>
                    <a target="_blank" href="https://twitter.com/JLMelenchon">Twitter</a><br>
                    <a target="_blank" href="https://www.youtube.com/user/PlaceauPeuple">Youtube</a><br>
                    <a target="_blank" href="http://plus.google.com/+JLMelenchon/">Google+</a><br>
                    <a target="_blank" href="http://instagram.com/jlmelenchon/">Instagram</a><br>
                </div>

                <div class="col-sm-3"><strong>Groupes d’appui&nbsp;:</strong><br>
                    <a target="_blank" href="http://www.jlm2017.fr/groupes_appui">La carte des groupes</a><br>
                    <a target="_blank" href="http://www.jlm2017.fr/actualites-groupes-appui">L'actu des groupes d'appui</a><br>
                    <a target="_blank" href="http://www.jlm2017.fr/creer_ou_rejoindre_un_groupe_d_appui">Créer ou rejoindre un groupe</a>
                </div>

                <div class="col-sm-3"><strong>Evènements&nbsp;:</strong><br>
                    <a target="_blank" href="http://www.jlm2017.fr/agenda_melenchon">L’agenda de JLM</a><br>
                    <a target="_blank" href="http://www.jlm2017.fr/evenements_locaux">Evènements locaux</a><br>
                </div>
            </div>
            </div>
        </div>

    </div>
    <!-- Scripts -->
    <script src="{{ mix("/js/app.js") }}"></script>
</body>
</html>
