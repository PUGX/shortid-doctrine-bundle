<?php

namespace PUGX\Shortid\Doctrine\Bundle;

use PUGX\Shortid\Factory;
use PUGX\Shortid\Shortid;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class PUGXShortidDoctrineBundle extends Bundle
{
    public function boot(): void
    {
        $prfx = 'pugx_shortid_doctrine.';
        $factory = new Factory();
        if ($this->container->hasParameter($prfx.'length')) {
            $factory->setLength($this->container->getParameter($prfx.'length'));
        }
        $alphabet = '';
        if ($this->container->hasParameter($prfx.'readable') && true === $this->container->getParameter($prfx.'readable')) {
            $factory->setReadable(true);
        } elseif ($this->container->hasParameter($prfx.'alphabet')) {
            $alphabet = $this->container->getParameter($prfx.'alphabet');
        }
        if (!empty($alphabet)) {
            $factory->setAlphabet($alphabet);
        }
        Shortid::setFactory($factory);
    }

    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
