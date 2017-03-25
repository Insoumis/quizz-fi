@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Modifier une question
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('questions.store') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : '' }}">
                                <label for="category_id" class="control-label">Thème<span class="mandatory-symbol">*</span></label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value=""></option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected':''}}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group {{ $errors->has('proposition') ? 'has-error' : '' }}">
                                <label for="proposition" class="control-label">Proposition<span class="mandatory-symbol">*</span></label>
                                <textarea name="proposition" id="proposition" class="form-control" rows="5">{{ old('proposition') }}</textarea>
                            </div>

                            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                <label for="description" class="control-label">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                            </div>

                            <div class="form-group {{ $errors->has('laec_url') ? 'has-error' : '' }}">
                                <label for="laec_url" class="control-label">Lien laec.fr</label>
                                <input name="laec_url" id="laec_url" type="text" class="form-control" value="{{ old('laec_url') }}"/>
                            </div>

                            <div class="form-group {{ $errors->has('page_no') ? 'has-error' : '' }}">
                                <label for="page_no" class="control-label">Page n°</label>
                                <input step="1" name="page_no" id="page_no" type="number" class="form-control" value="{{ old('page_no') }}"/>
                            </div>

                            <button type="submit" class="btn btn-success">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
