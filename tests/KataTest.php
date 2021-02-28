<?php

declare(strict_types=1);

namespace Kata\Test;

use Kata\Factorial;
use PHPUnit\Framework\TestCase;


class KataTest extends TestCase
{

    /** @test */
    public function testSendOneAndReturnOne(): void
    {
        $kata = new Factorial();

        $this->assertEquals(1, $kata->checkNumber(1));
    }


}
