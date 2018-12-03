<?php


namespace Kata\Test;

use Kata\FizzBuzz;
use Kata\IsNoNumberException;

class KataTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    public function nothing()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function returnTrue()
    {
        $kata = new FizzBuzz();

        $this->assertEquals(true, $kata->returnTrue());
    }


}
