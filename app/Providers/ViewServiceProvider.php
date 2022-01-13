<?php

namespace App\Providers;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\ServiceProvider;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['admins.fields'], function ($view) {
            $roleItems = Role::pluck('name','id')->toArray();
            $view->with('roleItems', $roleItems);
        });
        View::composer(['roles.fields'], function ($view){
            $permissionItems = Permission::pluck('name', 'id')->toArray();
            $view->with('permissionItems', $permissionItems);
        });
    }
}