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

    /**
     * returns the price
     *
     * @return float
     */
    function getPrice()
    {
        return $this->price;
    }

    /**
     * Returns the type
     *
     * @return string|null
     */
    function getType()
    {
        return $this->type;
    }

    /**
     * returns the downstream electronics attached to this electronic
     *
     * @return ElectronicItems|null
     */
    function getWired()
    {
        return $this->wired;
    }

    /**
     * Sets the price for the electronic. If a negative price is inserted, it
     * throws an exception
     *
     * @param $price
     * @throws Exception
     */
    function setPrice($price)
    {
        if($price < 0) {
            throw new Exception('Cannot setPrice with value lower than 0');
        }

        $this->price = $price;
    }

    /**
     * Sets the type to an acceptable type. If a type is not acceptable, it
     * throws an exception.
     *
     * @param $type
     * @throws Exception
     */
    function setType($type)
    {
        if(!in_array($type, self::$types)) {
            throw new Exception("${type} is not an acceptable type");
        }

        $this->type = $type;
    }

    /**
     * Sets the downstream electronics that are attached to this electronic.
     * This does replace the previous electronics that were attached there.
     * If more electronics are attached than the device can handle, an exception
     * is thrown.
     *
     * @param ElectronicItems $wired
     * @throws Exception
     */
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

    /**
     * Returns the max number of extras an electronic can have.
     *
     * @return int
     */
    function maxExtras(): int
    {
        return 0;
    }

    /**
     * Reasoning behind this function: you need to get the attached electronics
     * of every downstream electronic
     *
     * @return array
     */
    function getAllItems(): array
    {
        if(is_null($this->getWired()))
        {
            return [$this];
        }

        return array_merge([$this], $this->getWired()->getAllItems());
    }
}
