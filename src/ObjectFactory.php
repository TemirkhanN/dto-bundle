<?php

declare(strict_types=1);

namespace Temirkhan\DataObjectBundle;

use Temirkhan\DataObjectBundle\Exception\ObjectInitError;
use Spatie\DataTransferObject\DataTransferObject;

class ObjectFactory implements ObjectFactoryInterface
{
    public function createDataObject(array $data, string $objectClass): object
    {
        if (!$this->supportsDataObjectClass($objectClass)) {
            throw new ObjectInitError("Unsupported data class");
        }

        try {
            return new $objectClass($data);
        } catch (\Throwable $e) {
            throw new ObjectInitError("Couldn't create object", 0, $e);
        }
    }

    public function supportsDataObjectClass(string $dataObjectClass): bool
    {
        if (is_subclass_of($dataObjectClass, DataTransferObject::class)) {
            return true;
        }

        return false;
    }
}
