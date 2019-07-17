<?php

namespace PUGX\ShortidDoctrineBundle\Tests\DependencyInjection;

use PHPUnit\Framework\TestCase;
use PUGX\ShortidDoctrineBundle\DependencyInjection\Configuration;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

final class ConfigurationTest extends TestCase
{
    public function testThatCanGetConfigTreeBuilder(): void
    {
        $configuration = new Configuration();
        $this->assertInstanceOf(TreeBuilder::class, $configuration->getConfigTreeBuilder());
    }
}
