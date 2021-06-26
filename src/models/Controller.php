<?php


class Controller extends ElectronicItem
{
    public static $types = [
        self::ELECTRONIC_ITEM_WIRED_CONTROLLER,
        self::ELECTRONIC_ITEM_REMOTE_CONTROLLER
    ];

    public function __construct(string $type, float $price = 0.0, ElectronicItems $wired = null)
    {
        parent::__construct($type, $price, $wired);
    }

    public function maxExtras(): int
    {
        return 0;
    }
}
