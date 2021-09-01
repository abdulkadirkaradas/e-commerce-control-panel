@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.review.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reviews.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.review.fields.id') }}
                        </th>
                        <td>
                            {{ $review->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.review.fields.customer_uuid') }}
                        </th>
                        <td>
                            {{ $review->customer_uuid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.review.fields.product_uuid') }}
                        </th>
                        <td>
                            {{ $review->product_uuid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.review.fields.rate_score') }}
                        </th>
                        <td>
                            {{ $review->rate_score }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.review.fields.review') }}
                        </th>
                        <td>
                            {{ $review->review }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.review.fields.attachment') }}
                        </th>
                        <td>
                            {{ $review->attachment->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reviews.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
