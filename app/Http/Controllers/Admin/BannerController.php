<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBannerRequest;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('banner_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $banners = Banner::all();
        // dd($banners);

        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        abort_if(Gate::denies('banner_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.banners.create');
    }

    public function store(StoreBannerRequest $request)
    {
        // dd($request->file("banner")->path());

        $file = $request->file("banner");
        $fileId = Str::uuid();
        if($file != null) {
            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
        }

        $banner = new Banner;
        $banner->key = $request->key;
        $banner->link_url = $request->link_url;
        if($file != null) {
            $banner->file_id = $fileId;
            $banner->file_name = $fileName;
            $banner->file_extension = $fileExtension;
            $banner->file_url = env("APP_URL") . "/" . "site_banners" . "/" . $fileId . "." . $fileExtension;
            $banner->image_url = $fileId . "." . $fileExtension;
        }
        $banner->save();

        // $banner = Banner::create($request->all());

        if(!file_exists(public_path("site_banners"))) {
            mkdir(public_path('site_banners'), 0777, true);
        }

        $file->move(public_path("site_banners"), $fileId.'.'.$fileExtension);

        return redirect()->route('admin.banners.index');
    }

    public function edit(Banner $banner)
    {
        abort_if(Gate::denies('banner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.banners.edit', compact('banner'));
    }

    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        $file = $request->file("banner");
        $fileId = Str::uuid();
        if($file != null) {
            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
        }

        $banner = Banner::find($banner->id);
        $banner->key = $request->key;
        $banner->link_url = $request->link_url;
        if($file != null) {
            $banner->file_id = $fileId;
            $banner->file_name = $fileName;
            $banner->file_extension = $fileExtension;
            $banner->file_url = env("APP_URL") . "/" . "site_banners" . "/" . $fileId . "." . $fileExtension;
            $banner->image_url = $fileId . "." . $fileExtension;
        }
        $banner->save();

        // $banner = Banner::create($request->all());

        if(!file_exists(public_path("site_banners"))) {
            mkdir(public_path('site_banners'), 0777, true);
        }

        $file->move(public_path("site_banners"), $fileId.'.'.$fileExtension);

        return redirect()->route('admin.banners.index');
    }

    public function show(Banner $banner)
    {
        abort_if(Gate::denies('banner_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.banners.show', compact('banner'));
    }

    public function destroy(Banner $banner)
    {
        abort_if(Gate::denies('banner_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $banner->delete();

        return back();
    }

    public function massDestroy(MassDestroyBannerRequest $request)
    {
        Banner::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('banner_create') && Gate::denies('banner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Banner();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
