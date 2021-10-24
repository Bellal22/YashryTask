<?php

namespace App\Providers;

use App\Interfaces\OfferInterface;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\InvoiceRepository;
use App\Repository\EloquentRepositoryInterface;
use App\Repository\InvoiceRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //$this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(InvoiceRepositoryInterface::class, InvoiceRepository::class);
        //$this->app->when(InvoiceRepository::class)
        //    ->needs(OfferInterface::class)
        //    ->give(function () {
        //        return new GoodFoo();
        //    });
        //
        //
        //$this->app->when(BadController::class)
        //    ->needs(FooInterface::class)
        //    ->give(function () {
        //        return new BadFoo();
        //    });
    }
}
