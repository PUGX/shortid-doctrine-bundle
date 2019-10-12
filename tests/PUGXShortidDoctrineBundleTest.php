<?php

namespace PUGX\ShortidDoctrineBundle\Tests;

use PHPUnit\Framework\TestCase;
use PUGX\ShortidDoctrineBundle\PUGXShortidDoctrineBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

final class PUGXShortidDoctrineBundleTest extends TestCase
{
    public function testBoot(): void
    {
        $alphabet = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_-';
        /** @var \Symfony\Component\DependencyInjection\ContainerInterface&\PHPUnit\Framework\MockObject\MockObject $container */
        $container = $this->createMock(ContainerBuilder::class);
        $container->expects($this->once())->method('hasParameter')->willReturn(true);
        $container->expects($this->at(1))->method('getParameter')->willReturn(7);
        $container->expects($this->at(2))->method('getParameter')->willReturn($alphabet);

        $bundle = new PUGXShortidDoctrineBundle();
        $bundle->setContainer($container);
        $bundle->boot();
    }
}
