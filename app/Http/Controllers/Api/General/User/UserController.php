<?php

namespace App\Http\Controllers\Api\General\User;

use App\Exceptions\DatabaseException;
use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\General\User\Interfaces\UserControllerInterface;
use App\Http\Requests\Api\General\User\CheckPasswordRequest;
use App\Http\Requests\Api\General\User\UpdateAccountEmailRequest;
use App\Http\Requests\Api\General\User\UpdateAccountPasswordRequest;
use App\Http\Requests\Api\General\User\UpdateByAdminRequest;
use App\Repositories\User\UserRepository;
use App\Services\Auth\AuthService;
use App\Services\User\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

/**
 * Class UserController
 *
 * @package App\Http\Controllers\Api\User
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
     * @param CheckPasswordRequest $request
     *
     * @return JsonResponse
     */
    public function checkPassword(
        CheckPasswordRequest $request
    ) : JsonResponse
    {
        /**
         * Checking passwords
         */
        if (!Hash::check(
            $request->input('password'),
            AuthService::user()->password
        )) {
            return $this->respondWithError(
                trans('validations/api/general/user/checkPassword.result.error.password')
            );
        }

        return $this->respondWithSuccess([],
            trans('validations/api/general/user/checkPassword.result.success')
        );
    }

    /**
     * @param int $id
     * @param UpdateByAdminRequest $request
     *
     * @return JsonResponse
     *
     * @throws DatabaseException
     */
    public function updateByAdmin(
        int $id,
        UpdateByAdminRequest $request
    ) : JsonResponse
    {
        /**
         * Getting user
         */
        $user = $this->userRepository->findById($id);

        /**
         * Checking user existence
         */
        if (!$user) {
            return $this->respondWithError(
                trans('validations/api/general/user/updateByAdmin.result.error')
            );
        }

        /**
         * Updating user
         */
        $this->userRepository->update(
            $user,
            $request->input('username'),
            $request->input('email'),
            $request->input('password')
        );

        return $this->respondWithSuccess([],
            trans('validations/api/general/user/updateByAdmin.result.success')
        );
    }

    /**
     * @param UpdateAccountEmailRequest $request
     *
     * @return JsonResponse
     *
     * @throws DatabaseException
     */
    public function updateAccountEmail(
        UpdateAccountEmailRequest $request
    ) : JsonResponse
    {
        /**
         * Updating user email
         */
        $this->userRepository->updateEmail(
            AuthService::user(),
            $request->input('email')
        );

        return $this->respondWithSuccess([],
            trans('validations/api/general/user/updateAccountEmail.result.success')
        );
    }

    /**
     * @param UpdateAccountPasswordRequest $request
     *
     * @return JsonResponse
     *
     * @throws DatabaseException
     */
    public function updateAccountPassword(
        UpdateAccountPasswordRequest $request
    ) : JsonResponse
    {
        /**
         * Checking password is new
         */
        if (Hash::check(
            $request->input('password'),
            AuthService::user()
        )) {
            return $this->respondWithError(
                trans('validations/api/general/user/checkPassword.result.password')
            );
        }

        /**
         * Updating user email
         */
        $this->userRepository->updatePassword(
            AuthService::user(),
            $request->input('password')
        );

        return $this->respondWithSuccess([],
            trans('validations/api/general/user/updateAccountPassword.result.success')
        );
    }
}
