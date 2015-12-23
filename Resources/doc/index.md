Documentation
=============

## Installation

Run from terminal:

```bash
$ composer require pugx/shortid-doctrine-bundle
```

Enable bundle in the kernel:

```php
<?php
// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
        // ...
        new PUGX\ShortidDoctrineBundle\PUGXShortidDoctrineBundle(),
    );
}
```

## Usage

You can use the ``shortid`` type in your entity.
Example:

```php
<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table()
 */
class Book
{
    /**
     * @var string
     *
     * @ORM\Column(type="shortid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="PUGX\ShortidDoctrineBundle\Generator\ShortidGenerator")
     */
    protected $id;
}
```
