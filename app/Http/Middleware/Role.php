<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $roleList = ['user' => 'user', 'guest' => 'guest', 'admin' => 'admin'];
        $allowedRoleIds = [];

        foreach ($roles as $role) {
           if(isset($roleList[$role])) $allowedRoleIds[] = $roleList[$role];
        }

        $allowedRoleIds = array_unique($allowedRoleIds); 

        if(Auth::check()) {
            if(in_array(Auth::user()->role, $allowedRoleIds)) return $next($request);
        } 
        else {
            if(in_array('guest', $allowedRoleIds)) return $next($request);
        }
        
        if(Auth::check()) {
            if(auth()->user()->role == 'user') return redirect('/');
            if(auth()->user()->role == 'admin') return redirect('/admin');
        }
        else return redirect('/login');
    }
}
