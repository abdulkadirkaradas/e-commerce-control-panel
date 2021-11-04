@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productDetail.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.productDetail.fields.id') }}
                        </th>
                        <td>
                            {{ $productDetail->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productDetail.fields.product_id') }}
                        </th>
                        <td>
                            {{ $productDetail->product->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productDetail.fields.details') }}
                        </th>
                        <td>
                            {!! $productDetail->details !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productDetail.fields.images') }}
                        </th>
                        <td>
                            @foreach ($productImages as $image)
                                @if ($image->picture_type == "image")
                                    <a href="{{ $image->file_url }}" target="_blank" class="mr-2" style="display: inline-block;">
                                        <img style="width: 4vw;" src="{{ asset("products_images/$image->image_url") }}">
                                    </a>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productDetail.fields.images') }}
                        </th>
                        <td>
                            @foreach ($productImages as $image)
                                @if ($image->picture_type == "thumbnail")
                                    <a href="{{ $image->file_url }}" target="_blank" style="display: inline-block;">
                                        <img style="width: 4vw;" src="{{ asset("products_thumbnails/$image->image_url") }}">
                                    </a>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-details.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
