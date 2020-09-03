<?php

declare(strict_types=1);

namespace Test\Temirkhan\DataObjectBundle\Fixture;

use Spatie\DataTransferObject\DataTransferObject;

class SomeDto extends DataTransferObject
{
    /**
     * @var string
     */
    public $someProperty;

    /**
     * Fully qualified namespace is required by spatie/dto
     * @var \Test\Temirkhan\DataObjectBundle\Fixture\SomeSubDto
     */
    public $someEmbeddedProperty;

    /**
     * @var \Test\Temirkhan\DataObjectBundle\Fixture\CollectionItemDto[]
     */
    public $collectionItems;
}
