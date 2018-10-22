<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Module;
use View;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $menu_functions = Module::getListMenuFunction();
        $menu_managers = Module::getListMenuManager();
        $menu_plugins = Module::getListMenuPlugin();

        View::share('menu_functions', $menu_functions);
        View::share('menu_managers', $menu_managers);
        View::share('menu_plugins', $menu_plugins);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
