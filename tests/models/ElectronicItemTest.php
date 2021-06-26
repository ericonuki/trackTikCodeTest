<?php


use PHPUnit\Framework\TestCase;

class ElectronicItemTest extends TestCase
{
    public function testInitialize()
    {
        $subject = new ElectronicItem(
            ElectronicItem::ELECTRONIC_ITEM_CONSOLE, []);

        $this->assertInstanceOf(ElectronicItem::class, $subject);
    }

    public function testInitializeError()
    {
        $this->expectExceptionMessage('WrongType is not an acceptable type');

        new ElectronicItem('WrongType');
    }

    public function testWrongWired()
    {
        $this->expectExceptionMessage(
            'Cannot add wired elements that are not ElectronicItem');

        new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_CONSOLE, ['wrong']);
    }

    public function testGetType()
    {
        $subject = new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_CONSOLE);

        $this->assertEquals(ElectronicItem::ELECTRONIC_ITEM_CONSOLE,
            $subject->getType());
    }

    public function testGetWired()
    {
        $wired = [new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_CONTROLLER)];
        $subject = new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_CONSOLE,
            $wired);

        $this->assertEquals($wired, $subject->getWired());
    }

    public function testSetWired()
    {
        $wired = [new ElectronicItem(
            ElectronicItem::ELECTRONIC_ITEM_CONTROLLER)];
        $subject = new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_CONSOLE);
        $subject->setWired($wired);

        $this->assertEquals($wired, $subject->getWired());
    }

    public function testGetPrice()
    {

    }

    public function testSetType()
    {

    }

    public function testSetPrice()
    {

    }
}
