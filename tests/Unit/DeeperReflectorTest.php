<?php

declare(strict_types=1);

namespace RedRat\Deeper\Tests\Unit;

use PHPUnit\Framework\TestCase;
use RedRat\Deeper\DeeperReflector;

class DeeperReflectorTest extends TestCase
{
    public function testGetAttributes(): void
    {
        $attributesExpected = ["name" => "Mrs Foo", "age" => 10];

        $userOne = new UserFoo("Mrs Foo", 10);
        $deeperReflector = new DeeperReflector($userOne);

        $attributesGot = $deeperReflector->getAttributes();
        self::assertEquals($attributesExpected, $attributesGot);
    }
}
