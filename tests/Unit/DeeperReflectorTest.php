<?php

declare(strict_types=1);

namespace RedRat\Deeper\Tests\Unit;

use PHPUnit\Framework\TestCase;
use RedRat\Deeper\DeeperReflector;

class DeeperReflectorTest extends TestCase
{
    public function testGetScalarAttributes(): void
    {
        $attributesExpected = ["name" => "Mrs Foo", "age" => 10];
        $userOne = new UserFoo("Mrs Foo", 10);

        $deeperReflector = new DeeperReflector($userOne);
        $attributesGot = $deeperReflector->getScalarAttributes();
        self::assertEquals($attributesExpected, $attributesGot);
        self::assertTrue($deeperReflector->hasScalarAttributes());
        self::assertFalse($deeperReflector->hasObjectAttributes());
    }

    public function testGetObjectAttributes(): void
    {
        $sourceUser = new UserFoo("Mrs Foo", 10);
        $destinationUser = new UserBar("Sir Bar", 15);
        $usersBaz = new UsersBaz($sourceUser, $destinationUser);
        $attributesExpected = ["sourceUser" => $sourceUser, "destinationUser" => $destinationUser];

        $deeperReflector = new DeeperReflector($usersBaz);
        $attributesGot = $deeperReflector->getObjectAttributes();
        self::assertEquals($attributesExpected, $attributesGot);
        self::assertFalse($deeperReflector->hasScalarAttributes());
        self::assertTrue($deeperReflector->hasObjectAttributes());
    }

    public function testGetMixedAttributes(): void
    {
        $user = new UserFoo("Mrs Foo", 10);
        $productQux = new ProductQux("4ab6c14f", 1006217, $user);
        $attributesScalarExpected = ["clientId" => "4ab6c14f", "sku" => 1006217];
        $attributesObjectExpected = ["user" => $user];

        $deeperReflector = new DeeperReflector($productQux);
        $attributesScalarGot = $deeperReflector->getScalarAttributes();
        $attributesObjectGot = $deeperReflector->getObjectAttributes();
        self::assertEquals($attributesScalarExpected, $attributesScalarGot);
        self::assertEquals($attributesObjectExpected, $attributesObjectGot);
        self::assertTrue($deeperReflector->hasScalarAttributes());
        self::assertTrue($deeperReflector->hasObjectAttributes());
    }

    public function testGetMixedAttributesObjectWithParentClass(): void
    {
        $user = new UserLittleFoo(
            "Mrs Foo",
            10,
            "Brazil",
            new \DateTimeImmutable("2021-11-27 09:00:00")
        );

        $attributesScalarExpected = ["name" => "Mrs Foo", "age" => 10, "location" => "Brazil"];
        $attributesObjectExpected = ["loginDate" => new \DateTimeImmutable("2021-11-27 09:00:00")];

        $deeperReflector = new DeeperReflector($user);
        $attributesScalarGot = $deeperReflector->getScalarAttributes();
        $attributesObjectGot = $deeperReflector->getObjectAttributes();
        self::assertEquals($attributesScalarExpected, $attributesScalarGot);
        self::assertEquals($attributesObjectExpected, $attributesObjectGot);
        self::assertTrue($deeperReflector->hasScalarAttributes());
        self::assertTrue($deeperReflector->hasObjectAttributes());
    }
}
