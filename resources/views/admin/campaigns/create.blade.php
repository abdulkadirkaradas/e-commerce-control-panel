@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.campaign.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.campaigns.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.campaign.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.campaign.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}">
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="customer_id">{{ trans('cruds.campaign.fields.customer_id') }}</label>
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
                <span class="help-block">{{ trans('cruds.campaign.fields.customer_id_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_id">{{ trans('cruds.campaign.fields.product_id') }}</label>
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
                <span class="help-block">{{ trans('cruds.campaign.fields.product_id_helper') }}</span>
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
