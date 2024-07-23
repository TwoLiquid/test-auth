<?php

namespace App\Http\Controllers\Api\General\Auth;

use App\Exceptions\DatabaseException;
use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\General\Auth\Interfaces\AuthControllerInterface;
use App\Http\Requests\Api\General\Auth\CheckUsernameRequest;
use App\Repositories\User\UserRepository;
use App\Services\Auth\AuthService;
use Illuminate\Http\JsonResponse;

/**
 * Class AuthController
 *
 * @package App\Http\Controllers\Api\General\Auth
 */
class AuthController extends BaseController implements AuthControllerInterface
{
    /**
     * @var UserRepository
     */
    protected UserRepository $userRepository;

    /**
     * AuthController constructor
     */
    public function __construct()
    {
        /** @var UserRepository userRepository */
        $this->userRepository = new UserRepository();
    }

    /**
     * @return JsonResponse
     */
    public function logout() : JsonResponse
    {
        /**
         * Revoking user token
         */
        AuthService::user()->token()->revoke();

        return $this->respondWithSuccess([],
            trans('validations/api/general/auth/logout.result.success')
        );
    }

    /**
     * @param CheckUsernameRequest $request
     *
     * @return JsonResponse
     *
     * @throws DatabaseException
     */
    public function checkUsername(
        CheckUsernameRequest $request
    ) : JsonResponse
    {
        if ($this->userRepository->checkUsernameUniqueness(
            AuthService::user()->id,
            $request->input('username')
        )) {
            return $this->respondWithError(
                trans('validations/api/guest/auth/checkUsername.result.error')
            );
        }

        return $this->respondWithSuccess([],
            trans('validations/api/guest/auth/checkUsername.result.success')
        );
    }
}
