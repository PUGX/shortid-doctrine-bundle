<?php

namespace PUGX\ShortidDoctrineBundle\Tests\DependencyInjection;

use PHPUnit\Framework\TestCase;
use PUGX\ShortidDoctrineBundle\DependencyInjection\PUGXShortidDoctrineExtension;

class PUGXShortidDoctrineExtensionTest extends TestCase
{
    public function testLoadFailure(): void
    {
        $container = $this->getMockBuilder('Symfony\\Component\\DependencyInjection\\ContainerBuilder')
            ->disableOriginalConstructor()->getMock();
        $extension = $this
            ->createMock('PUGX\\ShortidDoctrineBundle\\DependencyInjection\\PUGXShortidDoctrineExtension');

        $extension->load([[]], $container);
        $this->assertFalse(false);
    }

    public function testLoadSetParameters(): void
    {
        $container = $this->getMockBuilder('Symfony\\Component\\DependencyInjection\\ContainerBuilder')
            ->disableOriginalConstructor()->getMock();
        $parameterBag = $this->getMockBuilder('Symfony\Component\DependencyInjection\ParameterBag\\ParameterBag')
            ->disableOriginalConstructor()->getMock();

        $parameterBag->expects($this->any())->method('add');

        $container->expects($this->any())->method('getParameterBag')->will($this->returnValue($parameterBag));

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
        $container = $this->getMockBuilder('Symfony\\Component\\DependencyInjection\\ContainerBuilder')
            ->disableOriginalConstructor()->getMock();
        $container->expects($this->once())->method('prependExtensionConfig');

        $extension = new PUGXShortidDoctrineExtension();
        $extension->prepend($container);
        $this->assertTrue(true);
    }
}
