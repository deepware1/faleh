<?php

namespace App\Api\Base\Traits;

use Illuminate\Http\Response;

trait HttpResponses
{
    protected function success($data , $message = null ,$code =  Response::HTTP_OK)
    {
        $response = [
            'status' => 'success',
            'message' => $message ,
            'data' => $data 
        ];
        return $response;
        return response()->json([
            $response
        ], $code);
    }

    protected function error($data , $message = null ,$code = Response::HTTP_BAD_REQUEST)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message ,
            'data' => $data 
        ], $code);
    }
    
    protected function successAdditional()
    {
        return [
            'status' => 'success',
            'message' => "" 
        ];
    }

    protected function errorAdditional()
    {
        return [
            'status' => 'error',
            'message' => "" 
        ];
    }

    
}