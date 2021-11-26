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

        $reflectionLeft = new DeeperReflector($this->objectLeft);
        $reflectionRight = new DeeperReflector($this->objectRight);

        if ($reflectionLeft->hasScalarAttributes() && $reflectionRight->hasScalarAttributes()) {
            $attributesLeft = $reflectionLeft->getScalarAttributes();
            $attributesRight = $reflectionRight->getScalarAttributes();

            if ($attributesLeft !== $attributesRight) {
                return false;
            }
        }

        if ($reflectionLeft->hasObjectAttributes() && $reflectionRight->hasObjectAttributes()) {
            $attributesLeft = $reflectionLeft->getObjectAttributes();
            $attributesRight = $reflectionRight->getObjectAttributes();

            foreach ($attributesLeft as $nameLeft => $valueLeft) {
                $deeper = new Deeper($valueLeft, $attributesRight[$nameLeft]);
                if (!$deeper->isEqual()) {
                    return false;
                }
            }
        }

        return true;
    }

    private function isSameClass(): bool
    {
        return \get_class($this->objectLeft) === \get_class($this->objectRight);
    }
}
