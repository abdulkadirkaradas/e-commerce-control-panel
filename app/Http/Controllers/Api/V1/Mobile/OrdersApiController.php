<?php

namespace App\Http\Controllers\Api\V1\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\Districts;
use App\Models\Order;
use App\Models\Product;
use App\Models\Provinces;
use App\Models\Quarters;
use App\Models\Streets;
use Illuminate\Http\Request;

class OrdersApiController extends Controller
{
    public function getCustomerOrders(Request $request)
    {
        $user = LoginApiController::validateUser($request);

        if($user) {
            $customerOrders = Order::whereNull("deleted_at")->where("customer_id", $user->id)->get();
            foreach ($customerOrders as $key => $customer) {
                $customer->product = Product::find($customer->products_id);
                $customer->customer = Customer::find($customer->customer_id);
                $customerAddress = [CustomerAddress::find($customer->address_id)];
                foreach ($customerAddress as $key => $address) {
                    $customer->convertedAddress = [
                        "province" => Provinces::find($address->province_id),
                        "district" => Districts::find($address->district_id),
                        "quarter" => Quarters::find($address->quarter_id),
                        "street" => Streets::find($address->street_id),
                    ];
                }
            }
            return $customerOrders;
        }
    }
}
