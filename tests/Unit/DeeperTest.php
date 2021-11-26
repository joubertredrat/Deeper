<?php

declare(strict_types=1);

namespace RedRat\Deeper\Tests\Unit;

use PHPUnit\Framework\TestCase;
use RedRat\Deeper\Deeper;

class DeeperTest extends TestCase
{
    public function testIsEqualObjectWithScalarAttributes(): void
    {
        $userOne = new UserFoo("Mrs Foo", 10);
        $userTwo = new UserFoo("Mrs Foo", 10);
        $deeper = new Deeper($userOne, $userTwo);

        self::assertTrue($deeper->isEqual());
    }

    public function testIsEqualObjectWithMixedAttributes(): void
    {
        $productOne = new ProductQux("4ab6c14f", 1006217, new UserFoo("Mrs Foo", 10));
        $productTwo = new ProductQux("4ab6c14f", 1006217, new UserFoo("Mrs Foo", 10));
        $deeper = new Deeper($productOne, $productTwo);

        self::assertTrue($deeper->isEqual());
    }

    public function testIsNotEqualNotSameClass(): void
    {
        $userOne = new UserFoo("Mrs Foo", 10);
        $userTwo = new UserBar("Mrs Foo", 10);
        $deeper = new Deeper($userOne, $userTwo);

        self::assertFalse($deeper->isEqual());
    }

    public function testIsNotEqualNotSameScalarValues(): void
    {
        $userOne = new UserFoo("Mrs Foo", 10);
        $userTwo = new UserBar("Mrs Foo", 15);
        $deeper = new Deeper($userOne, $userTwo);

        self::assertFalse($deeper->isEqual());
    }

    public function testIsNotEqualNotSameScalarValuesIntoObjectAttributes(): void
    {
        $productOne = new ProductQux("4ab6c14f", 1006217, new UserFoo("Mrs Foo", 10));
        $productTwo = new ProductQux("4ab6c14f", 1006217, new UserFoo("Mrs Foo", 15));
        $deeper = new Deeper($productOne, $productTwo);

        self::assertFalse($deeper->isEqual());
    }
}
