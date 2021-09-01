<?php

namespace App\Http\Requests;

use App\Models\StaticContent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStaticContentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('static_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:static_contents,id',
        ];
    }
}
