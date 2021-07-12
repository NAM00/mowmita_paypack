<?php

namespace mowmita\sp2;

use Illuminate\Support\ServiceProvider;

class Sp2ServiceProvider extends ServiceProvider
{
    public function boot()
    {
        include __DIR__ . '/routes.php';
    }
    public function register()
    {
        $this->app->make('mowmita\sp2\sp2Controller');
        $this->loadViewsFrom(__DIR__.'/views', 'sp2');

    }


}
