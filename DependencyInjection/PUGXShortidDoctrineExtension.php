<?php

namespace PUGX\ShortidDoctrineBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * PUGXShortidDoctrineExtension.
 */
class PUGXShortidDoctrineExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
    }

    public function prepend(ContainerBuilder $container)
    {
        $config = array(
            'dbal' => array('types' => array('shortid' => 'PUGX\Shortid\Doctrine\ShortidType')),
        );
        $container->prependExtensionConfig('doctrine', $config);
    }
}
