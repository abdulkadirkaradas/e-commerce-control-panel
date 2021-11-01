<?php

namespace App\Http\Controllers\Api\V1\Mobile;

use App\ApiStatusCodes;
use App\Http\Controllers\Admin\CustomersController;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\CustomerAddress;
use Illuminate\Http\Request;

class CustomerApiController extends Controller
{
    public function newCustomer(Request $request)
    {
        // $user = LoginApiController::validateUser($request);
        $params = $request->all();
        $email = $params["email"];
        $password = $params["password"];

        if(isset($email) && isset($password))
        {
            $customerUser = new Customer();
            $customerUser->name = $params["name"] ?? "";
            $customerUser->surname = $params["surname"] ?? "";
            $customerUser->date_of_birth = $params["date_of_birth"] ?? "";
            $customerUser->phone = $params["phone"] ?? "";
            $customerUser->email = $params["email"] ?? "";
            $customerUser->password = $params["password"] ?? "";
            $customerUser->save();

            return [
                "status" => ApiStatusCodes::$customerCreated,
                "message" => "User was created.",
            ];
        }

        return [
            "status" => ApiStatusCodes::$customerNotCreated,
            "message" => "User was not created. Check your fields.",
        ];
    }

    public function createCustomerAddress(Request $request)
    {
        $user = LoginApiController::validateUser($request);

        $params = $request->all();
        if($params) {
            $address = new CustomerAddress();
            $address->customer_id = $user->id;
            $address->province_id = $params["province_id"];
            $address->district_id = $params["district_id"];
            $address->quarter_id = $params["quarter_id"];
            $address->street_id = $params["street_id"];
            $address->address = $params["address"];
            $address->save();

            return [
                "status" => ApiStatusCodes::$success,
                "message" => "Address was added.",
            ];
        }

        return [
            "status" => ApiStatusCodes::$failed,
            "message" => "Address was not added. Check your fields.",
        ];
    }
}
