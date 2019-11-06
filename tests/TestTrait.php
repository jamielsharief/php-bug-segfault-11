<?php
declare(strict_types = 1);

trait TestTrait
{
    /**
     * THIS CAUSES SEGMENTATION FAULT IN PHP 7.3 WHEN REFLECTED
     * WITH MULTIPLE FILES
     *
     * @var int|null
     */
    public $result = null; // Disable me to make Seg fault go away
    
    public function abc()
    {
    }
}
