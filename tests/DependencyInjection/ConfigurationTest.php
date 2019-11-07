<?php

namespace PUGX\Shortid\Doctrine\Bundle\Tests\DependencyInjection;

use PHPUnit\Framework\TestCase;
use PUGX\Shortid\Doctrine\Bundle\DependencyInjection\Configuration;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

final class ConfigurationTest extends TestCase
{
    public function testThatCanGetConfigTreeBuilder(): void
    {
        $configuration = new Configuration();
        $this->assertInstanceOf(TreeBuilder::class, $configuration->getConfigTreeBuilder());
    }
}
