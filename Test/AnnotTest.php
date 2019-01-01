<?php
namespace stats\Test;

use stats\Baseball;

class BaseballTest extends \PHPUnit_Framework_TestCase {
    /**
     * @dataProvider providerCalcArgs
     * @covers Baseball::cal_avg
     * @return float
     * @param int $atbats
     * @param int $hits
     */

    public function testCalc($atbats, $hits) {
        if (!is_numeric($ab)){
            $avg = 'Not a  number';
            return $avg;
            exit();
        }
		
        $baseball = new Baseball();
        $result = $baseball->calc_avg($atbats,$hits);
        $expectedresult = $hits/$atbats;
        $formatexpectedresult = number_format($hits/$atbats,3);
        $this->assertEquals($result,$formatexpectedresult);
    }

    public function providerCalcArgs() {
        return array(
            array('389','129'),
            array('somestring',129),
            array(389,'somestring'),
            array('somestring', 'somestring')
        );
    }
}