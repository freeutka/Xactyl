<?php

namespace Xactyl\Exceptions\Service\Allocation;

use Xactyl\Exceptions\DisplayException;

class NoAutoAllocationSpaceAvailableException extends DisplayException
{
    /**
     * NoAutoAllocationSpaceAvailableException constructor.
     */
    public function __construct()
    {
        parent::__construct(
            'Cannot assign additional allocation: no more space available on node.'
        );
    }
}
