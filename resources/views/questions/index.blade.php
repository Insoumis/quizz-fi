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
                            <a class="btn btn-success btn-sm" href="{{ route('questions.create') }}"><i
                                        class="glyphicon glyphicon-plus-sign"></i></a>
                        </div>
                        Questions
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Categorie</th>
                                <th>Question</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($questions as $question)
                                <tr>
                                    <td>{{ $question->id }}</td>
                                    <td>{{ $question->category->name }}</td>
                                    <td>{{ str_limit($question->proposition, 120) }}</td>
                                    <td class="text-right">
                                        <a href="javascript:alert('todo')" class="btn btn-info btn-sm">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                            <a href="#" class="btn btn-danger btn-sm" onclick="return alert('todo'); document.getElementById('remove-form-{{$question->id}}').submit()">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </a>
                                        <form action="#" id="remove-form-{{$question->id}}" style="display:none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </td>
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
