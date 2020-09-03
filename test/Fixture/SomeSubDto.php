<?php

declare(strict_types=1);

namespace Test\Temirkhan\DataObjectBundle\Fixture;

use Spatie\DataTransferObject\DataTransferObject;

class SomeSubDto extends DataTransferObject
{
    /**
     * @var int
     */
    public $property1;

    /**
     * @var string
     */
    public $property2;
}
