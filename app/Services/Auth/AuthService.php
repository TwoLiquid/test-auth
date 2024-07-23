<?php

namespace App\Services\Auth;

use App\Models\MySql\User;
use App\Services\Auth\Interfaces\AuthServiceInterface;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthService
 *
 * @package App\Services\Auth
 */
class AuthService implements AuthServiceInterface
{
    /**
     * @return User|null
     */
    public static function user() : ?User
    {
        /** @var User $user */
        $user = Auth::guard('api')->user();

        return $user;
    }
}
