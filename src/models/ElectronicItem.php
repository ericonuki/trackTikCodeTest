<?php

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

    public function __construct(string $type, array $wired = [])
    {
        if(!in_array($type, self::$types))
        {
            throw new Exception("${type} is not an acceptable type");
        }

        $this->type = $type;
        $this->setWired($wired);
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
        $this->price = $price;
    }

    function setType($type)
    {
        $this->type = $type;
    }

    function setWired($wired)
    {
        foreach ($wired as $electronic)
        {
            if(!is_object($electronic)||(get_class($electronic) !== __CLASS__))
            {
                throw new Exception(
                    "Cannot add wired elements that are not ElectronicItem");
            }
        }

        $this->wired = $wired;
    }
}
