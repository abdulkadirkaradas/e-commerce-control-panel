<?php

namespace App\Http\Controllers\Api\V1\Mobile;

use App\ApiStatusCodes;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function checkIfExistEmail(Request $request)
    {
        $params = $request->only("email");
        $email = $params["email"];

        $user = Customer::whereNull("deleted_at")->where("email", $email)->first();
        if(!$user) {
            return [
                "status" => ApiStatusCodes::$emailAvailable,
                "message" => "Email available",
            ];
        }

        return [
            "status" => ApiStatusCodes::$emailIsNotAvailable,
            "message" => "Email is not available",
        ];
    }

    public function changePassword(Request $request)
    {
        $user = LoginApiController::validateUser($request);

        $params = $request->all();
        $oldPassword = $params["oldPassword"];
        $newPassword = $params["newPassword"];
        $confirmPassword = $params["confirmPassword"];
        if($user)
        {
            $usr = Customer::whereNull("deleted_at")->where("email", $user->email)->where("password", $oldPassword)->get();
            if($usr->isNotEmpty()) {
                if($oldPassword && $newPassword && $confirmPassword)
                {
                    if($newPassword == $confirmPassword) {
                        $customer = Customer::whereNull("deleted_at")->find($user->id);
                        $customer->password = $newPassword;
                        $customer->save();

                        return [
                            "status" => ApiStatusCodes::$passwordChanged,
                            "message" => "Password was changed.",
                        ];
                    }

                    return [
                        "status" => ApiStatusCodes::$passwordNotChanged,
                        "message" => "New password and Confirm password not be matched. Please check your fields.",
                    ];
                }

                return [
                    "status" => ApiStatusCodes::$passwordNotChanged,
                    "message" => "Password, New password and Confirm password fields not correct. Please check your fields.",
                ];
            }

            return [
                "status" => ApiStatusCodes::$passwordNotChanged,
                "message" => "Old password field could not be empty. Please check your fields.",
            ];
        }
        return [
            "status" => ApiStatusCodes::$failed,
            "message" => "User not matched. Please check your fields.",
        ];
    }
}
