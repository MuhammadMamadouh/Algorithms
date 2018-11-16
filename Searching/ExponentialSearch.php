<?php

require_once 'BinarySearch.php';
/**
 * Exponential Search Algorithm
 *
 * Best time complexity O(1)
 * Worst time complexity O(log i)
 * Average time complexity O(log i)
 * Space complexity (worst case) O(1)
 *
 * @param array $numbers
 * @param int $needle
 * @return bool
 */
function exponentialSearch(array $arr, int $key): int
{
    $size = count($arr);

    if ($size == 0)
        return -1;

    $bound = 1;

    while ($bound < $size && $arr[$bound] < $key) {
        $bound *= 2;
    }

    return recursiveBinarySearch($arr, $key, intval($bound / 2), min($bound, $size));

}


//$numbers = range(0, 1000, 5);
$numbers = [001, 002, 003, 111, 112, 113, 221, 222, 223];

$number = 111;

echo interpolationSearch($numbers, $number);


