<?php


use PHPUnit\Framework\TestCase;

class ElectronicItemsTest extends TestCase
{

    public function testInitialize()
    {
        $subject = new ElectronicItems([
            new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_WIRED_CONTROLLER)
        ]);

        $this->assertEquals([
            new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_WIRED_CONTROLLER)
        ], $subject->getSortedItems());
    }

    public function testGetItemsByType()
    {
        $subject = new ElectronicItems([
            new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_WIRED_CONTROLLER),
            new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_WIRED_CONTROLLER),
            new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_TELEVISION),
        ]);

        $this->assertEquals([
            new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_WIRED_CONTROLLER),
            new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_WIRED_CONTROLLER),
        ], $subject->getItemsByType(ElectronicItem::ELECTRONIC_ITEM_WIRED_CONTROLLER));
    }

    public function testGetSortedItemsByPrice()
    {
        $subject = new ElectronicItems([
            new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_WIRED_CONTROLLER, 2),
            new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_WIRED_CONTROLLER, 3),
            new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_TELEVISION, 1),
        ]);

        $this->assertEquals([
            100 => new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_TELEVISION, 1),
            200 => new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_WIRED_CONTROLLER, 2),
            300 => new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_WIRED_CONTROLLER, 3),
        ], $subject->getSortedItems('price'));
    }

    public function testItemsCount()
    {
        $subject = new ElectronicItems([
            new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_WIRED_CONTROLLER, 2),
            new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_WIRED_CONTROLLER, 3),
            new ElectronicItem(ElectronicItem::ELECTRONIC_ITEM_TELEVISION, 1),
        ]);

        $this->assertEquals(3, $subject->getItemsCount());
    }

    public function testItemsCountZero()
    {
        $subject = new ElectronicItems([]);

        $this->assertEquals(0, $subject->getItemsCount());
    }

    public function testGetAllItems()
    {
        $tv = new Television(1);
        $subject = new ElectronicItems([$tv]);

        $this->assertEquals([$tv], $subject->getAllItems());
    }
}
