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
                <label for="customer_id">{{ trans('cruds.favorite.fields.customer_id') }}</label>
                <input class="form-control {{ $errors->has('customer_id') ? 'is-invalid' : '' }}" type="text" name="customer_id" id="customer_id" value="{{ old('customer_id', $favorite->customer_id) }}">
                @if($errors->has('customer_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.favorite.fields.customer_id_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_id">{{ trans('cruds.favorite.fields.product_id') }}</label>
                <input class="form-control {{ $errors->has('product_id') ? 'is-invalid' : '' }}" type="text" name="product_id" id="product_id" value="{{ old('product_id', $favorite->product_id) }}">
                @if($errors->has('product_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.favorite.fields.product_id_helper') }}</span>
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
