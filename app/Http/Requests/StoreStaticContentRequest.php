<?php

namespace App\Http\Requests;

use App\Models\StaticContent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStaticContentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('static_content_create');
    }

    public function rules()
    {
        return [
            'key' => [
                'string',
                'nullable',
            ],
            'title' => [
                'string',
                'nullable',
            ],
        ];
    }
}
