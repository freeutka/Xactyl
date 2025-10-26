<?php

namespace Xactyl\Events\Auth;

use Xactyl\Models\User;
use Xactyl\Events\Event;

class ProvidedAuthenticationToken extends Event
{
    public function __construct(public User $user, public bool $recovery = false)
    {
    }
}
