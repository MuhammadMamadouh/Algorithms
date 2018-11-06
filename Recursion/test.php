<?php
/**
 * Created by PhpStorm.
 * User: Mohamed
 * Date: 25/10/2018
 * Time: 04:01 م
 */

function fibonacci(int $n): int
{
    if ($n == 0)
        return 1;
    elseif ($n == 1) {
        return 1;
    } else {
        return fibonacci($n - 1) + fibonacci($n - 2);
    }
}

$var = fibonacci(5);

echo $var;