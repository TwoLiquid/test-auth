<?php

namespace App\Http\Controllers\Api\General\User\Interfaces;

use App\Http\Requests\Api\General\User\CheckPasswordRequest;
use App\Http\Requests\Api\General\User\UpdateAccountEmailRequest;
use App\Http\Requests\Api\General\User\UpdateAccountPasswordRequest;
use App\Http\Requests\Api\General\User\UpdateByAdminRequest;
use Illuminate\Http\JsonResponse;

/**
 * Interface UserControllerInterface
 *
 * @package App\Http\Controllers\Api\General\User\Interfaces
 */
interface UserControllerInterface
{
    /**
     * This method provides checking data
     * by related entity repository with a certain query
     *
     * @param CheckPasswordRequest $request
     *
     * @return JsonResponse
     */
    public function checkPassword(
        CheckPasswordRequest $request
    ) : JsonResponse;

    /**
     * This method provides updating data
     * by related entity repository with a certain query
     *
     * @param int $id
     * @param UpdateByAdminRequest $request
     *
     * @return JsonResponse
     */
    public function updateByAdmin(
        int $id,
        UpdateByAdminRequest $request
    ) : JsonResponse;

    /**
     * This method provides updating data
     * by related entity repository with a certain query
     *
     * @param UpdateAccountEmailRequest $request
     *
     * @return JsonResponse
     */
    public function updateAccountEmail(
        UpdateAccountEmailRequest $request
    ) : JsonResponse;

    /**
     * This method provides updating data
     * by related entity repository with a certain query
     *
     * @param UpdateAccountPasswordRequest $request
     *
     * @return JsonResponse
     */
    public function updateAccountPassword(
        UpdateAccountPasswordRequest $request
    ) : JsonResponse;
}
