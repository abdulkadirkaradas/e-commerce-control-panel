@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.shoppingCart.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shopping-carts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.shoppingCart.fields.id') }}
                        </th>
                        <td>
                            {{ $shoppingCart->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shoppingCart.fields.customer_id') }}
                        </th>
                        <td>
                            {{ $shoppingCart->customer_id->id ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shoppingCart.fields.product_id') }}
                        </th>
                        <td>
                            {{ $shoppingCart->product_id->id ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.shoppingCart.fields.quantity') }}
                        </th>
                        <td>
                            {{ $shoppingCart->quantity }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.shopping-carts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
