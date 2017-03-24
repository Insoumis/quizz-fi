@extends('layouts.quizz')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 fi-accueil-bloc">

                <div class="fi-top-menu">
                    @include('components.social_links_top')
                    <a class="btn btn-info btn-sm fi-top-propositions" href="/top">
                        <i class="fa fa-trophy"></i>
                        Top des propositions
                    </a>
                </div>

                <div class="panel panel-default fi-boite-accueil">
                    <div class="panel-body">
                        <br>
                        <h2>Ta compatibilité avec le programme de la France Insoumise est de&nbsp;:</h2>
                        <br><br>
                        <div class="col-lg-10 col-lg-offset-1">
                            <div class="progress">
                                <div class="progress-bar progress-striped progress-bar-custom"
                                     role="progressbar"
                                     aria-valuenow="{{round($avgGlobal,2)}}"
                                     aria-valuemin="0"
                                     aria-valuemax="100"
                                     style="width:{{round($avgGlobal,2)}}%"
                                >
                                    {{round($avgGlobal,2)}}%
                                </div>
                            </div>
                        </div>
                        <br><br><br>


                        @if ($quizz->type == "40")
                            <h2>Pourcentage de compatibilité par thème</h2>

                            @foreach($avgByCategories as $category => $score)
                                <div class="col-lg-10 col-lg-offset-1">
                                    <div class="progress">
                                        <div
                                                class="progress-bar progress-striped progress-bar-custom fi-theme-{{$categories->find($category)->id}}"
                                                role="progressbar"
                                                aria-valuenow="{{round($score,2)}}"
                                                aria-valuemin="0"
                                                aria-valuemax="100"
                                                style="width:{{round($score,2)}}%"
                                        >
                                            {{ $categories->find($category)->name }} : {{round($score,2)}}%
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <br><br><br><br><br>
                        <div class="col-lg-10 col-lg-offset-1">
                            <p>
                                <strong>Partage ton résultat&nbsp;:</strong>
                                <a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u={{ URL::full() }}"><i
                                            class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a target="_blank" href="http://twitter.com/intent/tweet?status={{ urlencode('Mon taux de compatibilité avec le programme de l\'Avenir en commun est de '.round($avgGlobal).'% : ' . URL::full()) }}"><i
                                            class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a target="_blank" href="https://plus.google.com/share?url={{ URL::full() }}"><i class="fa fa-google-plus"
                                                                                                 aria-hidden="true"></i></a>
                            </p>
                        </div>
                        <br>

                        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-sm-4 col-xs-4">
                            <h1><a class="fi-refaire-test" href="/">Refaire un test</a></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
