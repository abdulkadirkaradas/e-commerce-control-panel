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
                <label for="customer_id">{{ trans('cruds.shoppingCart.fields.customer_id') }}</label>
                <select class="form-control select2 {{ $errors->has('customer_id') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id">
                    @foreach($customer_ids as $id => $entry)
                        <option value="{{ $id }}" {{ old('customer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shoppingCart.fields.customer_id_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_id">{{ trans('cruds.shoppingCart.fields.product_id') }}</label>
                <select class="form-control select2 {{ $errors->has('product_id') ? 'is-invalid' : '' }}" name="product_id" id="product_id">
                    @foreach($product_ids as $id => $entry)
                        <option value="{{ $id }}" {{ old('product_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.shoppingCart.fields.product_id_helper') }}</span>
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
