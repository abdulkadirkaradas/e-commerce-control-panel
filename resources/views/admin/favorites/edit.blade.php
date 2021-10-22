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
                <select class="form-control select2 {{ $errors->has('attachment') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id">
                    @foreach($customers as $key => $value)
                        <option value="{{ $value->id }}" {{ old('customer_id') == $value->id ? 'selected' : '' }}>{{ $value->name . " " . $value->surname }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.favorite.fields.customer_id_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_id">{{ trans('cruds.favorite.fields.product_id') }}</label>
                <select class="form-control select2 {{ $errors->has('attachment') ? 'is-invalid' : '' }}" name="product_id" id="product_id">
                    @foreach($products as $key => $value)
                        <option value="{{ $value->id }}" {{ old('product_id') == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
                    @endforeach
                </select>
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
