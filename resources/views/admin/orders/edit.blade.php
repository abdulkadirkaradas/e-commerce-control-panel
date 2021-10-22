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
                <label for="products_id">{{ trans('cruds.order.fields.products_id') }}</label>
                <select class="form-control select2 {{ $errors->has('products_id') ? 'is-invalid' : '' }}" name="products_id" id="products_id">
                    @foreach($products_ids as $id => $entry)
                        <option value="{{ $id }}" {{ (old('products_id') ? old('products_id') : $order->products->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('products_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('products_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.products_id_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="customer_id">{{ trans('cruds.order.fields.customer_id') }}</label>
                <select class="form-control select2 {{ $errors->has('customer_id') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id">
                    @foreach($customer_ids as $id => $entry)
                        <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $order->customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.customer_id_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_id">{{ trans('cruds.order.fields.address_id') }}</label>
                <select class="form-control select2 {{ $errors->has('address_id') ? 'is-invalid' : '' }}" name="address_id" id="address_id">
                    @foreach($address_ids as $id => $entry)
                        <option value="{{ $id }}" {{ (old('address_id') ? old('address_id') : $order->address->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('address_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.order.fields.address_id_helper') }}</span>
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
