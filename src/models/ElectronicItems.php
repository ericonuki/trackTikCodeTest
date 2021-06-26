<?php

class ElectronicItems
{

    private array $items = array();

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * Returns the items depending on the sorting type requested
     *
     * @return array
     */
    public function getSortedItems($type = null): array
    {
        $sorted = array();
        foreach ($this->items as $item) {

            $sorted[($item->price * 100)] = $item;
        }

        ksort($sorted, SORT_NUMERIC);

        return $sorted;
    }

    /**
     *
     * @param  string $type
     * @return array
     */
    public function getItemsByType($type)
    {

        if (in_array($type, ElectronicItem::$types)) {

            $callback = function (ElectronicItem $item) use ($type) {

                return $item->getType() === $type;
            };

            $items = array_filter($this->items, $callback);
        }

        return $items;
    }

    public function getItemsCount()
    {
        return count($this->items);
    }
}
