<?php

declare(strict_types=1);

namespace RedRat\Deeper\Tests\Unit;

use PHPUnit\Framework\TestCase;
use RedRat\Deeper\Deeper;

class DeeperTest extends TestCase
{
    public function testIsEqual(): void
    {
        $userOne = new UserFoo("Mrs Foo", 10);
        $userTwo = new UserFoo("Mrs Foo", 10);
        $deeper = new Deeper($userOne, $userTwo);

        self::assertTrue($deeper->isEqual());
    }

    public function testIsNotEqualNotSameClass(): void
    {
        $userOne = new UserFoo("Mrs Foo", 10);
        $userTwo = new UserBar("Mrs Foo", 10);
        $deeper = new Deeper($userOne, $userTwo);

        self::assertFalse($deeper->isEqual());
    }
}
