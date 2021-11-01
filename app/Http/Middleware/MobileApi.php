<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MobileApi
{
    public function handle(Request $request, Closure $next)
    {
        $httpHeaders = getallheaders();

        if(!array_key_exists('App-Key', $httpHeaders)){
            $data =  [
                'status' => 403,
                'data' => 'Unauthorized action.'
            ];
            return response()->json($data);
        } else {
            $appKey = $httpHeaders['App-Key'];
            if($appKey !=  env('APP_KEY')) {
                $data =  [
                    'status' => 403,
                    'data' => 'Unauthorized action.'
                ];
                return response()->json($data);
            }
        }

        $response = $next($request);
		$response->headers->set('App-Key', $httpHeaders['App-Key'] ?? "");
        $response->headers->set('Token', $httpHeaders['Token'] ?? "");

        header("Content-Type: application/json; charset=UTF-8");

        return $response;
    }
}
