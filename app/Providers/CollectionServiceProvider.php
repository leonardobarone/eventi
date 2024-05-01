<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class CollectionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Collection::macro('offsetExists', function ($key) {
            return $this->has($key);
        });
    }
}