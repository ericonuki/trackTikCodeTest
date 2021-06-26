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

        $this->assertEquals(ElectronicItem::ELECTRONIC_ITEM_MICROWAVE,
            $subject->getType());
    }
}