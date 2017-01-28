@extends('layouts.quizz')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">


                <a href="{{ route('index') }}" class="btn btn-info"><i class="glyphicon glyphicon-home"></i> Retour à
                    l'accueil</a>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h1>Top</h1>
                        @foreach($resultByQuestion as $questionId => $result)
                            @php
                                $question = $questions->find($questionId)
                            @endphp
                            <div class="row">
                                <div class="col-md-3">
                                    {{ $question->category->name}}
                                </div>
                                <div class="col-md-6">
                                    {{ $question->proposition }}
                                </div>
                                <div class="col-md-1">
                                    {{ round($result, 2) }}%
                                </div>
                                <div class="col-md-2">
                                    fb | tw
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <a href="{{ route('index') }}" class="btn btn-info"><i class="glyphicon glyphicon-home"></i> Retour à
                    l'accueil</a>

            </div>
        </div>
    </div>
@endsection
