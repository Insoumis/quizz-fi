@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Ajouter une Questions
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('questions.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="category_id" class="control-label">Catégorie</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected':''}}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label for="name" class="control-label">Question</label>
                                <textarea name="name" id="name" class="form-control" rows="5">{{ old('name') }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
