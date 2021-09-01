<?php

namespace App\Http\Requests;

use App\Models\VideoType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreVideoTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('video_type_create');
    }

    public function rules()
    {
        return [
            'video_type' => [
                'string',
                'nullable',
            ],
        ];
    }
}
