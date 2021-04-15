<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddAuthorId
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $request->json()->add(['created_by_user_id' => Auth::id()]);
        $request->json()->add(['user_id' => Auth::id()]);
        $request->json()->add(['updated_by_user_id' => Auth::id()]);
        $request->json()->add(['deleted_by_user_id' => Auth::id()]);

        return $next($request);
    }
}
