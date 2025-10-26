<?php

namespace Xactyl\Http\Requests\Api\Client\Servers\Files;

use Xactyl\Models\Permission;
use Xactyl\Contracts\Http\ClientPermissionsRequest;
use Xactyl\Http\Requests\Api\Client\ClientApiRequest;

class CopyFileRequest extends ClientApiRequest implements ClientPermissionsRequest
{
    public function permission(): string
    {
        return Permission::ACTION_FILE_CREATE;
    }

    public function rules(): array
    {
        return [
            'location' => 'required|string',
        ];
    }
}
