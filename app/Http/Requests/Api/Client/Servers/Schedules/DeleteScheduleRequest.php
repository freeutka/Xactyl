<?php

namespace Xactyl\Http\Requests\Api\Client\Servers\Schedules;

use Xactyl\Models\Permission;

class DeleteScheduleRequest extends ViewScheduleRequest
{
    public function permission(): string
    {
        return Permission::ACTION_SCHEDULE_DELETE;
    }
}
