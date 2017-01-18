<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(Router $router)
    {
        parent::boot($router);
    }

    public function map(Router $router)
    {
        /**
         * API Router
         */
        $group = [
            'namespace'     => 'App\Http\Controllers\Api',
            'domain'        => env('API_URL', 'api.iats.app')
        ];
        $router->group($group, function ($router) {
            require app_path('Http/Controllers/api-routes.php');
        });

        /**
         * Manager Router
         */
        $group = [
            'namespace'     => 'App\Http\Controllers\Manager',
            'middleware'    => 'web',
        ];
        $router->group($group, function ($router) {
            require app_path('Http/Controllers/manager-routes.php');
        });

        /**
         * Manager Router
         */
        $group = [
            'namespace'     => 'App\Http\Controllers\Web',
            'middleware'    => 'web',
        ];
        $router->group($group, function ($router) {
            require app_path('Http/Controllers/web-routes.php');
        });
    }
}
