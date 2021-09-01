<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyStaticContentRequest;
use App\Http\Requests\StoreStaticContentRequest;
use App\Http\Requests\UpdateStaticContentRequest;
use App\Models\StaticContent;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class StaticContentsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('static_content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staticContents = StaticContent::all();

        return view('admin.staticContents.index', compact('staticContents'));
    }

    public function create()
    {
        abort_if(Gate::denies('static_content_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staticContents.create');
    }

    public function store(StoreStaticContentRequest $request)
    {
        $staticContent = StaticContent::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $staticContent->id]);
        }

        return redirect()->route('admin.static-contents.index');
    }

    public function edit(StaticContent $staticContent)
    {
        abort_if(Gate::denies('static_content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staticContents.edit', compact('staticContent'));
    }

    public function update(UpdateStaticContentRequest $request, StaticContent $staticContent)
    {
        $staticContent->update($request->all());

        return redirect()->route('admin.static-contents.index');
    }

    public function show(StaticContent $staticContent)
    {
        abort_if(Gate::denies('static_content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staticContents.show', compact('staticContent'));
    }

    public function destroy(StaticContent $staticContent)
    {
        abort_if(Gate::denies('static_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $staticContent->delete();

        return back();
    }

    public function massDestroy(MassDestroyStaticContentRequest $request)
    {
        StaticContent::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('static_content_create') && Gate::denies('static_content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new StaticContent();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
