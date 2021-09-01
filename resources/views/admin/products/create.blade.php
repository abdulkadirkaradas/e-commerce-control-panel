@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.product.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.products.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="category_uuid_id">{{ trans('cruds.product.fields.category_uuid') }}</label>
                <select class="form-control select2 {{ $errors->has('category_uuid') ? 'is-invalid' : '' }}" name="category_uuid_id" id="category_uuid_id">
                    @foreach($category_uuids as $id => $entry)
                        <option value="{{ $id }}" {{ old('category_uuid_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_uuid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category_uuid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.category_uuid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status_uuid_id">{{ trans('cruds.product.fields.status_uuid') }}</label>
                <select class="form-control select2 {{ $errors->has('status_uuid') ? 'is-invalid' : '' }}" name="status_uuid_id" id="status_uuid_id">
                    @foreach($status_uuids as $id => $entry)
                        <option value="{{ $id }}" {{ old('status_uuid_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('status_uuid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status_uuid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.status_uuid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.product.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.product.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}">
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price">{{ trans('cruds.product.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text" name="price" id="price" value="{{ old('price', '') }}">
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
