# Documentation

## Installation

Run from a terminal:

```bash
composer require pugx/shortid-doctrine-bundle
```

The bundle should be automatically enabled and configured by Flex.
If not, remember to enable the bundle in you kernel.

## Usage

You can use the `shortid` type in your entity.
Example:

```php
<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use PUGX\Shortid\Doctrine\Generator\ShortidGenerator;

#[ORM\Entity]
#[ORM\Table]
class Book
{
    #[ORM\Column(type: 'shortid')
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')
    #[ORM\CustomIdGenerator(class: ShortidGenerator::class)
    protected $id;
}
```

## Optional configuration

If you want to globally configure ShortId, you can set a configuration like in this example:

```yaml
pugx_shortid_doctrine:
    global_config:
        length: 8
        alphabet: "é123456789àbcdefghìjklmnòpqrstùvwxyzABCDEFGHIJKLMNOPQRSTUVWX.!@|"
```

The `length` option must be between 2 and 20 (the default value is 7), while the `alphabet` must be 64 characters long.

>Be aware: if you change the `length` in this way, you **must** specify the `length` option in every column definition.
>Moreover, you'll need to manually set the column definition for ManyToOne mappings.
>For example: `<join-column column-definition="CHAR(8) COLLATE utf8_bin NOT NULL"/>`

You can also configure the `readable` option instead of `alphabet`. Example:

```yaml
pugx_shortid_doctrine:
    global_config:
        readable: true
```

