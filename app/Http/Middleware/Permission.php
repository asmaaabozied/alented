<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Flash;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $request_permission)
    {
        // dd($request_permission);
        $user = Auth::user();

        if(isset($user)){
            $role = $user->role;
            if(isset($role)){
                foreach($role->permissions as $permission){
                    if(\strcasecmp($permission->name, $request_permission) == 0){
                        return $next($request);
                    }                    
                }
            }
        }

        // Flash::error("Access Denied, You are not allowed to access this page.");
        
        abort(403, 'Unauthorized action.');
    }
}
