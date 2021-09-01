<?php

namespace App\Http\Requests;

use App\Models\ReviewAttachment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReviewAttachmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('review_attachment_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'location' => [
                'string',
                'nullable',
            ],
        ];
    }
}
