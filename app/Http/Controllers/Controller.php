<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function responseWithData($data, $status = 200)
    {
        return response()->json([
            'status' => 'success',
            'data' => $data
        ], $status);

    }

    public function responseWithMessage($success, $message, $code = 200)
    {
        return response()->json([
            'status' => $success ? 'success' : 'unsuccessful',
            'message' => $message,

        ], $code);
    }
}
