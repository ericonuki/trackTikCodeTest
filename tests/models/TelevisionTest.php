<?php

require_once 'src/models/Television.php';

use PHPUnit\Framework\TestCase;

class TelevisionTest extends TestCase
{
    public function testInitialize()
    {
        $subject = new Television(
            0.0,
            new ElectronicItems([])
        );

        $this->assertInstanceOf(Television::class, $subject);
    }

    public function testGetType()
    {
        $subject = new Television(
            0.0,
            new ElectronicItems([])
        );

        $this->assertEquals(ElectronicItem::ELECTRONIC_ITEM_TELEVISION,
            $subject->getType());
    }

    public function testMaxExtras()
    {
        $subject = new Television(0.0);

        $this->assertEquals(PHP_INT_MAX, $subject->maxExtras());
    }

    public function testSetWired()
    {
        $subject = new Television(0.0);
        $wired = new ElectronicItems([]);
        $subject->setWired($wired);

        $this->assertEquals($wired, $subject->getWired());
    }

    public function testSetWiredWithMoreThanMax()
    {
        $subject = new Television(0.0);
        $wired = new ElectronicItems([
            new Controller(),
            new Controller(),
            new Controller(),
            new Controller(),
            new Controller()
        ]);
        $subject->setWired($wired);

        $this->assertEquals($wired, $subject->getWired());
    }
}
