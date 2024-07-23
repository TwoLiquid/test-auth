<?php

namespace App\Repositories\User\Interfaces;

use App\Models\MySql\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Interface UserRepositoryInterface
 *
 * @package App\Repositories\User\Interfaces
 */
interface UserRepositoryInterface
{
    /**
     * This method provides finding a single row
     * with an eloquent model by primary key
     *
     * @param int|null $id
     *
     * @return User|null
     */
    public function findById(
        ?int $id
    ) : ?User;

    /**
     * This method provides finding a single row
     * with an eloquent model by certain query
     *
     * @param string $username
     *
     * @return User|null
     */
    public function findByUsername(
        string $username
    ) : ?User;

    /**
     * This method provides finding a single row
     * with an eloquent model by certain query
     *
     * @param string $email
     *
     * @return User|null
     */
    public function findByEmail(
        string $email
    ) : ?User;

    /**
     * This method provides getting all rows
     * with an eloquent model
     *
     * @return Collection
     */
    public function getAll() : Collection;

    /**
     * This method provides getting all rows
     * with an eloquent model with pagination
     *
     * @param int|null $page
     *
     * @return LengthAwarePaginator
     */
    public function getAllPaginated(
        ?int $page
    ) : LengthAwarePaginator;

    /**
     * This method provides checking row existence
     * with an eloquent model by certain query
     *
     * @param string $username
     *
     * @return bool
     */
    public function checkUsernameExistence(
        string $username
    ) : bool;

    /**
     * This method provides checking row existence
     * with an eloquent model by certain query
     *
     * @param int $authId
     * @param string $username
     *
     * @return bool
     */
    public function checkUsernameUniqueness(
        int $authId,
        string $username
    ) : bool;

    /**
     * This method provides checking row existence
     * with an eloquent model by certain query
     *
     * @param string $email
     *
     * @return bool
     */
    public function checkEmailExistence(
        string $email
    ) : bool;

    /**
     * This method provides checking row existence
     * with an eloquent model by certain query
     *
     * @param User $user
     * @param string $email
     *
     * @return bool
     */
    public function checkEmailExceptUserExistence(
        User $user,
        string $email
    ) : bool;

    /**
     * This method provides creating a new row
     * with eloquent mode
     *
     * @param string|null $username
     * @param string $email
     * @param string $password
     * @param bool $isAdmin
     *
     * @return User|null
     */
    public function store(
        ?string $username,
        string $email,
        string $password,
        bool $isAdmin
    ) : ?User;

    /**
     * This method provides updating existing row
     * with an eloquent model
     *
     * @param User $user
     * @param string $username
     * @param string $email
     * @param string|null $password
     *
     * @return User
     */
    public function update(
        User $user,
        string $username,
        string $email,
        ?string $password
    ) : User;

    /**
     * This method provides updating existing row
     * with an eloquent model
     *
     * @param User $user
     * @param string $username
     *
     * @return User
     */
    public function updateUsername(
        User $user,
        string $username
    ) : User;

    /**
     * This method provides updating existing row
     * with an eloquent model
     *
     * @param User $user
     * @param string $email
     *
     * @return User
     */
    public function updateEmail(
        User $user,
        string $email
    ) : User;

    /**
     * This method provides updating existing row
     * with an eloquent model
     *
     * @param User $user
     * @param string $password
     *
     * @return User
     */
    public function updatePassword(
        User $user,
        string $password
    ) : User;

    /**
     * This method provides deleting existing row
     * with an eloquent model
     *
     * @param User $user
     *
     * @return bool|null
     */
    public function delete(
        User $user
    ) : ?bool;
}
