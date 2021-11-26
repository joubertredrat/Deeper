<?php

declare(strict_types=1);

namespace RedRat\Deeper\Tests\Unit;

class ProductQux
{
    protected string $clientId;
    protected int $sku;
    protected UserFoo $user;

    public function __construct(string $clientId, int $sku, UserFoo $user)
    {
        $this->clientId = $clientId;
        $this->sku = $sku;
        $this->user = $user;
    }
}
