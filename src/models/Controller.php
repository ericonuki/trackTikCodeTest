<?php


class Controller extends ElectronicItem
{
    public function __construct(float $price = 0.0, ElectronicItems $wired = null)
    {
        parent::__construct(self::ELECTRONIC_ITEM_CONTROLLER, $price, $wired);
    }
}