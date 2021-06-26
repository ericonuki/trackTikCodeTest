<?php

require_once 'src/models/Console.php';

use PHPUnit\Framework\TestCase;

class ConsoleTest extends TestCase
{
    public function testInitialize()
    {
        $subject = new Console(0.0);

        $this->assertInstanceOf(Console::class, $subject);
    }

    public function testGetType()
    {
        $subject = new Console(0.0);

        $this->assertEquals(
            ElectronicItem::ELECTRONIC_ITEM_CONSOLE,
            $subject->getType()
        );
    }

    public function testMaxExtras()
    {
        $subject = new Console(0.0);

        $this->assertEquals(4, $subject->maxExtras());
    }

    public function testSetWired()
    {
        $subject = new Console(0.0);
        $wired = new ElectronicItems([new WiredController()]);
        $subject->setWired($wired);

        $this->assertEquals($wired, $subject->getWired());
    }

    public function testSetWiredWithMoreThanMax()
    {
        $this->expectErrorMessage('Cannot add more than 4 items.');
        $subject = new Console(0.0);
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
