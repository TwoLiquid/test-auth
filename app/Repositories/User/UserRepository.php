<?php

namespace App\Repositories\User;

use App\Exceptions\DatabaseException;
use App\Models\MySql\User;
use App\Repositories\BaseRepository;
use App\Repositories\User\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Exception;

/**
 * Class UserRepository
 *
 * @package App\Repositories\User
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * UserRepository constructor
     */
    public function __construct()
    {
        $this->perPage = config('repositories.user.perPage');
        $this->cacheTime = config('repositories.user.cacheTime');
    }

    /**
     * @param int|null $id
     *
     * @return User|null
     *
     * @throws DatabaseException
     */
    public function findById(
        ?int $id
    ) : ?User
    {
        try {
            return User::find($id);
        } catch (Exception $exception) {
            throw new DatabaseException(
                trans('exceptions/repository/user.' . __FUNCTION__),
                $exception->getMessage()
            );
        }
    }

    /**
     * @param string $username
     *
     * @return User|null
     *
     * @throws DatabaseException
     */
    public function findByUsername(
        string $username
    ) : ?User
    {
        try {
            return User::query()
                ->where('username', '=', $username)
                ->first();
        } catch (Exception $exception) {
            throw new DatabaseException(
                trans('exceptions/repository/user.' . __FUNCTION__),
                $exception->getMessage()
            );
        }
    }

    /**
     * @param string $email
     *
     * @return User|null
     *
     * @throws DatabaseException
     */
    public function findByEmail(
        string $email
    ) : ?User
    {
        try {
            return User::query()
                ->where('email', '=', $email)
                ->first();
        } catch (Exception $exception) {
            throw new DatabaseException(
                trans('exceptions/repository/user.' . __FUNCTION__),
                $exception->getMessage()
            );
        }
    }

    /**
     * @return Collection
     *
     * @throws DatabaseException
     */
    public function getAll() : Collection
    {
        try {
            return User::query()
                ->orderBy('id', 'desc')
                ->get();
        } catch (Exception $exception) {
            throw new DatabaseException(
                trans('exceptions/repository/user.' . __FUNCTION__),
                $exception->getMessage()
            );
        }
    }

    /**
     * @param int|null $page
     *
     * @return LengthAwarePaginator
     *
     * @throws DatabaseException
     */
    public function getAllPaginated(
        ?int $page = null
    ) : LengthAwarePaginator
    {
        try {
            return User::query()
                ->orderBy('id', 'desc')
                ->paginate($this->perPage, ['*'], 'page', $page);
        } catch (Exception $exception) {
            throw new DatabaseException(
                trans('exceptions/repository/user.' . __FUNCTION__),
                $exception->getMessage()
            );
        }
    }

    /**
     * @param string $username
     *
     * @return bool
     *
     * @throws DatabaseException
     */
    public function checkUsernameExistence(
        string $username
    ) : bool
    {
        try {
            return User::query()
                ->where('username', '=', $username)
                ->exists();
        } catch (Exception $exception) {
            throw new DatabaseException(
                trans('exceptions/repository/user.' . __FUNCTION__),
                $exception->getMessage()
            );
        }
    }

    /**
     * @param int $authId
     * @param string $username
     *
     * @return bool
     *
     * @throws DatabaseException
     */
    public function checkUsernameUniqueness(
        int $authId,
        string $username
    ) : bool
    {
        try {
            return User::query()
                ->where('id', '!=', $authId)
                ->where('username', '=', $username)
                ->exists();
        } catch (Exception $exception) {
            throw new DatabaseException(
                trans('exceptions/repository/user.' . __FUNCTION__),
                $exception->getMessage()
            );
        }
    }

    /**
     * @param string $email
     *
     * @return bool
     *
     * @throws DatabaseException
     */
    public function checkEmailExistence(
        string $email
    ) : bool
    {
        try {
            return User::query()
                ->where('email', '=', $email)
                ->exists();
        } catch (Exception $exception) {
            throw new DatabaseException(
                trans('exceptions/repository/user.' . __FUNCTION__),
                $exception->getMessage()
            );
        }
    }

    /**
     * @param User $user
     * @param string $email
     *
     * @return bool
     *
     * @throws DatabaseException
     */
    public function checkEmailExceptUserExistence(
        User $user,
        string $email
    ) : bool
    {
        try {
            return User::query()
                ->where('id', '!=', $user->id)
                ->where('email', '=', $email)
                ->exists();
        } catch (Exception $exception) {
            throw new DatabaseException(
                trans('exceptions/repository/user.' . __FUNCTION__),
                $exception->getMessage()
            );
        }
    }

    /**
     * @param string|null $username
     * @param string $email
     * @param string $password
     * @param bool $isAdmin
     *
     * @return User|null
     *
     * @throws DatabaseException
     */
    public function store(
        ?string $username,
        string $email,
        string $password,
        bool $isAdmin = false
    ) : ?User
    {
        try {
            return User::create([
                'username' => $username,
                'email'    => trim($email),
                'password' => Hash::make(trim($password)),
                'is_admin' => $isAdmin
            ]);
        } catch (Exception $exception) {
            throw new DatabaseException(
                trans('exceptions/repository/user.' . __FUNCTION__),
                $exception->getMessage()
            );
        }
    }

    /**
     * @param User $user
     * @param string $username
     * @param string $email
     * @param string|null $password
     *
     * @return User
     *
     * @throws DatabaseException
     */
    public function update(
        User $user,
        string $username,
        string $email,
        ?string $password
    ) : User
    {
        try {
            $user->update([
                'username' => trim($username),
                'email'    => trim($email),
                'password' => $password ?
                    Hash::make(trim($password)) :
                    $user->password
            ]);

            return $user;
        } catch (Exception $exception) {
            throw new DatabaseException(
                trans('exceptions/repository/user.' . __FUNCTION__),
                $exception->getMessage()
            );
        }
    }

    /**
     * @param User $user
     * @param string $username
     *
     * @return User
     *
     * @throws DatabaseException
     */
    public function updateUsername(
        User $user,
        string $username
    ) : User
    {
        try {
            $user->update([
                'username' => trim($username)
            ]);

            return $user;
        } catch (Exception $exception) {
            throw new DatabaseException(
                trans('exceptions/repository/user.' . __FUNCTION__),
                $exception->getMessage()
            );
        }
    }

    /**
     * @param User $user
     * @param string $email
     *
     * @return User
     *
     * @throws DatabaseException
     */
    public function updateEmail(
        User $user,
        string $email
    ) : User
    {
        try {
            $user->update([
                'email' => trim($email)
            ]);

            return $user;
        } catch (Exception $exception) {
            throw new DatabaseException(
                trans('exceptions/repository/user.' . __FUNCTION__),
                $exception->getMessage()
            );
        }
    }

    /**
     * @param User $user
     * @param string $password
     *
     * @return User
     *
     * @throws DatabaseException
     */
    public function updatePassword(
        User $user,
        string $password
    ) : User
    {
        try {
            $user->update([
                'password' => Hash::make(trim($password))
            ]);

            return $user;
        } catch (Exception $exception) {
            throw new DatabaseException(
                trans('exceptions/repository/user.' . __FUNCTION__),
                $exception->getMessage()
            );
        }
    }

    /**
     * @param User $user
     *
     * @return bool|null
     *
     * @throws DatabaseException
     */
    public function delete(
        User $user
    ) : ?bool
    {
        try {
            return $user->delete();
        } catch (Exception $exception) {
            throw new DatabaseException(
                trans('exceptions/repository/user.' . __FUNCTION__),
                $exception->getMessage()
            );
        }
    }
}
