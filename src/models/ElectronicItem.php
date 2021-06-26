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
    private ?string $type;
    public ?ElectronicItems $wired;

    const ELECTRONIC_ITEM_TELEVISION = 'television';
    const ELECTRONIC_ITEM_CONSOLE = 'console';
    const ELECTRONIC_ITEM_MICROWAVE = 'microwave';
    const ELECTRONIC_ITEM_WIRED_CONTROLLER = 'wired_controller';
    const ELECTRONIC_ITEM_REMOTE_CONTROLLER = 'remote_controller';

    public static $types = [
        self::ELECTRONIC_ITEM_CONSOLE,
        self::ELECTRONIC_ITEM_MICROWAVE,
        self::ELECTRONIC_ITEM_TELEVISION,
        self::ELECTRONIC_ITEM_WIRED_CONTROLLER,
        self::ELECTRONIC_ITEM_REMOTE_CONTROLLER
    ];

    public function __construct(
        string $type,
        float $price = 0.0,
        ElectronicItems $wired = null
    ) {
        if(is_null($wired)) {
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
        if(get_class($wired) !== ElectronicItems::class) {
            throw new Exception('Can only setWired of class ElectronicItems');
        }

        if($wired->getItemsCount() > $this->maxExtras()) {
            throw new Exception(
                "Cannot add more than {$this->maxExtras()} items."
            );
        }

        $this->wired = $wired;
    }

    function maxExtras(): ?int
    {
        return null;
    }

    /**
     * Reasoning behind this function: you need to get the attached electronics
     * of every downstream electronic
     *
     * @return array
     */
    function getAllItems(): array
    {
        return array_merge([$this], $this->wired->getAllItems());
    }
}
