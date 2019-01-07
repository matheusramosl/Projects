<?php

namespace App\Http\Middleware;

use Closure;

class AuthTest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = User::all();
        if ($user->isSecretario()) {
            return 'errrado';
        }else{
            return 'certo';
        }
        return $next($request);
    }
}
