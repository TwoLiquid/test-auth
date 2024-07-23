<?php

namespace App\Http\Controllers\Api\Guest\User\Interfaces;

use App\Http\Requests\Api\Guest\User\GetByEmailRequest;
use App\Http\Requests\Api\Guest\User\UpdatePasswordRequest;
use App\Http\Requests\Api\Guest\User\UpdateUsernameRequest;
use Illuminate\Http\JsonResponse;

/**
 * Interface UserControllerInterface
 *
 * @package App\Http\Controllers\Api\Guest\User\Interfaces
 */
interface UserControllerInterface
{
    /**
     * This method provides getting data
     * by related entity repository with a certain query
     *
     * @param int $id
     *
     * @return JsonResponse
     */
    public function getById(
        int $id
    ) : JsonResponse;

    /**
     * This method provides getting data
     * by related entity repository with a certain query
     *
     * @param GetByEmailRequest $request
     *
     * @return JsonResponse
     */
    public function getByEmail(
        GetByEmailRequest $request
    ) : JsonResponse;

    /**
     * This method provides updating data
     * by related entity repository with a certain query
     *
     * @param UpdatePasswordRequest $request
     *
     * @return JsonResponse
     */
    public function updatePassword(
        UpdatePasswordRequest $request
    ) : JsonResponse;

    /**
     * This method provides updating data
     * by related entity repository with a certain query
     *
     * @param UpdateUsernameRequest $request
     *
     * @return JsonResponse
     */
    public function updateUsername(
        UpdateUsernameRequest $request
    ) : JsonResponse;
}
