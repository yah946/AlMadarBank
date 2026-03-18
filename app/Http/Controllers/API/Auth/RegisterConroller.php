<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\API\BaseApiConroller;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class RegisterConroller extends BaseApiConroller
{
    public function __invoke(RegisterRequest $request):JsonResponse {

        User::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'username'=>$request->username,
            'cin'=>$request->cin,
            'date_of_birth'=>$request->date_of_birth,
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        return $this->sendResponse(code:201);
    }
}
