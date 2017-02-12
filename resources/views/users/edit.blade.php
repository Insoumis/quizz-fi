@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Modifier un administrateur
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('users.update', [$user->id]) }}" method="post">
                            {{ method_field('put') }}
                            {{ csrf_field() }}

                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name" class="control-label">Nom<span class="mandatory-symbol">*</span></label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}">
                            </div>

                            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                <label for="email" class="control-label">Email<span class="mandatory-symbol">*</span></label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">
                            </div>

                            <button type="button" id="js-pwd-zone-toggler" class="btn btn-primary">Modifier également le mot de passe</button>

                            <div id="js-pwd-zone">
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label for="password" class="control-label">Mot de passe<span class="mandatory-symbol">*</span></label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>

                                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                    <label for="password_confirmation" class="control-label">Confirmation<span class="mandatory-symbol">*</span></label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    var pwdZone = $("#js-pwd-zone");
    @unless($errors->has('password'))
    pwdZone.hide();
    @endunless
    $('#js-pwd-zone-toggler').on("click", function () {
        pwdZone.toggle({
            duration: 0,
            complete: function () {
                if(!pwdZone.is(":visible")) {
                    $("#password").val('');
                    $("#password_confirmation").val('');
                }
            }
        });
    });
</script>
@endpush
