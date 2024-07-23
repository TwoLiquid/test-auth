<?php

namespace App\Claims;

use App\Models\MySql\User;
use CorBosman\Passport\AccessToken;

/**
 * Class CustomClaim
 *
 * @package App\Claims
 */
class CustomClaim
{
    /**
     * @param AccessToken $token
     * @param $next
     *
     * @return mixed
     */
    public function handle(AccessToken $token, $next) : mixed
    {
        $user = User::find($token->getUserIdentifier());

        $token->addClaim('auth_id', $user->id);
        $token->addClaim('is_admin', $user->is_admin);

        return $next($token);
    }
}
