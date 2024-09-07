<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\HttpClient\HttplugClient;
use Typesense\Client;

class SearchProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Client::class, function ($app) {
            $client = new Client(
                [
                    'api_key' => '8LoupEdVCIx8fYIxGJIGykvn7PxgqOz8',
                    'nodes' => [
                        [
                            'host' => '4bjulqyz0icdxpkfp-1.a1.typesense.net',
                            'port' => '443',
                            'protocol' => 'https',
                        ],
                    ],
                    'client' => new HttplugClient(),
                ]
            );
            return $client;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
