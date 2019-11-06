<?php

include_once 'vendor/autoload.php';
include_once 'TestCase.php';
include_once 'TestTrait.php';

class FooBarTest extends TestCase
{
    use TestTrait;
    public function testBar()
    {
        $this->assertTrue(true);
    }
}
