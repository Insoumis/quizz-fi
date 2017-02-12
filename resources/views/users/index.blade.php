@extends('layouts.app')

@section('content')
    <div class="container">

        @if(Session::has('users.success'))
            <div class="alert alert-success">
                <p>{{ Session::get('users.success') }}</p>
            </div>
        @endif


        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="pull-right">
                            <a class="btn btn-success btn-sm" href="{{ route('users.create') }}"><i
                                        class="fa fa-plus-circle"></i></a>
                        </div>
                        Administrateurs
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-responsive">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('users.edit', $user) }}" class="btn btn-info btn-sm">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        {{--
                                        <a href="#" class="btn btn-danger btn-sm"
                                           onclick="removeUser('remove-form-{{$user->id}}', event)">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form
                                                action="{{ route('users.destroy', $user) }}"
                                                id="remove-form-{{$user->id}}"
                                                style="display:none;"
                                                method="post"
                                        >
                                            {{ method_field("delete") }}
                                            {{ csrf_field() }}
                                        </form>
                                        --}}
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
    const removeUser = function(formId, ev) {
        ev.preventDefault();
        const form = document.getElementById(formId);
        if (confirm('Voulez-vous réellement supprimer cet administrateur ?')) {
            form.submit();
        }
    }
</script>
@endpush
