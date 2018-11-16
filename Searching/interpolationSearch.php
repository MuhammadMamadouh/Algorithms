<?php


/**
 * interpolation Search Algorithm
 *
 * Best time complexity O(1)
 * Worst time complexity O(log n)
 * Average time complexity O(log n)
 * Space complexity (worst case) O(1)
 *
 *
 * @param array $numbers
 * @param int $needle
 * @return bool
 */
function interpolationSearch(array $arr, int $key): int
{
    $low = 0;

    $high = count($arr) - 1;

    while ($arr[$high] != $arr[$low] && $key >= $arr[$low] && $key <= $arr[$high]) {

        $mid = intval($low + (($key - $arr[$low]) * ($high - $low)
                / ($arr[$high] - $arr[$low])));

        if ($arr[$mid] < $key) {
            $low = $mid + 1;
        } elseif ($key < $arr[$mid]) {
            $high = $mid - 1;
        } else {
            return $mid;
        }
    }
    if ($key == $arr[$low]) {
        return $low;
    } else {
        return -1;
    }

}


//$numbers = range(0, 1000, 5);
$numbers = [001, 002, 003, 111, 112, 113, 221, 222, 223];

$number = 111;

echo interpolationSearch($numbers, $number);


