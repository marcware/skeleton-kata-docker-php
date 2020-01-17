<?php


namespace Kata\Test;

use Kata\Factorial;
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
        $kata = new Factorial();

        $this->assertEquals(true, $kata->returnTrue());
    }


}
