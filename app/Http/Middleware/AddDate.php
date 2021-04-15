<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Console\Concerns\HasParameters;
use Illuminate\Http\Request;

class AddDate
{
    use HasParameters;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $source
     * @return mixed
     */
    public function handle(Request $request, Closure $next,string $source)
    {
        if($source == 'wanted_product')
            $request->json()->add(['wanted_date' => now()]);
        return $next($request);
    }
}
