@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.customerAddress.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.customer-address.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="customer_id">{{ trans('cruds.customerAddress.fields.id') }}</label>
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
                <select class="form-control {{ $errors->has('province') ? 'is-invalid' : '' }}" data-id="provinces" name="province_id" id="province">
                    <option value disabled {{ old('province', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach($provinces as $key => $label)
                        <option value="{{ $label->id }}" {{ old('province', '') === (string) $label->id ? 'selected' : '' }}>{{ $label->name }}</option>
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
                <select class="form-control {{ $errors->has('district') ? 'is-invalid' : '' }}" data-id="districts" name="district_id" id="district">
                    <option value disabled {{ old('district', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
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
                <select class="form-control {{ $errors->has('quarter') ? 'is-invalid' : '' }}" data-id="quarters" name="quarter_id" id="quarter">
                    <option value disabled {{ old('quarter', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
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
                <select class="form-control {{ $errors->has('street') ? 'is-invalid' : '' }}" name="street_id" id="street">
                    <option value disabled {{ old('street', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
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
    var districts = {};
    var quarters = {};
    var streets = {};
    var option = "";
    $(document).ready(function(){
        districts = JSON.parse($("#districts").val());
        quarters = JSON.parse($("#quarters").val());
        streets = JSON.parse($("#streets").val());
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
</script>

@endsection
