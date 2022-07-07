<?php

namespace App\Providers;

use App\Repositories\SeriesRepository;
use App\Repositories\EloquentSeriesRepository;
use Illuminate\Support\ServiceProvider;

class SeriesRepositoryProvider extends ServiceProvider
{
    public array $bindings = [
        SeriesRepository::class => EloquentSeriesRepository::class
    ];
    // /**
    //  * Register services.
    //  *
    //  * @return void
    //  */
    // public function register()
    // {
    //     $this->app->bind(SeriesRepository::class, EloquentSeriesRepository::class);
    // }
}
