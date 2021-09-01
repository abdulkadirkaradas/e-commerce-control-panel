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

        $orders = Order::with(['products_uuid', 'customer_uuid', 'address_uuid', 'price'])->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {
        abort_if(Gate::denies('order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products_uuids = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customer_uuids = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $address_uuids = CustomerAddress::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        $prices = Product::pluck('price', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.orders.create', compact('products_uuids', 'customer_uuids', 'address_uuids', 'prices'));
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->all());

        return redirect()->route('admin.orders.index');
    }

    public function edit(Order $order)
    {
        abort_if(Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products_uuids = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customer_uuids = Customer::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $address_uuids = CustomerAddress::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        $prices = Product::pluck('price', 'id')->prepend(trans('global.pleaseSelect'), '');

        $order->load('products_uuid', 'customer_uuid', 'address_uuid', 'price');

        return view('admin.orders.edit', compact('products_uuids', 'customer_uuids', 'address_uuids', 'prices', 'order'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());

        return redirect()->route('admin.orders.index');
    }

    public function show(Order $order)
    {
        abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->load('products_uuid', 'customer_uuid', 'address_uuid', 'price');

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
