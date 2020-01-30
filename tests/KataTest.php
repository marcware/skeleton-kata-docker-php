<?php


namespace Kata\Test;

use Kata\Factorial;


class KataTest extends \PHPUnit_Framework_TestCase
{


    /** @test */
    public function send_one_and_return_one()
    {
        $kata = new Factorial();

        $this->assertEquals(1, $kata->checkNumber(1));
    }

    /**
     * @test
     * @expectedException
     */
    public function exception()
    {

        $this->setExpectedException(\InvalidArgumentException::class);

        $kata = new Factorial();

        $kata->checkNumber(null);
    }

}
