<?php

namespace Xactyl\Exceptions\Http\Server;

use Xactyl\Exceptions\DisplayException;

class FileSizeTooLargeException extends DisplayException
{
    /**
     * FileSizeTooLargeException constructor.
     */
    public function __construct()
    {
        parent::__construct('The file you are attempting to open is too large to view in the file editor.');
    }
}
