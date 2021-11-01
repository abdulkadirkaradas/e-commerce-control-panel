<?php

namespace App\Http\Controllers\DataHolders;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerCredentials extends Controller
{
    public static function put($args) {
        $key = $args["key"];
        $value = $args["value"];

        session([$key => $value]);

        return session($key);
    }

    public static function user() {
        return session("customerUser");
    }
}
