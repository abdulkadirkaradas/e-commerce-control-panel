<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCustomerAddressRequest;
use App\Http\Requests\StoreCustomerAddressRequest;
use App\Http\Requests\UpdateCustomerAddressRequest;
use App\Models\Customer;
use App\Models\CustomerAddress;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;

class CustomerAddressController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_address_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerAddress = CustomerAddress::all();

        return view('admin.customerAddress.index', compact('customerAddress'));
    }

    public function create()
    {
        abort_if(Gate::denies('customer_address_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::select(DB::raw("id, CONCAT(name, ' ' ,surname) as name"))->get();
        $customerAddress = CustomerAddress::all();

        return view('admin.customerAddress.create', compact("customerAddress","customers"));
    }

    public function store(StoreCustomerAddressRequest $request)
    {
        $customerAddress = CustomerAddress::create($request->all());

        return redirect()->route('admin.customer-address.index');
    }

    public function edit(CustomerAddress $customerAddress)
    {
        abort_if(Gate::denies('customer_address_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::all();
        $customerAddress = CustomerAddress::all();
        $is_empty = $customers->isEmpty() ? false : true;

        return view('admin.customerAddress.edit', compact('customerAddress', 'customers', 'is_empty'));
    }

    public function update(UpdateCustomerAddressRequest $request, CustomerAddress $customerAddress)
    {
        $customerAddress->update($request->all());

        return redirect()->route('admin.customer-address.index');
    }

    public function show(CustomerAddress $customerAddress)
    {
        abort_if(Gate::denies('customer_address_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerAddress.show', compact('customerAddress'));
    }

    public function destroy(CustomerAddress $customerAddress)
    {
        abort_if(Gate::denies('customer_address_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerAddress->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustomerAddressRequest $request)
    {
        CustomerAddress::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
