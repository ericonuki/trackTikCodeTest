<?php

require_once 'src/models/Controller.php';
require_once 'src/models/WiredController.php';

use PHPUnit\Framework\TestCase;

class ControllerTest extends TestCase
{
    public function setTypeCanOnlyBeController()
    {
        $subject = new Controller(
            ElectronicItem::ELECTRONIC_ITEM_REMOTE_CONTROLLER,
            0.0
        );

        $this->expectErrorMessage('television is not an acceptable type');

        $subject->setType(ElectronicItem::ELECTRONIC_ITEM_TELEVISION);
    }

    public function testMaxExtras()
    {
        $subject = new Controller(
            ElectronicItem::ELECTRONIC_ITEM_REMOTE_CONTROLLER,
            0.0
        );

        $this->assertEquals(0, $subject->maxExtras());
    }

    public function testSetWired()
    {
        $subject = new Controller(
            ElectronicItem::ELECTRONIC_ITEM_REMOTE_CONTROLLER,
            0.0
        );
        $wired = new ElectronicItems([]);
        $subject->setWired($wired);

        $this->assertEquals($wired, $subject->getWired());
    }

    public function testSetWiredWithMoreThanMax()
    {
        $this->expectErrorMessage('Cannot add more than 0 items.');
        $subject = new Controller(ElectronicItem::ELECTRONIC_ITEM_REMOTE_CONTROLLER, 0.0);
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
