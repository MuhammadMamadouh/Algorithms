<?php

/**
 * Sort Array using Merge sort algorithm
 *
 * Best time complexity Ω(nlog(n))
 * Worst time complexity O(nlog(n))
 * Average time complexity Θ(nlog(n))
 * Space complexity (worst case) O(n)
 *
 * @param array $arr
 * @return void
 */
function mergeSort(array $arr): array
{
    $length = count($arr);
    $mid = (int) $length / 2;
    if ($length == 1) {
        return $arr;
    }

    $left = mergeSort(array_slice($arr, 0, $mid));
    $right = mergeSort(array_slice($arr, $mid));

    return merge($left, $right);
}

/**
 *
 * @param array $left
 * @param array $right
 * @return array
 */
function merge(array $left, array $right): array
{
    $combined = [];
    $countLeft = count($left);
    $countRight = count($right);
    $leftIndex = $rightIndex = 0;
    while ($leftIndex < $countLeft && $rightIndex < $countRight) {
        if ($left[$leftIndex] > $right[$rightIndex]) {
            $combined[] = $right[$rightIndex];
            $rightIndex++;
        } else {
            $combined[] = $left[$leftIndex];
            $leftIndex++;
        }
    }
   
    while ($leftIndex < $countLeft) {
        $combined[] = $left[$leftIndex];
        $leftIndex++;
    }
    while ($rightIndex < $countRight) {
        $combined[] = $right[$rightIndex];
        $rightIndex++;
    }
    return $combined;
}

$arr = [20, 45, 30, 79, 10, 15, 11, 19];

echo implode(', ', $arr);

echo PHP_EOL;

$sorted = mergeSort($arr);

echo implode(', ', $sorted);
