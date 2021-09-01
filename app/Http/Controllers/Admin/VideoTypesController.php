<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVideoTypeRequest;
use App\Http\Requests\StoreVideoTypeRequest;
use App\Http\Requests\UpdateVideoTypeRequest;
use App\Models\VideoType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VideoTypesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('video_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $videoTypes = VideoType::all();

        return view('admin.videoTypes.index', compact('videoTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('video_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.videoTypes.create');
    }

    public function store(StoreVideoTypeRequest $request)
    {
        $videoType = VideoType::create($request->all());

        return redirect()->route('admin.video-types.index');
    }

    public function edit(VideoType $videoType)
    {
        abort_if(Gate::denies('video_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.videoTypes.edit', compact('videoType'));
    }

    public function update(UpdateVideoTypeRequest $request, VideoType $videoType)
    {
        $videoType->update($request->all());

        return redirect()->route('admin.video-types.index');
    }

    public function show(VideoType $videoType)
    {
        abort_if(Gate::denies('video_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.videoTypes.show', compact('videoType'));
    }

    public function destroy(VideoType $videoType)
    {
        abort_if(Gate::denies('video_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $videoType->delete();

        return back();
    }

    public function massDestroy(MassDestroyVideoTypeRequest $request)
    {
        VideoType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
