<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends BaseController
{
    public function login(Request $request): JsonResponse {
        if(Auth::attempt(['id' => $request->id, 'password' => $request->password])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->plainTextToken;
            $success['id'] =  $user->id;

            return $this->sendResponse($success, 'Berhasil Login');
        }
        else{
            return $this->sendError('Unauthorized.', ['error'=>'Unauthorised']);
        }
    }
}
