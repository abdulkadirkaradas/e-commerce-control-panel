@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.review.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reviews.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="customer_id">{{ trans('cruds.review.fields.customer_id') }}</label>
                <input class="form-control {{ $errors->has('customer_id') ? 'is-invalid' : '' }}" type="text" name="customer_id" id="customer_id" value="{{ old('customer_id', '') }}">
                @if($errors->has('customer_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('customer_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.review.fields.customer_id_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="product_id">{{ trans('cruds.review.fields.product_id') }}</label>
                <input class="form-control {{ $errors->has('product_id') ? 'is-invalid' : '' }}" type="text" name="product_id" id="product_id" value="{{ old('product_id', '') }}">
                @if($errors->has('product_id'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_id') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.review.fields.product_id_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="rate_score">{{ trans('cruds.review.fields.rate_score') }}</label>
                <input class="form-control {{ $errors->has('rate_score') ? 'is-invalid' : '' }}" type="text" name="rate_score" id="rate_score" value="{{ old('rate_score', '') }}">
                @if($errors->has('rate_score'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rate_score') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.review.fields.rate_score_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="review">{{ trans('cruds.review.fields.review') }}</label>
                <input class="form-control {{ $errors->has('review') ? 'is-invalid' : '' }}" type="text" name="review" id="review" value="{{ old('review', '') }}">
                @if($errors->has('review'))
                    <div class="invalid-feedback">
                        {{ $errors->first('review') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.review.fields.review_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="attachment_id">{{ trans('cruds.review.fields.attachment') }}</label>
                <select class="form-control select2 {{ $errors->has('attachment') ? 'is-invalid' : '' }}" name="attachment_id" id="attachment_id">
                    @foreach($attachments as $id => $entry)
                        <option value="{{ $id }}" {{ old('attachment_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('attachment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('attachment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.review.fields.attachment_helper') }}</span>
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
