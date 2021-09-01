@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reviewAttachment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.review-attachments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reviewAttachment.fields.id') }}
                        </th>
                        <td>
                            {{ $reviewAttachment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reviewAttachment.fields.name') }}
                        </th>
                        <td>
                            {{ $reviewAttachment->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reviewAttachment.fields.attachment') }}
                        </th>
                        <td>
                            @if($reviewAttachment->attachment)
                                <a href="{{ $reviewAttachment->attachment->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $reviewAttachment->attachment->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reviewAttachment.fields.location') }}
                        </th>
                        <td>
                            {{ $reviewAttachment->location }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.review-attachments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
