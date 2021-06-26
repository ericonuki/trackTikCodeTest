<?php

require_once 'src/models/Controller.php';

use PHPUnit\Framework\TestCase;

class ControllerTest extends TestCase
{
    public function testInitialize()
    {
        $subject = new Controller(
            0.0,
            new ElectronicItems([])
        );

        $this->assertInstanceOf(Controller::class, $subject);
    }

    public function testGetType()
    {
        $subject = new Controller(
            0.0,
            new ElectronicItems([])
        );

        $this->assertEquals(ElectronicItem::ELECTRONIC_ITEM_CONTROLLER,
            $subject->getType());
    }

    public function testMaxExtras()
    {
        $subject = new Controller(0.0);

        $this->assertEquals(0, $subject->maxExtras());
    }

    public function testSetWired()
    {
        $subject = new Controller(0.0);
        $wired = new ElectronicItems([]);
        $subject->setWired($wired);

        $this->assertEquals($wired, $subject->getWired());
    }

    public function testSetWiredWithMoreThanMax()
    {
        $this->expectErrorMessage('Cannot add more than 0 items.');
        $subject = new Controller(0.0);
        $wired = new ElectronicItems([
            new Controller(),
            new Controller(),
            new Controller(),
            new Controller(),
            new Controller()
        ]);
        $subject->setWired($wired);
    }
}
