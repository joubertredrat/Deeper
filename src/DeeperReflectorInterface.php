<?php

declare(strict_types=1);

namespace RedRat\Deeper;

interface DeeperReflectorInterface
{
    public function getScalarAttributes(): array;

    public function getObjectAttributes(): array;

    public function hasScalarAttributes(): bool;

    public function hasObjectAttributes(): bool;
}
