# dto-bundle
DTO structures handler for symfony


## Installation

```bash
$ composer require temirkhan/dto-bundle
```

Include bundle in your config

```php
// config/bundles.php
return [
    \Temirkhan\DataObjectBundle\DataObjectBundle::class => ['all' => true],
];
```

## Usage

```php
<?php

use Spatie\DataTransferObject\DataTransferObject;

class RegistrationDto extends DataTransferObject
{
    /** @var string */
    public $login;
    
    /** @var string */
    public $password;

}

class RegistrationController
{
    public function __invoke(RegistrationDto $registration): JsonResponse
    {
        // Data is filled from Request::$request(or content if json) and ready for usage
        // Resolver will fail with BadRequest response if type or field mismatch.
        
        // Normally one needs validation so feel free using constraint annotations in dto
        // and validate dto here via symfony validator
    }
}

```