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

        $this->assertEquals(ElectronicItem::ELECTRONIC_ITEM_CONSOLE,
            $subject->getType());
    }
}
