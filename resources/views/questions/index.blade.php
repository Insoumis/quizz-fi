@extends('layouts.app')

@section('content')
    <div class="container">

        @if(Session::has('questions.success'))
            <div class="alert alert-success">
                <p>{{ Session::get('questions.success') }}</p>
            </div>
        @endif


        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <a class="btn btn-success btn-sm" href="{{ route('questions.create') }}"><i class="glyphicon glyphicon-plus-sign"></i></a>
                        </div>
                        Questions
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Categorie</th>
                                <th>Question</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($questions as $question)
                                <tr>
                                    <td>{{ $question->id }}</td>
                                    <td>{{ $question->category->name }}</td>
                                    <td>{{ str_limit($question->name, 120) }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
