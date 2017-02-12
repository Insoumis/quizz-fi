@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Créer un administrateur
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('users.store') }}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name" class="control-label">Nom<span class="mandatory-symbol">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                            </div>

                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email" class="control-label">Email<span class="mandatory-symbol">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            </div>

                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="password" class="control-label">Mot de passe<span class="mandatory-symbol">*</span></label>
                                <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
                            </div>

                            <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                <label for="password_confirmation" class="control-label">Confirmation<span class="mandatory-symbol">*</span></label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
                            </div>

                            <button type="submit" class="btn btn-success">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
