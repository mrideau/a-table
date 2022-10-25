<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class CategoriesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Collection::macro('findIdOrOld', function ($id) {
            return $this->map(function ($value) {
                return $value->id;
            })->filter(function ($value) use ($id) {
                return $value == $id;
            });
        });

        Collection::macro('findById', function ($id) {
            return $this->filter(function ($value) use ($id) {
                return $value->id == $id;
            });
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
