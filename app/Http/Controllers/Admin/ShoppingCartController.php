<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyShoppingCartRequest;
use App\Http\Requests\StoreShoppingCartRequest;
use App\Http\Requests\UpdateShoppingCartRequest;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class ShoppingCartController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shopping_cart_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shoppingCarts = ShoppingCart::with(['customer_uuid', 'product_uuid'])->get();

        return view('admin.shoppingCarts.index', compact('shoppingCarts'));
    }

    public function create()
    {
        abort_if(Gate::denies('shopping_cart_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer_uuids = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product_uuids = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.shoppingCarts.create', compact('customer_uuids', 'product_uuids'));
    }

    public function store(StoreShoppingCartRequest $request)
    {
        $uuid = Str::uuid();
        $request->request->add(['id' => $uuid]);
        $shoppingCart = ShoppingCart::create($request->all());

        return redirect()->route('admin.shopping-carts.index');
    }

    public function edit(ShoppingCart $shoppingCart)
    {
        abort_if(Gate::denies('shopping_cart_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer_uuids = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product_uuids = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shoppingCart->load('customer_uuid', 'product_uuid');

        return view('admin.shoppingCarts.edit', compact('customer_uuids', 'product_uuids', 'shoppingCart'));
    }

    public function update(UpdateShoppingCartRequest $request, ShoppingCart $shoppingCart)
    {
        $shoppingCart->update($request->all());

        return redirect()->route('admin.shopping-carts.index');
    }

    public function show(ShoppingCart $shoppingCart)
    {
        abort_if(Gate::denies('shopping_cart_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shoppingCart->load('customer_uuid', 'product_uuid');

        return view('admin.shoppingCarts.show', compact('shoppingCart'));
    }

    public function destroy(ShoppingCart $shoppingCart)
    {
        abort_if(Gate::denies('shopping_cart_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shoppingCart->delete();

        return back();
    }

    public function massDestroy(MassDestroyShoppingCartRequest $request)
    {
        ShoppingCart::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
