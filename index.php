<?php
/**
 * Created by PhpStorm.
 * User: marcware
 * Date: 24/12/18
 * Time: 12:37
 */


$number = 5;
$factorial = 1;

for ($i = $number; $i >= 1; $i--) {
    $factorial= $factorial * $i;
    echo $i.'-->'.$factorial. '<br>';
}