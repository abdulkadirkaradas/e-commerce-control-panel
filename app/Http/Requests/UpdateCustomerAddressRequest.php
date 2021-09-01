<?php

namespace App\Http\Requests;

use App\Models\CustomerAddress;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCustomerAddressRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_address_edit');
    }

    public function rules()
    {
        return [
            'customer_uuid' => [
                'string',
                'nullable',
            ],
        ];
    }
}
