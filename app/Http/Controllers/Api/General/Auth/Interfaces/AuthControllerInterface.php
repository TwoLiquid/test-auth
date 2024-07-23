<?php

namespace App\Http\Controllers\Api\General\Auth\Interfaces;

use App\Http\Requests\Api\General\Auth\CheckUsernameRequest;
use Illuminate\Http\JsonResponse;

/**
 * Interface UserControllerInterface
 *
 * @package App\Http\Controllers\Api\General\Auth\Interfaces
 */
interface AuthControllerInterface
{
    /**
     * This method provides retrieving data
     * entity repository with a certain query
     *
     * @return JsonResponse
     */
    public function logout() : JsonResponse;

    /**
     * This method provides checking data
     * by related entity repository with a certain query
     *
     * @param CheckUsernameRequest $request
     *
     * @return JsonResponse
     */
    public function checkUsername(
        CheckUsernameRequest $request
    ) : JsonResponse;
}
