<?php

namespace Chronostep\Chronoslack;

use Illuminate\Support\ServiceProvider;
use Chronostep\Chronobrowserplatform\Services\BrowserPlatformDetection;

class BPDetectServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // 
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BrowserPlatformDetection::class);
    }
}
