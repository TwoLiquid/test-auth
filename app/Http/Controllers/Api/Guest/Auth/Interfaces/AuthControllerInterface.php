<?php

namespace App\Http\Controllers\Api\Guest\Auth\Interfaces;

use App\Http\Requests\Api\Guest\Auth\CheckEmailRequest;
use App\Http\Requests\Api\Guest\Auth\CheckUsernameRequest;
use Illuminate\Http\JsonResponse;

/**
 * Interface AuthControllerInterface
 *
 * @package App\Http\Controllers\Api\Guest\Auth\Interfaces
 */
interface AuthControllerInterface
{
    /**
     * This method provides checking row existence
     *
     * @return JsonResponse
     */
    public function checkToken() : JsonResponse;

    /**
     * This method provides checking row existence
     *
     * @param CheckUsernameRequest $request
     *
     * @return JsonResponse
     */
    public function checkUsername(
        CheckUsernameRequest $request
    ) : JsonResponse;

    /**
     * This method provides checking row existence
     *
     * @param CheckEmailRequest $request
     *
     * @return JsonResponse
     */
    public function checkEmail(
        CheckEmailRequest $request
    ) : JsonResponse;

    /**
     * This method provides checking api access
     *
     * @return JsonResponse
     */
    public function test() : JsonResponse;
}
