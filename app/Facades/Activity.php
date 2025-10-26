<?php

namespace Xactyl\Facades;

use Illuminate\Support\Facades\Facade;
use Xactyl\Services\Activity\ActivityLogService;

class Activity extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ActivityLogService::class;
    }
}
