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

class ShoppingCartController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('shopping_cart_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->getValues($shoppingCarts = ShoppingCart::with(['customer_id', 'product_id'])->get());

        return view('admin.shoppingCarts.index', compact('shoppingCarts'));
    }

    public function getValues($collection) {
        foreach ($collection as $key => $value) {
            $value->product = Product::find($value->product_id);
            $value->customer = Customer::find($value->customer_id);
        }
        return $collection;
    }

    public function create()
    {
        abort_if(Gate::denies('shopping_cart_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer_ids = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product_ids = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.shoppingCarts.create', compact('customer_ids', 'product_ids'));
    }

    public function store(StoreShoppingCartRequest $request)
    {
        $shoppingCart = ShoppingCart::create($request->all());

        return redirect()->route('admin.shopping-carts.index');
    }

    public function edit(ShoppingCart $shoppingCart)
    {
        abort_if(Gate::denies('shopping_cart_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer_ids = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product_ids = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $this->getValues([$shoppingCart->load('customer_id', 'product_id')]);

        return view('admin.shoppingCarts.edit', compact('customer_ids', 'product_ids', 'shoppingCart'));
    }

    public function update(UpdateShoppingCartRequest $request, ShoppingCart $shoppingCart)
    {
        $shoppingCart->update($request->all());

        return redirect()->route('admin.shopping-carts.index');
    }

    public function show(ShoppingCart $shoppingCart)
    {
        abort_if(Gate::denies('shopping_cart_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->getValues([$shoppingCart->load('customer_id', 'product_id')]);

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
