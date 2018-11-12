<?php

/**
 * Sort Array using Bubble sort algorithm
 *
 * Worst time Complexity : O(n)
 * Space complexity (worst case) : O(1)
 *  time complexity : O(n2)
 *
 * @param array $arr
 * @return array
 */
function bubbleSort(array $arr): array
{
    $length = count($arr);

    for ($i = 0; $i < $length; $i++) {
        for ($j = 0; $j < $length - 1; $j++) {

            if ($arr[$j] < $arr[$j + 1]) {
                $tmp = $arr[$j + 1];
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $tmp;
            }
        }
    }
    return $arr;
}


/**
 * Sort Array using Bubble sort algorithm
 *
 * Worst time Complexity : O(n)
 * Space complexity (worst case) : O(1)
 *  time complexity : O(n2)
 *
 * @param array $arr
 * @return array
 */
function bubbleSortWithImprovements(array $arr): array
{
    $length = count($arr);

    for ($i = 0; $i < $length; $i++) {

        $swapped = false;

        for ($j = 0; $j < $length - 1; $j++) {

            if ($arr[$j] < $arr[$j + 1]) {
                $tmp = $arr[$j + 1];
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $tmp;
                $swapped = true;
            }
        }
        if (!$swapped) break;
    }
    return $arr;
}

/**
 * Sort Array using Bubble sort algorithm
 *
 * Worst time Complexity : O(n)
 * Space complexity (worst case) : O(1)
 *  time complexity : O(n2)
 *
 * @param array $arr
 * @return array
 */
function bubbleSortWithBounds(array $arr): array
{
    $len = count($arr); // Length of array
    $count = 0;
    $bound = $len - 1;
    for ($i = 0; $i < $len; $i++) {

        $swapped = false;
        $newBound = 0;
        for ($j = 0; $j < $bound - 1; $j++) {
            $count++;
            if ($arr[$j] < $arr[$j + 1]) {
                $tmp = $arr[$j + 1];
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $tmp;
                $swapped = true;
                $newBound = $j;
            }
        }
        $bound = $newBound;
        if (!$swapped) break;
    }
    echo $count . '<br/>';
    return $arr;
}

$arr = [20, 45, 30, 79, 10, 15, 11, 19,];

echo implode(', ', $arr);

echo '<br/>';

$sortedArray = bubbleSortWithBounds($arr);

echo implode(', ', $sortedArray);
