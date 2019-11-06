<?php

include_once 'vendor/autoload.php';
include_once 'TestCase.php';
include_once 'TestTrait.php';

class FooTest extends TestCase
{
    use TestTrait;
    
    public function testFoo()
    {
        $this->assertTrue(true);
    }
}
