<?php

declare(strict_types=1);

namespace RedRat\Deeper\Tests\Unit;

class UsersBaz
{
    private UserFoo $sourceUser;
    private UserBar $destinationUser;

    public function __construct(UserFoo $sourceUser, UserBar $destinationUser)
    {
        $this->sourceUser = $sourceUser;
        $this->destinationUser = $destinationUser;
    }
}
