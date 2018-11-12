<?php

/**
 * Sort Array using Selection sort algorithm
 *
 * Worst time Complexity : O(n)
 *
 * Best time complexity => Ω(n2)
 * Worst time complexity => O(n2)
 * Average time complexity => Θ(n2)
 * Space complexity => (worst case) O(1)
 * @param array $arr
 * @return array
 */
function selectionSort(array $arr): array
{
    $length = count($arr);

    for ($i = 0; $i < $length; $i++) {

        $min = $i;

        for ($j = $i + 1; $j < $length; $j++) {

            if ($arr[$j] < $arr[$min]) {
                $min = $j;
            }
        }
        if ($min != $i) {
            $tmp = $arr[$i];
            $arr[$i] = $arr[$min];
            $arr[$min] = $tmp;
        }
    }
    return $arr;
}


$arr = [20, 45, 30, 79, 10, 15, 11, 19,];

echo implode(', ', $arr);

echo '<br/>';

$sortedArray = selectionSort($arr);

echo implode(', ', $sortedArray);
