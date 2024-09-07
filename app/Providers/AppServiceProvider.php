<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use App\View\Composers\TodoComposer;
use Illuminate\Support\Facades;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
    public $singletons = [
        TypesenseClient\TypesenseClient::class => PingdomDowntimeNotifier::class,
        ServerProvider::class => ServerToolsProvider::class,
    ];
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Facades\View::composer('todo', TodoComposer::class);
    }
}
