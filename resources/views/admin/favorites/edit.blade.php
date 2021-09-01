@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.favorite.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.favorites.update", [$favorite->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="customer_uuid">{{ trans('cruds.favorite.fields.customer_uuid') }}</label>
                <input class="form-control {{ $errors->has('customer_uuid') ? 'is-invalid' : '' }}" type="text" name="customer_uuid" id="customer_uuid" value="{{ old('customer_uuid', $favorite->customer_uuid) }}">
                @if($errors->has('customer_uuid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_uuid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.favorite.fields.customer_uuid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_uuid">{{ trans('cruds.favorite.fields.product_uuid') }}</label>
                <input class="form-control {{ $errors->has('product_uuid') ? 'is-invalid' : '' }}" type="text" name="product_uuid" id="product_uuid" value="{{ old('product_uuid', $favorite->product_uuid) }}">
                @if($errors->has('product_uuid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_uuid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.favorite.fields.product_uuid_helper') }}</span>
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
