<?php
use \infrajs\each\Each;
require_once __DIR__ . '/../Each.php';

class EachTest extends PHPUnit_Framework_TestCase
{
    public function testFirstArgNoArray(){
        $arr = 'test';
        $res = Each::forr($arr, function(){});
        $this->assertTrue(null === $res);
    }
}