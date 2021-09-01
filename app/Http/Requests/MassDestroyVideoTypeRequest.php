<?php

namespace App\Http\Requests;

use App\Models\VideoType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyVideoTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('video_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:video_types,id',
        ];
    }
}
