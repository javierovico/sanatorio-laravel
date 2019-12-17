<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = 'admin'){
        if($role == 'admin' && $request->user()->isAdmin()){
            return $next($request);
        }else if($role == 'doctor' && $request->user()->isDoctor()){
            return $next($request);
        }
        return response()->json(['error' => 'no tenes permiso para realizar esta accion'],403);
    }
}
