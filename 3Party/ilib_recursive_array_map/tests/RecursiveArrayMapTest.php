<?php
require_once 'PHPUnit/Framework.php';
require_once '../src/recursive_array_map.php';

class RecursiveArrayMapTest extends PHPUnit_Framework_TestCase
{
    function testWillReturnAnEmptyArrayIfGiven()
    {
        $data = array();
        $handled_data = recursive_array_map('trim', $data);
        $this->assertTrue(empty($handled_data));
        $this->assertEquals($data, $handled_data);
    }

    function testWillReturnAnEmptyArrayIfGivenInSecondAlso()
    {
        $data = array('items' => array());
        $handled_data = recursive_array_map('trim', $data);
        $this->assertTrue(empty($handled_data['items']));
        $this->assertEquals($data, $handled_data);
    }

}