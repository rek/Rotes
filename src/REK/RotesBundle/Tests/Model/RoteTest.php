<?php

namespace REK\RotesBundle\Tests\Model;

use REK\RotesBundle\Model\Rote;

class RoteTest extends \PHPUnit_Framework_TestCase
{
    public function testMessage()
    {
        $rote = $this->getRote();
        $this->assertNull($rote->getMessage());

        $msg = "Testing message";
        $result = $rote->setMessage($msg);

        $this->assertEquals($msg, $rote->getMessage());
    }

    /**
     * @return Rote
     */
    protected function getRote()
    {
        return $this->getMockForAbstractClass('REK\RotesBundle\Model\Rote');
    }
}