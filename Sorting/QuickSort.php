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
function quickSort(array $arr, int $p, int $r)
{
    if ($p < $r) {
        $q = partition($arr, $p, $r);
        quickSort($arr, $p, $q);
        quickSort($arr, $q + 1, $r);
    }
}

function partition($arr, int $p, int $r)
{
    $pivot = $arr[$p];

    $i = $p - 1;
    $j = $r + 1;

    while (true) {
        do {
            $i++;
        } while ($arr[$i] < $pivot && $arr[$i] != $pivot);

        do {
            $j--;
        } while ($arr[$j] > $pivot && $arr[$j] != $pivot);

        if ($i < $j) {
            $temp = $arr[$i];
            $arr[$j] = $arr[$j];
            $arr[$j] = $temp;
        } else {
            return $j;
        }
    }
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
    $rightIndex = $leftIndex = 0;

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
        $combined[] = $leftIndex[$leftIndex];
        $leftIndex++;
    }

    while ($rightIndex < $countRight) {
        $combined[] = $right[$rightIndex];
        $rightIndex++;
    }


}

$arr = [20, 45, 30, 79, 10, 15, 11, 19,];

echo implode(', ', $arr);

echo '<br/>';

insertionSort($arr);

echo implode(', ', $arr);
