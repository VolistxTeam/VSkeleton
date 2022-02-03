<?php

namespace App\Http\Middleware\Auth;

use App\Repositories\Auth\AccessTokenRepository;
use App\ValidationRules\Auth\IPValidationRule;
use App\ValidationRules\Auth\ValidKeyValidationRule;
use Closure;
use Illuminate\Http\Request;
use function response;

class AdminAuthMiddleware
{
    private AccessTokenRepository $accessTokenRepository;

    public function __construct(AccessTokenRepository $accessTokenRepository)
    {
        $this->accessTokenRepository = $accessTokenRepository;
    }

    public function handle(Request $request, Closure $next)
    {
        $token = $this->accessTokenRepository->AuthAccessToken($request->bearerToken());

        //prepare inputs array
        $inputs = [
            'request' => $request,
            'token' => $token,
        ];

        //add extra validators in the required order.
        //To be refactored to detect all classes with a base of ValidationRuleBase and create instance of them passing parameters, and ordering them by id
        $validators = [
            new ValidKeyValidationRule($inputs),
            new IPValidationRule($inputs),
        ];

        foreach ($validators as $validator) {
            $result = $validator->validate();
            if ($result !== true) {
                return response()->json($result['message'], $result['code']);
            }
        }


        $request->merge([
            'X_ACCESS_TOKEN' => $token,
        ]);

        return $next($request);
    }
}