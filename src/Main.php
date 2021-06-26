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
        $subject = $this->question1Setup();
        $allitems = new ElectronicItems($subject->getAllItems());
        $sorted = $allitems->getSortedItems();
        print_r('The ordered array of electronics');
        print_r($sorted);
        print_r('Total price of all electronics:');
        print_r(
            array_reduce(
                $sorted,
                fn($carry, ElectronicItem $eln) => $carry + $eln->getPrice(), 0
            )
        );
    }

    /**
     * @return ElectronicItems
     * @throws Exception
     */
    public function question1Setup(): ElectronicItems
    {
        $faker = Faker\Factory::create();

        $console1 = new Console($faker->randomFloat(2, 0));
        $tv1 = new Television($faker->randomFloat(2, 0));
        $tv2 = new Television($faker->randomFloat(2, 0));
        $microwave1 = new Microwave($faker->randomFloat(2, 0));
        $wr1 = new WiredController($faker->randomFloat(2, 0));
        $wr2 = new WiredController($faker->randomFloat(2, 0));
        $rr1 = new RemoteController($faker->randomFloat(2, 0));
        $rr2 = new RemoteController($faker->randomFloat(2, 0));
        $rr3 = new RemoteController($faker->randomFloat(2, 0));
        $rr4 = new RemoteController($faker->randomFloat(2, 0));
        $rr5 = new RemoteController($faker->randomFloat(2, 0));
        $console1Extras = new ElectronicItems([$wr1, $wr2, $rr1, $rr2]);
        $tv1Extras = new ElectronicItems([$rr3, $rr4]);
        $tv2Extras = new ElectronicItems([$rr5]);
        $console1->setWired($console1Extras);
        $tv1->setWired($tv1Extras);
        $tv2->setWired($tv2Extras);

        return new ElectronicItems([$console1, $tv1, $tv2, $microwave1]);
    }
}
