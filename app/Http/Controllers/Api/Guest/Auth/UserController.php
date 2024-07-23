<?php

namespace App\Http\Controllers\Api\Guest\Auth;

use App\Exceptions\DatabaseException;
use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\Guest\Auth\Interfaces\UserControllerInterface;
use App\Http\Requests\Api\Guest\Auth\User\LoginRequest;
use App\Http\Requests\Api\Guest\Auth\User\RegisterRequest;
use App\Repositories\User\UserRepository;
use App\Services\User\UserService;
use App\Transformers\Api\Guest\Auth\User\UserTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserController
 *
 * @package App\Http\Controllers\Api\Guest\Auth
 */
class UserController extends BaseController implements UserControllerInterface
{
    /**
     * @var UserRepository
     */
    protected UserRepository $userRepository;

    /**
     * @var UserService
     */
    protected UserService $userService;

    /**
     * UserController constructor
     */
    public function __construct()
    {
        /** @var UserRepository userRepository */
        $this->userRepository = new UserRepository();

        /** @var UserService userService */
        $this->userService = new UserService();
    }

    /**
     * @param RegisterRequest $request
     *
     * @return JsonResponse
     *
     * @throws DatabaseException
     */
    public function register(
        RegisterRequest $request
    ) : JsonResponse
    {
        /**
         * Creating user
         */
        $user = $this->userRepository->store(
            $request->input('username'),
            $request->input('email'),
            $request->input('password')
        );

        /**
         * Authorizing user
         */
        Auth::guard('api')->setUser($user);

        /**
         * Creating user oAuth token
         */
        $token = $user->createToken('MelloUserToken')->accessToken;

        return $this->respondWithSuccess(
            $this->transformItem($user, new UserTransformer($token)),
            trans('validations/api/guest/auth/user/register.result.success')
        );
    }

    /**
     * @param LoginRequest $request
     *
     * @return JsonResponse
     *
     * @throws DatabaseException
     */
    public function login(
        LoginRequest $request
    ) : JsonResponse
    {
        /**
         * Checking login
         */
        if ($this->userService->checkLoginIsEmail(
            $request->input('login')
        )) {

            /**
             * Getting user
             */
            $user = $this->userRepository->findByEmail(
                $request->input('login')
            );
        } else {

            /**
             * Getting user
             */
            $user = $this->userRepository->findByUsername(
                $request->input('login')
            );
        }

        /**
         * Checking user existence
         */
        if (!$user) {
            return $this->respondWithError(
                trans('validations/api/guest/auth/user/login.result.error.find')
            );
        }

        /**
         * Checking login
         */
        $attemptingResult = Hash::check(
            $request->input('password'),
            $user->password
        );

        /**
         * Attempting user auth credentials
         */
        if (!$attemptingResult) {
            return $this->respondWithError(
                trans('validations/api/guest/auth/user/login.result.error.credentials')
            );
        }

        /**
         * Authorizing user
         */
        Auth::guard('api')->setUser($user);

        /**
         * Creating user oAuth token
         */
        $token = $user->createToken('MelloUserToken')->accessToken;

        return $this->respondWithSuccess(
            $this->transformItem($user, new UserTransformer($token)),
            trans('validations/api/guest/auth/user/login.result.success')
        );
    }
}
