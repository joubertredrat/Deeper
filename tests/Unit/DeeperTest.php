<?php

declare(strict_types=1);

namespace RedRat\Deeper\Tests\Unit;

use PHPUnit\Framework\TestCase;
use RedRat\Deeper\Deeper;

class DeeperTest extends TestCase
{
    public function testIsEqual(): void
    {
        $deeper = new Deeper();

        self::assertTrue($deeper->isEqual());
    }
}
