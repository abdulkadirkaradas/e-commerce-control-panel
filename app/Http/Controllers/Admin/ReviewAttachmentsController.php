<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyReviewAttachmentRequest;
use App\Http\Requests\StoreReviewAttachmentRequest;
use App\Http\Requests\UpdateReviewAttachmentRequest;
use App\Models\ReviewAttachment;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class ReviewAttachmentsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('review_attachment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reviewAttachments = ReviewAttachment::all();

        return view('admin.reviewAttachments.index', compact('reviewAttachments'));
    }

    public function create()
    {
        abort_if(Gate::denies('review_attachment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reviewAttachments.create');
    }

    public function store(StoreReviewAttachmentRequest $request)
    {
        $file = $request->file("attachment");
        $fileId = Str::uuid();
        if($file != null) {
            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
        }

        $attachment = new ReviewAttachment();
        $attachment->name = $request->name;
        $attachment->location = $request->location;
        if($file != null) {
            $attachment->file_id = $fileId;
            $attachment->file_name = $fileName;
            $attachment->file_extension = $fileExtension;
            $attachment->file_url = env("APP_URL") . "/" . "review_attachments" . "/" . $fileId . "." . $fileExtension;
            $attachment->image_url = $fileId . "." . $fileExtension;
        }
        $attachment->save();

        if(!file_exists(public_path("review_attachments"))) {
            mkdir(public_path("review_attachments"), 0777, true);
        }

        $file->move(public_path("review_attachments"), $fileId.'.'.$fileExtension);

        return redirect()->route('admin.review-attachments.index');
    }

    public function edit(ReviewAttachment $reviewAttachment)
    {
        abort_if(Gate::denies('review_attachment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reviewAttachments.edit', compact('reviewAttachment'));
    }

    public function update(UpdateReviewAttachmentRequest $request, ReviewAttachment $reviewAttachment)
    {
        // dd($request->request);
        $file = $request->file("attachment");
        $fileId = Str::uuid();
        if($file != null) {
            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->getClientOriginalExtension();
        }

        $attachment = ReviewAttachment::find($reviewAttachment->id);
        $attachment->name = $request->name;
        $attachment->location = $request->location;
        if($file != null) {
            $attachment->file_id = $fileId;
            $attachment->file_name = $fileName;
            $attachment->file_extension = $fileExtension;
            $attachment->file_url = env("APP_URL") . "/" . "review_attachments" . "/" . $fileId . "." . $fileExtension;
            $attachment->image_url = $fileId . "." . $fileExtension;
        }
        $attachment->save();

        if(!file_exists(public_path("review_attachments"))) {
            mkdir(public_path("review_attachments"), 0777, true);
        }

        $file->move(public_path("review_attachments"), $fileId.'.'.$fileExtension);

        return redirect()->route('admin.review-attachments.index');
    }

    public function show(ReviewAttachment $reviewAttachment)
    {
        abort_if(Gate::denies('review_attachment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reviewAttachments.show', compact('reviewAttachment'));
    }

    public function destroy(ReviewAttachment $reviewAttachment)
    {
        abort_if(Gate::denies('review_attachment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reviewAttachment->delete();

        return back();
    }

    public function massDestroy(MassDestroyReviewAttachmentRequest $request)
    {
        ReviewAttachment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('review_attachment_create') && Gate::denies('review_attachment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ReviewAttachment();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
