<?php

/**
 * @Problem: Given an array containing 0s and 1s. Write an algorithms to sort array
 * so that 0s come first followed by 1s. Also find the minimum number of swaps
 * required to sort the array
 *
 * @input [0, 1, 1, 0, 1, 0, 1, 1, 0, 0, 0, 1 ]
 * @output [0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1,1]
 */

function sortArray1($arr)
{
    $count = count($arr);

    $no_of_zeros = 0;
    for ($i = 0; $i < $count; $i++) {
        if ($arr[$i] == 0) {
            $no_of_zeros++;
        }
    }
    $newArray = [];
    for ($i = 0; $i < $no_of_zeros; $i++) {
        $newArray[$i] = 0;
    }
    for ($i = $no_of_zeros; $i < ($count); $i++) {
        $newArray[$i] = 1;
    }
    return $newArray;
}

function sortArray2($arr)
{
    $left = 0;
    $right = count($arr) - 1;
    $count = 0;
    while ($left < $right) {
        while ($arr[$left] == 0) {$left++;}
        while ($arr[$right] == 1) {$right--;}

        if ($left < $right) {
            $temp = $arr[$right];
            $arr[$right] = $arr[$left];
            $arr[$left] = $temp;
            $count++;
        }
    }
    echo 'count: ' . $count . PHP_EOL;
    return $arr;
}

$input = [0, 1, 1, 0, 1, 0, 1, 1, 0, 0, 0, 1];

$output = sortArray2($input);

echo implode(', ', $input);

echo PHP_EOL;
echo '--------------------------' . PHP_EOL;

echo implode(', ', $output);
