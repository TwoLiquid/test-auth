<?php

namespace App\Services\User;

use App\Repositories\User\UserRepository;
use App\Services\User\Interfaces\UserServiceInterface;

/**
 * Class UserService
 *
 * @package App\Services\User
 */
class UserService implements UserServiceInterface
{
    /**
     * @var UserRepository
     */
    protected UserRepository $userRepository;

    /**
     * UserService constructor
     */
    public function __construct()
    {
        /** @var UserRepository userRepository */
        $this->userRepository = new UserRepository();
    }

    /**
     * @param string $login
     *
     * @return bool
     */
    public function checkLoginIsEmail(
        string $login
    ) : bool
    {
        if (filter_var($login, FILTER_VALIDATE_EMAIL) === false) {
            return false;
        }

        return true;
    }
}
