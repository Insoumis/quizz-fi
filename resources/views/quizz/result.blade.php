@extends('layouts.quizz')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">
                    <div class="panel-body">

                <h1>Résultats</h1>

                <h2>Pourcentage d'accointance avec le programme l'Avenir en commun</h2>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped"
                         role="progressbar"
                         aria-valuenow="{{$avgGlobal}}"
                         aria-valuemin="0"
                         aria-valuemax="100"
                         style="width:{{$avgGlobal}}%"
                    >
                        {{$avgGlobal}}%
                    </div>
                </div>


                @if ($quizz->type == "40")
                    @foreach($avgByCategories as $category => $score)
                        <h2>Pourcentage d'accointance avec le thème '{{ $categories->find($category)->name }}'</h2>
                        <div class="progress">
                            <div
                                    class="progress-bar progress-bar-striped"
                                    role="progressbar"
                                    aria-valuenow="{{$score}}"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                    style="width:{{$score}}%"
                            >
                                {{$score}}%
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
