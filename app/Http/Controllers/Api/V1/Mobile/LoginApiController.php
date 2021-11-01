<?php

namespace App\Http\Controllers\Api\V1\Mobile;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DataHolders\CustomerCredentials;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Session;
use App\Models\User;
use Carbon\Carbon;

class LoginApiController extends Controller
{
    public function login(Request $request)
    {
        // dd($request->request);

        $credentials = $request->only("email", "password");
        $customerUser = Customer::attempt($credentials);
        if($customerUser != null)
        {
            $datetime = Carbon::now("Europe/Istanbul");
            $user = $customerUser;
            Session::where("user_id", $user->id)->where("user_name", $user->name)->delete();
            $session = new Session();
            $session->user_id = $user->id;
            $session->user_name = $user->name . " " . $user->surname;
            $session->ip_address = $request->ip();
            $session->access_time = $datetime;
            $session->save();

            return [
                "status" => "0_SUCCESS",
                "status" => $this->getRequiredUserInfo($session, $user),
            ];
        } else {
            return [
                "status" => "1_FAILED",
                "data" => "Hatalı kullanıcı Adı veya Parola"
            ];
        }
    }

    public static function validateUser(Request $request)
    {
        $token = $request->headers->get("Token") ?? "";
        $user = Customer::select("customers.*")
                ->leftJoin("sessions", "sessions.user_id", "=", "customers.id")
                ->where("sessions.id", $token)
                ->first();

        if(!$user) {
            abort("403");
        }
        return $user;
    }

    private function getRequiredUserInfo($session, $user)
    {
        return [
            "name" => $user->name . " " . $user->surname,
            "email" => $user->email,
            "token" => $session->id,
            "type" => $user->roles ? $user->roles->first()->id : 0
        ];
    }
}
