@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.banner.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.banners.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="key">{{ trans('cruds.banner.fields.key') }}</label>
                <input class="form-control {{ $errors->has('key') ? 'is-invalid' : '' }}" type="text" name="key" id="key" value="{{ old('key', '') }}">
                @if($errors->has('key'))
                    <div class="invalid-feedback">
                        {{ $errors->first('key') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.banner.fields.key_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="banner">{{ trans('cruds.banner.fields.banner') }}</label>
                {{-- <div class="needsclick dropzone {{ $errors->has('banner') ? 'is-invalid' : '' }}" id="banner-dropzone"></div> --}}
                <input class="needsclick dropzone" type="file" name="banner" id="file-uploader">
                @if($errors->has('banner'))
                    <div class="invalid-feedback">
                        {{ $errors->first('banner') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.banner.fields.banner_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="link_url">{{ trans('cruds.banner.fields.link_url') }}</label>
                <input class="form-control {{ $errors->has('link_url') ? 'is-invalid' : '' }}" type="text" name="link_url" id="link_url" value="{{ old('link_url', '') }}">
                @if($errors->has('link_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.banner.fields.link_url_helper') }}</span>
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

@section('scripts')
@parent

<script>

</script>

@endsection
