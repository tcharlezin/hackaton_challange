<?php

namespace App\Providers;

use App;
use Illuminate\Support\ServiceProvider;

class FacadeServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        App::bind('admin',function() {
            return new App\Dominio\Facade\AdminFacade();
        });

        App::bind('site',function() {
            return new App\Dominio\Facade\SiteFacade();
        });

        App::bind('shop',function() {
            return new App\Dominio\Facade\ShopFacade();
        });
    }
}
