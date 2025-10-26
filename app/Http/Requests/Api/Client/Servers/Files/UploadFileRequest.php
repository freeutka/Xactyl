<?php

namespace Xactyl\Http\Requests\Api\Client\Servers\Files;

use Xactyl\Models\Permission;
use Xactyl\Http\Requests\Api\Client\ClientApiRequest;

class UploadFileRequest extends ClientApiRequest
{
    public function permission(): string
    {
        return Permission::ACTION_FILE_CREATE;
    }
}
