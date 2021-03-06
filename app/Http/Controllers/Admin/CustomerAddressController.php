<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCustomerAddressRequest;
use App\Http\Requests\StoreCustomerAddressRequest;
use App\Http\Requests\UpdateCustomerAddressRequest;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\Districts;
use App\Models\Provinces;
use App\Models\Quarters;
use App\Models\Streets;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerAddressController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_address_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerAddress = $this->getAddress(CustomerAddress::all());

        return view("admin.customerAddress.index", compact("customerAddress"));
    }

    private function getAddress($collection) {
        foreach ($collection as $key => $value) {
            $value->province = Provinces::find($value->province_id);
            $value->district = Districts::find($value->district_id);
            $value->quarter = Quarters::find($value->quarter_id);
            $value->street = Streets::find($value->street_id);
        }
        return $collection;
    }

    public function create()
    {
        abort_if(Gate::denies('customer_address_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::select(DB::raw("id, CONCAT(name, ' ' ,surname) as name"))->get();
        $provinces = Provinces::all();
        $districts = $this->changeColumnName(Districts::all(), "province_id");
        $quarters = $this->changeColumnName(Quarters::all(), "district_id");
        $streets = $this->changeColumnName(Streets::all(), "quarter_id");

        return view("admin.customerAddress.create", compact("customers", "provinces", "districts", "quarters", "streets"));
    }

    private function changeColumnName($collection, $column) {
        foreach ($collection as $key => $value) {
            $value->_id = $value->$column;
        }
        return $collection;
    }

    public function store(StoreCustomerAddressRequest $request)
    {
        $customerAddress = CustomerAddress::create($request->all());

        return redirect()->route('admin.customer-address.index');
    }

    public function edit(CustomerAddress $customerAddress)
    {
        abort_if(Gate::denies('customer_address_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = Customer::select(DB::raw("id, CONCAT(name, ' ' ,surname) as name"))->get();
        $provinces = Provinces::all();
        $districts = $this->changeColumnName(Districts::all(), "province_id");
        $quarters = $this->changeColumnName(Quarters::all(), "district_id");
        $streets = $this->changeColumnName(Streets::all(), "quarter_id");
        // dd($customerAddress);

        return view('admin.customerAddress.edit', compact("customerAddress", "customers", "provinces", "districts", "quarters", "streets"));
    }

    public function update(UpdateCustomerAddressRequest $request, CustomerAddress $customerAddress)
    {
        $customerAddress->update($request->all());

        return redirect()->route('admin.customer-address.index');
    }

    public function show(CustomerAddress $customerAddress)
    {
        abort_if(Gate::denies('customer_address_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->getAddress([$customerAddress]);

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
