<?php

namespace PUGX\ShortidDoctrineBundle\Generator;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Id\AbstractIdGenerator;
use PUGX\Shortid\Shortid;

class ShortidGenerator extends AbstractIdGenerator
{
    /**
     * {@inheritdoc}
     */
    public function generate(EntityManager $em, $entity)
    {
        return Shortid::generate();
    }
}
