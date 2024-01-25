<?php

/**
 * Problem: Given an array containing 0s, 1s and 2s. Write an algorithms to sort
 * array so that 0s come first followed by 1s and then 2s in the end.
 */

function partition(array &$arr)
{
    $low = 0;
    $high = count($arr) - 1;
    $mid = 0;

    while ($mid <= $high) {
        switch ($arr[$mid]) {
            case 0:
                swap($arr, $low, $mid);
                $low++;
                $mid++;
                break;
            case 1:
                $mid++;
                break;
            case 2:
                swap($arr, $mid, $high);
                $high--;
                break;
        }
    }
}
function swap(array &$arr, $i, $j)
{
    $temp = $arr[$i];
    $arr[$i] = $arr[$j];
    $arr[$j] = $temp;
}

$arr = [0, 1, 2, 0, 1, 2, 0, 1, 2, 0, 0];
echo implode(', ', $arr);

echo PHP_EOL;
echo '--------------------------' . PHP_EOL;

partition($arr);
echo implode(', ', $arr);
// print_r($arr);