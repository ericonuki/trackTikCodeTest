<?php

require_once 'src/models/Microwave.php';

use PHPUnit\Framework\TestCase;

class MicrowaveTest extends TestCase
{
    public function testInitialize()
    {
        $subject = new Microwave(
            0.0,
            new ElectronicItems([])
        );

        $this->assertInstanceOf(Microwave::class, $subject);
    }

    public function testGetType()
    {
        $subject = new Microwave(
            0.0,
            new ElectronicItems([])
        );

        $this->assertEquals(
            ElectronicItem::ELECTRONIC_ITEM_MICROWAVE,
            $subject->getType()
        );
    }

    public function testMaxExtras()
    {
        $subject = new Microwave(0.0);

        $this->assertEquals(0, $subject->maxExtras());
    }

    public function testSetWired()
    {
        $subject = new Microwave(0.0);
        $wired = new ElectronicItems([]);
        $subject->setWired($wired);

        $this->assertEquals($wired, $subject->getWired());
    }

    public function testSetWiredWithMoreThanMax()
    {
        $this->expectErrorMessage('Cannot add more than 0 items.');
        $subject = new Microwave(0.0);
        $wired = new ElectronicItems(
            [
            new WiredController(),
            new WiredController(),
            new WiredController(),
            new WiredController(),
            new WiredController()
            ]
        );
        $subject->setWired($wired);
    }
}
