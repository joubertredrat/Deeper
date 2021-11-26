<?php

declare(strict_types=1);

namespace RedRat\Deeper;

interface DeeperReflectorInterface
{
    public function hasScalarAttributes(): bool;

    public function getScalarAttributes(): array;

    public function hasObjectAttributes(): bool;

    public function getObjectAttributes(): array;
}
