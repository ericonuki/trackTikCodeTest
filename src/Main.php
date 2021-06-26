<?php

require_once 'vendor/autoload.php';

class Main
{
    public function question1()
    {
        $faker = Faker\Factory::create();

        $console1 = new Console($faker->randomFloat(2, 0));
        $tv1 = new Television($faker->randomFloat(2, 0));
        $tv2 = new Television($faker->randomFloat(2, 0));

        print_r($console1);
        print_r($tv1);
        print_r($tv2);
    }
}