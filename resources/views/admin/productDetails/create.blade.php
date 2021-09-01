@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.productDetail.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product-details.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="product_uuid_id">{{ trans('cruds.productDetail.fields.product_uuid') }}</label>
                <select class="form-control select2 {{ $errors->has('product_uuid') ? 'is-invalid' : '' }}" name="product_uuid_id" id="product_uuid_id">
                    @foreach($product_uuids as $id => $entry)
                        <option value="{{ $id }}" {{ old('product_uuid_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product_uuid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_uuid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productDetail.fields.product_uuid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="details">{{ trans('cruds.productDetail.fields.details') }}</label>
                <input class="form-control {{ $errors->has('details') ? 'is-invalid' : '' }}" type="text" name="details" id="details" value="{{ old('details', '') }}">
                @if($errors->has('details'))
                    <div class="invalid-feedback">
                        {{ $errors->first('details') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productDetail.fields.details_helper') }}</span>
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
