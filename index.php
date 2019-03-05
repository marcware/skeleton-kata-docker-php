<?php
/**
 * Created by PhpStorm.
 * User: marcware
 * Date: 24/12/18
 * Time: 12:37
 */


require_once 'src/Factorial.php';


$factorial = new \Kata\Factorial();
$a = $factorial->returnTrue();
echo $a;