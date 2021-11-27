<?php

declare(strict_types=1);

namespace RedRat\Deeper\Tests\Unit;

class UserLittleFoo extends UserFoo
{
    private string $location;
    private \DateTimeImmutable $loginDate;

    public function __construct(string $name, int $age, string $location, \DateTimeImmutable $loginDate)
    {
        parent::__construct($name, $age);
        $this->location = $location;
        $this->loginDate = $loginDate;
    }
}
