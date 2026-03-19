<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\API\BaseApiController;
class LogoutConroller extends BaseApiController
{
    public function __invoke() {
        auth('api')->logout();
        $this->sendResponse(message:'successfly log out');
    }
}
