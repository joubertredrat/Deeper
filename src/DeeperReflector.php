<?php

declare(strict_types=1);

namespace RedRat\Deeper;

class DeeperReflector implements DeeperReflectorInterface
{
    private object $object;
    private array $scalarAttributes;
    private array $objectAttributes;

    public function __construct(object $object)
    {
        $this->object = $object;
        $this->processAttributes();
    }

    public function hasScalarAttributes(): bool
    {
        return \count($this->scalarAttributes) > 0;
    }

    public function getScalarAttributes(): array
    {
        return $this->scalarAttributes;
    }

    public function hasObjectAttributes(): bool
    {
        return \count($this->objectAttributes) > 0;
    }

    public function getObjectAttributes(): array
    {
        return $this->objectAttributes;
    }

    private function processAttributes(): void
    {
        $attributes = $this->getAllAttributes(new \ReflectionObject($this->object));

        $this->scalarAttributes = [];
        $this->objectAttributes = [];

        foreach ($attributes as $name => $value) {
            if (\is_object($value)) {
                $this->objectAttributes[$name] = $value;
                continue;
            }

            $this->scalarAttributes[$name] = $value;
        }
    }

    private function getAllAttributes(\ReflectionClass $reflectionClass): array
    {
        $attributes = [];

        if ($reflectionClass->getParentClass() instanceof \ReflectionClass) {
            $attributes = \array_merge($attributes, $this->getAllAttributes($reflectionClass->getParentClass()));
        }

        foreach ($reflectionClass->getProperties() as $reflectionAttribute) {
            $reflectionAttribute->setAccessible(true);
            $attributes[$reflectionAttribute->getName()] = $reflectionAttribute->getValue($this->object);
        }

        return $attributes;
    }
}
