<?php


class RemoteController extends Controller
{
    public function __construct(float $price = 0.0, ElectronicItems $wired = null)
    {
        parent::__construct(
            self::ELECTRONIC_ITEM_WIRED_CONTROLLER,
            $price,
            $wired
        );
    }
}
