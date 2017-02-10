<?php

namespace PUGX\ShortidDoctrineBundle\Tests;

use PHPUnit\Framework\TestCase;
use PUGX\ShortidDoctrineBundle\PUGXShortidDoctrineBundle;

class PUGXShortidDoctrineBundleTest extends TestCase
{
    public function testBoot()
    {
        $alphabet = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_-';
        $container = $this->getMockBuilder('Symfony\\Component\\DependencyInjection\\ContainerBuilder')
            ->disableOriginalConstructor()->getMock();
        $container->expects($this->once())->method('hasParameter')->will($this->returnValue(true));
        $container->expects($this->at(1))->method('getParameter')->will($this->returnValue(7));
        $container->expects($this->at(2))->method('getParameter')->will($this->returnValue($alphabet));

        $bundle = new PUGXShortidDoctrineBundle();
        $bundle->setContainer($container);
        $bundle->boot();
    }
}
