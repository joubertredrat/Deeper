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

    public function getScalarAttributes(): array
    {
        return $this->scalarAttributes;
    }

    public function getObjectAttributes(): array
    {
        return $this->objectAttributes;
    }

    public function hasScalarAttributes(): bool
    {
        return \count($this->scalarAttributes) > 0;
    }

    public function hasObjectAttributes(): bool
    {
        return \count($this->objectAttributes) > 0;
    }

    private function processAttributes(): void
    {
        $this->scalarAttributes = [];
        $this->objectAttributes = [];

        $reflectionObject = new \ReflectionObject($this->object);

        foreach ($reflectionObject->getProperties() as $reflectionAttribute) {
            $reflectionAttribute->setAccessible(true);
            $value = $reflectionAttribute->getValue($this->object);

            if (\is_object($value)) {
                $this->objectAttributes[$reflectionAttribute->getName()] = $value;
                continue;
            }

            $this->scalarAttributes[$reflectionAttribute->getName()] = $value;
        }
    }
}
