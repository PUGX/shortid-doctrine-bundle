<?php

namespace PUGX\ShortidDoctrineBundle\Tests\DependencyInjection;

use PHPUnit_Framework_TestCase as TestCase;
use PUGX\ShortidDoctrineBundle\DependencyInjection\PUGXShortidDoctrineExtension;

class PUGXShortidDoctrineExtensionTest extends TestCase
{
    public function testLoadFailure()
    {
        $container = $this->getMockBuilder('Symfony\\Component\\DependencyInjection\\ContainerBuilder')
            ->disableOriginalConstructor()->getMock();
        $extension = $this
            ->getMockBuilder('PUGX\\ShortidDoctrineBundle\\DependencyInjection\\PUGXShortidDoctrineExtension')
            ->getMock();

        $extension->load([[]], $container);
    }

    public function testLoadSetParameters()
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
    }

    public function testPrepend()
    {
        $container = $this->getMockBuilder('Symfony\\Component\\DependencyInjection\\ContainerBuilder')
            ->disableOriginalConstructor()->getMock();
        $container->expects($this->once())->method('prependExtensionConfig');

        $extension = new PUGXShortidDoctrineExtension();
        $extension->prepend($container);
    }
}
