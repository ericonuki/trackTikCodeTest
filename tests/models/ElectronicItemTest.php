<?php


use PHPUnit\Framework\TestCase;

class ElectronicItemTest extends TestCase
{
    public function testInitialize()
    {
        $subject = new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_CONSOLE);

        $this->assertInstanceOf(ElectronicItem::class, $subject);
    }

    public function testInitializeError()
    {
        $this->expectExceptionMessage('WrongType is not an acceptable type');

        new ElectronicItem('WrongType');
    }

    public function testGetType()
    {

    }

    public function testGetWired()
    {

    }

    public function testSetWired()
    {

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
