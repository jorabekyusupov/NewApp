<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected object $service;
    protected int $perPage = 10;
    protected function responseWithData( $message, $data, $status = 200)
    {
        return response()->json([
            'status' => $message,
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
