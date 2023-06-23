<?php

namespace Chronostep\Chronobrowserplatform\Facades;

use Illuminate\Support\Facades\Facade;
use Chronostep\Chronobrowserplatform\Services\BrowserPlatformDetection;

class BPDetect extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return BrowserPlatformDetection::class;
    }
}
