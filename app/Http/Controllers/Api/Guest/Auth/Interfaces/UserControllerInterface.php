<?php

namespace App\Http\Controllers\Api\Guest\Auth\Interfaces;

use App\Http\Requests\Api\Guest\Auth\User\LoginRequest;
use App\Http\Requests\Api\Guest\Auth\User\RegisterRequest;
use Illuminate\Http\JsonResponse;

/**
 * Interface UserControllerInterface
 *
 * @package App\Http\Controllers\Api\Guest\Auth\Interfaces
 */
interface UserControllerInterface
{
    /**
     * This method provides storing data
     * by related entity repository with a certain query
     *
     * @param RegisterRequest $request
     *
     * @return JsonResponse
     */
    public function register(
        RegisterRequest $request
    ) : JsonResponse;

    /**
     * This method provides retrieving data
     * entity repository with a certain query
     *
     * @param LoginRequest $request
     *
     * @return JsonResponse
     */
    public function login(
        LoginRequest $request
    ) : JsonResponse;
}
