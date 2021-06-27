<?php

require_once 'vendor/autoload.php';

require_once 'src/models/Console.php';
require_once 'src/models/Controller.php';
require_once 'src/models/ElectronicItem.php';
require_once 'src/models/ElectronicItems.php';
require_once 'src/models/Microwave.php';
require_once 'src/models/RemoteController.php';
require_once 'src/models/Television.php';
require_once 'src/models/WiredController.php';

class Main
{
    public function question1()
    {
        $subject = $this->questionsSetup();
        $allitems = new ElectronicItems($subject->getAllItems());
        $sorted = $allitems->getSortedItems();
        print_r("The ordered array of electronics:\n");
        print_r($sorted);
        print_r("\nTotal price of all electronics:\n");
        print_r($this->getPrice($sorted));
    }

    public function question2()
    {
        $subject = $this->questionsSetup();
        $console = $subject->getItemsByType(
            ElectronicItem::ELECTRONIC_ITEM_CONSOLE)[0];
        $items = $console->getAllItems();
        print_r("\nTotal cost of the console and its remotes: \n");
        print_r($this->getPrice($items));
        print_r("\n");
    }

    /**
     * @return ElectronicItems
     * @throws Exception
     */
    public function questionsSetup(): ElectronicItems
    {
        $console1 = new Console(1.0);
        $tv1 = new Television(2.0);
        $tv2 = new Television(4.0);
        $microwave1 = new Microwave(8.0);
        $wr1 = new WiredController(16.0);
        $wr2 = new WiredController(32.0);
        $rr1 = new RemoteController(64.0);
        $rr2 = new RemoteController(128.0);
        $rr3 = new RemoteController(256.0);
        $rr4 = new RemoteController(512.0);
        $rr5 = new RemoteController(1024.0);
        $console1Extras = new ElectronicItems([$wr1, $wr2, $rr1, $rr2]);
        $tv1Extras = new ElectronicItems([$rr3, $rr4]);
        $tv2Extras = new ElectronicItems([$rr5]);
        $console1->setWired($console1Extras);
        $tv1->setWired($tv1Extras);
        $tv2->setWired($tv2Extras);

        return new ElectronicItems([$console1, $tv1, $tv2, $microwave1]);
    }

    /**
     * Returns the total price of the array of items
     * @param array $sorted
     * @return int
     */
    public function getPrice(array $sorted): float
    {
        return array_reduce(
            $sorted,
            fn($carry, ElectronicItem $eln) => $carry + $eln->getPrice(), 0.0
        );
    }
}
