<?php

namespace Xactyl\Exceptions\Service\Database;

use Xactyl\Exceptions\PterodactylException;

class DatabaseClientFeatureNotEnabledException extends PterodactylException
{
    public function __construct()
    {
        parent::__construct('Client database creation is not enabled in this Panel.');
    }
}
