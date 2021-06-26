<?php


class Console extends ElectronicItem
{
    public function __construct(float $price = 0.0, ElectronicItems $wired = null)
    {
        parent::__construct(self::ELECTRONIC_ITEM_CONSOLE, $price, $wired);
    }

    public function maxExtras(): int
    {
        return 4;
    }
}
