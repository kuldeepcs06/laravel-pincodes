<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\readLargeCSV;

class ReadLargeFileServiceProvider extends ServiceProvider {

    public function register() {
        
         $this->app->singleton(readLargeCSV::class, function ($app) {
            return new readLargeCSV(storage_path('app/all_india_pin_code.csv'));
        });
    }

}
