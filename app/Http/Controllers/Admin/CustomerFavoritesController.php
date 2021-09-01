<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCustomerFavoriteRequest;
use App\Http\Requests\StoreCustomerFavoriteRequest;
use App\Http\Requests\UpdateCustomerFavoriteRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class CustomerFavoritesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_favorite_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerFavorites.index');
    }
}
