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
                <label for="product_id">{{ trans('cruds.productDetail.fields.product_id') }}</label>
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
                <span class="help-block">{{ trans('cruds.productDetail.fields.product_id_helper') }}</span>
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
