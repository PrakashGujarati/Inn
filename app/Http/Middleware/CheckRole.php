<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $nextController = $request->route()->getAction('controller');
        $userPermissions = $request->user()->role->permissions()->pluck('name')->toArray();

        if (!$request->user()->role->is_admin && !in_array($nextController, $userPermissions)) {
            return redirect('/home');
        }
         return $next($request);
    }
}
