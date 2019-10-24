<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Admin\User;
use App\Models\BaseModel;
use Illuminate\Support\Facades\Route as Uri;

class AuthenticateParter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!User::isLogin()){
            return \Redirect::route('parter/login');
        }
        return $next($request);
    }
    
    public function throwException()
    {
        return response('access not allowed', 401)
        ->header('Content-Type', 'text/plain');
    }
}
