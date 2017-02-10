<?php

namespace PUGX\ShortidDoctrineBundle\Tests\DependencyInjection;

use PHPUnit\Framework\TestCase;
use PUGX\ShortidDoctrineBundle\DependencyInjection\Configuration;

class ConfigurationTest extends TestCase
{
    public function testThatCanGetConfigTreeBuilder()
    {
        $configuration = new Configuration();
        $this->assertInstanceOf('Symfony\Component\Config\Definition\Builder\TreeBuilder', $configuration->getConfigTreeBuilder());
    }
}
