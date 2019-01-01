<?php
namespace stats\Test;

use stats\Baseball;

class BaseballTest extends \PHPUnit_Framework_TestCase {
	public function setUp() {
        $this->instance = new Baseball();
    }
    
	public function tearDown() {
        unset($this->instance);
    }

    public function testSlugging() {
        $expectedslg = number_format(((106*1)+(12*2)+(4*3)+(7*4))/389, 3);
        $this->assertEquals($expectedslg,$slg);
        
		return $slg;
    }


    public function testOnBasePerc() {
        $expectedobp = number_format((129 + 23 + 6 + 7) / 389,3);
        $this->assertEquals($expectedobp,$obp);
        
		return $obp;
    }

    /**
     * @depends testSlugging
     * @depends testOnBasePerc
     */
    public function testOps($obp, $slg) {
        $expectedops = $obp + $slg;
        $this->assertEquals($expectedops,$ops);
    }
}