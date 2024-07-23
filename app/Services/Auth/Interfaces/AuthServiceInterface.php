<?php

namespace App\Services\Auth\Interfaces;

use App\Models\MySql\User;

/**
 * Interface AuthServiceInterface
 *
 * @package App\Services\Auth\Interfaces
 */
interface AuthServiceInterface
{
    /**
     * This method provides getting data
     *
     * @return User|null
     */
    public static function user() : ?User;
}
