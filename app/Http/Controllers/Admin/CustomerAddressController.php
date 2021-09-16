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

        $customerAddresses = CustomerAddress::all();

        return view('admin.customerAddresses.index', compact('customerAddresses'));
    }

    public function create()
    {
        abort_if(Gate::denies('customer_address_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::select(DB::raw("id, CONCAT(name, ' ' ,surname) as name"))->get();

        return view('admin.customerAddresses.create', compact("customers"));
    }

    public function store(StoreCustomerAddressRequest $request)
    {
        $customerAddress = CustomerAddress::create($request->all());

        return redirect()->route('admin.customer-addresses.index');
    }

    public function edit(CustomerAddress $customerAddress)
    {
        abort_if(Gate::denies('customer_address_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerAddresses.edit', compact('customerAddress'));
    }

    public function update(UpdateCustomerAddressRequest $request, CustomerAddress $customerAddress)
    {
        $customerAddress->update($request->all());

        return redirect()->route('admin.customer-addresses.index');
    }

    public function show(CustomerAddress $customerAddress)
    {
        abort_if(Gate::denies('customer_address_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerAddresses.show', compact('customerAddress'));
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
