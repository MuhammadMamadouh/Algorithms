<?php

function swap (&$arr, $a, $b){
    $tmp = $arr[$b];
    $arr[$b] = $arr[$a];
    $arr[$a] = $tmp;
    // echo 'swapped ' . PHP_EOL;
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
function bubbleSort(array $arr): array
{
    $length = count($arr);
    $count_of_swaps = 0;
    for ($i = 0; $i < $length; $i++) {
        for ($j = 0; $j < $length - 1; $j++) {

            if ($arr[$j] > $arr[$j + 1]) {
                swap($arr, $j, $j + 1);
                $count_of_swaps++;
            }
        }
    }
    echo 'count of swaps: ' . $count_of_swaps . PHP_EOL;
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
    $count_of_swaps = 0;
    $swapped = true;
    for ($i = 0; $i < $length && $swapped; $i++) {

        $swapped = false;

        for ($j = 0; $j < $length - $i - 1; $j++) {

            if ($arr[$j] > $arr[$j + 1]) {
                $tmp = $arr[$j + 1];
                $arr[$j + 1] = $arr[$j];
                $arr[$j] = $tmp;
                $swapped = true;
                $count_of_swaps++;
            }
        }
        if (!$swapped) break;
    }
    echo 'count of swaps: ' . $count_of_swaps . PHP_EOL;
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
    $count_of_swaps = 0;
    for ($i = 0; $i < $len; $i++) {

        $swapped = false;
        $newBound = 0;
        for ($j = 0; $j < $bound; $j++) {
            $count++;
            if ($arr[$j] > $arr[$j + 1]) {
                swap($arr, $j, $j + 1);
                $swapped = true;
                $newBound = $j;
                $count_of_swaps++;
            }
            echo 'new bound ' . $newBound . PHP_EOL;
        }
        $bound = $newBound;
        if (!$swapped) break;
    }
    echo 'count of swaps: ' . $count_of_swaps . PHP_EOL;

    echo $count . ' count' . PHP_EOL;
    return $arr;
}

$arr = [20, 45, 30, 79, 10, 15, 11, 19,];

echo implode(', ', $arr);

echo 'bubbleSort' . PHP_EOL;
$sortedArray = bubbleSort($arr);

echo 'bubbleSortWithImprovements' . PHP_EOL;

$sortedArray = bubbleSortWithImprovements($arr);

echo 'bubbleSortWithBounds' . PHP_EOL;

// $sortedArray = bubbleSortWithBounds($arr);
echo PHP_EOL;

echo implode(', ', $sortedArray);
