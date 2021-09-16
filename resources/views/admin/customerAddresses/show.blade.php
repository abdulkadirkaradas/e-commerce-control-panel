@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.customerAddress.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customer-addresses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.customerAddress.fields.id') }}
                        </th>
                        <td>
                            {{ $customerAddress->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerAddress.fields.customer_id') }}
                        </th>
                        <td>
                            {{ $customerAddress->customer_id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerAddress.fields.province') }}
                        </th>
                        <td>
                            {{ App\Models\CustomerAddress::PROVINCE_SELECT[$customerAddress->province] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerAddress.fields.district') }}
                        </th>
                        <td>
                            {{ App\Models\CustomerAddress::DISTRICT_SELECT[$customerAddress->district] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerAddress.fields.quarter') }}
                        </th>
                        <td>
                            {{ App\Models\CustomerAddress::QUARTER_SELECT[$customerAddress->quarter] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerAddress.fields.street') }}
                        </th>
                        <td>
                            {{ App\Models\CustomerAddress::STREET_SELECT[$customerAddress->street] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.customerAddress.fields.address') }}
                        </th>
                        <td>
                            {{ $customerAddress->address }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.customer-addresses.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
