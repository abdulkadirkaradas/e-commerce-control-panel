@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.customerAddress.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.customer-address.update", [$customerAddress->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="customer_id">{{ trans('cruds.customerAddress.fields.customer_id') }}</label>
                <select class="form-control {{ $errors->has('customer_id') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id">
                    <option value disabled {{ old('customer_id', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($customers as $key => $value)
                        <option value="{{ $value->id }}" {{ old('customer_id') == $value->id ? 'selected' : '' }}>{{ $value->name }}</option>
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
                <label>{{ trans('cruds.customerAddress.fields.province') }}</label>
                <select class="form-control {{ $errors->has('province') ? 'is-invalid' : '' }}" data-id="provinces" name="province" id="province">
                    <option value disabled {{ old('province', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($provinces as $key => $value)
                        @if ($value->id == $customerAddress->province_id)
                            <option selected value="{{ $value->id }}">{{ $value->name }}</option>
                        @endif
                        <option value="{{ $value->id }}">{{ $value->name }}</option>
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
                <select class="form-control {{ $errors->has('district') ? 'is-invalid' : '' }}" data-id="districts" name="district" id="district">
                    <option value disabled {{ old('district', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    {{-- <option value="{{ $customerAddress->district }}" {{ old('province', $customerAddress->district) === (string) $customerAddress->district ? 'selected' : '' }}>{{ $customerAddress->district }}</option> --}}
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
                <select class="form-control {{ $errors->has('quarter') ? 'is-invalid' : '' }}" data-id="quarters" name="quarter" id="quarter">
                    <option value disabled {{ old('quarter', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    {{-- <option value="{{ $customerAddress->quarter }}" {{ old('province', $customerAddress->quarter) === (string) $customerAddress->quarter ? 'selected' : '' }}>{{ $customerAddress->quarter }}</option> --}}
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
                    {{-- <option value="{{ $customerAddress->street }}" {{ old('province', $customerAddress->street) === (string) $customerAddress->street ? 'selected' : '' }}>{{ $customerAddress->street }}</option> --}}
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
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address">{{ old('address', $customerAddress->address) }}</textarea>
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

            <input type="hidden" id="customers" value="{{ $customers }}">
            <input type="hidden" id="customerAddress" value="{{ $customerAddress }}">
            <input type="hidden" id="provinces" value="{{ $provinces }}">
            <input type="hidden" id="districts" value="{{ $districts }}">
            <input type="hidden" id="quarters" value="{{ $quarters }}">
            <input type="hidden" id="streets" value="{{ $streets }}">
        </form>
    </div>
</div>

@endsection

@section('scripts')
@parent

<script>
    var customers = {}
    var customerAddress = {};
    var provinces = {};
    var districts = {};
    var quarters = {};
    var streets = {};
    var option = "";

    $(document).ready(function(){
        customers = JSON.parse($("#customers").val());
        customerAddress = JSON.parse($("#customerAddress").val());
        provinces = JSON.parse($("#provinces").val());
        districts = JSON.parse($("#districts").val());
        quarters = JSON.parse($("#quarters").val());
        streets = JSON.parse($("#streets").val());

        putData(customerAddress, customers, "#customer_id", "customer", "customer");
        putData(customerAddress, provinces, "#province", "address", "province");
        putData(customerAddress, districts, "#district", "address", "district");
        putData(customerAddress, quarters, "#quarter", "address", "quarter");
        putData(customerAddress, streets, "#street", "address", "street");
    });

    $("#province, #district, #quarter").on("change", function(){
        if($(this).is("select") === true) {
            var id = $(this).val();
            var name = $(this).data("id");
            if(name == "provinces") {
                option = "<option value disabled {{ old('district', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>";
                getData(id, districts, option, "#district");
            } else if(name == "districts") {
                option = "<option value disabled {{ old('quarter', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>";
                getData(id, quarters, option, "#quarter");
            } else {
                option = "<option value disabled {{ old('street', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>";
                getData(id, streets, option, "#street");
            }
        }
    });

    function getData(id, object, option, name) {
        object.forEach(element => {
            if(id == element._id) {
                $(name).empty();
                $(name).append(option);
                $(name).append(
                    `<option value="` + element.id + `">` + element.name + `</option>`
                );
            }
        });
    }

    function putData(object, collection, selector, type, kind) {
        if(type == "address") {
            collection.forEach(element => {
                if(object.province_id == element._id) {
                    putElements(selector,  element);
                } else if(object.district_id == element._id) {
                    putElements(selector,  element);
                } else if(object.quarter_id == element._id) {
                    putElements(selector, element);
                }
            });
        } else if(type == "customer") {
            collection.forEach(element => {
                if(object.customer_id == element.id) {
                    putElements(selector, element);
                }
            });
        }
    }

    function putElements(selector, element) {
        if(element != null) {
            $(selector).append(
                `<option selected value="` + element.id + `">` + element.name + `</option>`
            );
        }
    }
</script>

@endsection
