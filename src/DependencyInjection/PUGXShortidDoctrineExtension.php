<?php

namespace PUGX\Shortid\Doctrine\Bundle\DependencyInjection;

use PUGX\Shortid\Doctrine\ShortidType;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

final class PUGXShortidDoctrineExtension extends Extension implements PrependExtensionInterface
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        if (!empty($config['global_config'])) {
            $container->setParameter('pugx_shortid_doctrine.length', $config['global_config']['length']);
            $container->setParameter('pugx_shortid_doctrine.alphabet', $config['global_config']['alphabet']);
            $container->setParameter('pugx_shortid_doctrine.readable', $config['global_config']['readable']);
        }
    }

    public function prepend(ContainerBuilder $container): void
    {
        $config = [
            'dbal' => ['types' => ['shortid' => ShortidType::class]],
        ];
        $container->prependExtensionConfig('doctrine', $config);
    }
}
