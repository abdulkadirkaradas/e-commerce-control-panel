<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCustomerFavoriteRequest;
use App\Http\Requests\StoreCustomerFavoriteRequest;
use App\Http\Requests\UpdateCustomerFavoriteRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerFavoritesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_favorite_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerFavorites.index');
    }

    public function create()
    {
        abort_if(Gate::denies('customer_favorite_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerFavorites.create');
    }

    public function store(StoreCustomerFavoriteRequest $request)
    {
        $customerFavorite = CustomerFavorite::create($request->all());

        return redirect()->route('admin.customer-favorites.index');
    }

    public function edit(CustomerFavorite $customerFavorite)
    {
        abort_if(Gate::denies('customer_favorite_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerFavorites.edit', compact('customerFavorite'));
    }

    public function update(UpdateCustomerFavoriteRequest $request, CustomerFavorite $customerFavorite)
    {
        $customerFavorite->update($request->all());

        return redirect()->route('admin.customer-favorites.index');
    }

    public function show(CustomerFavorite $customerFavorite)
    {
        abort_if(Gate::denies('customer_favorite_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerFavorites.show', compact('customerFavorite'));
    }

    public function destroy(CustomerFavorite $customerFavorite)
    {
        abort_if(Gate::denies('customer_favorite_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerFavorite->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustomerFavoriteRequest $request)
    {
        CustomerFavorite::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
