
<?php

/**
 * Problem: Given a sorted array, rearrange it in maximum-minimum form.
 * For example, if the input array is {1,2,3,4,5,6,7} then the output should be {7,1,6,2,5,3,4}.
 * Time complexity: O(n)
 * Space complexity: O(n)
 */

function MaxMinArr($arr)
{
    $n = count($arr);
    $aux = [];
    $start = 0;
    $end = $n - 1;
    for ($i = 0; $i < $n; $i++) {
        if ($i % 2 == 0) {
            $aux[$i] = $arr[$end];
            $end--;
        } else {
            $aux[$i] = $arr[$start];
            $start++;
        }
    }
    return $aux;
}
function MaxMinArr1(&$arr)
{
    $n = count($arr) - 1;
    $start = 0;
    $end = $n;
    for ($i = 0; $i < $n; $i++) {
        reverse($arr, $i, $n);
    }
    return $arr;
}
function reverse(&$arr, $start, $end)
{
    while ($start < $end) {
        swap($arr, $start, $end);
        $start++;
        $end--;
    }
}

function swap(&$arr, $start, $end)
{
    $temp = $arr[$start];
    $arr[$start] = $arr[$end];
    $arr[$end] = $temp;
}

$arr = [1, 2, 3, 4, 5, 6, 7];

print_r(MaxMinArr1($arr));