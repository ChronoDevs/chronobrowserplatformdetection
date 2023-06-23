<?php

namespace Chronostep\Chronoslack\Facades;

use Illuminate\Support\Facades\Facade;
use Chronostep\Chronobrowserplatform\Services;

class BPDetect extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return BrowserPlatformDetection::class;
    }
}
