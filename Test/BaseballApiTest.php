<?php
namespace stats\Test;

use stats\BaseballApi;

class BaseballApiTest extends \PHPUnit_Framework_TestCase {
    public function test_MockObject() {
        $stub = $this->getMock('BaseballApi', array('submitAtBat'));
        $stub->expects($this->any())
            ->method('submitAtBat')
            ->will($this->returnValue(true));
        $this->assertEquals($someVal, $someObj->submitAtBat('1','bh'));
    }
}

?>