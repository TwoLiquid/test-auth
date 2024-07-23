<?php

namespace App\Http\Controllers\Api\Guest\Auth;

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\Guest\Auth\Interfaces\AuthControllerInterface;
use App\Http\Requests\Api\Guest\Auth\CheckEmailRequest;
use App\Http\Requests\Api\Guest\Auth\CheckUsernameRequest;
use App\Transformers\Api\Guest\Auth\User\UserTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthController
 *
 * @package App\Http\Controllers\Api\Guest\Auth
 */
class AuthController extends BaseController implements AuthControllerInterface
{
    /**
     * @return JsonResponse
     */
    public function checkToken() : JsonResponse
    {
        /**
         * Checking bearer token
         */
        if (Auth::guard('api')->check()) {
            return $this->respondWithSuccess(
                $this->transformItem(
                    Auth::guard('api')->user(),
                    new UserTransformer
                ), trans('validations/api/guest/auth/checkToken.result.success')
            );
        }

        return $this->respondWithAuthorizationError(
            trans('validations/api/guest/auth/checkToken.result.error')
        );
    }

    /**
     * @param CheckUsernameRequest $request
     *
     * @return JsonResponse
     */
    public function checkUsername(
        CheckUsernameRequest $request
    ) : JsonResponse
    {
        return $this->respondWithSuccess([],
            trans('validations/api/guest/auth/checkUsername.result.success')
        );
    }

    /**
     * @param CheckEmailRequest $request
     *
     * @return JsonResponse
     */
    public function checkEmail(
        CheckEmailRequest $request
    ) : JsonResponse
    {
        return $this->respondWithSuccess([],
            trans('validations/api/guest/auth/checkEmail.result.success')
        );
    }

    /**
     * @return JsonResponse
     */
    public function test() : JsonResponse
    {
        return $this->respondWithSuccess([],
            trans('validations/api/guest/auth/test.result.success')
        );
    }
}
