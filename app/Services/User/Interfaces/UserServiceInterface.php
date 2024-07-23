<?php

namespace App\Services\User\Interfaces;

/**
 * Interface UserServiceInterface
 *
 * @package App\Services\User\Interfaces
 */
interface UserServiceInterface
{
    /**
     * This method provides checking data
     *
     * @param string $login
     *
     * @return bool
     */
    public function checkLoginIsEmail(
        string $login
    ) : bool;
}
