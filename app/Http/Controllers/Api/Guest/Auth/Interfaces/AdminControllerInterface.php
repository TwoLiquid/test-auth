<?php

namespace App\Http\Controllers\Api\Guest\Auth\Interfaces;

use App\Http\Requests\Api\Guest\Auth\Admin\LoginRequest;
use App\Http\Requests\Api\Guest\Auth\Admin\RegisterRequest;
use App\Http\Requests\Api\Guest\Auth\Admin\RetrieveRequest;
use App\Http\Requests\Api\Guest\Auth\Admin\UpdateEmailRequest;
use Illuminate\Http\JsonResponse;

/**
 * Interface AdminControllerInterface
 *
 * @package App\Http\Controllers\Api\Guest\Auth\Interfaces
 */
interface AdminControllerInterface
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

    /**
     * This method provides retrieving data
     * entity repository with a certain query
     *
     * @param RetrieveRequest $request
     *
     * @return JsonResponse
     */
    public function retrieve(
        RetrieveRequest $request
    ) : JsonResponse;

    /**
     * This method provides updating data
     * entity repository with a certain query
     *
     * @param UpdateEmailRequest $request
     *
     * @return JsonResponse
     */
    public function updateEmail(
        UpdateEmailRequest $request
    ) : JsonResponse;
}
