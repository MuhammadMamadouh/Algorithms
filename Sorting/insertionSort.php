<?php

/**
 * Sort Array using Selection sort algorithm
 *
 * Worst time Complexity : O(n)
 *
 * Best time complexity Ω(n)
 * Worst time complexity O(n2)
 * Average time complexity Θ(n2)
 * Space complexity (worst case) O(1)
 * @param array $arr
 * @return void
 */
function insertionSort(array &$arr)
{
    $length = count($arr);
    for ($i = 1; $i < $length; $i++) {
        $key = $arr[$i];
        $j = $i - 1;
        while ($j >= 0 && $arr[$j] > $key) {
            $arr[$j + 1] = $arr[$j];
            $j--;
        }
        $arr[$j + 1] = $key;
    }
}


$arr = [20, 45, 30, 79, 10, 15, 11, 19,];

echo implode(', ', $arr);

echo '<br/>';

insertionSort($arr);

echo implode(', ', $arr);
