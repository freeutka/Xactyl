<?php

namespace Xactyl\Exceptions\Service\Database;

use Xactyl\Exceptions\XactylException;

class DatabaseClientFeatureNotEnabledException extends XactylException
{
    public function __construct()
    {
        parent::__construct('Client database creation is not enabled in this Panel.');
    }
}
