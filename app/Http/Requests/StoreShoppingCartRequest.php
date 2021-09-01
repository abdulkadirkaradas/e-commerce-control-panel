<?php

namespace App\Http\Requests;

use App\Models\ShoppingCart;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreShoppingCartRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('shopping_cart_create');
    }

    public function rules()
    {
        return [];
    }
}
