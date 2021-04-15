<?php

namespace App\Http\Middleware;

use App\Domain\General\Users\UserResion\Actions\RecordUserRegionAction;
use App\Domain\General\Users\UserResion\DTO\UserRegionDTO;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class where_am_i
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
        $request->json()->add(['ip' => $request->ip()]);
        return $next($request);
    }
}
