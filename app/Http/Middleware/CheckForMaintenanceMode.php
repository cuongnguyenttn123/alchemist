<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Foundation\Application;

use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;

class CheckForMaintenanceMode extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    protected $app;
    protected $list_ip = [
        '::1',
        '1.54.212.220', //fpt nhà
        '123.17.230.22', //vnpt tntechs
        '27.72.165.185', // viettel tntechs 
        '1.55.223.141', //hai
        '222.166.18.210', //jamie
        '58.153.62.252'  //albert
    ];
    public function __construct(Application $app)
    {
        $this->app = $app;
    }
    public function handle($request, Closure $next)
    {
        if ($this->app->isDownForMaintenance() && !in_array($request->ip(), $this->list_ip) ) {
        	return abort(503);
            return response('Website đang bảo trì', 503);
        }
        return $next($request);
    }
    private function isAdminIpAdress($request)
    {
        return !in_array($request->ip(), ['127.0.0.1', '113.175.97.198']);
    }
    private function isAdminRequest($request)
    {
        return ($request->is('admin/*') or $request->is('admin'));
    }
}
