<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCustomerOrderRequest;
use App\Http\Requests\StoreCustomerOrderRequest;
use App\Http\Requests\UpdateCustomerOrderRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class CustomerOrdersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.customerOrders.index');
    }
}
