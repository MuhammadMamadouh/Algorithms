<?php

/**
 * Problem:Given an array of even and odd numbers, 
 * write a program to separate even numbers from the odd numbers.
 */

function seperateEvenAndOdd(array &$arr)
{
    $left = 0;
    $right = count($arr) - 1;
    while ($left < $right) {
        while ($arr[$left] % 2 == 0) {
            $left++;
        }
        while ($arr[$right] % 2 == 1) {
            $right--;
        }
        if ($left < $right) {
            swap($arr, $left, $right);
            $left++;
            $right--;
        }
    }
}
function swap(array &$arr, $i, $j)
{
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;
}

$arr = [0, 1, 3,4, 5, 2, 6, 7, 8, 9, 10];
echo implode(', ', $arr);

echo PHP_EOL;
echo '--------------------------' . PHP_EOL;

seperateEvenAndOdd($arr);
echo implode(', ', $arr);
// print_r($arr);