<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegisterConroller extends Controller
{
    public function __invoke():JsonResponse {
        return response()->json();
    }
}
