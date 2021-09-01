<?php

namespace App\Http\Requests;

use App\Models\Favorite;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCustomerFavoriteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('favorite_create');
    }

    public function rules()
    {
        return [];
    }
}
