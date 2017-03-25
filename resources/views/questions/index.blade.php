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

                        <label>
                            <input class="js-correction-mode" type="checkbox" {{ request('correction') ? 'checked' : ''  }}> Mode relecture ?
                        </label>

                        <table class="table table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Categorie</th>
                                <th>Proposition</th>
                                @if (request('correction'))
                                    <th>Description</th>
                                @endif
                                <th>Lien LAEC.fr</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($questions as $question)
                                <tr>
                                    <td>{{ $question->id }}</td>
                                    <td>{{ $question->category->name }}</td>
                                    @if (request('correction'))
                                        <td>{!! nl2br($question->proposition) !!}</td>
                                        <td>{!! nl2br($question->description) !!}</td>
                                    @else
                                        <td>{{ str_limit($question->proposition, 120) }}</td>
                                    @endif
                                    <td>
                                        @if($question->laec_url)
                                            <a href="{{ $question->laec_url }}"><i class="fa fa-eye"></i></a>
                                        @else
                                           <i class="fa fa-eye-slash"></i>
                                        @endif
                                    </td>
                                    <td class="text-right" width="90">
                                        <a href="{{ route('questions.edit', $question) }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm"
                                           onclick="removeQuestion('remove-form-{{$question->id}}', event)">
                                            <i class="fa fa-trash"></i>
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
    const currentUrl = '{{ URL::current() }}';

    const removeQuestion = function(formId, ev) {
        ev.preventDefault();
        const form = document.getElementById(formId);
        if (confirm('Voulez-vous réellement supprimer cette proposition ?')) {
            form.submit();
        }
    }

    $('.js-correction-mode').change(function() {
        window.location.href = currentUrl + '?correction=' + (this.checked ? '1' : '0');
    });
</script>
@endpush
