<?php

namespace App\Http\Requests;

use App\Models\ShoppingCart;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyShoppingCartRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('shopping_cart_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:shopping_carts,id',
        ];
    }
}
