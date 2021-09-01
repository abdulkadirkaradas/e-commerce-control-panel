<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCustomerOrderRequest;
use App\Http\Requests\StoreCustomerOrderRequest;
use App\Http\Requests\UpdateCustomerOrderRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerOrdersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerOrders.index');
    }

    public function create()
    {
        abort_if(Gate::denies('customer_order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerOrders.create');
    }

    public function store(StoreCustomerOrderRequest $request)
    {
        $customerOrder = CustomerOrder::create($request->all());

        return redirect()->route('admin.customer-orders.index');
    }

    public function edit(CustomerOrder $customerOrder)
    {
        abort_if(Gate::denies('customer_order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerOrders.edit', compact('customerOrder'));
    }

    public function update(UpdateCustomerOrderRequest $request, CustomerOrder $customerOrder)
    {
        $customerOrder->update($request->all());

        return redirect()->route('admin.customer-orders.index');
    }

    public function show(CustomerOrder $customerOrder)
    {
        abort_if(Gate::denies('customer_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerOrders.show', compact('customerOrder'));
    }

    public function destroy(CustomerOrder $customerOrder)
    {
        abort_if(Gate::denies('customer_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerOrder->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustomerOrderRequest $request)
    {
        CustomerOrder::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
