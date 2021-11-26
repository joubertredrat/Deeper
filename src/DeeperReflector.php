<?php

declare(strict_types=1);

namespace RedRat\Deeper;

class DeeperReflector implements DeeperReflectorInterface
{
    private object $object;

    public function __construct(object $object)
    {
        $this->object = $object;
    }

    public function getAttributes(): array
    {
        $reflectionObject = new \ReflectionObject($this->object);
        $attributes = [];

        foreach ($reflectionObject->getProperties() as $reflectionAttribute) {
            $reflectionAttribute->setAccessible(true);
            $attributes[$reflectionAttribute->getName()] = $reflectionAttribute->getValue($this->object);
        }

        return $attributes;
    }
}
