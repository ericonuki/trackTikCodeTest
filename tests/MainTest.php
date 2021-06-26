<?php

require_once 'src/Main.php';

use PHPUnit\Framework\TestCase;

class MainTest extends TestCase
{
    public function testQuestion1()
    {
        $subject = new Main();

        $subject->question1();
    }
}
