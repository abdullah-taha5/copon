<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Log;

trait ResponseHelper
{
    public function responseHelper($code, $status, $message = '', $data = [], $class = '')
    {
        $status ?? Log::critical($message.' In Class '.$class);

        return [
            'code' => $code,
            'success' => $status,
            'message' => $message,
            'data' => $data,
        ];
    }
}
