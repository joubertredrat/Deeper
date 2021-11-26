<?php

declare(strict_types=1);

namespace RedRat\Deeper\Tests\Unit;

use PHPUnit\Framework\TestCase;
use RedRat\Deeper\Attribute;

class AttributeTest extends TestCase
{
    public function testScalarAttribute(): void
    {
        $nameExected = "age";
        $valueExpected = 10;
        $attribute = new Attribute($nameExected, $valueExpected);

        self::assertEquals($nameExected, $attribute->getName());
        self::assertEquals($valueExpected, $attribute->getValue());
        self::assertFalse($attribute->isObject());
    }

    public function testObjectAttribute(): void
    {
        $nameExected = "user";
        $valueExpected = new UserFoo("Mrs Foo", 10);
        $attribute = new Attribute($nameExected, $valueExpected);

        self::assertEquals($nameExected, $attribute->getName());
        self::assertEquals($valueExpected, $attribute->getValue());
        self::assertTrue($attribute->isObject());
    }
}
