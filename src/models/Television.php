<?php


class Television extends ElectronicItem
{
    public function __construct(float $price = 0.0, ElectronicItems $wired = null)
    {
        parent::__construct(self::ELECTRONIC_ITEM_TELEVISION, $price, $wired);
    }

    public function maxExtras(): int
    {
        return PHP_INT_MAX;
    }
}
