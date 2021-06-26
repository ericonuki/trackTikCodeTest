<?php


use PHPUnit\Framework\TestCase;

class ElectronicItemTest extends TestCase
{
    public function testInitialize()
    {
        $subject = new ElectronicItem(
            ElectronicItem::ELECTRONIC_ITEM_CONSOLE,
            0.0,
            new ElectronicItems([])
        );

        $this->assertInstanceOf(ElectronicItem::class, $subject);
    }

    public function testInitializeError()
    {
        $this->expectExceptionMessage('WrongType is not an acceptable type');

        new ElectronicItem('WrongType');
    }

    public function testGetType()
    {
        $subject = new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_CONSOLE);

        $this->assertEquals(ElectronicItem::ELECTRONIC_ITEM_CONSOLE,
            $subject->getType());
    }

    public function testGetPrice()
    {
        $subject = new ElectronicItem(
            ElectronicItem::ELECTRONIC_ITEM_CONSOLE,
            5.00,
            new ElectronicItems([])
        );

        $this->assertEquals(5.00, $subject->getPrice());
    }

    public function testSetType()
    {
        $subject = new ElectronicItem(
            ElectronicItem::ELECTRONIC_ITEM_CONSOLE,
            5.00,
            new ElectronicItems([])
        );
        $subject->setType(ElectronicItem::ELECTRONIC_ITEM_WIRED_CONTROLLER);

        $this->assertEquals(ElectronicItem::ELECTRONIC_ITEM_WIRED_CONTROLLER,
            $subject->getType());
    }

    public function testSetTypeWrongThrowsError()
    {
        $this->expectExceptionMessage('WrongType is not an acceptable type');
        $subject = new ElectronicItem(
            ElectronicItem::ELECTRONIC_ITEM_CONSOLE,
            5.00,
            new ElectronicItems([])
        );
        $subject->setPrice(5.00);
        $subject->setType('WrongType');
    }

    public function testSetPrice()
    {
        $subject = new ElectronicItem(
            ElectronicItem::ELECTRONIC_ITEM_CONSOLE,
            0.00,
            new ElectronicItems([])
        );
        $subject->setPrice(5.00);

        $this->assertEquals(5.00, $subject->getPrice());
    }

    public function testSetPriceNegativeThrowsError()
    {
        $this->expectExceptionMessage('Cannot setPrice with value lower than 0');
        $subject = new ElectronicItem(
            ElectronicItem::ELECTRONIC_ITEM_CONSOLE,
            5.00,
            new ElectronicItems([])
        );
        $subject->setPrice(-5.00);
    }

    public function testGetAllItems()
    {
        $subject = new Television(1);

        $this->assertEquals([$subject], $subject->getAllItems());
    }

    public function testGetAllItemsWithOneWired()
    {
        $subject = new Television(1);
        $wr1 = new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_WIRED_CONTROLLER, 2);
        $wired = new ElectronicItems([$wr1]);
        $subject->setWired($wired);

        $this->assertEquals([$subject, $wr1], $subject->getAllItems());
    }
}
