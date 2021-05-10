<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function successResponse($message = '', $data = null){
        return response()->json([
            'success'  => 1,
            'message' => $message,
            'data' => $data,
        ], 200);
    }

    public function failedResponse($message = '', $data = null){
        return response()->json([
            'success'  => 0,
            'message' => $message,
            'data' => $data,
        ], 200);
    }
}
