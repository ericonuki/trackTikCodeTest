<?php


use PHPUnit\Framework\TestCase;

class ElectronicItemTest extends TestCase
{
    public function testInitialize()
    {
        $subject = new ElectronicItem(
            ElectronicItem::ELECTRONIC_ITEM_CONSOLE, 0.0, []);

        $this->assertInstanceOf(ElectronicItem::class, $subject);
    }

    public function testInitializeError()
    {
        $this->expectExceptionMessage('WrongType is not an acceptable type');

        new ElectronicItem('WrongType');
    }

    public function testInitializeWrongWired()
    {
        $this->expectExceptionMessage(
            'Cannot add wired elements that are not ElectronicItem');

        new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_CONSOLE,
            0.0, ['wrong']);
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
            0.0, $wired);

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

    public function testSetWiredWithWrongWired()
    {
        $this->expectExceptionMessage(
            'Cannot add wired elements that are not ElectronicItem');

        $wired = ['wrong'];
        $subject = new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_CONSOLE);
        $subject->setWired($wired);
    }

    public function testGetPrice()
    {
        $subject = new ElectronicItem(
            ElectronicItem::ELECTRONIC_ITEM_CONSOLE, 5.00, []);

        $this->assertEquals(5.00, $subject->getPrice());
    }

    public function testSetType()
    {
        $subject = new ElectronicItem(
            ElectronicItem::ELECTRONIC_ITEM_CONSOLE, 5.00, []);
        $subject->setType(ElectronicItem::ELECTRONIC_ITEM_CONTROLLER);

        $this->assertEquals(ElectronicItem::ELECTRONIC_ITEM_CONTROLLER,
            $subject->getType());
    }

    public function testSetTypeWrongThrowsError()
    {
        $this->expectExceptionMessage('WrongType is not an acceptable type');
        $subject = new ElectronicItem(
            ElectronicItem::ELECTRONIC_ITEM_CONSOLE, 0.00, []);
        $subject->setPrice(5.00);
        $subject->setType('WrongType');
    }

    public function testSetPrice()
    {
        $subject = new ElectronicItem(
            ElectronicItem::ELECTRONIC_ITEM_CONSOLE, 0.00, []);
        $subject->setPrice(5.00);

        $this->assertEquals(5.00, $subject->getPrice());
    }

    public function testSetPriceNegativeThrowsError()
    {
        $this->expectExceptionMessage('Cannot setPrice with value lower than 0');
        $subject = new ElectronicItem(
            ElectronicItem::ELECTRONIC_ITEM_CONSOLE, 0.00, []);
        $subject->setPrice(-5.00);
    }
}
