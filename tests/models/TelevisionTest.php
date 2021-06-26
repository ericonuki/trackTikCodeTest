<?php


use PHPUnit\Framework\TestCase;

class TelevisionTest extends TestCase
{
    public function testInitialize()
    {
        $subject = new Television(
            0.0,
            new ElectronicItems([])
        );

        $this->assertInstanceOf(Television::class, $subject);
    }

    public function testGetType()
    {
        $subject = new Television(
            0.0,
            new ElectronicItems([])
        );

        $this->assertEquals(ElectronicItem::ELECTRONIC_ITEM_TELEVISION,
            $subject->getType());
    }
}
