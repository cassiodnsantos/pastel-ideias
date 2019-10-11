<?php

namespace App\Providers;

use App\Models\Order;
use App\Observers\OrderObserver;
use App\Repositories\Core\Eloquent\ClientEloquentRepository;
use App\Repositories\Core\Eloquent\PastryEloquentRepository;
use App\Repositories\Core\Eloquent\OrderEloquentRepository;
use App\Repositories\Interfaces\ClientInterfaceRepository;
use App\Repositories\Interfaces\PastryInterfaceRepository;
use App\Repositories\Interfaces\OrderInterfaceRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            ClientInterfaceRepository::class,
            ClientEloquentRepository::class
        );

        $this->app->bind(
            PastryInterfaceRepository::class,
            PastryEloquentRepository::class
        );
        $this->app->bind(
            OrderInterfaceRepository::class,
            OrderEloquentRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        Order::observe(OrderObserver::class);
    }
}
