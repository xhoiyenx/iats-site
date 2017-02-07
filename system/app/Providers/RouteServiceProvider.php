<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(Router $router)
    {
        parent::boot($router);

        /**
         * Explicit binding route model variable
         */
        $router->model('article', 'Model\Article');
        $router->model('brand', 'Model\Brand');
        $router->model('color', 'Model\Color');
        $router->model('product', 'Model\Product');
        $router->model('product_detail', 'Model\ProductDetail');
        $router->model('product_media', 'Model\ProductMedia');
        $router->model('product_unit', 'Model\ProductUnit');
        $router->model('manager', 'Model\Manager');
        $router->model('member', 'Model\Member');
        $router->model('post', 'Model\Post');
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
            'prefix'        => 'manager'
        ];
        $router->group($group, function ($router) {
            require app_path('Http/Controllers/manager-routes.php');
        });

        /**
         * Manager Router
         */
        $group = [
            'namespace'     => 'App\Http\Controllers\Web',
            'as'            => 'www.'
        ];
        $router->group($group, function ($router) {
            require app_path('Http/Controllers/web-routes.php');
        });
    }
}
