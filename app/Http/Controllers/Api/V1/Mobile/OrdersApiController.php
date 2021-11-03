<?php

namespace App\Http\Controllers\Api\V1\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersApiController extends Controller
{
    public function getCustomerOrders(Request $request)
    {
        $user = LoginApiController::validateUser($request);

        // $params = $request->all();
        // $customerId = $params["customerId"];
        // if($customerId) {
        //     $customerOrders = Order::whereNull("deleted_at")->where("customer_id", $customerId);
        //     return $customerOrders;
        // }

    }
}
