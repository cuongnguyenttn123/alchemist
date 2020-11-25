<?php
/**
* @author khaihoangdev@gmail.com
* @desc caching demo
* @return 
* @time 09h:18/12/2018
*/
namespace App\Http\Middleware;

use Closure;

class BossCache
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
        // return $next($request);
    }
}
