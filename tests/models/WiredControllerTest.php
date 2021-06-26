<?php

require_once 'src/models/Controller.php';

use PHPUnit\Framework\TestCase;

class WiredControllerTest extends TestCase
{
    public function testInitialize()
    {
        $subject = new WiredController(
            0.0,
            new ElectronicItems([])
        );

        $this->assertInstanceOf(WiredController::class, $subject);
    }

    public function testGetType()
    {
        $subject = new WiredController(
            0.0,
            new ElectronicItems([])
        );

        $this->assertEquals(
            ElectronicItem::ELECTRONIC_ITEM_WIRED_CONTROLLER,
            $subject->getType()
        );
    }
}
