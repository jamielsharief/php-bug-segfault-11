<?php
include_once 'AnotherTrait.php';
include_once 'YetAnotherTrait.php';

abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    use AnotherTrait,YetAnotherTrait;
}
