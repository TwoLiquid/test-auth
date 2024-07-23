<?php

namespace App\Transformers\Api\Guest\User;

use App\Models\MySql\User;
use App\Transformers\BaseTransformer;

/**
 * Class UserTransformer
 *
 * @package App\Transformers\Api\Guest\User
 */
class UserTransformer extends BaseTransformer
{
    /**
     * @var string|null
     */
    protected ?string $token;

    /**
     * UserTransformer constructor
     *
     * @param string|null $token
     */
    public function __construct(
        ?string $token = null
    )
    {
        /** @var string token */
        $this->token = $token;
    }

    /**
     * @param User $user
     *
     * @return array
     */
    public function transform(User $user) : array
    {
        return [
            'id'       => $user->id,
            'username' => $user->username,
            'email'    => $user->email,
            'is_admin' => $user->is_admin,
            'token'    => $this->token
        ];
    }

    /**
     * @return string
     */
    public function getItemKey() : string
    {
        return 'user';
    }

    /**
     * @return string
     */
    public function getCollectionKey() : string
    {
        return 'users';
    }
}
