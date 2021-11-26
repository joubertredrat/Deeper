<?php

declare(strict_types=1);

namespace RedRat\Deeper;

class Deeper implements DeeperInterface
{
    private object $objectLeft;
    private object $objectRight;

    public function __construct(object $objectLeft, object $objectRight)
    {
        $this->objectLeft = $objectLeft;
        $this->objectRight = $objectRight;
    }

    public function isEqual(): bool
    {
        if (!$this->isSameClass()) {
            return false;
        }

        return true;
    }

    private function isSameClass(): bool
    {
        return \get_class($this->objectLeft) === \get_class($this->objectRight);
    }
}
