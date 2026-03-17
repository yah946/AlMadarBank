<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class BaseApiConroller extends Controller
{
    public function sendResponse($result = null,$message='success',$code=200):JsonResponse {
        $response = [
            'success' => true,
            'message' => $message,
        ];
        if($result !== null){
            $response['data'] = $result;
        }
        return response()->json($response,$code);
    }
    public function sendError($error = null,$errorMessage = [],$code = 404){
        $response = [
            'success' => false,
            'error' => $error,
        ];
        if(!isEmpty($errorMessage)){
            $response['errors'] = $errorMessage;
        }
        return response()->json($response,$code);

    }
}
