<?php

/**
 * Sort Array using Merge sort algorithm
 *
 * Best time complexity Ω(nlog(n))
 * Worst time complexity O(n2)
 * Average time complexity Θ(nlog(n))
 * Space complexity (worst case) O(log(n))
 *
 * @param array $arr
 * @return void
 */
function quickSort(array &$arr, int $lower, int $upper)
{
    if ($upper <= $lower) {
        return;
    }

    $pivot = $arr[$lower];
    $start = $lower;
    $stop = $upper;
    while ($lower < $upper) {
        while ($arr[$lower] <= $pivot && $lower < $upper) {
            $lower++;
            // echo 'lower: ' . $lower;
        }
        while ($arr[$upper] > $pivot && $lower <= $upper) {
            $upper--;
            // echo 'upper: ' . $upper;
        }

        if ($lower < $upper) {
            swap($arr, $upper, $lower);
        }
        echo 'lower: ' . $lower . PHP_EOL;
    }
    swap($arr, $upper, $lower);
    quickSort($arr, $start, $upper - 1);
    quickSort($arr, $upper + 1, $stop);
}
function swap(array $arr, int $first, int $second)
{
    $temp = $arr[$first];
    $arr[$first] = $arr[$second];
    $arr[$second] = $temp;
}

function sortArray(array $arr)
{
    quickSort($arr, 0, count($arr) - 1);
}

$arr = [20, 45, 30, 79, 10, 15, 11, 19];

echo implode(', ', $arr);

echo PHP_EOL;

sortArray($arr);

echo implode(', ', $arr);
