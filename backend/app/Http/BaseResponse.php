<?php

namespace App\Http;

class BaseResponse
{
    public static function success (array|object $data = null, int $statusCode = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => 'Success',
            'data' => $data,
        ], $statusCode);
    }

    public static function fail (string $message, array $data = null, int $statusCode = 400)
    {
        return response()->json([
            'status' => 'fail',
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    public static function error (string $message, int $statusCode = 500)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => null,
        ], $statusCode);
    }
}
