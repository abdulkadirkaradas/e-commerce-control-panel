<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVideoRequest;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Video;
use App\Models\VideoType;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class VideosController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('video_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $videos = Video::all();

        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        abort_if(Gate::denies('video_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = VideoType::pluck('video_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.videos.create', compact('types'));
    }

    public function store(StoreVideoRequest $request)
    {
        // dd($request->file("video"));

        $file = $request->file("video");
        $fileId = Str::uuid();
        $fileName = $file->getClientOriginalName();
        $fileExtension = $file->getClientOriginalExtension();

        $video = new Video;
        $video->description = $request->description;
        $video->type_id = $request->type_id;
        $video->video_url_id = $request->video_url_id;
        $video->video_id = $fileId;
        $video->video_name = $fileName;
        $video->video_extension = $fileExtension;
        $video->video_url = env("APP_URL") . "/" . "videos" . "/" . $fileId . "." . $fileExtension;
        // $video->image_url = $fileId . "." . $fileExtension;
        $video->save();

        if(!file_exists(public_path("videos"))) {
            mkdir(public_path('videos'), 0777, true);
        }

        $file->move(public_path("videos"), $fileId.'.'.$fileExtension);

        return redirect()->route('admin.videos.index');
    }

    public function edit(Video $video)
    {
        abort_if(Gate::denies('video_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $types = VideoType::pluck('video_type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $video->load('type');

        return view('admin.videos.edit', compact('types', 'video'));
    }

    public function update(UpdateVideoRequest $request, Video $video)
    {
        $video->update($request->all());

        if ($request->input('file', false)) {
            if (!$video->file || $request->input('file') !== $video->file->file_name) {
                if ($video->file) {
                    $video->file->delete();
                }
                $video->addMedia(storage_path('tmp/uploads/' . basename($request->input('file'))))->toMediaCollection('file');
            }
        } elseif ($video->file) {
            $video->file->delete();
        }

        return redirect()->route('admin.videos.index');
    }

    public function show(Video $video)
    {
        abort_if(Gate::denies('video_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $video->load('type');

        return view('admin.videos.show', compact('video'));
    }

    public function destroy(Video $video)
    {
        abort_if(Gate::denies('video_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $video->delete();

        return back();
    }

    public function massDestroy(MassDestroyVideoRequest $request)
    {
        Video::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('video_create') && Gate::denies('video_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Video();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
