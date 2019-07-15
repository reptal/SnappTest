<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\Admin\LoginRequest;
use App\Serializers\Response\JsonResponseSerializer;
use App\Services\Auth\AuthCheckService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class AuthController extends Controller
{

    /**
     * @param LoginRequest $loginRequest
     * @param AuthCheckService $authCheckService
     * @param JsonResponseSerializer $jsonResponseSerializer
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $loginRequest, AuthCheckService $authCheckService, JsonResponseSerializer $jsonResponseSerializer)
    {
        //check attempt
        if ($authCheckService->check($loginRequest->validated())) {
            //its valid user
            $user = \Auth::user();
            //create access token
            $token = $user->createToken('Admin Access Token')->accessToken;
            //send response
            return response()->json($jsonResponseSerializer->serialize([
                'error' => false,
                'message' => 'success',
                'data' => [
                    'token' => $token
                ]
            ]));
        }
        //failed auth
        return response()->json($jsonResponseSerializer->serialize([
            'error' => true,
            'message' => 'wrong email or password',
            'data' => []
        ]), Response::HTTP_UNAUTHORIZED);
    }

}
