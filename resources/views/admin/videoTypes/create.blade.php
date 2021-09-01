@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.videoType.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.video-types.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="video_type">{{ trans('cruds.videoType.fields.video_type') }}</label>
                <input class="form-control {{ $errors->has('video_type') ? 'is-invalid' : '' }}" type="text" name="video_type" id="video_type" value="{{ old('video_type', '') }}">
                @if($errors->has('video_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('video_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.videoType.fields.video_type_helper') }}</span>
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
