<?php


namespace Kata;

class Factorial
{
    public function checkNumber($number)
    {
        if (empty($number)) {
            throw new \InvalidArgumentException("Invalid input");
        }
        return $number;
    }
}
