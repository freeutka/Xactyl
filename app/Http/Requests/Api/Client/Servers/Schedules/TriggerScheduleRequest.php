<?php

namespace Xactyl\Http\Requests\Api\Client\Servers\Schedules;

use Xactyl\Models\Permission;
use Xactyl\Http\Requests\Api\Client\ClientApiRequest;

class TriggerScheduleRequest extends ClientApiRequest
{
    public function permission(): string
    {
        return Permission::ACTION_SCHEDULE_UPDATE;
    }

    public function rules(): array
    {
        return [];
    }
}
