@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.banner.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.banners.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.banner.fields.id') }}
                        </th>
                        <td>
                            {{ $banner->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banner.fields.key') }}
                        </th>
                        <td>
                            {{ $banner->key }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banner.fields.banner') }}
                        </th>
                        <td>
                            @if($banner->file_url)
                                <a href="{{ $banner->file_url }}" target="_blank" style="display: inline-block;">
                                    <img style="width: 20%;" src="{{ asset("banners/$banner->image_url") }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.banner.fields.link_url') }}
                        </th>
                        <td>
                            {{ $banner->link_url }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.banners.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
