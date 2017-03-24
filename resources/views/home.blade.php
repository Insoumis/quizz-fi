@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <ul>
                            <li>{{ $totalQuestions }} propositions présentes.</li>
                            <li>{{ $totalQuizz }} quizz générés.</li>
                            <li>{{ $totalQuizzAnswered }} quizz terminés.</li>
                            <li>{{ $totalAnswer }} réponses aux propositions.</li>
                            <li>{{ $totalAnswer }} réponses aux propositions.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
