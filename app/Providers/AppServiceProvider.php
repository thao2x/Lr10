<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $serviceBindings = [
        'App\Services\Interfaces\UserServiceInterface' => 'App\Services\UserService',
        'App\Repositories\Interfaces\UserRepositoryInterface' => 'App\Repositories\UserRepository',
        'App\Services\Interfaces\ProvinceServiceInterface' => 'App\Services\ProvinceService',
        'App\Repositories\Interfaces\ProvinceRepositoryInterface' => 'App\Repositories\ProvinceRepository',
        'App\Services\Interfaces\DistrictServiceInterface' => 'App\Services\DistrictService',
        'App\Repositories\Interfaces\DistrictRepositoryInterface' => 'App\Repositories\DistrictRepository',
        'App\Services\Interfaces\WardServiceInterface' => 'App\Services\WardService',
        'App\Repositories\Interfaces\WardRepositoryInterface' => 'App\Repositories\WardRepository',
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this -> serviceBindings as $key => $val) {
            $this->app->bind($key, $val);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        DB::listen(function ($query) {
            Log::channel('database')->debug("=======================================================");
            Log::channel('database')->debug("SQL     : " . $query->sql);
            Log::channel('database')->debug("BINDINGS: " . implode(', ', $query->bindings));
            Log::channel('database')->debug("TIME    : " . $query->time . 'ms');
            Log::channel('database')->debug("=======================================================");
        });
    }
}
