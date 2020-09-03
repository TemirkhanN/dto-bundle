<?php

declare(strict_types=1);

namespace Temirkhan\DataObjectBundle;

use Temirkhan\DataObjectBundle\Exception\ObjectInitError;

interface ObjectFactoryInterface
{
    /**
     * Instantiates data object
     * @param array  $data
     * @param string $objectClass class<T>
     *
     * @return object object<T>
     *
     * @throws ObjectInitError
     */
    public function createDataObject(array $data, string $objectClass): object;

    /**
     * @param string $dataObjectClass
     *
     * @return bool
     */
    public function supportsDataObjectClass(string $dataObjectClass): bool;
}
