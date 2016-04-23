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
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        if (!empty($config['global_config'])) {
            $container->setParameter('pugx_shortid_doctrine.length', $config['global_config']['length']);
            $container->setParameter('pugx_shortid_doctrine.alphabet', $config['global_config']['alphabet']);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function prepend(ContainerBuilder $container)
    {
        $config = array(
            'dbal' => array('types' => array('shortid' => 'PUGX\Shortid\Doctrine\ShortidType')),
        );
        $container->prependExtensionConfig('doctrine', $config);
    }
}
