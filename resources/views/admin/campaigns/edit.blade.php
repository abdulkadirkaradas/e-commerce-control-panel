@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.campaign.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.campaigns.update", [$campaign->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.campaign.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $campaign->name) }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.campaign.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $campaign->description) }}">
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="customer_uuid_id">{{ trans('cruds.campaign.fields.customer_uuid') }}</label>
                <select class="form-control select2 {{ $errors->has('customer_uuid') ? 'is-invalid' : '' }}" name="customer_uuid_id" id="customer_uuid_id">
                    @foreach($customer_uuids as $id => $entry)
                        <option value="{{ $id }}" {{ (old('customer_uuid_id') ? old('customer_uuid_id') : $campaign->customer_uuid->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer_uuid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_uuid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.customer_uuid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_uuid_id">{{ trans('cruds.campaign.fields.product_uuid') }}</label>
                <select class="form-control select2 {{ $errors->has('product_uuid') ? 'is-invalid' : '' }}" name="product_uuid_id" id="product_uuid_id">
                    @foreach($product_uuids as $id => $entry)
                        <option value="{{ $id }}" {{ (old('product_uuid_id') ? old('product_uuid_id') : $campaign->product_uuid->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product_uuid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_uuid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.product_uuid_helper') }}</span>
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
