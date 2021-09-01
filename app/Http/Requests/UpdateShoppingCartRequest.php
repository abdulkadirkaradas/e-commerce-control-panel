<?php

namespace App\Http\Requests;

use App\Models\ShoppingCart;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateShoppingCartRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shopping_cart_edit');
    }

    public function rules()
    {
        return [];
    }
}
