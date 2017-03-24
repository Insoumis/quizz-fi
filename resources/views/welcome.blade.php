@extends('layouts.quizz')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 fi-accueil-bloc">
                <div class="fi-top-menu">
                    @include('components.social_links_top')
                    <a class="btn btn-info btn-sm fi-top-propositions" href="{{ route('top') }}">
                        <i class="fa fa-trophy"></i>
                        Top des propositions
                    </a>
                </div>
                <div class="panel panel-default fi-boite-accueil">
                    <div class="panel-body">
                        <div class="fi-accueil-titre">
                            <strong>Suis-je<br/>Insoumis.fr</strong>
                        </div>
                        
                        <p>Découvrez grâce à un tirage aléatoire les propositions du programme de la France Insoumise,<br/>
                        représentée par son candidat <strong>Jean-Luc MÉLENCHON</strong>.</p>
                        <p>À l'issue de la série de questions de votre choix, vous saurez si vous adhérez aux idées du mouvement...</p>
                        <p class="fi-accueil-etonnement"><strong>Le résultat pourrait bien vous étonner&nbsp;!</strong></p>

                        <form action="{{ route('generate_quizz') }}" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-4 col-sm-4 text-left">
                                    <button class="btn btn-block btn-primary" type="submit" name="type" value="10">
                                        <div class="fi-contenu-bouton">
                                            <div class="fi-icon-timer"></div>
                                            <div class="fi-texte-bouton">
                                                <span class="fi-bouton-titre">10 propositions</span>
                                                <br/>
                                                environ 1 minute
                                            </div>
                                        </div>
                                    </button>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <button class="btn btn-block btn-primary" type="submit" name="type" value="20">
                                        <div class="fi-contenu-bouton">
                                            <div class="fi-icon-timer"></div>
                                            <div class="fi-texte-bouton">
                                                <span class="fi-bouton-titre">20 propositions</span>
                                                <br/>
                                                environ 2 minutes
                                            </div>
                                        </div>
                                    </button>
                                </div>
                                <div class="col-md-4 col-sm-4 text-right">
                                    <button class="btn btn-block btn-primary" type="submit" name="type" value="40">
                                        <div class="fi-contenu-bouton">
                                            <div class="fi-icon-timer"></div>
                                            <div class="fi-texte-bouton">
                                                <span class="fi-bouton-titre">40 propositions</span>
                                                <br/>
                                                environ 5 minutes
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
