<?php

namespace PUGX\ShortidDoctrineBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Configuration.
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('pugx_shortid_doctrine');

        $rootNode
            ->children()
                ->arrayNode('global_config')
                    ->children()
                        ->scalarNode('length')
                            ->defaultValue(7)
                        ->end()
                        ->scalarNode('alphabet')
                            ->defaultNull()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
