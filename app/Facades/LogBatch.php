<?php

namespace Xactyl\Facades;

use Illuminate\Support\Facades\Facade;
use Xactyl\Services\Activity\ActivityLogBatchService;

class LogBatch extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ActivityLogBatchService::class;
    }
}
