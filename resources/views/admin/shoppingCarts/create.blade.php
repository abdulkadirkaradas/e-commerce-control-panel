@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.shoppingCart.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.shopping-carts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="customer_uuid_id">{{ trans('cruds.shoppingCart.fields.customer_uuid') }}</label>
                <select class="form-control select2 {{ $errors->has('customer_uuid') ? 'is-invalid' : '' }}" name="customer_uuid_id" id="customer_uuid_id">
                    @foreach($customer_uuids as $id => $entry)
                        <option value="{{ $id }}" {{ old('customer_uuid_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer_uuid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_uuid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shoppingCart.fields.customer_uuid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_uuid_id">{{ trans('cruds.shoppingCart.fields.product_uuid') }}</label>
                <select class="form-control select2 {{ $errors->has('product_uuid') ? 'is-invalid' : '' }}" name="product_uuid_id" id="product_uuid_id">
                    @foreach($product_uuids as $id => $entry)
                        <option value="{{ $id }}" {{ old('product_uuid_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product_uuid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_uuid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shoppingCart.fields.product_uuid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="quantity">{{ trans('cruds.shoppingCart.fields.quantity') }}</label>
                <input class="form-control {{ $errors->has('quantity') ? 'is-invalid' : '' }}" type="text" name="quantity" id="quantity" value="{{ old('quantity', '0') }}">
                @if($errors->has('quantity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quantity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shoppingCart.fields.quantity_helper') }}</span>
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
