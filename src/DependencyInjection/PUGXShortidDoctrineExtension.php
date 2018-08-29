<?php

namespace PUGX\ShortidDoctrineBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class PUGXShortidDoctrineExtension extends Extension implements PrependExtensionInterface
{

    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        if (!empty($config['global_config'])) {
            $container->setParameter('pugx_shortid_doctrine.length', $config['global_config']['length']);
            $container->setParameter('pugx_shortid_doctrine.alphabet', $config['global_config']['alphabet']);
        }
    }

    public function prepend(ContainerBuilder $container): void
    {
        $config = [
            'dbal' => ['types' => ['shortid' => 'PUGX\Shortid\Doctrine\ShortidType']],
        ];
        $container->prependExtensionConfig('doctrine', $config);
    }
}
