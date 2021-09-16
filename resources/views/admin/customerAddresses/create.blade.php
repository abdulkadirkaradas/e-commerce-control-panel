@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.customerAddress.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.customer-addresses.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="customer_id">{{ trans('cruds.faq.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id">
                    @foreach($customers as $id => $entry)
                        <option value="{{ $entry->id }}" {{ old('customer_id') == $entry->id ? 'selected' : '' }}>{{ $entry->name }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.faq.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.customerAddress.fields.province') }}</label>
                <select class="form-control {{ $errors->has('province') ? 'is-invalid' : '' }}" name="province" id="province">
                    <option value disabled {{ old('province', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\CustomerAddress::PROVINCE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('province', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('province'))
                    <div class="invalid-feedback">
                        {{ $errors->first('province') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerAddress.fields.province_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.customerAddress.fields.district') }}</label>
                <select class="form-control {{ $errors->has('district') ? 'is-invalid' : '' }}" name="district" id="district">
                    <option value disabled {{ old('district', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\CustomerAddress::DISTRICT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('district', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('district'))
                    <div class="invalid-feedback">
                        {{ $errors->first('district') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerAddress.fields.district_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.customerAddress.fields.quarter') }}</label>
                <select class="form-control {{ $errors->has('quarter') ? 'is-invalid' : '' }}" name="quarter" id="quarter">
                    <option value disabled {{ old('quarter', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\CustomerAddress::QUARTER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('quarter', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('quarter'))
                    <div class="invalid-feedback">
                        {{ $errors->first('quarter') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerAddress.fields.quarter_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.customerAddress.fields.street') }}</label>
                <select class="form-control {{ $errors->has('street') ? 'is-invalid' : '' }}" name="street" id="street">
                    <option value disabled {{ old('street', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\CustomerAddress::STREET_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('street', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('street'))
                    <div class="invalid-feedback">
                        {{ $errors->first('street') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerAddress.fields.street_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.customerAddress.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address">{{ old('address') }}</textarea>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.customerAddress.fields.address_helper') }}</span>
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
