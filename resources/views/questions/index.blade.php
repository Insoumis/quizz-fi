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
                                        class="fa fa-plus-circle"></i></a>
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
                                        <a href="{{ route('questions.edit', $question) }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm"
                                           onclick="removeQuestion('remove-form-{{$question->id}}', event)">
                                            <i class="fa fa-trash fa-2"></i>
                                        </a>
                                        <form
                                                action="{{ route('questions.destroy', $question) }}"
                                                id="remove-form-{{$question->id}}"
                                                style="display:none;"
                                                method="post"
                                        >
                                            {{ method_field("delete") }}
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

@push('js')
<script>
    const removeQuestion = function(formId, ev) {
        ev.preventDefault();
        const form = document.getElementById(formId);
        if (confirm('Voulez-vous réellement supprimer cette proposition ?')) {
            form.submit();
        }
    }
</script>
@endpush
