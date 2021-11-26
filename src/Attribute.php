<?php

declare(strict_types=1);

namespace RedRat\Deeper;

class Attribute
{
    private string $name;
    /** @todo PHP 8.0.0 add mixed type */
    private $value;

    public function __construct(string $name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function isObject(): bool
    {
        return \is_object($this->value);
    }
}
