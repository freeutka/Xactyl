<?php

namespace Xactyl\Facades;

use Illuminate\Support\Facades\Facade;
use Xactyl\Services\Activity\ActivityLogTargetableService;

class LogTarget extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ActivityLogTargetableService::class;
    }
}
