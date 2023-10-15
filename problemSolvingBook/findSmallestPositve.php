
<?php

/**
 * Problem: Given an unsorted array, find smallest positive number missing in the array.
 */

function smallestPositiveMissingNumber($arr)
{
    $n = count($arr);
    $found = false;
    for ($i = 0; $i < $n; $i++) {
        if ($arr[$i] == 1) {
            $found = true;
            break;
        }
    }
    if ($found == false) {
        return 1;
    }
    for ($i = 1; $i < $n + 1; $i++) {
        $found = 0;
        for ($j = 0; $j < $n; $j++) {if
            ($arr[$j] == $i) {$found = 1;
                break;
            }}if
        ($found == 0) {
            return $i;
        }
    }
    return -1;
}

/**
 * using hash table
 * time complexity: O(n)
 * space complexity: O(n)
 * @param mixed $arr
 * @return int
 */

function smallestPositiveMissingNumber1($arr)
{
    // use hash table
    $n = count($arr);
    $hash = [];
    for ($i = 0; $i < $n; $i++) {
        $hash[$arr[$i]] = 1;
    }
    // var_dump($hash);
    for ($i = 1; $i < $n + 1; $i++) {
        if (!isset($hash[$i])) {
            return $i;
        }
    }
    return -1;
}

/**
 * using hash table
 * time complexity: O(n)
 * space complexity: O(n)
 * @param mixed $arr
 * @return int
 */


$arr = [2, 3, -7, 6, 8, 1, -10, 15];

echo smallestPositiveMissingNumber($arr);