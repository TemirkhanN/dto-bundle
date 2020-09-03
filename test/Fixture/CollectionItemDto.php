<?php

declare(strict_types=1);

namespace Test\Temirkhan\DataObjectBundle\Fixture;

use Spatie\DataTransferObject\DataTransferObject;

class CollectionItemDto extends DataTransferObject
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var float
     */
    public $order;
}
