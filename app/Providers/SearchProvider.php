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
                    'api_key' => '<API Key>',
                    'nodes' => [
                        [
                            'host' => '<Typesense Host>',
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
