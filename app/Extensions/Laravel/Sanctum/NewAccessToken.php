<?php

namespace Xactyl\Extensions\Laravel\Sanctum;

use Xactyl\Models\ApiKey;
use Laravel\Sanctum\NewAccessToken as SanctumAccessToken;

/**
 * @property \Xactyl\Models\ApiKey $accessToken
 */
class NewAccessToken extends SanctumAccessToken
{
    /**
     * NewAccessToken constructor.
     *
     * @noinspection PhpMissingParentConstructorInspection
     */
    public function __construct(ApiKey $accessToken, string $plainTextToken)
    {
        $this->accessToken = $accessToken;
        $this->plainTextToken = $plainTextToken;
    }
}
