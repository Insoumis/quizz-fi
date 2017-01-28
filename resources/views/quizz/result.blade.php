@extends('layouts.quizz')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">
                    <div class="panel-body">

                        <a class="btn btn-success" href="{{ route('top') }}">
                            <i class="fa fa-trophy"></i>
                            Top des propositions
                        </a>


                        <h1>Résultats</h1>

                        <p>
                            <strong>Partager votre résultat sur les réseaux sociaux :</strong>
                            <a href="http://www.facebook.com/sharer/sharer.php?u={{ URL::full() }}"><i
                                        class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="http://twitter.com/intent/tweet?status={{ urlencode('Mon taux d\'accointance avec le programme de l\'Avenir en commun est de '.round($avgGlobal).'% : ' . URL::full()) }}"><i
                                        class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="https://plus.google.com/share?url={{ URL::full() }}"><i class="fa fa-google-plus"
                                                                                             aria-hidden="true"></i></a>
                        </p>

                        <h2>Pourcentage d'accointance avec le programme l'Avenir en commun</h2>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped"
                                 role="progressbar"
                                 aria-valuenow="{{round($avgGlobal,2)}}"
                                 aria-valuemin="0"
                                 aria-valuemax="100"
                                 style="width:{{round($avgGlobal,2)}}%"
                            >
                                {{round($avgGlobal,2)}}%
                            </div>
                        </div>


                        @if ($quizz->type == "40")
                            <h2>Pourcentage d'accointance par thème</h2>

                        @foreach($avgByCategories as $category => $score)
                                <h3 style="color: {{$categories->find($category)->color}}">
                                    Pourcentage d'accointance avec le thème '{{ $categories->find($category)->name }}'
                                </h3>
                                <div class="progress">
                                    <div
                                            class="progress-bar progress-bar-striped"
                                            role="progressbar"
                                            aria-valuenow="{{round($score,2)}}"
                                            aria-valuemin="0"
                                            aria-valuemax="100"
                                            style="width:{{round($score,2)}}%"
                                    >
                                        {{round($score,2)}}%
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
