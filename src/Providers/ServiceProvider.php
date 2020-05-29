<?php

namespace EPSJV\Acl\Providers;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->publishes([
            __DIR__."/../database/seeds/AclPapelPermissaoTableSeeder.php" => database_path("seeds/AclPapelPermissaoTableSeeder.php"),
            __DIR__."/../database/seeds/AclPapelTableSeeder.php" => database_path("seeds/AclPapelTableSeeder.php"),
            __DIR__."/../database/seeds/AclPapelUserTableSeeder.php" => database_path("seeds/AclPapelUserTableSeeder.php"),
            __DIR__."/../database/seeds/AclPermissaoTableSeeder.php" => database_path("seeds/AclPermissaoTableSeeder.php"),
        ]);
    }

    public function register()
    {
        $this->app->register(\EPSJV\Acl\Providers\AuthServiceProvider::class);
    }
}   