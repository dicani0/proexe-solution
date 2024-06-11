<?php

namespace App\Http\Controllers;

use App\Exceptions\AuthException;
use App\Exceptions\InvalidSystemException;
use App\Http\Factories\AuthServiceFactory;
use App\Http\Requests\LoginRequest;
use App\Http\Responses\FailureResponse;
use App\Http\Responses\LoginResponse;
use External\Foo\Exceptions\AuthenticationFailedException;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(LoginRequest $request): Response
    {
        try {
            $authService = AuthServiceFactory::make(Str::before($request->login, '_'));
            $token = $authService->login($request->login, $request->password);

            return (new LoginResponse($token))->toResponse($request);
            // Could be just Exception as well since we are catching all exceptions and returning FailureResponse
            // If we want to be more specific we can catch InvalidSystemException and AuthException separately
            // and return different responses for each case
        } catch (InvalidSystemException|AuthException $e) {
            return (new FailureResponse())->toResponse($request);
        }
    }
}
