<?php

namespace App\Http\Controllers\Api\Guest\User;

use App\Exceptions\DatabaseException;
use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\Guest\User\Interfaces\UserControllerInterface;
use App\Http\Requests\Api\Guest\User\GetByEmailRequest;
use App\Http\Requests\Api\Guest\User\UpdatePasswordRequest;
use App\Http\Requests\Api\Guest\User\UpdateUsernameRequest;
use App\Repositories\User\UserRepository;
use App\Transformers\Api\Guest\User\UserTransformer;
use Illuminate\Http\JsonResponse;

/**
 * Class UserController
 *
 * @package App\Http\Controllers\Api\Guest\User
 */
class UserController extends BaseController implements UserControllerInterface
{
    /**
     * @var UserRepository
     */
    protected UserRepository $userRepository;

    /**
     * UserController constructor
     */
    public function __construct()
    {
        /** @var UserRepository userRepository */
        $this->userRepository = new UserRepository();
    }

    /**
     * @param int $id
     *
     * @return JsonResponse
     *
     * @throws DatabaseException
     */
    public function getById(
        int $id
    ) : JsonResponse
    {
        /**
         * Creating user
         */
        $user = $this->userRepository->findById($id);

        /**
         * Checking user existence
         */
        if (!$user) {
            return $this->respondWithError(
                trans('validations/api/guest/user/getById.result.find')
            );
        }

        return $this->respondWithSuccess(
            $this->transformItem($user, new UserTransformer),
            trans('validations/api/guest/user/getById.result.success')
        );
    }

    /**
     * @param GetByEmailRequest $request
     *
     * @return JsonResponse
     *
     * @throws DatabaseException
     */
    public function getByEmail(
        GetByEmailRequest $request
    ) : JsonResponse
    {
        /**
         * Creating user
         */
        $user = $this->userRepository->findByEmail(
            $request->input('email')
        );

        /**
         * Checking user existence
         */
        if (!$user) {
            return $this->respondWithError(
                trans('validations/api/guest/user/getByEmail.result.find')
            );
        }

        return $this->respondWithSuccess(
            $this->transformItem($user, new UserTransformer),
            trans('validations/api/guest/user/getByEmail.result.success')
        );
    }

    /**
     * @param UpdatePasswordRequest $request
     *
     * @return JsonResponse
     *
     * @throws DatabaseException
     */
    public function updatePassword(
        UpdatePasswordRequest $request
    ) : JsonResponse
    {
        /**
         * Creating user
         */
        $user = $this->userRepository->findByEmail(
            $request->input('email')
        );

        /**
         * Checking user existence
         */
        if (!$user) {
            return $this->respondWithError(
                trans('validations/api/guest/user/updatePassword.result.find')
            );
        }

        /**
         * Updating user
         */
        $this->userRepository->updatePassword(
            $user,
            $request->input('password')
        );

        return $this->respondWithSuccess([],
            trans('validations/api/guest/user/updatePassword.result.success')
        );
    }

    /**
     * @param UpdateUsernameRequest $request
     *
     * @return JsonResponse
     *
     * @throws DatabaseException
     */
    public function updateUsername(
        UpdateUsernameRequest $request
    ) : JsonResponse
    {
        /**
         * Creating user
         */
        $user = $this->userRepository->findByEmail(
            $request->input('email')
        );

        /**
         * Checking user existence
         */
        if (!$user) {
            return $this->respondWithError(
                trans('validations/api/guest/user/updateUsername.result.find')
            );
        }

        /**
         * Updating user
         */
        $this->userRepository->updateUsername(
            $user,
            $request->input('username')
        );

        return $this->respondWithSuccess([],
            trans('validations/api/guest/user/updateUsername.result.success')
        );
    }
}
