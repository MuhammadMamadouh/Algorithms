<?php

/**
 * Problem: Given an array of integer and a range. Write an algorithms to partition
 * array so that values smaller than range come to left, then values under the range
 * followed with values greater than the range..
 */

function Rangepartition(array &$arr, $low, $high)
{
    $i =  $start = 0;
    $end = count($arr) - 1;
    while ($i <= $end) {
        if ($arr[$i] < $low) {
            swap($arr, $start, $i);
            $start++;
            $i++;
        } elseif ($arr[$i] > $high) {
            swap($arr, $i, $end);
            $end--;
        } else {
            $i++;
        }
    }
}
function swap(array &$arr, $i, $j)
{
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;
}

$arr = [1, 21, 2, 20, 3, 19, 4, 18, 5, 17, 6, 16, 7, 15, 8, 14, 9, 13, 10, 12, 11];
echo implode(', ', $arr);

echo PHP_EOL;
echo '--------------------------' . PHP_EOL;

Rangepartition($arr, 8, 12);
echo implode(', ', $arr);
// print_r($arr);