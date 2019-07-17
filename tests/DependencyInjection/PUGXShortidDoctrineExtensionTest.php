<?php

namespace PUGX\ShortidDoctrineBundle\Tests\DependencyInjection;

use PHPUnit\Framework\TestCase;
use PUGX\ShortidDoctrineBundle\DependencyInjection\PUGXShortidDoctrineExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;

final class PUGXShortidDoctrineExtensionTest extends TestCase
{
    public function testLoadFailure(): void
    {
        $container = $this->createMock(ContainerBuilder::class);
        $extension = $this->createMock(PUGXShortidDoctrineExtension::class);

        $extension->load([[]], $container);
        $this->assertFalse(false);
    }

    public function testLoadSetParameters(): void
    {
        $container = $this->createMock(ContainerBuilder::class);
        $parameterBag = $this->createMock(ParameterBag::class);

        $parameterBag->expects($this->any())->method('add');
        $container->expects($this->any())->method('getParameterBag')->willReturn($parameterBag);

        $extension = new PUGXShortidDoctrineExtension();
        $configs = [
            ['global_config' => [
                'length' => 7,
            ]],
        ];
        $extension->load($configs, $container);
        $this->assertTrue(true);
    }

    public function testPrepend(): void
    {
        $container = $this->createMock(ContainerBuilder::class);

        $container->expects($this->once())->method('prependExtensionConfig');

        $extension = new PUGXShortidDoctrineExtension();
        $extension->prepend($container);
        $this->assertTrue(true);
    }
}
