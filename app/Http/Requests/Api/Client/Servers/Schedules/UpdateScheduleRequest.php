<?php

namespace Xactyl\Http\Requests\Api\Client\Servers\Schedules;

use Xactyl\Models\Permission;

class UpdateScheduleRequest extends StoreScheduleRequest
{
    public function permission(): string
    {
        return Permission::ACTION_SCHEDULE_UPDATE;
    }
}
