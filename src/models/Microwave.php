<?php


class Microwave extends ElectronicItem
{
    public function __construct(float $price = 0.0, ElectronicItems $wired = null)
    {
        parent::__construct(self::ELECTRONIC_ITEM_MICROWAVE, $price, $wired);
    }

    public function maxExtras(): int
    {
        return 0;
    }
}