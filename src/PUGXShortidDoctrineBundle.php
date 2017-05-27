<?php

namespace PUGX\ShortidDoctrineBundle;

use PUGX\Shortid\Factory;
use PUGX\Shortid\Shortid;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class PUGXShortidDoctrineBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        if ($this->container->hasParameter('pugx_shortid_doctrine.length')) {
            $factory = new Factory();
            $factory->setLength($this->container->getParameter('pugx_shortid_doctrine.length'));
            $alphabet = $this->container->getParameter('pugx_shortid_doctrine.alphabet');
            if (!empty($alphabet)) {
                $factory->setAlphabet($alphabet);
            }
            Shortid::setFactory($factory);
        }
    }
}
