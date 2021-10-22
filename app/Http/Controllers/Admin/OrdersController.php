<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrdersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->getValues($orders = Order::with(['products_id', 'customer_id', 'address_id', 'price'])->get());

        return view('admin.orders.index', compact('orders'));
    }

    public function getValues($collection) {
        foreach ($collection as $key => $value) {
            $value->products = Product::find($value->products_id);
            $value->customer = Customer::find($value->customer_id);
            $value->address = CustomerAddress::find($value->address_id);
            $value->price = Product::find($value->price_id);
        }
        return $collection;
    }

    public function create()
    {
        abort_if(Gate::denies('order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products_ids = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customer_ids = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $address_ids = CustomerAddress::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        $prices = Product::pluck('price', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.orders.create', compact('products_ids', 'customer_ids', 'address_ids', 'prices'));
    }

    public function store(StoreOrderRequest $request)
    {
        $request->merge(["price_id" => $request->products_id]);
        $order = Order::create($request->all());

        return redirect()->route('admin.orders.index');
    }

    public function edit(Order $order)
    {
        abort_if(Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products_ids = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customer_ids = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $address_ids = CustomerAddress::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        $prices = Product::pluck('price', 'id')->prepend(trans('global.pleaseSelect'), '');

        $this->getValues([$order->load('products_id', 'customer_id', 'address_id', 'price')]);

        return view('admin.orders.edit', compact('products_ids', 'customer_ids', 'address_ids', 'prices', 'order'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $request->merge(["price_id" => $request->products_id]);
        $order->update($request->all());

        return redirect()->route('admin.orders.index');
    }

    public function show(Order $order)
    {
        abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->getValues([$order->load('products_id', 'customer_id', 'address_id', 'price')]);

        return view('admin.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        abort_if(Gate::denies('order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderRequest $request)
    {
        Order::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
