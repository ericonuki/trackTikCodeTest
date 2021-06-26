<?php

require_once 'ElectronicItems.php';

class ElectronicItem
{

    /**
     * @var float
     */
    public $price;

    /**
     * @var string
     */
    private $type;
    public $wired;

    const ELECTRONIC_ITEM_TELEVISION = 'television';
    const ELECTRONIC_ITEM_CONSOLE = 'console';
    const ELECTRONIC_ITEM_MICROWAVE = 'microwave';
    const ELECTRONIC_ITEM_CONTROLLER = 'controller';

    public static $types = array(self::ELECTRONIC_ITEM_CONSOLE,
        self::ELECTRONIC_ITEM_MICROWAVE, self::ELECTRONIC_ITEM_TELEVISION,
        self::ELECTRONIC_ITEM_CONTROLLER);

    public function __construct(string $type, float $price = 0.0,
        ElectronicItems $wired = null
    ) {
        if(is_null($wired))
        {
            $wired = new ElectronicItems([]);
        }

        $this->setType($type);
        $this->setWired($wired);
        $this->setPrice($price);
    }

    function getPrice()
    {
        return $this->price;
    }

    function getType()
    {
        return $this->type;
    }

    function getWired()
    {
        return $this->wired;
    }

    function setPrice($price)
    {
        if($price < 0) {
            throw new Exception('Cannot setPrice with value lower than 0');
        }

        $this->price = $price;
    }

    function setType($type)
    {
        if(!in_array($type, self::$types)) {
            throw new Exception("${type} is not an acceptable type");
        }

        $this->type = $type;
    }

    function setWired(ElectronicItems $wired)
    {
        if(get_class($wired) !== ElectronicItems::class)
        {
            throw new Exception('Can only setWired of class ElectronicItems');
        }

        $this->wired = $wired;
    }

    function maxExtras(): int
    {
        throw new Exception('Not implemented');
    }
}
