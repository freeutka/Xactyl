<?php

namespace Xactyl\Http\Requests\Api\Client\Servers\Backups;

use Xactyl\Models\Permission;
use Xactyl\Http\Requests\Api\Client\ClientApiRequest;

class RestoreBackupRequest extends ClientApiRequest
{
    public function permission(): string
    {
        return Permission::ACTION_BACKUP_RESTORE;
    }

    public function rules(): array
    {
        return ['truncate' => 'required|boolean'];
    }
}
