@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.order.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.orders.update", [$order->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="order_name">{{ trans('cruds.order.fields.order_name') }}</label>
                <input class="form-control {{ $errors->has('order_name') ? 'is-invalid' : '' }}" type="text" name="order_name" id="order_name" value="{{ old('order_name', $order->order_name) }}">
                @if($errors->has('order_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('order_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.order_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="products_uuid_id">{{ trans('cruds.order.fields.products_uuid') }}</label>
                <select class="form-control select2 {{ $errors->has('products_uuid') ? 'is-invalid' : '' }}" name="products_uuid_id" id="products_uuid_id">
                    @foreach($products_uuids as $id => $entry)
                        <option value="{{ $id }}" {{ (old('products_uuid_id') ? old('products_uuid_id') : $order->products_uuid->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('products_uuid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('products_uuid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.products_uuid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="customer_uuid_id">{{ trans('cruds.order.fields.customer_uuid') }}</label>
                <select class="form-control select2 {{ $errors->has('customer_uuid') ? 'is-invalid' : '' }}" name="customer_uuid_id" id="customer_uuid_id">
                    @foreach($customer_uuids as $id => $entry)
                        <option value="{{ $id }}" {{ (old('customer_uuid_id') ? old('customer_uuid_id') : $order->customer_uuid->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer_uuid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_uuid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.customer_uuid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_uuid_id">{{ trans('cruds.order.fields.address_uuid') }}</label>
                <select class="form-control select2 {{ $errors->has('address_uuid') ? 'is-invalid' : '' }}" name="address_uuid_id" id="address_uuid_id">
                    @foreach($address_uuids as $id => $entry)
                        <option value="{{ $id }}" {{ (old('address_uuid_id') ? old('address_uuid_id') : $order->address_uuid->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('address_uuid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_uuid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.address_uuid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="price_id">{{ trans('cruds.order.fields.price') }}</label>
                <select class="form-control select2 {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price_id" id="price_id">
                    @foreach($prices as $id => $entry)
                        <option value="{{ $id }}" {{ (old('price_id') ? old('price_id') : $order->price->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.price_helper') }}</span>
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
