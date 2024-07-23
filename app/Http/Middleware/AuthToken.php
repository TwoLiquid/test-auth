<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthToken
 *
 * @package App\Http\Middleware
 */
class AuthToken
{
    /**
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     *
     * @throws AuthenticationException
     */
    public function handle(
        Request $request,
        Closure $next
    ) : mixed
    {
        if (!Auth::guard('api')->check()) {
            throw new AuthenticationException(
                'Unauthenticated.'
            );
        }

        return $next($request);
    }
}
