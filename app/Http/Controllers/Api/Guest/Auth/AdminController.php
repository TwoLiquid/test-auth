<?php

namespace App\Http\Controllers\Api\Guest\Auth;

use App\Exceptions\DatabaseException;
use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\Guest\Auth\Interfaces\AdminControllerInterface;
use App\Http\Requests\Api\Guest\Auth\Admin\LoginRequest;
use App\Http\Requests\Api\Guest\Auth\Admin\RegisterRequest;
use App\Http\Requests\Api\Guest\Auth\Admin\RetrieveRequest;
use App\Http\Requests\Api\Guest\Auth\Admin\UpdateEmailRequest;
use App\Repositories\User\UserRepository;
use App\Transformers\Api\Guest\Auth\User\UserTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class AdminController
 *
 * @package App\Http\Controllers\Api\Guest\Auth
 */
class AdminController extends BaseController implements AdminControllerInterface
{
    /**
     * @var UserRepository
     */
    protected UserRepository $userRepository;

    /**
     * AdminController constructor
     */
    public function __construct()
    {
        /** @var UserRepository userRepository */
        $this->userRepository = new UserRepository();
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
         * Creating admin
         */
        $user = $this->userRepository->store(
            null,
            $request->input('email'),
            $request->input('password'),
            true
        );

        /**
         * Creating admin oAuth token
         */
        $token = $user->createToken('MelloAdminToken')->accessToken;

        return $this->respondWithSuccess(
            $this->transformItem($user, new UserTransformer($token)),
            trans('validations/api/guest/auth/admin/register.result.success')
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
         * Getting admin
         */
        $user = $this->userRepository->findByEmail(
            $request->input('email')
        );

        /**
         * Checking admin existence
         */
        if (!$user) {
            return $this->respondWithError(
                trans('validations/api/guest/auth/admin/login.result.error.find')
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
         * Attempting admin auth credentials
         */
        if (!$attemptingResult) {
            return $this->respondWithError(
                trans('validations/api/guest/auth/admin/login.result.error.credentials')
            );
        }

        /**
         * Authorizing admin
         */
        Auth::guard('api')->setUser($user);

        /**
         * Creating admin oAuth token
         */
        $token = $user->createToken('MelloAdminToken')->accessToken;

        return $this->respondWithSuccess(
            $this->transformItem($user, new UserTransformer($token)),
            trans('validations/api/guest/auth/admin/login.result.success')
        );
    }

    /**
     * @param RetrieveRequest $request
     *
     * @return JsonResponse
     *
     * @throws DatabaseException
     */
    public function retrieve(
        RetrieveRequest $request
    ) : JsonResponse
    {
        /**
         * Getting admin
         */
        $user = $this->userRepository->findByEmail(
            $request->input('email')
        );

        /**
         * Checking admin existence
         */
        if (!$user) {
            return $this->respondWithError(
                trans('validations/api/guest/auth/admin/retrieve.result.error.find')
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
         * Attempting admin auth credentials
         */
        if (!$attemptingResult) {
            return $this->respondWithError(
                trans('validations/api/guest/auth/admin/retrieve.result.error.credentials')
            );
        }

        return $this->respondWithSuccess(
            $this->transformItem($user, new UserTransformer),
            trans('validations/api/guest/auth/admin/retrieve.result.success')
        );
    }

    /**
     * @param UpdateEmailRequest $request
     *
     * @return JsonResponse
     *
     * @throws DatabaseException
     */
    public function updateEmail(
        UpdateEmailRequest $request
    ) : JsonResponse
    {
        /**
         * Getting admin
         */
        $user = $this->userRepository->findByEmail(
            $request->input('email')
        );

        /**
         * Checking admin existence
         */
        if (!$user) {
            return $this->respondWithError(
                trans('validations/api/guest/auth/admin/updateEmail.result.error.find')
            );
        }

        /**
         * Checking new email existence
         */
        if ($this->userRepository->checkEmailExceptUserExistence(
            $user,
            $request->input('new_email')
        )) {
            return $this->respondWithError(
                trans('validations/api/guest/auth/admin/updateEmail.new_email.unique')
            );
        }

        /**
         * Updating admin email
         */
        $user = $this->userRepository->updateEmail(
            $user,
            $request->input('new_email')
        );

        return $this->respondWithSuccess(
            $this->transformItem($user, new UserTransformer),
            trans('validations/api/guest/auth/admin/updateEmail.result.success')
        );
    }
}
