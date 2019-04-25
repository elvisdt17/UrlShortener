<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait Rest
{
    /**
     * Return a new JSON response from the application with successful parameters and payload if provided.
     *
     * @param  string  $message
     * @param  null|array  $data
     * @param  int  $status
     * @param  array  $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public function success(String $message = 'success', $data = null, int $status = 200, array $headers = []) : JsonResponse
    {
        return response()->json([
            'success' => true,
            'msg' => $message,
            'payload' => $data
        ], $status, $headers);
    }


    /**
     * Return a new JSON response from the application with unsuccessful parameters
     * and register an exception if provided.
     * 
     * @param  string|array  $message
     * @param  mixed|null  $exception
     * @param  int  $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function error($message, $exception = null, int $status = 500) : JsonResponse
    {
        if($exception)
            \Log::error($exception);
        
        return response()->json([
            'success' => false,
            'msg' => $message
        ], $status);
    }

}
