<?php

namespace App\Helpers;

class ResponseHelper
{
    public static function formatResponse($ack, $message, $data = [], $status = 200)
    {
        return response()->json([
            'ack' => $ack,
            'message' => $message,
            'Data' => empty($data) ? (object)[] : $data
        ], $status);
    }

}


?>